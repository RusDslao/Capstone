<?php
session_start();
require 'database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password, role FROM tbl_accounts WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $username, $stored_password, $role);
    $stmt->fetch();

    if ($stmt->num_rows == 1) {
        // Check if the stored password is hashed
        if (password_verify($password, $stored_password)) {
            // Password is hashed and verified
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            header("Location: src/pages/$role.php");
            exit();
        } elseif ($password === $stored_password) {
            // Password is not hashed but matches the stored password (plain text case)
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            header("Location: src/pages/$role.php");
            exit();
        } else {
            // Incorrect password
            $error = "Invalid email or password";
        }
    } else {
        // No user found with the given email
        $error = "Invalid email or password";
    }

    $stmt->close();
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>body {
    background-color: #f8f9fa;
    font-family: Arial, sans-serif;
}

.container {
    max-width: 400px;
    margin-top: 50px;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #343a40;
}

.form-label {
    font-weight: bold;
}

.btn-primary {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    font-size: 16px;
}

.alert {
    text-align: center;
}

.footer {
    text-align: center;
    margin-top: 20px;
}

.footer a {
    color: #007bff;
    text-decoration: none;
}

.footer a:hover {
    text-decoration: underline;
}
</style></head>
<body>
<div class="container">
    <h2>Login</h2>
    <?php if (isset($error)) { echo '<div class="alert alert-danger">' . $error . '</div>'; } ?>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <div class="footer">
        <p>Forget Account? <a href="Reset.php">Inquire here</a></p>
    </div>
</div>
</body>
</html>
