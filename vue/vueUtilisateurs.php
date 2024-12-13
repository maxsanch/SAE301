<?php

// EFFACE LE PLUS TARD
require '../config/config.php';


$header = HEADER_connecté;
$footer = Footer_déconnecté;

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des utilisateurs</title>
    <link rel="stylesheet" href="../styles/GestionUtilisateur.css">
</head>

<body>
    <header>
        <?= $header ?>
    </header>

    <main>
        <h2 class="Titre">Gestion des utilisateurs</h2>
        <h3 class="SousTitre">Tableau de bord</h3>
        <div class="Contour">
            <div class="LesElements">
                <div class="Element"><img class="SVG" src="../img/Inscrit.svg" alt="">
                    <div>Nombre d'inscriptions</div>
                    <div class="Chiffre">20</div>
                </div>
                <div class="Element"><img class="SVG" src="../img/Ruche.svg" alt="">
                    <div>Nombre de ruches enregistrées</div>
                    <div class="Chiffre">45</div>
                </div>
                <div class="Element"><img class="SVG" src="../img/UtilisateursCo.svg" alt="">
                    <div>Utilisateurs actifs</div>
                    <div class="Chiffre">2</div>
                </div>
            </div>
            <!-- Ouais je rajoute le graph ici -->
        </div>
        <h3 class="SousTitre">Utilisateurs</h3>
        <div class="case">
            <div class="photo"><img src="../img/appiculteur_admin.jpg" alt=""></div><b>[Nom d'utilisateurs]</b>
            <div>Dernière connexion : Il y a 3h</div>
            <div>Nombre de ruches : 2</div>
            <div>Information</div>
        </div>
    </main>

    <footer>
        <?= $footer ?>
    </footer>
</body>

</html>