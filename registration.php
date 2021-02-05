<?php
require_once "db/classuser.php";


if (isset($_POST["reg"]) && !empty($_POST) ) {
  $user = new User(
    $_POST["nick"],
    $_POST["pwd"],
    $_POST["pwd2"],
    $_POST["email"],
    $_POST["name"],
    $_POST["sex"],
    $_POST["birthday"],
    $_FILES["avatar"]
  );

  $msg = $user->checkAllFilds();
  //print_r($msg);

  if (!empty($msg))
  {
    $ms = $user->addUser();
    print_r($ms);
  }
}
?>
