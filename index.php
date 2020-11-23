<?php session_start();
require_once('smarty-3.1.35/libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';
$smarty->config_dir = 'configs';
$smarty->cache_dir = 'cache';

          include('session.php');

        
        function Tasks($pdo, $username)
        {
          $sql = $pdo->prepare("SELECT tasks.id, tasks.title, tasks.content, tasks.status FROM tasks INNER JOIN users ON tasks.user_id=users.id WHERE users.username = ? ORDER BY tasks.title");
          $sql->execute([$username]);
          if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
            $tasks = [];
            while ($row = $sql->fetch()) {
              $status = $row["status"];
              $complition = 'uncompleted';
              if ($status == 1)
                $complition = 'completed';
                array_push($tasks,array(
                  'id' => $row["id"],
                  'title' => $row["title"],
                  'content' => $row["content"],
                  'complition' => $complition ));
            }
            return $tasks;
          }
        }

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

        if (isset($_GET["delete"])) {
          $id = $_GET["delete"];
          $username = $_SESSION["username"];
          $result = $pdo->prepare("SELECT id FROM users WHERE username = ?");
          $result->execute([$username]);
          $row = $result->fetch();
          $result = $pdo->prepare("DELETE FROM tasks WHERE id = ? AND user_id = ?");
          $result->execute([$id,$row['id']]);
        }

        if (isset($_GET["complete"])) {
          $id = $_GET["complete"];
          $username = $_SESSION["username"];
          $result = $pdo->prepare("SELECT id FROM users WHERE username = ?");
          $result->execute([$username]);
          $row = $result->fetch();
          $result = $pdo->prepare("UPDATE tasks SET status=1 WHERE id = ? AND user_id = ?");
          $result->execute([$id,$row['id']]);
        }

        if (isset($_GET["uncomplete"])) {
          $id = $_GET["uncomplete"];
          $username = $_SESSION["username"];
          $result = $pdo->prepare("SELECT id FROM users WHERE username = ?");
          $result->execute([$username]);
          $row = $result->fetch();
          $result = $pdo->prepare("UPDATE tasks SET status=0 WHERE id = ? AND user_id = ?");
          $result->execute([$id,$row['id']]);
        }

        
        $smarty->assign('tasks',Tasks($pdo, $username));
        $smarty->display('index.html');
