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
          <span class="logo">Edae-сть!</span>
          <a class="nav-item <?=$page==1 ? "active": ""?>" href="/">Главная</a>
          <a class="nav-item <?=$page==2 ? "active": ""?>" href="/video.php">Видео рецепты</a>
          <a class="nav-item <?=$page==3 ? "active": ""?>" href="/about.php">О нас</a>
      </menu>
    </header>
    <div class="container tleft">
      <div class="block-1">
