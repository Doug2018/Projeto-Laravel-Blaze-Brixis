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
            <a href="/" target="_self">Inicio</a>
            <a href="contatos" target="_self">Contatos</a>
            <a href="negocios" target="_self">Negocios</a>
            <a href="viewCriarEmpresa" target="_self">Registrar uma empresa</a>
       
        </div>
        <div class="title m-b-md">
            Empresas registradas
        </div>
<table>
    @if (empty($company->result))
        {!! "<p>Não há Empresas registradas </p>" !!}
    @endif

    @foreach($company->result  as $company)
        <tr>
            <td><h1>{{ $company->TITLE }}</h1></td>
          

            <td>
                
                <form action="{{ route('companyDestroy', ['idcompany' => $company->ID]) }}" method="post">
                    @csrf

                    <input type="hidden" name="company" value="{{$company->ID}}">
                    <input type="submit" value="Apagar Empresa">
                </form>

            </td>
            <td>
            <form action="{{ route('viewCompanyUpdate', ['idcompany' => $company->ID]) }}" method="post">
                @csrf
                <input type="hidden" name="company" value="{{$company->ID}}">
                <input type="submit" value="Editar Empresa">
            </form>
            </td>
        </tr>
        
    @endforeach

</table>


      
    </div>
</div>
</body>
</html>
