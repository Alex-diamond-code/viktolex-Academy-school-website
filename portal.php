<?php

session_start();
error_reporting(0);

require './dashboard/controller/connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- title and favicon -->
	<title>viktolex academy-go higher-home</title>
	<link rel="shortcut icon" href="resources/images/new logo.png" type="image/x-icon" />

	<!-- description of webpage -->
	<meta name="description"
		content="Welcome to Viktolex academy a dynamic learning community dedicated to fostering excellence in the education world." />
	<meta name="keywords" content="curricullum, student portal, admmission, E-resources, about us." />

	<!-- bootstrap/assests css file links-->
	<link rel="stylesheet" href="resources/assests/bootstrap-icons/bootstrap-icons.css" />
	<link rel="stylesheet" href="resources/css_file/bootstrap.css" />
	<link rel="stylesheet" href="resources/assests/aos/aos.css" />

	<!-- main css file link -->
	<link rel="stylesheet" href="resources/css_file/main.css" />
	<link rel="stylesheet" href="resources/css_file/responsive.css" />

	<noscript> your browser does not support this code base </noscript>
</head>

<body>
	<div id="preloader"></div>

	<!-- navbar section -->
	<header id="header" class="header d-flex align-items-center sticky-top shadow">
		<div class="container-fluid container-xl position-relative d-flex align-items-center">
			<a href="index.php" class="logo d-flex align-items-center me-auto">
				<img src="resources/images/Logo.png" alt="" />
				<!-- <h1 class="sitename">Viktolex Academy</h1> -->
			</a>

			<nav id="navmenu" class="navmenu">
				<ul>
					<li>
						<a href="index.php"><b>Home</b></a>
					</li>
					<li>
						<a href="about.php"><b>About</b></a>
					</li>
					<li>
						<a href="admission.php"><b>Admission</b></a>
					</li>
					<li>
						<a href="portal.php" class="active"><b>Portal</b></a>
					</li>
					<!-- <li>
            			<a href="blog.php"><b>Blog</b></a>
          			</li> -->
					<li>
						<a href="contact.php"><b>Contact</b></a>
					</li>
				</ul>
				<i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
			</nav>

			<a class="btn-getstarted" href="admission.php"><b>Get Started</b></a>
		</div>
	</header>

	<!-- page content -->
	<br>
	<div class="mx-lg-5 mx-md-5 mx-sm-2 mx-2" style="min-width: 320px !important;">

		<?php echo $_SESSION['message'];
		unset($_SESSION['message']);
		?>
	</div>
	<div class="container portal_content mt-1">
		<form class="form" method="POST" action="./dashboard/controller/server.php">
			<p class="form-title">Welcome back to school</p>
			<p class="form-sub-title">We missed you</p>
			<div class="input-container">
				<input placeholder="Enter your username" type="text" name="username" required>
			</div>
			<div class="input-container">
				<input placeholder="Enter your password" type="password" name="password" required>
			</div>
			<button class="btn btn-success w-100 py-3" type="submit" name="login_btn">Login</button>
		</form>
		<style>
			.form {
				background-color: #fff;
				display: block;
				padding: 1rem;
				width: 600px;
				min-width: 320px;
				border: 1px solid #922f34;
				border-radius: 0.5rem;
				box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
				font-family: 'poppins';
			}

			.form-title {
				margin-top: 20px;
				font-size: 1.25rem;
				line-height: .5rem;
				font-weight: 600;
				text-align: center;
				color: #000;
			}

			.form-sub-title {
				font-size: 0.9rem;
				line-height: 1rem;
				font-weight: 600;
				text-align: center;
				color: #000;
			}

			.input-container {
				position: relative;
			}

			.input-container input,
			.form button {
				outline: none;
				border: 1px solid #e5e7eb;
				margin: 8px 0;
			}

			.input-container input {
				background-color: #fff;
				padding: 1rem;
				padding-right: 3rem;
				font-size: 1.2rem;
				line-height: 1.5rem;
				width: 100%;
				border-radius: 0.5rem;
				box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
			}
		</style>

	</div>


	<!-- footer -->
	<footer id="footer" class="footer position-relative mt-5 bg-white">

		<div class="container-fluid copyright text-center position-fixed bottom-0" style="background-color: #efefef;">
			<p>
				© <span>Copyright</span>
				<strong class="px-1 sitename">Viktolex Academy</strong>
				<span>All Rights Reserved</span>
			</p>
			<div class="credits">Developed by Alex Diamond Victor</div>
		</div>
	</footer>

	<!-- back to top -->
	<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
		<i class="bi bi-arrow-up-short"></i>
	</a>

	<!-- script section -->
	<script src="resources/js_file/main.js"></script>
	<script src="resources/assests/aos/aos.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>