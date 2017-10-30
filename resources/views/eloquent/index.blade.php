<a href={{ route('eloquent.account.create') }}> Criar nova Account</a></br></br>
Listagem de clientes

<table border="1">
	<thead>
		<tr>
			<th>#</th>
			<th>login</th>
			<th>Senha</th>
		</tr>
	</thead>
	<tbody>
		@foreach($accounts as $account)
			<tr>
				<td>{{$account->id}}</td>
				<td>{{$account->login}}</td>
				<td>{{$account->password}}</td>
			</tr>
		@endforeach
	</tbody>
</table>