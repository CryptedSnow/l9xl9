<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.css') }}"/>
    <script type="text/javascript" href="{{ url('js/bootstrap.js') }}"></script>
    <script src="https://kit.fontawesome.com/41b4cd8ba8.js" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
</head>
<body>

@yield('content')

</body>
</html>