<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../admin/admin_login.php");
    exit();
}
include '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $age = $_POST['age'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $target = "../images/".basename($image);

    $sql = "INSERT INTO pets (name, type, age, description, image) VALUES ('$name', '$type', '$age', '$description', '$image')";
    if ($conn->query($sql) === TRUE) {
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        echo "New pet added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Pet</title>
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
        <h1>Register New Pet</h1>
        <?php include '../components/admin_navbar.php'; ?>
    </header>
    <section>
    <form method="POST" action="" enctype="multipart/form-data">
        Pet Name: <input type="text" name="name"><br>
        Type: <input type="text" name="type"><br>
        Age: <input type="number" name="age"><br>
        Description: <textarea name="description"></textarea><br>
        Image: <input type="file" name="image"><br>
        <button type="submit">Add Pet</button>
    </form></section>
    <footer>
    <?php 
   include '../components/footer.php';?>
    </footer>
</body>
</html>
