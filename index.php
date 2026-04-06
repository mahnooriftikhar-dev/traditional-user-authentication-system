<?php
session_start();

// Store errors
$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];

// Active form
$activeform = $_SESSION['active_form'] ?? 'login';

// Clear errors after use
unset($_SESSION['login_error'], $_SESSION['register_error']);

// Functions
function showerror($error)
{
    return !empty($error) ? "<p class='error-message'>$error</p>" : "";
}

function isActiveForm($formname, $activeform)
{
    return $formname === $activeform ? 'form_box form_box_active' : 'form_box form_box_none';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traditional User Authentication System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h3>Traditional User Authentication System (Practice Project by Mahnoor Iftikhar)</h3>

    <div class="container">

        <!-- Login Form -->
        <div class="<?= isActiveForm('login', $activeform); ?>" id="login_form">
            <form action="login_register.php" method="POST">
                <h2>Login</h2>
                <?= showerror($errors['login']); ?>

                <label>Email</label>
                <input type="email" name="email" placeholder="Enter Your Email" required>

                <label>Password</label>
                <input type="password" name="password" placeholder="Enter Password" required>

                <button name="login">Login</button>

                <h4>
                    Don't have an account?
                    <a href="#" onclick="showform('registration_form')">Register Here</a>
                </h4>
            </form>
        </div>

        <!-- Registration Form -->
        <div class="<?= isActiveForm('register', $activeform); ?>" id="registration_form">
            <form action="login_register.php" method="POST">
                <h2>Register</h2>
                <?= showerror($errors['register']); ?>

                <label>Name</label>
                <input type="text" name="name" placeholder="Enter Your Name" required>

                <label>Email</label>
                <input type="email" name="email" placeholder="Enter Your Email" required>

                <label>Password</label>
                <input type="password" name="password" placeholder="Enter Password" required>

                <label>Role</label>
                <select name="role" required>
                    <option value="">Select Your Role</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>

                <button name="register">Register</button>

                <h4>
                    Already have an account?
                    <a href="#" onclick="showform('login_form')">Login Here</a>
                </h4>
            </form>
        </div>

    </div>

    <script src="script.js"></script>
</body>

</html>