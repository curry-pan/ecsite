<?php
// メインのフォーム処理
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_info"])) {
    session_start();
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["name"] = $_POST["name"];
    $_SESSION["val"] = $_POST["val"];
    header("Location: confirm2.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/inquiry.css">
    <title>お問合せフォーム</title>
</head>
<body>
<?php require_once 'menu.php'; ?>
<!-- メールアドレスと名前の入力フォーム -->
<div id="contact-container">
    <form method="post">
        <div class="form-group">
            <label for="name">名前<span class="required">必須</span></label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">メールアドレス<span class="required">必須</span></label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="val">お問合せ内容<span class="required">必須</span></label>
            <textarea id="val" name="val" required></textarea>
        </div>
        <input type="submit" name="submit_info" id="submit-btn" value="確認">
    </form>
</div>
</body>
</html>