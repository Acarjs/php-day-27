<?php

require_once 'DBBlackbox.php';
require_once 'Song.php';

// start the session
session_start();

if (isset($_SESSION['success_message'])) {
    // if there is a 'success_message' element in the session
    // take its value and put it into a variable $success_message
    $success_message = $_SESSION['success_message'];

    // delete it from the session === flashing
    unset($_SESSION['success_message']);
}

// find potential errors in the session
if (isset($_SESSION['errors'])) {
    // if there is a 'errors' element in the session
    // take its value and put it into a variable $errors
    $errors = $_SESSION['errors'];

    // delete it from the session === flashing
    unset($_SESSION['errors']);
}

// find the ID of the record we want to edit in the request
$id = $_GET['id'] ?? null;

if ($id === null) {
    die('Please open this URL only with ?id=1 in the URL where 1 is the id of the edited song. <a href="index.php">Go back to index</a>');
}

// somehow retrieve existing song from some storage
$song = find( $id, 'Song' );

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editing song <?= $id ?></title>
</head>
<body>

    <?php include 'topmenu.php'; ?>

    <?php if (!empty($success_message)) : ?>
        <div class="success-message"><?= $success_message ?></div>
    <?php endif; ?>

    <!-- if there are errors, display them -->
    <?php if (!empty($errors)) : ?>
        <?php foreach ($errors as $error) : ?>
            <div class="error-message"><?= $error ?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <form action="update.php?id=<?= $id ?>" method="post">

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