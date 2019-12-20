<?php
require_once 'dbConnection.php';
$login = trim($_POST['login']);
$password = trim($_POST['password']);
if (!empty($login) && !empty($password)) {
    $sql = 'SELECT login, password FROM buyers  WHERE login = :login';
    $params = [':login' => $login];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $user = $stmt->fetch(PDO::FETCH_OBJ);
    if ($user) {
        if (password_verify($password, $user->password)) {
            $_SESSION['user_login'] = $user->login;
//            header('Location: safeUser.php');
            header('Location: http://magaz/index.php ');
        } else {
            echo "Неверный логин или пароль";
        }
    } else {
        echo "Неверный логин или пароль";
    }
} else {
    echo "Поля пустые";
}
