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
            
            <img src="../img/user.png" alt="user">
            <div class="links">
                <ul>
                    <a href="Traveller module/LoginPage.php"><li>Account</li></a>
                </ul>
            </div>
            
        </div>
    </div>