<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Un petit verre de vino</title>

		<meta charset="utf-8">
		<meta http-equiv="cache-control" content="no-cache">
		<meta name="viewport" content="width=device-width, minimum-scale=0.5, initial-scale=1.0, user-scalable=yes">

		<meta name="description" content="Un petit verre de vino">
		<meta name="author" content="Jonathan Martel (jmartel@cmaisonneuve.qc.ca)">

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800&family=Lato:ital,wght@0,100;0,300;0,400;0,700;1,100;1,300;1,400;1,700&family=Poiret+One&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,0" />
		<link rel="stylesheet" href="./css/styles.css" type="text/css" media="screen">
		<base href="<?php echo BASEURL; ?>">

		<script src="./js/modal.js" defer></script>

		<script src="./js/main.js"></script>

	</head>

	<header>
			<nav class="nav">
				<a  href="?requete=accueil" class="nav__logo">VINO</a>
				<ul class="nav__liste">
				<li><a class="nav__lien" href="#"></a></li>
					<li><a class="nav__lien" href="?requete=mesCelliers">Mes celliers</a></li>
					<li><a class="nav__lien" href="?requete=deconnecter">Déconnexion</a></li>
				</ul>
			</nav>
		</header>

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
			
		</p>
		<div class="t-p__img">
			<img  src="./assets/img/cellier.jpg" alt="degustation2">
		</div>	
	</article>
</section>




<!--Page d'accueil connecté-->
<section class="section-wrapper banderole">
			<div class="grille grille--3 ">
				<div class="banderole__contenant">
					<div>Celliers</div>
					<div>2</div>
				</div>
				<div class="banderole__contenant">
					<div>Bouteilles</div>
					<div>50</div>
				</div>
				<div class="banderole__contenant">
					<div>À boire</div>
					<div>2</div>
				</div>
			
			</div>
		</section>
		<section  class="section-wrapper vignette vignette--bgcouleur">

			<h4 class="vignette__entete">Gérer mes collections</h4>
			<br>

			<div class="grille grille--4">
				<a href="?requete=mesCelliers">
					<figure class="vignette__wrapper">
						<img class="vignette__img" src="./assets/img/cellier2.jpg" alt="cellier">
						<figcaption class="vignette__titre">Mes celliers</figcaption>
					</figure>
				</a>
				
				<a href="?requete=listeBouteille">
					<figure class="vignette__wrapper">
						<img class="vignette__img" src="./assets/img/bouteilles1.jpg" alt="bouteille">
						<figcaption class="vignette__titre">Mes bouteilles</figcaption>
					</figure>
				</a>
				<a href="?requete=ajouterNouvelleBouteilleCellier">
					<figure class="vignette__wrapper">
						<img class="vignette__img" src="./assets/img/bouchonblanc.jpg" alt="bouteilles">
						<figcaption class="vignette__titre">Ajouter une bouteille</figcaption>
					</figure>
				</a>
				<a href="">
					<figure class="vignette__wrapper">
						<img class="vignette__img" src="./assets/img/etagere.jpg" alt="bouteilles">
						<figcaption class="vignette__titre">Mes listes</figcaption>
					</figure>
				</a>
			</div>
			
		</section>
		<section class="section-wrapper vignette">
			<h4 class="vignette__entete">Gérer mon compte</h4>
			<br>
			<div class="grille grille--4">
				<a href="">
					<figure class="vignette__wrapper">
						<img class="vignette__img" src="./assets/img/degustation2.jpg" alt="cellier">
						<figcaption class="vignette__titre">Mes informations</figcaption>
					</figure>
				</a>
				

				<a href="">
					<figure class="vignette__wrapper">
						<img class="vignette__img" src="./assets/img/bouteilleblancrouge.jpg" alt="cellier">
						<figcaption class="vignette__titre">Mes statistiques</figcaption>
					</figure>
				</a>
			</div>
			
		</section>


