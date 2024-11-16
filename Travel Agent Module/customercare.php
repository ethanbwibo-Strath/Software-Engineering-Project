<?php
// Database connection
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../dbConnection.php';

try {
    // Create a PDO connection object
    $db = new dbConnection();
    $conn = $db->conn;

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("SELECT * FROM feedback");
    $stmt->execute();
    $feedback = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all rows as an associative array

    // Print the fetched feedback for debugging (optional)
    echo "<pre>";
    // print_r($feedback);
    echo "</pre>";

} catch (PDOException $e) {
    echo "Error fetching feedback: " . $e->getMessage();
}

echo "<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-family: Arial, sans-serif;
    }
    th, td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }
    th {
        background-color: goldenrod;
        color: white;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #ddd;
    }
    td {
        max-width: 200px;
        word-wrap: break-word;
    }
</style>";

// Start the table
echo "<table>
<tr>
    <th>Type</th>
    <th>Name</th>
    <th>Email</th>
    <th>Message</th>
    <th>Submitted At</th>
</tr>";

// Loop through the feedback data and populate the table
foreach ($feedback as $row) {
    echo "<tr>
        <td>{$row['type']}</td>
        <td>{$row['name']}</td>
        <td>{$row['email']}</td>
        <td>{$row['message']}</td>
        <td>{$row['submitted_at']}</td>
    </tr>";
}

// End the table
echo "</table>";

// Close the database connection
$conn = null; // Close the PDO connection
?>
