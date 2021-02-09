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

class UserTable
{
  public $nick;
  public $pwd;
  public $pwd2;
  public $email;
  public $name;
  public $sex;
  public $birthday;
  public $avatar;
  private $reg_date;

  function __construct()
  {
    $this->reg_date = date("Y-m-d H-m-s", time());
  }

  function checkAllFilds() //проверяем поля на обязательные условия
  {
    unset($errors);
    $errors[] = !preg_match("/^([\S\w_.\-]){2,15}[a-zA-Z0-9]$/", $this->nick) ? "Введите ник соответсвующий символам A-Z a-z, цифрам, символам -_ и точке." : null;
    $errors[] = !preg_match("/^([\w\-._=\S]){8,25}$/", $this->pwd) ? "Запрещены пробелы и символы сравнения >< табуляции, длина от 8 до 25 символов." : null;
    $errors[] = $this->pwd != $this->pwd2 ? "Пароли не совпадают!" : null;
    $errors[] = !preg_match("/^(([a-z0-9_-]+\.)*[a-z0-9_-]){2,}+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/", $this->email) ? "Почта введена не корректно!": null;
    $errors[] = !preg_match("/^([\S]){0,20}$/", $this->name) ? "Запрещены знаки >< или длина имени превышена." : null;
    return $errors;
  }
  function setAvatar($path)
  {
    $this->avatar = $path;
  }

  function add() //добавление пользователя
  {
    //"INSERT INTO `users` (`nick`, `password`, `email`, `name`, `sex`, `birthday`, `avatar`, `reg_date`) VALUES (?, ?, ?, ?, ?)"
    // (NULL, 'admin', MD5('admin'), '1alexandreev1@gmail.com', 'Alexandr', '1', '1995-02-14', NULL, '2021-02-05 15:25:52');
    $connect = new Connect();
    $request = $connect->execute("INSERT INTO `users` (`nick`, `password`, `email`, `name`, `sex`, `birthday`, `avatar`, `reg_date`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)",
    [
      $this->nick,
      md5($this->pwd),
      $this->email,
      $this->name,
      $this->sex,
      $this->birthday,
      $this->avatar,
      $this->reg_date
    ]);

    return $request;
  }

  function getUser($value = '0')
  {
    //получаем пользователя одного или много в зависимости от переданной переменной
  }


}


 ?>
