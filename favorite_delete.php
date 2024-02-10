<?php require 'menu.php';
if (isset($_SESSION['customer'])) {
	$pdo=new PDO('mysql:host=localhost;dbname=ec;charset=utf8', 
		'root', '');
	$sql=$pdo->prepare(
		'delete from favorite where customer_id=? and product_id=?');
	$sql->execute([$_SESSION['customer']['id'], $_REQUEST['id']]);
	echo '<p class="cart_inp">お気に入りから商品を削除しました。</p>';
} else {	
	if(isset($_SESSION["favo"])){
		unset($_SESSION["favo"]["id"][$_REQUEST['id']]);
	}
}
echo '<p class="cart_inp">お気に入りから商品を削除しました。</p>';
require 'favorite.php';
?>
