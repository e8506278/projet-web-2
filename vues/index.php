<!--Page d'accueil non connecté-->

<section class="section-wrapper texte-photo">
	
<h1 class="texte-photo__titre">La meilleure application de gestion de cellier disponible sur le marché</h1>
	<article class="texte-photo__contenu">
		

		<p class="texte-photo__texte">Vino est l'application la plus complète sur le marché vous permettant de gerer jusqu'à <span class="text-photo__texte--gras">10 celliers différents</span>. 
			Simple à utiliser, l'application vous tiendra à jour des vins <span class="text-photo__texte--gras">prêts à boire</span>, vous permet d'y tenir une <span class="text-photo__texte--gras">liste d'achat</span> et d'avoir des <span class="text-photo__texte--gras">statistiques</span> sur les entrées et sorties des vins de votre cellier.
			
		</p>
		<div class="texte-photo__img">
			<img  src="./assets/img/cellier.jpg" alt="degustation2">
		</div>

		
	</article>

</section>
<section class="section-wrapper">
	<div class="boite-double">
		<!--LOGIN-->
		<div class="boite-double__contenant-form">
			<h3>Connectez-vous</h3>
			<form class="formulaire">
				<div class="formulaire__champs boite-double__champs">
					<input placeholder="Nom d'usager">
				</div>
				<div class="formulaire__champs boite-double__champs">
					<input placeholder="Mot de passe">
				</div>
				<div class="formulaire__champs">
					<button class="bouton-secondaire ">Se connecter</button>
				</div>	
			</form>
		</div>
		<!--S'INSCRIRE-->
		<div class="boite-double__contenant-texte">
			<h3>Vous n'avez-pas de compte?</h3>
			<div>
				<p class="boite-double__texte"> Commencez dès aujourd'hui à gérer vos celliers!</p>
				<ul>
					<li><span class="boite-double__texte--couleur">&#10148;</span> Possibilité de plusieurs celliers.</li>
					<li><span class="boite-double__texte--couleur">&#10148;</span> Recherchez des bouteilles et ajoutez les à votre cellier.</li>
					<li><span class="boite-double__texte--couleur">&#10148;</span> Faites votre liste d'achat, partagez sur les réseaux sociaux et bien plus!</li>
				</ul>
			</div>
			<div class="boite-double__texte-bouton">
				<button class="bouton-secondaire ">Je m'inscris!</button>
			</div>
		</div>
	</div>
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


