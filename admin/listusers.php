<?php
session_start();

require '../config/credentials.php';
$req = $bdd->prepare("SELECT * FROM users");
$req->execute();
$countUsers = $req->rowCount();

$req = $bdd->prepare("SELECT * from contact");
$req->execute();

$countMessages = $req->rowCount();
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
<h1 class="text-4xl font-bold text-slate-100 my-12">Liste des utilisateurs</h1>

<div class="flex flex-col">
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full ">
          <thead class="bg-white border-b">
            <tr>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                #
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Nom
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Prénom
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Email
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Statut
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Modifier
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Supprimer
              </th>
            </tr>
          </thead>
          <tbody>
<?php 

$req = $bdd->prepare("SELECT * FROM users");
$req->execute();

while($user = $req->fetch(PDO::FETCH_OBJ)) {
?>
            <tr class="bg-white transition duration-300 ease-in-out hover:bg-gray-100 ">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?= $user->id; ?></td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
             <?= $user->nom; ?>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
              <?= $user->prenom; ?>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
              <?= $user->email; ?>
              </td>
              <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
              <?php
// check if the status is 1 or 0
switch($user->statut):
    case 1:
        echo '<i class="fa-solid fa-eye text-green-500"></i>';
    break;
    case 0:
        echo '<i class="fa-solid fa-eye-slash text-red-500"></i>';
    break;

    endswitch;
              
              
              ?>
              </td>
              <td class="text-sm text-yellow-500 hover:text-yellow-600 font-bold cursor-pointer px-6 py-4 whitespace-nowrap">
              <a href="modifyuser.php?id=<?= $user->id;?>">Modifier</a>
              </td>
              <td class="text-sm  hover:text-red-600 font-bold cursor-pointer px-6 py-4 whitespace-nowrap">
              <?php
if ($user->statut == 0){
    echo '<a href="action/recoveruser.php?id='. $user->id. '" class="text-green-500">Réactiver</a>';
}
else if ($user->statut == 1){
    echo '<a href="action/deleteuser.php?id='. $user->id. '" class="text-red-500">Supprimer</a>';
} 
?>
              </td>
            </tr>
 <?php } ?>           
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</main>
</body>
</html>