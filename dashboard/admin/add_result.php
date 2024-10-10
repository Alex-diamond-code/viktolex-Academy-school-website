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
                <h1 class="fw-bolder" style="margin-bottom: 16px;">Add Result</h1>
            </div>
        </div>
    </div>


    <!-- add result section -->
    <div class="mt-4">
        <div class="add_form row mt-3" style="background-color: rgb(255, 255, 255); padding:30px 20px; border-radius:0.75rem;">
            <span class="text-muted px-2"><i>Note that all fields are require</i></span>
            <form action="../controller/server.php" method="POST">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12 px-2">
                        <div class="mb-3">
                            <select class="form-control" name="term" id="term" required>
                                <option value="First Term">First Term</option>
                                <option value="Second Term">Second Term</option>
                                <option value="Third Term">Third Term</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-control" name="class" id="class" required>
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
                                <option value="" selected disabled hidden>Select username</option>
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
                            <input type="number" class="form-control" id="first_test" placeholder="1st test" value="" name="first_test" required>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" id="second_test" placeholder="2nd test" value="" name="second_test" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 px-2">
                        <div class="mb-3">
                            <input type="number" class="form-control" id="exam" placeholder="Exam" value="" name="exam" required>
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" id="total" placeholder="Total" value="" name="total" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="grade" placeholder="Grade" name="grade" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn btn-success px-4" name="add_result">Add Result</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- display of result data -->
    <div class="mt-4 table-responsive">
        <h4 class="font-poppins fw-bold">List of Result</h4>
        <table class="table table-striped table-bordered table-light" id="example">
            <thead>
                <tr>
                    <th scope="col" class="text-white bg-dark">Term</th>
                    <th scope="col" class="text-white bg-dark">Username</th>
                    <th scope="col" class="text-white bg-dark">Class</th>
                    <th scope="col" class="text-white bg-dark">Subject</th>
                    <th scope="col" class="text-white bg-dark">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM result";
                $run_query = mysqli_query($con, $query);

                while ($row_data = mysqli_fetch_assoc($run_query)) {
                ?>
                    <tr>
                        <td><?php echo $row_data['term'] ?></td>
                        <td><?php echo $row_data['username'] ?></td>
                        <td><?php echo $row_data['class'] ?></td>
                        <td><?php echo $row_data['subject'] ?></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu px-2">
                                    <li><a href="./result_edit.php?id=<?php echo $row_data['id'] ?>" class="dropdown-item bg-info text-center text-white mb-2 rounded-2 py-2"><i class="fas fa-edit mx-2"></i>Edit</a></li>
                                    <!-- Button trigger modal -->
                                    <li>
                                        <button class="dropdown-item bg-danger text-center text-white rounded-2 py-2" data-bs-toggle="modal" data-bs-target="#delete_result_<?php echo $row_data['id'] ?>"> <i class="fas fa-trash mx-2"></i>Delete</button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br><br>
    </div>


    <!-- delete result section -->
    <!-- Modal -->
    <?php
    $query = "SELECT * FROM result";
    $run_query = mysqli_query($con, $query);

    while ($row_data = mysqli_fetch_assoc($run_query)) {
    ?>
        <div class="modal fade" id="delete_result_<?php echo $row_data['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Result</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are sure you want to delete this result !!!
                    </div>
                    <div class="modal-footer">
                        <form action="../controller/server.php" method="POST">
                            <input hidden name="delete_id" value="<?php echo $row_data['id'] ?>">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancel</button>
                            <button type="submit" name="delete_result" class="btn btn-success" data-bs-dismiss="modal">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

</section>


<script src="./assests/js/jquery.js"></script>
<script src="./assests/js/datatables.js"></script>
<script src="./assests/js/bootstrap.bundle.min.js"></script>
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