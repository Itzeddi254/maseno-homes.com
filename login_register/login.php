<?php

session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];
$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error) {
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm) {
    return $formName === $activeForm ? 'active' : '';
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>login form</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>

        <div class="container">
            <div class="form-box <?= isActiveForm('login', $activeForm); ?>" id="login-form">
                <form action="login_register.php" method="post">
                    <h2>Login</h2>
                    <?= showError($errors['login']); ?>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="Password" name="Password" placeholder="Password" required>
                    <button class="submit" name="login">Login</button>
                    <p>Dont have an account? <a href="#" onclick="showform('register-form')">Register</a></p>
                </form>
            </div>

            <div class="form-box<?= isActiveForm('register', $activeForm); ?>" id="register-form">
                <form action="login_register.php" method="post">
                    <h2>Register</h2>
                    <?= showError($errors['register']); ?>
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="Password" name="Password" placeholder="Password" required>
                    <select name="role" required>
                        <option value="">--Select role--</option>
                        <option value="">User</option>
                        <option value="">Admin</option>
                    </select>
                    <button type="submit" name="register">Register</button>
                    <p>Already have an account <a href="#" onclick="showform('login-form')">Login</a></p>
                </form>
            </div>
        </div>
        <script src="script.js"></script>
    </body>
</html>