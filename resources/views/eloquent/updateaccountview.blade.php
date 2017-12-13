<html>
<h1>update Account</h1>
<body>
@if(isset($errors) && count($errors) > 0)
	@foreach($errors->all() as $error )
		{{$error}}
	@endforeach
@endif

<form method="post" action="{{route('eloquent.account.updateaccount',$accountToUpdate->login)}}">
	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
	<input type="hidden" name="user_fk" value="{{$userid}}"/>
	login<input type="text" name="login" value="{{$accountToUpdate->login}}">
	password<input type="text" name="password" value="{{$accountToUpdate->password}}">
	lastactive<input type="text" name="lastactive" value="{{$accountToUpdate->lastactive}}">
	access_level<input type="text" name="access_level" value="{{$accountToUpdate->access_level}}">
	lastIP<input type="text" name="lastIP" value="{{$accountToUpdate->lastIP}}">
	lastServer<input type="text" name="lastServer" value="{{$accountToUpdate->lastServer}}">
	<button type="submit">Atualizar</button>
</form>
</body>
</html>