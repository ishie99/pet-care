<?php
include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $adoption_id = $_GET['id'];

    // Update adoption request status (you might have a 'status' column in your adoption_requests table)
    $sql = "UPDATE adoption_requests SET status = 'accepted' WHERE id = $adoption_id";

    if ($conn->query($sql) === TRUE) {
        echo "Adoption request accepted successfully";
    } else {    
        echo "Error updating record: " . $conn->error;
    }
}
?>
