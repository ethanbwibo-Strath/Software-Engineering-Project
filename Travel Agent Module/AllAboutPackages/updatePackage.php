<?php
// Include the header
$pagetitle = "Update a Travel Package";
$stylesheet = "../Travel Agent Dashboard.css";
// include "../../layouts\header.php";
include "SDbar.php";

// Example to fetch existing packages from the database
// $packages = fetchPackagesFromDatabase();
?>
<br>
<br>
<style>


.main-content {
    width: 800px;
    margin: 0 auto;
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
    border-radius: 10px; /* Rounded corners */
    background-color: black; /* Bootstrap success color */
    color: white; /* White text */
    font-size: 16px; /* Font size for button */
    cursor: pointer; /* Pointer cursor on hover */
    transition: background-color 0.5s; /* Smooth transition */
}

input[type="submit"]:hover {
    background-color: goldenrod; /* Darker green on hover */
    color: black; /* Black text on hover */
    border-radius: 20px;
}

textarea {
    resize: vertical; /* Allow vertical resizing */
    height: 80px; /* Set a default height */
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
        <textarea id="package-amenities" name="package_amenities" required></textarea>

        <label for="package-image">Package Image:</label>
        <input type="file" id="package-image" name="package_image" accept="image/*">

        <input type="submit" value="Update Package">
    </form>
</div>
<br>
<br>
<div class="footer">
        <div class="socials">
            <a href="#"><img src="../../img/instagram2.png" alt="instagram"></a>
            <a href="#"><img src="../../img/twitter.png" alt="twitter"></a>
            <a href="#"><img src="../../img/linkedin.png" alt="linkedin"></a>
        </div>

        <div class="copyright">
            <p>Copyright &copy; 2024 <span>CheapThrills.</span> All rights reserved.</p>
        </div>