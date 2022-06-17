<!DOCTYPE html>
<html>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-166796966-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-166796966-1');
	</script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" type="image/x-icon" href="deeptrading_frontend/assets/images/favicon.ico">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0, user-scalable=0" />
	<title> | Deep Trading</title>
    @php 
    $name = Route::currentRouteName();
    if($name == 'register'){ 
        echo '<link rel="stylesheet" href="css/style.css">';
    }else{
        echo '<link rel="stylesheet" href="deeptrading_frontend/assets/css/style.css">';
    }
    @endphp
</head>
<body>

<section class="headSec">
	<header class="header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
					<div class="logo">
						<a href="index.php">
							<img src="deeptrading_frontend/assets/images/logo.png">
						</a>
					</div>
					<div id="nav-icon4">
						  <span></span>
						  <span></span>
						  <span></span>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9">
					<div class="mainMenu">
						<ul id="menu">
							<li class="@if (\Route::currentRouteName() == 'home_frontend') active @endif"><a href="{{ route('home_frontend') }}">Home</a></li>
							<li class="@if (\Route::currentRouteName() == 'what_we_do') active @endif"><a href="{{ route('what_we_do') }}">What We Do</a></li>
							<li ><a href="javascript:;">Products</a></li>
							<li class="@if (\Route::currentRouteName() == 'pricing_plan') active @endif"><a href="{{ route('pricing_plan') }}">Pricing Plan</a></li>
							<li class="@if (\Route::currentRouteName() == 'our_story') active @endif"><a href="{{ route('our_story') }}">Our Story</a></li>
							<li class="@if (\Route::currentRouteName() == 'about_us') active @endif"><a href="{{ route('about_us') }}">About Us</a></li>
							<li class="@if (\Route::currentRouteName() == 'contact_us') active @endif"><a href="{{ route('contact_us') }}">Contact Us</a></li>
                            @if (!isset(\Illuminate\Support\Facades\Auth::user()->id))
							<li class="@if (\Route::currentRouteName() == 'login') active @endif"><a href="{{ route('login') }}">Login</a></li>
                            <li class="@if (\Route::currentRouteName() == 'register') active @endif"><a href="{{ route('register') }}">Sign Up</a></li>
                            @else
								@if(\Illuminate\Support\Facades\Auth::user()->Role === 'admin')
                            		<li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
								@else
									<li><a href="{{ route('home') }}">Dashboard</a></li>
								@endif
                            @endif
                        </ul>
					</div>
				</div>
			</div>
		</div>
	</header>
</section>
