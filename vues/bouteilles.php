<section class="section-wrapper carte">
    <h3 class="carte__entete">Mes Bouteilles</h3>
    <div class="carte__contenant">
        <ul>
<?php
foreach ($data as $cle => $bouteille) {
?>
            <li class="carte__contenu ">
                <a class="carte__lien carte--flex" href="<?php echo $bouteille['url_saq'];?>">
                    <div class="carte__img">
                        <img src="<?php echo $bouteille['image']; ?>" alt="bouteille">
                    </div>
                    <div class="carte__description">
                        <h4 class="carte__titre"><?php echo $bouteille['nom']; ?></h4>
                        <ul class=" ">
                            <li class="carte__texte" >
                                <?php echo $bouteille['description'];?>
                            </li>
                        </ul>
                    </div>
                </a>
            </li>
<?php
}
?>
           
        </ul>
    </div>
    
</section>