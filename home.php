<?php session_start(); // $_SESSION ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG - Page d'accueil</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <!-- Navigation -->
    <?php include_once('header.php'); ?>

    <!-- Inclusion du formulaire de connexion -->
    <?php include_once('login.php'); ?>
        <h1>Bienvenu sur mon blog qui marche pas 😅 </h1>

        <!-- Si l'utilisateur existe, on affiche son article -->
        <?php if(isset($loggedUser)): ?>
            <?php foreach(getArticle($user, $limit) as $user) : ?>
                <article>
                    <h3><?php echo $user['pseudo']; ?></h3>
                    <div><?php echo $user['']; ?></div>
                    <i><?php echo displayUser($user[''], $user); ?></i>
                </article>
            <?php endforeach ?>
        <?php endif; ?>
    </div>

    <?php include_once('footer.php'); ?>
</body>
</html>

