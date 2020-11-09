<?php session_start();
require_once('smarty-3.1.35/libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';
$smarty->config_dir = 'configs';
$smarty->cache_dir = 'cache';

          include('session.php');

        if (isset($_POST['title']) && isset($_POST['content']) && isset($_SESSION['username'])) {
          $title = stripcslashes($_POST['title']);
          $content = stripcslashes($_POST['content']);
          $username = $_SESSION['username'];
          $result = $pdo->prepare("SELECT id FROM users WHERE username = ?");
          $result->execute([$username]);
          $row = $result->fetch();
          $result = $pdo->prepare("INSERT INTO tasks(title, content, status, user_id) VALUES (?,?,0,?)");
          $result->execute([$title,$content, $row['id']]);
        }
        
        $smarty->display('creator.html');
        ?>
