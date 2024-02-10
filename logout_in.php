<?php session_start();
    unset($_SESSION['customer']);
    $_SESSION["text"] = "ログアウトしました";
    header("Location: login_in.php");
    exit;
?>