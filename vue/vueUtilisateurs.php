<?php

$header = HEADER_admin;
$footer = Footer_déconnecté;

$contenu = '';

if (count($GetAllUser)) {
    // Affichage des lignes du tableau
    foreach ($GetAllUser as $ligne) {
        $lesruches = rucheSingleUser($ligne['Id_utilisateur']);
        $contenu .= "<div class='GrandeCase'><div class='PetiteCase'><img class='photo' src='../img/appiculteur_admin.jpg' alt=''><b>" . $ligne['Prenom'] . "</b><div>Dernière connexion : " . $ligne['connexion'] . "</div><div>Nombre de ruches : " . count($lesruches) . "</div><div class='Information'>Information</div></div></div>";
    }
} else
    echo "<div class='reponse'>Aucun Utilisateur n'est enregistré</div>";


$demandes_ruches = "";

if (count($demandes)) {
    foreach ($demandes as $ligne) {
        $demandes_ruches .= '<div class="demande"><div class="nom_user">' . $ligne['prenom_utilisateur'] . ' a envoyé une demande de validation de ruche.</div><div class="id_entre">ID rentré par ' . $ligne['prenom_utilisateur'] . ' : ' . $ligne['ID_Ruches'] . '</div><a href="index.php?page=accepter&IdRuche=' . $ligne['ID_Ruches'] . '&IdUtilisateur=' . $ligne['Id_utilisateur'] . '&NomRuche=' . $ligne['nom_ruche'] . '&idDemande=' . $ligne['ID_attente'] . '">Accepter</a><a href="index.php?page=Refuser&idDemande=' . $ligne['ID_attente'] . '">Refuser</a></div>';
    }
} else {
    $demandes_ruches = "Aucune demande n'a été transmise.";
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des utilisateurs</title>
    <link rel="stylesheet" href="../styles/GestionUtilisateur.css">
    <link rel="stylesheet" href="../styles/styles_index_non_connecte.css">
</head>

<body>
    <header>
        <?= $header ?>
    </header>

    <main>
        <div class="pop_up_admin_demande">
            <?= $demandes_ruches ?>
            <?= $message ?>
        </div>
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
            <div class="LeGraph"><canvas id="myChart"></canvas></div>
        </div>
        <h3 class="SousTitre">Utilisateurs</h3>
        <div class="LesUtilisateurs">
            <?= $contenu ?>
        </div>
    </main>

    <footer>
        <?= $footer ?>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
                datasets: [{
                    label: '# of Votes',
                    data: [21, 30, 30, 15, 35, 34, 9, 37, 22, 31, 20, 12],
                    borderWidth: 1,
                    backgroundColor: [
                        'rgb(145, 70, 30)'
                    ]
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
    <!-- <script src="../js/Utilisateurs.js"></script> -->
</body>

</html>