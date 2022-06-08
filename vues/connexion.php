<?php include('./controller/Connexion.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | Vino</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800&family=Lato:ital,wght@0,100;0,300;0,400;0,700;1,100;1,300;1,400;1,700&family=Poiret+One&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,0" />
    <link rel="stylesheet" href="./css/styles.css">

    <script defer src="./js/connexion.js"></script>
</head>
<div class="hero hero--pad-haut">
	<div class="hero__titre">vino
		<div class="hero__stitre">Gestion de celliers</div>	
	</div>
	<!--Image hero-->
	<div class="hero__img-wrapper">
		<img class="hero__img--hauteur " src="./assets/img/unebouteille.jpg" alt="hero">
	</div>
</div>
<section class="section-wrapper t-p">
	
<h1 class="t-p__titre">La meilleure application de gestion de cellier disponible sur le marché</h1>
	<article class="t-p__contenu">
		<p class="t-p__texte">Vino est l'application la plus complète sur le marché vous permettant de gerer jusqu'à <span class="text-photo__texte--gras">10 celliers différents</span>. 
			Simple à utiliser, l'application vous tiendra à jour des vins <span class="text-photo__texte--gras">prêts à boire</span>, vous permet d'y tenir une <span class="text-photo__texte--gras">liste d'achat</span> et d'avoir des <span class="text-photo__texte--gras">statistiques</span> sur les entrées et sorties des vins de votre cellier.
			<br>
           
				 Commencez dès aujourd'hui à gérer vos celliers!<br>
				
					<span class="boite-double__texte--couleur">&#10148;</span> Possibilité de plusieurs celliers.<br>
					<span class="boite-double__texte--couleur">&#10148;</span> Recherchez des bouteilles et ajoutez les à votre cellier.<br>
					<span class="boite-double__texte--couleur">&#10148;</span> Faites votre liste d'achat, partagez sur les réseaux sociaux et bien plus!
                   
			
		</p>
		<div class="t-p__img">
			<img  src="./assets/img/cellier.jpg" alt="degustation2">
		</div>	
	</article>
</section>
<body class="main">
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
    <footer class="section-wrapper pied">
				<nav class="pied__nav">
					<div class="pied__logo">
						VINO
						<div class="pied__logo-stitre">Gestion de cellier</div>
					</div>
					<div class="pied__listes">
						<ul class="pied__liste">
						<!--	<li ><a href="#" class="pied__liens">Mon compte</a></li>
							<li ><a href="?requete=mesCelliers" class="pied__liens">Mes celliers</a></li>
							<li ><a href="?requete=listeBouteille" class="pied__liens">Mes bouteilles</a></li>-->
						</ul>
						<!--
						<ul class="pied__liste">
							<li ><a href="#" class="pied__liens">Mes listes</a></li>
							<li ><a href="#" class="pied__liens">Mes statistiques</a></li>
							<li ><a href="#" class="pied__liens">Contactez-nous</a></li>
						</ul>
						<ul class="pied__liste">
							<li ><a href="#" class="pied__liens"><i><svg class="pied__icone" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"/></svg></i></a></li>
							<li ><a href="#" class="pied__liens"><i><svg class="pied__icone" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224,202.66A53.34,53.34,0,1,0,277.36,256,53.38,53.38,0,0,0,224,202.66Zm124.71-41a54,54,0,0,0-30.41-30.41c-21-8.29-71-6.43-94.3-6.43s-73.25-1.93-94.31,6.43a54,54,0,0,0-30.41,30.41c-8.28,21-6.43,71.05-6.43,94.33S91,329.26,99.32,350.33a54,54,0,0,0,30.41,30.41c21,8.29,71,6.43,94.31,6.43s73.24,1.93,94.3-6.43a54,54,0,0,0,30.41-30.41c8.35-21,6.43-71.05,6.43-94.33S357.1,182.74,348.75,161.67ZM224,338a82,82,0,1,1,82-82A81.9,81.9,0,0,1,224,338Zm85.38-148.3a19.14,19.14,0,1,1,19.13-19.14A19.1,19.1,0,0,1,309.42,189.74ZM400,32H48A48,48,0,0,0,0,80V432a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V80A48,48,0,0,0,400,32ZM382.88,322c-1.29,25.63-7.14,48.34-25.85,67s-41.4,24.63-67,25.85c-26.41,1.49-105.59,1.49-132,0-25.63-1.29-48.26-7.15-67-25.85s-24.63-41.42-25.85-67c-1.49-26.42-1.49-105.61,0-132,1.29-25.63,7.07-48.34,25.85-67s41.47-24.56,67-25.78c26.41-1.49,105.59-1.49,132,0,25.63,1.29,48.33,7.15,67,25.85s24.63,41.42,25.85,67.05C384.37,216.44,384.37,295.56,382.88,322Z"/></svg></i></a></li>
							<li ><a href="#" class="pied__liens"><i><svg class="pied__icone" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-48.9 158.8c.2 2.8.2 5.7.2 8.5 0 86.7-66 186.6-186.6 186.6-37.2 0-71.7-10.8-100.7-29.4 5.3.6 10.4.8 15.8.8 30.7 0 58.9-10.4 81.4-28-28.8-.6-53-19.5-61.3-45.5 10.1 1.5 19.2 1.5 29.6-1.2-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7 4.9 18.9 7.9 29.6 8.3a65.447 65.447 0 0 1-29.2-54.6c0-12.2 3.2-23.4 8.9-33.1 32.3 39.8 80.8 65.8 135.2 68.6-9.3-44.5 24-80.6 64-80.6 18.9 0 35.9 7.9 47.9 20.7 14.8-2.8 29-8.3 41.6-15.8-4.9 15.2-15.2 28-28.8 36.1 13.2-1.4 26-5.1 37.8-10.2-8.9 13.1-20.1 24.7-32.9 34z"/></svg></i></a></li>
						</ul>
-->
					</div>	
				</nav>
			</footer>
</body>

</html>