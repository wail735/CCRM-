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

// Define valid status options
$valid_statuses = array("initialisation", "En attente", "confirmé", "En attente de retrait", "Recu");

// Check if the form is submitted and the paie_id and status are set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['paie_id']) && isset($_POST['status'])) {
    // Escape user inputs for security
    $paie_id = $conn->real_escape_string($_POST['paie_id']);
    $status = $conn->real_escape_string($_POST['status']);

    // Check if the status is valid
    if (in_array($status, $valid_statuses)) {
        // Update the status of the paiement
        $sql = "UPDATE Paiement SET status = '$status' WHERE id = $paie_id";
        if ($conn->query($sql) === TRUE) {
            // If the update succeeds, return the new status
            echo $status;
        } else {
            // If the update fails, return an error message
            echo "Error updating status: " . $conn->error;
        }
    } else {
        // If the status is not valid, return an error message
        echo "Invalid status";
    }
} else {
    // If the data is not correctly sent, return an error message
    echo "Invalid request";
}

// Close connection
$conn->close();
?>
