<?php
// config.php

// Vérifiez si le code OAuth est présent dans la requête
if (isset($_GET['code'])) {
    // Récupérez le code OAuth depuis la requête
    $code = $_GET['code'];

    // Paramètres nécessaires pour obtenir le token d'accès OAuth
    $clientId = '372301446734-afdu3h25qb1jjoau8694b7fi5igfalpf.apps.googleusercontent.com';
    $clientSecret = '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';
    $redirectUri = 'http://localhost/oauth_google/connection.php'; // Assurez-vous que l'URI de redirection correspond à celui que vous avez configuré dans le Google Developer Console
    $tokenEndpoint = 'https://www.googleapis.com/oauth2/v4/token';

    // Paramètres pour la requête POST pour obtenir le token d'accès
    $tokenParams = array(
        'code' => $code,
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'redirect_uri' => $redirectUri,
        'grant_type' => 'authorization_code'
    );

    // Initialisez cURL
    $ch = curl_init($tokenEndpoint);

    // Configuration de cURL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($tokenParams));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));

    // Exécutez la requête cURL
    $tokenResponse = curl_exec($ch);

    // Fermez la session cURL
    curl_close($ch);

    // Analysez la réponse JSON
    $tokenData = json_decode($tokenResponse, true);

    // Vérifiez si le token d'accès a été obtenu avec succès
    if (isset($tokenData['access_token'])) {
        // Stockez le token d'accès dans la session (ou dans la base de données selon vos besoins)
        session_start();
        $_SESSION['access_token'] = $tokenData;

        // Redirigez l'utilisateur vers la page qui affiche ses informations (par exemple, profile.php)
        header('Location: http://localhost/oauth_google/reussite.php');
        exit;
    } else {
        echo 'Erreur lors de l\'obtention du token d\'accès.';
        if (isset($tokenData['error'])) {
            echo '<br>Erreur : ' . $tokenData['error'];
            echo '<br>Description de l\'erreur : ' . $tokenData['error_description'];
        }
    }
} else {
    echo 'Code OAuth non présent dans la requête.';
}
?>
