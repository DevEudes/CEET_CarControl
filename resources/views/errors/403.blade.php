<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accès refusé</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f9f7ed;
            color: #ef1212;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .message {
            padding: 20px;
            border: 1px solid #ef1212;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .message img {
            width: 200px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="message">
    <img src={{ url('images/ceet_logo.png')}} class="mr-2" alt="logo" style="width: 50px; height: auto;" />
        <h1>403 - Accès refusé</h1>
        <p>Vous n'êtes pas autorisé à accéder à cette page.</p>
        <img src={{ url('images/erreur-403.png')}} class="mr-2" alt="logo" style="width: 200px; height: auto;" />
    </div>
</body>
</html>
