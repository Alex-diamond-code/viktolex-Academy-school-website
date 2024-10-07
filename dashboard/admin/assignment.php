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

	<?php if (isset($_SESSION['message'])) {
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}

	?>

	<!-- welcome bar section -->
	<div class="welcome_bar mb-2 mt-3">
		<div class="row gy-3">
			<div class="col-lg-12 col-md-12 user-sms">
				<h1 class="fw-bolder" style="margin-bottom: 16px;">Add Assignments</h1>
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
		<div class="row gy-3">
			<div class="col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="summary_block d-flex align-items-center justify-content-around font-poppins">
					<div class="icon_box d-flex align-items-center justify-content-center" style="background-color: rgb(16, 109, 9);">
						<i class="fas fa-book"></i>
					</div>
					<div class="summary_details">
						<h5 class="fw-bold">Total Assignments</h5>
						<?php
						$query = "SELECT * FROM assignment WHERE assignment_type='Assignment'";
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
			<div class="col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="summary_block d-flex align-items-center justify-content-around font-poppins">
					<div class="icon_box d-flex align-items-center justify-content-center" style="background-color: rgb(15, 16, 219);">
						<i class="fas fa-briefcase"></i>
					</div>
					<div class="summary_details">
						<h5 class="fw-bold">Total Projects</h5>
						<?php
						$query = "SELECT * FROM assignment WHERE assignment_type='Project'";
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

	<!-- add assignment section -->
	<div class="mt-4">
		<h4 class="font-poppins fw-bold">Add Assignment</h4>
		<div class="add_form row mt-4" style="background-color: rgb(255, 255, 255); padding: 20px; border-radius:20px; backdrop-filter: blur(10px);">

			<div class="col-lg-6 col-md-6 col-12 my-auto">
				<span class="text-muted px-2"><i>Note that question 2-5 are not required fields</i></span>
				<form action="../controller/server.php" method="POST" class="my-4">
					<div class="mb-3">
						<select class="form-control" name="class" id="class" required>
							<option value="Reception">Reception</option>
							<option value="Transition">Transition</option>
							<option value="Nursery 1">Nursery 1</option>
							<option value="Nursery 2">Nursery 2</option>
							<option value="Primary 1">Primary 1</option>
							<option value="Primary 2">Primary 2</option>
							<option value="Primary 3">Primary 3</option>
							<option value="Primary 4">Primary 4</option>
							<option value="Primary 5">Primary 5</option>
						</select>
					</div>
					<div class="mb-3">
						<select class="form-control" name="subject" id="Subject" required>
							<option value="Mathematics">Mathematics</option>
							<option value="English">English</option>
							<option value="Basic Science">Basic Science</option>
							<option value="CRS">CRS</option>
							<option value="Quantitative">Quantitative</option>
							<!-- <option value="Primary 2">Primary 2</option>
							<option value="Primary 3">Primary 3</option>
							<option value="Primary 4">Primary 4</option>
							<option value="Primary 5">Primary 5</option> -->
						</select>
					</div>
					<div class="mb-3">
						<textarea class="form-control" id="question_1" placeholder="Question 1" name="question_1" required></textarea>
					</div>
					<div class="mb-3">
						<textarea class="form-control" id="question_2" placeholder="Question 2" name="question_2"></textarea>
					</div>
					<div class="mb-3">
						<textarea class="form-control" id="question_3" placeholder="Question 3" name="question_3"></textarea>
					</div>
					<div class="mb-3">
						<textarea class="form-control" id="question_4" placeholder="Question 4" name="question_4"></textarea>
					</div>
					<div class="mb-3">
						<textarea class="form-control" id="question_5" placeholder="Question 5" name="question_5"></textarea>
					</div>
					<div class="mb-3">
						<select class="form-control" name="assignment_type" id="assignment_type" required>
							<option value="Assignment">Assignment</option>
							<option value="Project">Project</option>
						</select>
					</div>
					<div class="d-flex justify-content-between align-items-center">
						<button type="submit" class="btn btn-success" name="add_assignment">Add Assignment</button>
						<!-- <a href="./add_teacher.php" class="btn btn-primary ms-5">Add Teachers</a> -->
					</div>
				</form>
			</div>
			<div class="col-lg-6 col-md-6 col-12 d-flex align-items-center justify-content-lg-center">
				<img src="./assests/image/Learning-cuate.png" class="img-fluid" alt="" width="80%">
			</div>
		</div>
	</div>

	<!-- assignment table record -->
	<div class="mt-4 table-responsive">
		<h4 class="font-poppins fw-bold">List of Assignment</h4>
		<table class="table table-striped table-bordered table-light" id="example">
			<thead>
				<tr>
					<th scope="col" class="text-white bg-dark">Class</th>
					<th scope="col" class="text-white bg-dark">Subject</th>
					<th scope="col" class="text-white bg-dark">Type</th>
					<th scope="col" class="text-white bg-dark">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$query = "SELECT * FROM assignment";
				$run_query = mysqli_query($con, $query);

				while ($row_data = mysqli_fetch_assoc($run_query)) {
				?>
					<tr>
						<td><?php echo $row_data['class'] ?></td>
						<td><?php echo $row_data['subject'] ?></td>
						<td><?php echo $row_data['assignment_type'] ?></td>
						<td>
							<div class="dropdown">
								<button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									Action
								</button>
								<ul class="dropdown-menu px-2">
									<li><a href="./assignment_edit.php?id=<?php echo $row_data['id'] ?>" class="dropdown-item bg-info text-center text-white mb-2 rounded-2 py-2"><i class="fas fa-edit mx-2"></i>Edit</a></li>
									<!-- Button trigger modal -->
									<li>
										<button class="dropdown-item bg-danger text-center text-white rounded-2 py-2" data-bs-toggle="modal" data-bs-target="#delete_assignment_<?php echo $row_data['id'] ?>"> <i class="fas fa-trash mx-2"></i>Delete</button>
									</li>
								</ul>
							</div>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<br><br>
	</div>


	<!-- delete assignment section -->
	<!-- Modal -->
	<?php
	$query = "SELECT * FROM assignment";
	$run_query = mysqli_query($con, $query);

	while ($row_data = mysqli_fetch_assoc($run_query)) {
	?>
		<div class="modal fade" id="delete_assignment_<?php echo $row_data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Assignment</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						Are sure you want to delete this assignment !!!
					</div>
					<div class="modal-footer">
						<form action="../controller/server.php" method="POST">
							<input hidden name="delete_id" value="<?php echo $row_data['id'] ?>">
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancel</button>
							<button type="submit" name="delete_assignment" class="btn btn-success" data-bs-dismiss="modal">Delete</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>


	<!-- footer -->
	<?php include "./assests/includes/footer.php" ?>
</section>


<script src="./assests/js/jquery.js"></script>
<script src="./assests/js/datatables.js"></script>
<script src="./assests/js/bootstrap.bundle.min.js"></script>
<script src="./assests/js/script.js"></script>

<script>
	$(document).ready(function() {
  		$('#example').DataTable({
    		//disable sorting on last column
    		"columnDefs": [
    		  { "orderable": false, "targets": 3 }
    		],
    		language: {
    		  'paginate': {
    		    'previous': '<span class="fa fa-chevron-left"></span>',
    		    'next': '<span class="fa fa-chevron-right"></span>'
    		  },
    		  "lengthMenu": 'Display <select class="form-control input-sm">'+
    		  '<option value="10" selected>10</option>'+
    		  '<option value="20">20</option>'+
    		  '<option value="30">30</option>'+
    		  '<option value="40">40</option>'+
    		  '<option value="50">50</option>'+
    		  '<option value="-1">All</option>'+
    		  '</select> results'
    		}
  		}) ; 
	});
</script>
</body>

</html>