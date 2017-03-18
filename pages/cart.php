<?php
    include ("../includes/common.php");

    outputHead("Game World - Cart");
    outputNav("cart");
    setAccountTab();
?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4">
        <h2 class="pageHeaders"> Your Cart </h2>
    </div>
</div>
<div class="row cartObject">
    <div class="col-md-2"></div>
    <div class="col-md-8 cartItem">
        <div class="col-md-3">
            <a href="product.php">
                <img src="http://www.w3schools.com/w3images/fjords.jpg" alt="Fjords" class="imgStyle">
            </a>
        </div>
        <div  class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <h4>Product Name</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 lead ">
                    <p class="text-left"> &euro; 49.99</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 lead ">
                    <button type="button" class="btn btn-danger" onclick="deleteRow(this)">Remove</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row cartObject">
    <div class="col-md-2"></div>
    <div class="col-md-8 cartItem">
        <div class="col-md-3">
            <a href="product.php">
                <img src="http://www.w3schools.com/w3images/nature.jpg" alt="Nature" class="imgStyle">
            </a>
        </div>
        <div  class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <h4>Product Name</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 lead ">
                    <p class="text-left"> &euro; 49.99</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 lead ">
                    <button type="button" class="btn btn-danger" onclick="deleteRow(this)">Remove</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row cartObject">
    <div class="col-md-2"></div>
    <div class="col-md-8 cartItem">
        <div class="col-md-3">
            <a href="product.php">
                <img src="http://www.w3schools.com/w3images/lights.jpg" alt="Lights" class="imgStyle">
            </a>
        </div>
        <div  class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <h4>Product Name</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 lead ">
                    <p class="text-left"> &euro; 49.99</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 lead ">
                    <button type="button" class="btn btn-danger" onclick="deleteRow(this)">Remove</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row text-center">
    <button type="button" class="btn btn-success">Confirm Order</button>
</div>

<?php
    footer();
?>

