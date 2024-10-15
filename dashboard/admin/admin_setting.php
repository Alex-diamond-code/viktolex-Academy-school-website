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
                <h1 class="fw-bolder" style="margin-bottom: 16px;">Settings</h1>
            </div>
        </div>
    </div>

    <div class="row my-3" style="background-color: rgb(255, 255, 255); padding: 30px; border-radius:0.75rem;">
        <div class="col-lg-6 col-md-6 col-12">
            <?php
            // print_r($_SESSION['usertype']);
            $query = 'SELECT * FROM users WHERE usertype="admin"';
            $run_query = mysqli_query($con, $query);

            $admin_data = mysqli_fetch_assoc($run_query);
            ?>
            <span class="text-muted px-2"><i>Hey <b><?php echo $admin_data['username']?></b> updating your profile is very essential</i></span>
            <form action="../controller/server.php" method="POST" class="my-1">
                <input type="text" class="form-control" id="id" placeholder="id" name="id" hidden value="<?php echo $admin_data['id'] ?>">
                <div class="mb-3">
                    <input type="text" class="form-control" id="fullname" placeholder="Fullname" name="fullname" required value="<?php echo $admin_data['fullname'] ?>">
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" placeholder="Email Address" name="email" required value="<?php echo $admin_data['email'] ?>">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="phonenumber" placeholder="Phone number" name="phonenumber" required value="<?php echo $admin_data['phone'] ?>">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="username" placeholder="Username" name="username" required value="<?php echo $admin_data['username'] ?>" disabled>
                </div>
                <div class="mb-3">
                    <select class="form-control" name="gender" id="gender" required>
                        <option value="<?php echo $admin_data['gender'] ?>" selected><?php echo $admin_data['gender'] ?></option>
                        <hr>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="address" placeholder="address" name="address" required value="<?php echo $admin_data['address'] ?>">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required value="<?php echo $admin_data['password'] ?>">
                </div>

                <div class="d-flex align-items-center justify-content-between">
                    <!-- <a href="./student_record.php" class="btn btn-danger">cancel</a> -->
                    <button type="submit" class="btn btn-success" name="update_admin">Update Profile</button>
                </div>

            </form>
        </div>
        <div class="col-lg-6 col-md-6 col-12 d-flex align-items-center justify-content-center">
            <div class="d-sm-none d-lg-block d-md-block d-none mx-4 py-5">
                <img src="./assests/image/profile.png" class="img-fluid" alt="" width="100%">
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