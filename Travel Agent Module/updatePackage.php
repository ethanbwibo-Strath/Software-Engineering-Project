<?php
$stylesheet = "Travel Agent Dashboard.css";
$pagetitle = "Update Packages";
include "SDbar.php";
include '../dbConnection.php';

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
        $target_dir = "../uploads/";
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
        " WHERE package_id = :package_id");

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

    // Execute the statement
    if ($stmt->execute()) {
        echo "Package updated successfully!";
    } else {
        echo "Error updating package.";
    }
}

// Fetch packages from the database to display
$stmt = $conn->prepare("SELECT * FROM packages");
$stmt->execute();
$packages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<style>
.container1 {   
    padding: 20px;
    margin: 100px auto;
    width: 85%;
    height: min-content;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
}

.container1 h2 {
    color: goldenrod;
    text-align: center;
}

.card1 {
    display: flex;
    padding: 10px;
    margin: 10px;
    height: 290px;
    width: 100%;
    border-radius: 8px;
    box-shadow: 0px 2px 5px rgba(218, 165, 32, 0.5);
}

.card1-image img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensures the image fills the container without distortion */
    border-radius: 8px;
}

.card1-body {
    width: 70%;
    height: 100%;
    padding: 0 10px;
    overflow-x: auto;
}
</style>


<div class="container1">
    <h2>Update Packages</h2>
    <div class="row">

        <?php foreach ($packages as $package): ?>
            <div class="card1">
                <div class="card1-image" style="width: 30%; height: 100%;">
                    <img src="<?= $package['package_image'] ?>" class="card-img-top" alt="<?= $package['package_name'] ?>">
                </div>

                <div class="card1-body">
                    <!-- Scoped Bootstrap CSS (only form components) -->
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

                        <form action="updatePackage.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="package_id" value="<?= $package['package_id'] ?>">
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
                            <button type="submit" name="update_package" class="btn btn-warning">Update Package</button>
                        </form>
                </div>
            </div>
                
        <?php endforeach; ?>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

