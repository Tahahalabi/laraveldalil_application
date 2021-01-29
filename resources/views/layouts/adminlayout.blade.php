<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/all.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/droidcoffee.css')}}">

        <meta name="viewport"content="width=device-width,initial-scale=1">
        <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    </head>
    <body>
        
        @yield('content')


        <script src="{{asset('js/bootstrap.min.js')}}"></script>
    </body>
</html>