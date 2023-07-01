
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

$email = $_POST['email'];

// Fetch user health report
$sql = "SELECT health_report FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $healthReport = $row['health_report'];

    // Send the health report file to the user for download
    $file = 'uploads/' . $healthReport;
    if (file_exists($file)) {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $healthReport . '"');
        readfile($file);
    } else {
        echo "Health report not found";
    }
} else {
    echo "User not found";
}

$conn->close();
?>
