<html>
<a href={{ route('eloquent.user.list') }}> Voltar</a>

<h1>Update User</h1>
<body>
@if(isset($errors) && count($errors) > 0)
	@foreach($errors->all() as $error )
		{{$error}}<br>
	@endforeach
@endif

<form method="post" action="{{route('eloquent.user.update',$userToUpdate->id)}}">
	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
	Nome<input type="text" name="name" value="{{$userToUpdate->name}}">
	Email<input type="text" name="email" value="{{$userToUpdate->email}}">
	Senha<input type="password" name="password" value="{{$userToUpdate->password}}">
	<button type="submit">Atualizar</button>
</form>
</body>
</html>