<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnviarSmsController extends Controller
{
    // GET /enviar-sms
    public function index($codigo = 123456, $nome = 'André')
    {
        // fonte: https://iagente.com.br/api-sms/#11

        // dados de autenticação
        $usuario = getenv('IAGENTE_USER');
        $senha = urlencode(getenv('IAGENTE_PASS'));

        // url da api
        $url_api = "https://api.iagentesms.com.br/webservices/http.php";

        // celular para receber a mensagem
        $celular = getenv('CELULAR');

        // codifica os dados no formato de um formulário www
        $mensagem = urlencode("Ola $nome, seu código de verificação é $codigo");

        // concatena a url da api com a variável carregando o conteúdo da mensagem
        $url_api = "$url_api?metodo=envio&" .
        "&usuario=$usuario&senha=$senha&celular=$celular&mensagem={$mensagem}";

        //dd($url_api);

        // realiza a requisição http passando os parâmetros informados
        $api_http = file_get_contents($url_api);

        // imprime o resultado da requisição
        echo $api_http;

        //return view('enviar-sms');
    }
}
