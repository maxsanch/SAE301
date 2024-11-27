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
        <form action="#">
            <div class="connectez">Connectez-vous</div>
            <label>
                <input 
                type="email"
                name="email"
                required
                placeholder="Email"
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
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
                <div>Vous avez déjà un compte ? <span>Inscrivez-vous</span></div>
            </div>
        </form>
    </div>
</body>
</html>