<?php

require_once 'DBBlackbox.php';
require_once 'Song.php';


session_start();

if(isset($_SESSION['errors']))
{
    $errors = $_SESSION['errors'];

    unset($_SESSION['errors']);
}




$song = new Song;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php include 'topmenu.php'; ?>

    <?php if(!empty($errors)) : ?>
         <?php foreach($errors as $error): ?>
        <div class="error-message">
        <?= $error ?>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <form action="insert.php" method="post">

        Name: <br>
        <input type="text" name="name" value="<?= htmlspecialchars((string)$song->name) ?>  ">
        <br>

        Author: <br>
        <input type="text" name="author" value="<?= htmlspecialchars((string)$song->author) ?>">
        <br>

        Length:<br>
        <input type="number" name="length" value="<?= htmlspecialchars((string)$song->length) ?>"> seconds<br>


        Album:<br>
        <input type="text" name="album" value="<?= htmlspecialchars((string)$song->album) ?>"><br>
        <br>

        <button type="submit">Save</button>

    </form>



</body>

</html>