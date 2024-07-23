<?php
include '../db_connection.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $target = "../images/" . basename($image);

    // Insert product details into the database
    $sql = "INSERT INTO products (name, description, price, image) VALUES ('$name', '$description', '$price', '$image')";

    if ($conn->query($sql) === TRUE) {
        // Move uploaded image to the target directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo "Product added successfully";
        } else {
            echo "Failed to upload image";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" type="text/css" href="../styles.css">
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
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Add Product</h1>
        <?php include '../components/admin_navbar.php'; ?>
    </header>

    <section>
        <h2>New Product</h2>
        <form method="POST" action="add_product.php" enctype="multipart/form-data">
            Name: <input type="text" name="name" required><br>
            Description: <textarea name="description" required></textarea><br>
            Price: <input type="text" name="price" required><br>
            Image: <input type="file" name="image" required><br>
            <button type="submit">Add Product</button>
        </form>
    </section>

    <footer>
    <?php 
    include '../components/footer.php';?>
    </footer>
</body>
</html>
