<?php
session_start();
include('configure.php');
include('global.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM contacts WHERE id='$id'";
    $result = $conn->query($sql);
   

    

        if ($result == TRUE) {
            $_SESSION['message'] = $name . "'s info updated successfully.";
            header("Location: read.php");
            exit();
        }
   
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

<body>

    <div class="navbar">
        <h1>LAB ACTIVITY</h1>
        <div class="nav-right-side">
        <a style="text-decoration: none;" href="read.php">
                <button><img src="social.png" alt="">HOME</button>
            </a>
            <button><img src="call.png" alt="">CONTACT</button>
        </div>
    </div>
    <div class="main">
        <div class="main-container">
            <h2>Delete Contact</h2>
            <form action="" method="post">
                <div class="btn-createContact">
                  
                
                <button style="background: red;">Delete Contact</button>
            
                  
                   
             
                        
                
                </div>
            </form>
        </div>
    </div>

</body>

</html>