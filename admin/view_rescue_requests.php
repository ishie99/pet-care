<?php
include '../db_connection.php';
$current_page = basename($_SERVER['PHP_SELF']);
// Fetch all rescue requests from the database
$sql = "SELECT * FROM rescue_requests";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Rescue Requests</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
    <header>
        <h1>View Rescue Requests</h1>
        <?php include '../components/admin_navbar.php'; ?>
    </header>

    <section>
        <h2>Rescue Requests</h2>
        <table>
            <tr>
      
                <th>Informant Name</th>
                <th>Location</th>
                <th>Description</th>
                <th>Pet Type</th>
                <th>Image</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
           
                    echo "<td>" . $row['informant_name'] . "</td>";
                    echo "<td>" . $row['location'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['pet_type'] . "</td>";
                    echo "<td><img src='../images/" . $row['image'] . "' alt='Image' width='100'></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No rescue requests found</td></tr>";
            }
            ?>
        </table>
    </section>

    <footer>
    <?php 
    include '../components/footer.php';?>
    </footer>
</body>
</html>
