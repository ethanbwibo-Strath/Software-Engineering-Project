<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pagetitle ?></title>
    <link rel = "icon" href="../img/logo2.png" type = "image/png">
   <!-- Dynamically load the correct stylesheet -->
   <?php if (isset($stylesheet)): ?>
        <link rel="stylesheet" href="<?php echo $stylesheet; ?>">
    <?php else: ?>
        <link rel="stylesheet" href="../style.css"> <!-- Default stylesheet if none is provided -->
    <?php endif; ?>
    
</head>
<!-- <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('your-background-image.jpg'); /* replace with your background image */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .search-bar {
            display: flex;
            background: white;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            align-items: center;
        }
        .search-bar select, .search-bar button {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }
        .search-bar select {
            width: 150px;
        }
        .search-bar button {
            background-color: #ff6f3c; /* Adjust this color for the search button */
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }
        .search-bar button:hover {
            background-color: #ff5722; /* Adjust hover color */
        } -->
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
            <img src="img/search.png" alt="Search">
            <input type="search" name="search" id="navSearch" placeholder="Search...">
        </div>

        <div class="account">
            <img src="img/user.png" alt="user">
            <a href="Traveller module/LoginPage.php" style="text-decoration: none;"><p>Account</p></a>
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


        <div class="account">
            
            <img src="../img/user.png" alt="user">
            <div class="links">
                <ul>
                    <a href="Traveller module/LoginPage.php"><li>Account</li></a>
                </ul>
            </div>
            
        </div>
    </div>