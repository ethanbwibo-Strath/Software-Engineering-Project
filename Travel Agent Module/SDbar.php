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

        
        <div class="account">
                        
            <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) : ?>
                <img src="../img/user.png" alt="user">
                <li class="dropdown">
                    <a href="#" class="dropbtn"><?php echo htmlspecialchars($_SESSION['username']); ?> <i class='bx bx-chevron-down'></i></a>
                    <div class="dropdown-content">
                        <a href="../Traveller Module/accountdetails.php">Account Details</a>

                        <?php if ($_SESSION['account_type'] == 'admin') : ?>
                            <a href="Admin Module/adminDashboard.php">Admin Dashboard</a>

                        <?php elseif ($_SESSION['account_type'] == 'agent') : ?>
                            <a href="Travel Agent Dashboard.php">Agent Dashboard</a>

                        <?php elseif ($_SESSION['account_type'] == 'traveler') : ?>
                            <a href="travelerDashboard.php">My Bookings</a>
                        <?php endif; ?>

                        <a href="../Traveller Module/logout.php">Logout</a>
                    </div>
                </li>

            <?php else : ?>
                <a href="Traveller Module/LoginPage.php" class="login-link"><li>Login</li></a>
            <?php endif; ?>
        </div>
    </div>

    <div class="sidebar">
        <header>PANEL</header>
        <ul>
            <!-- Packages Dropdown -->
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
            
            <li><a href="#" class="nav-item"><i class='bx bxs-briefcase'></i>Booking</a></li>
            <li><a href="#" class="nav-item"><i class='bx bxs-help-circle'></i>Customer Care</a></li>
            <li><a href="#" class="nav-item"><i class='bx bxs-chat'></i>Reviews</a></li>
            <li><a href="../Traveller Module/logout.php" class="nav-item"><i class='bx bxs-log-out'></i>Logout</a></li>
        </ul> 
    </div>
        <script src="sidebar.js"></script>
    </div>