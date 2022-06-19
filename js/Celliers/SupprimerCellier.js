import ModalCellier from './ModalCellier';  
import CellierValidation from './CellierValidation'; 
import { fetchCellier } from './FetchCellier'; 

export default class SupprimerCellier extends ModalCellier{
    constructor(btnDeplacerSupprimer,btnSupprimer,selectCellier,idCellier){
        super()
        this._btnDeplacerSupprimer = btnDeplacerSupprimer;
        this._btnSupprimer = btnSupprimer;
        this._selectCellier = selectCellier
        this._idCellier = idCellier
       
        this.init()

    }
    init = () =>{
        
        this._btnDeplacerSupprimer.addEventListener('click', (e)=>{
            e.preventDefault();
            let cellierAdeplacer = {
                "id_cellierChoisi" : this._selectCellier.value,
                "id_cellierSupprime": this._idCellier
            }
            
            let requete = new Request(BaseURL + "?requete=deplacerSupprimer", { method: 'POST', body: JSON.stringify(cellierAdeplacer)});
            fetchCellier(requete,this.ferme())

        })
        this._btnSupprimer.addEventListener('click', (e)=>{
            e.preventDefault();
            let requete = new Request(BaseURL + "?requete=supprimerCellier", { method: 'POST', body: '{"id": ' + this._idCellier + '}'});
            fetchCellier(requete,this.ferme())

        })

        // Bouton annuler
        this.annule(this._el)
        
    }

    

}