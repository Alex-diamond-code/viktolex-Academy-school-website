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
                <h1 class="fw-bolder" style="margin-bottom: 16px;">Edit Academic Session</h1>
            </div>
        </div>
    </div>

    <div class="row my-5">
        <div class="col-lg-6 col-md-6 col-12">
            <?php
            if (isset($_GET['id'])) {
                // print_r($_GET['id']);
                $id = $_GET['id'];
                $query = "SELECT * FROM `session` WHERE id='$id'";
                $run_query = mysqli_query($con, $query);

                $session_data = mysqli_fetch_assoc($run_query);
            }
            ?>
            <form action="../controller/server.php" method="POST" class="my-4">
                <div class="mb-3">
                    <input type="text" class="form-control" name="session_id" value="<?php echo $session_data['id'] ?>" hidden>
                    <input type="text" class="form-control" id="session_name" placeholder="Session name" name="session_name" required value="<?php echo $session_data['s_name'] ?>">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" id="description" name="description" required><?php echo $session_data['s_desc'] ?></textarea>
                </div>
                <div class="mb-3">
                    <select type="text" class="form-control" id="status" name="status" required>
                        <option value="<?php echo $session_data['s_status'] ?>" hidden selected><?php echo $session_data['s_status'] ?></option>
                        <option value="Active">Active</option>
                        <option value="Disabled">Disabled</option>
                    </select>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="./curriculum.php" class="btn btn-danger">cancel</a>
                    <button type="submit" class="btn btn-success" name="update_session">Update Session</button>
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