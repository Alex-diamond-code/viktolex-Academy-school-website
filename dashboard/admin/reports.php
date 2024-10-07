<?php
session_start();

include "../controller/connection.php";

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
				<h1 class="fw-bold" style="margin-bottom: 16px;">Reports</h1>
			</div>
		</div>
	</div>

	<!-- pending reports -->
	<div class="mt-4 mx-2">
		<div class="report-container">
			<?php
			$query = "SELECT * FROM report";
			$run_query = mysqli_query($con, $query);
			while ($row_data = mysqli_fetch_assoc($run_query)) {
			?>
				<div class="report-box">
					<input type="text" value="<?php echo $row_data['id'] ?>" hidden>
					<h5><?php echo $row_data['username'] ?></h5>
					<p class="fw-bold"><?php echo $row_data['title'] ?></p>
					<p><?php echo $row_data['complain'] ?></p>
					<button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete_report_<?php echo $row_data['id'] ?>"><i class="fas fa-trash mx-2"></i>Delete</button>
				</div>
			<?php } ?>

		</div>
		<br><br>
	</div>
</section>

<!-- delete modal -->
<?php
$query = "SELECT * FROM report";
$run_query = mysqli_query($con, $query);
while ($row_data = mysqli_fetch_assoc($run_query)) {
?>
	<div class="modal fade" id="delete_report_<?php echo $row_data['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Trying to logout</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="../controller/server.php" method="post">
						<input type="text" name="id" value="<?php echo $row_data['id'] ?>" hidden>
						Are you sure you want to logout form your dashboard
						<div class="modal-footer mt-1">
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancel</button>
							<button type="submit" class="btn btn-success" name="delete_report">Delete</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
<?php } ?>

<script src="./assests/js/bootstrap.bundle.min.js"></script>
<script src="./assests/js/script.js"></script>
</body>

</html>