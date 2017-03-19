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
<div class="row" id="cartItems">
</div>
<script type="text/javascript">
    window.onload = function () {
        showCartItems();
    };
</script>

<?php
    footer();
?>

