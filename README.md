## Requisitos

* PHP 8.2 ou superior
* Composer

## Como rodar o projeto baixado

Duplicar o arquivo ".env.example" e renomear para ".env".<br>

Instalar as dependências do PHP
```
composer install
```

Gerar a chave
```
php artisan key:generate
```

Iniciar o projeto criado com Laravel
```
php artisan serve
```

Acessar o conteúdo padrão do Laravel
```
http://127.0.0.1:8000
```

## Sequencia para criar o projeto
Criar o projeto com Laravel
```
composer create-project laravel/laravel .
```

Iniciar o projeto criado com Laravel
```
php artisan serve
```

Acessar o conteúdo padrão do Laravel
```
http://127.0.0.1:8000
```

## Enviar para o GitHub

Baixar os arquivos do Git
```
git clone --branch <branch_name> <repository_url>
```

## Envio SMS

5 SMS grátis para testar: https://login.iagente.com.br/solicitacao-conta-sms

> API: https://iagente.com.br/api-sms/#11

## Envio WhatsApp

> API gratuita para uso pessoal: https://www.callmebot.com/blog/free-api-whatsapp-messages/

## Envio SMS via TextFlow

> API TextFlow para envio SMS: https://textflow.me/api
```
composer require textflow/sms-api
```

## API com CRUD

Cria o arquivo de rotas para API
```
php artisan install:api
```


