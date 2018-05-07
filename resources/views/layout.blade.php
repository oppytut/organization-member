<!DOCTYPE html>
<html>
	<head>
		<!-- Kepo, ih! -->
		<meta charset="utf-8">
		<title>Organization Member's - @yield('title')</title>

		<!-- Favicon -->
		<link rel="icon" href="/favicon/16x16.ico" size="16x16">
		<link rel="icon" href="/favicon/32x32.ico" size="32x32">
		<link rel="icon" href="/favicon/48x48.ico" size="48x48">

		<!-- CSS -->
		<link rel="stylesheet" href="/css/bootstrap.min.css">
		<link rel="stylesheet" href="/css/main.css">
		@yield('css')
	</head>
	<body style="background: #e3e3e3;">
		<div class="container-fluid">
			<!-- Header -->
			<div class="row">
				<div class="col" style="padding: 0px;">
					<nav class="navbar navbar-light" style="
						background-color: #4cb6e0;
						height: 60px;
					">
						<a class="navbar-brand" href="/" style="color: white; font-size: 15px;">
							<img src="/icon/24x24.png" alt="">
							<span class="align-middle">
								Organization Member's
							</span>
						</a>
					</nav>
				</div>
			</div>

			<!-- Content -->
			@yield('content')

			<!-- Footer -->
			<div class="row">
				<div class="col text-center" style="
					background: #dfdfdf;
					color: rgba(135, 135, 135, 0.91);
					font-size: 12px;
					height: 45px;
					padding: 10px;
				">
					Handcrafted with
					<i class="fas fa-heart" style="color: rgba(255, 0, 108, 0.69);"></i>
					by <b><a href="https://github.com/oppytut" style="text-decoration: none; color: rgba(135, 135, 135, 0.91);" target="_blank">Oppytut</a></b>
				</div>
			</div>
		</div>

		<!-- JavaScript (influential sequence) -->
		<script src="/js/jquery-3.3.1.slim.min.js"></script>
		<script src="/js/popper.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/fontawesome-all.js"></script>
		@yield('js')
	</body>
</html>
