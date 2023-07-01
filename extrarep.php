<?php
// Database connection details
$servername = "localhost";
$username = "mouni";
$password = "root";
$dbname = "Extrarep";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$age = $_POST['age'];
$weight = $_POST['weight'];
$email = $_POST['email'];

// Upload health report
$targetDir = "uploads/";
$fileName = basename($_FILES["healthReport"]["name"]);
$targetFilePath = $targetDir . $fileName;
move_uploaded_file($_FILES["healthReport"]["tmp_name"], $targetFilePath);

// Insert user details into the database
$sql = "INSERT INTO users (name, age, weight, email, health_report) VALUES ('$name', '$age', '$weight', '$email', '$fileName')";

if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully";
} else {
    echo "Error inserting record: " . $conn->error;
}

$conn->close();
?>
