@extends('layouts.app')

@section('title', 'ledges')

@section('content')
	<table class="table">
		<thead>
			<tr>
				<th>Номер</th>
				<th>Наименование</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($ledges as $ledge)
			    <tr>
			    	<td colspan="2" style="font-weight:bold;background:#f0f0f0;">
			    		{{ $ledge->name }}
			    	</td>
			    </tr>
			    @foreach ($ledge->accounts as $account)
			    	<tr>
			    		<td>{{ $account->id }}</td>
			    		<td>{{ $account->name }}</td>
			    	</tr>
			    @endforeach
			@endforeach
		</tbody>
	</table>	
@endsection