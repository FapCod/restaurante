<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aviso del stock producto</title>
</head>
{{-- estilos para boton --}}
<style>
    .btn-primary{
        background-color: #0066ff;
        border-color: #0066ff;
        color: #fff;
        shadow: #0066ff;
        border-radius: 20px;
    }
    .title{
        font-size: 20px;
        font-weight: bold;
        font-family: sans-serif;
        text-align: center;
    }
    .cuerpo{
        font-size: 15px;
        font-family: sans-serif;
        text-align: justify;
    }
    .enlace{
        text-decoration: none;
        color: #0066ff;
    }
</style>
<body>
    <img src="{{ asset('img/logo.png') }}" alt="logo" width="100" height="100" />
    <h1 class="title btn-primary">Hola<b> soy {{ $user->name }} </b></h1>
    <p class="cuerpo">Te quiero avisar que en el producto <b> {{ $product->name }} </b>ya no tiene mucho stock
        @if ($presentations->count() > 0)
            , solo quedan en: <br> <b> 
            @foreach ($presentations as $presentation)
                {{ $presentation->name }} ({{ $presentation->stock }}),
                unidades.
                <br>
            @endforeach
        @endif
        @if (isset($product->stock))
            , solo quedan: <br> <b> 
            {{ $product->stock }}
             unidades.
        @endif
        </b>
    </p>
    <p class="cuerpo">
        <a class="enlace" href="http://restaurante.test/admin/">Ingresa aqui y aumenta el stock cuando hayas comprado mas productos</a>
    </p>
</body>
</html>