<?php
require_once 'dbConnection.php';
$login = trim($_POST['login']);
$password = trim($_POST['password']);
$email = trim($_POST['email']);
$fio = trim($_POST['fio']);
$address = trim($_POST['address']);
$number = trim($_POST['number']);
if (!empty($login) && !empty($password)) {
    $sql_check = 'SELECT EXISTS(SELECT login FROM buyers  WHERE login = :login)';
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute([':login' => $login]);
    if ($stmt_check->fetchColumn()) {
        die("Логин занят");
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = 'INSERT INTO buyers (login,password,email,fio,address,number) VALUES(:login,:password,:email,:fio,:address,:number)';
    $params = ['login' => $login, ':password' => $password, 'email' => $email, 'fio' => $fio, 'address' => $address, 'number' => $number];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    header('Location: http://magaz/signIn.php ');
} else {
    echo "ЗАПОЛНИ ПОЛЯ!!!!";
}

