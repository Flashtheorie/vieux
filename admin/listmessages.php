<?php
session_start();

require '../config/credentials.php';




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
<h1 class="text-4xl font-bold text-slate-100 my-12">Liste des messages</h1>
<?php
$req = $bdd->prepare("SELECT * FROM contact");
$req->execute();


while ($messages = $req->fetch(PDO::FETCH_OBJ )){
    if ($messages->statut == 1){
        echo '<div class="bg-red-600 shadow-xl rounded-lg p-4 mb-4 mr-6">';
    }
    else if ($messages->statut == 0){
        echo '<div class="bg-slate-900 shadow-xl rounded-lg p-4 mb-4 mr-6">';
    }
    ?>
        <h2 class="text-2xl font-bold text-slate-100"><?= $messages->name; ?></h2>
        <p class="text-slate-100"><?= $messages->email; ?></p>
        <p class="text-slate-100"><?= $messages->message; ?></p>
    <div class="flex justify-center my-6">
        <hr class="w-1/2">
    </div>
<?php
if ($messages->statut == 1){
    echo '<a href="action/markread.php?id='.$messages->id.'" class="text-xl font-black text-green-900">Marquer comme lu</a>';
}
else if ($messages->statut == 0){
    echo '<a href="action/markunread.php?id='.$messages->id.'" class="text-xl font-black text-red-900">Marquer comme non lu</a>';
}

?>
        
    </div>
    <?php
}

?>



</div>
</main>
</body>
</html>