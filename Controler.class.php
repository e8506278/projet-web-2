<?php
/**
 * Class Controler
 * Gère les requêtes HTTP
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2019-01-21
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */

class Controler 
{
	
		/**
		 * Traite la requête
		 * @return void
		 */
		public function gerer()
		{
			switch ($_GET['requete']) {
				case 'mesCelliers':
					$this->listeCelliers();
					break;
				case 'ajouterNouveauCellier':
					$this->ajouterNouveauCellier();
					break;
				case 'listeBouteilleCellier':
					$this->listeBouteilleCellier();
					break;
				case 'autocompleteBouteille':
					$this->autocompleteBouteille();
					break;
				case 'ajouterNouvelleBouteilleCellier':
					$this->ajouterNouvelleBouteilleCellier();
					break;
				case 'ajouterBouteilleCellier':
					$this->ajouterBouteilleCellier();
					break;
				case 'boireBouteilleCellier':
					$this->boireBouteilleCellier();
					break;
			        case 'details':
					$this->productDetails();
					break;
				default:
					$this->accueil();
					break;
			}
		}

		private function accueil()
		{
			include("vues/entete.php");
			include("vues/index.php");
			include("vues/pied.php");     
		}
		
		private function listeBouteille()
		{
			$bte = new Bouteille();
          
            $data = $bte->getListeBouteille();

            echo json_encode($data);
			include("vues/entete.php");
			
			include("vues/pied.php");
		}
		
		
		private function autocompleteBouteille()
		{
			$bte = new Bouteille();
			//var_dump(file_get_contents('php://input'));
			$body = json_decode(file_get_contents('php://input'));
			//var_dump($body);
            $listeBouteille = $bte->autocomplete($body->nom);
            
            echo json_encode($listeBouteille);
                  
		}

		
		private function ajouterNouvelleBouteilleCellier()
		{
			$id_cellier = $_GET['id_cellier'];
		
			$body = json_decode(file_get_contents('php://input'));

			if(!empty($body)){
				$bte = new Bouteille();
				//var_dump($_POST['data']);
				
				//var_dump($data);
				$resultat = $bte->ajouterBouteilleCellier($body);
				echo json_encode($resultat);
			}
			else{
				include("vues/entete.php");
				include("vues/ajouter.php");
				include("vues/pied.php");
			}
			
            
		}
		
		private function boireBouteilleCellier()
		{
			$body = json_decode(file_get_contents('php://input'));
			
			$bte = new Bouteille();
			$resultat = $bte->modifierQuantiteBouteilleCellier($body->id, -1);
			echo json_encode($resultat);
		}

		private function ajouterBouteilleCellier()
		{
			$body = json_decode(file_get_contents('php://input'));
			
			$bte = new Bouteille();
			$resultat = $bte->modifierQuantiteBouteilleCellier($body->id, 1);
			echo json_encode($resultat);
		}


		/*CELLIERS*/


		private function listeCelliers(){

			$id = 1;
			$celliers = new Cellier();
			$data = $celliers->getListeCellier($id);
		
			echo json_encode($data);
		
	
				include("vues/entete.php");
				include("vues/celliers.php");
				include("vues/pied.php");
			
		}

		private function ajouterNouveauCellier(){
			$body = json_decode(file_get_contents('php://input'));
			
			if(!empty($body)){
				$cellier = new Cellier();
				
				$resultat = $cellier->ajouterNouveauCellier($body);
				
				echo json_encode($resultat);
			}
			else{
				include("vues/entete.php");
				include("vues/celliers.php");
				include("vues/pied.php");
			}
		}
		
		private function listeBouteilleCellier()
		{
			$id_cellier = $_GET['id_cellier'];
			$bte = new Bouteille();
			
            $data = $bte->getListeBouteilleCellier($id_cellier);

            echo json_encode($data);
			include("vues/entete.php");
			include("vues/bouteilles.php");
			include("vues/pied.php");
		}
	
	
		private function productDetails()
		{
			$bte = new Bouteille();
			$result = $bte->getOneBouteille($_GET['id_bouteille']);
			if(count($result)>0){
				$product = $result[0];
			}

		include("vues/entete.php");
		include("vues/details.php");
		include("vues/pied.php");
		}

}
?>















