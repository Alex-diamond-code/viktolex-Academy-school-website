<?php
session_start();

include '../controller/connection.php';

if ($_SESSION['usertype'] == 'student') {
	header('Location: ../../portal.php');
} elseif (!isset($_SESSION['username'])) {
	header('Location: ../../portal.php');
}

?>

<?php include './assests/includes/header.php'; ?> <!-- including header file -->

<section class="interface">
	<?php include './assests/includes/navbar.php' ?>

	<!-- welcome bar section -->
	<div class="welcome_bar mb-2 mt-3">
		<div class="row gy-3">
			<div class="col-lg-6 col-md-6 user-sms">
				<h1 class="fw-bolder">Hi, <?php echo $_SESSION['username'] ?>.</h1>
				<p>Welcome to your dashboard, let start working.</p>
				<div class="m-2">
					<a href="./add_student.php" class="sub_btn">Enroll</a>
					<a href="./fee_analysis.php" class="sub_btn">Analysis</a>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 bar_image d-flex justify-content-lg-end justify-content-center">
				<img src="./assests/image/10173517_8576-removebg-preview.png" alt="">
			</div>
		</div>
	</div>

	<!-- overview block section -->
	<div class="summary mt-3">
		<div class="row">
			<div class="col-12">
				<h4 class="font-poppins fw-bold">Overview</h4>
			</div>
		</div>
		<div class="row gy-2 gx-2">
			<div class="col-lg-3 col-md-6 col-sm-12 col-12">
				<div class="summary_block d-flex align-items-center justify-content-around font-poppins">
					<div class="icon_box d-flex align-items-center justify-content-center" style="background-color: rgb(195 115 0);">
						<i class="fas fa-user-graduate"></i>
					</div>
					<div class="summary_details">
						<h5 class="fw-bold">Total Students</h5>
						<?php
						$query = "SELECT * FROM users WHERE usertype='student'";
						$run_query = mysqli_query($con, $query);

						$result = mysqli_num_rows($run_query);

						if ($result) {
						?>
							<p><?= $result ?></p>
						<?php } elseif ($result <= 0) {
						?>
							<p>0</p>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-12 col-12">
				<div class="summary_block d-flex align-items-center justify-content-around font-poppins">
					<div class="icon_box d-flex align-items-center justify-content-center" style="background-color: rgb(151, 160, 19);">
						<i class="fas fa-user-tie"></i>
					</div>
					<div class="summary_details">
						<h5 class="fw-bold">Total Teachers</h5>
						<?php
						$query = "SELECT * FROM teacher";
						$run_query = mysqli_query($con, $query);

						$result = mysqli_num_rows($run_query);

						if ($result) {
						?>
							<p><?= $result ?></p>
						<?php } elseif ($result <= 0) {
						?>
							<p>0</p>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-12 col-12">
				<div class="summary_block d-flex align-items-center justify-content-around font-poppins">
					<div class="icon_box d-flex align-items-center justify-content-center" style="background-color: #165e05;">
						<i class="fas fa-coins"></i>
					</div>
					<div class="summary_details">
						<h5 class="fw-bold">Total income</h5>
						<p><i class="fas fa-naira-sign"></i>1000</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-12 col-12">
				<div class="summary_block d-flex align-items-center justify-content-around font-poppins">
					<div class="icon_box d-flex align-items-center justify-content-center" style="background-color: rgb(139 17 17);">
						<i class="fas fa-exclamation-circle"></i>
					</div>
					<div class="summary_details">
						<h5 class="fw-bold">Total Reports</h5>
						<?php
						$query = "SELECT * FROM report";
						$run_query = mysqli_query($con, $query);

						$result = mysqli_num_rows($run_query);

						if ($result) {
						?>
							<p><?= $result ?></p>
						<?php } elseif ($result <= 0) {
						?>
							<p>0</p>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row gy-2 gx-2 mb-2" style="padding-top: 10px;">
			<div class="col-lg-3 col-md-6 col-sm-12 col-12">
				<div class="summary_block d-flex align-items-center justify-content-around font-poppins">
					<div class="icon_box d-flex align-items-center justify-content-center " style="background-color: rgb(15 15 110);">
						<i class="fas fa-file-alt"></i>
					</div>
					<div class="summary_details">
						<h5 class="fw-bold">Total Results</h5>
						<?php
						$query = "SELECT * FROM result";
						$run_query = mysqli_query($con, $query);

						$result = mysqli_num_rows($run_query);

						if ($result) {
						?>
							<p><?= $result ?></p>
						<?php } elseif ($result <= 0) {
						?>
							<p>0</p>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-12 col-12">
				<div class="summary_block d-flex align-items-center justify-content-around font-poppins">
					<div class="icon_box d-flex align-items-center justify-content-center" style="background-color: rgb(0, 110, 0);">
						<i class="fas fa-user-graduate"></i>
					</div>
					<div class="summary_details">
						<h5 class="fw-bold">Active Student</h5>
						<?php
						$query = "SELECT * FROM users WHERE usertype='student' AND status='Active'";
						$run_query = mysqli_query($con, $query);

						$result = mysqli_num_rows($run_query);

						if ($result) {
						?>
							<p><?= $result ?></p>
						<?php } elseif ($result <= 0) {
						?>
							<p>0</p>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-12 col-12">
				<div class="summary_block d-flex align-items-center justify-content-around font-poppins">
					<div class="icon_box d-flex align-items-center justify-content-center mx-2" style="background-color: rgb(110 0 0); margin-right: 15px;">
						<i class="fas fa-user-graduate"></i>
					</div>
					<div class="summary_details">
						<h5 class="fw-bold text-wrap">Inactive Student</h5>
						<?php
						$query = "SELECT * FROM users WHERE usertype='student' AND status='Disabled'";
						$run_query = mysqli_query($con, $query);

						$result = mysqli_num_rows($run_query);

						if ($result) {
						?>
							<p><?= $result ?></p>
						<?php } elseif ($result <= 0) {
						?>
							<p>0</p>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-12 col-12">
				<div class="summary_block d-flex align-items-center justify-content-around font-poppins">
					<div class="icon_box d-flex align-items-center justify-content-center mx-2" style="background-color: rgb(215 200 8);">
						<i class="fas fa-book"></i>
					</div>
					<div class="summary_details">
						<h5 class="fw-bold">Assignments</h5>
						<?php
						$query = "SELECT * FROM assignment";
						$run_query = mysqli_query($con, $query);

						$result = mysqli_num_rows($run_query);

						if ($result) {
						?>
							<p><?= $result ?></p>
						<?php } elseif ($result <= 0) {
						?>
							<p>0</p>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<script src="./assests/js/bootstrap.bundle.min.js"></script>
<script src="./assests/js/script.js"></script>
</body>

</html>