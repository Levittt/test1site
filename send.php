<?php
echo "Testing" | mail -s "Test" test@example.com
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$msg = $_MSG['msg'];
$mail_to = 'learn-python@mail.ru'

$fullname = htmlspecialchars($fullname);
$email = htmlspecialchars($email);
$msg = htmlspecialchars($msg);

$fullname = urldecode($fullname);
$email = urldecode($email);
$msg = urldecode($msg);

$fullname = trim($fullname);
$email = trim($email);
$msg = trim($msg);

echo $fullname;
echo "<br>";
echo $email;
echo "<br>";
echo $msg;

if (mail($mail_to, "Комментарий с learnpython", "Имя: $fullname. Сообщение: $msg." ,"From: $email \r\n"))
 {
    echo "сообщение успешно отправлено";
} else {
    echo "при отправке сообщения возникли ошибки";
}
}?>