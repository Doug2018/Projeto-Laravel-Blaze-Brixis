<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contatos</title>
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
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 22px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .h1 {
            font-size: 52px;
            align-items: center;
            justify-content: center;
        }

    </style>
</head>
<body>
    <div class="flex-center position-ref full-height">
            

        <div class="content">
            <div class="links">
                <a href="index" target="_self">Inicio</a>
                <a href="negocios" target="_self">Negocios</a>
                <a href="empresas" target="_self">Empresas</a>
                <a href="viewCriarContato" target="_self">Registrar um contato</a>
           
            </div>
            <div class="title m-b-md">
                Contatos registrados
            </div>
<table>
    @if (empty($contact->result))
        {!! "<p>Não há contatos registrados </p>" !!}
    @endif
    <tr>
    @foreach($contact->result  as $contact)
        
            <td><h1>{{ $contact->NAME }}<h1></td>




            <td>
                <form action="{{ route('viewContactUpdate', ['idcontact' => $contact->ID]) }}" method="post">
                    @csrf
                    <input type="hidden" name="contact" value="{{$contact->ID}}">
                    <input type="submit" value="Editar">
                </form>
                <form action="{{ route('deleteContact', ['idcontact' => $contact->ID]) }}" method="post">
                    @csrf

                    <input type="hidden" name="contact" value="{{$contact->ID}}">
                    <input type="submit" value="Remover">
                </form>

            </td>
        
    @endforeach
</tr>
</table>
</div>
</div>
</body>
</html>
