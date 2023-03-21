<?php
session_start();

$nom = $_POST['nom'];
$prix = $_POST['prix'];
$description = $_POST['description'];
$img = $_POST['img'];
$produit_id = $_POST['produit_id'];

?>



<section aria-label="Main content" role="main" class="product-detail">
  <div>
    <div class="shadow">
      <div class="_cont detail-top">
        <div class="cols">
          <div class="left-col">
            <div class="thumbs">
              <a class="thumb-image active" data-index="0">
                <span><img src="<?php echo $img ?>" alt=""></span>
              </a>
            </div>
            <div class="big">
              <span id="big-image" class="img" quickbeam="image" style="background-image: url('<?php echo $img ?>')"></span>
            </div>
          </div>
          <div class="right-col">
            <h1 itemprop="name"><?php echo $nom ?></h1>
            <div itemprop="offers">
              <meta itemprop="priceCurrency" content="EUR">
              <div class="price-shipping">
                <div class="price" id="price-preview" quickbeam="price" quickbeam-price="800">
                  <?php echo $prix. ",00€" ?>
                </div>
              </div>
              <!-- <form method="post" enctype="multipart/form-data" id="AddToCartForm"> -->
              <div id="AddToCartForm">
                <div class="btn-and-quantity-wrap">
                  <div class="btn-and-quantity">
                    </div>
                    <div>
                      <div >
                    <input type="hidden" name="produit_id" id="id_prod" value=<?php echo $produit_id ?>>
                    <div id="AddToCart" quickbeam="add-to-cart" style="display: flex; float: left; cursor: pointer">
                      <span class="ajout" name="ajouter_panier" id="AddToCartText">Add to Cart</span>
                    </div>
                    </div>
                    </div>  
                </div>
                </div>
              <div class="tabs">
                <div class="tab-labels">
                  <span data-id="1" class="active">Info</span>
                </div>
                <div class="tab-slides">
                  <div id="tab-slide-1" itemprop="description" class="slide active">
                    <?php echo $description ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</section>



<!-- end container -->
<!-- end pricing-main -->