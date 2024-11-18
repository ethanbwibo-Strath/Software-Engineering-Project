<?php
// Include the header
$pagetitle = "Admin Dashboard";
$stylesheet = "adminStyle.css";
include "../layouts/header.php";
include "../dbConnection.php";
?>

    <head>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <div class="main">
        <?php
            // Include the sidebar
            include "sidebarPanel/adminSide.php";
        ?>
        <div class="content">
            <div class="stats">
                <div class="statCard">
                    <img src="../img/people.png" alt="">
                    <div class="cardInfo">
                        <h2>Total Users</h2>
                        <?php
                        // Count users from database
                        $db = new dbConnection();
                        $sql = "SELECT * FROM users";
                        $stmt = $db->conn->prepare($sql);
                        $stmt->execute();
                        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        echo "<p>" . count($users) . "</p>";
                        ?>
                    </div>
                </div>
                <div class="statCard">
                    <img src="../img/money.png" alt="">
                    <div class="cardInfo">
                        <h2>Revenue in Kshs.</h2>
                        <?php
                        // Count revenue from database
                        $db = new dbConnection();
                        $sql = "SELECT SUM(amount) AS total_revenue FROM transactions";
                        $stmt = $db->conn->prepare($sql);
                        $stmt->execute();
                        $revenue = $stmt->fetch(PDO::FETCH_ASSOC);
                        echo "<p>" . $revenue['total_revenue'] . "</p>";
                        ?>
                    </div>
                </div>
                <div class="statCard">
                    <img src="../img/bag.png" alt="">
                    <div class="cardInfo">
                        <h2>Total Bookings</h2>
                        <?php
                        // Count bookings from database
                        $db = new dbConnection();
                        $sql = "SELECT * FROM booked_packages";
                        $stmt = $db->conn->prepare($sql);
                        $stmt->execute();
                        $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        echo "<p>" . count($bookings) . "</p>";
                        ?>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <div class="recentActivity">
                    <div class="recentActivityHeader">
                        <img src="../img/clock.png" alt="">
                        <h2>New Users:</h2>
                    </div>
                    
                    <!-- Get Recent Activity from database -->
                    <?php
                    $db = new dbConnection();
                    $sql = "SELECT * FROM users ORDER BY created_at DESC LIMIT 3";
                    $stmt = $db->conn->prepare($sql);
                    $stmt->execute();
                    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($users as $user) {
                        echo "<div class='activityCard'>";
                        echo "<img src='../img/user.png' alt=''>";
                        echo "<h3>" . $user['username'] . "</h3>";
                        echo "<div class='activityInfo'>";
                        echo "<p>Registered on: " . $user['created_at'] . "</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                    ?>
                </div>

                <!-- <div class="calendar">
                    <div class="calendarHeader">
                        <img src="../img/calendar.png" alt="">
                        <h2>Event Calendar</h2>
                    </div>
                    <div class="calendarTemplate">
                        <p>Event 1: Description (Date)</p>
                        <p>Event 2: Description (Date)</p>
                        <p>Event 3: Description (Date)</p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

<?php
// Include the footer
include "../layouts/footer.php";
?>