<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel - Clientes</title>
</head>
<body>
    <h2>Clientes Lista:</h2>
    <ul>
        @foreach($clientes as $cliente)
            <li><a href="{{$cliente->id}}">{{$cliente->nome}}</a></li>
        @endforeach    
    </ul>

    <form method="POST">
        {{csrf_field()}}
        <input type="text" name="nome" placeholder="Seu Nome..."/>
        <input type="email" name="email" placeholder="Seu E-Mail..."/>
        <input type="submit" name="inserir_cliente" value="Inserir!"/>
    </form>
</body>
</html>