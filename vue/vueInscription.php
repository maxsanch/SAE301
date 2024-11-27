<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'inscription</title>
    <link rel="stylesheet" href="../styles/connexion.css">
</head>
<body>
<div class="back">
        <div class="photo">
            
        </div>
        <form action="#">
            <div class="connectez">Inscrivez-vous</div>
            <label>
                <input 
                type="text"
                name="prenom"
                required
                placeholder="Prénom"
                >
            </label>
            <label>
                <input 
                type="text"
                name="nom"
                required
                placeholder="Nom">
            </label>
            <label>
                <input type="passeword"
                name="MDP"
                required
                placeholder="Mot de passe">
            </label>
            <label>
                <input type="passeword"
                name="MDP"
                required
                placeholder="Confirmer le mot de passe">
            </label>
            <label>
                <input type="Checkbox" name="accepter" value="oui">
                <span>Accepter les conditions d'utilisation</span>
            </label>
            <button>Créer mon compte</button>
            <hr>
            <div class="inscription">
                <div>Vous avez déjà un compte ? <span>Connectez-vous</span></div>
            </div>
        </form>
    </div>
    
</body>
</html>