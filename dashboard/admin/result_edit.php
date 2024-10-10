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
                <h1 class="fw-bolder" style="margin-bottom: 16px;">Edit Result</h1>
            </div>
        </div>
    </div>


    <!-- edit result section -->
    <div class="mt-4">
        <div class="add_form row mt-3" style="background-color: rgb(255, 255, 255); padding:30px 20px; border-radius:0.75rem;">
            <span class="text-muted px-2 mb-3"><i>Note that all fields are require</i></span>
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = "SELECT * FROM result WHERE id='$id'";
                $run_query = mysqli_query($con, $query);

                $result_data = mysqli_fetch_assoc($run_query);
            }
            ?>
            <form action="../controller/server.php" method="POST">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 px-2">
                        <input type="number" class="form-control" value="<?php echo $result_data['id'] ?>" name="id" required hidden>
                        <div class="mb-3">
                            <select class="form-control" name="term" id="term" required>
                                <option value="<?php echo $result_data['term'] ?>" selected><?php echo $result_data['term'] ?></option>
                                <option value="First Term">First Term</option>
                                <option value="Second Term">Second Term</option>
                                <option value="Third Term">Third Term</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-control" name="class" id="class" required>
                                <option value="<?php echo $result_data['class'] ?>" selected><?php echo $result_data['class'] ?></option>
                                <?php
                                $query = "SELECT * FROM `class` WHERE status='Active'";
                                $run_query = mysqli_query($con, $query);
                                while ($class = mysqli_fetch_assoc($run_query)) {
                                ?>
                                    <option value="<?php echo $class['class_name'] ?>"><?php echo $class['class_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-control" name="username" id="username" required>
                                <option value="<?php echo $result_data['username'] ?>" selected><?php echo $result_data['username'] ?></option>
                                <?php
                                $query = "SELECT * FROM users WHERE usertype='student'";
                                $run_query = mysqli_query($con, $query);

                                while ($row_data = mysqli_fetch_assoc($run_query)) {

                                ?>
                                    <option><?php echo $row_data['username'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 px-2">
                        <div class="mb-3">
                            <select class="form-control" name="subject" id="Subject" required>
                                <option value="<?php echo $result_data['subject'] ?>" selected><?php echo $result_data['subject'] ?></option>
                                <?php
                                $query = "SELECT * FROM `subject` WHERE status='Active'";
                                $run_query = mysqli_query($con, $query);
                                while ($subject = mysqli_fetch_assoc($run_query)) {
                                ?>
                                    <option value="<?php echo $subject['subject_name'] ?>"><?php echo $subject['subject_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" id="first_test" placeholder="1st test" value="<?php echo $result_data['1st_test'] ?>" name="first_test" required>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" id="second_test" placeholder="2nd test" value="<?php echo $result_data['2nd_test'] ?>" name="second_test" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 px-2">
                        <div class="mb-3">
                            <input type="number" class="form-control" id="exam" placeholder="Exam" value="<?php echo $result_data['exams'] ?>" name="exam" required>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" id="total" placeholder="Total" value="<?php echo $result_data['total'] ?>" name="total" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="grade" placeholder="Grade" value="<?php echo $result_data['grade'] ?>" name="grade" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-between align-items-center">
                        <a href="./add_result.php" class="btn btn-danger px-5">cancel</a>
                        <button type="submit" class="btn btn-success px-4" name="update_result">Update Result</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>



<script src="./assests/js/bootstrap.bundle.min.js"></script>
<script src="./assests/js/script.js"></script>
</body>

</html>