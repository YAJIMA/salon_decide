<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>page title</title>
    <script src="<?php echo base_url("lib/jQuery/jquery-3.1.1.min.js"); ?>"></script>
    <script src="<?php echo base_url("lib/bootstrap-3.3.7/js/bootstrap.min.js"); ?>"></script>
    <link href="<?php echo base_url("lib/bootstrap-3.3.7/css/bootstrap.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("lib/bootstrap-3.3.7/css/bootstrap-theme.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("lib/css/signin.css"); ?>" rel="stylesheet">
</head>
<body>
    <div class="container">
    <?php
        if( isset($result) && is_array($result) ){
            echo '<div class="alert alert-danger" role="alert">';
            print_r($result, true);
            echo '</div>';
        } elseif( isset($result) && ! empty($result) ) {
            echo '<div class="alert alert-danger" role="alert">';
            echo $result;
            echo '</div>';
        }
    ?>
        <form method="post" action="login/signin" class="form-signin">
            <h2 class="form-signin-heading">ログイン</h2>
            <label for="username" class="sr-only">ユーザ名</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="User name" required autofocus>
            <label for="password" class="sr-only">パスワード</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">ログイン</button>
        </form>
    </div> <!-- /container -->
</body>
</html>