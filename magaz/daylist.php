<?php
session_start();
require_once 'lib/dbConnection.php';
$data = $stmt = $pdo->query('SELECT * FROM books');
while ($data = $stmt->fetch()) {
    $_SESSION['name_book'] = $data['name_book'];
    $_SESSION['img'] = $data['img'];
    $_SESSION['price'] = $data['price'];
    $_SESSION['id_book'] = $data['id_book'];


    $id_book=$_SESSION['id_book'] ;
    $name_book =$_SESSION['name_book'];
    $img=$_SESSION['img'];
    $price =$_SESSION['price'];
    $arrDay= array(
        $id_book,
        $name_book,
        $img,
        $price

    );

    $arrJSON= json_encode($arrDay);

}
echo <<<HTML

<script >
console.log($arrJSON);

</script>
HTML;
