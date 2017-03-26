<?php
    include ("includes/common.php");

    outputHead("Game World - Home");
    outputNav("home", "pages/search.php");
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
  <div class="content-block-one">
    <h2>Just For You!</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="thumbnail thumbnailFront">
          <a href="http://www.w3schools.com/w3images/lights.jpg">
            <img src="http://www.w3schools.com/w3images/lights.jpg" alt="Lights" class="imgStyle">
            <div class="caption">
              <p>Lorem ipsum...</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="thumbnail thumbnailFront">
          <a href="http://www.w3schools.com/w3images/nature.jpg">
            <img src="http://www.w3schools.com/w3images/nature.jpg" alt="Nature" class="imgStyle">
            <div class="caption">
              <p>Lorem ipsum...</p>
            </div>
          </a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="thumbnail thumbnailFront">
          <a href="http://www.w3schools.com//w3images/fjords.jpg">
            <img src="http://www.w3schools.com/w3images/fjords.jpg" alt="Fjords" class="imgStyle">
            <div class="caption">
              <p>Lorem ipsum...</p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</body>

<?php
    footer();
?>
