<?php
// Set page variables
$pagetitle = "User Management";
$stylesheet = "adminStyle.css";
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
        <input type="text" id="search" placeholder="Search for a user..." class="searchBar">
        <!-- User Table -->
        <table id="userTable">
            <!-- Table Head -->
            <thead>
                <th>User ID</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Password</th>
                <th>Role</th>
                <th>Actions</th>
            </thead>
            <!-- Table Body -->
            <tbody>
                <?php
                    // Dummy data
                    $users = 
                    [
                        ["id" => 1, "email" => "pQwK8@example.com", "fname" => "John", "lname" => "Doe", "username" => "johndoe", "password" => "password123", "role" => "admin"],
                        ["id" => 2, "email" => "pQwK8@example.com", "fname" => "Jane", "lname" => "Doe", "username" => "janedoe", "password" => "password123", "role" => "traveller"],
                        ["id" => 3, "email" => "pQwK8@example.com", "fname" => "Bob", "lname" => "Smith", "username" => "bobsmith", "password" => "password123", "role" => "traveller"],
                    ];
                    // Loop through and display users
                    foreach ($users as $user)
                    {
                        echo "<tr>";
                        echo "<td>" . $user["id"] . "</td>";
                        echo "<td>" . $user["email"] . "</td>";
                        echo "<td>" . $user["fname"] . "</td>";
                        echo "<td>" . $user["lname"] . "</td>";
                        echo "<td>" . $user["username"] . "</td>";
                        echo "<td>" . $user["password"] . "</td>";
                        echo "<td>" . $user["role"] . "</td>";
                        // Buttons to edit and delete
                        echo 
                        "<td class='buttons'>
                            <button class='btnEdit'>Edit</button>
                            <button class='btnDelete'>Delete</button>
                        </td>";
                        echo "</tr>";
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
