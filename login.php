<?php

try
{
    // on se connecte à MySQL
    $db = new PDO(
        'mysql:host=localhost;dbname=ecf;charset=utf8', 
        'root', 
        ''
    );
}
catch(Exception $e)
{
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
<p><?php echo $users['pseudo']; ?></p>
<?php
}
?>

<?php
// Soumission du formulaire
if (isset($_POST['email']) && isset($_POST['password'])) {
    foreach ((array) $users as $user) { // ajouter (array) sinon il ne va pas comprendre que c'est un tableau
        if (
            $user['email'] === $_POST['email'] &&
            $user['password'] === $_POST['password']
        ) {
            // Enregistement de l'email de l'utilisateur en session
            $_SESSION['LOGGED_USER'] = $user['email'];
            
        }
    }
}
?>

<!-- 
    Si l'utilisateur est non identifié, on affiche le formulaire
-->
<?php if(!isset($_SESSION['LOGGED_USER'])): ?>
<form action="home.php" method="post" enctype="multipart/form-data">
    <!-- si message d'erreur on l'affiche -->
    <?php if(isset($errorMessage)) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>
    <?php endif; ?>
    <form class="border border-1 rounded p-3" action="" method="post">
    <div class="mb-3">
            <label class="form-label" for="email">Pseudo : </label>
            <input class="form-control" type="pseudo" name="text" id="pseudo" placeholder="Example : Louis de Funès">
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">Email : </label>
            <input class="form-control" type="email" name="email" id="email" placeholder="Example : test@test.com">
        </div>
        <div class="mb-3">
            <label class="form-label" for="pwd">Password : </label>
            <input class="form-control" type="password" name="pwd" id="pwd" placeholder="Enter your password">
        </div>
        <button class="btn btn-primary" type="submit">Send</button>
        <button class="btn btn-light" type="reset">Reset</button>
    </form>
</form>
<!-- 
    Si utilisateur bien connecté on affiche un message de succès
-->
<?php else: ?>
    <div class="alert alert-success" role="alert">
        <!-- souhaiter la bienvenue -->
        Bonjour <?php echo $_SESSION['LOGGED_USER']; ?> et bienvenue sur le blog !
    </div>
<?php endif; ?>
</form>

