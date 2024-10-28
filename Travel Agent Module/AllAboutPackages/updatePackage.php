<?php
// Include the database connection
// $stylesheet = "../Travel Agent Dashboard.css";
include "SDbar.php";
include '../../dbConnection.php';

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
// Create a new instance of dbConnection
$db = new dbConnection();
$conn = $db->conn;

// Check if the form has been submitted for updating
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_package'])) {
    // Get the updated form data
    $package_id = $_POST['package_id'];
    $package_name = $_POST['package_name'];
    $package_description = $_POST['package_description'];
    $package_price = $_POST['package_price'];
    $package_duration = $_POST['package_duration'];
    $package_hotel = $_POST['package_hotel'];
    $package_amenities = $_POST['package_amenities'];

    // Handle file upload for the package image if provided
    $target_file = null;
    if (isset($_FILES['package_image']) && $_FILES['package_image']['error'] == 0) {
        $target_dir = "../../uploads/";
        $target_file = $target_dir . basename($_FILES["package_image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is an image
        $check = getimagesize($_FILES["package_image"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            exit;
        }

        // Move the uploaded file to the target directory
        if (!move_uploaded_file($_FILES["package_image"]["tmp_name"], $target_file)) {
            echo "Error uploading file.";
            exit;
        }
    }

    // Prepare the SQL statement to update the package data
    $stmt = $conn->prepare("UPDATE packages SET 
                            package_name = :package_name,
                            package_description = :package_description,
                            package_price = :package_price,
                            package_duration = :package_duration,
                            package_hotel = :package_hotel,
                            package_amenities = :package_amenities" .
                            ($target_file ? ", package_image = :package_image" : "") . 
                            " WHERE id = :package_id");

    // Bind parameters
    $stmt->bindParam(':package_name', $package_name);
    $stmt->bindParam(':package_description', $package_description);
    $stmt->bindParam(':package_price', $package_price);
    $stmt->bindParam(':package_duration', $package_duration);
    $stmt->bindParam(':package_hotel', $package_hotel);
    $stmt->bindParam(':package_amenities', $package_amenities);
    if ($target_file) {
        $stmt->bindParam(':package_image', $target_file);
    }
    $stmt->bindParam(':package_id', $package_id);

<<<<<<< HEAD
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
=======
    // Execute the statement
    if ($stmt->execute()) {
        echo "Package updated successfully!";
    } else {
        echo "Error updating package.";
>>>>>>> 43b29ffefab3cbedc2be68710741eb07c19c30ba
    }
}

// Fetch packages from the database to display
$stmt = $conn->prepare("SELECT * FROM packages");
$stmt->execute();
$packages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Packages</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card {
    width: 350px; /* Increase the width of the card */
    height: 450px; /* Increase the height of the card */
    overflow: hidden; /* Hide overflow */
    margin: 20px; /* Add some space around the card */
    position: relative; /* Position relative for absolute elements inside */
    /* border: 1px solid #ccc; Add border for card */
    border-radius: 8px; /* Rounded corners */
}

.card img {
    width: 100%; /* Image takes full width */
    height: 200px; /* Increase fixed height for the image */
    object-fit: cover; /* Ensure the image covers the area */
    border-top-left-radius: 8px; /* Round the top corners */
    border-top-right-radius: 8px; /* Round the top corners */
}

.card-body {
    padding: 15px; /* Add padding inside the card */
    height: calc(100% - 200px); /* Adjust height to accommodate the new image height */
    overflow-y: auto; /* Enable vertical scrolling if needed */
}

.card-body textarea, 
.card-body input[type="text"], 
.card-body input[type="number"] {
    width: 100%; /* Full width for input fields */
    resize: vertical; /* Allow vertical resizing */
    max-height: 80px; /* Increase the max height for input fields */
}

.card-body input[type="file"] {
    margin-top: 10px; /* Space above the file input */
}


<<<<<<< HEAD
        <label for="package-amenities">Amenities:</label>
        <textarea id="package-amenities" name="package_amenities" required></textarea>
=======
    </style>
</head>
<body>
>>>>>>> 43b29ffefab3cbedc2be68710741eb07c19c30ba

<div class="container mt-5">
    <h2>Update Packages</h2>
    <div class="row">
        <?php foreach ($packages as $package): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="<?= $package['package_image'] ?>" class="card-img-top" alt="<?= $package['package_name'] ?>">
                    <div class="card-body">
                      
                        <form action="update_packages.php" method="post" enctype="multipart/form-data">
                            <!-- <input type="hidden" name="package_id" value="<?= $package['id'] ?>"> -->
                            <div class="form-group">
                                <label for="package_name">Package Name:</label>
                                <input type="text" class="form-control" name="package_name" value="<?= htmlspecialchars($package['package_name']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="package_description">Description:</label>
                                <textarea class="form-control" name="package_description" required><?= htmlspecialchars($package['package_description']) ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="package_price">Price:</label>
                                <input type="number" class="form-control" name="package_price" value="<?= htmlspecialchars($package['package_price']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="package_duration">Duration (days):</label>
                                <input type="number" class="form-control" name="package_duration" value="<?= htmlspecialchars($package['package_duration']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="package_hotel">Hotel:</label>
                                <input type="text" class="form-control" name="package_hotel" value="<?= htmlspecialchars($package['package_hotel']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="package_amenities">Amenities:</label>
                                <input type="text" class="form-control" name="package_amenities" value="<?= htmlspecialchars($package['package_amenities']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="package_image">Package Image:</label>
                                <input type="file" class="form-control" name="package_image">
                            </div>
                            <button type="submit" name="update_package" class="btn btn-primary">Update Package</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
