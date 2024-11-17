<?php
$recipientEmail = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '';
$recipientName = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : '';
$complaintType = isset($_GET['type']) ? htmlspecialchars($_GET['type']) : '';
$defaultSubject = $complaintType ? "$complaintType - CheapThrills" : "Complaint - CheapThrills";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
          crossorigin="anonymous">
    <link rel="stylesheet" href="Travel Agent Dashboard.css"> <!-- Include your dashboard CSS here -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-- Navigation Bar -->
    <div class="nav">
        <div class="logo">
            <img src="../img/logo.png" alt="Logo">
            <h1>CheapThrills</h1>
        </div>
        <div class="links">
            <ul>
                <a href="../NewHomePage.php"><li>Home</li></a>
                <a href=""><li>Book</li></a>
                <a href="../NewHomePage.php#why-us-section"><li>About Us</li></a>
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
                        <a href="../accountdetails.php">Account Details</a>
                        <!-- Include links based on account type -->
                        <a href="../logout.php">Logout</a>
                    </div>
                </li>
            <?php else : ?>
                <a href="../LoginPage.php" class="login-link"><li>Login</li></a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Sidebar Menu -->
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
            <li><a href="#" class="nav-item"><i class='bx bxs-briefcase'></i>Booking</a></li>
            <li><a href="customercare.php" class="nav-item"><i class='bx bxs-help-circle'></i>Customer Care</a></li>
            <li><a href="#" class="nav-item"><i class='bx bxs-chat'></i>Reviews</a></li>
            <li><a href="../logout.php" class="nav-item"><i class='bx bxs-log-out'></i>Logout</a></li>
        </ul> 
    </div>

    <!-- Contact Form Section -->
    <div class="dashboard">
    <h1>Resolve Issues</h1>
        <div class="container">
            <form action="process.php" method="post">
                <input type="text" class="form-control mt-4" name="fullname" value="<?php echo $recipientName; ?>" placeholder="Full Name" required>
                <input type="email" class="form-control mt-4" name="email" value="<?php echo $recipientEmail; ?>" placeholder="Recipient's Email" required>
                <input type="text" class="form-control mt-4" name="subject" value="<?php echo $defaultSubject; ?>" placeholder="Subject" required>
                <textarea name="message" class="form-control mt-4" cols="30" rows="10" placeholder="Enter Message" required></textarea>
                <input type="submit" class="btn btn-primary mt-4" value="Send" name="submit">
                <a href="customercare.php" class="btn btn-primary mt-4">Back to Feedback</a>

            </form>
        </div>
    </div>

    <script src="sidebar.js"></script>
</body>
</html>
