<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
            User
        @show
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('css')

</head>

<body>
@yield('container')

@yield('js-footer')
@yield('page-js')
@yield('page-footer')
</body>
</html>