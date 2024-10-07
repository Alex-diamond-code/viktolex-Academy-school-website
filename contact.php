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
	<header id="header" class="header d-flex align-items-center sticky-top">
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
						<a href="portal.php"><b>Portal</b></a>
					</li>
					<!-- <li>
            <a href="blog.php"><b>Blog</b></a>
          </li> -->
					<!-- <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                <li><a href="#">Dropdown 1</a></li>
                <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                    <li><a href="#">Deep Dropdown 1</a></li>
                    <li><a href="#">Deep Dropdown 2</a></li>
                    <li><a href="#">Deep Dropdown 3</a></li>
                    <li><a href="#">Deep Dropdown 4</a></li>
                    <li><a href="#">Deep Dropdown 5</a></li>
                    </ul>
                </li>
                <li><a href="#">Dropdown 2</a></li>
                <li><a href="#">Dropdown 3</a></li>
                <li><a href="#">Dropdown 4</a></li>
                </ul>
            </li> -->
					<li>
						<a href="contact.php" class="active"><b>Contact</b></a>
					</li>
				</ul>
				<i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
			</nav>

			<a class="btn-getstarted" href="admission.php"><b>Get Started</b></a>
		</div>
	</header>

	<!-- About Us Section -->

	<!-- Page Title -->
	<div class="page-title" data-aos="fade">
		<div class="heading">
			<div class="container">
				<div class="row d-flex justify-content-center text-center">
					<div class="">
						<h1 class="">Contact Us</h1>
					</div>
				</div>
			</div>
		</div>
		<nav class="breadcrumbs">
			<div class="container">
				<ol>
					<li><a href="index.php">Home</a></li>
					<li class="current">Contact Us<br /></li>
				</ol>
			</div>
		</nav>
	</div>
	<!-- end Page Title -->

	<!-- Contact section -->
	<section id="contact" class="contact mt-4 mb-5">
		<div class="section-header text-center p-4">
			<h2><b>Contact Us</b></h2>
		</div>
		<div class="container" data-aos="fade-up">
			<div class="row gx-lg-0 gy-4">
				<div class="col-lg-5">
					<div class="info-container d-flex flex-column align-items-center justify-content-center">
						<div class="info-item d-flex">
							<i class="bi bi-geo-alt flex-shrink-0"></i>
							<div>
								<h4>Location:</h4>
								<p>No. 4 Paul Ekpeowo Street, Uyo,</p>
								<p>Akwa Ibom State, Nigeria</p>
							</div>
						</div>
						<!-- End Info Item -->

						<div class="info-item d-flex">
							<i class="bi bi-envelope flex-shrink-0"></i>
							<div>
								<h4>Email:</h4>
								<p>viktolexacademy@gmail.com</p>
							</div>
						</div>
						<!-- End Info Item -->

						<div class="info-item d-flex">
							<i class="bi bi-phone flex-shrink-0"></i>
							<div>
								<h4>Call:</h4>
								<p>08039363903</p>
								<p>08023174342</p>
							</div>
						</div>
						<!-- End Info Item -->

						<div class="info-item d-flex">
							<i class="bi bi-clock flex-shrink-0"></i>
							<div>
								<h4>Open Hours:</h4>
								<p>Mon-Wed: 7:00AM - 3:30PM</p>
								<p>Thurs-Fri: 7:00AM - 2:30PM</p>
							</div>
						</div>
						<!-- End Info Item -->
					</div>
				</div>

				<div class="col-lg-7">
					<form action="resources/assests/forms/contact.php" method="post" role="form" class="php-email-form">
						<div class="row">
							<div class="col-md-6 form-group">
								<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required />
							</div>
							<div class="col-md-6 form-group mt-3 mt-md-0">
								<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required />
							</div>
						</div>
						<div class="form-group mt-3">
							<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required />
						</div>
						<div class="form-group mt-3">
							<textarea class="form-control" name="message" rows="7" placeholder="Message" required></textarea>
						</div>
						<div class="my-3">
							<div class="loading">Loading</div>
							<div class="error-message"></div>
							<div class="sent-message">
								Your message has been sent. Thank you!
							</div>
						</div>
						<div class="text-center">
							<button type="submit">Send Message</button>
						</div>
					</form>
				</div>
				<!-- End Contact Form -->
			</div>
		</div>
	</section>
	<!--  end Contact section -->

	<!-- footer  section-->
	<footer id="footer" class="footer position-relative" data-aos="fade-up" data-aos-delay="300">
		<div class="container footer-top">
			<div class="row gy-4">
				<div class="col-lg-4 col-md-6 footer-about">
					<a href="index.php" class="logo d-flex align-items-center">
						<span class="sitename">
							<img src="resources/images/Logo.png" alt="" />
						</span>
					</a>
					<div class="footer-contact pt-3">
						<p>No. 4 Paul Ekpeowo Street, Uyo,</p>
						<p>Akwa Ibom State, Nigeria</p>
						<p class="mt-3">
							<strong>Phone:</strong> <span>08039363903</span>
							<span>08023174342</span>
						</p>
						<p>
							<strong>Email:</strong> <span>viktolexacademy@gmail.com</span>
						</p>
					</div>
					<div class="social-links d-flex mt-3">
						<a href=""><i class="bi bi-facebook"></i></a>
						<a href=""><i class="bi bi-instagram"></i></a>
						<a href=""><i class="bi bi-twitter-x"></i></a>
						<a href=""><i class="bi bi-linkedin"></i></a>
					</div>
				</div>

				<div class="col-lg-2 col-md-3 footer-links">
					<h4>Navigation</h4>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="about.php">About us</a></li>
						<li><a href="admission.php">Admission</a></li>
						<li><a href="portal.php">Portal</a></li>
						<!-- <li><a href="blog.php">Blog</a></li> -->
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</div>

				<div class="col-lg-2 col-md-3 footer-links">
					<h4>Our Facilities</h4>
					<ul>
						<li>Serene Environment</li>
						<li>Classrooms</li>
						<li>Computer Lab</li>
						<li>Adequate Security</li>
						<li>Playing Equipment</li>
					</ul>
				</div>

				<div class="col-lg-4 col-md-12 footer-newsletter">
					<h4>Our Newsletter</h4>
					<p>
						Subscribe to our newsletter and receive the latest news about our
						products and services!
					</p>
					<form action="forms/newsletter.php" method="post" class="php-email-form">
						<div class="newsletter-form">
							<input type="email" name="email" /><input type="submit" value="Subscribe" />
						</div>
						<div class="loading">Loading</div>
						<div class="error-message"></div>
						<div class="sent-message">
							Your subscription request has been sent. Thank you!
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="container-fluid copyright text-center mt-4">
			<p>
				© <span>Copyright</span>
				<strong class="px-1 sitename">Viktolex Academy</strong>
				<span>All Rights Reserved</span>
			</p>
			<div class="credits">Developed by Alex Diamond Victor</div>
		</div>
	</footer>
	<!-- footer  section-->

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