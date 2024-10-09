<?php
// Include the header
$pagetitle = "Create a Travel Package";
$stylesheet = "TravelAgentStyles.css";
include "layouts/header.php";
?>
<style>
    /* body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5; /* Light background 
    margin: 0;
    padding: 20px;
} */

.main-content {
    max-width: 600px; /* Max width for the form */
    margin: 0 auto; /* Center the form */
    background: #fff; /* White background for the form */
    padding: 20px;
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

h1 {
    text-align: center; /* Center the heading */
    color: #333; /* Darker text color */
}

form {
    display: flex;
    flex-direction: column; /* Stack elements vertically */
}

label {
    margin-top: 10px; /* Space above each label */
    font-weight: bold; /* Bold labels */
    color: #555; /* Gray color for labels */
}

input[type="text"],
input[type="number"],
textarea,
select {
    padding: 10px; /* Inner padding */
    margin-top: 5px; /* Space above input fields */
    border: 1px solid #ccc; /* Light border */
    border-radius: 4px; /* Rounded corners for inputs */
    font-size: 16px; /* Font size for input */
}

input[type="file"] {
    margin-top: 5px; /* Space above file input */
}

input[type="submit"] {
    margin-top: 20px; /* Space above the button */
    padding: 10px; /* Inner padding */
    border: none; /* No border */
    border-radius: 4px; /* Rounded corners */
    background-color: #28a745; /* Bootstrap success color */
    color: white; /* White text */
    font-size: 16px; /* Font size for button */
    cursor: pointer; /* Pointer cursor on hover */
    transition: background-color 0.3s; /* Smooth transition */
}

input[type="submit"]:hover {
    background-color: #218838; /* Darker green on hover */
}

textarea {
    resize: vertical; /* Allow vertical resizing */
    height: 100px; /* Set a default height */
}

@media (max-width: 600px) {
    .main-content {
        width: 90%; /* Full width on small screens */
    }
}
.sidebar-link {
        position: relative;
        margin: 10px 0;
    }

    .sidebar-link a {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: #333;
        padding: 10px 15px;
        border-radius: 5px;
        transition: background 0.3s ease;
    }

    .sidebar-link a:hover {
        background: #0a3cff;
        color: white;
    }

    .submenu {
        display: none;
        background-color: #e9e9e9;
        padding: 10px;
        border-radius: 5px;
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        z-index: 10;
    }

    .sidebar-link:hover .submenu {
        display: block;
    }

    .submenu-item {
        margin: 5px 0;
    }

    .submenu-link {
        padding: 8px 12px;
        text-decoration: none;
        color: #333;
    }

    .submenu-link:hover {
        background: #0a3cff;
        color: white;
    }
</style>

<div class="main">
    <div class="sidebar">
        <h2>PANEL</h2>
        <ul>
            <div class="sidebar-link">
                <li>
                    <a href="#" class="link">Packages</a>
                    <div class="submenu">
                        <div class="submenu-item">
                            <a href="createPackage.php" class="submenu-link">Create Package</a>
                        </div>
                        <div class="submenu-item">
                            <a href="updatePackage.php" class="submenu-link">Update Package</a>
                        </div>
                        <div class="submenu-item">
                            <a href="viewPackages.php" class="submenu-link">View Packages</a>
                        </div>
                    </div>
                </li>
                <img src="img/user.png" alt="User Icon">
            </div>

            <div class="sidebar-link">
                <li><a href="">Booking Management</a></li>
                <img src="img/travelpackage.png" alt="Package Icon">
            </div>

            <div class="sidebar-link">
                <li><a href="">Customer Support</a></li>
                <img src="img/book.png" alt="Book Icon">
            </div>

            <div class="sidebar-link">
                <li><a href="">Reports & Analytics</a></li>
                <img src="img/report.png" alt="Report Icon">
            </div>

            <div class="sidebar-link">
                <li><a href="">Reviews and Feedback</a></li>
                <img src="img/report.png" alt="Report Icon">
            </div>
        </ul>
    </div>

<div class="main-content">
    <h1>Create a New Package</h1>
    <form action="submitPackage.php" method="POST" enctype="multipart/form-data">
        <label for="package-name">Package Name:</label>
        <input type="text" id="package-name" name="package_name" required>

        <label for="package-description">Description:</label>
        <textarea id="package-description" name="package_description" required></textarea>

        <label for="package-price">Price (USD):</label>
        <input type="number" id="package-price" name="package_price" min="0" required>

        <label for="package-duration">Duration (days):</label>
        <input type="number" id="package-duration" name="package_duration" min="1" required>

        <label for="package-hotel">Hotel:</label>
        <input type="text" id="package-hotel" name="package_hotel" required>

        <label for="package-amenities">Amenities :</label>
        <input type="text" id="package-amenities" name="package_amenities" required>

        <label for="package-image">Package Image:</label>
        <input type="file" id="package-image" name="package_image" accept="image/*" required>

        <input type="submit" value="Create Package">
    </form>
</div>
