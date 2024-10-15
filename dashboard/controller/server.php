<?php

session_start();
require 'connection.php';


// code for adding students
if (isset($_POST['add_student'])) {
    // student details
    $f_name = mysqli_real_escape_string($con, $_POST['fullname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $usertype = 'student';
    $status = 'Active';
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $date = date('Y-m-d H:i:s');


    // check if student username exist
    $query = "SELECT * FROM users WHERE username='$username'";
    $run_query = mysqli_query($con, $query);

    $row = mysqli_fetch_assoc($run_query);
    if ($row['username'] == 1 || $row['username'] > 0) {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
            <strong>Hey,</strong> Username already taken
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
        header('Location: ../admin/add_student.php');
        exit();
    } else {
        // sql database query
        $query = "INSERT INTO users (fullname, email, phone, status, username, usertype, gender, address, password, date) 
        VALUE('$f_name', '$email', '$phonenumber', '$status', '$username', '$usertype', '$gender', '$address', '$password', '$date')";

        if (mysqli_query($con,  $query)) {
            $_SESSION['message'] =  '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            <strong>Hey,</strong> Student added successfully
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            ';
            header('Location: ../admin/add_student.php');
            die(0);
        } else {
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            <strong>Hey,</strong> Teacher was not added
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            ';
            header('Location: ../admin/add_student.php');
            die(1);
        }
    }
    mysqli_close($con);
}


// code for adding teachers
if (isset($_POST['add_teacher'])) {
    // teachers details
    $f_name = mysqli_real_escape_string($con, $_POST['fullname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $usertype = 'teacher';
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $date = date('Y-m-d H:i:s');

    // check if teacher username exist
    $query = "SELECT * FROM teacher WHERE username='$username'";
    $run_query = mysqli_query($con, $query);

    $row = mysqli_fetch_assoc($run_query);
    if ($row['username'] == 1 || $row['username'] > 0) {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
            <strong>Hey,</strong> Username already taken
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
        header('Location: ../admin/add_teacher.php');
        exit();
    } else {
        $query = "INSERT INTO teacher (fullname, email, phone, username, usertype, gender, address, password, date) 
        VALUE('$f_name', '$email', '$phonenumber', '$username', '$usertype', '$gender', '$address', '$password', '$date')";

        $run_query = mysqli_query($con, $query);

        if ($run_query) {
            $_SESSION['message'] =  '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey</strong> Teacher added successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
            header('Location: ../admin/add_teacher.php');
            die(0);
        } else {
            $_SESSION['message'] =  '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey</strong> Teacher was not added
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
            header('Location: ../admin/add_teacher.php');
            die(0);
        }
    }
    mysqli_close($con);
}


// code for student and admin login
if (isset($_POST['login_btn'])) {
    var_dump($_POST); // Verify form submission

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $run_query = mysqli_query($con, $query);

    if (!$run_query) {
        echo "Database error: " . mysqli_error($con);
        exit;
    }

    $row = mysqli_fetch_array($run_query);

    if ($row) {

        if ($row['usertype'] == 'student' &&  $row['username'] == $username) {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $row['id'];
            $_SESSION['status'] = $row['status'] ;
            $_SESSION['usertype'] = 'student';
            header('Location: ../student/student.php');
            exit;
        } elseif ($row['usertype'] == 'admin' &&  $row['username'] == 'Admin') {

            $_SESSION['username'] = $username;
            $_SESSION['usertype'] = 'admin';
            header('Location: ../admin/admin.php');
            exit;
        } else {
            header('Location: ../../portal.php');
        }
    } else {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
            <strong>Hey,</strong> User not found
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        header('Location: ../../portal.');
    }
    mysqli_close($con);
}

// update student record 
if (isset($_POST['update_student'])) {

    $id = mysqli_real_escape_string($con, $_POST['id']);
    $f_name = mysqli_real_escape_string($con, $_POST['fullname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "UPDATE users SET fullname='$f_name', email='$email', phone='$phonenumber', username='$username', gender='$gender', address='$address', password='$password', status='$status' WHERE id='$id'";
    $run_query = mysqli_query($con, $query);

    if ($run_query) {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <strong>Hey,</strong> Student updated successfull
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
        header('Location: ../admin/student_record.php');
    } else {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
            <strong>Hey,</strong> Student updating failed
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
        header('Location: ../admin/student_record.php');
    }
    mysqli_close($con);
}

// updating teachers record
if (isset($_POST['update_teacher'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $f_name = mysqli_real_escape_string($con, $_POST['fullname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "UPDATE teacher SET fullname='$f_name', email='$email', phone='$phonenumber', username='$username', gender='$gender', address='$address', password='$password' WHERE id='$id'";
    $run_query = mysqli_query($con, $query);

    if ($run_query) {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            <strong>Hey,</strong> Teacher updated successfull
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
        header('Location: ../admin/Teacher_record.php');
    } else {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
            <strong>Hey,</strong> Teacher updating failed
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
        header('Location: ../admin/Teacher_record.php');
    }
    mysqli_close($con);
}


// delete student record
if (isset($_POST['delete_student'])) {
    $id = $_POST['delete_id'];
    // print_r($id);

    $query = "DELETE FROM users WHERE id='$id'";
    $run_query  = mysqli_query($con, $query);

    if ($run_query) {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Student deleted successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/student_record.php');
    } else {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Failed to delete Student
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/student_record.php');
    }
}


// delete teacher record
if (isset($_POST['delete_teacher'])) {
    $id = $_POST['delete_id'];
    // print_r($id);

    $query = "DELETE FROM teacher WHERE id='$id'";
    $run_query = mysqli_query($con, $query);

    if ($run_query) {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Teacher deleted successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/Teacher_record.php');
    } else {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Failed to delete Teacher
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/Teacher_record.php');
    }
}


// code for adding assignments
if (isset($_POST['add_assignment'])) {
    // print_r($_POST['add_assignment']);
    $class = mysqli_real_escape_string($con, $_POST['class']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $question_1 = mysqli_real_escape_string($con, $_POST['question_1']);
    $question_2 = mysqli_real_escape_string($con, $_POST['question_2']);
    $question_3 = mysqli_real_escape_string($con, $_POST['question_3']);
    $question_4 = mysqli_real_escape_string($con, $_POST['question_4']);
    $question_5 = mysqli_real_escape_string($con, $_POST['question_5']);
    $assignment_type = mysqli_real_escape_string($con, $_POST['assignment_type']);

    // checking for errors
    if (empty($question_1)) {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Question 1 has to be filled out.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/assignment.php');
    } else {
        $query = "INSERT INTO assignment (class, subject, question_1, question_2, question_3, question_4, question_5, assignment_type) 
            VALUE('$class', '$subject', '$question_1', '$question_2', '$question_3', '$question_4', '$question_5', '$assignment_type')";

        $run_query = mysqli_query($con, $query);
        if ($run_query) {
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Assignment added successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
            header('Location: ../admin/assignment.php');
        } else {
            $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Failed to add assignment
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
            header('Location: ../admin/assignment.php');
        }
    }
    mysqli_close($con);
}

// code for adding assignment
if (isset($_POST['delete_assignment'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM assignment WHERE id='$id'";
    $run_query = mysqli_query($con, $query);

    if ($run_query) {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Assignment deleted successfully 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/assignment.php');
    } else {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Failed to delete assignment
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/assignment.php');
    }
    mysqli_close($con);
}

// code for updating assignment
if (isset($_POST['update_assignment'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $class = mysqli_real_escape_string($con, $_POST['class']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $question_1 = mysqli_real_escape_string($con, $_POST['question_1']);
    $question_2 = mysqli_real_escape_string($con, $_POST['question_2']);
    $question_3 = mysqli_real_escape_string($con, $_POST['question_3']);
    $question_4 = mysqli_real_escape_string($con, $_POST['question_4']);
    $question_5 = mysqli_real_escape_string($con, $_POST['question_5']);
    $assignment_type = mysqli_real_escape_string($con, $_POST['assignment_type']);

    // checking for error
    if (empty($question_1)) {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Question 1 is empty please fill it out 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/assignment_edit.php');
    } else {
        $query = "UPDATE assignment SET class='$class', subject='$subject', question_1='$question_1', question_2='$question_2', question_3='$question_3', 
            question_4='$question_4', question_5='$question_5', assignment_type='$assignment_type' WHERE id='$id'";
        $run_query = mysqli_query($con, $query);

        if ($run_query) {
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Assignment updated successfully 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
            header('Location: ../admin/assignment.php');
        } else {
            $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Failed to update assignment 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
            header('Location: ../admin/assignment.php');
        }
    }
    mysqli_close($con);
}


// code for student report
if (isset($_POST['student_report'])) {
    // reportdetails
    // $username = mysqli_real_escape_string($con, $_POST['username']);
    $username = mysqli_real_escape_string($con, $_SESSION['username']);
    $tile = mysqli_real_escape_string($con, $_POST['title']);
    $complain = mysqli_real_escape_string($con, $_POST['complain']);

    // checking for error
    if (empty($tile) || empty($complain)) {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> please fill out all the fields
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../student/report_issue.php');
    } else {
        $query = "INSERT INTO report (username, title, complain) VALUE ('$username', '$tile', '$complain')";
        $run_query = mysqli_query($con, $query);

        if ($run_query) {
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Your report has been delivered, the Admin will get back to you
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
            header('Location: ../student/report_issue.php');
        } else {
            $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Error while delivering your report, try again later
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
            header('Location: ../student/report_issue.php');
        }
    }
    mysqli_close($con);
}


// code for deleting report
if (isset($_POST['delete_report'])) {
    $id = $_POST['id'];
    // print_r($id);
    $query = "DELETE FROM report WHERE id='$id'";
    $run_query = mysqli_query($con, $query);

    if ($run_query) {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Report deleted successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/reports.php');
    } else {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Failed to delete report
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/reports.php');
    }
    mysqli_close($con);
}


// code for adding result 
if (isset($_POST['add_result'])) {
    // result data 
    $term = mysqli_real_escape_string($con, $_POST['term']);
    $class = mysqli_real_escape_string($con, $_POST['class']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $first_test = mysqli_real_escape_string($con, $_POST['first_test']);
    $second_test = mysqli_real_escape_string($con, $_POST['second_test']);
    $exam = mysqli_real_escape_string($con, $_POST['exam']);
    $total = mysqli_real_escape_string($con, $_POST['total']);
    $grade = mysqli_real_escape_string($con, $_POST['grade']);
    $session = mysqli_real_escape_string($con, $_POST['session']);

    // validating inputed data
    if ($first_test > 15 || $second_test > 15) {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> The test score is greater than 15
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/add_result.php');
    } else {
        if ($exam > 70) {
            $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> The exam score is greater than 70
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
            header('Location: ../admin/add_result.php');
        } else {
            $query = "INSERT INTO result (term, username, class, subject, 1st_test, 2nd_test, exams, total, grade, session) 
                VALUE('$term', '$username', '$class', '$subject', '$first_test', '$second_test', '$exam', '$total', '$grade', '$session')";
            $run_query = mysqli_query($con, $query);

            if ($run_query) {
                $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Result uploaded successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
                header('Location: ../admin/add_result.php');
            } else {
                $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Error uploading result, try again
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
                header('Location: ../admin/add_result.php');
            }
        }
    }
    mysqli_close($con);
}


// code for updating result
if (isset($_POST['update_result'])) {
    // updated result data
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $term = mysqli_real_escape_string($con, $_POST['term']);
    $class = mysqli_real_escape_string($con, $_POST['class']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $first_test = mysqli_real_escape_string($con, $_POST['first_test']);
    $second_test = mysqli_real_escape_string($con, $_POST['second_test']);
    $exam = mysqli_real_escape_string($con, $_POST['exam']);
    $total = mysqli_real_escape_string($con, $_POST['total']);
    $grade = mysqli_real_escape_string($con, $_POST['grade']);
    $session = mysqli_real_escape_string($con, $_POST['session']);

    // checking error
    if ($first_test > 15 || $second_test > 15 || $exam > 70) {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> One of your record fields value is greater than it maximum value
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/result_edit.php');
    } else {
        $query = "UPDATE result SET term='$term', username='$username', class='$class', subject='$subject', 1st_test='$first_test', 2nd_test='$second_test', exams='$exam', total='$total', grade='$grade', session='$session' WHERE id='$id'";
        $run_query = mysqli_query($con, $query);

        if ($run_query) {
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Result updated successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
            header('Location: ../admin/add_result.php');
        } else {
            $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Failed to update result
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
            header('Location: ../admin/add_result.php');
        }
    }
    mysqli_close($con);
}


// code for deleting result
if (isset($_POST['delete_result'])) {
    $id = $_POST['delete_id'];
    // print_r($id);

    $query = "DELETE FROM result WHERE id='$id'";
    $run_query = mysqli_query($con, $query);

    if ($run_query) {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Result deleted successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/add_result.php');
    } else {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Failed to delete result
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/add_result.php');
    }
    mysqli_close($con);
}


// code for adding subject
if (isset($_POST['add_subject'])) {
    // subject data
    $sub_name = mysqli_real_escape_string($con, $_POST['subject_name']);
    $sub_description = mysqli_real_escape_string($con, $_POST['description']);
    $sub_status = mysqli_real_escape_string($con, $_POST['status']);

    // checking for error
    if (empty($sub_name) || empty($sub_description)) {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Do not leave an empty input field
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/curriculum.php');
    } else {
        $query = "INSERT INTO `subject`(subject_name, description, status) VALUE ('$sub_name', '$sub_description', '$sub_status')";
        $run_query = mysqli_query($con, $query);

        if ($run_query) {
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Subject created successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
            header('Location: ../admin/curriculum.php');
        } else {
            $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Fail to create subject
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
            header('Location: ../admin/curriculum.php');
        }
    }
    mysqli_close($con);
}


// code for adding classes
if (isset($_POST['add_class'])) {
    // subject data
    $class_name = mysqli_real_escape_string($con, $_POST['class_name']);
    $class_description = mysqli_real_escape_string($con, $_POST['description']);
    $class_status = mysqli_real_escape_string($con, $_POST['status']);

    // checking for error
    if (empty($class_name) || empty($class_description)) {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> No field should be empty
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/curriculum.php');
    } else {
        $query = "INSERT INTO `class`(class_name, description, status) VALUE ('$class_name', '$class_description', '$class_status')";
        $run_query = mysqli_query($con, $query);

        if ($run_query) {
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Class created successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
            header('Location: ../admin/curriculum.php');
        } else {
            $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Failed to create class
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
            header('Location: ../admin/curriculum.php');
        }
    }
    mysqli_close($con);
}


// code for updating admin profile
if (isset($_POST['update_admin'])) {
    // get admin data
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // checking for errors
    if (empty($fullname) || empty($email) || empty($phonenumber) || empty($username) || empty($address) || empty($password)) {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Empty input fields
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/admin_setting.php');
    } else {
        $query = "UPDATE `users` set fullname='$fullname', email='$email', phone='$phonenumber', username='$username', gender='$gender', address='$address', password='$password' WHERE id='$id' ";
        $run_query = mysqli_query($con, $query);

        if ($run_query) {
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Profile updated successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
            header('Location: ../admin/admin_setting.php');
        } else {
            $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> An error occured while trying to update profile
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
            header('Location: ../admin/admin_setting.php');
        }
    }
    mysqli_close($con);
}


// code for adding session
if (isset($_POST['add_session'])) {
    // session data
    $s_name = mysqli_real_escape_string($con, $_POST['session_name']);
    $s_desc = mysqli_real_escape_string($con, $_POST['description']);
    $s_status = mysqli_real_escape_string($con, $_POST['status']);

    // checking for errors
    if (empty($s_name) || empty($s_desc)) {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Do not leave a field empty
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/curriculum.php');
    } else {
        $query = "INSERT INTO `session`(s_name, s_desc, s_status) VALUES('$s_name', '$s_desc', '$s_status')";
        $run_query = mysqli_query($con, $query);

        if ($run_query) {
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Academic session created successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
            header('Location: ../admin/curriculum.php');
        } else {
            $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Fail to create academic session
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
            header('Location: ../admin/curriculum.php');
        }
    }
    mysqli_close($con);
}


// code for updating subject
if (isset($_POST['update_subject'])) {
    // subject data
    $id = mysqli_real_escape_string($con, $_POST['subject_id']);
    $s_name = mysqli_real_escape_string($con, $_POST['subject_name']);
    $s_desc = mysqli_real_escape_string($con, $_POST['description']);
    $s_status = mysqli_real_escape_string($con, $_POST['status']);

    $query = "UPDATE `subject` SET subject_name='$s_name', description='$s_desc', status='$s_status' WHERE id='$id'";
    $run_query = mysqli_query($con, $query);

    if ($run_query) {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Subject updated successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/curriculum.php');
    } else {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Fail to update subject
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/curriculum.php');
    }
    mysqli_close($con);
}


// code for deleting subject
if (isset($_POST['delete_subject'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM `subject` WHERE id='$id'";
    $run_query = mysqli_query($con, $query);

    if ($run_query) {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Subject deleted successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/curriculum.php');
    } else {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Fail to delete subject
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/curriculum.php');
    }
    mysqli_close($con);
}


// code for updating class
if (isset($_POST['update_class'])) {
    // class data
    $id = mysqli_real_escape_string($con, $_POST['class_id']);
    $c_name = mysqli_real_escape_string($con, $_POST['class_name']);
    $desc = mysqli_real_escape_string($con, $_POST['description']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    $query = "UPDATE `class` SET class_name='$c_name', description='$desc', status='$status' WHERE  id='$id'";
    $run_query = mysqli_query($con, $query);

    if ($run_query) {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Class updated successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/curriculum.php');
    } else {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Fail to update class
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/curriculum.php');
    }
    mysqli_close($con);
}


// code for deleting class
if (isset($_POST['delete_class'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM `class` WHERE id='$id'";
    $run_query = mysqli_query($con, $query);

    if ($run_query) {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Class deleted successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/curriculum.php');
    } else {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Fail to delete class
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/curriculum.php');
    }
    mysqli_close($con);
}


// code for updating session
if (isset($_POST['update_session'])) {
    // session data
    $id = mysqli_real_escape_string($con, $_POST['session_id']);
    $s_name = mysqli_real_escape_string($con, $_POST['session_name']);
    $desc = mysqli_real_escape_string($con, $_POST['description']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    $query = "UPDATE `session` SET s_name='$s_name', s_desc='$desc', s_status='$status' WHERE  id='$id'";
    $run_query = mysqli_query($con, $query);

    if ($run_query) {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Session updated successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/curriculum.php');
    } else {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Fail to update session
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/curriculum.php');
    }
    mysqli_close($con);
}


// code for deleting academic session
if (isset($_POST['delete_session'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM `session` WHERE id='$id'";
    $run_query = mysqli_query($con, $query);

    if ($run_query) {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Session deleted successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/curriculum.php');
    } else {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Fail to delete session
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/curriculum.php');
    }
    mysqli_close($con);
}


// code for adding anouncement
if (isset($_POST['add_anouncement'])) {
    // anouncement data
    $name = mysqli_real_escape_string($con, $_POST['announcement_name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    // check for errors
    if (empty($name) || empty($description)) {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> No field should be empty
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/curriculum.php');
    } else {
        $query = "INSERT INTO `anouncement` (a_title, a_desc, a_status) VALUE('$name', '$description', '$status')";
        $run_query = mysqli_query($con, $query);

        if ($run_query) {
            $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Anouncement made successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
            header('Location: ../admin/curriculum.php');
        } else {
            $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Error occured trying to make anouncement
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
            header('Location: ../admin/curriculum.php');
        }
    }
    mysqli_close($con);
}


// code for updating anouncement
if (isset($_POST['edit_anouncement'])) {
    // anouncement data
    $id = mysqli_real_escape_string($con, $_POST['announcement_id']);
    $name = mysqli_real_escape_string($con, $_POST['announcement_name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    $query = "UPDATE `anouncement` SET a_title='$name', a_desc='$description', a_status='$status' WHERE id='$id';";
    $run_query = mysqli_query($con, $query);

    if ($run_query) {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Anouncement updated sucessfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/curriculum.php');
    } else {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Failed to update anouncement
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/curriculum.php');
    }
    mysqli_close($con);
}


// code for deleting announcement
if (isset($_POST['delete_anouncement'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM `anouncement` WHERE id='$id'";
    $run_query = mysqli_query($con, $query);

    if ($run_query) {
        $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Anouncement deleted successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/curriculum.php');
    } else {
        $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible fade show mb-4" role="alert">
                                <strong>Hey,</strong> Fail to delete anouncement
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                ';
        header('Location: ../admin/curriculum.php');
    }
    mysqli_close($con);
}
