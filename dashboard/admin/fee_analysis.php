<?php
session_start();

include '../controller/connection.php';

if ($_SESSION['usertype'] == 'student') {
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
				<div class="col-lg-12 col-md-12 user-sms">
					<h1 class="fw-bolder" style="margin-bottom: 16px;">Fee Analysis</h1>
				</div>
			</div>
		</div>
		
		
	</section>
          
		  

    <script src="./assests/js/bootstrap.bundle.min.js"></script>
    <script src="./assests/js/script.js"></script>
  </body>
</html>
