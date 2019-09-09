<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
       
        <link rel="stylesheet" type="text/css" href="{{env('APP_CSS_PATH')}}style.css">
        <link rel="stylesheet" type="text/css" href="{{env('APP_CSS_BOOTSTRAP_PATH')}}bootstrap.min.css">
        <script src="{{env('APP_JS_BOOTSTRAP_PATH')}}jquery.min.js"></script>
        <script type="text/javascript" src="{{env('APP_JS_BOOTSTRAP_PATH')}}bootstrap.min.js"></script>
        
    </head>
    <body>

       @yield('content')
       
 <script src="{{env('APP_JS_PATH')}}functions.js"></script>
</body>
</html>
