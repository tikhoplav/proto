@extends('layouts.app')

@section('title', 'new transaction')

@section('content')
	<h3>Провести операцию</h3>
	<form method="POST" action="/transactions">
		@csrf

		<div class="row">
			<div class="col" style="padding-top:16px;">
				<label for="cr">По кредиту счета:</label>
				<select id="cr" name="cr" class="input">
					@foreach ($accounts as $acc)
						<option value="{{ $acc->id }}">
							{{ $acc->id }} {{ $acc->name }}
						</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="row">
			<div class="col" style="padding-top:16px;">
				<label for="dr">По дебету счета:</label>
				<select id="dr" name="dr" class="input">
					@foreach ($accounts as $acc)
						<option value="{{ $acc->id }}">
							{{ $acc->id }} {{ $acc->name }}
						</option>
					@endforeach
				</select>
			</div>
		</div>		

		<div class="row">
			<div class="col" style="padding-top:16px;">
				<input name="amount" placeholder="Сумма" class="input">
			</div>
		</div>

		<div class="row">
			<div class="col" style="padding-top:16px;">
				<textarea name="description"
					rows="4"
					cols="50"
					placeholder="Примечание"
					class="input"
				></textarea>
			</div>
		</div>

		<div class="row">
			<div class="col" style="padding-top:16px;">
				<input type="submit" value="Провести" style="width:160px;"  class="input">
			</div>
		</div>
	</form>
@endsection