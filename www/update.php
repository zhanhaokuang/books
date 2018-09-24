<?php

require_once('../db_config.php');

if(!isset($_POST['updateRecord'])){
    header('Location: edit.php');
    die();
} else {
    if(!isset($_POST['id'])){
        header('Location: edit.php');
        die();
    } else {
        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $author = filter_var($_POST['author'], FILTER_SANITIZE_STRING);
        $genre = filter_var($_POST['genre'], FILTER_SANITIZE_STRING);
        $height = filter_var($_POST['height'], FILTER_SANITIZE_NUMBER_INT);
        $publisher = filter_var($_POST['publisher'], FILTER_SANITIZE_STRING);

        $query = "UPDATE books 
                  SET title = :title,
                      author = :author,
                      genre = :genre,
                      height = :height,
                      publisher = :publisher
                  WHERE id = :id";
        $result = $db_connection->prepare($query);
        $result->execute([
            'title'     => $title,
            'author'    => $author,
            'genre'     => $genre,
            'height'    => $height,
            'publisher' => $publisher,
            'id'        => $id
        ]);
        header('Location: list-books.php');
        die();
    }
//    if(isset($_POST['updateRecord2'])){
//        $id = $_POST['id1'];
//        $title = $_POST['title1'];
//        $author = $_POST['author1'];
//        $genre = $_POST['genre1'];
//        $height = $_POST['height1'];
//        $publisher = $_POST['publisher1'];
//
//        $query = "INSERT INTO books (id, title, author, genre, height, publisher)
//                  VALUES ('$id', '$title', '$author', '$genre', '$height', '$publisher')";
//        $result = $db_connection->prepare($query);
//        $result->execute([
//            'title'     => $title,
//            'author'    => $author,
//            'genre'     => $genre,
//            'height'    => $height,
//            'publisher' => $publisher,
//            'id'        => $id
//        ]);
//        }
}


