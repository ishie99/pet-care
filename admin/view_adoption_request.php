<?php
include '../db_connection.php';
$current_page = basename($_SERVER['PHP_SELF']);
// Fetch all adoption requests from the database
$sql = "SELECT * FROM adoption_requests where status <> 'accepted' or status is null";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Adoption Requests</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
<header>
        <h1>Adoption Requests</h1>
        <?php include '../components/admin_navbar.php'; ?>
    </header>

    <section>
        <h2>Adoption Requests</h2> <form action="wait_list.php">
        <button type="submit">View Wait List</button>
    </form>
        <table>
            <tr>
                <th>ID</th>
                <th>Pet ID</th>
                <th>Name</th>
                <th>Contact Info</th>
                <th>Address</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['pet_id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['contact_info'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td><a href='accept_adoption.php?id=" . $row['id'] . "'>Accept</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No adoption requests found</td></tr>";
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
