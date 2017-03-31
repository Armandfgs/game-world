<?php
    include ("includes/common.php");

    outputHead("Game World - Home");
    outputNav("home", "pages/search.php", "phpmongodb/vendor/autoload.php");
    setAccountTab();

?>

  <div id="startchange"></div>
  <div id="slider" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#slider" data-slide-to="0" class="active"></li>
    <li data-target="#slider" data-slide-to="1"></li>
    <li data-target="#slider" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="/game-world/res/images/zelda.jpg" alt="...">
    </div>
    <div class="item">
      <img src="/game-world/res/images/tombraider.jpg" alt="..." >
    </div>
    <div class="item">
      <img src="/game-world/res/images/forhonor.jpg" alt="...">
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#slider" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
  <div class="content-block-one">
  <h2>Welcome To Game World</h2>
      <p>We Hope You enjoy your time here. Stay Slayin!</p>
  </div>
  <!--TOP TRENDING SECTION-->
  <div class="content-space-one">
  </div>
  <div class="content-block-one">
    <h2>Hot Right Now!</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="thumbnail thumbnailFront">
          <a href="/game-world/res/images/acsyndicate.jpg">
            <img src="/game-world/res/images/acsyndicate.jpg" class="portrait" alt="Assassin's Creed Syndicate" >
          </a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="thumbnail thumbnailFront">
          <a href="/game-world/res/images/fallout4.jpg">
            <img src="/game-world/res/images/fallout4.jpg" alt="Fallout 4" >
            <div class="caption">
              <p>Fallout 4</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="thumbnail thumbnailFront">
          <a href="/game-world/res/images/gearsofwar4.jpg">
            <img src="/game-world/res/images/gearsofwar4.jpg" alt="Gears of War 4">
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--LATEST ADDED SECTION-->
  <div class="content-space-two">
  </div>
  <div class="content-block-one">
    <h2>Fresh out of The Oven!</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="thumbnail thumbnailFront">
          <a href="/game-world/res/images/horizon.jpg">
            <img src="/game-world/res/images/horizon.jpg" alt="Lights" class="imgStyle">
          </a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="thumbnail thumbnailFront">
          <a href="/game-world/res/images/ff15.jpg">
            <img src="/game-world/res/images/ff15.jpg" alt="Nature" class="imgStyle portrait">
          </a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="thumbnail thumbnailFront">
          <a href="/game-world/res/images/sniperelite4.jpg">
            <img src="/game-world/res/images/sniperelite4.jpg" alt="Fjords" class="imgStyle portrait">
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--USER RELATED ITEMS SECTION-->
  <div class="content-space-three">
  </div>

  <?php
     require 'phpmongodb/vendor/autoload.php';

        //this can be used to output products in shop.php
        $client = new MongoDB\Client;
        $gameworld = $client->gameworld;
        $userSearch = $gameworld->products;

        $manager = new MongoDb\Driver\Manager('mongodb://localhost:27017');
        $bulk = new MongoDB\Driver\BulkWrite;

        $nameString = $_GET["name"];//get name from url

        $regex = new MongoDB\BSON\Regex ( $nameString ,'i'); //can search for user input without case sensitivity        

        $search = $userSearch->find(['name' => $regex], ['limit' => 1], ["sort" => ["platform" => 1]]); //find name and sort by platform in ascending order

 foreach ($search as $document) {

        echo ('

  <div class="content-block-one" id="recommend">
    <h2>Just For You!</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="thumbnail thumbnailFront">
          <a href="pages/product.php?p=' . $document["sku"] . ' " alt="the product">
             <img src=/game-world/res/images/'. $document["image"] .'>
          </a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="thumbnail thumbnailFront">
          <a href="pages/product.php?p=' . $document["sku"] . ' " alt="the product">
             <img src=/game-world/res/images/'. $document["image"] .'>
          </a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="thumbnail thumbnailFront">
          <a href="pages/product.php?p=' . $document["sku"] . ' " alt="the product">
             <img src=/game-world/res/images/'. $document["image"] .'>
          </a>
        </div>
      </div>
    </div>
  </div>
  ');
      }
  ?>

<script>

/*var recommender = new Recommender;

window.onload = showRecommendation;

  function search(){
    var searchText = document.getElementById("searchBox").value;

    reommender.addKeyord(searchText);
    showRecommendation();

  }

  function showRecommendation(){
    document.getElementById("recommend").innerHTML = recommender.getTopKeyword();
    var getKey = recommendations.getTopKeyword();
    window.location.href = "index.php?keyword=" + getKey;
  }

// Evry time the document loads will check if there's a session cointining the logged in user
$(document).ready(function(){
    // GET request to server to see the session var
    $.get("login-management.php?CheckUser", function (data){
        if (data !== 'User Not Logged in') {
            changeButtons(); // if there is a user logged in, the loggin and register buttons get replaces
        } // end if
    })// end GET
});// end ready()*/

    </script>
</body>

<?php
    footer();
?>
