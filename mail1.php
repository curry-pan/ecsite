<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
// PHPMailerのオートロード
$current_dir = dirname(__FILE__);
require($current_dir . '/src/Exception.php');
require($current_dir . '/src/PHPMailer.php');
require($current_dir . '/src/SMTP.php');
 
date_default_timezone_set('Asia/Tokyo');
mb_language('japanese');
mb_internal_encoding('utf-8');


session_start();
$name = $_SESSION["name"];
$email = $_SESSION['email'];
$val = $_SESSION['val'];
 
// 例外を有効にする場合は、引数をTRUEにする
$mail = new PHPMailer(true);
 
$mail->CharSet = PHPMailer::CHARSET_UTF8; 
 
// ＜SMTPで送信する場合＞
// Enable SMTP debugging (デバッグ出力させない場合は 0)
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
 
// SMTP
$mail->isSMTP();
 
// hostname
$mail->Host = 'smtp.lolipop.jp';
 
// SMTP port  (ポート番号ロリポップの場合: 465)
$mail->Port = 465;
 
// 暗号化 (ssl|tls)
$mail->SMTPSecure = 'ssl';
 
// SMTP認証
$mail->SMTPAuth = true;
 
// ユーザー名
$mail->Username = 'test@cheerworks.net';
 
// パスワード
$mail->Password = 'abcc20231010_T';
 
// オプション
$mail->SMTPOptions = [
    'ssl' => [
        'verify_peer' => false
        ,'verify_peer_name' => false
        ,'allow_self_signed' => true
    ]
];
// ＜/ SMTPで送信する場合＞
 
// From address
$mail->setFrom($email, $name);
 
// Reply-to address
$mail->addReplyTo($email, $name);
 
// To address
$mail->addAddress('2201311@s.asojuku.ac.jp', $name);
 
// 件名
$mail->Subject = 'お問合せ';
 
// 本文 HTMLにするか？ 
// true：HTML
// false：テキスト
$mail->isHTML(true);
$mail->Body = 'お問合せ内容:'.$val.'<br>名前:'.$name.'<br>メールアドレス:'.$email;
 
// X-Mailer を非表示にする
$mail->XMailer = null;
 
// 送信
if ( ! $mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    header("Location: thank.php");
    exit();
}
 
?>