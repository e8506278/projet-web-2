class FetchCellier{

    fetchCellier = (requete, action)=>{
        fetch(requete)
            .then(response => {
                if (response.status === 200) {
              
                    return response
                } else {
                    throw new Error('Erreur');
                }
            })
            .then(response => {
               
                action
 
                 //Rafraîchir la page
                location.reload();
   
            }).catch(error => {
                console.error(error);
            });
    }

    fetchGetCellier = (requete, action)=>{
        fetch(requete)
                .then(response => {
                    if (response.status === 200) {
                
                        return response.json()
                    } else {
                        throw new Error('Erreur');
                    }
                })
                .then(response => {

                    for (let key in response) {
                    let option = `<option value="${response[key].id_cellier}">${response[key].nom_cellier}</option>`
                    action.insertAdjacentHTML('beforeend', option);
                }    
                }).catch(error => {
                    console.error(error);
                });
    }
    
    
}
export const { fetchCellier, fetchGetCellier} = new FetchCellier();