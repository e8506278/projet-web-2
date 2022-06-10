<?php include('./controller/Enregistrement.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement | Vino</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800&family=Lato:ital,wght@0,100;0,300;0,400;0,700;1,100;1,300;1,400;1,700&family=Poiret+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,0" />
    <link rel="stylesheet" href="./css/styles.css">

    <script defer src="./js/enregistrement.js"></script>
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

<body class="main-connexion">
    <div class="section-wrapper wrapper-center">
        <div class="main-section">
            <div class="entete">
                <h2 class="">Vino - Enregistrement</h2>
            </div>

            <form class="formulaire" action="" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="usager_nom" data-js-nom placeholder="Votre nom" value="<?php echo $nom ?>" />

                    <?php if (isset($erreurs['usager_nom'])) : ?>
                        <span class="message-erreur" data-js-nom-err><?= $erreurs['usager_nom'] ?></span>
                    <?php else : ?>
                        <span class="aucune-erreur" data-js-nom-err>&nbsp;</span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <textarea class="form-control" name="usager_adresse" data-js-adresse placeholder="Votre adresse"><?php echo $adresse ?></textarea>

                    <?php if (isset($erreurs['usager_adresse'])) : ?>
                        <span class="message-erreur" data-js-adresse-err><?= $erreurs['usager_adresse'] ?></span>
                    <?php else : ?>
                        <span class="aucune-erreur" data-js-adresse-err>&nbsp;</span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="usager_ville" data-js-ville placeholder="Votre ville" value="<?php echo $ville ?>" />

                    <?php if (isset($erreurs['usager_ville'])) : ?>
                        <span class="message-erreur" data-js-ville-err><?= $erreurs['usager_ville'] ?></span>
                    <?php else : ?>
                        <span class="aucune-erreur" data-js-ville-err>&nbsp;</span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <select name="usager_pays_id" class="form-control" data-js-pays>
                        <option value="0">Votre pays</option>

                        <?php
                        foreach ($lesPays as $unPays) {
                        ?>
                            <option value="<?= $unPays['id']; ?>" <?php if ($pays_id == $unPays['id']) {
                                                                        echo ' selected="selected"';
                                                                    } ?>> <?= $unPays['nom'] ?> </option>
                        <?php
                        }
                        ?>
                    </select>

                    <?php if (isset($erreurs['usager_pays_id'])) : ?>
                        <span class="message-erreur" data-js-pays-err><?= $erreurs['usager_pays_id'] ?></span>
                    <?php else : ?>
                        <span class="aucune-erreur" data-js-pays-err>&nbsp;</span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="usager_telephone" data-js-telephone placeholder="Votre numéro de téléphone" value="<?php echo $telephone ?>" />

                    <?php if (isset($erreurs['usager_telephone'])) : ?>
                        <span class="message-erreur" data-js-telephone-err><?= $erreurs['usager_telephone'] ?></span>
                    <?php else : ?>
                        <span class="aucune-erreur" data-js-telephone-err>&nbsp;</span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <div class="date-container">
                        <select name="usager_naissance[jour]" class="form-control" data-js-ddn-jour>
                            <option value="0">Jour</option>

                            <?php
                            for ($i = 1; $i <= 31; $i++) {
                            ?>
                                <option value="<?= $i; ?>" <?php if ($jour == $i) {
                                                                echo ' selected="selected"';
                                                            } ?>> <?= $i ?> </option>
                            <?php
                            }
                            ?>
                        </select>

                        <select name="usager_naissance[mois]" class="form-control" data-js-ddn-mois>
                            <option value="0">Mois</option>

                            <?php
                            $nbMois = count($lesMois);
                            $moisIndice = -1;

                            if (isset($mois) && $mois > 0) {
                                $moisIndice = $mois - 1;
                            }

                            for ($i = 0; $i < $nbMois; $i++) {
                            ?>
                                <option value="<?= $i + 1; ?>" <?php if ($moisIndice == $i) {
                                                                    echo ' selected="selected"';
                                                                } ?>> <?= $lesMois[$i] ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                        <select name="usager_naissance[annee]" class="form-control" data-js-ddn-annee>
                            <option value="0">Année</option>

                            <?php
                            for ($i = 2022; $i >= 1900; $i--) {
                            ?>
                                <option value="<?= $i; ?>" <?php if ($annee == $i) {
                                                                echo ' selected="selected"';
                                                            } ?>> <?= $i ?> </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <?php if (isset($erreurs['usager_naissance'])) : ?>
                        <span class="message-erreur" data-js-ddn-err><?= $erreurs['usager_naissance'] ?></span>
                    <?php else : ?>
                        <span class="aucune-erreur" data-js-ddn-err>&nbsp;</span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="usager_courriel" data-js-courriel placeholder="Votre courriel" value="<?php echo $courriel ?>" />

                    <?php if (isset($erreurs['usager_courriel'])) : ?>
                        <span class="message-erreur" data-js-courriel-err><?= $erreurs['usager_courriel'] ?></span>
                    <?php else : ?>
                        <span class="aucune-erreur" data-js-courriel-err>&nbsp;</span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="usager_nom_utilisateur" data-js-utilisateur placeholder="Entrez un nom d'utilisateur" value="<?php echo $utilisateur ?>" />

                    <?php if (isset($erreurs['usager_nom_utilisateur'])) : ?>
                        <span class="message-erreur" data-js-utilisateur-err><?= $erreurs['usager_nom_utilisateur'] ?></span>
                    <?php else : ?>
                        <span class="aucune-erreur" data-js-utilisateur-err>&nbsp;</span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="usager_mot_de_passe" data-js-mdp placeholder="Entrez un mot de passe" value="" />

                    <?php if (isset($erreurs['usager_mot_de_passe'])) : ?>
                        <span class="message-erreur" data-js-mdp-err><?= $erreurs['usager_mot_de_passe'] ?></span>
                    <?php else : ?>
                        <span class="aucune-erreur" data-js-mdp-err>&nbsp;</span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="confirmer_mot_de_passe" data-js-confirmer placeholder="Retapez le mot de passe" value="" />

                    <?php if (isset($erreurs['confirmer_mot_de_passe'])) : ?>
                        <span class="message-erreur" data-js-confirmer-err><?= $erreurs['confirmer_mot_de_passe'] ?></span>
                    <?php else : ?>
                        <span class="aucune-erreur" data-js-confirmer-err>&nbsp;</span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <div class="conditions-wrapper">
                        <input type="checkbox" name="accepter_conditions" id="accepter_conditions" <?php if ($conditions) echo ' checked="checked"'; ?> data-js-conditions />
                        <label for="accepter_conditions">J'accepte les termes et conditions d'utilisation du site</label>
                    </div>

                    <?php if (isset($erreurs['accepter_conditions'])) : ?>
                        <span class="message-erreur" data-js-conditions-err><?= $erreurs['accepter_conditions'] ?></span>
                    <?php else : ?>
                        <span class="aucune-erreur" data-js-conditions-err>&nbsp;</span>
                    <?php endif; ?>
                </div>

                <div class="form-group btn-group">
                    <button type="submit" class="bouton-secondaire" name="soumettre" data-js-btn-submit>M'enregistrer</button>
                </div>
                <div>
                    <p>Vous avez déjà un compte? <a href="./index.php?requete=connecter">Connectez-vous</a></p>
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