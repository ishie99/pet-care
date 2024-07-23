<?php
include '../db_connection.php';
$current_page = basename($_SERVER['PHP_SELF']);
// Fetch all orders from the database
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Orders</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
    <header>
        <h1>View Orders</h1>
        <?php include '../components/admin_navbar.php'; ?>
    </header>

    <section>
        <h2>Orders</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Product ID</th>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Quantity</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['product_id'] . "</td>";
                    echo "<td>" . $row['customer_name'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['quantity'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No orders found</td></tr>";
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
