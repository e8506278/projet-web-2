
<?php

// Ouvrir une nouvelle connexion au serveur MySQL
$connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

// Tableau qui contient la liste des erreurs
global $erreurs;

// Les champs à valider
$nom = $adresse = $ville = $utilisateur = $motDePasse = $confirmerMdp = $pays_id = $telephone = $jour = $mois = $annee = $courriel = $conditions =  "";

if (!isset($lesPays)) {
    $sql = "SELECT id, nom FROM generique__pays ORDER BY id";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
    $lesPays = [];

    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $lesPays[] = $row;
    }
}

if (!isset($lesMois)) {
    $lesMois = ["Jan", "Fév", "Mar", "Avr", "Mai", "Jun", "Jul", "Aoû", "Sep", "Oct", "Nov", "Déc"];
}

if (isset($_POST["soumettre"])) {
  
    if (isset($_POST["usager_nom"])) {
        $nom = $_POST["usager_nom"];
    }
    if (isset($_POST["usager_adresse"])) {
        $adresse = $_POST["usager_adresse"];
    }
    if (isset($_POST["usager_ville"])) {
        $ville = $_POST["usager_ville"];
    }
    if (isset($_POST["usager_pays_id"])) {
        $pays_id = $_POST["usager_pays_id"];
    }
    if (isset($_POST["usager_telephone"])) {
        $telephone = $_POST["usager_telephone"];
    }
    if (isset($_POST["usager_naissance"])) {
        $naissance = $_POST["usager_naissance"];
        
    }
    if (isset($_POST["usager_courriel"])) {
        $courriel = $_POST["usager_courriel"];
    }
    if (isset($_POST["usager_nom_utilisateur"])) {
        $utilisateur = $_POST["usager_nom_utilisateur"];
    }
    if (isset($_POST["usager_mot_de_passe"])) {
        $motDePasse = $_POST["usager_mot_de_passe"];
    }
    if (isset($_POST["confirmer_mot_de_passe"])) {
        $confirmerMdp = $_POST["confirmer_mot_de_passe"];
    }
    if (isset($_POST["accepter_conditions"])) {
        $conditions = $_POST["accepter_conditions"];
    }

    if (isset($naissance)) {
        $jour  = $naissance['jour'];
        $mois  = $naissance['mois'];
        $annee = $naissance['annee'];

        $date_naissance = $annee . "-" . $mois . "-" . $jour;
    }

    // Vérifier que les valeurs du formulaire ne soient pas vides
    if (!empty($nom) && !empty($adresse) && !empty($ville) && !empty($pays_id) && !empty($telephone) && !empty($jour) && !empty($mois) && !empty($annee) && !empty($courriel) && !empty($utilisateur) && !empty($motDePasse) && !empty($confirmerMdp) && !empty($conditions)) {
        // Nettoyer les données du formulaire avant de les envoyer à la base de données
        $nom            = mysqli_real_escape_string($connection, $nom);
        $adresse        = mysqli_real_escape_string($connection, $adresse);
        $ville          = mysqli_real_escape_string($connection, $ville);
        $pays_id        = mysqli_real_escape_string($connection, $pays_id);
        $telephone      = mysqli_real_escape_string($connection, $telephone);
        $jour           = mysqli_real_escape_string($connection, $jour);
        $mois           = mysqli_real_escape_string($connection, $mois);
        $date_naissance = mysqli_real_escape_string($connection, $date_naissance);
        $courriel       = mysqli_real_escape_string($connection, $courriel);
        $utilisateur    = mysqli_real_escape_string($connection, $utilisateur);
        $motDePasse     = mysqli_real_escape_string($connection, $motDePasse);
        $confirmerMdp   = mysqli_real_escape_string($connection, $confirmerMdp);
        $conditions     = mysqli_real_escape_string($connection, $conditions);

        // Effectuer les validations
        $estValide = true;

        // Vérifier si l'utilisateur existe déjà
        $sqlValiderUtilisateur = mysqli_query($connection, "SELECT * FROM usager__login WHERE nom_utilisateur = '{$utilisateur}' ");
        $utilisateurTrouve = mysqli_num_rows($sqlValiderUtilisateur);

        if ($utilisateurTrouve > 0) {
            $erreurs['usager_nom_utilisateur'] = "Ce nom d'utilisateur existe déjà.";
            $estValide = false;
        }

        // Vérifier si le courriel existe déjà
        $sqlValiderCourriel = mysqli_query($connection, "SELECT * FROM usager__detail WHERE courriel = '{$courriel}' ");
        $courrielTrouve = mysqli_num_rows($sqlValiderCourriel);

        if ($courrielTrouve > 0) {
            $erreurs['usager_courriel']  = "Ce courriel existe déjà.";
            $estValide = false;
        } else if (!filter_var($courriel, FILTER_VALIDATE_EMAIL)) {
            $erreurs['usager_courriel'] = "Le format du courriel est invalide.";
            $estValide = false;
        }

        if ($estValide) {
            // Vérifier si le mot de passe a la bonne longueur
            $nbCar = strlen($motDePasse);

            if ($nbCar < 8 || $nbCar > 20) {
                $erreurs['usager_mot_de_passe'] = "Le mot de passe doit contenir entre 8 et 20 caractères.";
                $estValide = false;
            }
        }

        if ($estValide) {
            // Générer un jeton d'activation aléatoire
            $jeton = md5(rand() . time());

            // Hachage du mot de passe
            $hachageMdp = password_hash($motDePasse, PASSWORD_BCRYPT);

            // Préparer et exécuter la requête
            $requete = "INSERT INTO usager__login (nom_utilisateur, mot_de_passe, jeton, date_creation, date_modification) 
                        VALUES ('{$utilisateur}', '{$hachageMdp}', '{$jeton}', NOW(), NOW())";

            $sqlQuery = mysqli_query($connection, $requete);

            if (!$sqlQuery) {
                die("La requête à la base de données a échoué: " . mysqli_error($connection));
            } else {
                // On récupère l'id qui vient d'être ajouté car dans la table usager__detail, on utilise le même
                $nouvelId = mysqli_insert_id($connection);

                // Préparer et exécuter la requête
                $requete = "INSERT INTO usager__detail (id, nom, adresse, telephone, courriel, date_naissance, ville, date_creation, date_modification)
                            VALUES ('{$nouvelId}', '{$nom}', '{$adresse}', '{$telephone}', '{$courriel}', '{$date_naissance}', '{$ville}', NOW(), NOW())";

                $sqlQuery = mysqli_query($connection, $requete);

                if (!$sqlQuery) {
                    die("La requête à la base de données a échoué: " . mysqli_error($connection));
                } else {
                    header("Location: ./index.php?requete=connecter");
                }
            }
        }
    } else {
        // Certains champs sont vide. On trouve lesquels et on retourne des erreurs.
        if (empty($nom)) {
            $erreurs['usager_nom'] = "Vous devez entrer votre nom.";
        }
        if (empty($adresse)) {
            $erreurs['usager_adresse'] = "Vous devez entrer votre adresse.";
        }
        if (empty($ville)) {
            $erreurs['usager_ville'] = "Vous devez entrer votre ville.";
        }
        if (empty($pays_id)) {
            $erreurs['usager_pays_id'] = "Vous devez entrer votre pays.";
        }
        if (empty($telephone)) {
            $erreurs['usager_telephone'] = "Vous devez entrer votre téléphone.";
        }
        if (empty($jour)) {
            $erreurs['usager_naissance'] = "Vous devez entrer votre date de naissance.";
        }
        if (empty($mois)) {
            $erreurs['usager_naissance'] = "Vous devez entrer votre date de naissance.";
        }
        if (empty($annee)) {
            $erreurs['usager_naissance'] = "Vous devez entrer votre date de naissance.";
        }
        if (empty($courriel)) {
            $erreurs['usager_courriel'] = "Vous devez entrer votre courriel.";
        }
        if (empty($utilisateur)) {
            $erreurs['usager_nom_utilisateur'] = "Vous devez entrer un nom d'utilisateur.";
        }
        if (empty($motDePasse)) {
            $erreurs['usager_mot_de_passe'] = "Vous devez entrer un mot de passe.";
        }
        if (empty($confirmerMdp)) {
            $erreurs['confirmer_mot_de_passe'] = "Vous devez confirmer le mot de passe.";
        }
        if (empty($conditions)) {
            $erreurs['accepter_conditions'] = "Vous devez accepter les termes et conditions.";
        }
    }
}
