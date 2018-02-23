<!--  <a href={{ route('eloquent.account.create') }}> Criar nova Account</a></br></br>-->
<a href={{route('logout')}}>Logout</a><br><br>
Listagem de usuarios

<table border="1">
	<thead>
		<tr>
			<th>#</th>
			<th>email</th>
			<th>name</th>
			<th>acao deletar</th>
			<th>acao atualizar</th>
			<th>criar account</th>
			<th>ver accounts</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
			<tr>
				<td>{{$user->id}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->name}}</td>
				<td><a href="{{route('eloquent.user.delete',$user->id)}}">deletar</a></td>
				<td><a href="{{route('eloquent.user.updateuserview',$user->id)}}">atualizar</a></td>
				<td><a href="{{route('eloquent.user.createaccount',$user->id)}}">Nova Account</a></td>
				<td><a href="{{route('eloquent.user.veraccounts',$user->id)}}">Ver Accounts</a></td>
			</tr>
		@endforeach
	</tbody>
</table>