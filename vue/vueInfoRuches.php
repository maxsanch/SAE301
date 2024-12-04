<?php

require "../config/config.php";

$header = HEADER_Déconnecté;


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information ruches</title>
    <link rel="stylesheet" media="(min-width: 620px)" href="../styles/styles_commun_ordinateur.css">
    <link rel="stylesheet" href="../styles/styles_commun_mobile.css">
    <link rel="stylesheet" href="../styles/inforuches.css">
</head>

<body>
    <header>
        <?= $header ?>
    </header>
    <!-- div globale qui entoure tout le titre -->
    <div class="haut_titre_soustitre">
        <!-- div pour centrer le titre -->
        <div class="centre_haut_titre">
            <h1>Mes ruches</h1>
            <p>Trouvez rapidement vos ruches</p>
        </div>
    </div>
    <div class="filtre_contour">
        <!-- filtre pour trouver sa ruche facilement -->
        <div class="filtre">
            <div class="recolte">
                <p>Prêt pour la récolte</p>
                <input type="checkbox" class="checkbox">
            </div>
            <!-- div contenant les menus et leurs titre -->
            <div class="menus_deroulant">
                <p>Battement d'ailes</p>
                <!-- le menu déroulant -->
                <div class="menu_deroulant">
                    <div class="information">
                        > 200 bps
                    </div>
                    <div class="fleche">
                        <img src="../img/icone_fleche_bas.svg" alt="fleche vers le bas">
                    </div>
                    <div class="absolute_deroulant">
                        <div class="choix">> 150 bps</div>
                        <div class="choix">> 200 bps</div>
                        <div class="choix">> 250 bps</div>
                        <div class="choix">> 350 bps</div>
                    </div>
                </div>
            </div>
            <!-- div contenant les menus et leurs titre -->
            <div class="menus_deroulant">
                <p>Température</p>
                <!-- le menu déroulant -->
                <div class="menu_deroulant">
                    <div class="information">
                        20-30 °
                    </div>
                    <div class="fleche">
                        <img src="../img/icone_fleche_bas.svg" alt="fleche vers le bas">
                    </div>
                </div>
            </div>
            <!-- div contenant les menus et leurs titre -->
            <div class="menus_deroulant">
                <p>Poid du miel</p>
                <!-- le menu déroulant -->
                <div class="menu_deroulant">
                    <div class="information">
                        20-30 kg
                    </div>
                    <div class="fleche">
                        <img src="../img/icone_fleche_bas.svg" alt="fleche vers le bas">
                    </div>
                </div>
            </div>
            <!-- div contenant les menus et leurs titre -->
            <div class="menus_deroulant">
                <!-- le menu déroulant -->
                <div class="menu_deroulant">
                    <div class="information">
                        Ruche n°1
                    </div>
                    <div class="fleche">
                        <img src="../img/icone_fleche_bas.svg" alt="fleche vers le bas">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ruche_informations_contour">
        <h2>Ruche n°1 : [nom]</h2>
        <div class="ruche_informations">
            <div class="informations_base_note">
                <div class="flex_image_info">
                    <div class="image_ruche">
                        <img src="../img/photo_ruche.jpg" alt="photo_ruche">
                    </div>
                    <div class="informations_ruche">
                        <p>Humidité actuelle : <b>40 %</b></p>
                        <p>Température interne : <b>30 degrés</b></p>
                        <p>Poid du miel : <b>30 kg</b></p>
                        <p>Température externe : <b>20 degrés</b></p>
                        <p>Statut : <b>prêt pour la récolte</b></p>
                    </div>
                </div>
                <div class="boutons_note">
                    <div class="left_button">
                        <b>Gérer les notes</b>
                    </div>
                    <div class="right_button">
                        <b>Ajouter une note</b>
                    </div>
                </div>
                <!-- petit grid juste pour placer le titre correctement par rapport au reste -->
                <div class="grid_placement_titre">
                    <div class="void">

                    </div>
                    <div class="titre_note">
                        Mes notes :
                    </div>
                </div>
                <div class="grid_notes">
                    <div class="boutons">
                        <div class="top_bouton">
                            <div class="bouton_note">
                                Note n°1
                            </div>
                            <div class="bouton_note">
                                Note n°2
                            </div>
                            <div class="bouton_note">
                                Note n°3
                            </div>
                            <div class="bouton_voir_plus">
                                Voir plus
                            </div>
                        </div>
                        <div class="bottom_bouton">
                            <div class="modifier">
                                Modifier
                            </div>
                            <div class="supprimer">
                                Supprimer
                            </div>
                        </div>
                    </div>
                    <div class="note">
                        <p>note n°1 : note du 7 novembre 2024</p>
                        <p>
                            Observation générale : La ruche est en bonne santé, activité intense autour de l’entrée.</p>
                        <p>
                            Température interne : 34,2°C, stable. Les abeilles semblent bien réguler la chaleur malgré
                            la baisse des températures extérieures.</p>
                        <p>Humidité : 65%, légèrement plus élevée que d'habitude, probablement dû à la pluie récente.
                        </p>
                        <p>Remarques : Ajouter un cadre à miel d'ici la fin de la semaine si les prévisions de floraison
                            sont correctes. Surveillance à intensifier sur la semaine prochaine pour anticiper un
                            éventuel essaimage.</p>
                    </div>
                </div>
            </div>
            <div class="espace">

            </div>
            <div class="graphiques">
                <div class="g1">
                    <div class="titre_graphique">
                        Evolution de l'humidité (en %)
                    </div>
                    <div>
                        <canvas id="Ruche1"></canvas>
                    </div>
                </div>
                <div class="g2">
                    <div class="titre_graphique">
                        Evolution de la température (en degrés)
                    </div>
                    <div>
                        <canvas id="Ruche2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('Ruche1');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        const ctx2 = document.getElementById('Ruche2');

        new Chart(ctx2, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


    </script>
</body>

</html>