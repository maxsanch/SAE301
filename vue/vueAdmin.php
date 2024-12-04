<?php

require "../config/config.php";

$header = HEADER_Déconnecté;
$footer = Footer_déconnecté;


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion ruches</title>

    <link rel="stylesheet" media="(min-width: 620px)" href="../styles/styles_index_non_connecte.css">
    <link rel="stylesheet" href="../styles/styles_commun_mobile.css">
    <link rel="stylesheet" href="../styles/vueAdmin.css">

</head>

<body>
    <header>
        <?= $header ?>
    </header>

    <div class="titre_centre">
        <div class="first">
            <h1>Gestion des utilisateurs</h1>
        </div>
        <div class="sec">
            <h2>Tableau de bord</h2>
        </div>
    </div>

    <div class="celulle_tableau_bord">
        <div class="icones_informations">
            <div class="icone_info_single">
                <div class="icone">
                    <img src="../img/ruches_Login.svg" alt="icone de ruche">
                </div>
                <div class="info">
                    <p>Nombre d'inscriptions</p>
                    <p class="brown"><b>20</b></p>
                </div>
            </div>
            <div class="icone_info_single">
                <div class="icone">
                    <img src="../img/ruches_Login.svg" alt="icone de ruche">
                </div>
                <div class="info">
                    <p>Nombre d'inscriptions</p>
                    <p class="brown"><b>20</b></p>
                </div>
            </div>
            <div class="icone_info_single">
                <div class="icone">
                    <img src="../img/ruches_Login.svg" alt="icone de ruche">
                </div>
                <div class="info">
                    <p>Nombre d'inscriptions</p>
                    <p class="brown"><b>20</b></p>
                </div>
            </div>
        </div>
        <div class="graph">

        </div>
    </div>

    <div class="titre_centre">
        <h2>Utilisateurs</h2>
    </div>

    <div class="partie2">
        <div class="titre_top_centre">
            <h2>Gérer mes ruches</h2>
        </div>

        <div class="gridcentre">
            <div class="case">
                <div class="case_interieur">
                    <div class="photo">
                        <img src="../img/ruches.jpg" alt="">
                    </div>
                    <p><b>[nom d'utilisateur]</b></p>
                    <p>Dernière connexion : il y a 3h</p>
                    <p>Nombre de ruches : 2</p>
                    <a href="#" class="bout">informations</a>
                </div>
            </div>
            <div class="case">
                <div class="case_interieur">
                    <div class="photo">
                        <img src="../img/ruches.jpg" alt="">
                    </div>
                    <p><b>[nom d'utilisateur]</b></p>
                    <p>Dernière connexion : il y a 3h</p>
                    <p>Nombre de ruches : 2</p>
                    <a href="#" class="bout">informations</a>
                </div>
            </div>
            <div class="case">
                <div class="case_interieur">
                    <div class="photo">
                        <img src="../img/ruches.jpg" alt="">
                    </div>
                    <p><b>[nom d'utilisateur]</b></p>
                    <p>Dernière connexion : il y a 3h</p>
                    <p>Nombre de ruches : 2</p>
                    <a href="#" class="bout">informations</a>
                </div>
            </div>
            <div class="case">
                <div class="case_interieur">
                    <div class="photo">
                        <img src="../img/ruches.jpg" alt="">
                    </div>
                    <p><b>[nom d'utilisateur]</b></p>
                    <p>Dernière connexion : il y a 3h</p>
                    <p>Nombre de ruches : 2</p>
                    <a href="#" class="bout">informations</a>
                </div>
            </div>
            <div class="case">
                <div class="case_interieur">
                    <div class="photo">
                        <img src="../img/ruches.jpg" alt="">
                    </div>
                    <p><b>[nom d'utilisateur]</b></p>
                    <p>Dernière connexion : il y a 3h</p>
                    <p>Nombre de ruches : 2</p>
                    <a href="#" class="bout">informations</a>
                </div>
            </div>
            <div class="case">
                <div class="case_interieur">
                    <div class="photo">
                        <img src="../img/ruches.jpg" alt="">
                    </div>
                    <p><b>[nom d'utilisateur]</b></p>
                    <p>Dernière connexion : il y a 3h</p>
                    <p>Nombre de ruches : 2</p>
                    <a href="#" class="bout">informations</a>
                </div>
            </div>
        </div>
    </div>



    <footer>
        <?= $footer ?>
    </footer>

    <script>
    </script>
</body>

</html>