<?php 

// session_start(); //a small file with weird name in application/cookies in developer tool appeared

// var_dump($_SESSION);

// $_SESSION['start'] = date('H:i:s');



// echo 'The value was put into the session at ' . $_SESSION['start'];



//in the sending script :
session_start();

$_SESSION['sucess_message'] = 'Success';

header('Location: /some/url?id=1');


//in the receiving script :
session_start();

$success_message = $_SESSION['success_message'] ?? null;

unset($_SESSION['success_message']);

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
    
    <h1>
    <?php if($success_message): ?>
        <div class="success_message">
        <?= $success_message ?>
        </div>

        <?php endif; ?>
    </h1>

</body>
</html>