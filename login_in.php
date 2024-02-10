<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Login</title>
</head>
<body>
    <?php require_once 'menu.php';
    if(isset($_SESSION["text"])){
        echo "<p class='cart_inp'>" .$_SESSION["text"]."</font></p>";
        $_SESSION["text"] = null;
    }
    ?>
    <form class="login-form" action="login_pdo.php" method="post">
        <p class="login-text">
            <span class="fa-stack fa-lg">
            <i class="fa fa-circle fa-stack-2x"></i>
            <i class="fa fa-lock fa-stack-1x"></i>
            </span>
        </p>
        <input type="text" class="login-username" autofocus="true" required="true" placeholder="userId" name="login"/>
        <input type="password" class="login-password" required="true" placeholder="Password" name="password"/>
        <div class="kyou">
            <input type="submit" value="Login" class="login-submit">
            <a href="customer_in.php" class="entry">新規登録</a>
        </div>
        <a href="inquiry.php" class="tell">お問合せはこちら</a>
        
    </form>
    <a href="#" class="login-forgot-pass">forgot password?</a>
    <div class="underlay-photo"></div>
    <div class="underlay-black"></div>
</body>
</html>