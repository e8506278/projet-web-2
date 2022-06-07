<!--Page d'accueil non connecté-->
<?php
//    print_r($product);
//    foreach ($product as $key => $value){
//        echo $key . " => ". $value."     -------      \n";
//    }
//    echo "Non". $product['prix'];
?>
<section class="section-wrapper texte-photo">

	<article class="texte-photo__contenu">


        <div class="product-photo">
            <img  src="<?php echo $product['image']?>" alt="degustation2">
        </div>

        <div class="top-info">
            <h1 class="texte-photo__titre"><?php echo $product['nom']?></h1>
            <h3 class="under-texte-photo__texte">
                <?php echo $product['description']?>
            </h3>
            <br><br>
            
<div class="tabset">
    <!-- Tab 1 -->
    <input type="radio" name="tabset" id="tab1" aria-controls="marzen" checked>
    <label for="tab1">Infos</label>
    <!-- Tab 2 -->
    <input type="radio" name="tabset" id="tab2" aria-controls="rauchbier">
    <label for="tab2">Details</label>
    
    
    <div class="tab-panels">
      <section id="marzen" class="tab-panel">
        <div class="info-details">
            <div class="row">
                <div class="col-6 info-unit">
                    <div class="label">Pays</div>
                    <div class="value"><?php echo $product['nom_pays']?></div>
                </div>
                <div class="col-6 info-unit">
                    <div class="label">Catégorie</div>
                    <div class="value"><?php echo $product['nom_categorie']?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 info-unit">
                    <div class="label">Région</div>
                    <div class="value">South Eastern Australia **HC**</div>
                </div>
                <div class="col-6 info-unit">
                    <div class="label">Format</div>
                    <div class="value"><?php echo $product['format']?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 info-unit">
                    <div class="label">Désignation réglementée</div>
                    <div class="value">Vin de table (VDT) **HC**</div>
                </div>
                <div class="col-6 info-unit">
                    <div class="label">Vin de table (VDT)</div>
                    <div class="value">19 Crimes **HC**</div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 info-unit">
                    <div class="label">Cépage</div>
                    <div class="value">Chardonnay 100 % **HC**</div>
                </div>
                <div class="col-6 info-unit">
                    <div class="label">Agent promotionnel</div>
                    <div class="value">Mark Anthony Brands Ltd **HC**</div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 info-unit">
                    <div class="label">Degré d'alcool</div>
                    <div class="value">16 % **HC**</div>
                </div>
                <div class="col-6 info-unit">
                    <div class="label">Code SAQ</div>
                    <div class="value"><?php echo $product['code_saq']?></div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 info-unit">
                    <div class="label">Taux de sucre</div>
                    <div class="value">10 g/L **HC**</div>
                </div>
                <div class="col-6 info-unit">
                    <div class="label">Code CUP</div>
                    <div class="value">00012354001947 **HC**</div>
                </div>
            </div>
            <div class="row">
                <button class="bouton-secondaire w-100 submit-button">
                   Button 1
                </button>
            </div>
           
        </div>
       </section>
        <section id="rauchbier" class="tab-panel">
            <div class="info-details">
                <div class="row">
                    <div class="col-6 info-unit">
                        <div class="value">Prix</div>
                        <div class="value">
                            <input type='number' style="max-width:70% ;" >  
                        </div>
                    </div>
                    <div class="col-6 info-unit">
                        <div class="value">Quantite</div>
                        <div class="value">
                            <input type='number' style="max-width:70% ;" >  
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 info-unit">
                        <div class="value">Millesime</div>
                        <div class="value">
                            <input type='number' style="max-width:70% ;" >  
                        </div>
                    </div>
                    <div class="col-6 info-unit">
                        <div class="value">Garde jusqu'a</div>
                        <div class="value">
                            <input type='date' style="max-width:70% ;" >  
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 info-unit">
                        <div class="value">Date d'achat</div>
                        <div class="value">
                            <input type='date' style="max-width:70% ;" >  
                        </div>
                    </div>
                    <div class="col-6 info-unit">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 info-unit">
                        <button class="btn bouton-secondaire">
                            Button 2
                        </button>
                    </div>
                    <div class="col-6 info-unit">
                        <button class="btn bouton-secondaire">
                            Button 3
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
  </div>
  
            
		</div>


            

		
	</article>

</section>



<section class="section-wrapper texte-photo">
        <!--LOGIN-->
       

        <div style="text-align:center ;">
            <div class='comments'>
