<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnviarWhatsAppController extends Controller
{
    // enviar-whatsapp
    public function index()
    {
        // dados da CallMeBot
        $url = "https://api.callmebot.com/whatsapp.php";
        $phone = getenv('PHONE');
        $apikey = getenv('CALL_API_KEY');

        // texto da mensagem
        $text = urlencode("Ola, seu código de verificação é 123456");

        // concatena a url da api com a variável carregando o conteudo da mensagem
        $url_api = "$url?phone=$phone&text={$text}&apikey=$apikey";

        // realiza a requisição http passando os parâmetros informados
        $api_http = file_get_contents($url_api);

        // imprime o resultado da requisição
        echo $api_http;


        //return view('enviar-whatsapp');
    }
}
