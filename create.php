<?php
session_start();
include('configure.php');
include('global.php');

$message = isset($_SESSION['message']) ? $_SESSION['message'] : "";

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $title = $_POST['title'];
    $created = $_POST['created'];
    $sql = "INSERT INTO `contacts`(`name`, `email`, `phone`, `title`, `created`) VALUES ('$name', '$email','$phone', '$title', '$created')";

    $result = $conn->query($sql);
    errorCheck($sql, $conn, $result);
    if ($result == TRUE) {
        $_SESSION['message'] = "New record created successfully.";
        header("Location: read.php");
        exit();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>lab9-10</title>
</head>
<style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: #83BCA9;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            margin: 0;
            color: #ffd30d;
        }

        .nav-right-side {
            display: flex;
            gap: 15px;
        }

        .nav-right-side button {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
        }

        .main {
            padding: 20px;
        }

        .main-container {
            max-width: 1000px;
            margin: auto;
        }

        h2 {
            color: #333;
            text-align: left;
        }

        .btn-createContact {
            text-align: left;
            margin-bottom: 20px;
        }

        .btn-createContact button {
            background-color: #ffd30d;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #383938;
            color: white;
        }

        .btn {
            display: flex;
            justify-content: space-around;
        }

        .btn a {
            text-decoration: none;
        }

        .btn button {
            background: none;
            border: none;
            cursor: pointer;
        }

        .btn-edit img, .btn-delete img {
            width: 20px;
            height: 20px;
        }

        .btn-edit button {
            color: #2196F3;
        }

        .btn-delete button {
            color: #f44336;
        }
        .icon {
    width: 30px; 
    height: 30px; 
    margin-right: 8px; 
    vertical-align: middle;
}
.contact{
    width: 30px; 
    height: 30px; 
    margin-right: 8px; 
    vertical-align: middle;
}
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: #cbf3f0;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            margin: 0;
            color: #fff;
        }

        .nav-right-side {
            display: flex;
            gap: 15px;
        }

        .nav-right-side button {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
        }

        .main {
            padding: 20px;
        }

        .main-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 20px;
            max-width: 800px;
            margin: auto;
        }

        h2 {
            color: #333;
            grid-column: span 2;
            text-align: center;
        }

        .create-contact {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 10px;
        }

        .create-contact div {
            margin-bottom: 15px;
        }

        .create-contact p {
            margin: 0;
            color: #333;
        }

        .create-contact input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .btn-createContact {
            text-align: center;
            margin-top: 20px;
        }

        .btn-createContact button {
            background-color: #bee9e8;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
<body>

    <div class="navbar">
        <h1>LAB ACTIVITY</h1>
        <div class="nav-right-side">
            <a style="text-decoration: none;" href="read.php">
                <button><img src="social.png" class="icon">HOME</button>
            </a>
            <button><img src="call.png" class="contact">CONTACT</button>
        </div>
    </div>
    <div class="main">
        <div class="main-container">
            <form action="" method="post">
                <h2>Create Contact</h2>
                <div class="create-contact">
                    <div>
                        <p>ID</p>
                        <input type="text" disabled placeholder="auto">
                    </div>
                    <div>
                        <p>NAME</p>
                        <input type="text" name="name" required>
                    </div>
                    <div>
                        <p>EMAIL</p>
                        <input type="email" name="email" required>
                    </div>
                    <div>
                        <p>PHONE</p>
                        <input type="number" name="phone" required>
                    </div>
                    <div>
                        <p>TITLE</p>
                        <input type="text" name="title" required>
                    </div>
                    <div>
                        <p>CREATED</p>
                        <input type="date" name="created" required>
                    </div>
                </div>
                <div class="btn-createContact">
                    <button>Create Contact</button>
                    
                </div>
            </form>
        </div>
    </div>

</body>

</html>