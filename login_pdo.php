<?php
require 'menu.php';
unset($_SESSION['customer']);
try {
    $pdo = new PDO('mysql:host=localhost;dbname=ec;charset=utf8', 'root', '');

    $login = $_REQUEST['login'];
    $password = $_REQUEST['password'];
    
    $params = [
        ':login' => $login,
        ':password' => $password
    ];
    $sql = $pdo->prepare('SELECT * FROM customer WHERE login = :login AND password = :password');
    $sql->execute($params);
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    
    if ($row) {
        $_SESSION['customer'] = [
            'id' => $row['id'],
            'name' => $row['name'],
            'address' => $row['address'],
            'login' => $row['login'],
            'password' => $row['password']
        ];
        $_SESSION["text"] = 'いらっしゃいませ、'. $_SESSION['customer']['name']. 'さん';
        header('Location: product.php');
        exit;
    } else {
        $_SESSION["text"] = "ログインIDかパスワードが違います";
        header("Location: login_in.php");
        exit;
    }
} catch (PDOException $e) {
    header("Location: login_in.php");
    exit;
}
?>