<?php

require ('config.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification Google</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Authentification Google</h1>
    <p>Connection avec votre compte Google</p>
    <a href="https://accounts.google.com/o/oauth2/v2/auth?scope=email&client_id=372301446734-afdu3h25qb1jjoau8694b7fi5igfalpf.apps.googleusercontent.com&access_type=online&redirect_uri=http://localhost/oauth_google/config.php&response_type=code"><button id="google-auth-button">Se connecter avec Google</button>
    </a>
    
</body>
</html>
