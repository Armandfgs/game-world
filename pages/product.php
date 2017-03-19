<?php
include ("../includes/common.php");

outputHead("Game World - Shop");
outputNav("shop");
setAccountTab();
?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4">
        <h2 class="pageHeaders" id="prodPageName"></h2>
    </div>
</div>

<div class="row" id="prodDetailsTop">
    <div class="col-md-2"></div>
    <div class="col-md-4">
        <img src="" id="prodImage" class="img-responsive">
    </div>
    <div class="col-md-4">
        <div class="row bottom30" id="prodPageDropdownRow"></div>
        <h3 class="header3">Product Details</h3>
    </div>
    <div class="col-md-4">
        <div class="col-md-12 t" id="prodDetails"></div>
    </div>
</div>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-10">
        <h3 class="header3">Description</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <p id="prodDescription" class="text-justify">

        </p>
    </div>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4 lead" >
        <p id="prodPrice" class="lead"> Price: &euro; </p>
    </div>
    <div class="col-md-4 text-center" >
        <button type="button" class="btn btn-default" onclick="addToCart();">Add to Cart</button>
    </div>
</div>
<script type="text/javascript">
    window.onload = function () {
        getProduct();
    };
</script>

<?php
    footer();
?>