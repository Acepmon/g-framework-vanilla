<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Single - Future Imperfect by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="{{ asset('future-imperfect/js/ie/html5shiv.js') }}"></script><![endif]-->
		<link rel="stylesheet" href="{{ asset('future-imperfect/css/main.css') }}" />
		<!--[if lte IE 9]><link rel="stylesheet" href="{{ asset('future-imperfect/css/ie9.css') }}" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="{{ asset('future-imperfect/css/ie8.css') }}" /><![endif]-->
	</head>
	<body class="single">

		<!-- Wrapper -->
			<div id="wrapper">

                @include('themes.future-imperfect.includes.header')

                @include('themes.future-imperfect.includes.menu')

				<!-- Main -->
					<div id="main">

						<!-- Post -->
							<article class="post">
                                @yield('content')
							</article>

					</div>

				<!-- Footer -->
					<section id="footer">
						<ul class="icons">
							<li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="fa-rss"><span class="label">RSS</span></a></li>
							<li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li>
						</ul>
						<p class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>. Images: <a href="http://unsplash.com">Unsplash</a>.</p>
					</section>

			</div>

		<!-- Scripts -->
            <script src="{{ asset('future-imperfect/js/jquery.min.js') }}"></script>
            <script src="{{ asset('future-imperfect/js/skel.min.js') }}"></script>
            <script src="{{ asset('future-imperfect/js/util.js') }}"></script>
            <!--[if lte IE 8]><script src="{{ asset('future-imperfect/js/ie/respond.min.js') }}"></script><![endif]-->
            <script src="{{ asset('future-imperfect/js/main.js') }}"></script>

	</body>
</html>
