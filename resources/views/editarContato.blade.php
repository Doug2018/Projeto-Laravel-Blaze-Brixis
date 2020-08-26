
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="with=device-width, user-scalable=no, initial-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Editar Contato</title>
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

        input[type=text] {
            background-color: #000;
            color: #636b6f;
        }

        input[type=number] {
            background-color: #000;
            color: #636b6f;
        }

        input[type=submit] {
            background-color: #000;
            color: #636b6f;
        }

        input[list] {
            background-color: #000;
            color: #636b6f;
        }
    </style>
</head>
<body>
    <div class="flex-center position-ref full-height">
            

    <div class="content">
        <div class="title m-b-md">
            Editar Contato
        </div>

<form action="{{route('contactUpdate')}}" method="post">
    @csrf
    <table>
    <tr> 
        <div>
        <label for="Nome"> Nome: </label>
        
        <input type="text" name="nome_empresa" value="{{ $contact->result->NAME }}" required>
        <input type="hidden" name="id_contato" value="{{ $contact->result->ID }}">

    </div></tr>
    <div>
      <label for="CPF"> CNPJ/CPF: </label>

        <input type="number" name="cpf" value="{{ $contact->result->ORIGIN_ID }}" required >

    </div>
    <div>
        <label for="Empresa"> Empresa: </label>
        <input list="cnpj_empresa" name="cnpj_empresa" required>
        <datalist id="cnpj_empresa" >
            @foreach($company->result  as $company)
            <option value="{{ $company->TITLE }}">        
            @endforeach
        </datalist>
    </div>
</tr>
    <input type="submit" value="Atualizar Contato">
</table>
</form>
</div>
</div>
</body>
</html>
