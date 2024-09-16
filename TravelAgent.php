<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Agent Dashboard</title>
    <link rel="stylesheet" href="TravelAgentStyles.css">
    <link rel = "icon" href="img/logo2.png" type = "image/png">
</head>
<body>
    <div class="nav">
        <div class="logo">
            <img src="img/logo.png" alt="Logo">
            <h1>CheapThrills</h1>
        </div>

        <div class="links">
            <ul>
                <a href=""><li>Home</li></a>
                <a href=""><li>Book</li></a>
                <a href=""><li>About Us</li></a>
                <a href=""><li>Contact</li></a>
            </ul>
        </div>

        <div class="search">
            <img src="img/search.png" alt="Search">
            <input type="search" name="search" id="navSearch" placeholder="Search...">
        </div>

        <div class="account">
            <img src="img/user.png" alt="user">
            <p>Agent 007</p>
        </div>
    </div>

    <div class="main">
        <div class="sidebar">
            <h2>DASHBOARD</h2>
            <ul>

                <div class="sidebar-link">
                    <li><a href="">User Management </a></li>
                    <img src="img/user.png" alt="User Icon">
                </div>

                <div class="sidebar-link">
                    <li><a href="">Travel Packages </a></li>
                    <img src="img/travelpackage.png" alt="Package Icon">
                </div>
                    
                <div class="sidebar-link">
                    <li><a href="">Booking Management </a></li>   
                    <img src="img/book.png" alt="Book Icon">
                </div>

                <div class="sidebar-link">
                    <li><a href="">Reports & Analytics </a></li>
                    <img src="img/report.png" alt="Report Icon">
                </div>           
            </ul>
        </div>


        <div class="content">
            <div class="stats">
                <div class="statCard">
                    <img src="img/people2.png" alt="">
                    <div class="cardInfo">
                        <h2>Total Users</h2>
                        <p>100</p>
                    </div>
                </div>
                <div class="statCard">
                    <img src="img/money.png" alt="">
                    <div class="cardInfo">
                        <h2>Revenue</h2>
                        <p>12,890</p>
                    </div>
                </div>
                <div class="statCard">
                    <img src="img/bag.png" alt="">
                    <div class="cardInfo">
                        <h2>Total Bookings</h2>
                        <p>61</p>
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

                    <p>Calendar to be placed HERE!!<br> Together with more content...</p>
                </div>

            </div>
        </div>
    </div>

    <div class="footer">
        <div class="socials">
            <img src="img/twitter.png" alt="Twitter">
            <img src="img/instagram.png" alt="Instagram">
            <img src="img/linkedin.png" alt="linkedin">
        </div>

        <div class="copyright">
            <p>Copyright &copy; 2024 <span> CheapThrills</span>  All rights reserved.</p>
        </div>
    </div>
</body>
</html>