<?php

require '../config/credentials.php';


if (isset($_GET['id'])){
    $id = $_GET['id'];
    $req = $bdd->prepare("UPDATE users SET statut = 1 WHERE id = :id");
    $req->execute(array(
        'id' => $id
    ));
    header('Location: ../listusers.php');
}
else {
    header('Location: ../index.php');
}