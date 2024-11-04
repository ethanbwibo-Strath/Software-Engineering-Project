<?php
$pagetitle = "Create a Travel Package";
$stylesheet = "../Travel Agent Dashboard.css";
include "SDbar.php";

?>
<br>
<br>
<style>
    /* body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5; /* Light background 
    margin: 0;
    padding: 20px;
} */

.main-content {
    width: 600px; 
    margin: 0 auto; /* Center the form *
    background: #fff; /* White background for the form *
    padding: 20px;
    border-radius: 8px; /* Rounded corners *
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);  Subtle shadow */
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
    height: 100px; /* Set a default height */
}

@media (max-width: 600px) {
    .main-content {
        width: 90%; /* Full width on small screens */
    }
}

</style>


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
        <textarea id="package-amenities" name="package_amenities" required></textarea>

        <label for="package-image">Package Image:</label>
        <input type="file" id="package-image" name="package_image" accept="image/*" required>

        <input type="submit" value="Create Package">
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