<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 入力データの取得
    $company = htmlspecialchars($_POST['company'], ENT_QUOTES, 'UTF-8');
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $phone = htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

    // 送信先のメールアドレス
    $to = "info@kiriko.tech"; // ←ここに受信するメールアドレスを記入
    $subject = "【研修お問い合わせ】" . $name . "様より";

    // メール本文
    $body = "会社名: " . $company . "\n"
          . "氏名: " . $name . "\n"
          . "電話番号: " . $phone . "\n"
          . "メールアドレス: " . $email . "\n\n"
          . "お問い合わせ内容:\n" . $message;

    // メールヘッダーの設定
    $headers = "From: " . $email . "\r\n"
             . "Reply-To: " . $email . "\r\n"
             . "Content-Type: text/plain; charset=UTF-8";

    // メール送信
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('送信が完了しました！'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('送信に失敗しました。'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('不正なアクセスです。'); window.location.href='index.html';</script>";
}
?>
