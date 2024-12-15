<?php

$header = HEADER_connecté;
$footer = Footer_déconnecté;

$contenu = '';

if (count($GetAllUser)) {
    // Affichage des lignes du tableau
        foreach ($GetAllUser as $ligne) {
            $lesruches = rucheSingleUser($ligne['Id_utilisateur']);
            $contenu .= "<div class='GrandeCase'><div class='PetiteCase'><img class='photo' src='../img/appiculteur_admin.jpg' alt=''><b>".$ligne['Prenom']."</b><div>Dernière connexion : ".$ligne['connexion']."</div><div>Nombre de ruches : ".count($lesruches)."</div><div class='Information'>Information</div></div></div>";
        }
} else
    echo "<div class='reponse'>Aucun Utilisateur n'est enregistré</div>";

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
            <div id="myChart"></div>
        </div>
        <h3 class="SousTitre">Utilisateurs</h3>
        <div class="LesUtilisateurs">
            <?= $contenu ?>
        </div>
    </main>

    <footer>
        <?= $footer ?>
    </footer>

    <script>
        const ctx = document.getElementById('myChart');

new Chart(ctx, {
  type: 'bar',
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- <script src="../js/Utilisateurs.js"></script> -->
</body>

</html>