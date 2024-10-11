<?php
// Include the header
$pagetitle = "Admin Dashboard";
$stylesheet = "adminStyle.css";
include "../layouts/header.php";
?>

    <head>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <div class="main">
        <div class="sidebar">
            <header>Panel</header>
            <ul>
                <li><a href="#" class="nav-item"><i class='bx bxs-user' ></i>User Management</a></li>
                <li><a href="#" class="nav-item"><i class='bx bxs-briefcase' ></i>Bookings</a></li>
                <li><a href="#" class="nav-item"><i class='bx bxs-package'></i>Travel Packages</a></li>
                <li><a href="#" class="nav-item"><i class='bx bx-scatter-chart'></i>Analytics</a></li>
                <li><a href="#" class="nav-item"><i class='bx bxs-log-out'></i>Logout</a></li>
            </ul> 
            <script src="sidebar.js"></script>
        </div>
        <div class="content">
            <div class="stats">
                <div class="statCard">
                    <img src="../img/people.png" alt="">
                    <div class="cardInfo">
                        <h2>Total Users</h2>
                        <p>100</p>
                    </div>
                </div>
                <div class="statCard">
                    <img src="../img/money.png" alt="">
                    <div class="cardInfo">
                        <h2>Revenue in Kshs.</h2>
                        <p>12,890</p>
                    </div>
                </div>
                <div class="statCard">
                    <img src="../img/bag.png" alt="">
                    <div class="cardInfo">
                        <h2>Total Bookings</h2>
                        <p>61</p>
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
                    <p>Calendar to be placed HERE!!<br> Together with more content...</p>
                </div>
            </div>
        </div>
    </div>

<?php
// Include the footer
include "../layouts/footer.php";
?>