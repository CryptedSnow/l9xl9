<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<p align="center">
    <a href="https://travis-ci.org/laravel/framework">
        <img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
    </a>
</p>

<br>

### About the project <h3> 
The application in question is a CRUD (Create, Read, Update and Delete) of Hunter x Hunter anime.

## Setting the environment

1 - Run the following command to install dependencies of repository.
```
composer install
```

2 - Create `.env` file using the command:
```
cp .env.example .env
```

3 - Run the following command to generate `API_KEY` value of `.env` file.
```
php artisan key:generate
```

4 - When executing the migrations, is necessary use the commands to create some populated tables to some selection fields at forms.

```
php artisan migrate --seed
```

Or using the commands:
```
php artisan migrate
php artisan db:seed
```

### Functionalities <h3>
Functionality | Status
------------ | -------------
Read Hunter | Working
Listing Hunters in main page | Working
Update Hunter | Working
Send Hunter to trash | Working
Form validations | Working
Filter Hunter (main and trash listing) | Working
Alerts of doned actions (Using [SweetAlert2](https://sweetalert2.github.io/)) | Working
Export datas to PDF | Working
Download of zipped photos of the Hunter (main and trash listing) | Working
Fallback route | Working
Listing erased Hunters in trash page | Working
Restore erased Hunter of trash page | Working
Delete permanently Hunter of trash page | Working
Send emails (using [Mailtrap](https://mailtrap.io/)) | Working
Send messages of WhatsApp (using [Twilio](https://www.twilio.com/docs/usage/api)) | Working
Logs of doned tasks (using [LogViewer](https://github.com/ARCANEDEV/LogViewer/blob/master/_docs/1.Installation-and-Setup.md)) | Working

<h1 align="center"> Listing Hunters </h1>

![](https://github.com/Iury189/l9xl9/blob/main/public/imagens/Listagem.png?raw=true)
  
<h1 align="center"> Register Hunter </h1>

![](https://github.com/Iury189/l9xl9/blob/main/public/imagens/Cadastro.png?raw=true)
 
<h1 align="center"> Update Hunter </h1>

![](https://github.com/Iury189/l9xl9/blob/main/public/imagens/Atualizacao.png?raw=true)

<h1 align="center"> Trash of Hunters </h1>

![](https://github.com/Iury189/l9xl9/blob/main/public/imagens/Trashed.png?raw=true)

<h1 align="center"> Fallback (Replacing 404 Not Found) </h1>

![](https://github.com/Iury189/l9xl9/blob/main/public/imagens/Fallback.png?raw=true)

<h1 align="center"> Sended email </h1>

![](https://github.com/Iury189/l9xl9/blob/main/public/imagens/Email.png?raw=true)

<h1 align="center"> WhatsApp chat </h1>

![](https://github.com/Iury189/l9xl9/blob/main/public/imagens/Whatsapp.png?raw=true)

<h1 align="center"> Logs </h1>

![](https://github.com/Iury189/l9xl9/blob/main/public/imagens/Log1.png?raw=true)

![](https://github.com/Iury189/l9xl9/blob/main/public/imagens/Log2.png?raw=true)

![](https://github.com/Iury189/l9xl9/blob/main/public/imagens/Log3.png?raw=true)
