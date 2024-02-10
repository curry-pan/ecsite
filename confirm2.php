<?php
session_start();
echo "名前:" . $_SESSION["name"];
echo "<br>メールアドレス:" . $_SESSION['email'];
echo "<br>内容:" . $_SESSION['val'];

echo '<form action="mail1.php" method="post">';
echo '<input type="hidden" name="email" value="', $_SESSION["email"], '">';
echo '<input type="hidden" name="name" value="', $_SESSION["name"], '">';
echo '<input type="hidden" name="val" value="', $_SESSION['val'], '">';
echo '<input type="submit" value="確定">';
echo '</form>';
echo '<form action="inquiry.php" method="post">';
echo '<input type="submit" value="戻る">';
echo '</form>';
?>