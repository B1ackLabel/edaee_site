<?php
$title_name = "Регистрация на сайте Edae-сть";
require_once "header.php";
require_once "registration.php";
?>
<div class="row" style="min-height:">
  <span style="color: red">
  <?php
  if (!empty($msg)){
    foreach ($msg as $key => $value) {
      if (!empty($value))
      echo $value . "<br />";
    }
    echo "<hr />";
  }
  print_r($_FILES['avatar']);
  echo "<hr />";
  print_r($ms);
  ?>
  </span>
  <span>Поля помеченые звездой обязательны!</span>
  <span style="color: red"><?php print_r($_POST);?></span>
  <form class="form" enctype="multipart/form-data" action="registration.php" method="post">
    <label for="nick">Ник на сайте (от 3 до 15 символов. Латинские буквы. - _ символы)*:</label>
    <input class="form-input block" type="text" name="nick" value="<?=$_POST["nick"]?>">
    <label for="password">Пароль (от 8 до 25 символов, кроме >< и пробела)*:</label>
    <input class="form-input block" type="password" name="pwd" value="">
    <label for="password2">Повторите пароль*:</label>
    <input class="form-input block" type="password" name="pwd2" value="">
    <label for="email">Email*:</label>
    <input class="form-input block" type="email" name="email" value="<?=$_POST["email"]?>">
    <label for="name">Ваше имя (До 20 симв.):</label>
    <input class="form-input block" type="text" name="name" value="<?=$_POST["name"]?>">
    <label for="sex">Ваш пол:</label>
    <select class="form-select" name="sex" >
      <option <?=$_POST['sex'] == 0 ? "selected" : ""?> value="0">Выбирите</option>
      <option <?=$_POST['sex'] == 1 ? "selected" : ""?> value="1">Мужской</option>
      <option <?=$_POST['sex'] == 2 ? "selected" : ""?> value="2">Женский</option>
    </select>
    <label  for="">Дата рождения</label>
    <input class="form-input" type="date" style="width: 250px" name="birthday" value="<?=$_POST["birthday"]?>">
    <label class="block" for="avatar">Аватар до 500кб.</label>
    <input class="form-input btn" type="file" name="avatar" value="">
    <button class="form-btn btn" type="submit" name="reg">Зарегестрироваться</button>
  </form>
</div>
<?php
require_once "footer.php"
?>
