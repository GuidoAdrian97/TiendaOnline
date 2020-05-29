<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<title>@yield('titulo')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="KasleGlam Store">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">

    <script src="https://kit.fontawesome.com/4df93e2e69.js" crossorigin="anonymous"></script>


<link rel="stylesheet" type="text/css" href="{{ asset('PlantillaTienda/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}">




@yield('estilos')
</head>
<body>
<div id="app">
	

<!-- Menu -->

		<div class="menu" style=" background-color: #171316;" >
			<div class="logo">
						<a href="" >
							<div  class="d-flex flex-row align-items-center justify-content-start">
								<img width="70" height="60" src="{{ asset('imagenes/1581130028033.png')}}" alt="">
								<div style=" color: #41edf1; ">@yield('titulo') Store</div>
							</div>

						</a>	
					</div>
			
				
					<ul  class="d-flex flex-row align-items-start justify-content-start">
				@guest
					 <li  class="nav-item dropdown">
					 	<a style=" color: #fd5092; " id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   <i class="nav-icon far fa-user fa-lg"></i> Ingresar
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        	 <a style=" color: #fd5092; " class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        	 <a style=" color: #fd5092; " class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </div>
					 </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
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
				</nav>
			
			<!-- Search -->
			<div class="menu_search">
				<form action="#" id="menu_search_form" class="menu_search_form">
					<input type="text" class="search_input" placeholder="Search Item" required="required">
					<button class="menu_search_button"><img src="{{ asset('PlantillaTienda/images/search.png')}}" alt=""></button>
				</form>
			</div>
			<!-- Navigation -->
			<div class="menu_nav">
				<ul>

					<li><a href="#">Mujer</a></li>
					<li><a href="#">Hombre</a></li>
					<li><a href="#">Niños</a></li>
					
				</ul>
			</div>
			<!-- Contact Info -->
			<div class="menu_contact">
				
				<div class="menu_social">
					<ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">

						<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="super_container">

			<!-- Header -->

			<header class="header">

				<div class="header_overlay"></div>

				<div style=" background-color: #171316; " class="header_content d-flex flex-row align-items-center justify-content-start">
					<div class="logo">
						<a href="" >
							<div  class="d-flex flex-row align-items-center justify-content-start">
								<img width="70" height="60" src="{{ asset('imagenes/1581130028033.png')}}" alt="">
								<div style=" color: #41edf1; ">@yield('titulo') Store</div>
							</div>

						</a>	
					</div>
					<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
					<nav class="main_nav">
						<ul class="d-flex flex-row align-items-start justify-content-start">
							<li  class="active"><a href="#">Women</a></li>
							<li><a href="#">Men</a></li>
							<li><a href="#">Kids</a></li>
						</ul>
					</nav>
					<div class="wrapper">					
					</div>
					<div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
						<!-- Search -->
						<div class="header_search">
							<form action="#" id="header_search_form">
								<input type="text" class="search_input" placeholder="Search Item" required="required">
								<button class="header_search_button"><img src="{{ asset('PlantillaTienda/images/search.png')}}" alt=""></button>
							</form>
						</div>
						
						<!-- Cart -->
						<div class="cart"><a href="cart.html"><div><img class="svg" src="{{ asset('PlantillaTienda/images/cart.svg')}}" alt="https://www.flaticon.com/authors/freepik"><div>1</div></div></a></div>
						<!-- Phone -->
						<div class="header_phone d-flex flex-row align-items-center justify-content-start">
							
							<div><i  class="fab fa-whatsapp fa-2x"></i></div>
						</div>
					</div>
					<nav class="main_nav">
						<ul class="d-flex flex-row align-items-start justify-content-start">
					 @guest
					 <li class="nav-item dropdown">
					 	<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   <i  class="nav-icon far fa-user fa-lg"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        	 <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        	 <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </div>
					 </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
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
					</nav>

					
				</div>

			</header>
		</div>  
		
		@yield('contenido')

				<!-- Footer -->

				<footer class="footer">
					<div class="footer_content">
						<div class="container">
							<div class="row">
								
								<!-- About -->
								<div class="col-lg-4 footer_col">
									<div class="footer_about">
										<div class="footer_logo">
											<a href="#">
												<div class="d-flex flex-row align-items-center justify-content-start">
													<div class="footer_logo_icon"><img src="{{ asset('PlantillaTienda/images/logo_2.png')}}" alt=""></div>
													<div>@yield('titulo') Store</div>
												</div>
											</a>		
										</div>
										<div class="footer_about_text">
											<p>Donde encuetras los mejores productos de belleza, de calidad dandoles diferentes gamas y precios.</p>
											<p>Si necesitas mas informacion puedes contactarnos el siguiente numero +593 980013638</p>
										</div>
									</div>
								</div>

								<!-- Footer Links -->
								<div class="col-lg-4 footer_col">
									<div class="footer_menu">
										<div class="footer_title">Soporte</div>
										<ul class="footer_list">
											<li>
												<a href="#"><div>Customer Service<div class="footer_tag_1">online now</div></div></a>
											</li>
											<li>
												<a href="#"><div>Return Policy</div></a>
											</li>
											<li>
												<a href="#"><div>Size Guide<div class="footer_tag_2">recommended</div></div></a>
											</li>
											<li>
												<a href="#"><div>Terms and Conditions</div></a>
											</li>
											<li>
												<a href="#"><div>Contact</div></a>
											</li>
										</ul>
									</div>
								</div>

								<!-- Footer Contact -->
								<div class="col-lg-4 footer_col">
									<div class="footer_contact">
										<div class="footer_title">Mantente en contacto</div>
										<div class="newsletter">
											<form action="#" id="newsletter_form" class="newsletter_form">
												<input type="email" class="newsletter_input" placeholder="Suscríbete a nuestro boletín" required="required">
												<button class="newsletter_button">+</button>
											</form>
										</div>
										<div class="footer_social">
											<div class="footer_title">Social</div>
											<ul class="footer_social_list d-flex flex-row align-items-start justify-content-start">
												<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="footer_bar">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="footer_bar_content d-flex flex-md-row flex-column align-items-center justify-content-start">
										<div class="copyright order-md-1 order-2"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
		Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
		<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
										<nav class="footer_nav ml-md-auto order-md-2 order-1">
											<ul class="d-flex flex-row align-items-center justify-content-start">
												
												<li><a href="#">Contact</a></li>
											</ul>
										</nav>
									</div>
								</div>
							</div>
						</div>
					</div>
				</footer>
			</div>
				
		</div>

		<script src="{{ asset('PlantillaTienda/js/jquery-3.2.1.min.js')}}"></script>
		<!-- Scripts -->
		
		    <script src="{{ asset('js/app.js') }}" defer></script>
		    <script src="{{ asset('js/all.js') }}" defer></script>
</div>


</body>
</html>