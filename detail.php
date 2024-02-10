<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/detail.css">
    <title>商品詳細</title>
</head>
<body>
    <?php require_once 'menu.php';
    $h = $_SERVER['HTTP_HOST'];
    if (!empty($_SERVER['HTTP_REFERER']) && (strpos($_SERVER['HTTP_REFERER'],$h) !== false)) {
      echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">前に戻る</a>';
    }else{
        '<a href="product.php">前に戻る</a>';
    }
    $pdo=new PDO('mysql:host=localhost;dbname=ec;charset=utf8','root', '');
    $sql=$pdo->prepare('SELECT * FROM products where id=?');
    $id = $_REQUEST['id'];
    $sql->execute([$id]);
    echo "<main>";
    foreach ($sql as $row) {
    echo '<div class="product-container">
        <div class="product-image">
            <img src="'.$row["image"] .'" alt="商品画像" class="img">
        </div>
        <div class="product-details">
            <div class="product-title">' .$row["title"]. '</div>
            <div class="product-description">
                ' .$row["setumei"] .' 
            </div>
            <div class="product-price">
                価格: ￥' . $row["price"] . '(税抜)
            </div>
            <div class="product-actions">
            <form action="cart_insert.php" method="post">
                <input type="hidden" name="id" value="'. $row['id']. '">
                <input type="hidden" name="name" value="'. $row['title']. '">
                <input type="hidden" name="price" value="'. $row['price']. '">
                <input type="hidden" name="image" value="'. $row['image']. '">
                <input type="hidden" name="kaisya" value="'. $row['kaisya']. '">
                <input type="submit" class="add-to-cart" value="ADD TO CART">
            </form>
                <button class="add-to-favorites" onclick=\'location.href="favorite_insert.php?id=', $row['id'] . '"\'>お気に入りに追加</button>
            </div>
            <div class="product-about">
                <p><b>発行元:</b>' .$row['kaisya']. '</p>
                <p><b>商品について</b></p>
                <p>' .$row['moresetumei']. '</p>
            </div>
        </div>
    </div>';
    }
    echo "</main>";
    ?>

</body>
</html>
