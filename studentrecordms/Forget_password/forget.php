<?php
require '../login/db.php';

session_start();
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

$msg = '';
$showOtpForm = false;
$showResetForm = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action === 'send_otp') {
        $email = $_POST['email'];
        $otp = rand(100000, 999999);
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $email;
        $showOtpForm = true;

        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'YOUR EMAIL ID';
            $mail->Password = 'YOUR PASSWORD';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('YOUR EMAIL ID', 'HACKER 💀');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Your OTP Code';
            $mail->Body    = "<h2>Your OTP is: <strong>$otp</strong>. It is valid for 10 minutes
            and can be used only once for verification purposes.⚠️ Do not share this code with
            anyone, including support staff. If you did not request this code, please ignore this
            message or contact our support team immediately. - YOUR EMAIL NAME@gmail.com </h2>";

            $mail->send();
            $msg = "OTP sent to $email";
        } catch (Exception $e) {
            $msg = "Mailer Error: " . $mail->ErrorInfo;
        }

    } elseif ($action === 'verify_otp') {
        $entered_otp = $_POST['otp'];
        if ($_SESSION['otp'] == $entered_otp) {
            $msg = "✅ OTP Verified! You can reset your password.";
            $showResetForm = true;
        } else {
            $msg = "❌ Invalid OTP!";
            $showOtpForm = true;
        }

    } elseif ($action === 'reset_password') {
        $newPassword = $_POST['new_password'];
        $email = $_SESSION['email'] ?? '';

        if (!empty($email) && !empty($newPassword)) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("UPDATE student_data SET password = ? WHERE email = ?");
            $stmt->bind_param("ss", $hashedPassword, $email);

            if ($stmt->execute()) {
                unset($_SESSION['otp']);
                unset($_SESSION['email']);
                $_SESSION['success'] = "✅ Password reset successful!";
                header("Location: ../login/login.php");
                exit();
            } else {
                $msg = "❌ Failed to update password. Please try again.";
                $showResetForm = true;
            }
        } else {
            $msg = "❌ Missing email or password.";
            $showResetForm = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>OTP verify</title>
  <link rel="stylesheet" href="forget.css">
</head>
<body>

  <div class="container">
    <h2>Login via OTP</h2>

    <?php if ($msg): ?>
      <div class="msg"><?= $msg ?></div>
    <?php endif; ?>

    <?php if (!$showOtpForm && !$showResetForm): ?>
    <form method="POST">
      <input type="hidden" name="action" value="send_otp">
      <input type="email" name="email" required placeholder="Enter your email">
      <button type="submit">Send OTP</button>
    </form>
    <?php endif; ?>

    <?php if ($showOtpForm): ?>
    <hr style="margin: 20px 0;">
    <form method="POST">
      <input type="hidden" name="action" value="verify_otp">
      <input type="text" pattern="\d{6}" maxlength="6" name="otp" required placeholder="Enter OTP">
      <button type="submit">Verify OTP</button>
    </form>
    <?php endif; ?>

    <?php if ($showResetForm): ?>
    <hr style="margin: 20px 0;">
    <form method="POST">
      <input type="hidden" name="action" value="reset_password">
      <input type="password" name="new_password" required placeholder="Enter New Password">
      <button type="submit">Reset Password</button>
    </form>
    <?php endif; ?>
  </div>

</body>
</html>
