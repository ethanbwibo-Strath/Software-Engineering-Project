<?php
// Set page variables
$pagetitle = "Booking Management";
$stylesheet = "adminStyle.css";
// Include the header
include "../layouts/header.php";
?>
<head>
    <link rel="stylesheet" href="css/bookingManagement.css">
    <!-- Box icons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<div class="main">
    <!-- include the sidebar -->
    <?php
    include "sidebarPanel/adminSide.php";
    ?>

    <div class="tableContainer">
        <h2>Booking Management</h2>
        <!-- Table for the bookings -->
        <table id="bookingTable">
            <!-- Table Head -->
            <thead>
                <th>Booking ID</th>
                <th>User Name</th>
                <th>Destination</th>
                <th>Date of Booking</th>
                <th>Status</th>
                <th>Actions</th>
            </thead>
            <!-- Table Body -->
            <tbody>
                <!-- Dummy Data -->
                <?php
                    $bookings = 
                    [
                        ["id" => 1, "username" => "johndoe", "destination" => "Malaysia", "date" => "2022-01-01", "status" => "Pending"],
                        ["id" => 2, "username" => "janedoe", "destination" => "Japan", "date" => "2022-01-02", "status" => "Approved"],
                        ["id" => 3, "username" => "bobsmith", "destination" => "France", "date" => "2022-01-03", "status" => "Pending"],
                    ];
                    // Loop through and display bookings
                    foreach ($bookings as $booking) {
                        echo "<tr>";
                        echo "<td>" . $booking["id"] . "</td>";
                        echo "<td>" . $booking["username"] . "</td>";
                        echo "<td>" . $booking["destination"] . "</td>";
                        echo "<td>" . $booking["date"] . "</td>";
                        echo "<td>" . $booking["status"] . "</td>";
                        echo 
                        "<td class='buttons'>
                            <a class='btnView'>View</a>
                            <a class='btnApprove'>Approve</a>
                            <a class='btnCancel'>Cancel</a>
                        </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
// Include the footer
include "../layouts/footer.php";
?>