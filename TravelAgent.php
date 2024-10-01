<?php
// Include the header
$pagetitle = "Travel Agent Dashboard";
$stylesheet = "TravelAgentStyles.css";
include "layouts/header.php";
?>

    <div class="main">
        <div class="sidebar">
            <h2>PANEL</h2>
            <ul>

                <div class="sidebar-link">
                    <li><a href="">Packages </a></li>
                    <img src="img/user.png" alt="User Icon">
                </div>

                <div class="sidebar-link">
                    <li><a href="">Booking Management </a></li>
                    <img src="img/travelpackage.png" alt="Package Icon">
                </div>
                    
                <div class="sidebar-link">
                    <li><a href="">Customer Support </a></li>   
                    <img src="img/book.png" alt="Book Icon">
                </div>

                <div class="sidebar-link">
                    <li><a href="">Reports & Analytics </a></li>
                    <img src="img/report.png" alt="Report Icon">
                </div>    
                
                <div class="sidebar-link">
                    <li><a href="">Reviews and Feedback </a></li>
                    <img src="img/report.png" alt="Report Icon">
                </div> 
            </ul>
        </div>


        <div class="content">
            <div class="stats">
                <div class="statCard">
                    <img src="img/people2.png" alt="">
                    <div class="cardInfo">
                        <h2>4.2</h2>
                        <p>Rating</p>
                    </div>
                </div>
                <div class="statCard">
                    <img src="img/money.png" alt="">
                    <div class="cardInfo">
                        <h2>67</h2>
                        <p>Total Bookings</p>
                    </div>
                </div>
            </div>


            <div class="bottom">
                <div class="recentActivity">
                    <div class="recentActivityHeader">
                        <img src="img/clock.png" alt="">
                        <h2>Recent Activity</h2>
                    </div>
                    

                    <div class="activityCard">
                        <img src="img/user.png" alt="">
                        <h3>John Doe</h3>
                        <div class="activityInfo">
                            <p>Booked for 5 days</p>
                        </div>
                    </div>

                    <div class="activityCard">
                        <img src="img/user.png" alt="">
                        <h3>John Doe</h3>
                        <div class="activityInfo">
                            <p>Booked for 5 days</p>
                        </div>
                    </div>

                    <div class="activityCard">
                        <img src="img/user.png" alt="">
                        <h3>John Doe</h3>
                        <div class="activityInfo">
                            <p>Booked for 5 days</p>
                        </div>
                    </div>
                </div>

                <div class="calendar">
                    <div class="calendarHeader">
                        <img src="img/calendar.png" alt="">
                        <h2>Event Calendar</h2>
                    </div>

                    <br><p>Calendar to be placed HERE!!<br> Together with more content...</p>
                </div>

            </div>
        </div>
    </div>


<?php
// Include the footer
include "layouts/footer.php";
?>