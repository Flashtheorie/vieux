<?php 
session_start();
include "includes/head.php"; 
include 'config/credentials.php';
?>



<body class="bg-zinc-300">
<?php include 'includes/navbar.php'; ?>


<?php
if (isset($_SESSION['statut'])) {
    $statut = 'red';
    $message = '"Identifiants incorrects"';


?>
<div class="flex justify-center">
<div class="flex flex-col bg-<?= $statut; ?>-500 text-slate-800 w-1/3 items-center  p-4 rounded-xl ">
    <span class="error text-2xl font-bold">Erreur</span>
    <span class="description">
    <?= $message ?>
    </span>
</div>
</div>
<!-- Fin Alert de success ou d'error -->

<?php
unset($_SESSION['statut']);

 } ?>


<div class="flex justify-center mt-12 lg:text-5xl text-2xl text-slate-800 font-bold">
    Espace administration
</div>

<!-- formulaire de connexion à l'espace administrateur -->
<div class="flex justify-center mt-12">
    <form action="admin/action/login.php" method="post">
        <div class="flex flex-col">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="border-2 border-slate-800 rounded-lg p-2" >
        </div>
        <div class="flex flex-col mt-4">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" class="border-2 border-slate-800 rounded-lg p-2" >
        </div>
        <div class="flex justify-center mt-4">
            <button type="submit" name="submit" class="bg-slate-800 text-white rounded-lg px-4 py-2 text-xl">Se connecter</button>
        </div>
    </form>


</body>
</html>
