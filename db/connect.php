<?php

class Connect
{
  private $pdo;


  function execute( $prepare, $values)
  {
    try {
      $config = require_once "config.php";

      $this->pdo = new PDO ("mysql:host=". $config['host'] .";dbname=" . $config['db_name'], $config['db_login'], $config['db_password']);
    } catch (PDOException $e) {
      echo "Error:". $e->getMessage();
      die();
    }


    $sendQuery = $this->pdo->prepare($prepare);
    //array_values(
    $request = $sendQuery->execute($values);
    //$this->pdo = null;
    if (gettype($request) == 'array') {
      return  $sendQuery->fetchAll(PDO::FETCH_ASSOC);
    } else {
      return $request;
    }
  }
}

?>
