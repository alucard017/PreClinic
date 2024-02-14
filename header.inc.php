<?php 
    require 'connection.php';
    require 'function.inc.php';
    !isset( $_SESSION['email'])?redirect('index.php'):"";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

</head>

<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="dashboard.php" class="logo">
                    <img src="assets/img/logo.png" width="35" height="35" alt=""> <span>Preclinic</span>
                </a>
            </div>
            <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="assets/img/admin.jpg" width="24" alt="Admin">
                            <span class="status online"></span>
                        </span>
                        <span>Admin</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="logout.php">Logout</a>
                        <a class="dropdown-item" href="register_form.php">Create Admin Account</a>
                    </div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                        class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="login.php">Logout</a>
                    <a class="dropdown-item" href="register_form.php">Create Admin Account</a>
                </div>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="nav-link active" id="dashboard">
                            <a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                        <li class="nav-link" id="departments">
                            <a href="departments.php"><i class="fa fa-hospital-o"></i> <span>Departments</span></a>
                        </li>
                        <li class="nav-link" id="doctors">
                            <a href="doctors.php"><i class="fa fa-user-md"></i> <span>Doctors</span></a>
                        </li>
                        <li class="nav-link" id="patients">
                            <a href="patients.php"><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
                        </li>
                        <li class="nav-link" id="schedule">
                            <a href="schedule.php"><i class="fa fa-calendar-check-o"></i> <span>Doctor
                                    Schedule</span></a>
                        </li>
                        <li class="nav-link" id="appointments">
                            <a href="appointments.php"><i class="fa fa-calendar"></i> <span>Appointments</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <script>
            var url = window.location.href.split('/');
            var len = url.length - 1;
            url = url[len];
            if (url == "dashboard.php") {
                $('.nav-link').removeClass("active");
                $('#dashboard').addClass("active");
            } else if (url == "doctors.php" || url == "add_doctor.php") {
                $('.nav-link').removeClass("active");
                $('#doctors').addClass("active");
            } else if (url == "patients.php" || url == "add-patient.php") {
                $('.nav-link').removeClass("active");
                $('#patients').addClass("active");
            } else if (url == "appointments.php" || url == "add-appointment.php") {
                $('.nav-link').removeClass("active");
                $('#appointments').addClass("active");
            } else if (url == "schedule.php" || url == "add-schedule.php") {
                $('.nav-link').removeClass("active");
                $('#schedule').addClass("active");
            }else if (url == "departments.php" || url == "add-department.php") {
                $('.nav-link').removeClass("active");
                $('#departments').addClass("active");
            }
        </script>