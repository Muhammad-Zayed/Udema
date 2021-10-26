<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Udema a modern educational site template">
    <meta name="author" content="Ansonika">
    <title>UDEMA | Modern Educational site template - SHARED ON THEMELOCK.COM</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- BASE CSS -->
    <link href="/website/css/bootstrap.min.css" rel="stylesheet">
    <link href="/website/css/style.css" rel="stylesheet">
	<link href="/website/css/vendors.css" rel="stylesheet">
	<link href="/website/css/icon_fonts/css/all_icons.min.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="/website/css/custom.css" rel="stylesheet">

</head>

<body id="register_bg">
	
	<nav id="menu" class="fake_menu"></nav>
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->
	
	<div id="login">
		@yield('content')
	</div>
	<!-- /login -->
	
	<!-- COMMON SCRIPTS -->
    <script src="/website/js/jquery-2.2.4.min.js"></script>
    <script src="/website/js/common_scripts.js"></script>
    <script src="/website/js/main.js"></script>
	<script src="/website/assets/validate.js"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="/website/js/pw_strenght.js"></script>
  
</body>
</html>