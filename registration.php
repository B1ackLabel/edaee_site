<?php
require_once "db/usertable.php";
require_once "db/upload.php";


if (isset($_POST["reg"]) && !empty($_POST) ) {
  $UserTable = new UserTable(
    $_POST["nick"],
    'qwertyuiop',//$_POST["pwd"],
    'qwertyuiop',//$_POST["pwd2"],
    $_POST["email"],
    $_POST["name"],
    $_POST["sex"],
    $_POST["birthday"]
  );
  $msg = $UserTable->checkAllFilds();

  if (isset($_FILES['avatar']) && !empty($_FILES['avatar']))
  {
    $upload = new UpLoad($_FILES["avatar"]);
    $msg[] = $upload->checkFile(500, 'image');
  }

  if (!empty($msg))
  {
    $UserTable->setAvatar($upload->getPath());
    $ms = $UserTable->add();
    print_r($ms);
  }
  print_r($_POST);
  echo $avatar;
}
?>
