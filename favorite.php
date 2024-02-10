<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/favorite.css">
	<title>favorite</title>
</head>
<body>
	<?php require_once 'menu.php';
	echo "<main>";
	if (isset($_SESSION['customer'])) {
		$pdo=new PDO('mysql:host=localhost;dbname=ec;charset=utf8','root', '');
		$sql=$pdo->prepare(
			"SELECT * FROM favorite JOIN products
			ON favorite.product_id = products.id WHERE favorite.customer_id = ?");
		$sql->execute([$_SESSION['customer']['id']]);
		if(($sql -> rowCount()) >= 1){
			echo "<div class='shohin'>";
			$count = 0;
			foreach ($sql as $product) {
				if($count % 7 == 0){
					echo "<div class='shohin_h'>";
				}
				echo '<div class="item">
				<a href="detail.php?id='.$product['id'].'" class="carta">
					<img src= "' .$product["image"]. '" class="shohin_img">
				</a>
				<img src="image/favo.png" class="favo_del" onclick=\'location.href="favorite_delete.php?id='. $product['id'] .'"\'>
					<div class="ftitle">
						<a href="detail.php?id='.$product['id'].'">'.$product['title'].'<br>'.$product['price']. '</a>
					</div>
				</div>';
				$count++;
				if($count % 7 == 0){
				echo "</div>";
				}
			}
			echo "</div>";
		}else{
			echo "<p class='cart_inp'>お気に入り商品が存在しません</p>";
		}
	}else if(isset($_SESSION['favo'])){
		$pdo=new PDO('mysql:host=localhost;dbname=ec;charset=utf8', 
			'root', '');
		$sql=$pdo->prepare("SELECT * FROM products WHERE id = ?");
		$result = array_unique($_SESSION['favo']['id']);
		sort($result);
		
		echo "<div class='shohin'>";
		$count = 0;
		for($i = 0;$i < count($result);$i++){
			$sql->execute([$result[$i]]);
			foreach ($sql as $product) {
				if($count % 7 == 0){
					echo "<div class='shohin_h'>";
				}
				echo '<div class="item">
				<a href="detail.php?id='.$product['id'].'" class="carta">
					<img src= "' .$product["image"]. '" class="shohin_img">
				</a>
				<img src="image/favo.png" class="favo_del" onclick=\'location.href="favorite_delete.php?id='. $product['id'] .'"\'>
					<div class="ftitle">
						<a href="detail.php?id='.$product['id'].'" >'.$product['title'].'<br>'.$product['price']. '</a>
					</div>
				</div>';
				$count++;
				if($count % 7 == 0){
				echo "</div>";
				}
			}
		}
		echo "</div>";
	}else{
		echo "<p class='cart_inp'>お気に入り商品が存在しません</p>";
	}
	?>
	<br><button type="button" onclick="location.href='product.php'">買い物を続ける</button>
	</main>
</body>
</html>