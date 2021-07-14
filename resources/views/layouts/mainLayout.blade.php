<?php
  if(!isset($_SESSION)){session_start();}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" value="{{ csrf_token() }}"/>
    <title>i </title>
    <link href="{{ asset('public/css/app.css') }}" type="text/css" rel="stylesheet"/>
    <link href="{{ asset('public/css/style.css') }}" type="text/css" rel="stylesheet"/>
     {{-- <script src="{{mix('js/app.js')}}" type="text/javascript"></script>--> --}}
    <script src="{{ asset('public/js/jquery-1.9.1.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('public/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css_main.css">



</head>
<body>


    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
