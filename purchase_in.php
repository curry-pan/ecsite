<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/purchase.css">
  <title>購入画面</title>
</head>
<body>
<?php require 'menu.php';?><?php
if (isset($_SESSION['customer'])) {
    if(!empty($_SESSION['product'])){
?>
<main>
  <div class="container">
    <form action="thank.php" method="post">
      <!-- 顧客情報入力 -->
      <div class="form-group">
        <label for="name">お名前</label>
        <input type="text" id="name" name="name" required>
      </div>

      <div class="form-group">
        <label for="email">メールアドレス</label>
        <input type="email" id="email" name="email" required>
      </div>

      <!-- 受け取り場所 -->
      <div class="form-group">
        <label for="address">受け取り場所</label>
        <input type="text" id="address" name="address" required>
      </div>

      <!-- クレジットカード情報 -->
      <div class="form-group">
        <label for="cardNum">クレジットカード番号</label>
        <input type="text" id="cardNum" name="cardNum" required>
      </div>

      <div class="form-group">
        <label for="pass">暗証番号</label>
        <input type="password" id="pass" name="pass" required>
      </div>

      <!-- 商品の確認 -->
      <div class="order-summary">
        <h3>商品の確認</h3>
        <!-- 商品の一覧を表示 -->
        <div class="product">
            <?php
            foreach($_SESSION['product'] as $id=>$product){
                echo $product["name"]. '*' .$product['count']. '<br>';
            }
            ?>
        </div>
      </div>

      <!-- ご請求額 -->
      <div class="total">
        <p>ご請求額: ￥<?php
        $total = 0;
        foreach($_SESSION['product'] as $id=>$product){
            $total += $product["price"]*$product['count'];
        }
        echo ($total+500)*1.1; ?>
        </p>
      </div>

      <!-- 注文確定ボタン -->
      <input type="submit" value="注文確定" class="button">
    </form>
  </div>
</main>
</body>
<?php 
}else {
  echo "<p class='cart_inp'><br>カートに商品ありません</main>";
} 
}else{
    header("Location: login_in.php");
    exit;
}?>
</html>
