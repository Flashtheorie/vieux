<?php
session_start();

require '../config/credentials.php';
$iduser = $_GET['id'];
$req = $bdd->prepare("SELECT * FROM users WHERE id = :id");
$req->bindValue(':id', $iduser, PDO::PARAM_INT);
$req->execute();


$user = $req->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Espace administrateur</title>
    <script src="https://kit.fontawesome.com/16fcb8aa1f.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

</head>

<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">

<header>
    <!--Nav-->
    <?php include 'includes/navbar.php'; ?>
</header>

<main>

    <div class="flex flex-col md:flex-row justify-center">
        <?php include 'includes/sidebar.php'; ?>
        <section>
            <div id="main" class="main-content text-center mt-12 md:mt-2 pb-24 md:pb-5">
<h1 class="text-4xl font-bold text-slate-100 my-12">Modification de l'utilisateur #<?= $user->id; ?></h1>

<form action="action/modifyuserdata.php?id=<?= $user->id; ?>" method="post">
            <div class="flex flex-col">
                <label class="text-slate-100" for="name">Nom</label class="text-slate-100">
                <input value="<?= $user->nom;?>" type="text" name="nom" id="name" class="border-2 border-slate-800 rounded-lg p-2" >
            </div>
            <div class="flex flex-col">
                <label class="text-slate-100" for="name">Prénom</label class="text-slate-100">
                <input value="<?= $user->prenom;?>" type="text" name="prenom" id="name" class="border-2 border-slate-800 rounded-lg p-2" >
            </div>

            <div class="flex flex-col mt-4">
                <label class="text-slate-100" for="email">Email</label class="text-slate-100">
                <input value="<?= $user->email;?>" type="email" name="email" id="email" class="border-2 border-slate-800 rounded-lg p-2" >
            </div>
            
            <span class="my-6 text-slate-100">Statut :</span>
    <br>
            <?php
            if ($user->statut == 0){
                echo "<span class='text-red-500 font-black'>Supprimé</span>";
                echo "<br>";
                echo '<a href="action/recoveruser.php?id='.$user->id.'" class=" font-light text-yellow-500">Réactiver</a>';
            }
            if ($user->statut == 1){
                echo "<span class='text-green-500 font-black'>Actif</span>";
                echo "<br>";
                echo '<a href="action/deleteuser.php?id='.$user->id.'" class=" font-light text-yellow-500">Supprimer</a>';
            }

        ?>
            <div class="flex justify-center mt-4">
                <button type="submit" name="submit" class="bg-slate-100 text-slate-800 rounded-lg px-8 py-4 text-xl">Envoyer</button>
            </div>
        </form>




</section>
    </div>
</main>
</body>
</html>