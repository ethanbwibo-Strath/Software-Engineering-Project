<?php
// Include the header
$pagetitle = "Travel Agent Dashboard";
$stylesheet = "TravelAgentStyles.css";
include "../layouts/header.php";
?>

<style>
    /* Sidebar Styles */
    /* .sidebar {
        background-color: #f0f0f0;
        padding: 20px;
        width: 250px;
        height: 100vh;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .sidebar h2 {
        text-align: center;
        margin-bottom: 20px;
    } */

    .sidebar-link {
        position: relative;
        margin: 10px 0;
    }

    .sidebar-link a {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: #333;
        padding: 10px 15px;
        border-radius: 5px;
        transition: background 0.3s ease;
    }

    .sidebar-link a:hover {
        background: #0a3cff;
        color: white;
    }

    .submenu {
        display: none;
        background-color: #e9e9e9;
        padding: 10px;
        border-radius: 5px;
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        z-index: 10;
    }

    .sidebar-link:hover .submenu {
        display: block;
    }

    .submenu-item {
        margin: 5px 0;
    }

    .submenu-link {
        padding: 8px 12px;
        text-decoration: none;
        color: #333;
    }

    .submenu-link:hover {
        background: #0a3cff;
        color: white;
    }
</style>

<div class="main">
    <div class="sidebar">
        <h2>PANEL</h2>
        <ul>
            <div class="sidebar-link">
                <li>
                    <a href="#" class="link">Packages</a>
                    <div class="submenu">
                        <div class="submenu-item">
                            <a href="AllAboutPackages\createPackage.php" class="submenu-link">Create Package</a>
                        </div>
                        <div class="submenu-item">
                            <a href="AllAboutPackages/updatePackage.php" class="submenu-link">Update Package</a>
                        </div>
                        <div class="submenu-item">
                            <a href="AllAboutPackages/viewPackages.php" class="submenu-link">View Packages</a>
                        </div>
                    </div>
                </li>
                <img src="../img/user.png" alt="User Icon">
            </div>

            <div class="sidebar-link">
                <li><a href="">Booking Management</a></li>
                <img src="../img/travelpackage.png" alt="Package Icon">
            </div>

            <div class="sidebar-link">
                <li><a href="">Customer Support</a></li>
                <img src="../img/book.png" alt="Book Icon">
            </div>

            <div class="sidebar-link">
                <li><a href="graphs.php">Reports & Analytics</a></li>
                <img src="../img/report.png" alt="Report Icon">
            </div>

            <div class="sidebar-link">
                <li><a href="">Reviews and Feedback</a></li>
                <img src="../img/report.png" alt="Report Icon">
            </div>
        </ul>
    </div>

    <div class="content">
        <div class="stats">
            <div class="statCard">
                <img src="../img/people2.png" alt="">
                <div class="cardInfo">
                    <h2>4.2</h2>
                    <p>Rating</p>
                </div>
            </div>
            <div class="statCard">
                <img src="../img/money.png" alt="">
                <div class="cardInfo">
                    <h2>67</h2>
                    <p>Total Bookings</p>
                </div>
            </div>
        </div>

        <div class="bottom">
            <div class="recentActivity">
                <div class="recentActivityHeader">
                    <img src="../img/clock.png" alt="">
                    <h2>Recent Activity</h2>
                </div>

                <div class="activityCard">
                    <img src="../img/user.png" alt="">
                    <h3>John Doe</h3>
                    <div class="activityInfo">
                        <p>Booked for 5 days</p>
                    </div>
                </div>

                <div class="activityCard">
                    <img src="../img/user.png" alt="">
                    <h3>John Doe</h3>
                    <div class="activityInfo">
                        <p>Booked for 5 days</p>
                    </div>
                </div>

                <div class="activityCard">
                    <img src="../img/user.png" alt="">
                    <h3>John Doe</h3>
                    <div class="activityInfo">
                        <p>Booked for 5 days</p>
                    </div>
                </div>
            </div>

            <div class="calendar">
                <div class="calendarHeader">
                    <img src="../img/calendar.png" alt="">
                    <h2>Event Calendar</h2>
                </div>

                <br><p>Calendar to be placed HERE!!<br> Together with more content...</p>
            </div>
        </div>
    </div>
</div>

<?php
// Include the footer
include "../layouts/footer.php";
?>
