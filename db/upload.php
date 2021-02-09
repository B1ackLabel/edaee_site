<?php
/*

[name] => MyFile.txt (comes from the browser, so treat as tainted)
            [type] => text/plain  (not sure where it gets this from - assume the browser, so treat as tainted)
            [tmp_name] => /tmp/php/php1h4j1o (could be anywhere on your system, depending on your config settings, but the user has no control, so this isn't tainted)
            [error] => UPLOAD_ERR_OK  (= 0)
            [size] => 123   (the size in bytes)
*/

class UpLoad
{
  private $ErrorsCode = array(
      0 => 'Ошибки нет, файл загружен успешно. ',
      1 => 'Загруженный файл превышает директиву upload_max_filesize в php.ini. ',
      2 => 'Загруженный файл превышает директиву "Максимальный размер файла", указанную в HTML-форме. ',
      3 => 'Загруженный файл был загружен только частично. ',
      4 => 'Ни один файл не был загружен. ',
      6 => 'Отсутствует временная папка. ',
      7 => 'Не удалось записать файл на диск. ',
      8 => 'Расширение PHP остановило загрузку файла. ',
      9 => 'Размер файла выше допустимого на данной форме. ',
      10 => 'Не верный тип файла на данной форме. ',
      11 => 'Не удалось переместить файл. '
    );
    private $name;
    private $type;
    private $tmp_path;
    private $size;
    private $error;
    private $res = true;


  function __construct($FILE)
  {
    $this->name = $FILE['name'];
    $this->type = $FILE['type'];
    $this->tmp_path = $FILE['tmp_name'];
    $this->error = $FILE['error'];
    $this->size = $FILE['size'];
  }

  function checkFile($max_size, $type)
  {
    $max_size *= 1024;
    $error = '';
    if ($this->size > $max_size) {
      $error = $this->ErrorsCode[9];
    }
    if (strpos($this->type, $type)){
      $error .= $this->ErrorsCode[10];
    }
    if ($this->error > 0) {
      $error .= $this->ErrorsCode[$this->error];
    }
    return $error;
  }

  function getPath()
  {
    if ($this->error == 0 && $this->tmp_path != '') {
      $path = realpath(dirname(__DIR__) . '..') . "/files/avatars/". md5(microtime()) . substr($this->name, strpos($this->name, "."));
      $copy = copy($this->tmp_path, $path);
      if ($copy) {
        unlink($this->tmp_path);
      } else {
        $this->error = $this->ErrorsCode[11];
      }
      return $path;
    } else {
      return null;
    }
  }


}


 ?>
