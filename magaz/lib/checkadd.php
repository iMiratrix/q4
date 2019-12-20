<?php
require_once 'dbConnection.php';
$name_book = trim($_POST['name_book']);
$fio_authors = trim($_POST['fio_authors']);
$price = trim($_POST['price']);
$name_section = trim($_POST['name_section']);
$img = ($_POST['img']);

try {


    if (!empty($name_section) && (!empty($name_book) && (!empty($price) && (!empty($img) && (!empty($fio_authors)))))) {
        $sql = 'INSERT INTO sections(name_section) VALUES(:name_section)';
        $params = ['name_section' => $name_section];
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $sql = 'INSERT INTO books(name_book,price,img) VALUES(:name_book,:price,:img)';
        $params = ['name_book' => $name_book, 'price' => $price, 'img' => $img];
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $sql = 'INSERT INTO authors(fio_authors) VALUES(:fio_authors)';
        $params = ['fio_authors' => $fio_authors];
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        header('Location: http://magaz/index.php ');
    }
} catch (PDOException $e) {
    die($e->getMessage());
}



