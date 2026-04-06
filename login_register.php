<?php
session_start();
require_once('config.php');

// REGISTER
if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $checkEmail = $conn->query("SELECT email FROM users WHERE email='$email'");

    if($checkEmail->num_rows > 0){
        $_SESSION['register_error'] = "Email already exists!";
        $_SESSION['active_form'] = "register";
    } else {
        $conn->query("INSERT INTO users(name, email, password, role) VALUES('$name','$email','$password','$role')");
        
        $_SESSION['login_error'] = "Registration successful! Please login.";
        $_SESSION['active_form'] = "login";
    }

    header("Location:index.php");
    exit();
}

// LOGIN
if(isset($_POST['login'])){
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();

        if(password_verify($password, $user['password'])){
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            if($user['role'] === 'admin'){
                header("Location:admin_page.php");
            } else {
                header("Location:user_page.php");
            }
            exit();
        } else {
            $_SESSION['login_error'] = "Incorrect Password";
        }
    } else {
        $_SESSION['login_error'] = "Email not found";
    }

    $_SESSION['active_form'] = "login";
    header("Location:index.php");
    exit();
}
?>