<?php
session_start();
require '../includes/dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Password match check
    if ($password !== $confirm_password) {
        $_SESSION['error'] = "❌ Passwords do not match.";
        header("Location: index.php");
        exit;
    }

    // Check if email already exists
    $stmt = $con->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['error'] = "⚠️ Email already exists.";
        header("Location: index.php");
        exit;
    }

    // Hash the password and insert the user
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $con->prepare("INSERT INTO users (email, username, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $username, $hashed_password);

    if ($stmt->execute()) {
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        header("Location: ../dashboard.php"); // Redirect only on success
        exit;
    } else {
        $_SESSION['error'] = "❌ Something went wrong. Please try again.";
        header("Location: index.php"); // Redirect back to form on failure
        exit;
    }
}
?>
