<?php

$header = HEADER_admin;
$footer = Footer_déconnecté;

$contenu = '';

if (count($GetAllUser)) {
    // Affichage des lignes du tableau
    foreach ($GetAllUser as $ligne) {
        if (file_exists('img/imported/' . $ligne['Id_utilisateur'] . '.jpg')) {
            $phototest = 'img/imported/' . $ligne['Id_utilisateur'] . '.jpg';
            // Si l'image existe, l'affiche
        } else if (file_exists('img/imported/' . $ligne['Id_utilisateur'] . '.png')) {
            $phototest = 'img/imported/' . $ligne['Id_utilisateur'] . '.png';
        } else {
            // Sinon, affiche une image par défaut
            $phototest = 'img/imported/no-user-image.jpg';
        }
        $lesruches = rucheSingleUser($ligne['Id_utilisateur']);
        $contenu .= "<div class='GrandeCase'><div class='PetiteCase'><a href='index.php?page=PhotoUser&idUser=" . $ligne['Id_utilisateur'] . "'><img class='photo' src='../" . $phototest . "' alt=''></a><b>" . $ligne['Prenom'] . "</b><div>Dernière connexion : " . $ligne['connexion'] . "</div><div>Nombre de ruches : " . count($lesruches) . "</div><a class='Information' href='index.php?page=informationsUser&idUser=" . $ligne['Id_utilisateur'] . "'>Information</a></div></div>";
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

if (!empty($usersingle)) {
    $nom = $usersingle[0]['Nom'] . " " . $usersingle[0]['Prenom'];
    $statut = $usersingle[0]['Statut'];
    $mail = $usersingle[0]['Mail'];
    $mdp = $usersingle[0]['MotDePasse'];
    $date = $usersingle[0]['connexion'];
    $idUser = $usersingle[0]['Id_utilisateur'];
    $nbrruche = count($ruchesingleuser);
    $datebis = $usersingle[0]["inscription"];
    $nombrenote = count($count);
    $contentuser = "<div class='pop_up_fixed_info_users'><div class='photo_left'></div><div class='infos'><div class='user_name'><h3>" . $nom . "
                    </h3>
                </div>
                <div class='informations_and_icones'>
                    <div class='info'>
                        <div class='icone'>

                        </div>
                        <div class='texte_info'>
                            <p>Date d'inscription</p>
                            <p>$date</p>
                        </div>
                    </div>
                    <div class='info'>
                        <div class='icone'>

                        </div>
                        <div class='texte_info'>
                            <p>Nombre de notes</p>
                            <p>$nombrenote</p>
                        </div>
                    </div>
                    <div class='info'>
                        <div class='icone'>

                        </div>
                        <div class='texte_info'>
                            <p>Nombre de ruches</p>
                            <p>$nbrruche</p>
                        </div>
                    </div>
                    <div class='info'>
                        <div class='icone'>

                        </div>
                        <div class='texte_info'>
                            <p>Dernière connexion</p>
                            <p>$date</p>
                        </div>
                    </div>
                </div>
                <div class='champs_perso'>
                    <div class='NOM'>
                        <p>Statut de l'utilisateur</p>
                        $statut
                    </div>  
                    <div class='mail'>
                        <p>Email de l'utilisateur</p>
                        <p>$mail</p>  
                    </div>
                    <div class='mdp'>
                        <p>Mot de passe de l'utilisateur</p>
                        <input type='password' disabled value='$mdp'> 
                    </div>
                </div>
                <div class='boutons'>
                    <div class='reset_password'>
                        Reinitialiser le mot de passe
                    </div>
                    <a class='delet_account' href='index.php?page=deletaccount&IDUser=$idUser'>
                        Supprimer le compte
                    </a>
                </div>
            </div></div>";

    $function = "document.querySelector('.reset_password').addEventListener('click', changer)";
} else {
    $contentuser = '';
    $function = "";
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
        <?= $contentuser ?>
        <h2 class="Titre">Gestion des utilisateurs</h2>
        <h3 class="SousTitre">Tableau de bord</h3>
        <div class="Contour">
            <div class="LesElements">
                <div class="Element"><img class="SVG" src="../img/Inscrit.svg" alt="">
                    <div>Nombre d'inscriptions</div>
                    <div class="Chiffre"><?= count($GetAllUser); ?></div>
                </div>
                <div class="Element"><img class="SVG" src="../img/Ruche.svg" alt="">
                    <div>Nombre de ruches enregistrées</div>
                    <div class="Chiffre"><?= count($ruches); ?></div>
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
        <?= $function ?>

        function changer() {
            document.querySelector('.infos').innerHTML = "<form action='<?= $_SERVER['PHP_SELF'] ?>?page=resetpassword&iduser=<?= $usersingle[0]['Id_utilisateur'] ?>' method='post'><h2>Modifier le mot de passe de : <?= $usersingle[0]['Prenom'] ?></h2><div class='mdpreset'><div class='mdpnew'><input placeholder='Entrez le nouveau mot de passe' required type='password' name='mdp'></div><div><div>Confirmez le mot de passe</div><input required placeholder='Confirmer le mot de passe' type='password' name='confirmation'></div></div><button>Envoyer</button></form>"
        }

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