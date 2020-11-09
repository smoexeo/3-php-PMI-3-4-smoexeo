<?php 
          include('secret/db.php');

          function login($db, $username, $password)
          {
            $username = stripcslashes($username);
            $password = stripcslashes($password);
            $result = $db->prepare("select password from users where username = ?");
            $result->execute([$username]);
            if ($result->rowCount() == 0) {
              unset($_SESSION['username'], $_SESSION['password']);
              return false;
            } else {
              $row = $result->fetch();
              return password_verify($password, $row['password']);
            }
          }

          if (isset($_POST['username']) && isset($_POST['password'])) {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];
          }

          if (isset($_POST['reg_username']) && isset($_POST['reg_password'])) {
            $username = stripcslashes($_POST['reg_username']);
            $password = stripcslashes($_POST['reg_password']);
            $result = $pdo->prepare("SELECT * FROM users WHERE username = ?");
            $result->execute([$username]);
            if ($result->rowCount() >= 1) {
              header("Location: #error_username");
            } else {
              $password = password_hash($password, PASSWORD_DEFAULT);
              $result = $pdo->prepare("INSERT INTO users(username,password) VALUES(?,?)");
              $result->execute([$username, $password]);
            }
          }

          $username = "";
          if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
            if (login($pdo, $_SESSION['username'], $_SESSION['password'])) {
              $username = $_SESSION['username'];
              $smarty->assign('username',$username);
            } else {
              header('Location: #error');
            }
          }

          if (isset($_GET['act'])) {
            $act = $_GET['act'];
            if ($act = 'exit') {
              session_destroy();
              header('Location: index.php');
            }
          }
        ?>
