<a href={{ route('eloquent.user.list') }}> Voltar</a></br></br>
Listagem de Accounts de "{{$user_name}}"

<table border="1">
	<thead>
		<tr>
			<th>user_fk</th>
			<th>login</th>
		</tr>
	</thead>
	<tbody>
		@foreach($accounts as $account)
			<tr>
				<td>{{$account->user_fk}}</td>
				<td>{{$account->login}}</td>
			</tr>
		@endforeach
	</tbody>
</table>