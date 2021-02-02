<?php
$title_name = "Главная страница Edae-сть";
$page = 1;
include_once "header.php";
$bd = true;
if (!$bd):?>
  <div class="row">
    База пока что пуста.
  </div>

<?else:
for ($i=0; $i < 5 ; $i++):
?>
<div class="row">
  <h3 class="ts20">Название рецепта</h3>
<hr />
Текст Рецепта.
<hr />
статистика
</div>


<?
endfor;
endif;
include_once "footer.php";
?>
