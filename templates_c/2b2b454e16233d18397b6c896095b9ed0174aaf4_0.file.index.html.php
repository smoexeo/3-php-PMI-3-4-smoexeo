<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-06 18:17:58
  from 'C:\xampp\htdocs\mysite.ru\templates\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fa58546a495d3_45405043',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2b2b454e16233d18397b6c896095b9ed0174aaf4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mysite.ru\\templates\\index.html',
      1 => 1604683076,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fa58546a495d3_45405043 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/normalize.css">
  <link rel="stylesheet" href="styles/index.css">
</head>

<body>
  <!-- Место решения -->
  <header>
    <div class="wrapper">
      <div class="left_column">
        <h1>ToDo Сервис</h1>
      </div>

      <div class="right_column">
        <ul class="mail_nav">
          <li class="active_a_top"><a href="#">Задачи</a></li>
          <li><a href="creator.php">Создать</a></li>
        </ul>
        <ul class="user_nav">
          <?php if ((isset($_smarty_tpl->tpl_vars['username']->value))) {?>
          <li class='username'><a href='#'><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</a></li>
              <li><a href='?act=exit'>Выход</a></li>
            <?php } else { ?>
              <li><a href='#login'>Войти</a></li>
            <?php }?>
        </ul>
      </div>
    </div>
  </header>
  <div class="login" id="login">
    <a href='#' class='login_close'></a>
    <div class="login_wrap">
      <div class="login_content">
        <a href="#" class="login_exit">X</a>
        <h1>АВТОРИЗАЦИЯ</h1>
        <form class='auth' method='POST'>
          <fieldset>
            <div class='input_field'>
              <input type='text' name='username' maxlength='255' required placeholder='Логин'>
            </div>
            <div class='input_field'>
              <input type='password' name='password' maxlength='255' required placeholder='Пароль'>
            </div>
            <div class='input_field'>
              <input type='submit' id='login_button' value='Авторизоваться'>
            </div>
            <div class='input_field'>
              <a href="#registration">Зарегистрироваться</a>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
  <div class="login" id="registration">
    <a href='#' class='login_close'></a>
    <div class="login_wrap">
      <div class="login_content">
        <a href="#" class="login_exit">X</a>
        <h1>РЕГИСТРАЦИЯ</h1>
        <form class='auth' method='POST'>
          <fieldset>
            <div class='input_field'>
              <input type='text' name='reg_username' maxlength='255' required placeholder='Логин'>
            </div>
            <div class='input_field'>
              <input type='password' name='reg_password' maxlength='255' required placeholder='Пароль'>
            </div>
            <div class='input_field'>
              <input type='submit' id='reg_button' value='Зарегистрироваться'>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
  <div class="login" id="error">
    <a href='#login' class='login_close'></a>
    <div class="login_wrap">
      <div class="login_content">
        <a href="#login" class="login_exit">X</a>
        <h1>Неправильный логин или пароль.</h1>
      </div>
    </div>
  </div>
  <div class="login" id="error_username">
    <a href='#login' class='login_close'></a>
    <div class="login_wrap">
      <div class="login_content">
        <a href="#login" class="login_exit">X</a>
        <h1>Такой пользователь уже существует.</h1>
      </div>
    </div>
  </div>
  <main>
    <div class="wrapper">
      <nav>
        <h2>Задачи</h2>
        <ul class="nav-list">
          <li>
            <div class="active_a_nav"><a href="#">Все</a></div>
          </li>
          <li>
            <a href="#">Предстоящие</a>
          </li>
          <li>
            <a href="#">Выполненные</a>
          </li>
        </ul>
      </nav>

      <section>
        <h2> Все </h2>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tasks']->value, 'task');
$_smarty_tpl->tpl_vars['task']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['task']->value) {
$_smarty_tpl->tpl_vars['task']->do_else = false;
?>
        <article class='<?php echo $_smarty_tpl->tpl_vars['task']->value['complition'];?>
'>
          <p>
          <h3><?php echo $_smarty_tpl->tpl_vars['task']->value['title'];?>
</h3>
          </p>
          <p><?php echo $_smarty_tpl->tpl_vars['task']->value['content'];?>
</p>
          <p><a href='?delete=<?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
'>X</a></p>
        </article>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </section>
    </div>
  </main>


  <footer>
    <div class="wrapper">
      <p>
        (С) Курс Web-программирования | ПГНИУ
      </p>
    </div>
  </footer>
</body>

</html><?php }
}
