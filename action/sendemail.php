<?php
session_start();
include '../config/credentials.php';



if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sujet = $_POST['sujet'];
    $message = $_POST['message'];

    if ($name){
        if ($email){
            if ($sujet){
                if ($message){
                    $req = $bdd->prepare("INSERT INTO contact (name, email, sujet, message) VALUES (:name, :email, :sujet, :message)");
                    $req->execute(array(
                        'name' => $name,
                        'email' => $email,
                        'sujet' => $sujet,
                        'message' => $message
                    ));
                    $_SESSION['success'] = 'green';
                    $_SESSION['message'] = "Votre message a bien été envoyé";
                    header('Location: ../contact.php');
                } else {
                    $_SESSION['success'] = 'red';
                    $_SESSION['message'] = "Veuillez remplir le champ message";
                    header('Location: ../contact.php');
                }
            } else {
                $_SESSION['success'] = 'red';
                $_SESSION['message'] = "Veuillez remplir le champ sujet";
                header('Location: ../contact.php');
            }
        } else {
            $_SESSION['success'] = 'red';
            $_SESSION['message'] = "Veuillez remplir le champ email";
            header('Location: ../contact.php');
        }
    } else {
        $_SESSION['success'] = 'red';
        $_SESSION['message'] = "Veuillez remplir le champ nom";
        header('Location: ../contact.php');
    }
  
    header('Location: ../contact.php');
}