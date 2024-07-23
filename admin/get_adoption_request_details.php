<?php
include '../db_connection.php';

if (isset($_GET['id'])) {
    $requestId = $_GET['id'];
    $sql = "SELECT * FROM adoption_requests WHERE id = $requestId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<p><strong>ID:</strong> " . $row['id'] . "</p>";
        echo "<p><strong>Pet ID:</strong> " . $row['pet_id'] . "</p>";
        echo "<p><strong>Name:</strong> " . $row['name'] . "</p>";
        echo "<p><strong>Contact Info:</strong> " . $row['contact_info'] . "</p>";
        echo "<p><strong>Address:</strong> " . $row['address'] . "</p>";
        echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
    } else {
        echo "No details found for adoption request ID: " . $requestId;
    }
} else {
    echo "Invalid request";
}
?>
