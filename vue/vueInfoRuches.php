<?php


if ($utilisateur[0]['Statut'] == 'admin') {
    $header = HEADER_admin;
} else {
    $header = HEADER_connecté;
}
$footer = Footer_déconnecté;

$content = "";

// graphique pour l'humidité
$graphhumid = "";

// graphique pour la température

$graphhtemp = "";

$markers = "";

if (count($getruche)) {
    $i = $getruche[0]["ID_Ruches"];

    if (isset($ruches->$i)) {
        $mapcenter = "var map = L.map('map').setView([" . $ruches->$i->gps[0] . ", " . $ruches->$i->gps[1] . "], 13);";
    } else {
        $mapcenter = "";
    }

    foreach ($getruche as $r) {
        $i = $r["ID_Ruches"];

        if(isset($ruches->$i)){
            
            $markers .= 'var marker'.$i.' = L.marker(['.$ruches->$i->gps[0].', '.$ruches->$i->gps[1].']).addTo(map);';
            var_dump('oui');
        }
        else{
            $markers .= "";
        }

        $notesingle = afficher_notes($i);
        $compter_note = 0;
        $bouton_note = "";
        if (!empty($notesingle)) {
            var_dump('marche');
            $id_conteneur = $notesingle[0]['ID_Ruches'];
            $contenunote = html_entity_decode($notesingle[0]['Contenu']);
        } else {
            var_dump('marche pas');
        }

        if (file_exists('img/imported/' . $r['ID_Ruches'] . '.jpg')) {
            $phototest = 'img/imported/' . $r['ID_Ruches'] . '.jpg';
            // Si l'image existe, l'affiche
        } else if (file_exists('img/imported/' . $ligne['ID_Ruches'] . '.png')) {
            $phototest = 'img/imported/' . $r['ID_Ruches'] . '.png';
        } else {
            // Sinon, affiche une image par défaut
            $phototest = 'img/imported/no_image_ruche.png';
        }

        $total = [];

        if (isset($ruches->$i)) {
            foreach ($ruches->$i->data as $valeur) {
                $total[] = $valeur->temperature;
            }
        } else {
            $total[] = '';
        }


        $variable = join(",", $total);
        $total2 = [];

        if (isset($ruches->$i)) {
            foreach ($ruches->$i->data as $valeur) {
                $total2[] = $valeur->humidite;
            }
        } else {
            $total2[] = "";
        }

        $variable2 = join(",", $total2);

        if (count($notesingle) > 0) {

            if (count($notesingle) > 3) {
                $first_note = $notesingle[0];
                $sec_note = $notesingle[1];
                $trois_note = $notesingle[2];

                $bouton_note .= "<div id='" . $first_note['ID_note'] . "' class='bouton_note'>Note n°1</div><div id='" . $sec_note['ID_note'] . "' class='bouton_note'>Note n°2</div><div id='" . $trois_note['ID_note'] . "' class='bouton_note'>Note n°3</div>";

            } else {
                foreach ($notesingle as $test) {
                    $compter_note = $compter_note + 1;
                    $bouton_note .= '<div id="' . $test['ID_note'] . '" class="bouton_note">Note n°' . $compter_note . '</div>';
                }
            }

            $noteexist = '<p>Note n°' . $notesingle[0]["ID_note"] . ' : note du ' . $notesingle[0]["Date"] . '</p><p>' . $contenunote . '</p>';

        } else {
            $noteexist = "<div class='reponse'>Aucune note pour cette ruche</div>";
        }
        if (isset($ruches->$i)) {

            $content .= "<div class='ruche_informations_contour'>
            <h2>Ruche n°" . $i . " : " . $r['nom'] . " </h2>
            <div class='ruche_informations'>
                <div class='informations_base_note'>
                    <div class='flex_image_info'>
                        <div class='image_ruche'>
                            <img src='../" . $phototest . "' alt='photo_ruche'>
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
                                " . $bouton_note . "
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
                        <div class='note' id='" . $id_conteneur . "'>
                            " . $noteexist . "
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

        } else {
            $content .= "Nous avons sans le vouloir accepté une ruche qui n'existe pas, nous nous en excusons, pouvez vous supprimer cette dernière ou contacter un administrateur ?";
        }



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
} else {
    $content .= "Vous n'avez aucune ruche.";
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
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>

<body>
    <header>
        <?= $header ?>
    </header>

    <div class="fixed_carte">
        <div id="map"></div>
    </div>

    <div class="formulaire">
        <form action="<?= $_SERVER['PHP_SELF'] . '?page=ajoutNote' ?>" method="post">
            <h2>Ajouter une note</h2>
            <div class="ajout_ruches">
                <div class="nom_ruche">
                    <div>Note de la ruche N°xxxxxx</div>
                    <input type="number" name="ruchelien" required>
                </div>
            </div>
            <div id="editor">

            </div>
            <div class="area_et_hidden">
                <input type="hidden" class="inclusion" name="contenu" required>
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
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script>


        <?= $graphhumid ?>

        <?= $graphhtemp ?>


        setInterval(actualiser, 1000);


        function actualiser() {
            let carote = document.querySelector('#editor>.ql-editor').innerHTML
            document.querySelector('.inclusion').value = carote
            console.log(document.querySelector('.inclusion').value)
        }

        const quill = new Quill('#editor', {
            theme: 'snow'
        });

        <?= $mapcenter ?>
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        <?= $markers ?>

    </script>
</body>

</html>