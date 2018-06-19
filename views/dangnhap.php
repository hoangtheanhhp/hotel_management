<?php
if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $c_user = new C_user();
    $user = $c_user->luu_dang_nhap($email,$password);
}
?>
<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
<html>
<head>
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/login.css"/>
</head>
<body>


<div class="container">
    <div class="card card-container">
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png"/>
        <p id="profile-name" class="profile-name-card">Đăng nhập Summer System</p>
        <br>
        <div class="result">
            <?php
            if (isset($_SESSION['user_error'])){
                echo "<div class='alert alert-danger'>".$_SESSION['user_error']."</div>";
            } ?>
        </div>
        <form class="form-signin" data-toggle="validator" action="dangnhap.php" method="post">
            <div class="row">
                <div class="form-group col-lg-12">
                    <label></label>
                    <input type="text" name="email" class="form-control" placeholder="Email" required
                           data-error="Nhập email">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-lg-12">
                    <label></label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required
                           data-error="Nhập password">
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login">Login</button>

        </form><!-- /form -->
    </div><!-- /card-container -->
</div><!-- /container -->

<script src="public/js/jquery-1.11.1.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/validator.min.js"></script>
</body>
</html>