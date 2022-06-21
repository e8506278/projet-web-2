<?php
$listeBouteille = [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/styles.css" type="text/css" media="screen">

    <style>
        .recherche-termes {
            background-color: var(--couleur-accent);
            margin: var(--espace-p);
        }

        .recherche-termes__container {
            width: 100%;
            position: relative;
            display: flex;
        }

        .recherche-termes__donnees {
            border: 3px solid var(--couleur-accent);
            border-right: none;
            flex-grow: 1;
            padding: 5px;
            border-radius: 5px 0 0 5px;
            outline: none;
            color: #9DBFAF;
        }

        .recherche-termes__donnees {
            color: var(--couleur-accent);
        }

        .recherche-termes__bouton {
            width: 40px;
            height: 36px;
            border: 1px solid var(--couleur-accent);
            background-color: var(--couleur-accent);
            background: var(--couleur-accent);
            text-align: center;
            color: #fff;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            font-size: 20px;
        }

        .recherche-termes__note {
            padding: 5px;
            color: #fff;
        }
    </style>

    <script src="./js/rechercheBouteilleCellier.js" defer></script>
</head>

<body>
    <div class="recherche-termes">
        <div class="recherche-termes__container">
            <input type="text" class="recherche-termes__donnees" data-js-termes placeholder="Nom, millesime, pays, region, type de vin, format ou cepage" title="Nom, millesime, pays, region, type de vin, format ou cepage">
            <button type="submit" class="recherche-termes__bouton" data-js-rechercher>
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
        <p class="recherche-termes__note">Note: au moins 3 caractères; pas de mots composés; pas de caractères spéciaux; des mots entiers seulement</p>
    </div>

    <div class="carte__contenant" data-js-carte-contenant>
        <?php for ($i = 0, $l = count($listeBouteille); $i < $l; $i++) {
            $id_cellier = $listeBouteille[$i]["id_cellier"];
            $id_bouteille = $listeBouteille[$i]["id_bouteille"];
            $image_bouteille = $listeBouteille[$i]["image_bouteille"];
            $nom_bouteille = $listeBouteille[$i]["nom_bouteille"];
            $description_bouteille = $listeBouteille[$i]["description_bouteille"];
            $millesime_bouteille = $listeBouteille[$i]["millesime"];
            $quantite_bouteille = $listeBouteille[$i]["quantite_bouteille"];
            $date_achat = $listeBouteille[$i]["date_achat"];
            $prix_bouteille = $listeBouteille[$i]["prix_bouteille"];
            $note = $listeBouteille[$i]["note"];
        ?>
            <a class="carte__lien" href="?requete=details&id_cellier=<?php echo $id_cellier ?>">
                <div class="carte__contenu" data-js-bouteille="<?php echo $id_bouteille ?>">
                    <div class="carte__lien carte--flex">
                        <div class="carte__img">
                            <img src="<?php echo $image_bouteille ?>" alt="bouteille">
                        </div>

                        <div class="carte__description">
                            <div>
                                <div class="carte--flex carte__titre">
                                    <h4 class=""><?php echo $nom_bouteille ?> - <?php echo $millesime_bouteille ?></h4>
                                </div>

                                <div>
                                    <div class="carte__texte">
                                        <?php echo $description_bouteille ?>
                                    </div>
                                    <div class="carte__texte">
                                        Acheté le <?php echo $date_achat ?>
                                    </div>
                                    <div class="carte__texte">
                                        Au prix de <?php echo $prix_bouteille ?>
                                    </div>
                                    <div class="carte__texte">
                                        Ma note est de <?php echo $note ?>/10
                                    </div>
                                </div>
                            </div>

                            <ul class="carte--haut">
                                <li class="carte--aligne-droite">
                                    <form data-js-id="<?php echo $id_bouteille ?>">
                                        <i><svg class="carte__icone" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path d="M507.3 72.57l-67.88-67.88c-6.252-6.25-16.38-6.25-22.63 0l-22.63 22.62c-6.25 6.254-6.251 16.38-.0006 22.63l-76.63 76.63c-46.63-19.75-102.4-10.75-140.4 27.25l-158.4 158.4c-25 25-25 65.51 0 90.51l90.51 90.52c25 25 65.51 25 90.51 0l158.4-158.4c38-38 47-93.76 27.25-140.4l76.63-76.63c6.25 6.25 16.5 6.25 22.75 0l22.63-22.63C513.5 88.95 513.5 78.82 507.3 72.57zM179.3 423.2l-90.51-90.51l122-122l90.51 90.52L179.3 423.2z"></path>
                                            </svg></i>

                                        <button class="bouton btnAjouter">
                                            <i class="carte__icone-petit--espace"><svg class="carte__icone-petit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                    <path d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM256 368C269.3 368 280 357.3 280 344V280H344C357.3 280 368 269.3 368 256C368 242.7 357.3 232 344 232H280V168C280 154.7 269.3 144 256 144C242.7 144 232 154.7 232 168V232H168C154.7 232 144 242.7 144 256C144 269.3 154.7 280 168 280H232V344C232 357.3 242.7 368 256 368z"></path>
                                                </svg></i>
                                        </button>

                                        <span data-js-quantite=""><?php echo $quantite_bouteille ?></span>

                                        <button class="bouton btnBoire">
                                            <i class="carte__icone-petit--espace"><svg class="carte__icone-petit" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                    <path d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM168 232C154.7 232 144 242.7 144 256C144 269.3 154.7 280 168 280H344C357.3 280 368 269.3 368 256C368 242.7 357.3 232 344 232H168z"></path>
                                                </svg></i>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </a>
        <?php } ?>
    </div>
</body>

</html>