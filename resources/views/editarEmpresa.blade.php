
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
            Registrar Empresa
        </div>

<form action="{{route('companyStore')}}" method="post">
    @csrf
    <table>
    <tr>
    <td><div >
        <label for=""> Nome do responsável: </label>
       <input type="text" name="nome" required>
        <span  data-placeholder="NAME"></span>
    </div>
    <td><div >
        <label for=""> Nome da empresa: </label>
        <input type="text" name="nome_empresa" required>
    </div></td></tr>
    <tr> <td><div >
      <label for=""> CNPJ/CPF: </label>
        <input type="number" name="cnpj" required>
    </div></td>
    <td>
    <div>
        <label for=""> Telefone: </label>
        <input type="text" name="telefone" required>
    </div></td></tr>
    <tr><td><div >
        <label for=""> E-mail: </label>
        <input type="text" name="email" required>
    </div></td>
    </tr>
    </table>
    <input type="submit" value="Registrar Empresa">

</form>
</div>
</div>
</body>
</html>
