<?php

require_once('../db_config.php');

if (isset($_POST['createRecord'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $author = filter_var($_POST['author'], FILTER_SANITIZE_STRING);
    $genre = filter_var($_POST['genre'], FILTER_SANITIZE_STRING);
    $height = filter_var($_POST['height'], FILTER_SANITIZE_NUMBER_INT);
    $publisher = filter_var($_POST['publisher'], FILTER_SANITIZE_STRING);

    $query = "INSERT INTO books (id, title, author, genre, height, publisher)
                      VALUES (:id, :title, :author, :genre, :height, :publisher)";
    $result = $db_connection->prepare($query);
    $result->bindValue(":id", $id);
    $result->bindValue(":title", $title);
    $result->bindValue(":author", $author);
    $result->bindValue(":genre", $genre);
    $result->bindValue(":height", $height);
    $result->bindValue(":publisher", $publisher);
    $success = $result->execute();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Insert a new Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
          crossorigin="anonymous">
</head>
<body>
<br>
<div class="container">
    <form method="post" action="create.php">
        <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="number" readonly class="form-control" id="id" name="id" value="<?php echo "" ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" value="<?php echo "" ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="author" class="col-sm-2 col-form-label">Author</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="author" name="author" value="<?php echo "" ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="genre" class="col-sm-2 col-form-label">Genre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="genre" name="genre" value="<?php echo "" ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="height" class="col-sm-2 col-form-label">Height</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="height" name="height" value="<?php echo "" ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="publisher" name="publisher" value="<?php echo "" ?>">
            </div>
        </div>

        <button type="submit2" name="createRecord" class="btn btn-success">Insert Record</button>

    </form>
</div>
</body>
</html>
