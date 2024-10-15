<?php
session_start();

include '../controller/connection.php';

if ($_SESSION['usertype'] == 'admin') {
	header('Location: ../../portal.php');
} elseif (!isset($_SESSION['username'])) {
	header('Location: ../../portal.php');
} elseif ($_SESSION['status'] != 'Active') {
	$_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
            <strong>Hey,</strong> Unable access result due to incomplete payment
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
	header('Location: ./student.php');
}
?>

<?php include './assests/includes/header.php'; ?> <!-- including header file -->
<section class="interface">
	<?php include './assests/includes/navbar.php' ?>

	<!-- welcome bar section -->
	<div class="welcome_bar mb-2 mt-3">
		<div class="row gy-3">
			<div class="col-lg-12 col-md-12 user-sms">
				<h1 class="fw-bolder" style="margin-bottom: 16px;">Result Section</h1>
			</div>
		</div>
	</div>


	<!-- search for result -->
	<div class="mt-4">
		<h4 class="font-poppins fw-bold">Search for result</h4>
		<div class="add_form row " style="background-color: rgb(255, 255, 255); padding: 30px; border-radius:20px;">
			<div class="col-lg-6 col-md-6 col-12 my-auto">
				<span class="text-muted px-2"><i>Note: Once you click on search scroll down to view your result</i></span>
				<form action="" method="POST" class="my-4">
					<div class="mb-3">
						<input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $_SESSION['username'] ?>">
					</div>
					<div class="mb-3">
						<select class="form-control" name="class" id="class" required>
							<option value="Select your class" hidden selected disabled>Select your class</option>
							<?php
							$query = "SELECT * FROM `class`";
							$run_query = mysqli_query($con, $query);
							while ($class = mysqli_fetch_assoc($run_query)) {
							?>
								<option value="<?php echo $class['class_name'] ?>"><?php echo $class['class_name'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="mb-3">
						<select class="form-control" name="term" id="term" required>
							<option value="Select term" hidden selected disabled>Select term</option>
							<option value="First Term">First Term</option>
							<option value="Second Term">Second Term</option>
							<option value="Third Term">Third Term</option>
						</select>
					</div>
					<div class="mb-3">
						<select class="form-control" name="session" id="session" required>
							<option value="Select the session" hidden selected disabled>Select the session</option>
							<?php
							$query = "SELECT * FROM `session` WHERE s_status='Active'";
							$run_query = mysqli_query($con, $query);
							while ($session = mysqli_fetch_assoc($run_query)) {
							?>
								<option value="<?php echo $session['s_name'] ?>"><?php echo $session['s_name'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="d-flex justify-content-between align-items-center">
						<button type="submit" class="btn btn-success" name="search_result">Search</button>
					</div>
				</form>
			</div>
			<div class="col-lg-6 col-md-6 col-12 d-flex align-items-center justify-content-lg-center">
				<img src="./assests/image/Learning-cuate.png" class="img-fluid" alt="" width="80%">
			</div>
		</div>
	</div>
	<br>

	<!-- display result section -->
	<div class="mt-4 mx-2">
		<div class="report-container d-flex flex-column mx-0">
			<?php

			if (isset($_POST['search_result'])) {
				// search data
				$username = mysqli_real_escape_string($con, $_POST['username']);
				$class = mysqli_real_escape_string($con, $_POST['class']);
				$term = mysqli_real_escape_string($con, $_POST['term']);
				$session = mysqli_real_escape_string($con, $_POST['session']);

				$query = "SELECT * FROM `result` WHERE class='$class' AND username='$username' AND term='$term' AND session='$session'";
				$run_query = mysqli_query($con, $query);


				while ($result = mysqli_fetch_assoc($run_query)) {
			?>
					<div class="report-box d-flex justify-content-between align-items-center">
						<input type="text" value="<?php echo $result['id'] ?>" hidden>
						<p class="fw-bolder"><?php echo $result['subject'] ?></p>
						<p disabled><?php echo $result['1st_test'] ?></p>
						<p disabled><?php echo $result['2nd_test'] ?></p>
						<p disabled><?php echo $result['exams'] ?></p>
						<p disabled><?php echo $result['total'] ?></p>
						<p disabled><?php echo $result['grade'] ?></p>
					</div>
				<?php
				}
			} else {
				?>
				<div class="report-box d-flex justify-content-between align-items-center">
					<h4>No record found</h4>
				</div>

			<?php
			}
			?>
		</div>
		<br>
	</div>
</section>



<script src="./assests/js/bootstrap.bundle.min.js"></script>
<script src="./assests/js/script.js"></script>
</body>

</html>