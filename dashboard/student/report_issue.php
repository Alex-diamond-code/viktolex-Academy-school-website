<?php
session_start();

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
			<div class="col-lg-12 col-md-12 user-sms">
				<h1 class="fw-bolder" style="margin-bottom: 16px;">Report an issue</h1>
			</div>
		</div>
	</div>

	<!-- make a report section -->
	<div class="mt-4">
		<div class="add_form row mt-4" style="background-color: rgb(255, 255, 255); padding: 20px; border-radius:20px;">
			<div class="col-lg-6 col-md-6 col-12 my-auto">
				<span class="text-muted px-2"><i>Note that all fields are required</i></span>
				<form action="../controller/server.php" method="POST" class="my-4">
					<div class="mb-3">
						<input class="form-control" placeholder="Input your Username" name="username" value="<?php echo $_SESSION['username'] ?>" required disabled>
					</div>
					<div class="mb-3">
						<input class="form-control" placeholder="Title" name="title" required>
					</div>
					<div class="mb-3">
						<textarea class="form-control" placeholder="Tell us what your complain is" name="complain" rows="6"></textarea>
					</div>
					<div class="d-flex justify-content-between align-items-center">
						<button type="submit" class="btn btn-success" name="student_report">Report Issue</button>
						<!-- <a href="./add_teacher.php" class="btn btn-primary ms-5">Add Teachers</a> -->
					</div>
				</form>
			</div>
			<div class="col-lg-6 col-md-6 col-12 d-flex align-items-center justify-content-lg-center">
				<img src="./assests/image/Learning-cuate.png" class="img-fluid" alt="" width="80%">
			</div>
		</div>
	</div>

	<!-- footer section -->
	<?php include './assests/includes/footer.php' ?>

</section>



<script src="./assests/js/bootstrap.bundle.min.js"></script>
<script src="./assests/js/script.js"></script>
</body>

</html>