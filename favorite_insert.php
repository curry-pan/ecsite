<?php require 'menu.php';
if (isset($_SESSION['customer'])) {
	$pdo=new PDO('mysql:host=localhost;dbname=ec;charset=utf8', 
		'root', '');
	$sql=$pdo->prepare('insert into favorite values(?,?)');
	$sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);
} else {
	if(isset($_SESSION["favo"])){
		$_SESSION["favo"]["id"] += array($_REQUEST["id"] => $_REQUEST["id"]);
	}else{
		$_SESSION["favo"] = ["id" => [$_REQUEST["id"] => $_REQUEST["id"]]];
	}
}
echo '<p class="cart_inp">お気に入りに商品を追加しました。</p>';
require 'favorite.php';
?>