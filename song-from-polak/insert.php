<?php

require_once 'DBBlackbox.php';
require_once 'Song.php';

// start the session
session_start();


// validation
// 1. say that everything is ok
$valid = true;
$errors = [];

// 2. ask about the incoming data and if any of them
//    are not ok, fail the validation
if (trim($_POST['name'] ?? '') === '') {
    $valid = false;
    $errors[] = 'Name cannot be empty';
}

if (trim($_POST['author'] ?? '') === '') {
    $valid = false;
    $errors[] = 'Author name cannot be empty';
}

if (!is_numeric($_POST['length'] ?? '')) {
    $valid = false;
    $errors[] = 'Length must be a number';
}

// 3. ask if any of the validations failed
if (!$valid) {

    // flash the error messages
    $_SESSION['errors'] = $errors;

    // redirect back to where the user came from
    header('Location: create.php');
    // stop the script right here
    exit();
}

// prepare empty entity
$song = new Song;

// update entity from request
$song->name = $_POST['name'] ?? $song->name; // if 'name' was not found in $_POST data, keep the current value
$song->author = $_POST['author'] ?? $song->author;
$song->length = $_POST['length'] ?? $song->length;
$song->album = $_POST['album'] ?? $song->album;

// potentially unsafe approach to updating the Song
// from $_POST:
// foreach ($_POST as $key => $value) {
//     $song->{$key} = $value;
// }


// somehow insert the entity into the database and generate a unique ID
// here done using DBBlackbox
$id = insert($song);

// everything went well
// time for a success message "successfully saved"
// put the success message into the session
$_SESSION['success_message'] = 'Song successfully inserted.';

// redirect to edit form for this song
//                edit.php?id=1
header('Location: edit.php?id='.$id);