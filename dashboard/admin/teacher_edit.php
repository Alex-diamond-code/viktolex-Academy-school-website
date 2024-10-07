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

    <!-- welcome bar section -->
    <div class="welcome_bar mb-2 mt-3">
        <div class="row gy-3">
            <div class="col-lg-12 col-md-12 user-sms">
                <h1 class="fw-bolder" style="margin-bottom: 16px;">Edit Teacher</h1>
            </div>
        </div>
    </div>

    <div class="row my-5">
        <div class="col-lg-6 col-md-6 col-12">
            <?php
                if (isset($_GET['id'])) {
                    // print_r($_GET['id']);
                    $id = $_GET['id'];
                    $query = "SELECT * FROM teacher WHERE id='$id'";
                    $run_query = mysqli_query($con, $query);

                    $student_data = mysqli_fetch_assoc($run_query);

                    // print_r($student_data['username']);
                }
            ?>
            <form action="../controller/server.php" method="POST" class="my-1">
                <input type="text" class="form-control" id="id" placeholder="id" name="id" hidden value="<?php echo $student_data['id'] ?>">
                <div class="mb-3">
                    <input type="text" class="form-control" id="fullname" placeholder="Fullname" name="fullname" required value="<?php echo $student_data['fullname'] ?>">
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" placeholder="Email Address" name="email" required value="<?php echo $student_data['email'] ?>">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="phonenumber" placeholder="Phone number" name="phonenumber" required value="<?php echo $student_data['phone'] ?>">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="username" placeholder="Username" name="username" required value="<?php echo $student_data['username'] ?>">
                </div>
                <div class="mb-3">
                    <select class="form-control" name="gender" id="gender" required>
                        <option value="<?php echo $student_data['gender'] ?>" selected><?php echo $student_data['gender'] ?></option>
                        <hr>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="address" placeholder="address" name="address" required value="<?php echo $student_data['address'] ?>">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required value="<?php echo $student_data['password'] ?>">
                </div>

                <div class="d-flex align-items-center justify-content-between">
                    <a href="./Teacher_record.php" class="btn btn-danger">cancel</a>
                    <button type="submit" class="btn btn-success" name="update_teacher">Update</button>
                </div>

            </form>
        </div>
        <div class="col-lg-6 col-md-6 col-12 d-flex align-items-center justify-content-center">
            <div class="d-sm-none d-lg-block d-md-block d-none mx-4">
                <img src="./assests/image/edit _student.png" class="img-fluid" alt="" width="80%">
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