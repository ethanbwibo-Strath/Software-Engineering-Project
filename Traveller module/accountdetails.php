<?php
$pagetitle = "Account Details";
include 'layouts/header.php';
?>

<link rel="stylesheet" href="sidebar.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<div class="container">
    <div class="sidebar">
        <header>Dashboard</header>
        <ul>
            <li><a href="accountdetails.php" class="nav-item"><i class='bx bxs-user-account'></i>Account Details</a></li>
            <li><a href="mytrips.php" class="nav-item"><i class='bx bxs-plane-alt'></i>My Trips</a></li>
            <li><a href="help.php" class="nav-item"><i class='bx bx-help-circle'></i>Help</a></li>
            <li><a href="viewbookings.php" class="nav-item"><i class='bx bx-calendar-check'></i>Bookings</a></li>
            <li><a href="#" class="nav-item"><i class='bx bxs-user-x'></i>Delete Account</a></li>
            <li><a href="login.php" class="nav-item"><i class='bx bx-log-out'></i>Logout</a></li>
        </ul> 
    </div>

    <script src="sidebar.js"></script>

    <div class="main-content">

        <div class="top">

            <div class="image">
                <img  id ="userimage" src="img/beachType.jpeg" alt="user">
            </div>
            
            <div class="username">
                <h3>User</h3>
            </div>

        </div>

        <div class="bottom">

           <div class="left">

                <div class="input-container">
                    <label for="fname">First Name :</label>
                    <br>
                    <input type="text" id="fname" name="fname" required>
                </div>

                <div class="input-container">
                    <label for="lname">Last Name :</label>
                    <br>
                    <input type="text" id="lname" name="lname" required>
                </div>

                <div class="input-container">
                    <label for="dob">Date of birth :</label>
                    <br>
                    <input type="date" id="dob" name="dob" required>
                </div>

                <div class="input-container">
                    <label for="username">Username :</label>
                    <br>
                    <input type="text" id="username" name="username" required>
                </div>

           </div>

           <div class="right">

           </div>

        </div>
       
    </div>
</div>


<?php
include 'layouts/footer.php';
?>