<?php

require_once "connect.php";

// nick
// 	password
//   	email
//   	name
//   	sex
//   	birthday
//   	avatar
// 	reg_date

class User
{
  private $nick;
  private $pwd;
  private $pwd2;
  private $email;
  private $name;
  private $sex;
  private $birthday;
  private $avatar;
  private $reg_date;

  function __construct($nick, $pwd, $pwd2, $email, $name, $sex, $birthday, $avatar){
    $this->nick = $nick;
    $this->pwd = $pwd;
    $this->pwd2 = $pwd2;
    $this->email = $email;
    $this->name = $name;
    $this->sex = $sex;
    $this->birthday = $birthday;
    $this->avatar = $avatar;
    $this->reg_date = date("Y-m-d H-m-s", time());
  }

  function checkAllFilds()
  {
    unset($errors);
    $errors[] = !preg_match("/^([\S\w_.\-]){2,15}[a-zA-Z0-9]$/", $this->nick) ? "Введите ник соответсвующий символам A-Z a-z, цифрам, символам -_ и точке." : null;
    $errors[] = !preg_match("/^([\w\-._=\S]){8,25}$/", $this->pwd) ? "Запрещены пробелы и символы сравнения >< табуляции, длина от 8 до 25 символов." : null;
    $errors[] = $this->pwd != $this->pwd2 ? "Пароли не совпадают!" : null;
    $errors[] = !preg_match("/^(([a-z0-9_-]+\.)*[a-z0-9_-]){2,}+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/", $this->email) ? "Почта введена не корректно!": null;
    $errors[] = !preg_match("/^([\S]){0,20}$/", $this->name) ? "Запрещены знаки >< или длина имени превышена." : null;
  //  $errors[] = !preg_match("/^([\S]){0,20}$/", $this->name) ? "Запрещены знаки >< или длина имени превышена." : null;
    return $errors;
  }

  function addUser() //добавление пользователя
  {
    //"INSERT INTO `users` (`nick`, `password`, `email`, `name`, `sex`, `birthday`, `avatar`, `reg_date`) VALUES (?, ?, ?, ?, ?)"
    // (NULL, 'admin', MD5('admin'), '1alexandreev1@gmail.com', 'Alexandr', '1', '1995-02-14', NULL, '2021-02-05 15:25:52');
    $connect = new Connect();
    $request = $connect->execute("INSERT INTO `users` (`nick`, `password`, `email`, `name`, `sex`, `birthday`, `avatar`, `reg_date`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
    [
      null,//$this->nick,
      md5($this->pwd),
      $this->email,
      $this->name,
      $this->sex,
      $this->birthday,
      null, //исправить на загруженный аватар
      $this->reg_date
    ]);

    return $request;
  }

  function auth() {
    //авторизация
  }


}


 ?>
