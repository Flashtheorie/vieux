<?php

require '../config/credentials.php';


$req = $bdd->prepare("SELECT * FROM users WHERE id = :id");
$req->execute([
    'id' => $_GET['id']
]);
$oldData = $req->fetch(PDO::FETCH_OBJ);

if(isset($_POST['submit'])) {
    $req = $bdd->prepare("UPDATE users SET nom = :nom, prenom = :prenom, email = :email, statut = :statut WHERE id = :id");
    $req->execute([
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'email' => $_POST['email'],
        'statut' => $oldData->statut,
        'id' => $_GET['id']
    ]);
    header('Location: ../listusers.php');
}
