<?php require 'menu.php';
$pdo=new PDO('mysql:host=localhost;dbname=ec;charset=utf8','root','');
if (isset($_SESSION['customer'])) {
    $id=$_SESSION['customer']['id'];
    $sql=$pdo->prepare('select * from customer where id!=? and login=?');
    $sql->execute([$id, $_REQUEST['login']]);
} else {
    $sql=$pdo->prepare('select * from customer where login=?');
    $sql->execute([$_REQUEST['login']]);
}
if (empty($sql->fetchAll())) {
    $name = $_REQUEST["lname"]." ".$_REQUEST["fname"];
    if(strcmp($_REQUEST["pass"],$_REQUEST["pass2"]) != 0){
        $_SESSION["text"] = "パスワードが一致しません";
        header("Location: customer_in.php");
        exit;
    }
    if (isset($_SESSION['customer'])) {
        $sql=$pdo->prepare('update customer set name=?, address=?, ' . 'login=?, password=? where id=?');
        $sql->execute([
            $name, $_REQUEST['add'], 
            $_REQUEST['login'], $_REQUEST['pass'], $id]);
        $_SESSION['customer']=[
            'id'=>$id, 'name'=>$name, 
            'address'=>$_REQUEST['add'], 'login'=>$_REQUEST['login'], 
            'password'=>$_REQUEST['pass']];
        $_SESSION["text"] = "お客様情報を更新しました";
        header("Location: login_in.php");
        exit;
    } else {
        $sql=$pdo->prepare('insert into customer values(null,?,?,?,?)');
        $sql->execute([
            $name, $_REQUEST['add'], 
            $_REQUEST['login'], $_REQUEST['pass']]);
            $_SESSION["text"] = "お客様情報を登録しました";
            header("Location: login_in.php");
            exit;
        }
} else {
    $_SESSION["text"] = "ログイン名がすでに使用されています";
    header("Location: customer_in.php");
    exit;
}
?>