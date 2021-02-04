<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="discription" content="Рецепты для всех моментов в жизни.">
    <link rel="stylesheet" href="files/css/style.css">
    <link rel="javascript" href="files/js/scripts.js">
  <h1><title><?=$title_name?></title></h1>
  </head>
  <body>
    <center>
    <header>
      <menu class="navbar" type="toolbar" style="border-radius: 0px 0px 10px 10px;">
          <span class="logo ts30">Edae-сть!</span>
          <a class="nav-item ts20 <?=$page==1 ? "active": ""?>" href="/">Главная</a>
          <a class="nav-item ts20 <?=$page==2 ? "active": ""?>" href="/video.php">Видео рецепты</a>
          <a class="nav-item ts20<?=$page==3 ? "active": ""?>" href="/about.php">О нас</a>
              <form class="form i-block" style="float: right" action="search.php" method="post">
                <input class="form-input i-block" style="width: calc(100% - 120px);" type="text" name="text" value="" placeholder="Например, Борщ">
                <button class="form-btn btn i-block" style="width: 100px" type="submit" name="search_btn">поиск</button>

              </form>
              <div style="clear: both;"></div>

      </menu>
    </header>
    <div class="container tleft">
      <div class="block-1">
