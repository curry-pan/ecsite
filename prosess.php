<?php
// PHPMailerの設定と確認メールの送信
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
 
if (isset($_SESSION["email"]) && isset($_SESSION["name"])) {
    $emailTo = $_SESSION["email"];
    $nameTo = $_SESSION["name"];
 
    $mail = new PHPMailer(true);
    $mail->CharSet = PHPMailer::CHARSET_UTF8;
 
// ＜SMTPで送信する場合＞
// Enable SMTP debugging (デバッグ出力させない場合は 0)
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
 
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
$mail->setFrom('test@cheerworks.net', 'サポート窓口');
 
// Reply-to address
$mail->addReplyTo('test@cheerworks.net', 'サポート窓口');
 
// To address
$mail->addAddress($emailTo, $nameTo);
 
// 件名
$mail->Subject = 'フォームを受付けました';
 
// 本文 HTMLにするか？ 
// true：HTML
// false：テキスト
$mail->isHTML(true);
$mail->Body = '<span style="color: red;">テスト</span>';
$mail->Body = '以下の内容でフォームを受付けました。';
$mail->Body .= '<br>';
$mail->Body .= '名前: ' . $nameTo;
$mail->Body .= '<br>';
$mail->Body .= 'メールアドレス: ' . $emailTo;
 
// X-Mailer を非表示にする
$mail->XMailer = null;
 
// 送信
if ( ! $mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    // セッション情報をクリア
    unset($_SESSION["email"]);
    unset($_SESSION["name"]);
    header("Location: thanks.php");
}
 
} else {
echo "セッションが見つかりません。";
}
?>