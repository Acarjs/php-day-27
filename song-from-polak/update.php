<?php

require_once 'DBBlackbox.php';
require_once 'Song.php';

// start the session
session_start();

// find the ID of the record we want to edit in the request
$id = $_GET['id'];

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
    header('Location: edit.php?id='.$id);
    // stop the script right here
    exit();
}

// somehow retrieve existing data from some storage
$song = find( $id, 'Song' );

// update entity from request
$song->name = $_POST['name'] ?? $song->name; // if 'name' was not found in $_POST data, keep the current value
$song->author = $_POST['author'] ?? $song->author;
$song->length = $_POST['length'] ?? $song->length;
$song->album = $_POST['album'] ?? $song->album;


// somehow save the data into the database (using the unique ID)
update($id, $song);

// put the success message into the session
$_SESSION['success_message'] = 'Song successfully updated.';

// redirect to edit form for this song
//                edit.php?id=1
header('Location: edit.php?id='.$id);