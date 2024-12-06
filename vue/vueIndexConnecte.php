<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruches connectées - Accueil</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" media="(min-width: 620px)" href="../styles/styles_index_non_connecte.css">
    <link rel="stylesheet" href="../styles/styles_commun_mobile.css">

</head>

<body>
    <header>
        <div class="ConteneurHeader">
            <div class="TitreHeader"><span class="RucheHeader">R</span>uches connectées</div>
            <div class="HeaderPartieDroite">
                <a href="index.php?page=Gestion" class="BoutonHeader2">Gestion des ruches</a>
                <a href="index.php?page=Notes" class="BoutonHeader2">Mes notes</a>
                <a href="index.php?page=quitter" class="BoutonHeader2">Se déconnecter</a>
                <a href="index.php?page=Ruches" class="BoutonHeader">Mes ruches</a>
            </div>
        </div>
    </header>

    <div class="Decoration">
        <img class="AbeilleDeco1" src="../img/abeille_fond.png" alt="une petite abeille qui décore la page">
        <img class="AbeilleDeco2" src="../img/abeille_fond.png" alt="une petite abeille qui décore la page">
        <img class="AbeilleDeco3" src="../img/abeille_fond.png" alt="une petite abeille qui décore la page">
        <svg width="1819" height="1184" viewBox="0 0 1819 1184" fill="none" xmlns="http://www.w3.org/2000/svg"
            class="SVG1">
            <path
                d="M1817.41 1.27776C1501.62 350.755 1057.94 435.72 875.573 434.518C667.467 447.632 201.309 615.67 1.52767 1182.91"
                stroke="#CFCFCF" stroke-width="3" stroke-dasharray="10 10" />
        </svg>
        <svg width="2713" height="699" viewBox="0 0 2713 699" fill="none" xmlns="http://www.w3.org/2000/svg"
            class="SVG2">
            <path
                d="M2712.62 688.616C2131.61 751.304 1624.21 426.17 1443.14 255.766C1225.5 76.0547 632.47 -185.393 1.52173 206.506"
                stroke="#CFCFCF" stroke-width="3" stroke-dasharray="10 10" />
        </svg>
        
    </div>
    
    <main>
        <div class="ParentPartie1">
            <div class="Partie1">
                <div class="Partie1Texte">
                    <div class="SousTitre">Optimisez votre apiculture</div>
                    <h1 class="TitrePrincipal">RUCHES CONNECTEES</h1>
                    <div class="Partie1Paragraphe">
                        <p>Le projet des ruches connectées est un projet réalisé par un groupe d’étudiants au sein de
                            l’IUT
                            de Mulhouse. La formation GEII de l’IUT a réalisé un appareil capable d’effectuer
                            différentes
                            mesures au sein des ruches.</p>
                        <p>Retrouvez même vos ruches perdues avec le traceur GPS ! Ce dernier suivra vos ruches et les
                            retrouvera. Ainsi, vous ne pourrez jamais les égarer.</p>
                    </div>
                    <div class="Partie1Bouton">
                        <a href="#Information" class="Partie1Bouton1">Découvrir plus</a>
                        <a href="index.php?page=Ruches" class="Partie1Bouton2">Mes ruches</a>
                    </div>
                </div>
                <div class="Partie1Image">
                    <img src="../img/RucheEtAbeille.png" alt="Des abeille et du miel">
                </div>
            </div>
        </div>

        <div class="ParentPartie4">
            <div class="Partie4">
                <h2 class="Partie4Titre">Mes Ruches</h2>
                <div class="MesRuches">
                    <div class="ContourRuche">
                        <div class="UneRuche">
                            <img class="ImageDeLaRuche" src="../img/TesRuches.png" alt="Tes ruches">
                            <div class="MaRucheTitre">Ruches 1</div>
                            <div class="InfoRuche">Pas encore prête</div>
                            <div class="InfoRuche">température : 16°</div>
                            <a href="index.php?page=Ruches" class="MaRucheBouton">Consulter</a>
                        </div>
                    </div>
                    <div class="ContourRuche">
                        <div class="UneRuche">
                            <img class="ImageDeLaRuche" src="../img/TesRuches.png" alt="Tes ruches">
                            <div class="MaRucheTitre">Ruches 2</div>
                            <div class="InfoRuche">Pas encore prête</div>
                            <div class="InfoRuche">température : 16°</div>
                            <a href="index.php?page=Ruches" class="MaRucheBouton">Consulter</a>
                        </div>
                    </div>
                    <div class="ContourRuche">
                        <div class="UneRuche">
                            <img class="ImageDeLaRuche" src="../img/TesRuches.png" alt="Tes ruches">
                            <div class="MaRucheTitre">Ruches 3</div>
                            <div class="InfoRuche">Pas encore prête</div>
                            <div class="InfoRuche">température : 16°</div>
                            <a href="index.php?page=Ruches" class="MaRucheBouton">Consulter</a>
                        </div>
                    </div>
                </div>
                <div class="ParentPartie4Bouton">
                    <a href="index.php?page=Gestion" class="Partie4Bouton">Ajouter</a>
                </div>
            </div>
        </div>

        <div class="ParentPartie5">
            <div class="Partie5">
                <h2 class="Partie5Titre">Trouve tes ruches</h2>
                <div id="map"></div>
            </div>
        </div>

        <div class="ParentPartie2">
            <div class="Partie2" id="Information">
                <div class="Partie2Image">
                    <img src="../img/GEII.jpg" alt="Les GEII qui ont fait la ruches connectées">
                </div>
                <div class="Partie2Texte">
                    <h2 class="Partie2Titre">Qu'est ce que le projet ruches connectées</h2>
                    <div>
                        <p>Réalisé par les GEII, le projet ruches connectées a d’abord été un projet de fin de semestre.
                        </p>
                        <p>Ce dernier avait un objectif simple : être placé à l’intérieur des ruches de l’IUT dans le
                            but de
                            faciliter la vie des apiculteurs. Ces derniers devaient pouvoir facilement accéder aux
                            informations sur leurs ruches. Pour ce faire, l’appareil a permis la mesure de plusieurs
                            valeurs.</p>
                    </div>
                    <div>
                        <p>voici les mesures prises par l’appareil : </p>
                        <ul>
                            <li>Fréquence de battement des ailes</li>
                            <li>température interieur de a ruche</li>
                            <li>poids du miel</li>
                            <li>température exterieur</li>
                            <li>Humidité dans la ruche</li>
                        </ul>
                        <p>Les informations permetteront ainsi au apiculteurs de retrouver, sur ce site, les
                            informations
                            sur le faitqu’une ruche soit prête ou non.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="ParentPartie3">
            <div class="Partie3">
                <div class="Partie3Image1"></div>
                <div class="Partie3Image2"></div>
                <div class="Partie3Image3"></div>
                <div class="Partie3Image4"></div>
                <div class="Partie3Image5"></div>
                <div class="Partie3Image6"></div>
            </div>
        </div>
    </main>

    <footer>
        <div class="FooterGlobal">
            <div class="FooterPartie1">
                <h3>RUCHES CONNECTEES</h3>
                <div class="BordureFooterGauche">
                    <div>Parce que permettre au apiculteurs une agriculture durable grâce à la technologie est notre
                        devoir,
                        le
                        projet ruche connecté est né et permet au apiculteurs de facilement obtenir toute les
                        informations
                        nécéssaires facilement, avec une simle conneion sur le site !</div>
                    <div>Facilitez vous la vie avec le projet ruches connectées.</div>
                    <a href="#Information" class="FooterBouton1">Découvrir</a>
                </div>
                <div class="ParentFooterLogo">
                    <div class="FooterLogo"><img src="../img/youtube.png" alt="logo de youtube"></div>
                    <div class="FooterLogo"><img src="../img/facebook.png" alt="logo de facebook"></div>
                    <div class="FooterLogo"><img src="../img/instagram.png" alt="logo de instagram"></div>
                </div>
            </div>
            <div class="FooterPartie2Parent">
                <h4>Besoin de nous contacter ?</h4>
                <div class="FooterPartie2">
                    <div class="FooterPartie2SousPartie1">
                        <div>Retrouvez nous pas mail !</div>
                        <div>maxence.sanchez-varas-leclercq@uha.fr</div>
                        <div>alexis.tauleigne@uha.fr</div>
                        <div>noah.goguet@uha.fr</div>
                        <div>gregoire.tournoux@uha.fr</div>
                    </div>
                    <div class="ArrangementDeLaPartie2DuFooter">
                        <div class="FooterPartie2SousPartie2">
                            <div>contactez nous par téléphone !</div>
                            <div>07 83 85 16 54</div>
                            <div>retrouvez nous !</div>
                            <div>61 Rue Albert Camus, 68200 Mulhouse</div>
                        </div>
                        <div class="FooterPartie2SousPartie2">Plan du site</div>
                    </div>
                </div>
                <div class="LienRapides">Lien rapides</div>
                <div class="ListeDesActions">
                    <a href="index.php?page=Notes" class="Actions">Mes notes</a>
                    <a href="index.php?page=Gestion" class="Actions">Gestion des ruches</a>
                    <a href="index.php?page=Ruches" class="Actions">Suivi des ruches</a>
                    <a href="index.php?action=quitter" class="Actions">Se déconnecter</a>
                </div>
            </div>
        </div>
        <div class="FooterPartieBasseBordure"></div>
        <div class="FooterPartieBasse">
            <div>Projet ruches connectées</div>
            <div>Mentions légales</div>
        </div>
    </footer>

    <script src="../js/commun.js"></script>
    <script src="../js/index.js"></script>
</body>

</html>