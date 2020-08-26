<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="with=device-width, user-scalable=no, initial-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Listagem das empresas</title>
    <style>
        html, body {
            background-color: #000;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
            padding: 25px;
        }

        .title {
            font-size: 84px;
        }

        .h1 {
            font-size: 52px;
            align-items: center;
            justify-content: center;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="flex-center position-ref full-height">
            

    <div class="content">
        <div class="links">
            <a href="index" target="_self">Inicio</a>
            <a href="contatos" target="_self">Contatos</a>
            <a href="empresas" target="_self">Empresas</a>
            <a href="viewCriarNegocio" target="_self">Registrar um negócio</a>
       
        </div>
        <div class="title m-b-md">
            Negocios registrados
        </div>
<table>
    @if (empty($deal->result))
        {!! "<p>Não há negócios registrados </p>" !!}
    @endif

    @foreach($deal->result  as $deal)
        <tr>
           <h1>Nome: {{ $deal->TITLE }}</h1>
            <h1>Valor(R$):{{ $deal->OPPORTUNITY }}</h1>
            <h1>Nome Empresa:{{ $deal->COMMENTS }}</h1>

            
               
                
        </tr>
        
    @endforeach

</table>


      
    </div>
</div>
</body>
</html>
