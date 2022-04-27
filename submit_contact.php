<?php

// submit_contact.php
if (!isset($_POST['email']) || !isset($_POST['password'])) {
    echo ('Il faut un email et un mot de passe pour soumettre le formulaire.');
    return;
}

if (
    (!isset($_GET['email']) || !filter_var($_GET['email'], FILTER_VALIDATE_EMAIL))
    || (!isset($_GET['message']) || empty($_GET['message']))
) {
    echo ('Il faut un email et un mot de passe pour soumettre le formulaire.');
    return;
}



// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur, en testant la variable $_FILES avec isset()
if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] == 0) {
    // Testons si le fichier n'est pas trop gros, tester sa taille 
    if ($_FILES['screenshot']['size'] <= 1000000) // ne dépasse pas 1 000 000 = 1Mo (1 million d'octets)
    {
        // Testons si l'extentsion est autorisée à l'aide de la fonction pathinfo
        $fileInfo = pathinfo($_FILES['screenshot']['name']);
        $extension = $fileInfo['extension'];
        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png']; // il faut interdire l'envoi de certaine fichiers, comme .PHP, ce qui pourrait exécuter des scripts sur notre serveur
        if (in_array($extension, $allowedExtensions)) // la fonction in_array permet de vérifier si l'extension récupérée fait bien partie des extensions autorisées
        {

            // On peut valider le fichier et le stocker définitivement grâce à la fonction move_uploaded_file
            move_uploaded_file($_FILES['screenshot']['tmp_name'], 'uploads/' .
                basename($_FILES['screenshot']['name']));
            echo "L'envoi a bien été effectué !";
        }
    }
}

$email = $_POST['email'];
$pwd = $_POST['password'];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>BLOG - Demande de contact reçue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">

        <?php include_once('header.php'); ?>
        <h1>Contact bien reçu !</h1>

        <div class="card">

            <div class="card-body">
                <h5 class="card-title">Rappel de vos informations</h5>
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
                    <p class="card-text"><b>Email</b> : <?php echo $_GET['email']; ?></p>
                    <p class="card-text"><b>Password</b> : <?php echo $_GET['password']; ?></p>
                <?php } ?>

            </div>
        </div>
    </div>
</body>

</html>