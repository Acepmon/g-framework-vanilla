<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Future Imperfect by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="{{ asset('future-imperfect/js/ie/html5shiv.js') }}"></script><![endif]-->
		<link rel="stylesheet" href="{{ asset('future-imperfect/css/main.css') }}" />
		<!--[if lte IE 9]><link rel="stylesheet" href="{{ asset('future-imperfect/css/ie9.css') }}" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="{{ asset('future-imperfect/css/ie8.css') }}" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

                @include('themes.future-imperfect.includes.header')

                @include('themes.future-imperfect.includes.menu')

				<!-- Menu -->
					<section id="menu">

						<!-- Search -->
							<section>
								<form class="search" method="get" action="#">
									<input type="text" name="query" placeholder="Search" />
								</form>
							</section>

						<!-- Links -->
							<section>
								<ul class="links">
									<li>
										<a href="#">
											<h3>Lorem ipsum</h3>
											<p>Feugiat tempus veroeros dolor</p>
										</a>
									</li>
									<li>
										<a href="#">
											<h3>Dolor sit amet</h3>
											<p>Sed vitae justo condimentum</p>
										</a>
									</li>
									<li>
										<a href="#">
											<h3>Feugiat veroeros</h3>
											<p>Phasellus sed ultricies mi congue</p>
										</a>
									</li>
									<li>
										<a href="#">
											<h3>Etiam sed consequat</h3>
											<p>Porta lectus amet ultricies</p>
										</a>
									</li>
								</ul>
							</section>

						<!-- Actions -->
							<section>
								<ul class="actions vertical">
									<li><a href="#" class="button big fit">Log In</a></li>
								</ul>
							</section>

					</section>

				<!-- Main -->
					<div id="main">

						@yield('content')

					</div>

                @include('themes.future-imperfect.includes.sidebar')

			</div>

		<!-- Scripts -->
			<script src="{{ asset('future-imperfect/js/jquery.min.js') }}"></script>
			<script src="{{ asset('future-imperfect/js/skel.min.js') }}"></script>
			<script src="{{ asset('future-imperfect/js/util.js') }}"></script>
            <!--[if lte IE 8]><script src="{{ asset('future-imperfect/js/ie/respond.min.js') }}"></script><![endif]-->
			<script src="{{ asset('future-imperfect/js/main.js') }}"></script>

	</body>
</html>
