<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "fichier";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted and the colis_id and status are set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['colis_id']) && isset($_POST['statut'])) {
    // Escape user inputs for security
    $colis_id = $conn->real_escape_string($_POST['colis_id']);
    $status = $conn->real_escape_string($_POST['statut']);

    // Update the status of the colis
// Update the status of the colis
$sql = "UPDATE colis SET statut = '$status' WHERE id = $colis_id";
    if ($conn->query($sql) === TRUE) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
