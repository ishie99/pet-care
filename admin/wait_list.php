<?php
include '../db_connection.php';

$sql = "SELECT * FROM adoption_requests WHERE status = 'accepted'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Wait List</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
    <header>
        <h1>Wait List</h1>
        <?php include '../components/admin_navbar.php'; ?>
    </header>

    <section>
        <h2>Wait List</h2>
        <a href="view_adoption_request.php">Back to Adoption Requests</a>
        <table id="waitlist-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pet ID</th>
                    <th>Name</th>
                    <th>Contact Info</th>
                    <th>Address</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr class='table-row' data-id='" . $row['id'] . "' onclick=\"window.location='view_waitlist_details.php?id=" . $row['id'] . "'\">";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['pet_id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['contact_info'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No adoption requests found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>

    <footer>
        <?php include '../components/footer.php'; ?>
    </footer>
</body>
</html>
