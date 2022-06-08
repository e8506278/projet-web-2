<div class="ajouter">


    <div class="nouvelleBouteille" vertical layout>
        Recherche : <input type="text" name="nom_bouteille">
        <ul class="listeAutoComplete">
        </ul>
            <div>
                
                <!-- <p>Nom : <span data-id="" class="nom_bouteille"></span></p> -->
                    <p>Nom : <br>
                        <select name="id_bouteille">
                        <?php foreach ($data as $cle => $bouteille) { ?>
                            <option  value="<?php echo $bouteille['id_bouteille']; ?>" ><?php echo $bouteille['nom_bouteille']; ?> </option>
                            <?php } ?>
                        </select>
                    </p>
                    <p>Millesime : <input type="text" name="millesime"></p>
                    <p>Quantité : <input type="number" name="quantite" ></p>
                    <p>Date achat : <input type="date" name="date_achat"></p>
                    <p>Prix : <input type="number" name="prix"></p>
                    <p>Garde : <input type="date" name="garde_jusqua"></p>
                    <p>Notes <input type="number" name="notes"></p>
                
            </div>
            <button  name="ajouterBouteilleCellier">Ajouter la bouteille (champs tous obligatoires)</button>
    </div>
</div>
</div>
