<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/cart.css">
  <title>カート</title>
</head>
<body>
<?php require_once 'menu.php'; 
if(!empty($_SESSION['product'])){ ?>
  <main>
    <div class="basket">
      <div class="basket-labels">
        <ul>
          <li class="item item-heading">商品</li>
          <li class="price">価格</li>
          <li class="quantity">数量</li>
          <li class="subtotal">小計</li>
        </ul>
      </div>
      <?php
      $total = 0;
      $tax = 1.1;
      foreach($_SESSION['product'] as $id=>$product){
        $subtotal = $product["price"] * $product['count'];
        $total += $subtotal;
        echo '<div class="basket-product">
        <div class="item">
            <div class="product-image">
              <a href="detail.php?id='.$product['id'].'">
                <img src="'.$product["image"].'" class="product-frame">
              </a>
            </div>
            <div class="product-details">
              <a href="detail.php?id='.$product['id'].'">
                <h1><strong><span class="item-quantity"></span>'.$product["name"].'</strong></h1>
                <p><strong>出版社 '.$product["kaisya"].'</strong></p>
              </a>
            </div>
        </div>
        <div class="price">'.$product["price"].'</div>
        <div class="quantity">
            <form action="cart_change.php" method="post">
            <input type="hidden" name="id" value="' . $id . '">
              <input type="number" value="'.$product['count'].'" name="count" class="quantity-field">
              <input type="submit" value="数量変更">
            </form>
        </div>
        <div class="subtotal">'.$subtotal.'</div>';
        ?>
        <div class="remove">
          <?php echo "<button onclick='location.href=\"cart_delete.php?id=" . $id . "\"'>削除</button>'"; ?>
        </div>
        </div>
        <?php
      }
      ?>
      
      <!-- ここまで -->
    </div>
    <aside>
      <div class="summary">
        <div class="summary-total-items"><span class="total-items"></span> カート内商品</div>
        <div class="summary-subtotal">
          <div class="subtotal-title">小計</div>
          <div class="subtotal-value final-value" id="basket-subtotal"><?php echo $total ?></div>
          <div class="subtotal-title">送料</div>
          <div class="subtotal-value final-value" id="basket-subtotal">500</div>
          <div class="subtotal-title">消費税</div>
          <div class="subtotal-value final-value" id="basket-subtotal"><?php echo ($total+500) * ($tax-1) ?></div>
        </div>
        <div class="summary-total">
          <div class="total-title">合計</div>
          <div class="total-value final-value" id="basket-total"><?php echo ($total+500) * $tax ?></div>
        </div>
        <div class="summary-checkout">
          <button class="checkout-cta" onclick="location.href='purchase_in.php'">購入する</button>
          <button class="checkout-cta" onclick="location.href='product.php'">買物を続ける</button>
        </div>
      </div>
    </aside>
  </main>
</body>
<?php 
}else {
  echo "<p class='cart_inp'><br>カートに商品がありません</main>";
} ?>
</html>
