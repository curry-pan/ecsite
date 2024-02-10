<p>ありがとうございます。</p>
<button class="checkout-cta" onclick="location.href='product.php'">買物を続ける</button>
<?php
session_start();
if(isset($_REQUEST["cardNum"])){
    $pdo=new PDO('mysql:host=localhost;dbname=ec;charset=utf8','root', '');
    $sql=$pdo->prepare('insert into pass values(?,?,?)');
    $sql->execute([$_SESSION['customer']['id'],$_REQUEST['cardNum'], $_REQUEST['pass']]);
    $_SESSION['product'] = null;
}
?>