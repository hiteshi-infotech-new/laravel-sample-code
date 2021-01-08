<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>My e-commerce website</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="{{ asset('frontend_theme/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">      
		<link href="{{ asset('frontend_theme/bootstrap/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
		
		<link href="{{ asset('frontend_theme/themes/css/bootstrappage.css')}}" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="{{ asset('frontend_theme/themes/css/flexslider.css')}}" rel="stylesheet"/>
		<link href="{{ asset('frontend_theme/themes/css/main.css')}}" rel="stylesheet"/>

		<!-- scripts -->
		<script src="{{ asset('frontend_theme/themes/js/jquery-1.7.2.min.js')}}"></script>
		<script src="{{ asset('frontend_theme/bootstrap/js/bootstrap.min.js')}}"></script>				
		<script src="{{ asset('frontend_theme/themes/js/superfish.js')}}"></script>	
		<script src="{{ asset('frontend_theme/themes/js/jquery.scrolltotop.js')}}"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js')}}"></script>
			<script src="js/respond.min.js')}}"></script>
		<![endif]-->
	</head>
    <body>		
		<div id="top-bar" class="container">
			<div class="row">
				<div class="span4">
					<form method="POST" class="search_form">
						<input type="text" class="input-block-level search-query" Placeholder="eg. T-sirt">
					</form>
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">				
							<!-- <li><a href="#">My Account</a></li> -->
							<li><a href="cart.html">Your Cart</a></li>
							<li><a href="checkout.html">Checkout</a></li>					
							@guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                    @if( Auth::user()->profile)
                                    <img src="{{ asset('/storage/images/'.Auth::user()->profile) }}" width="20"> <span class="caret"></span>
                                    @else
                                    <img src="{{ asset('/storage/images/user.png')}}" width="20"> <span class="caret"></span>
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest		
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
    	<section class="navbar main-menu">
        <div class="navbar-inner main-menu">				
            <a href="index.html" class="logo pull-left"><img src="{{ asset('frontend_theme/themes/images/logo.png')}}" class="site_logo" alt=""></a>
            <nav id="menu" class="pull-right">
			
                <ul>
					@foreach($categories as $category)
                    <li><a href="./products.html">{{ $category->name }}</a>					
                        <!-- <ul>
                            <li><a href="./products.html">Lacinia nibh</a></li>									
                            <li><a href="./products.html">Eget molestie</a></li>
                            <li><a href="./products.html">Varius purus</a></li>									
                        </ul> -->
                    </li>															
                    @endforeach
                	</ul>
            	</nav>
			</div>
		</section>
			@yield('content')
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Navigation</h4>
						<ul class="nav">
							<li><a href="./index.html">Homepage</a></li>  
							<li><a href="./about.html">About Us</a></li>
							<li><a href="./contact.html">Contac Us</a></li>
							<li><a href="./cart.html">Your Cart</a></li>
							<li><a href="./register.html">Login</a></li>							
						</ul>					
					</div>
					<div class="span4">
						<h4>My Account</h4>
						<ul class="nav">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Order History</a></li>
							<li><a href="#">Wish List</a></li>
							<li><a href="#">Newsletter</a></li>
						</ul>
					</div>
					<div class="span5">
						<p class="logo"><img src="themes/images/logo.png" class="site_logo" alt=""></p>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. the  Lorem Ipsum has been the industry's standard dummy text ever since the you.</p>
						<br/>
						<span class="social_icons">
							<a class="facebook" href="#">Facebook</a>
							<a class="twitter" href="#">Twitter</a>
							<a class="skype" href="#">Skype</a>
							<a class="vimeo" href="#">Vimeo</a>
						</span>
					</div>					
				</div>	
			</section>
			<section id="copyright">
				<span>Copyright 2013 bootstrappage template  All right reserved.</span>
			</section>
	</div>
		<script src="{{ asset('frontend_theme/themes/js/common.js')}}"></script>
		<script src="{{ asset('frontend_theme/themes/js/jquery.flexslider-min.js')}}"></script>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>
    </body>
</html>