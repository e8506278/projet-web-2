<?php include('./controller/Enregistrement.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement | Vino</title>

    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/connexion.css">

    <script defer src="./js/enregistrement.js"></script>
</head>

<body class="main">
    <div class="section-wrapper wrapper-center">
        <div class="main-section">
            <div class="entete">
                <h2 class="">Vino - Enregistrement</h2>
            </div>

            <form class="formulaire" action="" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="usager_nom" data-js-nom placeholder="Votre nom" value="" />
                    <span class="aucune-erreur" data-js-nom-err>&nbsp;</span>

                    <?php if (isset($erreurs['usager_nom']))
                        echo '<span class="message-erreur">' . $erreurs['usager_nom'] . '</span>';
                    ?>
                </div>

                <div class="form-group">
                    <textarea class="form-control" name="usager_adresse" data-js-adresse placeholder="Votre adresse"></textarea>
                    <span class="aucune-erreur" data-js-adresse-err>&nbsp;</span>

                    <?php if (isset($erreurs['usager_adresse']))
                        echo '<span class="message-erreur">' . $erreurs['usager_adresse'] . '</span>';
                    ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="usager_ville" data-js-ville placeholder="Votre ville" value="" />
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
                    <input type="text" class="form-control" name="usager_telephone" data-js-telephone placeholder="Votre numéro de téléphone" value="" />
                    <span class="aucune-erreur" data-js-telephone-err>&nbsp;</span>

                    <?php if (isset($erreurs['usager_telephone']))
                        echo '<span class="message-erreur">' . $erreurs['usager_telephone'] . '</span>';
                    ?>
                </div>

                <div class="form-group">
                    <div class="date-container">
                        <select name="usager_naissance[jour]" class="form-control" data-js-ddn-jour>
                            <option value="0">Jour</option>
                            <option value="1">01</option>
                            <option value="2">02</option>
                            <option value="3">03</option>
                            <option value="4">04</option>
                            <option value="5">05</option>
                            <option value="6">06</option>
                            <option value="7">07</option>
                            <option value="8">08</option>
                            <option value="9">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                        <select name="usager_naissance[mois]" class="form-control" data-js-ddn-mois>
                            <option value="0">Mois</option>
                            <option value="1">Jan</option>
                            <option value="2">Fév</option>
                            <option value="3">Mar</option>
                            <option value="4">Avr</option>
                            <option value="5">Mai</option>
                            <option value="6">Jun</option>
                            <option value="7">Jul</option>
                            <option value="8">Aoû</option>
                            <option value="9">Sep</option>
                            <option value="10">Oct</option>
                            <option value="11">Nov</option>
                            <option value="12">Déc</option>
                        </select>
                        <select name="usager_naissance[annee]" class="form-control" data-js-ddn-annee>
                            <option value="0">Année</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                            <option value="1995">1995</option>
                            <option value="1994">1994</option>
                            <option value="1993">1993</option>
                            <option value="1992">1992</option>
                            <option value="1991">1991</option>
                            <option value="1990">1990</option>
                            <option value="1989">1989</option>
                            <option value="1988">1988</option>
                            <option value="1987">1987</option>
                            <option value="1986">1986</option>
                            <option value="1985">1985</option>
                            <option value="1984">1984</option>
                            <option value="1983">1983</option>
                            <option value="1982">1982</option>
                            <option value="1981">1981</option>
                            <option value="1980">1980</option>
                            <option value="1979">1979</option>
                            <option value="1978">1978</option>
                            <option value="1977">1977</option>
                            <option value="1976">1976</option>
                            <option value="1975">1975</option>
                            <option value="1974">1974</option>
                            <option value="1973">1973</option>
                            <option value="1972">1972</option>
                            <option value="1971">1971</option>
                            <option value="1970">1970</option>
                            <option value="1969">1969</option>
                            <option value="1968">1968</option>
                            <option value="1967">1967</option>
                            <option value="1966">1966</option>
                            <option value="1965">1965</option>
                            <option value="1964">1964</option>
                            <option value="1963">1963</option>
                            <option value="1962">1962</option>
                            <option value="1961">1961</option>
                            <option value="1960">1960</option>
                            <option value="1959">1959</option>
                            <option value="1958">1958</option>
                            <option value="1957">1957</option>
                            <option value="1956">1956</option>
                            <option value="1955">1955</option>
                            <option value="1954">1954</option>
                            <option value="1953">1953</option>
                            <option value="1952">1952</option>
                            <option value="1951">1951</option>
                            <option value="1950">1950</option>
                            <option value="1949">1949</option>
                            <option value="1948">1948</option>
                            <option value="1947">1947</option>
                            <option value="1946">1946</option>
                            <option value="1945">1945</option>
                            <option value="1944">1944</option>
                            <option value="1943">1943</option>
                            <option value="1942">1942</option>
                            <option value="1941">1941</option>
                            <option value="1940">1940</option>
                            <option value="1939">1939</option>
                            <option value="1938">1938</option>
                            <option value="1937">1937</option>
                            <option value="1936">1936</option>
                            <option value="1935">1935</option>
                            <option value="1934">1934</option>
                            <option value="1933">1933</option>
                            <option value="1932">1932</option>
                            <option value="1931">1931</option>
                            <option value="1930">1930</option>
                            <option value="1929">1929</option>
                            <option value="1928">1928</option>
                            <option value="1927">1927</option>
                            <option value="1926">1926</option>
                            <option value="1925">1925</option>
                            <option value="1924">1924</option>
                            <option value="1923">1923</option>
                            <option value="1922">1922</option>
                            <option value="1921">1921</option>
                            <option value="1920">1920</option>
                            <option value="1919">1919</option>
                            <option value="1918">1918</option>
                            <option value="1917">1917</option>
                            <option value="1916">1916</option>
                            <option value="1915">1915</option>
                            <option value="1914">1914</option>
                            <option value="1913">1913</option>
                            <option value="1912">1912</option>
                            <option value="1911">1911</option>
                            <option value="1910">1910</option>
                            <option value="1909">1909</option>
                            <option value="1908">1908</option>
                            <option value="1907">1907</option>
                            <option value="1906">1906</option>
                            <option value="1905">1905</option>
                            <option value="1904">1904</option>
                            <option value="1903">1903</option>
                            <option value="1902">1902</option>
                            <option value="1901">1901</option>
                            <option value="1900">1900</option>
                        </select>
                    </div>

                    <span class="aucune-erreur" data-js-ddn-err>&nbsp;</span>

                    <?php if (isset($erreurs['usager_naissance']))
                        echo '<span class="message-erreur">' . $erreurs['usager_naissance'] . '</span>';
                    ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="usager_courriel" data-js-courriel placeholder="Votre courriel" value="" />
                    <span class="aucune-erreur" data-js-courriel-err>&nbsp;</span>

                    <?php if (isset($erreurs['usager_courriel']))
                        echo '<span class="message-erreur">' . $erreurs['usager_courriel'] . '</span>';
                    ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="usager_nom_utilisateur" data-js-utilisateur placeholder="Entrez un nom d'utilisateur" value="" />
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
                    <p>Vous avez déjà un compte? <a href=" /">Connectez-vous</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>