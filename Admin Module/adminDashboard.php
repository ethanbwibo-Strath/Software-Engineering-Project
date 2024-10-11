<?php
// Include the header
$pagetitle = "Admin Dashboard";
$stylesheet = "adminStyle.css";
include "../layouts/header.php";
?>

    <div class="main">
        <div class="sidebar">
            <h2>DASHBOARD</h2>
            <ul>
                <div class="sidebar-link">
                    <li><a href="">User Management </a></li>
                    <img src="../img/user.png" alt="User Icon">
                </div>

                <div class="sidebar-link">
                    <li><a href="">Travel Packages </a></li>
                    <img src="../img/travelpackage.png" alt="Package Icon">
                </div>
                    
                <div class="sidebar-link">
                    <li><a href="">Booking Management </a></li>   
                    <img src="../img/book.png" alt="Book Icon">
                </div>

                <div class="sidebar-link">
                    <li><a href="">Reports & Analytics </a></li>
                    <img src="../img/report.png" alt="Report Icon">
                </div>   
            </ul>
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