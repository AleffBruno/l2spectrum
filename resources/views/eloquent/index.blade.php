<!--  <a href={{ route('eloquent.account.create') }}> Criar nova Account</a></br></br>-->
<a href={{ route('eloquent.user.createuser') }}> Criar nova Account</a></br></br>
Listagem de usuarios

<table border="1">
	<thead>
		<tr>
			<th>#</th>
			<th>email</th>
			<th>name</th>
			<th>acao</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
			<tr>
				<td>{{$user->id}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->name}}</td>
				<td><a href="{{route('eloquent.user.delete',$user->id)}}">deletar</a></td>
			</tr>
		@endforeach
	</tbody>
</table>