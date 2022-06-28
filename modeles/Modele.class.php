<?php
/**
 * Class Modele
 * Template de classe modèle. Dupliquer et modifier pour votre usage.
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2019-01-21
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */
class Modele {
	public $url_elements;
    public $ressource;
    public $verbe;
    public $parametres;
    protected $_db;

	
	function __construct ()
	{

		$this->_db = MonSQL::getInstance();
		$this->verbe = $_SERVER['REQUEST_METHOD'];
		
        $_GET['url'] = (isset($_GET['url']) ? $_GET['url'] : "");
		$_GET['url'] = trim($_GET['url'], '\/');
        $this->url_elements = explode('/', $_GET['url']);
        $this->traitementParametre();
        
        $this->ressource = $this->url_elements[0];
        array_splice($this->url_elements,0,1);
	}

    public function ajusterQuantiteBouteille($id_bouteille)
    {
        // Ouvrir une nouvelle connexion au serveur MySQL
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Connexion à la base de données non établie.");

        // On récupère la quantité à partir de la table bouteille_action
        $sql = "SELECT SUM(nbAjoutees) - SUM(nbDetruites) AS quantite_bouteille 
                FROM 
                    (   SELECT SUM(quantite_bouteille) AS nbAjoutees, 0 AS nbDetruites FROM bouteille_action WHERE id_bouteille = " . $id_bouteille . " AND action = 'a' GROUP BY id_bouteille
                        UNION
                        SELECT 0 AS nbAjoutees, SUM(quantite_bouteille) AS nbDetruites FROM bouteille_action WHERE id_bouteille = " . $id_bouteille . " AND action = 'd' GROUP BY id_bouteille
                    ) AS T1";

        $result = $this->_db->query($sql);
        $qteBouteille = 0;

        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $qteBouteille = $row['quantite_bouteille'];
        }

        // Et on met à jour la valeur dans la table usager__bouteille
        $sql = "UPDATE usager__bouteille SET quantite_bouteille = GREATEST(" . $qteBouteille . ", 0) WHERE id_bouteille = " . $id_bouteille;
        $result = $this->_db->query($sql);

        return $result;
    }
	/**
	 * Décode les paramètres de la requête
	 * @access private
	 */
	public function traitementParametre() {
        $parametres = array();

        // first of all, pull the GET vars
        if (isset($_SERVER['QUERY_STRING'])) {
            parse_str($_SERVER['QUERY_STRING'], $parametres);
        }

       	unset($parametres['url']);
        $body = file_get_contents("php://input");
		$content_type = false;
        if(isset($_SERVER['CONTENT_TYPE'])) {
            $content_type = $_SERVER['CONTENT_TYPE'];
        }
			
        $body_params = json_decode($body);
		
        if($body_params) {
            foreach($body_params as $nom => $valeur) {
				$parametres[$nom] = $this->aseptiserParametre($valeur);
            }
        }
        
        $this->parametres = $parametres;

        try {
            $this->_db = MonSQL::getInstance();
        }catch (Exception $e){
            print_r($e);
        }


	}
	
	/**
	 * Permet de nettoyer les valeurs passées en paramètre
	 * @param String $valeur Valeur à filtrer
	 * @return String La valeur filtrer.
	 * @access private
	 */
	private function aseptiserParametre($valeur)
	{
        if(is_string($valeur)){
            $valeur = $this->_db->real_escape_string($valeur);
            $valeur = htmlspecialchars($valeur);
        }
		return $valeur;
	} 	
	function __destruct ()
	{
		
	}
}




?>