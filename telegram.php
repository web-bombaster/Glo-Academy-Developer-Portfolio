<?php

$name = $_POST['name']; // получаем имя клиента
$email = $_POST['mail']; // получаем почту клиента
$message = $_POST['message']; // получаем сообщение клиента

// воодим между кавычек токен бота, который прислал @botfater
$token = "";
// вставляем номер чата, который можно найти на странице
// api.telegram.org/bot{token}/getUpdates — где {token} это токен бота
$chat_id = "";

// Собираем данные в один массив 
$arr = array(
  'Клиент: ' => $name,
  'Email: ' => $email,
  'Сообщение: ' => $message
);

// составляем сообщение из данных массива
foreach($arr as $key => $value) {
  $txt .= $key."<b> ". urlencode($value)."</b> "."%0A";
};

// даем команду боту отправить сообщение с текстом
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
  return true; // если прошло успешно, возвращаем ответ true
} else {
  return false; // если ошибка, возвращаем false
}
?>