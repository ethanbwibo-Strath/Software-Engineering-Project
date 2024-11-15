<?php
// Set page variables
$pagetitle = "User Management";
$stylesheet = "adminStyle.css";

function deleteUser()
{
    // Get the user ID to delete
    $userID = $_POST['userID'];

    // Connect to the database
    $db = new dbConnection();
    $conn = $db->conn;

    // Delete the user from the database
    $stmt = $conn->prepare("DELETE FROM users WHERE userID = :userID");
    $stmt->bindParam(':userID', $userID);
    $stmt->execute();
}
// Include the header
include "../layouts/header.php";

?>
<head>
    <link rel="stylesheet" href="css/userManagement.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<div class="main">
    <?php
        // Include the sidebar
        include "sidebarPanel/adminSide.php";
    ?>

    <div class="tableContainer">
        <h2>User Management</h2>
        <!-- Search Input -->
        <!-- <input type="text" id="search" placeholder="Search for a user..." class="searchBar"> -->
        <!-- User Table -->
        <table id="userTable">
            <!-- Table Head -->
            <thead>
                <th>User ID</th>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Role</th>
                <th>Actions</th>
            </thead>
            <!-- Table Body -->
            <tbody>
                <?php
                    // Connect to the database
                    include "../Traveller module/dbconnection.php";
                    $db = new dbConnection();
                    $conn = $db->conn;

                    // Fetch users from the database
                    $sql = "SELECT * FROM users";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Loop through users and display them in the table
                    foreach ($users as $user) {
                        echo "<tr>";
                        echo "<td>" . $user['UserID'] . "</td>";
                        // Current UserID
                        $currentUserID = $user['UserID'];
                        echo "<td>" . $user['username'] . "</td>";
                        echo "<td>" . $user['fname'] . "</td>";
                        echo "<td>" . $user['lname'] . "</td>";
                        echo "<td>" . $user['email'] . "</td>";
                        echo "<td>" . $user['phone'] . "</td>";
                        echo "<td>" . $user['account_type'] . "</td>";
                        echo "<td class='buttons'>
                            <button class='btnEdit'>Edit</button>
                            <button class='btnDelete' onclick='deleteUser();'>Delete</button>
                        </td>";
                    }

                ?>
            </tbody>
        </table>
    </div>
</div>


<?php
// Include the footer
include "../layouts/footer.php";
?>
