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
	<link rel="stylesheet" href="resources/assests/swiper/swiper-bundle.min.css" />

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
						<a href="about.php" class="active"><b>About</b></a>
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

	<!-- Page Title -->
	<div class="page-title" data-aos="fade">
		<div class="heading">
			<div class="container">
				<div class="row d-flex justify-content-center text-center">
					<div class="">
						<h1 class="">About Us</h1>
					</div>
				</div>
			</div>
		</div>
		<nav class="breadcrumbs">
			<div class="container">
				<ol>
					<li><a href="index.php">Home</a></li>
					<li class="current">About Us<br /></li>
				</ol>
			</div>
		</nav>
	</div>
	<!--end Page Title -->

	<!-- About Us Section -->
	<section id="about-us" class="section about-us mb-5 mt-4">
		<div class="container">
			<div class="row gy-4 align-items-center">
				<div class="col-lg-6 order-1 order-lg-2 d-flex align-items-center justify-content-center" data-aos="fade-up"
					data-aos-delay="100">
					<img src="resources/images/new logo.png" class="img-fluid" alt="" width="80%" />
				</div>

				<div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
					<h3>Welcome to Viktolex Academy</h3>
					<p class="fst-italic">
						Home of academic excellence and morals, a dynamic learning
						community dedicated to fostering excellence in the education
						world.
					</p>
					<ul>
						<li>
							<i class="bi bi-check-circle"></i>
							<span>Experience top-notch learning.</span>
						</li>
						<li>
							<i class="bi bi-check-circle"></i>
							<span>High-quality education and exceptional student support.</span>
						</li>
						<li>
							<i class="bi bi-check-circle"></i>
							<span>We’re not just a school, we’re a family.</span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<!--end About Us Section -->

	<!-- mission & vision statement -->
	<section id="about-us" class="section about-us mb-5 mt-4">
		<div class="container">
			<div class="row gy-4 align-items-center">
				<div class="col-lg-6 d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="100">
					<img src="resources/images/svg/dart-mission-goal-success-svgrepo-com.svg" class="img-fluid" alt=""
						width="80%" />
				</div>

				<div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
					<h3>Mission</h3>
					<p class="fst-italic">
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores,
						impedit praesentium voluptates temporibus aliquid voluptas ea
						fugit debitis accusamus quod dicta illum cum repellendus at
						suscipit officia rerum nulla quis?
					</p>
					<h3>Vision</h3>
					<p class="fst-italic">
						Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores,
						impedit praesentium voluptates temporibus aliquid voluptas ea
						fugit debitis accusamus quod dicta illum cum repellendus at
						suscipit officia rerum nulla quis?
					</p>
				</div>
			</div>
		</div>
	</section>
	<!--end mission & vision statement -->

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
	<!--end counter section -->

	<!-- Testimonials Section -->
	<section id="testimonials" class="testimonials section mt-4 mb-4">
		<!-- Section Title -->
		<div class="container section-title" data-aos="fade-up">
			<h2><b>Testimonials</b></h2>
		</div>
		<!-- End Section Title -->

		<div class="container" data-aos="fade-up" data-aos-delay="100">
			<div class="swiper">
				<script type="application/json" class="swiper-config">
					{
						"loop": true,
						"speed": 600,
						"autoplay": {
							"delay": 5000
						},
						"slidesPerView": "auto",
						"pagination": {
							"el": ".swiper-pagination",
							"type": "bullets",
							"clickable": true
						},
						"breakpoints": {
							"320": {
								"slidesPerView": 1,
								"spaceBetween": 40
							},
							"1200": {
								"slidesPerView": 2,
								"spaceBetween": 20
							}
						}
					}
				</script>
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<div class="testimonial-wrap">
							<div class="testimonial-item">
								<img src="resources/images/testimonial/person-1.jpg" class="testimonial-img" alt="" />
								<h3>Saul Goodman</h3>
								<h4>Ceo &amp; Founder</h4>
								<div class="stars">
									<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
										class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
								</div>
								<p>
									<i class="bi bi-quote quote-icon-left"></i>
									<span>Proin iaculis purus consequat sem cure digni ssim donec
										porttitora entum suscipit rhoncus. Accusantium quam,
										ultricies eget id, aliquam eget nibh et. Maecen aliquam,
										risus at semper.</span>
									<i class="bi bi-quote quote-icon-right"></i>
								</p>
							</div>
						</div>
					</div>
					<!-- End testimonial item -->

					<div class="swiper-slide">
						<div class="testimonial-wrap">
							<div class="testimonial-item">
								<img src="resources/images/testimonial/person-3.jpg" class="testimonial-img" alt="" />
								<h3>Sara Wilsson</h3>
								<h4>Designer</h4>
								<div class="stars">
									<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
										class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
								</div>
								<p>
									<i class="bi bi-quote quote-icon-left"></i>
									<span>Export tempor illum tamen malis malis eram quae irure
										esse labore quem cillum quid cillum eram malis quorum
										velit fore eram velit sunt aliqua noster fugiat irure amet
										legam anim culpa.</span>
									<i class="bi bi-quote quote-icon-right"></i>
								</p>
							</div>
						</div>
					</div>
					<!-- End testimonial item -->

					<div class="swiper-slide">
						<div class="testimonial-wrap">
							<div class="testimonial-item">
								<img src="resources/images/testimonial/person-5.jpg" class="testimonial-img" alt="" />
								<h3>Jena Karlis</h3>
								<h4>Store Owner</h4>
								<div class="stars">
									<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
										class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
								</div>
								<p>
									<i class="bi bi-quote quote-icon-left"></i>
									<span>Enim nisi quem export duis labore cillum quae magna enim
										sint quorum nulla quem veniam duis minim tempor labore
										quem eram duis noster aute amet eram fore quis sint
										minim.</span>
									<i class="bi bi-quote quote-icon-right"></i>
								</p>
							</div>
						</div>
					</div>
					<!-- End testimonial item -->

					<div class="swiper-slide">
						<div class="testimonial-wrap">
							<div class="testimonial-item">
								<img src="resources/images/testimonial/person-2.jpg" class="testimonial-img" alt="" />
								<h3>Matt Brandon</h3>
								<h4>Freelancer</h4>
								<div class="stars">
									<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
										class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
								</div>
								<p>
									<i class="bi bi-quote quote-icon-left"></i>
									<span>Fugiat enim eram quae cillum dolore dolor amet nulla
										culpa multos export minim fugiat minim velit minim dolor
										enim duis veniam ipsum anim magna sunt elit fore quem
										dolore labore illum veniam.</span>
									<i class="bi bi-quote quote-icon-right"></i>
								</p>
							</div>
						</div>
					</div>
					<!-- End testimonial item -->

					<div class="swiper-slide">
						<div class="testimonial-wrap">
							<div class="testimonial-item">
								<img src="resources/images/testimonial/person-4.jpg" class="testimonial-img" alt="" />
								<h3>John Larson</h3>
								<h4>Entrepreneur</h4>
								<div class="stars">
									<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
										class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
								</div>
								<p>
									<i class="bi bi-quote quote-icon-left"></i>
									<span>Quis quorum aliqua sint quem legam fore sunt eram irure
										aliqua veniam tempor noster veniam enim culpa labore duis
										sunt culpa nulla illum cillum fugiat legam esse veniam
										culpa fore nisi cillum quid.</span>
									<i class="bi bi-quote quote-icon-right"></i>
								</p>
							</div>
						</div>
					</div>
					<!-- End testimonial item -->
				</div>
				<div class="swiper-pagination"></div>
			</div>
		</div>
	</section>
	<!--end Testimonials Section -->

	<!-- Our Team Section -->
	<section id="team" class="team mt-4 mb-4">
		<div class="container" data-aos="fade-up">
			<div class="section-header text-center p-4">
				<h2><b>Our Team</b></h2>
			</div>

			<div class="row gy-4">
				<div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
					<div class="member">
						<img src="resources/images/Team/team1.jpg" class="img-fluid" alt="" />
						<h4>Victor Alex</h4>
						<span>Propietor</span>
						<div class="social">
							<a href=""><i class="bi bi-facebook"></i></a>
							<a href=""><i class="bi bi-whatsapp"></i></a>
							<a href=""><i class="bi bi-instagram"></i></a>
							<a href=""><i class="bi bi-twitter-x"></i></a>
						</div>
					</div>
				</div>
				<!-- End Team Member -->

				<div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
					<div class="member">
						<img src="resources/images/Team/team2.jpg" class="img-fluid" alt="" />
						<h4>Itohowo Ephriam</h4>
						<span>Head Teacher</span>
						<div class="social">
							<a href=""><i class="bi bi-facebook"></i></a>
							<a href=""><i class="bi bi-whatsapp"></i></a>
							<a href=""><i class="bi bi-instagram"></i></a>
							<a href=""><i class="bi bi-twitter-x"></i></a>
						</div>
					</div>
				</div>
				<!-- End Team Member -->

				<div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
					<div class="member">
						<img src="resources/images/Team/team3.jpg" class="img-fluid" alt="" />
						<h4>Emem Frank</h4>
						<span>Asst. Head Teacher</span>
						<div class="social">
							<a href=""><i class="bi bi-facebook"></i></a>
							<a href=""><i class="bi bi-whatsapp"></i></a>
							<a href=""><i class="bi bi-instagram"></i></a>
							<a href=""><i class="bi bi-twitter-x"></i></a>
						</div>
					</div>
				</div>
				<!-- End Team Member -->

				<div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
					<div class="member">
						<img src="resources/images/Team/team4.jpg" class="img-fluid" alt="" />
						<h4>Alex Diamond</h4>
						<span>ICT/Tech Consultant</span>
						<div class="social">
							<a href=""><i class="bi bi-facebook"></i></a>
							<a href=""><i class="bi bi-whatsapp"></i></a>
							<a href=""><i class="bi bi-instagram"></i></a>
							<a href=""><i class="bi bi-twitter-x"></i></a>
						</div>
					</div>
				</div>
				<!-- End Team Member -->
			</div>
		</div>
	</section>
	<!-- end Our Team Section -->

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
	<script src="resources/assests/swiper/swiper-bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>