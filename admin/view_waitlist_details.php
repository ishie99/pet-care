<?php
include '../db_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch adoption request details and related pet information based on ID
    $sql = "SELECT ar.*, p.name AS pet_name
            FROM adoption_requests ar
            LEFT JOIN pets p ON ar.pet_id = p.id
            WHERE ar.id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Adoption request details
        $informant_name = $row['name'];
        $contact_info = $row['contact_info'];
        $address = $row['address'];
        $email = $row['email'];
        // Pet details
        $pet_name = $row['pet_name'];
    } else {
        // No adoption request found with that ID
        $informant_name = "Not found";
        $contact_info = "Not found";
        $address = "Not found";
        $email = "Not found";
        $pet_name = "Not found";
    }
} else {
    // No ID parameter provided
    $informant_name = "Not specified";
    $contact_info = "Not specified";
    $address = "Not specified";
    $email = "Not specified";
    $pet_name = "Not specified";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adoption Request Details</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
    <header>
        <h1>Adoption Request Details</h1>
        <?php include '../components/admin_navbar.php'; ?>
    </header>

    <section>
        <h2>Adoption Request ID: <?php echo $id; ?></h2>
        <p><strong>Name:</strong> <?php echo $informant_name; ?></p>
        <p><strong>Contact Info:</strong> <?php echo $contact_info; ?></p>
        <p><strong>Address:</strong> <?php echo $address; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Pet Name:</strong> <?php echo $pet_name; ?></p>
        <p><a href="view_waitlist.php">Back to Wait List</a></p>
    </section>

    <footer>
        <?php include '../components/footer.php'; ?>
    </footer>
</body>
</html>
