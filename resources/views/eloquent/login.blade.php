<html>
	<head>
	</head>
	<body>
	
	@if($errors->any())
	<h4>{{$errors->first()}}</h4>
	@endif
		<form method="POST" action="{{route('eloquent.user.login')}}">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
			Email
			<input type="email" name="email">
			Senha
			<input type="password" name="password">
			<input type="submit" value="Login">
		</form>
		
		<a href="{{route('eloquent.user.createuser')}}">criar conta</a>
	</body>
</html>