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
                <h1 class="fw-bolder" style="margin-bottom: 16px;">Curriculum</h1>
            </div>
        </div>
    </div>

    <div class="mt-4">
        
        <p class="">
            <!-- toggle add subject form -->
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                aria-expanded="false" aria-controls="collapseExample">
                Add Subject
            </button>

            <!-- toggle add class form -->
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseClass"
                aria-expanded="false" aria-controls="collapseClass">
                Add Class
            </button>
        </p>

        <div>
            <div class="collapse collapse-vertical" id="collapseExample">
                <h4 class="font-poppins fw-bold">Add Subject</h4>
                <div class="add_form row" style="background-color: rgb(255, 255, 255); padding: 30px; border-radius:0.75rem;">
                    <div class="col-lg-6 col-md-6 col-12 my-auto">
                        <span class="text-muted px-2"><i>Note that all fields are require</i></span>
                        <form action="../controller/server.php" method="POST" class="my-4">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="subject_name" placeholder="Subject name" name="subject_name" required>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" id="description" placeholder="Subject description" name="description" required></textarea>
                            </div>
                            <div class="mb-3">
                                <select type="text" class="form-control" id="status" name="status" required>
                                    <option value="Select subject status" hidden selected>Select subject status</option>
                                    <option value="Active">Active</option>
                                    <option value="Disabled">Disabled</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-success" name="add_subject">Add Subject</button>
                                <!-- <a href="./add_teacher.php" class="btn btn-primary ms-5">Add Teachers</a> -->
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 d-flex align-items-center justify-content-lg-center">
                        <img src="./assests/image/Learning-cuate.png" class="img-fluid" alt="" width="80%">
                    </div>
                </div>
            </div>

            <div class="collapse collapse-vertical mt-2" id="collapseClass">
                <h4 class="font-poppins fw-bold">Add Class</h4>
                <div class="add_form row" style="background-color: rgb(255, 255, 255); padding: 30px; border-radius:0.75rem;">
                    <div class="col-lg-6 col-md-6 col-12 my-auto">
                        <span class="text-muted px-2"><i>Note that all fields are require</i></span>
                        <form action="../controller/server.php" method="POST" class="my-4">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="class_name" placeholder="Class name" name="class_name" required>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" id="description" placeholder="Class description" name="description" required></textarea>
                            </div>
                            <div class="mb-3">
                                <select type="text" class="form-control" id="status" name="status" required>
                                    <option value="Select class status" hidden selected>Select class status</option>
                                    <option value="Active">Active</option>
                                    <option value="Disabled">Disabled</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-success" name="add_class">Add Class</button>
                                <!-- <a href="./add_teacher.php" class="btn btn-primary ms-5">Add Teachers</a> -->
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 d-flex align-items-center justify-content-lg-center">
                        <img src="./assests/image/Learning-cuate.png" class="img-fluid" alt="" width="80%">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">

    </div>
</section>



<script src="./assests/js/bootstrap.bundle.min.js"></script>
<script src="./assests/js/script.js"></script>
</body>

</html>