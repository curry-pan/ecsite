<?php require 'menu.php';
unset($_SESSION['product'][$_REQUEST['id']]);
echo '<p class="cart_inp">カート内の商品を削除しました。</p>';
echo '<hr>';
require 'cart.php';
?>
