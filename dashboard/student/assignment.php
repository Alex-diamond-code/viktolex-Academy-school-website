<?php
session_start();
error_reporting(0);

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

	<?php if (isset($_SESSION['message1'])) {
		echo $_SESSION['message1'];
		unset($_SESSION['message1']);
	}

	?>

	<!-- welcome bar section -->
	<div class="welcome_bar mb-2 mt-3">
		<div class="row gy-3">
			<div class="col-lg-12 col-md-12 user-sms">
				<h1 class="fw-bolder" style="margin-bottom: 16px;">Assignment Page</h1>
			</div>
		</div>
	</div>

	<!-- search for assignment -->
	<div class="mt-4">
		<h4 class="font-poppins fw-bold">Search for assignment</h4>
		<div class="add_form row " style="background-color: rgb(255, 255, 255); padding: 30px; border-radius:20px;">
			<div class="col-lg-6 col-md-6 col-12 my-auto">
				<span class="text-muted px-2"><i>Note: Once you click on search scroll down to view your assignment</i></span>
				<form action="" method="POST" class="my-4">
					<div class="mb-3">
						<select class="form-control" name="class" id="class" required>
							<option value="Select your class" hidden selected disabled>Select your class</option>
							<?php
							$query = "SELECT * FROM `class` WHERE status='Active'";
							$run_query = mysqli_query($con, $query);
							while ($class = mysqli_fetch_assoc($run_query)) {
							?>
								<option value="<?php echo $class['class_name'] ?>"><?php echo $class['class_name'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="mb-3">
						<select class="form-control" name="subject" id="Subject" required>
							<option value="Select the subject" hidden selected disabled>Select the subject</option>
							<?php
							$query = "SELECT * FROM `subject` WHERE status='Active'";
							$run_query = mysqli_query($con, $query);
							while ($subject = mysqli_fetch_assoc($run_query)) {
							?>
								<option value="<?php echo $subject['subject_name'] ?>"><?php echo $subject['subject_name'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="d-flex justify-content-between align-items-center">
						<button type="submit" class="btn btn-success" name="search_assignment">Search</button>
					</div>
				</form>
			</div>
			<div class="col-lg-6 col-md-6 col-12 d-flex align-items-center justify-content-lg-center">
				<img src="./assests/image/Learning-cuate.png" class="img-fluid" alt="" width="80%">
			</div>
		</div>
	</div>
	<br>

	<!-- display assignment section -->
	<div class="mt-4 mx-2">
		<div class="report-container">
			<?php

			if (isset($_POST['search_assignment'])) {
				// search data
				$class = mysqli_real_escape_string($con, $_POST['class']);
				$subject = mysqli_real_escape_string($con, $_POST['subject']);

				$query = "SELECT * FROM `assignment` WHERE class='$class' AND subject='$subject'";
				$run_query = mysqli_query($con, $query);


				if ($result = mysqli_fetch_assoc($run_query)) {

			?>
					<div class="report-box d-flex flex-column">
						<input type="text" value="<?php echo $result['id'] ?>" hidden>
						<h5 class="fw-bolder"><?php echo $result['subject'] ?></h5>
						<p disabled><?php echo $result['question_1'] ?></p>
						<p disabled><?php echo $result['question_2'] ?></p>
						<p disabled><?php echo $result['question_3'] ?></p>
						<p disabled><?php echo $result['question_4'] ?></p>
						<p disabled><?php echo $result['question_5'] ?></p>
					</div>
			<?php
				} //else {
				// 	$_SESSION['message1'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
				// 					<strong>Hey,</strong> Assignment not found 
				// 					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				// 					</div>
				// 					<br>';
				// 	header('Location: ../student/assignment.php');
				// }
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