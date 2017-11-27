<html>
<h1>Criar Account</h1>
<body>
@if(isset($errors) && count($errors) > 0)
	@foreach($errors->all() as $error )
		{{$error}}
	@endforeach
@endif

<form method="post" action="{{route('eloquent.account.store')}}">
	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
	<input type="hidden" name="user_fk" value="{{$userid}}"/>
	login<input type="text" name="login">
	password<input type="text" name="password">
	lastactive<input type="text" name="lastactive">
	access_level<input type="text" name="access_level">
	lastIP<input type="text" name="lastIP">
	lastServer<input type="text" name="lastServer">
	<button type="submit">Enviar</button>
</form>
</body>
</html>