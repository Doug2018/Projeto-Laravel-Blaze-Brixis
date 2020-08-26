
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="with=device-width, user-scalable=no, initial-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Editar Empresa</title>
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

    </style>
</head>
<body>
    <div class="flex-center position-ref full-height">
            

    <div class="content">
        <div class="title m-b-md">
            Editar Empresa
        </div>
        @csrf
<form action="{{route('companyUpdate')}}" method="post">
   

        
 <div >
    @csrf
        <label for=""> Nome do responsável: </label>
        @csrf
       <input type="text" name="nome" value="{{ $company->result->ORIGINATOR_ID }}" required>
       <input type="hidden" name="id_empresa" value="{{ $company->result->ID }}" required>
        <span  data-placeholder="NAME"></span>
    </div>
    <div >
        <label for=""> Nome da empresa: </label>
        @csrf
        <input type="text" name="nome_empresa" value="{{ $company->result->TITLE }}" required>
    </div>
    <div >
      <label for=""> CNPJ/CPF: </label>
      @csrf
        <input type="number" name="cnpj" value="{{ $company->result->ORIGIN_ID }}" required>
        <div><input type="submit" value="Atualizar Empresa"></div>
</form>
</div>
</div>
</body>
</html>
