<?php

require_once 'DBBlackbox.php';
require_once 'Song.php';

session_start();

if(isset( $_SESSION['success message']) )
{
    $success_message = $_SESSION['success_message'];


    unset($_SESSION['success_message']);
}

if (isset($_SESSION['errors']))
{
    $errors = $_SESSION['errors'];

    unset($_SESSION['errors']);
}


$id = $_GET['id'];

if ($id === null) {
    die('Please open this URL only with ?id=1 in the URL where 1 is the id of the edited song. <a href="index.php">Go back to index</a>');
}


$song = find( $id, 'Song' );

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

    <?php if(!empty($_SESSION['success_message'])) : ?>
    <div class="success_message"> $success_message </div>
    <?php endif; ?>

    <!-- if there are errors, display them -->
    <?php if(!empty($errors)): ?>
        <?php foreach($errors as $error): ?>
        <div class="error_message"> <?= $error ?> </div>    
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