<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/connexion.css">
    <title>Page connexion</title>

</head>
<body>
    <div class="back">
        <div class="photo">
            
        </div>
        <form action="<?= $_SERVER['PHP_SELF']. '?page=login' ?>" method ="post">
            <div class="connectez">Connectez-vous</div>
            <label>
                <input type="email" name="email" required placeholder="Email">
            </label>
            <label>
                <input type="passeword"
                name="MDP"
                required
                placeholder="Mot de passe">
            </label>
            <button>Me connecter</button>
            <hr>
            <div class="inscription">
                <div>Vous n'avez pas de compte ? <span>Inscrivez-vous</span></div>
            </div>
        </form>
    </div>
</body>
</html>