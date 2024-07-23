<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pet_id = $_POST['pet_id'];
    $name = $_POST['name'];
    $contact_info = $_POST['contact_info'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    $sql = "INSERT INTO adoption_requests (pet_id, name, contact_info, address, email) VALUES ('$pet_id', '$name', '$contact_info', '$address', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Adoption request submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$pet_id = $_GET['pet_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adoption Request</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
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
    <header>     <h1>Adoption Request</h1>         
    <?php 
    include 'components/adopter_navbar.php';?>
</header>
<section>
<h3>Request Form</h3> 
    <form method="POST" action="">
        <input type="hidden" name="pet_id" value="<?php echo $pet_id; ?>">
        Name: <input type="text" name="name" required><br>
        Contact Number: <input type="text" name="contact_info" required><br>
        Address: <input type="text" name="address" required><br>
        Email: <input type="email" name="email" required><br>
        <button type="submit">Submit</button>
    </form></section>
    <footer>
<?php 
    include 'components/footer.php';?>
</footer> 
</body>
</html>
