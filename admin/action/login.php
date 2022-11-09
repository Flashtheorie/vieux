<?php
session_start();



// connexion à faire

require '../config/credentials.php';

$email = $_POST['email'];
$password = $_POST['password'];

if ($email && $password) {
    $req = $bdd->prepare("SELECT * FROM admin WHERE email = :email AND password = :password");
    $req->execute([
        'email' => $email,
        'password' => sha1($password)
    ]);
    $user = $req->fetch(PDO::FETCH_OBJ);

    if ($user) {
        $_SESSION['user'] = $user;
        header('Location: ../index.php');
    } else {
        $_SESSION['statut'] = "red";
        $_SESSION['message'] = "Identifiants incorrects";
        header('Location: ../../login.php');
    }
}