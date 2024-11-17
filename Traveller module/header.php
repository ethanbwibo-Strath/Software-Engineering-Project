<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pagetitle ?></title>
    <link rel="icon" href="../img/logo2.png" type="image/png">
    <link rel="stylesheet" href="userdash.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
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
                        <a href="../accountdetails.php">Account Details</a>

                        <?php if ($_SESSION['account_type'] == 'admin') : ?>
                            <a href="Admin Module/adminDashboard.php">Admin Dashboard</a>

                        <?php elseif ($_SESSION['account_type'] == 'agent') : ?>
                            <a href="Travel Agent Dashboard.php">Agent Dashboard</a>

                        <?php elseif ($_SESSION['account_type'] == 'traveler') : ?>
                            <a href="myTrips.php">My Bookings</a>
                        <?php endif; ?>

                        <a href="../logout.php">Logout</a>
                    </div>
                </li>

            <?php else : ?>
                <a href="Traveller Module/LoginPage.php" class="login-link"><li>Login</li></a>
            <?php endif; ?>
        </div>
    </div>


    <?php include "sidebar.php" ?>