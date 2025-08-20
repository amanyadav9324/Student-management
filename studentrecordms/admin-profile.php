<?php 
session_start();
// Prevent caching after logout
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: 0");

include('includes/dbconnection.php');

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header('location:logout.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>User Profile</title>

<!-- Bootstrap Core CSS -->
<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- MetisMenu CSS -->
<link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="dist/css/sb-admin-2.css" rel="stylesheet">
<!-- Custom Fonts -->
<link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<script>
    window.history.forward();
    function noBack() { window.history.forward(); }
</script>
</head>
<body onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">
<div id="wrapper">

    <!-- Navigation -->
    <?php include('leftbar.php'); ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="page-header">
                    <?php echo strtoupper("Welcome " . htmlentities($_SESSION['username'])); ?>
                </h4>
            </div>
        </div>
        
        <!-- Profile Info Section -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <?php 
                    $username = $_SESSION['username'];
                    $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
                    $res = mysqli_fetch_array($query);
                    ?>

                    <div class="panel-heading"><b>User Profile</b></div>
                    <div class="panel-body">

            <div class="card shadow-lg border-0 rounded-4 mx-auto" style="max-width: 650px;">
                <div class="card-body text-center p-5">

                    <!-- Profile Picture -->
                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" 
                         class="rounded-circle border border-3 border-primary mb-3" 
                         alt="Profile Picture" width="100" height="100">

                    <!-- Username -->
                    <h3 class="fw-bold mb-0"><?php echo htmlentities($res['username']); ?></h3>
                    <p class="text-muted small">User Profile</p>

                    <!-- Divider -->
                    <hr class="my-4">

                    <!-- Profile Details -->
                    <div class="row text-start px-3">
                        <div class="col-6 mb-3">
                            <p class="text-muted mb-1"><strong>Username</strong></p>
                            <p><?php echo htmlentities($res['username']); ?></p>
                        </div>
                        <div class="col-6 mb-3">
                            <p class="text-muted mb-1"><strong>Email</strong></p>
                            <p><?php echo htmlentities($res['email']); ?></p>
                        </div>
                        
                        <div class="col-6 mb-3">
                            <p class="text-muted mb-1"><strong>Registration Date</strong></p>
                            <p><?php echo date("d M, Y", strtotime($res['created_at'])); ?></p>
                        </div>
                    </div>

                    <!-- Back Button -->
                    <div class="mt-4">
                        <a href="dashboard.php" class="btn btn-primary px-4">
                            <i class="fa fa-arrow-left"></i> Back to Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
                    </div> <!-- Panel Body End -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
<script src="dist/js/sb-admin-2.js"></script>

</body>
</html>
