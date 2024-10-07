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
                <h1 class="fw-bolder" style="margin-bottom: 16px;">Edit Assignment</h1>
            </div>
        </div>
    </div>

    <div class="row my-5">
        <div class="col-lg-6 col-md-6 col-12">
            <?php
            if (isset($_GET['id'])) {
                // print_r($_GET['id']);
                $id = $_GET['id'];
                $query = "SELECT * FROM assignment WHERE id='$id'";
                $run_query = mysqli_query($con, $query);

                $assignment_data = mysqli_fetch_assoc($run_query);

                // print_r($student_data['username']);
            }
            ?>
            <form action="../controller/server.php" method="POST" class="my-4">
                <div class="mb-3">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="id" value="<?php echo $assignment_data['id'] ?>" hidden>
                    </div>
                    <select class="form-control" name="class" id="class" required>
                        <option value="<?php echo $assignment_data['class'] ?>" selected><?php echo $assignment_data['class'] ?></option>
                        <hr>
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
                        <option value="<?php echo $assignment_data['subject'] ?>"><?php echo $assignment_data['subject'] ?></option>
                        <hr>
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
                    <textarea type="email" class="form-control" id="question_1" placeholder="Question 1" name="question_1" required><?php echo $assignment_data['question_1'] ?>
                    </textarea>
                </div>
                <div class="mb-3">
                    <textarea type="text" class="form-control" id="question_2" placeholder="Question 2" name="question_2"><?php echo $assignment_data['question_2'] ?>
                    </textarea>
                </div>
                <div class="mb-3">
                    <textarea type="text" class="form-control" id="question_3" placeholder="Question 3" name="question_3"><?php echo $assignment_data['question_3'] ?>
                    </textarea>
                </div>
                <div class="mb-3">
                    <textarea type="text" class="form-control" id="question_4" placeholder="Question 4" name="question_4"><?php echo $assignment_data['question_4'] ?>
                    </textarea>
                </div>
                <div class="mb-3">
                    <textarea type="text" class="form-control" id="question_5" placeholder="Question 5" name="question_5"><?php echo $assignment_data['question_5'] ?>
                    </textarea>
                </div>
                <div class="mb-3">
                    <select class="form-control" name="assignment_type" id="assignment_type" required>
                        <option value="<?php echo $assignment_data['assignment_type'] ?>"><?php echo $assignment_data['assignment_type'] ?></option>
                        <hr>
                        <option value="Assignment">Assignment</option>
                        <option value="Project">Project</option>
                    </select>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-success" name="update_assignment">Update Assignment</button>
                    <!-- <a href="./add_teacher.php" class="btn btn-primary ms-5">Add Teachers</a> -->
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