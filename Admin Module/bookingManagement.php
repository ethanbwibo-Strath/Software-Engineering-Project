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
                <th>Package</th>
                <th>Check-in Date</th>
                <th>Check-Out Date</th>
                <th>Price</th>
            </thead>
            <!-- Table Body -->
            <tbody>
                <?php
                    // Get the bookings from the database
                    include "../dbConnection.php";
                    $db = new dbConnection();
                    $conn = $db->conn;
                    $sql = "SELECT 
                                    booked_packages.id, 
                                    users.username, 
                                    packages.package_name, 
                                    booked_packages.checkin_date, 
                                    booked_packages.checkout_date, 
                                    packages.package_price
                                FROM 
                                    booked_packages
                                JOIN 
                                    users ON booked_packages.UserID = users.UserID
                                JOIN 
                                    packages ON booked_packages.package_id = packages.package_id;
                                ";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($bookings as $booking) {
                        echo "<tr>";
                        echo "<td>" . $booking['id'] . "</td>";
                        echo "<td>" . $booking['username'] . "</td>";
                        echo "<td>" . $booking['package_name'] . "</td>";
                        echo "<td>" . $booking['checkin_date'] . "</td>";
                        echo "<td>" . $booking['checkout_date'] . "</td>";
                        echo "<td>" . $booking['package_price'] . "</td>";
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