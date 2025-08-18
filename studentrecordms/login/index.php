<?php
session_start();
$error = $_SESSION['error'] ?? '';
$success = $_SESSION['success'] ?? '';
unset($_SESSION['error'], $_SESSION['success']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registration</title>
  <link rel="stylesheet" href="login.css" />
</head>

<body>
  <div class="container">

    <?php if ($error): ?>
      <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
      <div class="success"><?php echo $success; ?></div>
    <?php endif; ?>

    <!-- Login Form -->
    <div class="form-box" id="loginForm">
      <h2>Login</h2>
      <form action="login.php" method="post">
        <input type="text" name="login" placeholder="Enter your username or email" required />
        <input type="password" name="password" placeholder="Enter your password" required />
        <div class="options">
          <label><input type="checkbox" name="remember" /> Remember me</label>
          <a href="../Forget_password/forget.php">Forgot password?</a>
        </div>
        <button type="submit">Log In</button>
        <p>Don't have an account? <a href="#" onclick="toggleForm()">Signup</a></p>
      </form>
    </div>

    <!-- Signup Form -->
    <div class="form-box" id="signupForm" style="display: none;">
      <h2>Signup</h2>
      <form action="signup.php" method="post">
        <input type="text" name="username" placeholder="Enter your username" required />
        <input type="email" name="email" placeholder="Enter your email" required />
        <input type="password" name="password" placeholder="Create password" required />
        <input type="password" name="confirm_password" placeholder="Confirm password" required />
        <button type="submit">Signup</button>
        <p>Already have an account? <a href="#" onclick="toggleForm()">Login</a></p>
      </form>
    </div>
  </div>

  <script src="script.js"></script>
  
</body>
</html>