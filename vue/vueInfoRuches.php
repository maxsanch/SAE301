<?php


$header = HEADER_connecté;
$footer = Footer_déconnecté;

$content = "";

// graphique pour l'humidité
$graphhumid = "";

// graphique pour la température

$graphhtemp = "";

foreach ($getruche as $r) {
    $i = $r["ID_Ruches"];
    // var_dump($ruches->$i);
    // var_dump($ruches->$i->data);

    $total = [];
    foreach ($ruches->$i->data as $valeur) {
        $total[] = $valeur->temperature;
    }

    $variable = join(",", $total);
    $total2 = [];
    foreach ($ruches->$i->data as $valeur) {
        $total2[] = $valeur->humidite;
    }

    $variable2 = join(",", $total2);

    $content .= "<div class='ruche_informations_contour'>
        <h2>Ruche n°" . $i . " : " . $r['nom'] . " </h2>
        <div class='ruche_informations'>
            <div class='informations_base_note'>
                <div class='flex_image_info'>
                    <div class='image_ruche'>
                        <img src='../img/photo_ruche.jpg' alt='photo_ruche'>
                    </div>
                    <div class='informations_ruche'>
                        <p>Humidité actuelle : <b>" . $ruches->$i->data[count($ruches->$i->data) - 1]->humidite . " %</b></p>
                        <p>Température interne : <b>" . $ruches->$i->data[count($ruches->$i->data) - 1]->temperature . " °</b></p>
                        <p>Poid du miel : <b>" . $ruches->$i->data[count($ruches->$i->data) - 1]->poids . " kg</b></p>
                        <p>Frequence de battement des ailes: <b>" . $ruches->$i->data[count($ruches->$i->data) - 1]->frequence . " bps</b></p>
                        <p>Statut : <b>prêt pour la récolte</b></p>
                    </div>
                </div>
                <div class='boutons_note'>
                    <div class='left_button'>
                        <b>Gérer les notes</b>
                    </div>
                    <div class='right_button'>
                        <b>Ajouter une note</b>
                    </div>
                </div>
                <!-- petit grid juste pour placer le titre correctement par rapport au reste -->
                <div class='grid_placement_titre'>
                    <div class='void'>

                    </div>
                    <div class='titre_note'>
                        Mes notes :
                    </div>
                </div>
                <div class='grid_notes'>
                    <div class='boutons'>
                        <div class='top_bouton'>
                            <div class='bouton_note'>
                                Note n°1
                            </div>
                            <div class='bouton_note'>
                                Note n°2
                            </div>
                            <div class='bouton_note'>
                                Note n°3
                            </div>
                            <div class='bouton_voir_plus'>
                                Voir plus
                            </div>
                        </div>
                        <div class='bottom_bouton'>
                            <div class='modifier'>
                                Modifier
                            </div>
                            <div class='supprimer'>
                                Supprimer
                            </div>
                        </div>
                    </div>
                    <div class='note'>
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
            <div class='espace'>

            </div>
            <div class='graphiques'>
                <div class='g1'>
                    <div class='titre_graphique'>
                        Evolution de l'humidité (en %)
                    </div>
                    <div>
                        <canvas id='" . $i . "_1'></canvas>
                    </div>
                </div>
                <div class='g2'>
                    <div class='titre_graphique'>
                        Evolution de la température (en degrés)
                    </div><div><canvas id='" . $i . "_2'>
                    </canvas>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>";


    $graphhumid .= "const humid" . $i . " = document.getElementById('" . $i . "_1');

        new Chart(humid" . $i . ", {
            type: 'line',
            data: {
                labels: ['10/12/2023', '11/12/2023', '11/12/2023', '14/12/2023', '15/12/2023', '16/12/2023'],
                datasets: [{
                    label: 'Humidité en %',
                    data: [" . $variable2 . "],
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
        });";

    $graphhtemp .= "const temp" . $i . " = document.getElementById('" . $i . "_2');

        new Chart(temp" . $i . ", {
            type: 'line',
            data: {
                labels: ['10/12/2023', '11/12/2023', '11/12/2023', '14/12/2023', '15/12/2023', '16/12/2023'],
                datasets: [{
                    label: 'Température en degré',
                    data: [" . $variable . "],
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
        });";
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information ruches</title>
    <link rel="stylesheet" media="(min-width: 620px)" href="../styles/styles_index_non_connecte.css">
    <link rel="stylesheet" href="../styles/styles_commun_mobile.css">
    <link rel="stylesheet" href="../styles/inforuches.css">
</head>

<body>
    <header>
        <?= $header ?>
    </header>

    <div class="formulaire">
        <form action="<?= $_SERVER['PHP_SELF'] . '?page=ajoutNote' ?>" method="post">
            <h2>Ajouter une note</h2>
            <div class="ajout_ruches">
                <div class="nom_ruche">
                    <div>Note de la ruche N°xxxxxx</div>
                    <input type="number" name="ruchelien">
                </div>
            </div>
            <!-- Le text area c'est la zone ou l'utilisateur ecrit, le hidden permet l'envoie dans la bdd, il n'est pas visible. enlevez al taille et la height dans le style final-->
            <div class="area_et_hidden">
                <input type="text" name="'titre" placeholder="placez votre titre ici.">
                <div class="text_area" contenteditable="true" spellcheck="true" style="background : grey; height : 350px; width : 350px">

                </div>
                <input type="hidden" class="inclusion" name="contenu">
            </div>
            <div class="valider">
                <input type="submit" value="ajouter" name="ok">
            </div>
        </form>
    </div>

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

    <?= $content ?>

    <footer>
        <?= $footer ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>


        <?= $graphhumid ?>

        <?= $graphhtemp ?>


        setInterval(actualiser, 1000);


        function actualiser() {
            let carote = document.querySelector('.text_area').innerHTML
            document.querySelector('.inclusion').value = carote
            console.log(document.querySelector('.inclusion').value)
        }

    </script>
</body>

</html>