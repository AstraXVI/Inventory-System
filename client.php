<?php
session_start();

if(isset($_POST['logout'])){
    unset($_SESSION['role']);
    unset($_SESSION['id']);

    header('Location: index.php');
}
// echo  $_SESSION['id'], $_SESSION['role'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Dashboard</title>
</head>
<body>
    <h1>Welcome Client</h1>
    <form action="" method="post">
        <input type="submit" name="logout" value="logout">
    </form>
</body>
</html>