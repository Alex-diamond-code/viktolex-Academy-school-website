<?php
session_start();

if ($_SESSION['usertype'] == 'admin') {
	header('Location: ../../portal.php');
}elseif (!isset($_SESSION['username'])) {
	header('Location: ../../portal.php');
}
?>

	<?php include './assests/includes/header.php';?> <!-- including header file -->
	<section class="interface">
		<?php include './assests/includes/navbar.php' ?>

		<!-- welcome bar section -->
		<div class="welcome_bar mb-2 mt-3">
			<div class="row gy-3">
				<div class="col-lg-6 col-md-6 user-sms">
					<h2 class="fw-bolder">Hi, <?php echo $_SESSION['username'] ?>.</h2>
					<p>Welcome to your dashboard, let start working.</p>
					<div class="m-2">
						<a href="./payfees.php" class="sub_btn">Pay Fees</a>
						<a href="./view_result.php" class="sub_btn">Result</a>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 bar_image d-flex justify-content-lg-end justify-content-center">
					<img src="./assests/image/10173517_8576-removebg-preview.png" alt="">
				</div>
			</div>
		</div>

		<?php echo $_SESSION['id'] ?>
		
		
	</section>
          
		  

    <script src="./assests/js/bootstrap.bundle.min.js"></script>
    <script src="./assests/js/script.js"></script>
  </body>
</html>
