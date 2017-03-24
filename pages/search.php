<?php
include ("../includes/common.php");
outputHead("Game World - Shop");
outputNav("shop", "search.php");
?>

<div class="row" id="wrapper">
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

        require '../phpmongodb/vendor/autoload.php';

        //this can be used to output products in shop.php
        $client = new MongoDB\Client;
        $gameworld = $client->gameworld;
        $product = $gameworld->products;

        $manager = new MongoDb\Driver\Manager('mongodb://localhost:27017');
        $bulk = new MongoDB\Driver\BulkWrite;

        $nameString = $_GET["name"];//get name from url

        $regex = new MongoDB\BSON\Regex ( $nameString ,'i'); //can search for user input without case sensitivity
        $search = $product->find(['name' => $regex ], ["sort" => ["platform" => 1]]); //find name and sort by platform in ascending order

      //  $search = $product->find(['name' => $nameString], ["sort" => ["platform" => 1]]);

        foreach ($search as $document) {

        echo ('

        <!--the product section-->
        <div class="col-xs-12 col-sm-4 col-md-4"> <!-- bootstrap column size and sections for productList -->
            <div class="thumbnail"> <!--bootstrap code for thumbnails inside product section for each product -->
                <a href="../product.php?p=' . $document["sku"] . ' " alt="the product">
                    <img src=/game-world/res/images/'. $document["image"] .'>
                </a>
                <div class="caption"> <!--bootstrap code for product description inside each product -->
                    <h4>'. $document["name"] .'</h4>
                    <h5>Price:' . $document["price"] .'</h5>
                    <h5>Plaform:' . $document["platform"] .'</h5>
                    <h5>Availability: <span class="inStock">In Stock</span></h5>
                    <a href="../product.php?p=' . $document["sku"] . ' " role="button" class="viewProduct">View Item</a>
                    <button class="cartButton" onclick="addToCartShortcut('. $document["sku"] .');">Add to Cart  <span class="glyphicon glyphicon-shopping-cart"></span></button>
                </div>
            </div>
        </div>
        ');
        }   
    ?>


<!-- http://www.responsivewebmobile.com/posts/view/2013/07/09/19/Responsive_Infinite_Scroll_Tutorial_Template_free --><!--INFINITE SCROLLING-->

<!-- https://www.w3schools.com/php/php_ajax_livesearch.asp --><!--SEARCH FUNCTIONALITY-->

<!--http://www.phpbuilder.com/columns/tracking-cookies-sessions/Leidago_Noabeb05242011.php3 --><!--advice on user tracking with cookies-->

<script>
function yHandler(){
    var wrapper = document.getElementById('wrapper');
    var contentHeight = wrapper.offsetHeight;
    var yOffset = window.pageYOffset;
    var y = yOffset + window.innerHeight;
    if(y >= contentHeight){
        wrapper.innerHTML += '<div class = "newData"></div>'; 
    }
}
window.onscroll = yHandler;
</script>
<?php
    footer();
?>