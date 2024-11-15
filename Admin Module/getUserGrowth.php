<?php
header('Content-Type: application/json');
$mysqli = new mysqli("localhost:3307", "root", "mySQLpass_11!", "cheapthrills");

$query = "SELECT DATE(created_at) AS signup_date, COUNT(userID) AS new_users FROM users GROUP BY signup_date ORDER BY signup_date";
$result = $mysqli->query($query);

$data = [];
while($row = $result->fetch_assoc()) 
{
    $data[] = $row;
}

echo json_encode($data);
?>
