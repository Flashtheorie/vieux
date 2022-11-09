<?php

require '../config/credentials.php';
$id = $_GET['id'];

$req = $bdd->prepare("UPDATE contact SET statut = 0 WHERE id = :id");
$req->execute([
    'id' => $id
]);

header('Location: ../listmessages.php');