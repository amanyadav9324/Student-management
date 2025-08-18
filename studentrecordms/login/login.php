<?php
session_start();
require '../includes/dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = trim($_POST['login']);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    $stmt = $con->prepare("SELECT email, username, password FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $login, $login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $users = $result->fetch_assoc();

        if (password_verify($password, $users['password'])) {
            $_SESSION['username'] = $users['username'];
            $_SESSION['email'] = $users['email'];

            if ($remember) {
                setcookie("remember_users", $login, time() + (86400 * 30), "/");
            }

            header("Location: ../dashboard.php"); // Only redirect on success
            exit;
        } else {
            $_SESSION['error'] = "❌ Incorrect password.";
            header("Location: index.php"); // Redirect back to login
            exit;
        }
    } else {
        $_SESSION['error'] = "❌ users not found.";
        header("Location: index.php"); // Redirect back to login
        exit;
    }
}
?>
