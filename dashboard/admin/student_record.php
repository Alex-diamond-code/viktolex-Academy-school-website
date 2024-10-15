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
				<h1 class="fw-bolder" style="margin-bottom: 16px;">Students Records</h1>
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

		<!-- student record section -->
		<div class="mt-4 table-responsive">
			<h4 class="font-poppins fw-bold">List of Student</h4>
			<table class="table table-striped table-bordered dt-responsive nowrap w-100 table-hover" id="example">
				<thead class="text-white bg-dark">
					<tr>
						<th scope="col" class="text-white bg-dark">Fullname</th>
						<th scope="col" class="text-white bg-dark">Email</th>
						<th scope="col" class="text-white bg-dark">Phone</th>
						<th scope="col" class="text-white bg-dark">Username</th>
						<th scope="col" class="text-white bg-dark">Gender</th>
						<th scope="col" class="text-white bg-dark">Status</th>
						<th scope="col" class="text-white bg-dark">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$query = "SELECT * FROM users WHERE usertype='student'";
					$run_query = mysqli_query($con, $query);

					while ($row_data = mysqli_fetch_assoc($run_query)) {
					?>
						<tr>
							<!-- <td hidden><?php echo $row_data['id'] ?></td> -->
							<td><?php echo $row_data['fullname'] ?></td>
							<td><?php echo $row_data['email'] ?></td>
							<td><?php echo $row_data['phone'] ?></td>
							<td><?php echo $row_data['username'] ?></td>
							<td><?php echo $row_data['gender'] ?></td>
							<td><?php echo $row_data['status'] ?></td>
							<td>
								<div class="dropdown">
									<button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
										Action
									</button>
									<ul class="dropdown-menu px-2">
										<li>
											<a href="student_edit.php?id=<?php echo $row_data['id'] ?>" class="dropdown-item bg-info text-center text-white mb-2 rounded-2 py-2"><i class="fas fa-edit mx-2"></i>Edit</a>
										</li>
										<!-- Button trigger modal -->
										<li>
											<button type="button" data-bs-toggle="modal" data-bs-target="#delete_student_<?php echo $row_data['id'] ?>" class="dropdown-item bg-danger text-center text-white rounded-2 py-2 delete_student"><i class="fas fa-trash mx-2"></i>Delete</button>
										</li>
									</ul>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>


	<!-- delete users section -->
	<!-- Modal -->
	<?php
	$query = "SELECT * FROM users WHERE usertype='student'";
	$run_query = mysqli_query($con, $query);

	while ($row_data = mysqli_fetch_assoc($run_query)) {
	?>
		<div class="modal fade" id="delete_student_<?php echo $row_data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="staticBackdropLabel">Delete student</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						Are sure you want to delete this student !!!
					</div>
					<div class="modal-footer">
						<form action="../controller/server.php" method="POST">
							<input hidden name="delete_id" value="<?php echo $row_data['id'] ?>">
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancel</button>
							<button type="submit" class="btn btn-success" name="delete_student">Delete</button>
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
<script src="./assests/js/responsive.bootstrap5.min.js"></script>
<script src="./assests/js/bootstrap.bundle.min.js"></script>
<script src="./assests/js/datatables.js"></script>
<script src="./assests/js/script.js"></script>

<script>
	$(document).ready(function() {
		$('.delete_student').on('click', function() {
			$('#delete_student').modal('show');
		})
	})


	$(document).ready(function() {
  		$('#example').DataTable({
    		//disable sorting on last column
    		"columnDefs": [
    		  { "orderable": false, 
				"targets": 5 
			}
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