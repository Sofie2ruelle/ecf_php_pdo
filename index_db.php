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

$usersStatement = $db->prepare("SELECT * FROM users"); 
$usersStatement->execute();
$users = $usersStatement->fetchAll(); 

// On affiche chaque user un à un
foreach ($users as $user) {
?>
<p><?php echo $user['pseudo']; ?></p>
<?php
}
?>
