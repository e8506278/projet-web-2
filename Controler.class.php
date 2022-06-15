<?php
 include('./controller/Connexion.php');
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
            case 'modifierCellier':
                $this->modifierCellier();
                break;
            case 'listeBouteilleCellier':
                $this->listeBouteilleCellier();
                break;
            case 'ajouterQteBouteille':
                $this->ajouterQteBouteille();
                break;
            case 'reduireQteBouteille':
                $this->reduireQteBouteille();
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
            case 'enregistrer':
                $this->enregistrerUtilisateur();
                break;
            case 'connecter':
                $this->connecterUtilisateur();
                break;
            case 'deconnecter':
                $this->deconnecterUtilisateur();
                break;
            case 'accueil':
                $this->accueil();
                 break;
            default:
            $this->connecterUtilisateur();
                break;
        }
    }

    private function enregistrerUtilisateur()
    {
        include("vues/entete.php");
        include("vues/enregistrement.php");
        include("vues/pied.php");
       
    }

    private function connecterUtilisateur()
    {
        include("vues/entete.php");
        include("vues/connexion.php");
        include("vues/pied.php");   
    }

    private function deconnecterUtilisateur()
    {
        unset($_SESSION['utilisateur']);
        include("vues/entete.php");
        include("vues/connexion.php");
        include("vues/pied.php");
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

        // echo json_encode($data);
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

        // echo json_encode($listeBouteille);
    }


    private function ajouterNouvelleBouteilleCellier()
    {
        $id_cellier = $_GET['id_cellier'];

        $body = json_decode(file_get_contents('php://input'));

        if (!empty($body)) {
            $bte = new Bouteille();
            //var_dump($_POST['data']);

            //var_dump($data);
            $resultat = $bte->ajouterBouteilleCellier($body);
            // echo json_encode($resultat);
        } else {
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
       
    }

    private function ajouterBouteilleCellier()
    {
        $body = json_decode(file_get_contents('php://input'));

        $bte = new Bouteille();
        $resultat = $bte->modifierQuantiteBouteilleCellier($body->id, 1);
       
    }


    /*CELLIERS*/

    /**
     * Cette méthode récupère la liste des celliers d'un usagé ainsi que le nombre de cellier par usager
     * avec l'id session de l'usager
     */
    private function listeCelliers()
    {

        $id = $_SESSION['utilisateur']['id'];
     
        $celliers = new Cellier();
        
        $data = $celliers->getListeCellier($id);
        $nombre_cellier = $celliers->nombreCellierUsager($id);

        // Si le nombre de cellier est égal à 10
        if ($nombre_cellier == '10') {

            $erreur = "Vous avez atteint le maximum de celliers disponibles (10).";
        } else {
            $erreur = "";
        }

        include("vues/entete.php");
        include("vues/celliers.php");
        include("vues/pied.php");
    }

    /**
     * Cette méthode appelle la fonction pour ajouter un nouveau cellier 
     * selon les information rentrée par l'usagé ($body).
     *  
     */
    private function ajouterNouveauCellier()
    {
        $body = json_decode(file_get_contents('php://input'));

        if (!empty($body)) {
            $cellier = new Cellier();
            $resultat = $cellier->ajouterNouveauCellier($body);

        } else {
            include("vues/entete.php");
            include("vues/celliers.php");
            include("vues/pied.php");
        }
    }

    /**
     * Cette méthode appelle la fonction pour récupérer les informations d'un cellier
     *  selon l'id_cellier envoyé dans l'url
     *  
     */
    private function modifierCellier(){
        $body = json_decode(file_get_contents('php://input'));
        if (!empty($body)) {
            $cellier = new Cellier();
            $resultat = $cellier->modifierCellier($body);

        } else {
            include("vues/entete.php");
            include("vues/celliers.php");
            include("vues/pied.php");
        }
    }

    /**
     * Cette méthode appelle la fonction pour récupérer la liste des bouteilles dans un cellier
     *  selon l'id_cellier envoyé dans l'url, ou la quantité_bouteille est plus grande que 0, trié DESC selon l'id_bouteille 
     *  
     */
    private function listeBouteilleCellier()
    {
        $id_cellier = $_GET['id_cellier'];
        $nom_cellier = $_GET['nom_cellier'];

        $bte = new Bouteille();

        $data = $bte->getListeBouteilleCellier($id_cellier);

        
        include("vues/entete.php");
        include("vues/bouteilles.php");
        include("vues/pied.php");
    }

    /**
     * Cette méthode appelle la fonction pour récupérer la liste des bouteilles dans un cellier
     *  selon l'id_cellier envoyé dans l'url 
     *  
     */
    private function ajouterQteBouteille(){
        $body = json_decode(file_get_contents('php://input'));
        var_dump($body);
        $bte = new Bouteille();
        $resultat = $bte->modifierQuantiteBouteilleCellier($body->id, 1);
       
    }
    private function reduireQteBouteille(){
        $body = json_decode(file_get_contents('php://input'));
        $bte = new Bouteille();
        $resultat = $bte->modifierQuantiteBouteilleCellier($body->id, -1);
       
    }
/* FIN CELLIER */


    private function productDetails()
    {

//        $bte = new Bouteille();
//        $result = $bte->getOneBouteille($_GET['id_bouteille']);
//        if (count($result) > 0) {
//            $product = $result[0];
//        }


        include("vues/entete.php");
        include("vues/details.php");
        include("vues/pied.php");
    }
}
