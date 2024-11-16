<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pagetitle ?></title>
    <link rel = "icon" href="../img/logo2.png" type = "image/png">
    <link rel="stylesheet" href="<?php echo $stylesheet; ?>">
</head>

<style>        
</style>
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
            <!-- <a href="https://layla.ai/chat?ask=create-a-new-trip"><li>Plan your Trip</li></a> -->
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

    
<!-- 
    <div class="search-bar">
        <select name="destination" id="destination">
            <option value="" disabled selected>Where Destination</option>
            <option value="africa">Africa</option>
            <option value="europe">Europe</option>
            <option value="asia">Asia</option>
            <!-- Add more options as needed --
        </select>

        <select name="activity" id="activity">
            <option value="" disabled selected>Type Activity</option>
            <option value="beach">Beach</option>
            <option value="big-5-gems">Big 5 Gems</option>
            <option value="birthdays">Birthdays</option>
            <option value="christmas">Christmas Holidays</option>
            <option value="day-trips">Day Trips</option>
            <option value="easter">Easter Holidays</option>
            <option value="extreme-tours">Extreme Tours</option>
            <!-- Add more options as needed --
        </select>

        <button type="button">Search</button>
    </div>
 -->

    </div>