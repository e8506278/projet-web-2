<section class="section-wrapper carte carte--bg-couleur">
    <div class="carte__entete-bouton">
        <h3 class="carte__entete"><?php echo $nom_cellier ?></h3>
        <!--
        <a href="?requete=ajouterNouvelleBouteilleCellier&id_cellier=<?php echo $id_cellier;?>">
            <i class="carte--aligne-centre" > <svg class="carte__lien-icone" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM256 368C269.3 368 280 357.3 280 344V280H344C357.3 280 368 269.3 368 256C368 242.7 357.3 232 344 232H280V168C280 154.7 269.3 144 256 144C242.7 144 232 154.7 232 168V232H168C154.7 232 144 242.7 144 256C144 269.3 154.7 280 168 280H232V344C232 357.3 242.7 368 256 368z"/></svg></i></a>
-->
        </div>
    <div class="carte__contenant">

<?php
if($data){
foreach ($data as $cle => $bouteille) {
?>
        <div class="carte__contenu ">
            <div class="carte__lien carte--flex">
                <div class="carte__img">
                    <img src="<?php echo $bouteille['image_bouteille']; ?>" alt="bouteille">
                </div>
                <div class="carte__description">
                    <div>
                        <div class="carte--flex carte__titre">
                        <h4 class=""><?php echo $bouteille['nom_bouteille']; ?></h4>
                        <!--
                        <div class="burger ">
                            <input class="burger__input" type="checkbox" id="burger">
                            <label for="burger"> 
                                <i class="carte__icone-petit--espace"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M416 288C433.7 288 448 302.3 448 320C448 337.7 433.7 352 416 352H32C14.33 352 0 337.7 0 320C0 302.3 14.33 288 32 288H416zM416 160C433.7 160 448 174.3 448 192C448 209.7 433.7 224 416 224H32C14.33 224 0 209.7 0 192C0 174.3 14.33 160 32 160H416z"/></svg></i>    
                                <ul class="burger__ouvre">
                                    <div class="carte--flex">
                                    <li><a href="#"><i class="carte__icone--couleur-blanc"><svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"> <path d="M362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32zM421.7 220.3L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3z"/></svg></i></a></li>
                                    <li><a href="#"><i class="carte__icone--couleur-blanc"><svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM256 368C269.3 368 280 357.3 280 344V280H344C357.3 280 368 269.3 368 256C368 242.7 357.3 232 344 232H280V168C280 154.7 269.3 144 256 144C242.7 144 232 154.7 232 168V232H168C154.7 232 144 242.7 144 256C144 269.3 154.7 280 168 280H232V344C232 357.3 242.7 368 256 368z"/></svg></i></a></li>
                                    <li><a href="#"><i class="carte__icone--couleur-blanc"><svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM168 232C154.7 232 144 242.7 144 256C144 269.3 154.7 280 168 280H344C357.3 280 368 269.3 368 256C368 242.7 357.3 232 344 232H168z"/></svg></i></a></li>
                                    </div>
                                    
                                </ul>
                            </label>
                        </div>  
-->   
                        </div>
                        
                        <div>
                            <div class="carte__texte" >
                                <?php echo $bouteille['description_bouteille'];?>
                            </div>
                        </div>
                    </div>
                    
                </div>       
            </div>
        </div>
    </div>
<?php
};
}else{


?>
<p>Aucune bouteille</p>
<?php
}
?>
           

    
</section>