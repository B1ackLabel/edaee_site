<?php
if (isset($_POST["reg"])) {
  $nick = $_POST["nick"];
  $pass1 = $_POST["password"];
  $pass2 = $_POST["password2"];
  $email = $_POST["email"];
  $name = $_POST["name"];
  $sex = $_POST["sex"];
  $bday = $_POST["birthday"];
  $avatar = $_POST["avatar"];

  $msg[] = !preg_match("/^([\S\w\-_.]){3,15}$/", $nick) ? "Введите ник соответсвующий символам A-Z a-z, цифрам, символам -_" : null;
  $msg[] = !preg_match("/^([\w\-._=\S]){8,25}$/", $pass1) ? "Запрещены пробелы и символы сравнения >< табуляции, длина от 8 до 25 символов." : null;
  $msg[] = $pass1 != $pass2 ? "Пароли не совпадают!" : null;
  $msg[] = !preg_match("/^(([a-z0-9_-]+\.)*[a-z0-9_-]){2,}+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/", $email) ? "Почта введена не корректно!": null;
  $msg[] = !preg_match("/^([\S]){0,20}$/", $name) ? "Запрещены знаки >< или длина имени превышена." : null;
  if (empty($msg)){
  }
}
?>
