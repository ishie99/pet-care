<?php
include 'db_connection.php';
$current_page = basename($_SERVER['PHP_SELF']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $informant_name = $_POST['informant_name'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $pet_type = $_POST['pet_type'];
    $image = $_FILES['image']['name'];
    $target = "images/" . basename($image);

    $sql = "INSERT INTO rescue_requests (informant_name, location, description, pet_type, image) VALUES ('$informant_name', '$location', '$description', '$pet_type', '$image')";

    if ($conn->query($sql) === TRUE) {
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        echo '<div class="success-message">Rescue request submitted successfully</div>';
    } else {
        echo '<div class="error-message">Error: ' . $sql . '<br>' . $conn->error . '</div>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rescue Request</title>
    <link rel="stylesheet" href="styles.css">
    <style>
     
        section {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form {
            display: grid;
            gap: 10px;
        }
        form input[type="text"],
        form textarea,
        form input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        form button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        form button:hover {
            background-color: #45a049;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
        }
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
        }
      
    </style>
</head>
<body>
    <header>
        <h1>Rescue Request</h1>
        <?php 
    include 'components/adopter_navbar.php';?>
    </header>

    <section>
    <h3>Rescue Form</h3> 
        <form method="POST" action="" enctype="multipart/form-data">
            <label for="informant_name">Informant Name:</label>
            <input type="text" id="informant_name" name="informant_name" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <label for="pet_type">Pet Type:</label>
            <input type="text" id="pet_type" name="pet_type" required>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <button type="submit">Submit</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($conn->query($sql) === TRUE) {
                echo '<div class="success-message">Rescue request submitted successfully</div>';
            } else {
                echo '<div class="error-message">Error: ' . $sql . '<br>' . $conn->error . '</div>';
            }
        }
        ?>
    </section>

    <footer>
<?php 
    include 'components/footer.php';?>
</footer> 
</body>
</html>
