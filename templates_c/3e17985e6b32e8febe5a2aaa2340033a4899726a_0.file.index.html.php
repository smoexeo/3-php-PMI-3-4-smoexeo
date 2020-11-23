<?php
/* Smarty version 3.1.34-dev-7, created on 2020-11-23 05:00:26
  from 'C:\xampp\htdocs\mysite.ru\lab4\templates\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fbb33da611178_85117617',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e17985e6b32e8febe5a2aaa2340033a4899726a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mysite.ru\\lab4\\templates\\index.html',
      1 => 1606103701,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fbb33da611178_85117617 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/normalize.css">
  <link rel="stylesheet" href="styles/index.css">
  <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"><?php echo '</script'; ?>
>
</head>

<body>
  <div id="w" class="anchor"></div>
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
            <div class="nav" id="all"><a onclick="sort(2)">Все</a></div>
          </li>
          <li>
            <div id="next"><a onclick="sort(1)">Предстоящие</a></div>
          </li>
          <li>
            <div id="prev"><a onclick="sort(0)">Выполненные</a></div>
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
' id='task<?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
'>
          <p>
          <h3><?php echo $_smarty_tpl->tpl_vars['task']->value['title'];?>
</h3>
          </p>
          <p><?php echo $_smarty_tpl->tpl_vars['task']->value['content'];?>
</p>
          <p><a onclick='comp(<?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
)' id='complete'>Выполнено</a> &nbsp;·&nbsp; <a onclick='uncomp(<?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
)'
              id='uncomplete'>Не выполнено</a> &nbsp;·&nbsp; <a onclick='del(<?php echo $_smarty_tpl->tpl_vars['task']->value['id'];?>
)'>Удалить</a></p>
        </article>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </section>
    </div>
  </main>

  <?php echo '<script'; ?>
>
    function del(id) {
      $('#task' + id).remove();
      $.get("index.php", {
          delete: id
        },
        alert("Задача удалена")
      )
    };

    function comp(id) {
      $('#task' + id).removeClass('uncompleted');
      $('#task' + id).addClass('completed');
      $.get("index.php", {
        complete: id
      })
    };

    function uncomp(id) {
      $('#task' + id).addClass('uncompleted');
      $('#task' + id).removeClass('completed');
      $.get("index.php", {
        uncomplete: id
      })
    };

    function sort(type) {
      if(type==1){
        $('.completed').hide();
        $('.uncompleted').show();
        $('#next').addClass('nav');
        $('#all').removeClass('nav');
        $('#prev').removeClass('nav');
      } else if(type==0){
        $('.completed').show();
        $('.uncompleted').hide();
        $('#next').removeClass('nav');
        $('#all').removeClass('nav');
        $('#prev').addClass('nav');
      } else{
        $('.completed').show();
        $('.uncompleted').show();
        $('#next').removeClass('nav');
        $('#all').addClass('nav');
        $('#prev').removeClass('nav');
      }
    };

  <?php echo '</script'; ?>
>

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
