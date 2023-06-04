<?php 

require_once 'DBBlackbox.php';
require_once 'Song.php';

session_start();

$valid = true;
$errors = [];

if (trim($_POST['name'] ?? '') === '')
{
    $valid = false;
    $errors[] = 'Name cannot be empty';
}

if (  trim($_POST['author'] ?? '') === '')
{
    $valid = false;
    $errors[] = 'Author cannot be empty';
}

if(!is_numeric($_POST['length'] ?? '') === '')
{
    $valid = false;
    $errors[] = 'Length must be a number';
}

if(!$valid)
{
    $_SESSION['errors'] = $errors;
    header('Location:create.php');
    exit();
}

$song = new Song;

$song->name = $_POST['name'] ?? $song->name;
$song->author = $_POST['author'] ?? $song->author;
$song->length = $_POST['length'] ?? $song->length;
$song->album = $_POST['album'] ?? $song->album;

$id = insert($song);
// var_dump($id);

$_SESSION['success_message'] = 'Song successfully inserted.';

header('Location: edit.php?id='.$id);