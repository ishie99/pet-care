<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin/admin_login.php");
    exit();
}
include '../db_connection.php';

$current_page = basename($_SERVER['PHP_SELF']);

$sql = "SELECT * FROM pets";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>
<body>
    <header>
        <h1> Welcome, <?php echo $_SESSION['admin']; ?></h1>
        <?php include '../components/admin_navbar.php'; ?>
    </header>

    <section>
        <h2>Available Pets</h2>
        <form action="add_pet.php">
            <button type="submit">Register Pet</button>
        </form>
        <div class="pet-list">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='pet-item'>";
                    echo "<img src='../images/" . $row['image'] . "' alt='" . $row['name'] . "'>";
                    echo "<h3>" . $row['name'] . "</h3>";
                    echo "<p>" . $row['description'] . "</p>";
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
    include '../components/footer.php';?>
    </footer>
</body>
</html>
