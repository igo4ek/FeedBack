<?php
header("Content-Type: text/html; charset=UTF-8");
setlocale(LC_ALL, "ru_RU.UTF-8");

$back = "<p><a href=\"javascript: history.back()\">Вернуться назад</a></p>";

    $name    = $_POST['name'];
    $mail    = $_POST['mail'];
    $phone   = $_POST['phone'];
    $message = $_POST['message'];

    $patterns=array(
		'/^((([А-ЯЁ]{1}[а-яё]+\s*)+)|(([A-Z]{1}[a-z]+\s+)+))$/u', //for FIO
		'/^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i', //for e-mail
		'/^[+]{0,1}\d[\d\(\)\ -]{5,15}\d$/'); //for phone

    $isError=false;

    if(!preg_match($patterns[0],$name))
    {
        $name = "<font color='red'>Некорректно введены ФИО. Попробуйте ещё раз</font>";
        $isError=true;
    };
    if(!preg_match($patterns[1],$mail))
    {
        $mail = "<font color='red'>Некорректно введен E-mail. Попробуйте ещё раз</font>";
        $isError=true;
    };
    if(!preg_match($patterns[2],$phone))
    {
        $phone = "<font color='red'>Некорректно введен Номер телефона. </font>";
        $isError=true;
    };
    if($message=="")$message="Пусто.";

    echo "Сервер получил Ваши данные\n";
    echo "<p>Имя: ".$name."</p>";
    echo "<p>Почта: ".$mail."</p>";
    echo "<p>Телефон: ".$phone."</p>";
    echo "<p>Сообщение: ".$message."</p>";

    if($isError) echo "<p><font color='red'>Попробуйте ещё раз!</font></p>";
    echo $back;
?>
