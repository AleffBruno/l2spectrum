<a href={{ route('eloquent.user.list') }}> Voltar</a></br></br>
Listagem de Accounts de "{{$user_name}}"

<table border="1">
	<thead>
		<tr>
			<th>user_fk</th>
			<th>login</th>
			<th>acao deletar</th>
			<th>acao atualizar</th>
		</tr>
	</thead>
	<tbody>
		@foreach($accounts as $account)
			<tr>
				<td>{{$account->user_fk}}</td>
				<td>{{$account->login}}</td>
				<td><a href="{{route('eloquent.account.delete',$account->login)}}">deletar</a></td>
				<td><a href="{{route('eloquent.account.updateaccountview',$account->login)}}">atualizar</a></td>
			</tr>
		@endforeach
	</tbody>
</table>