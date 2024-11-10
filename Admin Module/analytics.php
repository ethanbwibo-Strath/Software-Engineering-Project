<?php
$pagetitle = "Analytics";
$stylesheet = "adminStyle.css";
require "dbconnection.php";
include "../layouts/header.php";

$db = new dbConnection();
?>

<head>
    <link rel="stylesheet" href="css/analytics.css">
    <!-- Box icons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<div class="main">
    <?php
    include "sidebarPanel/adminSide.php";
    ?>

<div class="cardBox">
    <div class="cardRow">
        <div class="card">
            <h2>Total Users</h2>
            <?php
                // Get the total number of users from the database
                $sql = "SELECT COUNT(*) AS total_users FROM users";
                $result = $db->conn->query($sql);
                $row = $result->fetch(PDO::FETCH_ASSOC);
                echo "<span class='totalUsers'>" . $row['total_users'] . "</span>";
            ?>
        </div>
        <div class="card">
            <h2>Revenue</h2>
            <?php
                // Get revenue from the database
                $sql = "SELECT SUM(paid) AS total_revenue FROM payments";
                $result = $db->conn->query($sql);
                $row = $result->fetch(PDO::FETCH_ASSOC);
                echo "<span class='totalRevenue'>" . $row['total_revenue'] . " Kshs.</span>";
            ?>
        </div>
        <div class="card">
            <h2>Completed Bookings</h2>
            <?php
                // Get the total number completed bookings from the database
                $sql = "SELECT COUNT(*) AS total_bookings FROM payments WHERE is_paid = 1";
                $result = $db->conn->query($sql);
                $row = $result->fetch(PDO::FETCH_ASSOC);
                echo "<span class='totalBookings'>" . $row['total_bookings'] . "</span>";
            ?>
        </div>
    </div>
    
</div>
</div>
<?php

include "../layouts/footer.php";
