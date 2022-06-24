<?php include('./controller/Connexion.php'); ?>


<!--HERO-->
<div class="hero hero--pad-haut">
    <div class="hero__titre">vino
        <div class="hero__stitre">Gestion de celliers</div>
    </div>
    <!--Image hero-->
    <div class="hero__img-wrapper">
        <img class="hero__img--hauteur " src="./assets/img/unebouteille.jpg" alt="hero">
    </div>
</div>

<!--CONNEXION-->
<section class="main-connexion">
    <div class="section-wrapper wrapper-center">
        <div class="main-section">
            <div class="entete">
                <h2 class="">Connexion</h2>
            </div>

            <?php if (isset($erreurs['usager_non_connecte'])) : ?>
                <span class="message-erreur" data-js-connexion-err><?= $erreurs['usager_non_connecte'] ?></span>
            <?php endif; ?>

            <form class="formulaire" action="./index.php?requete=accueil" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="usager_nom_utilisateur" data-js-utilisateur placeholder="Entrez votre nom d'utilisateur" value="<?php echo $utilisateur ?>" />

                    <?php if (isset($erreurs['usager_nom_utilisateur'])) : ?>
                        <span class="message-erreur" data-js-utilisateur-err><?= $erreurs['usager_nom_utilisateur'] ?></span>
                    <?php else : ?>
                        <span class="aucune-erreur" data-js-utilisateur-err>&nbsp;</span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="usager_mot_de_passe" data-js-mdp placeholder="Entrez votre mot de passe" />

                    <?php if (isset($erreurs['usager_mot_de_passe'])) : ?>
                        <span class="message-erreur" data-js-mdp-err><?= $erreurs['usager_mot_de_passe'] ?></span>
                    <?php else : ?>
                        <span class="aucune-erreur" data-js-mdp-err>&nbsp;</span>
                    <?php endif; ?>
                </div>

                <div class="form-group btn-group">
                    <button type="submit" class="bouton-secondaire" name="soumettre" data-js-btn-submit >Me connecter</button>
                </div>

                <div>
                    <p>Vous n'avez pas de compte? <a href="./index.php?requete=enregistrer">Enregistrez-vous</a></p>
                </div>
            </form>
        </div>
    </div>
</section>

<!--PROMO APP-->
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
        <!--Image-->
        <div class="t-p__img">
            <img src="./assets/img/cellier.jpg" alt="degustation2">
        </div>
    </article>
</section>

                    

