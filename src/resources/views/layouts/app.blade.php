<html>
    <head>
    	<link rel="stylesheet" href="/css/app.css">
    	
        <title>@yield('title')</title>
    </head>
    <body>
        <div class="container" style="min-height:100vh;">
            <div class="row">
                <div class="col" style="min-height:100vh;width:360px;min-width:360px;border-right:1px solid rgba(0,0,0,0.3);">
                    <div style="position:fixed;top:0;bottom:0;left:0;width:360px;">
                        <div class="container">

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

                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="container">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>