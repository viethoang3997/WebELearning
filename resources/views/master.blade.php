<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | @yield('title')</title>
    <link href="{{ asset('storage/image/Ellipse 7.png')  }}" rel="shortcut icon" type="image/png">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <base href="{{asset('')}}">
    <link href="{{ asset('font/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    @include('layouts.header')
    
    @yield('main')

    @include('layouts.footer')
    
    <script src="{{ asset('js/jquery.min.js')  }}" type="text/javascript"></script> 
    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/slick.min.js')  }}" type="text/javascript"></script>
    @yield('script')
</body>
</html>