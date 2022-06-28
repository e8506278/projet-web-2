<section class="section-wrapper">
    <h3>Statistiques</h3>
    <select data-js-lescelliers>
                <option value="tous">Tous les celliers</option>
                <?php foreach($data as $cellier){?>
                <option value="<?php echo $cellier['id_cellier']?>"><?php echo $cellier['nom_cellier']?></option>
                <?php }?>
            </select>
            
    
    
            <div class="grille grille--2">
        <!--1-TYPE-->
        <div>
            <h4 class="graphique__titre">Type de bouteille</h4><div data-js-btnsformat>
                <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M374.6 73.39c-12.5-12.5-32.75-12.5-45.25 0l-320 320c-12.5 12.5-12.5 32.75 0 45.25C15.63 444.9 23.81 448 32 448s16.38-3.125 22.62-9.375l320-320C387.1 106.1 387.1 85.89 374.6 73.39zM64 192c35.3 0 64-28.72 64-64S99.3 64.01 64 64.01S0 92.73 0 128S28.7 192 64 192zM320 320c-35.3 0-64 28.72-64 64s28.7 64 64 64s64-28.72 64-64S355.3 320 320 320z"/></svg></i>
                <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M507.3 72.57l-67.88-67.88c-6.252-6.25-16.38-6.25-22.63 0l-22.63 22.62c-6.25 6.254-6.251 16.38-.0006 22.63l-76.63 76.63c-46.63-19.75-102.4-10.75-140.4 27.25l-158.4 158.4c-25 25-25 65.51 0 90.51l90.51 90.52c25 25 65.51 25 90.51 0l158.4-158.4c38-38 47-93.76 27.25-140.4l76.63-76.63c6.25 6.25 16.5 6.25 22.75 0l22.63-22.63C513.5 88.95 513.5 78.82 507.3 72.57zM179.3 423.2l-90.51-90.51l122-122l90.51 90.52L179.3 423.2z"/></svg></i>
            </div>
            

            <ul class="graphique" data-js-graphique>
           
                <li>
                    
                    <div>ROUGE </div>
                    <span class="graphique__qte" ></span>
                    <span class="index" style="width: <?php echo $types['p_rouge'];?>%">("<?php echo $types['p_rouge'];?>%")</span>
                    <span class="graphique--police"><?php echo round($types['p_rouge'],2);?>%</span>
                </li>
                <li>
                    <div>BLANC</div>
                    <span class="graphique__qte"></span>
                    <span class="index" style="width: <?php echo $types['p_blanc'];?>%">("<?php echo $types['p_blanc'];?>%")</span>
                    <span class="graphique--police"><?php echo round($types['p_blanc'],2);?>%</span>
                </li>
                <li>
                    <div>ROSÉ</div>
                    <span class="graphique__qte"></span>
                    <span class="index" style="width: <?php echo $types['p_rose'];?>%">("<?php echo $types['p_rose'];?>%")</span>
                    <span class="graphique--police"><?php echo round($types['p_rose'],2);?>%</span>
                </li>
              
            </ul>
        </div>
        <!--2-BUES-->
        <div>
            <h4 class="graphique__titre">Bouteilles consommées</h4>

            <ul class="graphique-vertical">
            <?php foreach ($moisBue as $cle =>$valeur) { 
                foreach($valeur as $col =>$nbre){ ?>
                <li> 
                    <span class="graphique--police"><?php echo $nbre ?></span>
                    <span class="graphique-vertical--couleur" style="height:<?php echo ($nbre/$bouteilles_bues)*100?>%"></span>
                    <span><?php echo $col?></span>
                </li>
            <?php }}?>
            </ul>    
        </div>
        <!--3-VALEUR DES DIFFÉRENTS CELLIERS-->
        <div>
            <h4>Valeur des celliers</h4>
        </div>
        <!--4-AJOUT DE BOUTEILLE-->
        <div>
            <h4>Bouteilles ajoutée</h4>

            <ul class="graphique-vertical">
            <?php foreach ($mois as $cle =>$valeur) { 
                foreach($valeur as $col =>$nbre){ ?>
                <li> 
                    <span class="graphique--police"><?php echo $nbre ?></span>
                    <span class="graphique-vertical--couleur" style="height:<?php echo ($nbre/$bouteilles_achat)*100?>%"></span>
                    <span><?php echo $col?></span>
                </li>
            <?php }}?>
            </ul>    
        </div>
    </div>
    



   
                
</section>