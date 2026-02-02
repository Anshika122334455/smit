<?php
session_start();
include 'includes/db.php';

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $q = mysqli_query($conn, "SELECT * FROM admins WHERE username='$user' AND password='$pass'");
    if (mysqli_num_rows($q) == 1) {
        $_SESSION['admin'] = $user;
        header("Location: dashboard.php");
    } else {
        $error = "Invalid login details";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>

<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    padding: 0;
    font-family: "Segoe UI", sans-serif;
    background: #f4f6f9;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.login-wrapper {
    width: 100%;
    max-width: 380px;
    padding: 15px;
}

.login-card {
    background: #fff;
    padding: 28px;
    border-radius: 8px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

.login-card h3 {
    text-align: center;
    margin-bottom: 20px;
    color: #111827;
}

.form-control {
    width: 100%;
    padding: 11px 12px;
    margin-bottom: 14px;
    font-size: 14px;
    border-radius: 6px;
    border: 1px solid #d1d5db;
    outline: none;
}

.form-control:focus {
    border-color: #2563eb;
}

.btn {
    width: 100%;
    padding: 11px;
    background: #2563eb;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 15px;
    cursor: pointer;
}

.btn:hover {
    background: #1e40af;
}

.error {
    margin-top: 12px;
    text-align: center;
    color: #b91c1c;
    font-size: 14px;
}

@media (max-width: 480px) {
    .login-card {
        padding: 22px;
    }

    .login-card h3 {
        font-size: 20px;
    }
}
</style>

</head>
<body>

<div class="login-wrapper">
    <div class="login-card">
        <h3>Admin Login</h3>

        <form method="post">
            <input type="text" name="username" class="form-control" placeholder="Username" required>
            <input type="password" name="password" class="form-control" placeholder="Password" required>

            <button name="login" class="btn">Login</button>

            <?php 
            if(isset($error)) {
                echo "<div class='error'>$error</div>";
            }
            ?>
        </form>
    </div>
</div>

</body>
</html>
