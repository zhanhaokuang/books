<?php

require_once('../db_config.php');

if(!isset($_GET['id'])){
    header('Location: list-books.php');
    die();
} else {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    if(!$id) {
        header('Location: list-books.php');
        die();
    } else {
        $query = "DELETE FROM books WHERE id = :id LIMIT 1";
        $result = $db_connection->prepare($query);
        $result->execute([
            'id' => $id
        ]);
        $result = $result->fetch();
        header('Location: list-books.php');
        die();
    }
}
$db_connection = NULL;