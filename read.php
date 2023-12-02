<?php
session_start();
include('configure.php');
include('global.php');

$message = isset($_SESSION['message']) ? $_SESSION['message'] : "";

$sql = "SELECT * FROM contacts";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>lab9-10</title>
    <style>
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
            background-color: #bee9e8;
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
    width: 30px; /* Adjust the width as needed */
    height: 30px; /* Adjust the height as needed */
    margin-right: 8px; /* Optional: Add some space to the right of the icon */
    vertical-align: middle;
}
.contact{
    width: 30px; /* Adjust the width as needed */
    height: 30px; /* Adjust the height as needed */
    margin-right: 8px; /* Optional: Add some space to the right of the icon */
    vertical-align: middle;
}
    </style>
</head>

<body>

    <div class="navbar">
        <h1>LAB ACTIVITY</h1>
        <div class="nav-right-side">
            <a style="text-decoration: none;" href="read.php">
                <button><img src="social.png" alt="home icon" class="icon">HOME</button>
            </a>
            <button><img src="call.png" alt="contacts icon" class="contact">CONTACT</button>
        </div>
    </div>
    <div class="main">
        <div class="main-container">
            <h2>Read Contacts</h2>
            <div class="btn-createContact">
                <a href="create.php">
                    <button>Create Contact</button>
                </a>
            </div>
            <table>
                <tr>
                    <th style="width: 40px;">ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE</th>
                    <th>TITLE</th>
                    <th>CREATED</th>
                    <th></th>
                </tr>

                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td>
                                <?php echo $row['id']; ?>
                            </td>
                            <td>
                                <?php echo $row['name']; ?>
                            </td>
                            <td>
                                <?php echo $row['email']; ?>
                            </td>
                            <td>
                                <?php echo $row['phone']; ?>
                            </td>
                            <td>
                                <?php echo $row['title']; ?>
                            </td>
                            <td>
                                <?php echo $row['created']; ?>
                            </td>
                            <td class="btn">
                                <a href="update.php?id=<?= $row['id'] ?>">
                                    <button class="btn-edit"><img src="edit (2).png" alt=""></button>
                                </a>
                                <a href="delete.php?id=<?= $row['id'] ?>">
                                    <button class="btn-delete"><img src="bin.png" alt=""></button>
                                </a>
                            </td>
                        </tr>
                <?php }
                } else {
                    echo '<tr><td colspan="6">No contacts found.</td></tr>';
                }
                ?>

            </table>
        </div>
    </div>

</body>

</html>