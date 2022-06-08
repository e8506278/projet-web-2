<?php include('./controller/Enregistrement.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement | Vino</title>

    <link rel="stylesheet" href="./css/styles.css">

    <script defer src="./js/enregistrement.js"></script>
</head>

<body class="main-connexion">
    <div class="section-wrapper wrapper-center">
        <div class="main-section">
            <div class="entete">
                <h2 class="">Vino - Enregistrement</h2>
            </div>

            <form class="formulaire" action="" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="usager_nom" data-js-nom placeholder="Votre nom" value="<?php echo $nom ?>" />
                    <span class="aucune-erreur" data-js-nom-err>&nbsp;</span>

                    <?php if (isset($erreurs['usager_nom']))
                        echo '<span class="message-erreur">' . $erreurs['usager_nom'] . '</span>';
                    ?>
                </div>

                <div class="form-group">
                    <textarea class="form-control" name="usager_adresse" data-js-adresse placeholder="Votre adresse"><?php echo $adresse ?></textarea>
                    <span class="aucune-erreur" data-js-adresse-err>&nbsp;</span>

                    <?php if (isset($erreurs['usager_adresse']))
                        echo '<span class="message-erreur">' . $erreurs['usager_adresse'] . '</span>';
                    ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="usager_ville" data-js-ville placeholder="Votre ville" value="<?php echo $ville ?>" />
                    <span class="aucune-erreur" data-js-ville-err>&nbsp;</span>

                    <?php if (isset($erreurs['usager_ville']))
                        echo '<span class="message-erreur">' . $erreurs['usager_ville'] . '</span>';
                    ?>
                </div>

                <div class="form-group">
                    <select name="usager_pays" class="form-control" data-js-pays>
                        <option value="0">Votre pays</option>
                        <option value="1">Afghanistan</option>
                        <option value="2">Afrique du Sud</option>
                        <option value="3">Albanie</option>
                        <option value="4">Algérie</option>
                        <option value="5">Allemagne</option>
                        <option value="6">Andorre</option>
                        <option value="7">Angola</option>
                        <option value="8">Antigua-et-Barbuda</option>
                        <option value="9">Arabie saoudite</option>
                        <option value="10">Argentine</option>
                        <option value="11">Arménie</option>
                        <option value="12">Australie</option>
                        <option value="13">Autriche</option>
                        <option value="14">Azerbaïdjan</option>
                        <option value="15">Bahamas</option>
                        <option value="16">Bahreïn</option>
                        <option value="17">Bangladesh</option>
                        <option value="18">Barbade</option>
                        <option value="19">Belgique</option>
                        <option value="20">Belize</option>
                        <option value="21">Bénin</option>
                        <option value="22">Bhoutan</option>
                        <option value="23">Bélarus</option>
                        <option value="24">Birmanie</option>
                        <option value="25">Bolivie</option>
                        <option value="26">Bosnie-Herzégovine</option>
                        <option value="27">Botswana</option>
                        <option value="28">Brésil</option>
                        <option value="29">Brunei</option>
                        <option value="30">Bulgarie</option>
                        <option value="31">Burkina</option>
                        <option value="32">Burundi</option>
                        <option value="33">Cambodge</option>
                        <option value="34">Cameroun</option>
                        <option value="35">Canada</option>
                        <option value="36">Cap-Vert</option>
                        <option value="37">République centrafricaine</option>
                        <option value="38">Chili</option>
                        <option value="39">Chine</option>
                        <option value="40">Chypre</option>
                        <option value="41">Colombie</option>
                        <option value="42">Comores</option>
                        <option value="43">Congo</option>
                        <option value="44">République démocratique du Congo</option>
                        <option value="45">Îles Cook</option>
                        <option value="46">Corée du Nord</option>
                        <option value="47">Corée du Sud</option>
                        <option value="48">Costa Rica</option>
                        <option value="49">Côte d'Ivoire</option>
                        <option value="50">Croatie</option>
                        <option value="51">Cuba</option>
                        <option value="52">Danemark</option>
                        <option value="53">Djibouti</option>
                        <option value="54">République dominicaine</option>
                        <option value="55">Dominique</option>
                        <option value="56">Égypte</option>
                        <option value="57">Émirats arabes unis</option>
                        <option value="58">Équateur</option>
                        <option value="59">Érythrée</option>
                        <option value="60">Espagne</option>
                        <option value="61">Estonie</option>
                        <option value="62">Eswatini</option>
                        <option value="63">États-Unis</option>
                        <option value="64">Éthiopie</option>
                        <option value="65">Fidji</option>
                        <option value="66">Finlande</option>
                        <option value="67">France</option>
                        <option value="68">Gabon</option>
                        <option value="69">Gambie</option>
                        <option value="70">Géorgie</option>
                        <option value="71">Ghana</option>
                        <option value="72">Grèce</option>
                        <option value="73">Grenade</option>
                        <option value="74">Guatemala</option>
                        <option value="75">Guinée</option>
                        <option value="76">Guinée-Bissau</option>
                        <option value="77">Guinée équatoriale</option>
                        <option value="78">Guyana</option>
                        <option value="79">Haïti</option>
                        <option value="80">Honduras</option>
                        <option value="81">Hongrie</option>
                        <option value="82">Inde</option>
                        <option value="83">Indonésie</option>
                        <option value="84">Irak</option>
                        <option value="85">Iran</option>
                        <option value="86">Irlande</option>
                        <option value="87">Islande</option>
                        <option value="88">Israël</option>
                        <option value="89">Italie</option>
                        <option value="90">Jamaïque</option>
                        <option value="91">Japon</option>
                        <option value="92">Jordanie</option>
                        <option value="93">Kazakhstan</option>
                        <option value="94">Kenya</option>
                        <option value="95">Kirghizie</option>
                        <option value="96">Kiribati</option>
                        <option value="97">Koweït</option>
                        <option value="98">Laos</option>
                        <option value="99">Lesotho</option>
                        <option value="100">Lettonie</option>
                        <option value="101">Liban</option>
                        <option value="102">Libéria</option>
                        <option value="103">Libye</option>
                        <option value="104">Liechtenstein</option>
                        <option value="105">Lituanie</option>
                        <option value="106">Luxembourg</option>
                        <option value="107">Macédoine du Nord</option>
                        <option value="108">Madagascar</option>
                        <option value="109">Malaisie</option>
                        <option value="110">Malawi</option>
                        <option value="111">Maldives</option>
                        <option value="112">Mali</option>
                        <option value="113">Malte</option>
                        <option value="114">Maroc</option>
                        <option value="115">Marshall</option>
                        <option value="116">Maurice</option>
                        <option value="117">Mauritanie</option>
                        <option value="118">Mexique</option>
                        <option value="119">Micronésie</option>
                        <option value="120">Moldavie</option>
                        <option value="121">Monaco</option>
                        <option value="122">Mongolie</option>
                        <option value="123">Monténégro</option>
                        <option value="124">Mozambique</option>
                        <option value="125">Namibie</option>
                        <option value="126">Nauru</option>
                        <option value="127">Népal</option>
                        <option value="128">Nicaragua</option>
                        <option value="129">Niger</option>
                        <option value="130">Nigéria</option>
                        <option value="131">Niue</option>
                        <option value="132">Norvège</option>
                        <option value="133">Nouvelle-Zélande</option>
                        <option value="134">Oman</option>
                        <option value="135">Ouganda</option>
                        <option value="136">Ouzbékistan</option>
                        <option value="137">Pakistan</option>
                        <option value="138">Palaos</option>
                        <option value="139">Palestine</option>
                        <option value="140">Panama</option>
                        <option value="141">Papouasie-Nouvelle-Guinée</option>
                        <option value="142">Paraguay</option>
                        <option value="143">Pays-Bas</option>
                        <option value="144">Pérou</option>
                        <option value="145">Philippines</option>
                        <option value="146">Pologne</option>
                        <option value="147">Portugal</option>
                        <option value="148">Qatar</option>
                        <option value="149">République tchèque</option>
                        <option value="150">Roumanie</option>
                        <option value="151">Royaume-Uni</option>
                        <option value="152">Russie</option>
                        <option value="153">Rwanda</option>
                        <option value="154">Saint-Christophe-et-Niévès</option>
                        <option value="155">Sainte-Lucie</option>
                        <option value="156">Saint-Marin</option>
                        <option value="157">Saint-Vincent-et-les Grenadines</option>
                        <option value="158">Îles Salomon</option>
                        <option value="159">Salvador</option>
                        <option value="160">Samoa</option>
                        <option value="161">Sao Tomé-et-Principe</option>
                        <option value="162">Sénégal</option>
                        <option value="163">Serbie</option>
                        <option value="164">Seychelles</option>
                        <option value="165">Sierra Leone</option>
                        <option value="166">Singapour</option>
                        <option value="167">Slovaquie</option>
                        <option value="168">Slovénie</option>
                        <option value="169">Somalie</option>
                        <option value="170">Soudan</option>
                        <option value="171">Soudan du Sud</option>
                        <option value="172">Sri Lanka</option>
                        <option value="173">Suède</option>
                        <option value="174">Suisse</option>
                        <option value="175">Suriname</option>
                        <option value="176">Syrie</option>
                        <option value="177">Tadjikistan</option>
                        <option value="178">Tanzanie</option>
                        <option value="179">Tchad</option>
                        <option value="180">Thaïlande</option>
                        <option value="181">Timor oriental</option>
                        <option value="182">Togo</option>
                        <option value="183">Tonga</option>
                        <option value="184">Trinité-et-Tobago</option>
                        <option value="185">Tunisie</option>
                        <option value="186">Turkménistan</option>
                        <option value="187">Turquie</option>
                        <option value="188">Tuvalu</option>
                        <option value="189">Ukraine</option>
                        <option value="190">Uruguay</option>
                        <option value="191">Vanuatu</option>
                        <option value="192">Vatican</option>
                        <option value="193">Venezuela</option>
                        <option value="194">Viêt Nam</option>
                        <option value="195">Yémen</option>
                        <option value="196">Zambie</option>
                        <option value="197">Zimbabwe</option>
                    </select>

                    <span class="aucune-erreur" data-js-pays-err>&nbsp;</span>

                    <?php if (isset($erreurs['usager_pays']))
                        echo '<span class="message-erreur">' . $erreurs['usager_pays'] . '</span>';
                    ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="usager_telephone" data-js-telephone placeholder="Votre numéro de téléphone" value="<?php echo $telephone ?>" />
                    <span class="aucune-erreur" data-js-telephone-err>&nbsp;</span>

                    <?php if (isset($erreurs['usager_telephone']))
                        echo '<span class="message-erreur">' . $erreurs['usager_telephone'] . '</span>';
                    ?>
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
                            $lesMois = ["Jan", "Fév", "Mar", "Avr", "Mai", "Jun", "Jul", "Aoû", "Sep", "Oct", "Nov", "Déc"];
                            $nbMois = count($lesMois);
                            $i = 0;

                            for ($i = 0; $i < $nbMois; $i++) {
                            ?>
                                <option value="<?= $i + 1; ?>" <?php if ((int)$mois == $i) {
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

                    <span class="aucune-erreur" data-js-ddn-err>&nbsp;</span>

                    <?php if (isset($erreurs['usager_naissance']))
                        echo '<span class="message-erreur">' . $erreurs['usager_naissance'] . '</span>';
                    ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="usager_courriel" data-js-courriel placeholder="Votre courriel" value="<?php echo $courriel ?>" />
                    <span class="aucune-erreur" data-js-courriel-err>&nbsp;</span>

                    <?php if (isset($erreurs['usager_courriel']))
                        echo '<span class="message-erreur">' . $erreurs['usager_courriel'] . '</span>';
                    ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="usager_nom_utilisateur" data-js-utilisateur placeholder="Entrez un nom d'utilisateur" value="<?php echo $utilisateur ?>" />
                    <span class="aucune-erreur" data-js-utilisateur-err>&nbsp;</span>

                    <?php if (isset($erreurs['usager_nom_utilisateur']))
                        echo '<span class="message-erreur">' . $erreurs['usager_nom_utilisateur'] . '</span>';
                    ?>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="usager_mot_de_passe" data-js-mdp placeholder="Entrez un mot de passe" value="" />
                    <span class="aucune-erreur" data-js-mdp-err>&nbsp;</span>

                    <?php if (isset($erreurs['usager_mot_de_passe']))
                        echo '<span class="message-erreur">' . $erreurs['usager_mot_de_passe'] . '</span>';
                    ?>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="confirmer_mot_de_passe" data-js-confirmer placeholder="Retapez le mot de passe" value="" />
                    <span class="aucune-erreur" data-js-confirmer-err>&nbsp;</span>

                    <?php if (isset($erreurs['confirmer_mot_de_passe']))
                        echo '<span class="message-erreur">' . $erreurs['confirmer_mot_de_passe'] . '</span>';
                    ?>
                </div>

                <div class="form-group">
                    <div class="conditions-wrapper">
                        <input type="checkbox" name="accepter_conditions" id="accepter_conditions" data-js-conditions />
                        <label for="accepter_conditions">J'accepte les termes et conditions d'utilisation du site</label>
                    </div>

                    <span class="aucune-erreur" data-js-conditions-err>&nbsp;</span>

                    <?php if (isset($erreurs['accepter_conditions']))
                        echo '<span class="message-erreur">' . $erreurs['accepter_conditions'] . '</span>';
                    ?>
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
</body>

</html>