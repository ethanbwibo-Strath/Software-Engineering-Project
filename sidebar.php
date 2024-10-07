<?php
$pagetitle = "User Dashboard";
include 'layouts/header.php';
?>

<link rel="stylesheet" href="sidebar.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="json" href="sidebar.js">


<div id="userDashboardContent">
    <div class="sidebar">
        <header>Dashboard</header>
        <ul>
            <li><a href="#" class="nav-item"><i class='bx bxs-user-account'></i>Account Details</a></li>
            <li><a href="#" class="nav-item"><i class='bx bxs-plane-alt'></i>My Trips</a></li>
            <li><a href="#" class="nav-item"><i class='bx bx-help-circle'></i>Help</a></li>
            <li><a href="#" class="nav-item"><i class='bx bx-calendar-check'></i>Bookings</a></li>
            <li><a href="#" class="nav-item"><i class='bx bxs-user-x'></i>Delete Account</a></li>
            <li><a href="#" class="nav-item"><i class='bx bx-log-out'></i>Logout</a></li>
        </ul> 
    </div>
</div>
