@extends('layouts.app')

@section('title', 'transactions')

@section('content')
	<table class="table">
		<thead>
			<tr>
				<th>id</th>
				<th>Дата/Время</th>
				<th>Дебет</th>
				<th>Кредет</th>
				<th>Сумма</th>
				<th>Примечание</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($transactions as $trans)
				<tr>
					<td>{{ $trans->id }}</td>
					<td>{{ $trans->created_at }}</td>
					<td>{{ $trans->dr }}</td>
					<td>{{ $trans->cr }}</td>
					<td>{{ $trans->amount }}</td>
					<td>{{ $trans->description }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection