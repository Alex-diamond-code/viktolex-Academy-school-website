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

	<!-- welcome bar section -->
	<div class="welcome_bar mb-2 mt-3">
		<div class="row gy-3">
			<div class="col-lg-12 col-md-12 user-sms">
				<h1 class="fw-bolder" style="margin-bottom: 16px;">Pay Fee Section</h1>
			</div>
		</div>
	</div>

	<div class="report-box d-flex flex-column mt-4">
		<h4>Payment online are unavaliable at the moment</h4>
		<div class="mt-2">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-12">
					<div class="table-responsive mt-3">
						<table class="table table-striped table-bordered" id="example">
							<thead class="text-white bg-dark">
								<tr>
									<th scope="col" class="text-white bg-dark">S/N</th>
									<th scope="col" class="text-white bg-dark">Description</th>
									<th scope="col" class="text-white bg-dark">Amount <i class="fas fa-naira-sign"></i></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>Tuition Fees</td>
									<td><i class="fas fa-naira-sign fw-bold"></i> 28,000</td>
								</tr>
								<tr>
									<td>2</td>
									<td>PTA</td>
									<td><i class="fas fa-naira-sign fw-bold"></i> 2,000</td>
								</tr>
								<tr>
									<td>3</td>
									<td>Library/ICT</td>
									<td>NIL</td>
								</tr>
								<tr>
									<td>4</td>
									<td>ID Card</td>
									<td>NIL</td>
								</tr>
								<tr>
									<td>5</td>
									<td>Utility</td>
									<td><i class="fas fa-naira-sign fw-bold"></i> 2,000</td>
								</tr>
								<tr>
									<td>6</td>
									<td>Sanitation</td>
									<td><i class="fas fa-naira-sign fw-bold"></i> 1,000</td>
								</tr>
								<tr>
									<td>Total</td>
									<td colspan="2"><i class="fas fa-naira-sign fw-bold"></i> 33,000</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-12 d-flex align-items-center justify-content-center flex-column">
					<img src="./assests/image/GTB-Loans-e1526366538199.png" alt="">
					<div>
						<p class="mt-2">Parent/Guardian can make payment to the account below</p>
						<table class="table" id="example">
							<thead class="text-white bg-dark">
								<tr>
									<th scope="col">Account name:</th>
									<th scope="col">Victor Alex</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Account no:</td>
									<td>0042760862</td>
								</tr>
								<tr>
									<td>Bank:</td>
									<td>GTBANK</td>
								</tr>
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>
	<br><br>

</section>



<script src="./assests/js/bootstrap.bundle.min.js"></script>
<script src="./assests/js/script.js"></script>
</body>

</html>