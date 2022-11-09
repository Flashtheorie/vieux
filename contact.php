<?php 
session_start();
include "includes/head.php"; 
include 'config/credentials.php';

?>



<body class="bg-zinc-300">
<?php include 'includes/navbar.php'; ?>

<!-- Alert de success ou d'error -->
<?php
if (isset($_SESSION['success'])) {
    $statut = $_SESSION['success'];
    $message = $_SESSION['message'];


?>
<div class="flex justify-center">
<div class="flex flex-col bg-<?= $statut; ?>-500 text-slate-800 w-1/3 items-center  p-4 rounded-xl ">
    <span class="error text-2xl font-bold">Merci</span>
    <span class="description">
    <?= $message ?>
    </span>
</div>
</div>
<!-- Fin Alert de success ou d'error -->

<?php
unset($_SESSION['success']);
unset($_SESSION['message']);
 } ?>

<div class="flex flex-col justify-center items-center mt-12 ">
    <h1 class="lg:text-6xl font-black text-slate-800 text-3xl">Contactez nous</h1>

    <!-- formulaire de contact -->
    
    <div class="flex justify-center my-2">

    
        <form action="action/sendemail.php" method="post">
            <div class="flex flex-col">
                <label for="name">Nom et prénom</label>
                <input type="text" name="name" id="name" class="border-2 border-slate-800 rounded-lg p-2"  required>
            </div>
            <div class="flex flex-col mt-4">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="border-2 border-slate-800 rounded-lg p-2"  required>
            </div>
            <div class="flex flex-col mt-4">
                <label for="sujet">Sujet de votre message</label>
                <select name="sujet" id="sujet" class="border-2 border-slate-800 rounded-lg p-2" required>
                    <option value="0">J'ai besoin d'informations</option>
                    <option value="1" selected>Je veux m'inscrire</option>
                    <option value="2">Autre demande</option>
                </select>
            </div>
            <div class="flex flex-col mt-4">
                <label for="message">Message</label>
                <textarea name="message" id="message" cols="30" rows="10" class="border-2 border-slate-800 rounded-lg p-2" required></textarea>
            </div>
            <!-- checkbox -->
            <div class="flex flex-col mt-4">
                <input type="checkbox" name="newsletter" id="newsletter" class="border-2  border-slate-800 rounded-lg p-2" required>
                <label for="newsletter" class="text-xs">Je confirme avoir plus de 50 ans et être sans activité</label>
            <div class="flex justify-center mt-4">
                <button type="submit" name="submit" class="bg-slate-800 text-white rounded-lg px-8 py-4 text-xl">Envoyer</button>
            </div>
        </form>


        <div class="flex flex-col mt-4">
<span class="font-black">Association Landes Sports Retraite</span>
<span class="font-bold">Adresse :123 Rue des Lilas, 40100 Mont-De-Marsan</span> 
<span class="font-bold"> Téléphone : 01-02-03-04-05</span>
<a href="mailto:contact@landessportsretraite40.fr" class="text-blue-500">contact@landessportsretraite40.fr</a> 

</div>
</div>




</body>
</html>