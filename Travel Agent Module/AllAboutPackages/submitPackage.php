<?php
// Include the database connection
include '../../dbConnection.php';

// Create a new instance of dbConnection
$db = new dbConnection();
$conn = $db->conn;

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $package_name = $_POST['package_name'];
    $package_description = $_POST['package_description'];
    $package_price = $_POST['package_price'];
    $package_duration = $_POST['package_duration'];
    $package_hotel = $_POST['package_hotel'];
    $package_amenities = $_POST['package_amenities'];
    
    // Handle file upload for the package image
    if (isset($_FILES['package_image']) && $_FILES['package_image']['error'] == 0) {
        $target_dir = "../../uploads/";
        $target_file = $target_dir . basename($_FILES["package_image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is an image
        $check = getimagesize($_FILES["package_image"]["tmp_name"]);
        if ($check !== false) {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["package_image"]["tmp_name"], $target_file)) {
                // Prepare the SQL statement to insert the package data
                $stmt = $conn->prepare("INSERT INTO packages (package_name, package_description, package_price, package_duration, package_hotel, package_amenities, package_image) 
                                        VALUES (:package_name, :package_description, :package_price, :package_duration, :package_hotel, :package_amenities, :package_image)");
                
                // Bind parameters
                $stmt->bindParam(':package_name', $package_name);
                $stmt->bindParam(':package_description', $package_description);
                $stmt->bindParam(':package_price', $package_price);
                $stmt->bindParam(':package_duration', $package_duration);
                $stmt->bindParam(':package_hotel', $package_hotel);
                $stmt->bindParam(':package_amenities', $package_amenities);
                $stmt->bindParam(':package_image', $target_file);

                // Execute the statement
                if ($stmt->execute()) {
                    echo "Package created successfully!";
                } else {
                    echo "Error creating package.";
                }
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "File is not an image.";
        }
    } else {
        echo "Error: No file uploaded or invalid file.";
    }
}
?>
