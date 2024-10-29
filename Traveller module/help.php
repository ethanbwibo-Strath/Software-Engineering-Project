<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1.0">

    <title> Account Details </title>
    <link rel = "icon" href="../img/logo2.png" type = "image/png">
    <link rel="stylesheet" href= "userdash.css">
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
                <!-- <a href="https://layla.ai/chat?ask=create-a-new-trip"><li>Plan your Trip</li></a> -->
            </ul>
        </div>

        <div class="search">
            <img src="../img/search.png" alt="Search">
            <input type="search" name="search" id="navSearch" placeholder="Search...">
        </div>

        <div class="account">
            <img src="../img/user.png" alt="user">
            <p>Account</p>
        </div>
    </div>

    <?php include "sidebar.php" ?>

    <div class="main-content">

        
        <table>

            
            <div class="user">

            <!-- <span style="display: flex; justify-content: space-between; width: 30%; align-items: left;"> -->

                <div class="image">
                    <img src="../img/Hotels.jpeg" alt="user" style="border-radius: 50%; width: 200px; height: 200px; object-fit: cover; border: 0.5px solid black; padding: 2px;">
                </div>
            
                
                <div class="name">
                    <p>Daniel Morara</p>
                </div>

            <!-- </span> -->
            </div>

            
            <p>Reach out to us through your assigned agent</p>
            
            <thead>
                <th>Agent Name</th>
                <th>Call Agent</th>
                <th>Email Agent</th>
                <th>Chat on WhatsApp</th>
            </thead>
            
            <span style="text-align: right;">
            <tr>
                <td>Travelocity</td>
                <td>08012345678</td>
                <td>W9N3a@example.com</td>
                <td>08012345678</td>
            </tr>

           
            </span>

        </table>

        <h4>Commonly asked questions</h4>
        <p>How do I change my travel dates?</p>
        <p>How do I cancel my booking?</p>
            
    </div>

    <div class="footer">
        <div class="socials">
            <img src="../img/twitter.png" alt="Twitter">
            <img src="../img/instagram.png" alt="Instagram">
            <img src="../img/linkedin.png" alt="linkedin">
        </div>

        <div class="copyright">
            <p>Copyright &copy; 2024 <span>CheapThrills.</span> All rights reserved.</p>
        </div>
    </div>
</body>
</html>
