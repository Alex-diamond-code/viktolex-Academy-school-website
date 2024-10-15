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
            <button class="btn btn-primary mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                aria-expanded="false" aria-controls="collapseExample">
                Add Subject
            </button>

            <!-- toggle add class form -->
            <button class="btn btn-primary mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseClass"
                aria-expanded="false" aria-controls="collapseClass">
                Add Class
            </button>

            <!-- toggle add class form -->
            <button class="btn btn-primary mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSession"
                aria-expanded="false" aria-controls="collapseSession">
                Add Session
            </button>

            <!-- toggle add class announcement -->
            <button class="btn btn-primary mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAnnouncement"
                aria-expanded="false" aria-controls="collapseAnnouncement">
                Add Anouncement
            </button>
        </p>

        <div>

            <!-- form for adding subject -->
            <div class="collapse collapse-vertical show" id="collapseExample">
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

            <!-- viewing subject list in table form -->
            <div class="collapse collapse-vertical show mt-2" id="collapseExample">
                <h4 class="font-poppins fw-bold">View Subject</h4>
                <div class="add_form row table-responsive px-2" style="background-color: rgb(255, 255, 255); padding: 30px; border-radius:0.75rem;">
                    <table class="table table-striped table-bordered responsive table-hover" id="example">
                        <thead class="text-white bg-dark">
                            <tr>
                                <th scope="col" class="text-white bg-dark">Subject</th>
                                <th scope="col" class="text-white bg-dark">Description</th>
                                <th scope="col" class="text-white bg-dark">Status</th>
                                <th scope="col" class="text-white bg-dark">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM `subject`";
                            $run_query = mysqli_query($con, $query);

                            while ($row_data = mysqli_fetch_assoc($run_query)) {
                            ?>
                                <tr>
                                    <!-- <td hidden><?php echo $row_data['id'] ?></td> -->
                                    <td><?php echo $row_data['subject_name'] ?></td>
                                    <td><?php echo $row_data['description'] ?></td>
                                    <td><?php echo $row_data['status'] ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu px-2">
                                                <li>
                                                    <a href="subject_edit.php?id=<?php echo $row_data['id'] ?>" class="dropdown-item bg-info text-center text-white mb-2 rounded-2 py-2"><i class="fas fa-edit mx-2"></i>Edit</a>
                                                </li>
                                                <!-- Button trigger modal -->
                                                <li>
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#delete_subject_<?php echo $row_data['id'] ?>" class="dropdown-item bg-danger text-center text-white rounded-2 py-2 delete_student"><i class="fas fa-trash mx-2"></i>Delete</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- form for adding class -->
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

            <!-- view class section in table form -->
            <div class="collapse collapse-vertical mt-2" id="collapseClass">
                <h4 class="font-poppins fw-bold">View Classes</h4>
                <div class="add_form row" style="background-color: rgb(255, 255, 255); padding: 30px; border-radius:0.75rem;">
                    <table class="table table-striped table-bordered responsive table-hover" id="example">
                        <thead class="text-white bg-dark">
                            <tr>
                                <th scope="col" class="text-white bg-dark">Class</th>
                                <th scope="col" class="text-white bg-dark">Description</th>
                                <th scope="col" class="text-white bg-dark">Status</th>
                                <th scope="col" class="text-white bg-dark">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM `class`";
                            $run_query = mysqli_query($con, $query);

                            while ($row_data = mysqli_fetch_assoc($run_query)) {
                            ?>
                                <tr>
                                    <!-- <td hidden><?php echo $row_data['id'] ?></td> -->
                                    <td><?php echo $row_data['class_name'] ?></td>
                                    <td><?php echo $row_data['description'] ?></td>
                                    <td><?php echo $row_data['status'] ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu px-2">
                                                <li>
                                                    <a href="class_edit.php?id=<?php echo $row_data['id'] ?>" class="dropdown-item bg-info text-center text-white mb-2 rounded-2 py-2"><i class="fas fa-edit mx-2"></i>Edit</a>
                                                </li>
                                                <!-- Button trigger modal -->
                                                <li>
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#delete_class_<?php echo $row_data['id'] ?>" class="dropdown-item bg-danger text-center text-white rounded-2 py-2 delete_student"><i class="fas fa-trash mx-2"></i>Delete</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- form for adding session -->
            <div class="collapse collapse-vertical mt-2" id="collapseSession">
                <h4 class="font-poppins fw-bold">Add Session</h4>
                <div class="add_form row" style="background-color: rgb(255, 255, 255); padding: 30px; border-radius:0.75rem;">
                    <div class="col-lg-6 col-md-6 col-12 my-auto">
                        <span class="text-muted px-2"><i>Note that all fields are require</i></span>
                        <form action="../controller/server.php" method="POST" class="my-4">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="session_name" placeholder="2017/2018" name="session_name" required>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" id="description" placeholder="Session description" name="description" required></textarea>
                            </div>
                            <div class="mb-3">
                                <select type="text" class="form-control" id="status" name="status" required>
                                    <option value="Select session status" hidden selected>Select session status</option>
                                    <option value="Active">Active</option>
                                    <option value="Disabled">Disabled</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-success" name="add_session">Add Session</button>
                                <!-- <a href="./add_teacher.php" class="btn btn-primary ms-5">Add Teachers</a> -->
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 d-flex align-items-center justify-content-lg-center">
                        <img src="./assests/image/Learning-cuate.png" class="img-fluid" alt="" width="80%">
                    </div>
                </div>
            </div>

            <!-- view session section in table form -->
            <div class="collapse collapse-vertical mt-2" id="collapseSession">
                <h4 class="font-poppins fw-bold">View Session</h4>
                <div class="add_form row" style="background-color: rgb(255, 255, 255); padding: 30px; border-radius:0.75rem;">
                    <table class="table table-striped table-bordered responsive table-hover" id="example">
                        <thead class="text-white bg-dark">
                            <tr>
                                <th scope="col" class="text-white bg-dark">Session</th>
                                <th scope="col" class="text-white bg-dark">Description</th>
                                <th scope="col" class="text-white bg-dark">Status</th>
                                <th scope="col" class="text-white bg-dark">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM `session` ORDER BY id DESC";
                            $run_query = mysqli_query($con, $query);

                            while ($row_data = mysqli_fetch_assoc($run_query)) {
                            ?>
                                <tr>
                                    <!-- <td hidden><?php echo $row_data['id'] ?></td> -->
                                    <td><?php echo $row_data['s_name'] ?></td>
                                    <td><?php echo $row_data['s_desc'] ?></td>
                                    <td><?php echo $row_data['s_status'] ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu px-2">
                                                <li>
                                                    <a href="session_edit.php?id=<?php echo $row_data['id'] ?>" class="dropdown-item bg-info text-center text-white mb-2 rounded-2 py-2"><i class="fas fa-edit mx-2"></i>Edit</a>
                                                </li>
                                                <!-- Button trigger modal -->
                                                <li>
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#delete_session_<?php echo $row_data['id'] ?>" class="dropdown-item bg-danger text-center text-white rounded-2 py-2 delete_student"><i class="fas fa-trash mx-2"></i>Delete</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- form for adding anouncement -->
            <div class="collapse collapse-vertical mt-2" id="collapseAnnouncement">
                <h4 class="font-poppins fw-bold">Add Announcement</h4>
                <div class="add_form row" style="background-color: rgb(255, 255, 255); padding: 30px; border-radius:0.75rem;">
                    <div class="col-lg-6 col-md-6 col-12 my-auto">
                        <span class="text-muted px-2"><i>Note that all fields are require</i></span>
                        <form action="../controller/server.php" method="POST" class="my-4">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="announcement_name" placeholder="Announcement title" name="announcement_name" required>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" id="description" placeholder="What is on your mind" name="description" required></textarea>
                            </div>
                            <div class="mb-3">
                                <select type="text" class="form-control" id="status" name="status" required>
                                    <option value="Select anouncement status" hidden selected>Select anouncement status</option>
                                    <option value="Active">Active</option>
                                    <option value="Disabled">Disabled</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-success" name="add_anouncement">Add Anouncement</button>
                                <!-- <a href="./add_teacher.php" class="btn btn-primary ms-5">Add Teachers</a> -->
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 d-flex align-items-center justify-content-lg-center">
                        <img src="./assests/image/Learning-cuate.png" class="img-fluid" alt="" width="80%">
                    </div>
                </div>
            </div>
            <br>
        </div>

        <div class="mt-4 mx-2">
            <h4>Anouncement list</h4>
            <div class="report-container">
                <?php
                $query = "SELECT * FROM anouncement";
                $run_query = mysqli_query($con, $query);
                while ($row_data = mysqli_fetch_assoc($run_query)) {
                ?>
                    <div class="report-box">
                        <input type="text" value="<?php echo $row_data['id'] ?>" hidden>
                        <h5><?php echo $row_data['a_title'] ?></h5>
                        <p class="fw-bold"><?php echo $row_data['a_status'] ?></p>
                        <p><?php echo $row_data['a_desc'] ?></p>
                        <div class="d-flex align-items-center justify-content-between">
                            <a class="btn btn-info" href="anouncement_edit.php?id=<?php echo $row_data['id'] ?>"><i class="fas fa-edit mx-2"></i>Edit</a>
                            <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete_report_<?php echo $row_data['id'] ?>"><i class="fas fa-trash mx-2"></i>Delete</button>
                        </div>
                    </div>
                <?php } ?>

            </div>
            <br><br>
        </div>
    </div>




    <!-- ######################################### DELETE MODAL SECTION ##################################################################################################################################################################################-->

    <!-- delete subject modal -->
    <?php
    $query = "SELECT * FROM `subject`";
    $run_query = mysqli_query($con, $query);

    while ($row_data = mysqli_fetch_assoc($run_query)) {
    ?>
        <div class="modal fade" id="delete_subject_<?php echo $row_data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete subject</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are sure you want to delete this subject !!!
                    </div>
                    <div class="modal-footer">
                        <form action="../controller/server.php" method="POST">
                            <input hidden name="delete_id" value="<?php echo $row_data['id'] ?>">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancel</button>
                            <button type="submit" class="btn btn-success" name="delete_subject">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>


    <!-- delete class modal -->
    <?php
    $query = "SELECT * FROM `class`";
    $run_query = mysqli_query($con, $query);

    while ($row_data = mysqli_fetch_assoc($run_query)) {
    ?>
        <div class="modal fade" id="delete_class_<?php echo $row_data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Class</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are sure you want to delete this class !!!
                    </div>
                    <div class="modal-footer">
                        <form action="../controller/server.php" method="POST">
                            <input hidden name="delete_id" value="<?php echo $row_data['id'] ?>">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancel</button>
                            <button type="submit" class="btn btn-success" name="delete_class">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>


    <!-- delete session modal -->
    <?php
    $query = "SELECT * FROM `session`";
    $run_query = mysqli_query($con, $query);

    while ($row_data = mysqli_fetch_assoc($run_query)) {
    ?>
        <div class="modal fade" id="delete_session_<?php echo $row_data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete session</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are sure you want to delete this session !!!
                    </div>
                    <div class="modal-footer">
                        <form action="../controller/server.php" method="POST">
                            <input hidden name="delete_id" value="<?php echo $row_data['id'] ?>">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancel</button>
                            <button type="submit" class="btn btn-success" name="delete_session">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>


    <!-- delete anouncement modal -->
    <?php
    $query = "SELECT * FROM `anouncement`";
    $run_query = mysqli_query($con, $query);
    while ($row_data = mysqli_fetch_assoc($run_query)) {
    ?>
        <div class="modal fade" id="delete_report_<?php echo $row_data['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Trying to delete anouncement</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../controller/server.php" method="post">
                            <input type="text" name="id" value="<?php echo $row_data['id'] ?>" hidden>
                            Are you sure you want to delete this anouncement
                            <div class="modal-footer mt-1">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancel</button>
                                <button type="submit" class="btn btn-success" name="delete_anouncement">Delete</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    <?php } ?>


    <!-- ############################################################################################################################################################################################################################################ -->
</section>



<script src="./assests/js/jquery.js"></script>
<script src="./assests/js/bootstrap.bundle.min.js"></script>
<script src="./assests/js/datatables.js"></script>
<script src="./assests/js/script.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            //disable sorting on last column
            "columnDefs": [{
                "orderable": false,
                "targets": 3
            }],
            language: {
                'paginate': {
                    'previous': '<span class="fa fa-chevron-left"></span>',
                    'next': '<span class="fa fa-chevron-right"></span>'
                },
                "lengthMenu": 'Display <select class="form-control input-sm">' +
                    '<option value="10" selected>10</option>' +
                    '<option value="20">20</option>' +
                    '<option value="30">30</option>' +
                    '<option value="40">40</option>' +
                    '<option value="50">50</option>' +
                    '<option value="-1">All</option>' +
                    '</select> results'
            }
        });
    });
</script>
</body>

</html>