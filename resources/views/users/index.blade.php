@extends('layouts.app')

@section('title', 'Celke')

@push('styles')
<style>
    .error {
        color: red;
    }
    .success {
        color: green;
    }
    .list-erros {
        display: none;
    }
    .list-erros.show {
        display: block;
    }
    .aviso {
        position: relative;
    }
    .close-button {
      position: absolute;
      top: 5px;
      right: 5px;
      cursor: pointer;
    }
</style>
@endpush

@section('content')
<div class="card my-5 border-light shadow ">

    <h3 class="card-header">Importar CSV</h3>

    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success aviso">
            {{ session('success') }}
            <span class="close-button">[ X ]</span>
        </div>
        @endif

        @if (count($errors) == 1)
        <div class="alert alert-danger aviso">
            {{ $errors->first() }}
            <span class ="close-button">[ X ]</span>
        </div>
        @endif

        @if (count($errors) > 1)
        <div class="show-erros">
            <div class="alert alert-danger aviso">
                Clique aqui para ver os erros <i class="fas fa-hand-pointer"></i>
                <span class ="close-button">[ X ]</span>
            </div>
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
            <div class="input-group">
                <label for="file" class="input-group-text" id="fileLabel">
                    <i class="fas fa-file"> </i> &nbsp; 
                    <span id="fileName">Selecionar Arquivo CSV</span>
                </label>
                <input type="file" class="form-control" name="file" id="file" accept=".csv" style="display:none ;">
                <button class="btn btn-outline-success" type="submit" id="fileBtn">
                    <i class="fas fa-upload"></i> &nbsp; Importar
                </button>
            </div>
        </form>
        <hr>
        <h5>Usuários:</h5>
        <table class="table table-striped table-hover">
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
@endsection

@push('scripts')
<script>
    const fileInput = document.querySelector('#file');
    const fileName = document.querySelector('#fileName');
    const showErros = document.querySelector('.show-erros');
    const closeButton = document.querySelectorAll('.close-button');
    
    fileInput.addEventListener('change', function() {
        fileName.innerHTML = 'Arquivo selecionado: <b>' + this.files[0].name + '</b>';
    });
    
    if(showErros) {
        showErros.addEventListener('click', function() {
            document.querySelector('.list-erros').classList.toggle('show');
        });        
    }

    closeButton.forEach(function(element) {
        element.addEventListener('click', function() {
            this.parentElement.style.display = 'none';
        });
    }); 

</script>
@endpush