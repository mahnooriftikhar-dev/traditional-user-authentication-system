<?php
session_start();
if(!isset($_SESSION['email'])){
    header("location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="box">
        <h2>Welcome, <span><?=$_SESSION['name'];  ?></span>
        <p>This is an user page</p>
        <button onclick="window.location.href='logout.php'">Logout</button> 
    </div>
</body>
</html>