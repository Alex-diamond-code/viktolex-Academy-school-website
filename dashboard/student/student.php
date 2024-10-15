<?php
session_start();

include '../controller/connection.php';

if ($_SESSION['usertype'] == 'admin') {
	header('Location: ../../portal.php');
} elseif (!isset($_SESSION['username'])) {
	header('Location: ../../portal.php');
}
?>

<?php include './assests/includes/header.php'; ?> <!-- including header file -->
<section class="interface">
	<?php include './assests/includes/navbar.php' ?>

	<?php if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

    ?>
	
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

	<!-- view announcement -->
	 <h4 class="mt-3 fw-bold">Anouncement</h4>
	<?php
	$query = "SELECT * FROM `anouncement`";
	$run_query = mysqli_query($con, $query);

	while ($row_data = mysqli_fetch_assoc($run_query)) {
		# code...
	?>
		<div class="report-box d-flex flex-column mb-2">
			<h5 class="fw-bolder"><?php echo $row_data['a_title'] ?></h5>
			<p disabled><?php echo $row_data['a_desc'] ?></p>
		</div>
	<?php } ?>

</section>



<script src="./assests/js/bootstrap.bundle.min.js"></script>
<script src="./assests/js/script.js"></script>
</body>

</html>