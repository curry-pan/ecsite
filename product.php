<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/product.css">
    <title>Product</title>
</head>
<body>
    <?php require_once 'menu.php';
    if(isset($_SESSION["text"])){
        echo '
        <div class="popup-window">
            <p class="popup-text">'.$_SESSION["text"].'</p>
            <label class="popup-close" for="popup-close">
                <svg width="18" height="18" xmlns="http://www.w3.org/2000/svg">
                    <line x1="0" y1="0" x2="18" y2="18" stroke="black" stroke-width="3"></line>
                    <line x1="0" y1="18" x2="18" y2="0" stroke="black" stroke-width="3"></line>
                </svg>
            </label>
        </div>';
        $_SESSION["text"] = null;
    }
    ?>
    <main>
    <div class="container">
        <div class="sidebar">
            <form method="post">
                <h3>教科</h3>
                <ul class="sideul">
                    <li class="sideli">
                        <input type="radio" name="kyouka" id="all" value="%">
                        <label for="all">すべて</label>
                    </li>
                    <li class="sideli">
                        <input type="radio" name="kyouka" id="kokugo" value="国語">
                        <label for="kokugo">国語</label>
                    </li>
                    <li class="sideli">
                        <input type="radio" name="kyouka" id="sansu_sugaku" value="算数・数学">
                        <label for="sansu_sugaku">算数・数学</label>
                    </li>
                    <li class="sideli">
                        <input type="radio" name="kyouka" id="gaikokugo" value="外国語">
                        <label for="gaikokugo">外国語</label>
                    </li>
                    <li class="sideli">
                        <input type="radio" name="kyouka" id="rika" value="理科">
                        <label for="rika">理科</label>
                    </li>
                    <li class="sideli">
                        <input type="radio" name="kyouka" id="syakai" value="社会">
                        <label for="syakai">社会</label>
                    </li>
                    <li class="sideli">
                        <input type="radio" name="kyouka" id="jouhou" value="情報">
                        <label for="jouhou">情報</label>
                    </li>
                    <li class="sideli">
                        <input type="radio" name="kyouka" id="geijutu" value="芸術">
                        <label for="geijutu">芸術</label>
                    </li>
                    <li class="sideli">
                        <input type="radio" name="kyouka" id="sonota" value="その他">
                        <label for="sonota">その他</label>
                    </li>
                </ul>
                <h3>価格</h3>
                <ul class="sideul">
                    <li class="sideli">
                        <input type="radio" name="kakaku" id="subete" value="0,2147483647">
                        <label for="subete">すべて</label>
                    </li>
                    <li class="sideli">
                        <input type="radio" name="kakaku" id="a" value="0,1500">
                        <label for="a">1500円未満</label>
                    </li>
                    <li class="sideli">
                        <input type="radio" name="kakaku" id="b" value="1500,3000">
                        <label for="b">1500円~3000円</label>
                    </li>
                    <li class="sideli">
                        <input type="radio" name="kakaku" id="c" value="3000,5000">
                        <label for="c">3000円~5000円</label>
                    </li>
                    <li class="sideli">
                        <input type="radio" name="kakaku" id="d" value="<=5000,10000">
                        <label for="d">5000円~10000円</label>
                    </li>
                    <li class="sideli">
                        <input type="radio" name="kakaku" id="e" value="10000,2147483647">
                        <label for="e">10000円以上</label>
                    </li>
                </ul>
                <h3>出版社</h3>
                <input type = "text" class="txt" name="name"><br>
                <input type = "submit" value = "検索">
            </form>
        </div>

        <?php
        $pdo = new PDO('mysql:host=localhost;dbname=ec;charset=utf8', 'root', '');

        if(isset($_REQUEST['name'])){
            $name = "%".$_REQUEST['name']."%";
        }else{
            $name = "%";
        }
        if(isset($_REQUEST['kyouka'])){
            $kyouka = $_REQUEST['kyouka'];
        }else{
            $kyouka = "%";
        }
        if(isset($_REQUEST['kakaku'])){
            $price = explode(",",$_REQUEST['kakaku']);
        }else{
            $price = ["0","2147483647"];
        }
        $sql = $pdo->prepare('SELECT id,title,price,image FROM products WHERE kaisya LIKE :kaisya AND price >= :minprice AND price < :maxprice AND kyouka LIKE :kyouka');
        $sql->bindValue(':kaisya', htmlspecialchars($name), PDO::PARAM_STR);
        $sql->bindValue(':kyouka', $kyouka, PDO::PARAM_STR);
        $sql->bindValue(':minprice', $price[0], PDO::PARAM_INT);
        $sql->bindValue(':maxprice', $price[1], PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetchall( PDO::FETCH_ASSOC);
        if(count($result)){
            echo "<div class='shohin'>";
            $count = 0;
            foreach ($result as $product){
                if($count % 6 == 0){
                    echo "<div class='shohin_h'>";
                }
                echo '<a href="detail.php?id='.$product['id'].'" class="item">
                <img src= "' .$product["image"]. '" class="shohin_img">
                <div>'.$product['title'].'<br>\\'.$product['price']. '</div>
                </a>';
                $count++;
                if($count % 6    == 0){
                echo "</div>";
                }
            }
            echo "</div>";
        }else{
            echo "該当商品がありません";
        } 
        echo "</div>"
        ?>
    </div>
    </main>
</body>
</html>