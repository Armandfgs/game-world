<?php
	require '../includes/common.php';
	outputHead("Admin - View Orders");
	outputAdminNav( 'cart' );
	checkForAdmin();
    setHomeTab();
?>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4">
        <h2 class="pageHeaders"> Orders </h2>
    </div>
</div>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6" id="allOrders">

    </div>
</div>
<script type="text/javascript">
    window.onload = function () {
        loadAllOrders();
    };

</script>


<?php
footer();
?>
