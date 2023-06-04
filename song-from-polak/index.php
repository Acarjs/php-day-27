<?php

require_once 'DBBlackbox.php';
require_once 'Song.php';

var_dump( Song::$total_songs );

var_dump( Song::getTotalNrOfSongs() );


// get all records from the database
$songs = select(0, 0, 'Song');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index of songs</title>
</head>
<body>

    <?php include 'topmenu.php'; ?>

    <ul>
        <?php foreach ($songs as $song) : ?>
            <li>
                <?= $song->name ?>

                <a href="edit.php?id=<?= $song->id ?>">edit</a>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>