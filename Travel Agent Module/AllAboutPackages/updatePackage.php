<?php
// Include the header
$pagetitle = "Update a Travel Package";
$stylesheet = "../Travel Agent Dashboard.css";
include "../../layouts\header.php";

// Example to fetch existing packages from the database
// $packages = fetchPackagesFromDatabase();
?>
<style>
    /* body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5; /* Light background 
    margin: 0;
    padding: 20px;
} */

.main-content {
    width: 800px;
    margin: 0 auto;
    /* background: #fff; 
    padding: 20px;
    border-radius: 8px; /* Rounded corners *
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); Subtle shadow */
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
    margin-top: 20px; 
    padding: 10px; 
    border: none;
    border-radius: 4px;
    background-color: #007BFF; 
    color: white; 
    font-size: 16px; 
    cursor: pointer; 
    transition: background-color 0.3s; 
}

input[type="submit"]:hover {
    background-color: #0056b3; 
}

textarea {
    resize: vertical; /* Allow vertical resizing */
    height: 100px; /* Set a default height */
}

select {
    background-color: #fff; /* White background for select */
    appearance: none; /* Remove default styling */
    padding-right: 20px; /* Space for the dropdown arrow */
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><polygon points="0,0 20,0 10,10" fill="black" /></svg>'); /* Custom arrow */
    background-repeat: no-repeat;
    background-position: right 10px center; /* Position of the arrow */
}

@media (max-width: 600px) {
    .main-content {
        width: 90%; /* Full width on small screens */
    }
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
    <h1>Update an Existing Package</h1>
    <form action="updatePackageAction.php" method="POST" enctype="multipart/form-data">
        <label for="package-select">Select a Package to Update:</label>
        <select id="package-select" name="package_id" required>
            <option value="">Select Package</option>
            <!-- Populate with existing packages -->
            <?php foreach ($packages as $package) : ?>
                <option value="<?= $package['id'] ?>"><?= $package['name'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="package-name">Package Name:</label>
        <input type="text" id="package-name" name="package_name">

        <label for="package-description">Description:</label>
        <textarea id="package-description" name="package_description"></textarea>

        <label for="package-price">Price (USD):</label>
        <input type="number" id="package-price" name="package_price" min="0">

        <label for="package-duration">Duration (days):</label>
        <input type="number" id="package-duration" name="package_duration" min="1">

        <label for="package-hotel">Hotel:</label>
        <input type="text" id="package-hotel" name="package_hotel">

        <label for="package-amenities">Amenities:</label>
        <input type="text" id="package-amenities" name="package_amenities">

        <label for="package-image">Package Image:</label>
        <input type="file" id="package-image" name="package_image" accept="image/*">

        <input type="submit" value="Update Package">
    </form>
</div>
