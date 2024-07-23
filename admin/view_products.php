<?php
include '../db_connection.php';
$current_page = basename($_SERVER['PHP_SELF']);
// Fetch all products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Products</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
    <header>
        <h1>View Products</h1>
        <?php include '../components/admin_navbar.php'; ?>
    </header>

    <section>
        <h2>Products</h2>
        <form action="add_product.php">
        <button type="submit">Add New Product</button>
    </form>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td><img src='../images/" . $row['image'] . "' alt='Product Image' width='100'></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No products found</td></tr>";
            }
            ?>
        </table>
    </section>

    <footer>
    <?php include '../components/footer.php'; ?>
    </footer>
</body>
</html>
