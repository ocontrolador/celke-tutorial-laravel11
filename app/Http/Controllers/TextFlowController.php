<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TextFlow\SMSApi\TextFlowClient;

class TextFlowController extends Controller
{
    // sms via textflow
    public function index()
    {
        $apikey = getenv('TEXTFLOW_API_KEY');
        $phone = getenv('PHONE');
        $text = "Ola, enviando mensagem via TextFlow";

        $client = new TextFlowClient($apikey);

        $response = $client->send_sms($phone, $text);

        if ($response->ok)
            dd('Mensagem enviada com sucesso', $response->data);
        else
            dd('Erro ao enviar mensagem', $response->message);
    }
}

