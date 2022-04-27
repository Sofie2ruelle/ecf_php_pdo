<!-- index.php -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG - Page d'accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">
    
        <?php include_once('header.php'); ?>
        <h1>Ze BLOG</h1>

        
        <?php

        try {
            // on se connecte à la table ecf
            $db = new PDO(
                'mysql:host=localhost;dbname=ecf;charset=utf8',
                'root',
                ''
            );
        } catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}

// On récupère tout le contenu de la table user

$usersStatement = $db->prepare("SELECT * FROM user");
$usersStatement->execute();
$users = $usersStatement->fetchAll();

// On affiche chaque user un à un
foreach ($users as $user) {
    ?>
<h3>Bienvenue sur le BLOG <?php echo $user['pseudo']; ?> !</h3>
<?php
}
?>
        <!-- inclusion de l'entête du site -->
        <?php include_once('header.php'); ?>

        <?php foreach (getArticle($article) as $article) : ?>
            <article>
                <h3><?php echo $article['title']; ?></h3>
                <div><?php echo $article['content']; ?></div>
                <i><?php echo displayUser($article['pseudo'], $users); ?></i>
            </article>
        <?php endforeach ?>

    </div>

    <!-- inclusion du bas de page du site -->
    <?php include_once('footer.php'); ?>
</body>

</html>