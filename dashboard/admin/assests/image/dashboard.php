<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php error_reporting(0);
            echo $_SESSION['username'] ?> Dashboard</title>
    <link rel="shortcut icon" href="./resources/images/favicon.png" type="image/x-icon">

    <!-- css files -->
    <link rel="stylesheet" href="./resources/css/dash-board.css">
    <link rel="stylesheet" href="./resources/assests/font-awesome/css/all.min.css">
</head>

<body>
    <!-- <div id="preloader"></div> -->


    <!-- sidebar -->
    <section id="sidebar">
        <!-- logo section -->
        <div class="logo">
            <img src="./resources/images/logo-main.png" alt="">
            <div class="name">
                <p>Viktolex</p>
                <p>Academy</p>
            </div>
        </div>

        <!-- menu section -->
        <div class="menu">
            <li><i class="fas fa-home"></i><a href="./dashboard.php">Home</a></li>
            <li><i class="fas fa-user-graduate"></i><a href="./add_student.php">Student Enrollment</a></li>
            <li><i class="fas fa-user-plus"></i><a href="./add_teacher.php">Teacher Enrollment</a></li>
            <li><i class="fas fa-user-check"></i><a href="./view_student.php">Student Record</a></li>
            <li><i class="fas fa-user-tie"></i><a href="./view_teacher.php">Teacher Record</a></li>
            <li><i class="fas fa-calendar-alt"></i><a href="./event.php">Event Calendar</a></li>
            <li><i class="fas fa-money-bill"></i><a href="./fee_record.php">Fee Structure</a></li>
            <li><i class="fas fa-chart-pie"></i><a href="./fee_anaylsis.php">Fee Analysis</a></li>
            <li><i class="fas fa-sign-out-alt"></i><a href="./logout.php">logout</a></li>
        </div>
    </section>
    <!-- end of sidebar -->

    <!-- interface section -->
    <section class="interface">
        <!-- navigation section -->
        <nav class="navigation">
            <i class="fas fa-bars" id="menu_btn"></i>
            <div class="i-name">
                <h3>Dashboard</h3>
                <p><?php echo date("D d/M/Y ") ?></p>
            </div>
            <div class="logout">
                <a href="./logout.php" class="main_btn">Logout</a>
            </div>
        </nav>

        <div class="i-content">
            <!-- welcome bar section -->
            <div class="welcome_bar">
                <div class="user_sms">
                    <div style="padding-top: 20px;">
                        <h1>Hi, Admin.</h1>
                        <p>Welcome to your dashboard, let start working.</p>
                    </div>
                    <br>
                    <div>
                        <a href="./add_student.php" class="sub_btn">Enroll</a>
                        <a href="./fee_anaylsis.php" class="sub_btn">Analysis</a>
                        <style>
                            .sub_btn {
                                margin-top: 0.6rem;
                                margin-right: 0.5rem;
                                /* padding: 10px 20px; */
                                padding-top: 10px;
                                padding-bottom: 10px;
                                padding-left: 20px;
                                padding-right: 20px;
                                border-radius: 25px;
                                outline: none;
                                border: 2px solid #fff;
                                background-color: transparent;
                                font-weight: 600;
                                font-family: 'poppins';
                                color: #fff;
                                transition: all 150ms ease-in;
                                cursor: pointer;
                            }

                            .sub_btn:hover {
                                background-color: #ffffff;
                                color: var(--accent-color);
                            }
                        </style>
                    </div>
                </div>
                <div class="bar_image" align="center">
                    <img src="./resources/images/10173517_8576-removebg-preview.png" alt="">
                </div>
            </div>

            <!-- summary block section -->
            <h3 class="text-muted">Overview</h3>
            <div class="summary_block">
                <div class="block_item">
                    <div class="icon_box">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div>
                        <h3 class="text-muted">Total Students</h3>
                        <p class="text-muted">70</p>
                    </div>
                </div>
                <div class="block_item">
                    <div class="icon_box">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div>
                        <h3 class="text-muted">Total Teacher</h3>
                        <p class="text-muted">15</p>
                    </div>
                </div>
                <div class="block_item">
                    <div class="icon_box">
                        <i class="fas fa-coins"></i>
                    </div>
                    <div>
                        <h3 class="text-muted">Total income</h3>
                        <p class="text-muted"><i class="fas fa-naira-sign"></i>10,000</p>
                    </div>
                </div>
                <div class="block_item">
                    <div class="icon_box">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <div>
                        <h3 class="text-muted">Total Event</h3>
                        <p class="text-muted">2</p>
                    </div>
                </div>
            </div>

            <!-- summary block section -->
            <div class="row container">
                <div class="col col-md-2 col-sm-1">
                    <div class="block_item">
                        <div class="icon_box">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div>
                            <h3 class="text-muted">Total Event</h3>
                            <p class="text-muted">2</p>
                        </div>
                    </div>
                </div>
                <div class="col col-md-2 col-sm-1">
                    <div class="block_item">
                        <div class="icon_box">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div>
                            <h3 class="text-muted">Total Event</h3>
                            <p class="text-muted">2</p>
                        </div>
                    </div>
                </div>
                <div class="col col-md-2 col-sm-1">
                    <div class="block_item">
                        <div class="icon_box">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div>
                            <h3 class="text-muted">Total Event</h3>
                            <p class="text-muted">2</p>
                        </div>
                    </div>
                </div>
                <div class="col col-md-2 col-sm-1">
                    <div class="block_item">
                        <div class="icon_box">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div>
                            <h3 class="text-muted">Total Event</h3>
                            <p class="text-muted">2</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- content section -->
    </section>
</body>

</html>