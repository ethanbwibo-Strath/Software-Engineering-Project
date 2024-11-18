<?php
$pagetitle = "Analytics";
$stylesheet = "adminStyle.css";
//require "dbconnection.php";
include "../layouts/header.php";

//$db = new dbConnection();
?>

<head>
    <link rel="stylesheet" href="css/analytics.css">
    <!-- Box icons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Charts Javascript CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<div class="analyticsContainer">
<?php
include "sidebarPanel/adminSide.php";
?>
    <!-- 1. User Growth Analytics -->
    <section id="userGrowth" class="analyticsSection">
        <h2>User Growth Over Time</h2>
        <canvas id="userGrowthChart">

        </canvas>
    </section>
    <!-- 2. Revenue over time Analytics -->
    <section id="revenue" class="analyticsSection">
        <h2>Revenue Over Time</h2>
        <canvas id="revenueChart">

        </canvas>
    </section>

    <!-- 3. Popular packages -->
    <section id="popularPackages" class="analyticsSection">
        <h2>Popular Packages</h2>
        <canvas id="popularPackagesChart">

        </canvas>
    </section>

    <!-- 4. Most Active Travellers -->
    <section id="activeTravellers" class="analyticsSection">
        <h2>Most Active Travellers</h2>
        <canvas id="activeTravellersChart">

        </canvas>
    </section>
</div>
<script src="analytics.js"></script>
<?php

include "../layouts/footer.php";
