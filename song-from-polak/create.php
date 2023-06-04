<?php

require_once 'DBBlackbox.php';
require_once 'Song.php';

// start the session
session_start();

// find potential errors in the session
if (isset($_SESSION['errors'])) {
    // if there is a 'errors' element in the session
    // take its value and put it into a variable $errors
    $errors = $_SESSION['errors'];

    // delete it from the session === flashing
    unset($_SESSION['errors']);
}

// prepare empty entity
$song = new Song;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a new song</title>
</head>
<body>

    <?php include 'topmenu.php'; ?>

    <!-- if there are errors, display them -->
    <?php if (!empty($errors)) : ?>
        <?php foreach ($errors as $error) : ?>
            <div class="error-message"><?= $error ?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <form action="insert.php" method="post">

        <!-- display the form prefilled with entity data -->

        Name:<br>
        <input type="text" name="name" value="<?= htmlspecialchars((string)$song->name) ?>"><br>
        <br>

        Author:<br>
        <input type="text" name="author" value="<?= htmlspecialchars((string)$song->author) ?>"><br>
        <br>

        Length:<br>
        <input type="number" name="length" value="<?= htmlspecialchars((string)$song->length) ?>"> seconds<br>
        <br>

        Album:<br>
        <input type="text" name="album" value="<?= htmlspecialchars((string)$song->album) ?>"><br>
        <br>

        <button type="submit">Save</button>

    </form>

</body>
</html>