<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Admin dashboard</title>
	<link rel="shortcut icon" href="./assests/image/favicon.png" type="image/x-icon">
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/> -->
	<link rel="stylesheet" href="./assests/css/bootstrap.min.css">
	<link rel="stylesheet" href="./assests/css/datatables.css">
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet" />

	<link rel="stylesheet" href="./assests/css/custom.css" />
	<link rel="stylesheet" href="./assests/css/all.min.css">
	<link rel="stylesheet" href="./assests/css/responsive.bootstrap5.css">
</head>

<body>
	<div id="preloader"></div>
	<!-- sidebar section -->
	<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
		<div class="offcanvas-header mt-2">
			<h5 class="offcanvas-title" id="offcanvasNavbarLabel">
				<div class="logo d-flex align-items-center justify-content-center g-2">
					<img src="./assests/image/logo-main.png" alt="" width="50">
					<div class="name d-flex flex-column ">
						<p style="font-size: 18px; margin-top: 20px;">Viktolex</p>
						<p style="font-size: 18px; margin-top: -10px;">Academy</p>
					</div>
				</div>
			</h5>
		</div>
		<hr>
		<div class="offcanvas-body p-0">
			<ul class="navbar-nav justify-content-end flex-grow-1 menu">
				<li class="nav-item"><i class="fas fa-home"></i><a href="./admin.php">Home</a></li>
				<li class="nav-item"><i class="fas fa-school"></i><a href="./curriculum.php">Curriculum</a></li>
				<li class="nav-item"><i class="fas fa-user-graduate"></i><a href="./add_student.php">Student Enrollment</a></li>
				<li class="nav-item"><i class="fas fa-user-plus"></i><a href="./add_teacher.php">Teacher Enrollment</a></li>
				<li class="nav-item"><i class="fas fa-user-check"></i><a href="./student_record.php">Student Record</a></li>
				<li class="nav-item"><i class="fas fa-user-tie"></i><a href="./Teacher_record.php">Teacher Record</a></li>
				<li class="nav-item"><i class="fas fa-exclamation-circle"></i><a href="./reports.php">Report <span class="badge bg-info rounded-pill mx-5">
							<?php
							$query = "SELECT * FROM report";
							$run_query = mysqli_query($con, $query);

							$result = mysqli_num_rows($run_query);

							if ($result) {
							?>
								<p class="m-auto"><?= $result ?></p>
							<?php } elseif ($result <= 0) {
							?>
								<p class="m-auto">0</p>
							<?php } ?>
						</span></a></li>
				<li class="nav-item"><i class="fas fa-book"></i><a href="./assignment.php">Assignment</a></li>
				<li class="nav-item"><i class="fas fa-file-alt"></i><a href="./add_result.php">Add Result</a></li>
				<!-- <li class="nav-item"><i class="fas fa-chart-pie"></i><a href="./fee_analysis.php">Fee Analysis</a></li> -->
				<li class="nav-item"><i class="fas fa-cog"></i><a href="./admin_setting.php">Settings</a></li>
				<!-- Button trigger modal -->
				<li><i class="fas fa-sign-out-alt"></i><a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">logout</a></li>
			</ul>
			<br><br>
		</div>
	</div>
	<style>
		.offcanvas-body::-webkit-scrollbar {
			width: 7px;
		}

		.offcanvas-body::-webkit-scrollbar-thumb {
			border-radius: 10px;
			background: #fff;
		}
	</style>






	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Trying to logout</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Are you sure you want to logout form your dashboard
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancel</button>
					<a href="../logout.php" class="btn btn-success">Logout</a>
				</div>
			</div>
		</div>
	</div>