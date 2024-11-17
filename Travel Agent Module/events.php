<?php
// Database connection
include '../dbConnection.php'; // Include your connection file
$db = new dbConnection();
$conn = $db->conn;
session_start();

// Handle Add Event
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_event'])) {
    $event_date = $_POST['event_date'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $color = $_POST['color'];

    $stmt = $conn->prepare("INSERT INTO events (event_date, title, description, color) VALUES (:event_date, :title, :description, :color)");
    $stmt->bindParam(':event_date', $event_date);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':color', $color);
    $stmt->execute();
}

// Handle Update Event
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_event'])) {
    $id = $_POST['id'];
    $event_date = $_POST['event_date'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $color = $_POST['color'];

    $stmt = $conn->prepare("UPDATE events SET event_date = :event_date, title = :title, description = :description, color = :color WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':event_date', $event_date);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':color', $color);
    $stmt->execute();
}

// Handle Delete Event
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_event'])) {
    $id = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM events WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

// Fetch All Events
$stmt = $conn->prepare("SELECT * FROM events ORDER BY event_date ASC");
$stmt->execute();
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management</title>
    <link rel="stylesheet" href="Travel Agent Dashboard.css"> <!-- Use the same stylesheet -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        .dashboard {
            margin-left: 60px;
            padding: 20px;
        }
        table {
            width: 90%;
            margin: 20px 0;
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: goldenrod;
            color: white;
        }
        .del-btn {
            padding: 5px 10px;
            background-color: #DAA520;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            margin-left: 10px;
        }
        .del-btn:hover {
            background-color: #fff;
            color: goldenrod;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
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


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Include the sidebar HTML from the travel agent dashboard -->
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
            <li><a href="#" class="nav-item"><i class='bx bxs-chat'></i>Reviews</a></li>
            <li><a href="../logout.php" class="nav-item"><i class='bx bxs-log-out'></i>Logout</a></li>
        </ul> 
    </div>
        <script src="sidebar.js"></script>
    </div>
    </div>

    <!-- Main Content -->
    <div class="dashboard">
        <h1>Event Management</h1>

        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Color</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event): ?>
                    <tr>
                        <td><?= htmlspecialchars($event['event_date']); ?></td>
                        <td><?= htmlspecialchars($event['title']); ?></td>
                        <td><?= htmlspecialchars($event['description']); ?></td>
                        <td>
                            <span style="color: <?= htmlspecialchars($event['color']); ?>;">
                                <?= htmlspecialchars($event['color']); ?>
                            </span>
                        </td>
                        <td>
                            <a href="updateEventForm.php?id=<?= $event['id']; ?>">Update</a>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $event['id']; ?>">
                                <button class="del-btn"  type="submit" name="delete_event">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <div class="footer">
        <!-- Include the footer HTML from the travel agent dashboard -->
        <div class="socials">
            <a href="#"><img src="../img/instagram2.png" alt="instagram"></a>
            <a href="#"><img src="../img/twitter.png" alt="twitter"></a>
            <a href="#"><img src="../img/linkedin.png" alt="linkedin"></a>
        </div>

        <div class="copyright">
            <p>Copyright &copy; 2024 <span>CheapThrills.</span> All rights reserved.</p>
        </div>
    </div>
</body>
</html>
