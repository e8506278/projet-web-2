<?php include('./controller/Connexion.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | Vino</title>

    <link rel="stylesheet" href="./css/styles.css">

    <script defer src="./js/connexion.js"></script>
</head>
<<<<<<< HEAD
<div class="hero hero--pad-haut">
	<div class="hero__titre">vino
		<div class="hero__stitre">Gestion de celliers</div>	
	</div>
	<!--Image hero-->
	<div class="hero__img-wrapper">
		<img class="hero__img--hauteur " src="./assets/img/unebouteille.jpg" alt="hero">
	</div>
</div>
<body class="main">
=======

<body class="main-connexion">
>>>>>>> sprint01
    <div class="section-wrapper wrapper-center">
        <div class="main-section">
            <div class="entete">
                <h2 class="">Connexion</h2>
            </div>

            <form class="formulaire" action="" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="usager_nom_utilisateur" data-js-utilisateur placeholder="Entrez votre nom d'utilisateur" value="" />
                    <span class="aucune-erreur" data-js-utilisateur-err>&nbsp;</span>

                    <?php if (isset($erreurs['usager_nom_utilisateur']))
                        echo '<span class="message-erreur">' . $erreurs['usager_nom_utilisateur'] . '</span>';
                    ?>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="usager_mot_de_passe" data-js-mdp placeholder="Entrez votre mot de passe" value="" />
                    <span class="aucune-erreur" data-js-mdp-err>&nbsp;</span>

                    <?php if (isset($erreurs['usager_mot_de_passe']))
                        echo '<span class="message-erreur">' . $erreurs['usager_mot_de_passe'] . '</span>';
                    ?>
                </div>

                <div class="form-group btn-group">
                    <button type="submit" class="bouton-secondaire" name="soumettre" data-js-btn-submit>Me connecter</button>
                </div>

                <div>
                    <p>Vous n'avez pas de compte? <a href="./index.php?requete=enregistrer">Enregistrez-vous</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>