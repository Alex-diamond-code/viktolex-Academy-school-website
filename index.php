<?php
require 'dashboard/controller/connection.php';

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
	<header id="header" class="header d-flex align-items-center sticky-top">
		<div class="container-fluid container-xl position-relative d-flex align-items-center">
			<a href="index.php" class="logo d-flex align-items-center me-auto">
				<img src="resources/images/Logo.png" alt="" />
				<!-- <h1 class="sitename">Viktolex Academy</h1> -->
			</a>

			<nav id="navmenu" class="navmenu">
				<ul>
					<li>
						<a href="index.php" class="active"><b>Home</b></a>
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
						<a href="contact.php"><b>Contact</b></a>
					</li>
				</ul>
				<i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
			</nav>

			<a class="btn-getstarted" href="admission.php"><b>Get Started</b></a>
		</div>
	</header>

	<header class="hero-section">
		<div class="welcome-message" data-aos="fade-up" data-aos-delay="400">
			<img src="resources/images/new logo.png" width="50%" />
			<h1 style="font-size: 45px">VIKTOLEX ACADEMY</h1>
			<br /><br />
			<p>
				Home of academic excellence and morals, a dynamic learning community
				dedicated to fostering excellence in the education world.
			</p>
			<a class="btn-getstarted" href="admission.php"><b>Get Started</b></a>
		</div>
	</header>

	<!-- quick msg -->
	<div class="quick_msg m-4">
		<div class="container text-center">
			<div class="card-group justify-content-between">
				<div class="card" data-aos="fade-up" data-aos-delay="200">
					<div style="margin-left: 65px; margin-right: 65px">
						<img src="resources/images/svg/baby-carriage-svgrepo-com.svg"
							class="card-img-top p-3 rounded-circle bg-primary mt-3"
							alt="resources/images/svg/baby-carriage-svgrepo-com.svg" />
					</div>
					<div class="card-body">
						<h5 class="card-title"><b>Crèche</b></h5>
						<p class="card-text">
							The Crèche caters for babies from age 3 to 18 months in a warm
							and homely environment.
						</p>
					</div>
				</div>
				<div class="card" data-aos="fade-up" data-aos-delay="200">
					<div style="margin-left: 65px; margin-right: 65px">
						<img src="resources/images/svg/classroom-kindergarten-svgrepo-com.svg"
							class="card-img-top p-3 rounded-circle bg-warning mt-3"
							alt="resources/images/svg/classroom-kindergarten-svgrepo-com.svg" />
					</div>
					<div class="card-body">
						<h5 class="card-title"><b>Preschool</b></h5>
						<p class="card-text">
							The Pre-school is a specially-prepared environment, laying a
							solid foundation for children aged 18 months to 5+.
						</p>
					</div>
				</div>
				<div class="card" data-aos="fade-up" data-aos-delay="200">
					<div style="margin-left: 65px; margin-right: 65px">
						<img src="resources/images/svg/school-planner-svgrepo-com.svg"
							class="card-img-top p-3 rounded-circle bg-success mt-3"
							alt="resources/images/svg/school-planner-svgrepo-com.svg" />
					</div>
					<div class="card-body">
						<h5 class="card-title"><b>Grade</b></h5>
						<p class="card-text">
							The primary formative years are set to achieve a secure level of
							functionality and effectiveness in the core skills.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid bg-accent-color">
		<br /><br />
		<div class="container">
			<h2 class="text-white"><b>Announcements</b></h2>
			<div class="card-group">
				<div class="card border-0 m-2 rounded" data-aos="fade-up" data-aos-delay="200">
					<img src="resources/images/blog/news1.jpg" class="card-img-top" alt="..." />
					<div class="card-body">
						<h5 class="card-title"><b>News 1</b></h5>
						<p class="card-text">
							This is a wider card with supporting text below as a natural
							lead-in to additional content. This card has even longer content
							than the first to show that equal height action.
						</p>
						<a class="btn-getstarted1" href="blog.php"><b>Read More...</b></a>
					</div>
				</div>
				<div class="card border-0 m-2 rounded" data-aos="fade-up" data-aos-delay="200">
					<img src="resources/images/blog/news2.jpg" class="card-img-top" alt="..." />
					<div class="card-body">
						<h5 class="card-title"><b>News 2</b></h5>
						<p class="card-text">
							This is a wider card with supporting text below as a natural
							lead-in to additional content. This card has even longer content
							than the first to show that equal height action.
						</p>
						<a class="btn-getstarted1" href="blog.php"><b>Read More...</b></a>
					</div>
				</div>
				<div class="card border-0 m-2 rounded" data-aos="fade-up" data-aos-delay="200">
					<img src="resources/images/blog/news3.jpg" class="card-img-top" alt="..." />
					<div class="card-body">
						<h5 class="card-title"><b>News 3</b></h5>
						<p class="card-text">
							This is a wider card with supporting text below as a natural
							lead-in to additional content. This card has even longer content
							than the first to show that equal height action.
						</p>
						<a class="btn-getstarted1" href="blog.php"><b>Read More...</b></a>
					</div>
				</div>
			</div>
		</div>
		<br /><br />
	</div>

	<!-- counter section -->
	<section class="counter-section container-fluid">
		<div class="container" data-aos="fade-up" data-aos-delay="200">
			<div class="counter">
				<div class="icon">🎓</div>
				<?php
				$query = "SELECT * FROM users WHERE usertype='student'";
				$run_query = mysqli_query($con, $query);

				$result = mysqli_num_rows($run_query);

				if ($result) {
				?>
					<p class="number" data-target="<?= $result ?>">0</p>
				<?php } elseif ($result <= 0) {
				?>
					<p class="number" data-target="0">0</p>
				<?php } ?>
				<!-- <div class="number" data-target="100">0</div> -->
				<h3>Students</h3>
			</div>
			<div class="counter">
				<div class="icon">👩‍🏫</div>
				<?php
				$query = "SELECT * FROM teacher WHERE usertype='teacher'";
				$run_query = mysqli_query($con, $query);

				$result = mysqli_num_rows($run_query);

				if ($result) {
				?>
					<p class="number" data-target="<?= $result ?>">0</p>
				<?php } elseif ($result <= 0) {
				?>
					<p class="number" data-target="0">0</p>
				<?php } ?>
				<!-- <div class="number" data-target="15">0</div> -->
				<h3>Teachers</h3>
			</div>
			<div class="counter">
				<div class="icon">📝</div>
				<div class="number" data-target="50">0</div>
				<h3>Reviews</h3>
			</div>
			<div class="counter">
				<div class="icon">💬</div>
				<div class="number" data-target="3">0</div>
				<h3>Languages</h3>
			</div>
		</div>
	</section>

	<!-- Why Us Section -->
	<section id="why-us" class="section why-us">
		<div class="container">
			<br /><br />
			<div class="row gy-4">
				<div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
					<div class="why-box">
						<h3>Why Choose Us</h3>
						<p>
							Welcome to Viktolex Academy, where education meets inspiration.
							Our commitment to excellence drives every aspect of our
							community. Our dedicated educators blend expertise with passion,
							ensuring personalized attention for every student. We’re not
							just a school; we’re a family. Our commitment extends beyond
							textbooks—we nurture character, resilience, and lifelong
							learning.
						</p>
						<div class="text-center">
							<a href="about.php" class="more-btn"><span>Learn More</span> <i class="bi bi-chevron-right"></i></a>
						</div>
					</div>
				</div>
				<!-- End Why Box -->

				<div class="col-lg-8 d-flex align-items-stretch">
					<div class="row gy-4">
						<div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
							<div class="icon-box d-flex flex-column justify-content-center align-items-center">
								<i class="bi bi-backpack2"></i>
								<h4><b>Quality Education</b></h4>
								<p>
									Experience top-notch learning with our expert teachers and
									cutting-edge curriculum, designed to empower every student
									to achieve their full potential.
								</p>
							</div>
						</div>
						<!-- End Icon Box -->

						<div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
							<div class="icon-box d-flex flex-column justify-content-center align-items-center">
								<i class="bi bi-clipboard-data"></i>
								<h4><b>Quality rating</b></h4>
								<p>
									Our school consistently receives top ratings for delivering
									high-quality education and exceptional student support,
									ensuring academic excellence and personal growth.
								</p>
							</div>
						</div>
						<!-- End Icon Box -->

						<div class="col-xl-4" data-aos="fade-up" data-aos-delay="500">
							<div class="icon-box d-flex flex-column justify-content-center align-items-center">
								<i class="bi bi-house-check-fill"></i>
								<h4><b>Quality Infrastructures</b></h4>
								<p>
									Our modern, state-of-the-art facilities provide an optimal
									environment for learning, creativity, and personal growth.
								</p>
							</div>
						</div>
						<!-- End Icon Box -->
					</div>
				</div>
			</div>
			<br /><br />
		</div>
	</section>

	<!-- footer -->
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