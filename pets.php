<?php
include 'db_connection.php';
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pets for Adoption</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <h1>Pets for Adoption</h1>
        <?php 
    include 'components/adopter_navbar.php';?>
    </header>

    <section>
        <h2>Available Pets</h2>
        <div class="pet-list">
            <?php
            $sql = "SELECT * FROM pets";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='pet-item'>";
                    echo "<img src='images/" . $row['image'] . "' alt='" . $row['name'] . "'>";
                    echo "<h3>" . $row['name'] . "</h3>";
                    echo "<p>Type: " . $row['type'] . "</p>";
                    echo "<p>Age: " . $row['age'] . "</p>";
                    echo "<p>" . $row['description'] . "</p>";
                    echo "<a href='adoption_request.php?pet_id=" . $row['id'] . "'>Adopt Me</a>";
                    echo "</div>";
                }
            } else {
                echo "No pets available";
            }
            ?>
        </div>
    </section>

    <footer>
    <?php 
    include 'components/footer.php';?>
    </footer>
</body>
</html>
