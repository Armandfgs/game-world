<?php
include ("../../includes/common.php");
outputHead("Game World - Shop");
outputNav("shop");
?>

<div class="row">
    <!--side bar navigation-->
    <div id="sideBar" class="col-md-3">
        <h3>Game Categories</h3>
        <li><a href="/game-world/pages/shop-categories/first-person-shooters.php">First-Person shooters</a></li>
        <li><a href="/game-world/pages/shop-categories/action.php">Acton</a></li>
        <li><a href="/game-world/pages/shop-categories/action-adventure.php">Acton-Adventure</a></li>
        <li><a href="/game-world/pages/shop-categories/adventure.php">Adventure</a></li>
        <li><a href="/game-world/pages/shop-categories/role-playing.php">Role-Playing</a></li>
        <li><a href="/game-world/pages/shop-categories/sports.php">Sports</a></li>
        <li><a href="/game-world/pages/shop-categories/strategy.php">Strategy</a></li>
    </div>

    <div id="productsList" class="col-md-6">

        <h2>Shop</h2>

        <?php

        require '../../phpmongodb/vendor/autoload.php';

        //this can be used to output products in shop.php
        $client = new MongoDB\Client;
        $gameworld = $client->gameworld;
        $product = $gameworld->products;

        $search = $product->find(['genre' => 'sports'], ["sort" => ["platform" => 1]]);

        foreach ($search as $document) {

        echo ('

        <!--the product section-->
        <div class="col-xs-12 col-sm-4 col-md-4"> <!-- bootstrap column size and sections for productList -->
            <div class="thumbnail"> <!--bootstrap code for thumbnails inside product section for each product -->
                <a href="product.php" alt="the product">
                    <img src=/game-world/res/images/'. $document["image"] .'>
                </a>
                <div class="caption"> <!--bootstrap code for product description inside each product -->
                    <h4>'. $document["name"] .'</h4>
                    <h5>Price:' . $document["price"] .'</h5>
                    <h5>Plaform:' . $document["platform"] .'</h5>
                    <h5>Availability: <span class="inStock">In Stock</span></h5>
                    <a href="product.php" role="button" class="viewProduct">View Item</a>
                    <button class="cartButton">Add to Cart  <span class="glyphicon glyphicon-shopping-cart"></span></button>
                </div>
            </div>
        </div>
        ');
        }   
    ?>
        <!--section for pagination-->
        <div id="pagination" class="pagination text-center col-md-12">
            <a href="#">&laquo;</a> <!-- the previous arrow for the pagination links-->
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">&raquo;</a> <!-- the next arrow for the pagination links-->
        </div>
    </div>
</div>

<?php
    footer();
?>