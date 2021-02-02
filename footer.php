</div>

<div class="block-2">
  <div class="row">
    <span class="ts20" style="margin: auto;">Авторизация</span>
    <hr />
    <form class="form" action="auth.php" method="post">
      <label for="email">Email:</label>
      <input class="form-input" type="text" name="email" value="">
      <label for="password">Пароль:</label>
      <input class="form-input" type="password" name="password" value="">
      <button class="btn form-btn" name="auth">Войти</button>
      <a href="/reg.php"><button class="btn form-btn" type="button">Зарегестрироваться</button></a>
    </form>
  </div>
</div>

</div>

<footer class="navbar">
  &copy Edaee.ru <?=date("Y",time());?>
  <span style="position: sticky;left: 100%"><a class="nav-item"  href="#">Вверх</a></span>

</footer>
</center>
</body>
</html>
