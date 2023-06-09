<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>ONG-ACID</title>

    <!-- Fonts Family -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">    <!---->
    <!---->

    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="{{ asset('font-awesome/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/brands.css') }}">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/solid.css') }}">
    <!---->

    <!-- Remix Icon Link -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
    <!---->

    <!-- Bootstrap 5 Link -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <!---->

    <!-- Style css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!---->
    <title></title>
</head>

@yield('auth_content')

<script src="{{ asset('js/index.js') }}"></script>
<script src="{{ asset('js/showpassword.js') }}"></script>
</body>
</html>
