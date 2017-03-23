<?php
include ("../includes/common.php");
outputHead("Game World - Shop");
outputNav("shop", "search.php");
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

        require '../phpmongodb/vendor/autoload.php';

        //this can be used to output products in shop.php
        $client = new MongoDB\Client;
        $gameworld = $client->gameworld;
        $product = $gameworld->products;

        $manager = new MongoDb\Driver\Manager('mongodb://localhost:27017');
        $bulk = new MongoDB\Driver\BulkWrite;

        $nameString = $_GET["name"];

        $name = new MongoDB\BSON\ObjectID( $nameString );

        $search = $product->find(['name' => $name], ["sort" => ["platform" => 1]]);

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
                    <button class="cartButton">Add to Cart  <span class="glyphicon glyphicon-shopping-cart"></span></button>
                </div>
            </div>
        </div>
        ');
        }   
    ?>


<!-- http://www.responsivewebmobile.com/posts/view/2013/07/09/19/Responsive_Infinite_Scroll_Tutorial_Template_free --><!--INFINITE SCROLLING-->

<!-- https://www.w3schools.com/php/php_ajax_livesearch.asp --><!--SEARCH FUNCTIONALITY-->

<!--https://www.experts-exchange.com/questions/27049459/How-to-track-user-activity-on-a-website-php.html#a35797723 --><!--advice on user tracking with cookies-->

    <script>
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>

<?php
    footer();
?>