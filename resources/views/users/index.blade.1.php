<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- fontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Celke</title>
    <style>
    .error {
        color: red;
    }

    .success {
        color: green;
    }

    table {
        /* border-collapse: collapse;
    border: 1px solid black;
    width: 100%; */
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
        cursor: pointer;
    }

    td,
    th {
        padding: 10px;
        border: 1px solid black;
        text-align: center;
    }

    .list-erros {
        display: none;
    }

    .list-erros.show {
        display: block;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="card my-5 border-light shadow ">

            <h3 class="card-header">Importar CSV</h3>

            <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (count($errors) == 1)
            <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            @if (count($errors) > 1)
            <div class="show-erros">
                <div class="alert alert-danger">Verifique os erros abaixo: [+] </div>
                <ol class="list-erros">
                    @foreach ($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                    @endforeach
                </ol>
            </div>
            <br>
            @endif

            <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" id="file" accept=".csv">
                <button class="btn btn-primary btn-sm" type="submit" id="fileBtn">Importar</button>
            </form>
            <hr>
            <h5>Usuários:</h5>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}">Editar</a>
                        <a href="{{ route('users.destroy', $user->id) }}">Excluir</a>
                    </td>
                </tr>
                @endforeach
            </table>

            </div>
        </div>
    </div>

    <script>
    document.querySelector('.show-erros').addEventListener('click', function() {
        document.querySelector('.list-erros').classList.toggle('show');
    });
    </script>
</body>

</html>
