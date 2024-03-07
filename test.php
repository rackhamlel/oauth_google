<?php
// test.php

session_start();

// Vérifiez si les données utilisateur sont présentes dans la session
if (isset($_SESSION['user_info'])) {
    $userInfo = $_SESSION['user_info'];

    // Affichez les données utilisateur
    echo '<h1>votre email</h1>';
    echo '<pre>';
    echo $userInfo['email'];
    //print_r($userInfo);
    echo '</pre>';
} else {
    echo 'Aucune donnée utilisateur disponible.';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>CLAP CLAP</h1>
</body>
</html>