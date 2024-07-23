<?php
include 'db_connection.php';
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pet Care Store</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <h1>Pet Care Store</h1>
        <?php 
    include 'components/adopter_navbar.php';?>
    </header>

    <section>
        <h2>Products</h2>
        <div class="product-list">
            <?php
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='product-item'>";
                    echo "<img src='images/" . $row['image'] . "' alt='" . $row['name'] . "'>";
                    echo "<h3>" . $row['name'] . "</h3>";
                    echo "<p>Price: $" . $row['price'] . "</p>";
                    echo "<p>" . $row['description'] . "</p>";
                    echo "<a href='order.php?product_id=" . $row['id'] . "'>Order Now</a>";
                    echo "</div>";
                }
            } else {
                echo "No products available";
            }
?> </section>
<footer>
<?php 
    include 'components/footer.php';?>
</footer> </body>
</html>