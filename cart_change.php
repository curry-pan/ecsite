<?php require 'menu.php';
$id=$_REQUEST['id'];
if (!isset($_SESSION['product'])) {
	$_SESSION['product']=[];
}
$_SESSION['product'][$id]=[
	'id'=>$_SESSION['product'][$id]['id'], 
	'name'=>$_SESSION['product'][$id]['name'], 
	'price'=>$_SESSION['product'][$id]["price"], 
	'image'=>$_SESSION['product'][$id]["image"], 
	'kaisya'=>$_SESSION['product'][$id]["kaisya"], 
	'count'=>$_REQUEST['count']
];
echo '<p class="cart_inp">商品の数量を変更しました。</p>';
echo '<hr>';
require 'cart.php';
?>
