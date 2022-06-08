<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | Vino</title>

    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/connexion.css">

    <script defer src="../js/connexion.js"></script>
</head>

<body>
    <div class="wrapper-center">
        <div class="main">
            <div class="entete">
                <h2 class="">Connexion</h2>
            </div>

            <form class="formulaire" action="/" method="GET">
                <ul class="wrapper-message hidden"></ul>

                <div class="form-group">
                    <input type="text" class="form-control" name="usager_nom_utilisateur" data-js-utilisateur placeholder="Entrez votre nom d'utilisateur" value="">
                    <span>&nbsp;</span>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="usager_mot_de_passe" data-js-mdp placeholder="Entrez votre mot de passe" value="">
                    <span>&nbsp;</span>
                </div>

                <div class="form-group btn-group">
                    <button type="submit" class="bouton-secondaire" data-js-btn-submit>Me connecter</button>
                </div>

                <div>
                    <p>Vous n'avez pas de compte? <a href="">Enregistrez-vous ici</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>