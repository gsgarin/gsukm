<?php
session_start();

if (!empty($_SESSION['username'])) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/custom-style.css">
</head>
<body>
<?php 
if (!empty($_GET['error'])) {
    if ($_GET['error'] == 1) {
        echo "<script language='javascript'>

                alert('Kombinasi username dan password salah.');

                top.location='login.php';

                </script>";
    } else if ($_GET['error'] == 2) {
        echo "<script language='javascript'>

                alert('Anda Belum Terdaftar');

                top.location='login.php';

                </script>";
    }
}
?>
<div class="col-md-12">
    <div class="modal-dialog" style="margin-bottom:0">
        <div class="modal-content">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="otentikasi.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-sm btn-success" value="Login">
                            </fieldset>
                        </form>
                    </div>
                </div>
    </div>
</div>
<hr>

</div>
<script type="text/javascript" src="assets/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>
