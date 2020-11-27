@extends('layouts.app')

@section('title', 'dashboard')

@section('content')
	<h4 style="margin-top:24px;">Операции<h4>
    <ol>
        <li>
            <a href="/transactions/create">
                Провести операцию
            </a>
        </li>
    </ol>

    <h4 style="margin-top:24px;">Отчеты<h4>
    <ol>
        <li>
            <a href="/transactions">
                Список проводок
            </a>
        </li>
    </ol>

    <h4 style="margin-top:24px;">Реестры<h4>
    <ol>
        <li>
            <a href="/ledges">
                Расписание счетов
            </a>
        </li>
    </ol>
@endsection