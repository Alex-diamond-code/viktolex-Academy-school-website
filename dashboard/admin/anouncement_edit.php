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
                <h1 class="fw-bolder" style="margin-bottom: 16px;">Edit student</h1>
            </div>
        </div>
    </div>

    <div class="row my-5" style="background-color: rgb(255, 255, 255); padding: 30px; border-radius:0.75rem;">
        <div class="col-lg-6 col-md-6 col-12">
            <?php
            if (isset($_GET['id'])) {
                // print_r($_GET['id']);
                $id = $_GET['id'];
                $query = "SELECT * FROM `anouncement` WHERE id='$id'";
                $run_query = mysqli_query($con, $query);

                $row_data = mysqli_fetch_assoc($run_query);
            }
            ?>
            <form action="../controller/server.php" method="POST" class="my-4">
                <div class="mb-3">
                    <input type="text" class="form-control" value="<?php echo $row_data['id'] ?>" name="announcement_id" required hidden>
                    <input type="text" class="form-control" id="announcement_name" placeholder="Announcement title" value="<?php echo $row_data['a_title'] ?>" name="announcement_name" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" id="description" placeholder="What is on your mind" name="description" required><?php echo $row_data['a_desc'] ?></textarea>
                </div>
                <div class="mb-3">
                    <select type="text" class="form-control" id="status" name="status" required>
                        <option value="<?php echo $row_data['a_status'] ?>" hidden selected><?php echo $row_data['a_status'] ?></option>
                        <option value="Active">Active</option>
                        <option value="Disabled">Disabled</option>
                    </select>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="./curriculum.php" class="btn btn-danger">cancel</a>
                    <button type="submit" class="btn btn-success" name="edit_anouncement">Update Anouncement</button>
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