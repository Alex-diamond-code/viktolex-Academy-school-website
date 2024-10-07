<?php
session_start();
error_reporting(0);

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


	<?php if (isset($_SESSION['message'])) {
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}

	?>

	<!-- welcome bar section -->
	<div class="welcome_bar mb-2 mt-3">
		<div class="row gy-3">
			<div class="col-lg-12 col-md-12 user-sms">
				<h1 class="fw-bolder" style="margin-bottom: 16px;">Add Students</h1>
			</div>
		</div>
	</div>

	<!-- overview section -->
	<div class="record_over mt-3">
		<div class="row">
			<div class="col-12">
				<h4 class="font-poppins fw-bold">Overview</h4>
			</div>
		</div>
		<!-- overview block -->
		<div class="row gy-3">
			<div class="col-md-6 col-lg-6 col-12">
				<div class="summary_block d-flex align-items-center justify-content-around font-poppins">
					<div class="col-lg-5 icon_box d-flex align-items-center justify-content-center" style="background-color: #1E5128;">
						<i class="fa-solid fa-child"></i>
					</div>
					<div class="col-lg-7 summary_details">
						<h5 class="fw-bold">No. of Boys</h5>
						<?php
						$query = "SELECT * FROM users WHERE gender='Male' AND usertype='student'";
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
			<div class="col-md-6 col-lg-6 col-12">
				<div class="summary_block d-flex align-items-center justify-content-around font-poppins">
					<div class="col-lg-5 icon_box d-flex align-items-center justify-content-center" style="background-color: #EDE68A;">
						<i class="fa-solid fa-child-dress"></i>
					</div>
					<div class="col-lg-7 summary_details">
						<h5 class="fw-bold">No. of Girls</h5>
						<?php
						$query = "SELECT * FROM users WHERE gender='Female' AND usertype='student'";
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

		<!-- add student form section -->
		<div class="mt-4">
			<h4 class="font-poppins fw-bold">Add Student</h4>
			<div class="add_form row mt-4" style="background-color: rgb(255, 255, 255); padding: 30px; border-radius:20px; backdrop-filter: blur(10px);">

				<div class="col-lg-6 col-md-6 col-12 my-auto">
					<span class="text-muted px-2"><i>Note that all fields are require</i></span>
					<form action="../controller/server.php" method="POST" class="my-4">
						<div class="mb-3">
							<input type="text" class="form-control" id="fullname" placeholder="Fullname" name="fullname" required>
						</div>
						<div class="mb-3">
							<input type="email" class="form-control" id="email" placeholder="Email Address" name="email" required>
						</div>
						<div class="mb-3">
							<input type="text" class="form-control" id="phonenumber" placeholder="Phone number" name="phonenumber" required>
						</div>
						<div class="mb-3">
							<input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
						</div>
						<div class="mb-3">
							<!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Gender"> -->
							<select class="form-control" name="gender" id="gender" required>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
						<div class="mb-3">
							<input type="text" class="form-control" id="address" placeholder="address" name="address" required>
						</div>
						<div class="mb-3">
							<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
						</div>
						<div class="d-flex justify-content-between align-items-center">
							<button type="submit" class="btn btn-success" name="add_student">Add Student</button>
							<a href="./add_teacher.php" class="btn btn-primary ms-5">Add Teachers</a>
						</div>

						<!-- <button type="submit" class="btn btn-success mx-5" name="add_student">Add Student</button> -->

					</form>
				</div>
				<div class="col-lg-6 col-md-6 col-12 d-flex align-items-center justify-content-lg-center">
					<img src="./assests/image/Learning-cuate.png" class="img-fluid" alt="" width="80%">
				</div>
			</div>
		</div>
	</div>

	<!-- footer -->
	<?php include "./assests/includes/footer.php" ?>

</section>



<script src="./assests/js/bootstrap.bundle.min.js"></script>
<script src="./assests/js/script.js"></script>
</body>

</html>