<!--                this is for a nnew comment-->
                <div class="comment" >
                    <div class="comment-body">
                        <div class="comment-header">
                            <div class="d-flex">
                                <i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;&nbsp;
                                <h5>
                                    Ajouter une note</h5>
                            </div>
                        </div>
                        <div class="comment-text new-comment">
                            <p class="rating">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </p>
                        </div>
                        <!--                        <div class='light-text orange'>Veillez vous connecter pour pouvoir soumettre un commentaire</div>-->
                    </div>
                    <div class="hidden-separator"></div>
                    <div class="comment-body">
                        <div class="comment-header">
                            <div class="d-flex">
                                <i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;&nbsp;
                                <h5>
                                    Ajouter un nouveau commentaire</h5>
                            </div>
                        </div>
                        <div class="comment-text new-comment">
                            <textarea 
                                   class="input formulaire__champs boite-double__champs" ></textarea>
                            <button class="btn bouton-secondaire">Soumettre</button>
                        </div>
                    </div>
                </div>
            </div>

    </div>
</section>


<section class="section-wrapper">
    <div class="boite-double flex-column">
        <div class="boite-double__contenant-form">
            <h2>À Découvrir</h2>
        </div>
        <div class="product-cards row">
            <div class="card col">
                <div class="image">
                    <img src="https://www.saq.com/media/catalog/product/1/1/11097101-1_1580612720.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166&dpr=2">
                </div>
                <div class="title">
                    Cusumano Angimbé Sicilia  2021
                </div>
                <div class="title-2">
                    Vin-blan
                    <span class="divider">|</span>
                    375 ml
                </div>
                <div class="rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>&nbsp;&nbsp;
                    <span class="small-text">(10)</span>
                </div>
                <h2>
                    10,99 $
                </h2>
                <button class="bouton-secondaire w-100 submit-button">
                    Voir le produit
                </button>
            </div>
            <div class="card col">
                <div class="image">
                    <img src="https://www.saq.com/media/catalog/product/1/1/11254680-1_1591965010.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166&dpr=2">
                </div>
                <div class="title">
                    Kim Crawford Sauvignon Blanc Marlborough
                </div>
                <div class="title-2">
                    Vin-blan
                    <span class="divider">|</span>
                    375 ml
                </div>
                <div class="rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>&nbsp;&nbsp;
                    <span class="small-text">(10)</span>
                </div>
                <h2>
                    10,99 $
                </h2>
                <button class="bouton-secondaire w-100 submit-button">
                    Voir le produit
                </button>
            </div>
            <div class="card col">
                <div class="image">
                    <img src="https://www.saq.com/media/catalog/product/1/1/11133141-1_1580613312.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166&dpr=2">
                </div>
                <div class="title">
                    Folonari Pinot Grigio Delle Venezie
                </div>
                <div class="title-2">
                    Vin-blan
                    <span class="divider">|</span>
                    375 ml
                </div>
                <div class="rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>&nbsp;&nbsp;
                    <span class="small-text">(10)</span>
                </div>
                <h2>
                    10,99 $
                </h2>
                <button class="bouton-secondaire w-100 submit-button">
                    Voir le produit
                </button>
            </div>
            <div class="card col">
                <div class="image">
                    <img src="https://www.saq.com/media/catalog/product/1/1/11072851-1_1588244410.png?quality=80&fit=bounds&height=166&width=111&canvas=111:166&dpr=2">
                </div>
                <div class="title">
                    Le Grand Ballon Val de Loire Chardonnay
                </div>
                <div class="title-2">
                    Vin-blan
                    <span class="divider">|</span>
                    375 ml
                </div>
                <div class="rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>&nbsp;&nbsp;
                    <span class="small-text">(10)</span>
                </div>
                <h2>
                    10,99 $
                </h2>
                <button class="bouton-secondaire w-100 submit-button">
                    Voir le produit
                </button>
            </div>
        </div>
    </div>
</section>


<!--
<section class="section-wrapper banderole">
			<div class="grille grille--3 ">
				<div class="banderole__contenant">
					<div>Celliers</div>
					<div>2</div>
				</div>
				<div class="banderole__contenant">
					<div>Bouteilles</div>
					<div>50</div>
				</div>
				<div class="banderole__contenant">
					<div>À boire</div>
					<div>2</div>
				</div>
			
			</div>
		</section>
		<section  class="section-wrapper vignette">
		

			<h4 class="vignette__entete">Gérer mes collections</h4>
			<br>

			<div class="grille grille--4">
				<figure class="vignette__wrapper">
					<img class="vignette__img" src="./assets/img/cellier2.jpg" alt="cellier">
					<figcaption class="vignette__titre">Mes celliers</figcaption>
				</figure>

				<figure class="vignette__wrapper">
					<img class="vignette__img" src="./assets/img/bouteilles1.jpg" alt="bouteille">
					<figcaption class="vignette__titre">Mes bouteilles</figcaption>
				</figure>
	
				<figure class="vignette__wrapper">
					<img class="vignette__img" src="./assets/img/bouchonblanc.jpg" alt="bouteilles">
					<figcaption class="vignette__titre">Ajouter une bouteille</figcaption>
				</figure>

				<figure class="vignette__wrapper">
					<img class="vignette__img" src="./assets/img/etagere.jpg" alt="bouteilles">
					<figcaption class="vignette__titre">Ma liste d'achat</figcaption>
				</figure>
			</div>
			
		</section>
-->

