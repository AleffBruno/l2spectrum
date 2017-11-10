<html>
<body>
@if(isset($errors) && count($errors) > 0)
	@foreach($errors->all() as $error )
		{{$error}}
	@endforeach
@endif

<form method="post" action="{{route('eloquent.user.store')}}">
	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
	Nome<input type="text" name="name">
	Email<input type="text" name="email">
	Senha<input type="text" name="password">
	<button type="submit">Enviar</button>
</form>
</body>
</html>