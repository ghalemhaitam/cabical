<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="utf-8">
    <title>Login Cabi Cal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="author" content="Prakasam Mathaiyan">
    <meta name="description" content="Cabi Cal L'application De Gestion Docteur ">

    <!--[if IE]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="{{URL::asset('assets/assetsAdmin/plugins/lib/modernizr.js')}}"></script>
    <link rel="icon" href="{{URL::asset('assets/assetsAdmin/images/icon_app.png')}}" type="image/gif">

    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/assetsAdmin/plugins/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/assetsAdmin/plugins/animate-it/animate.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/assetsAdmin/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/assetsAdmin/css/style-default.css')}}">
</head>

<body class="login2">

@yield('content')


@yield('script_section')


</body>