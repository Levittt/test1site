
<?php
require 'PHPMailer-master/PHPMailerAutoload.php';
// Файлы phpmailer
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$name = $_POST['fullname'];
$email = $_POST['email'];
$msg = $_POST['msg'];

// Формирование самого письма
$title = "Комментарий с learnpython";
$body = "
<h2>Новое письмо</h2>
<b>Имя:</b> $name<br>
<b>Почта:</b> $email<br><br>
<b>Сообщение:</b><br>$msg
";

$mail = new PHPMailer;
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки почты
    $mail->Host       = 'smtp.mail.ru'; 
    $mail->Username   = 'learn-python@mail.ru'; 
    $mail->Password   = 'common24apolinary%%'; 
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('learn-python@mail.ru', 'Имя отправителя');

    // Получатель письма
    $mail->addAddress('learn-python@mail.ru');  

// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;    

// Проверяем, отравилось ли сообщение
if ($mail->send()) {$result = "success"; header('Location: test1site.herokuapp.com/sent.html');} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);