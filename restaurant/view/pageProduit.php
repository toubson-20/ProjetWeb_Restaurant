<?php


$nom = $_POST['nom'];
$prix = $_POST['prix'];
$description = $_POST['description'];
$img = $_POST['img'];

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
                  <?php echo number_format($prix, 2, '.') . " €" ?>
                </div>
              </div>
              <div class="swatches">
                <div class="swatch clearfix" data-option-index="0">
                  <div class="header">Taille</div>
                  <div data-value="M" class="swatch-element plain m available">
                    <input id="swatch-0-m" type="radio" name="option-0" value="M" checked />
                    <label for="swatch-0-m">
                      M
                    </label>
                  </div>
                  <div data-value="L" class="swatch-element plain l available">
                    <input id="swatch-0-l" type="radio" name="option-0" value="L" />
                    <label for="swatch-0-l">
                      L
                    </label>
                  </div>
                  <div data-value="XL" class="swatch-element plain xl available">
                    <input id="swatch-0-xl" type="radio" name="option-0" value="XL" />
                    <label for="swatch-0-xl">
                      XL
                    </label>
                  </div>
                  <div data-value="XXL" class="swatch-element plain xxl available">
                    <input id="swatch-0-xxl" type="radio" name="option-0" value="XXL" />
                    <label for="swatch-0-xxl">
                      XXL
                    </label>
                  </div>
                </div>
              </div>
              <!-- <form method="post" enctype="multipart/form-data" id="AddToCartForm"> -->
              <form id="AddToCartForm">
                <div class="btn-and-quantity-wrap">
                  <div class="btn-and-quantity">
                    <div class="spinner">
                      <span class="btn minus" data-id="2721888517" onclick="decreaseQuantity()"></span>
                      <input type="text" id="quantity" name="quantity" value="1" class="quantity-selector">
                      <span class="q">Qty.</span>
                      <span class="btn plus" data-id="2721888517" onclick="increaseQuantity()"></span>
                    </div>
                    <div id="AddToCart" quickbeam="add-to-cart">
                      <span id="AddToCartText">Add to Cart</span>
                    </div>
                  </div>
                </div>
              </form>
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