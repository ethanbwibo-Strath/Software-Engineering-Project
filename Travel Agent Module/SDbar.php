<?php
session_start();  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0">

    <title>Travel Agent Dashboard</title>
    <link rel = "icon" href="../img/logo2.png" type = "image/png">
    <link rel="stylesheet" href= "Travel Agent Dashboard.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
    /* Dropdown Menu Styles */
    .menu .submenu {
        display: none;
        padding-left: 1px;
    }

    .menu .item:hover .submenu {
        display: block;
        text-decoration: none;
        color: goldenrod;
    }

    .submenu-item {
        margin: -15px 0 0 0;
    }

    .submenu-item a:hover {
        color: goldenrod;
        text-decoration: none;
    }

    .link svg {
        margin-left: auto;
        width: 12px;
        height: 12px;
        fill: white;
        transition: 0.3s;
    }
</style>
</head>

<body>
    <div class="nav">
        <div class="logo">
            <img src="../img/logo.png" alt="Logo">
            <h1>CheapThrills</h1>
        </div>

        <div class="links">
            <ul>
                <a href="../NewHomePage.php"><li>Home</li></a>
                <a href=""><li>Book</li></a>
                <a href=""><li>About Us</li></a>
                <a href=""><li>Contact</li></a>
                <a href="https://layla.ai/chat?ask=create-a-new-trip"><li>Plan your Trip</li></a>
            </ul>
        </div>

        <div class="search">
            <img src="../img/search.png" alt="Search">
            <input type="search" name="search" id="navSearch" placeholder="Search...">
        </div>

        
    <!----------------------=================== Account Sessioning ===================--------------->
        <div class="account">
        <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) : ?>
            <img src="../img/user.png" alt="user">
            <li class="dropdown">
                <a href="#" class="dropbtn"><?php echo htmlspecialchars($_SESSION['username']); ?> <i class='bx bx-chevron-down'></i></a>
                <div class="dropdown-content">
                    <a href="../accountdetails.php">Account Details</a>

                    <?php if ($_SESSION['account_type'] == 'admin') : ?>
                        <a href="Admin Module/adminDashboard.php">Admin Dashboard</a>

                    <?php elseif ($_SESSION['account_type'] == 'agent') : ?>
                        <a href="Travel Agent Dashboard.php">Agent Dashboard</a>

                    <?php elseif ($_SESSION['account_type'] == 'traveler') : ?>
                        <a href="Traveller Module/bookingTrial.php">My Bookings</a>
                        <a href="accountDetails.php">Settings</a>
                    <?php endif; ?>

                    <a href="../logout.php">Logout</a>
                </div>
            </li>

        <?php else : ?>
            <a href="../LoginPage.php" class="login-link"><li>Login</li></a>
        <?php endif; ?>
    </div>
    </div>


<!-------------------------------------- Sidebar Sessioning  ------------------------------------------------------------>
<?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) : ?>

<?php if ($_SESSION['account_type'] == 'admin') : ?>
    <div class="sidebar">
        <header>PANEL</header>
        <ul>
            <li><a href="../Admin Module/adminDashboard.php" class="nav-item"><i class='bx bxs-dashboard' ></i>Dashboard</a></li>
            <li><a href="../Admin Module/userManagement.php" class="nav-item"><i class='bx bxs-group' ></i>Users </a></li>
            <li><a href="../Admin Module/bookingManagement.php" class="nav-item"><i class='bx bxs-briefcase' ></i>Bookings</a></li>
            <li><a href="../Admin Module/analytics.php" class="nav-item"><i class='bx bx-scatter-chart'></i>Analytics</a></li>
            <li><a href="../logout.php" class="nav-item"><i class='bx bxs-log-out'></i>Logout</a></li>
        </ul> 
        <script src="sidebar.js"></script>
    </div>



<?php elseif ($_SESSION['account_type'] == 'agent') : ?>              
    <div class="sidebar">
        <header>PANEL</header>
        <ul>
            <li><a href="Travel Agent Dashboard.php" class="nav-item"><i class='bx bxs-home'></i>Dashboard</a></li>
            <li class="menu">
                <div class="item">
                    <a href="#" class="link">
                        <i class='bx bxs-package'></i>
                        <span> Packages </span>

                    <div class="submenu">
                        <div class="submenu-item">
                            <a href="createPackage.php" class="submenu-link"> Create Package </a>
                        </div>
                        <div class="submenu-item">
                            <a href="updatePackage.php" class="submenu-link"> Update Package </a>
                        </div>
                        <div class="submenu-item">
                            <a href="viewPackages.php" class="submenu-link"> View Package </a>
                        </div>
                    </div>
                </div>
            </li>
            
            <li><a href="viewPackages.php" class="nav-item"><i class='bx bxs-briefcase'></i>Booking</a></li>
            <li><a href="customercare.php" class="nav-item"><i class='bx bxs-help-circle'></i>Customer Care</a></li>
            <li><a href="events.php" class="nav-item"><i class='bx bxs-calendar-event'></i>Events</a></li>
            <li><a href="../logout.php" class="nav-item"><i class='bx bxs-log-out'></i>Logout</a></li>
        </ul> 
        <script src="sidebar.js"></script>
    </div>
    

                    <?php elseif ($_SESSION['account_type'] == 'traveler') : ?>
                        <br>
                    <?php endif; ?>            

        <?php else : ?>
            <br>
        <?php endif; ?>


