<?php
// メインのフォーム処理
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_info"])) {
    session_start();
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["name"] = $_POST["name"];
    header("Location: confirmation.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>メール確認フォーム</title>
</head>
<body>
    <!-- メールアドレスと名前の入力フォーム -->
    <h1>メールアドレスと名前を入力してください</h1>
    <form method="post">
        <label for="email">メールアドレス:</label>
        <input type="text" name="email" id="email" required>
        <br>
        <label for="name">名前:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <input type="submit" name="submit_info" value="確認">
    </form>
</body>
</html>
