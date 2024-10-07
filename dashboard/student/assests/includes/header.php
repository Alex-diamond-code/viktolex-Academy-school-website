<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student dashboard</title>
	<link rel="shortcut icon" href="./assests/image/favicon.png" type="image/x-icon">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/> -->
	<link rel="stylesheet" href="./assests/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"/>

    <link rel="stylesheet" href="./assests/css/custom.css" />
	<link rel="stylesheet" href="./assests/css/all.min.css">
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
				<li class="nav-item"><i class="fas fa-home"></i><a href="./student.php">Home</a></li>
				<li class="nav-item"><i class="fas fa-money-bill-wave"></i><a href="./payfees.php">Pay fees</a></li>
				<li class="nav-item"><i class="fas fa-id-card"></i><a href="./profile.php">Profile</a></li>
				<li class="nav-item"><i class="fas fa-book"></i><a href="./assignment.php">Assignments</a></li>
				<li class="nav-item"><i class="fas fa-exclamation-circle"></i><a href="./report_issue.php">Report Issues</a></li>
				<li class="nav-item"><i class="fas fa-file"></i><a href="./view_result.php">View Result</a></li>
				<!-- <li class="nav-item"><i class="fas fa-calendar-alt"></i><a href="./dashboard.php">Event Calendar</a></li>
				<li class="nav-item"><i class="fas fa-money-bill"></i><a href="./dashboard.php">Fee Structure</a></li>
				<li class="nav-item"><i class="fas fa-chart-pie"></i><a href="./dashboard.php">Fee Analysis</a></li> -->
				<li><i class="fas fa-sign-out-alt"></i><a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">logout</a></li>
			</ul>
		</div>
	</div>