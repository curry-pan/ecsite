<?php require 'menu.php';
$id=$_REQUEST['id'];
if (!isset($_SESSION['product'])) {
	$_SESSION['product']=[];
}
$count=1;
if (isset($_SESSION['product'][$id])) {
	$count=$_SESSION['product'][$id]['count'];
}
$_SESSION['product'][$id]=[
	'name'=>$_REQUEST['name'],
	'kaisya'=>$_REQUEST['kaisya'],
	'price'=>$_REQUEST['price'],
	'image'=>$_REQUEST['image'],
	'id'=>$_REQUEST['id'],
	'count'=>$count,
];
echo '<p class="cart_inp">カートに商品を追加しました。</p>';
echo '<hr>';
require 'cart.php';
?>