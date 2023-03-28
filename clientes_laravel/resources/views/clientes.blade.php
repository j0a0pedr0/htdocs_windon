<!DOCTYPE html>
<html>
<head>
	<title>Clientes | Lista</title>
</head>
<body>
	<h2>Listando clientes:</h2>
	<ul>
	@foreach($clientes as $cliente)
		<li><a href="{{$cliente->id}}">{{$cliente->nome}}</a></li>
	@endforeach
	</ul>

	<form method="post">
		{{csrf_field()}}
		<input type="text" name="nome" placeholder="Nome...">
		<input type="text" name="email" placeholder="E-mail...">
		<input type="submit" value="Inserir!">
	</form>
</body>
</html>