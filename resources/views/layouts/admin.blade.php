<!DOCTYPE html>
<html>
    <head>
        <title>
            @yield('title')
        </title>
    </head>
    <body>
        <div id="app">
            {{--画面上部に表示するナビゲーションバーです--}}
        </div>
        <main>
            @yield('content')
        </main>
    </body>
</html>