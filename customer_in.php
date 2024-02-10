<?php
unset($_SESSION['customer']);
$name=$address=$login=$password='';
if (isset($_SESSION['customer'])) {
    $name=$_SESSION['customer']['name'];
    $address=$_SESSION['customer']['address'];
    $login=$_SESSION['customer']['login'];
    $password=$_SESSION['customer']['password'];
}
?>
<?php require 'menu.php';?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規会員登録</title>
    <link rel="stylesheet" href="css/customer.css">
</head>
<body>
    <main>
    <div class="container">
        <?php
            if(isset($_SESSION["text"])){
                echo "<p><font color=#F00>" .$_SESSION["text"]."</font></p>";
                $_SESSION["text"] = null;
            }
        ?>
        <form action="customer_out.php" method="post">
            <div class="form-group">
                <label for="login">ログインID<span class="required">（必須）</span></label>
                <input type="text" id="login" name="login" required>
            </div>

            <div class="form-group">
                <label for="pass">パスワード【半角英数6～32文字】<span class="required">（必須）</span></label>
                <input type="password" id="pass" name="pass" pattern="[a-zA-Z0-9]{6,32}" title="半角英数6～32文字" required>
            </div>

            <div class="form-group">
                <label for="pass2">パスワード再入力【半角英数6～32文字】<span class="required">（必須）</span></label>
                <input type="password" id="pass2" name="pass2" pattern="[a-zA-Z0-9]{6,32}" title="半角英数6～32文字" required>
            </div>

            <div class="form-group">
                <label for="lname">姓<span class="required">（必須）</span></label>
                <input type="text" id="lname" name="lname" required>
            </div>

            <div class="form-group">
                <label for="fname">名<span class="required">（必須）</span></label>
                <input type="text" id="fname" name="fname" required>
            </div>

            <div class="form-group">
                <label for="add">住所<span class="required">（必須）</span></label>
                <input type="text" id="add" name="add" required>
            </div>

            <button type="submit">確認する</button>
        </form>
    </div>
    </main>
</body>

</html>
