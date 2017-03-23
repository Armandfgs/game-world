<?php
	require '../includes/common.php';
	outputHead("Admin - Home");
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
<div class="row" id="allOrderss">
</div>
<script type="text/javascript">
    window.onload = function () {
        loadAllOrders();
    };

</script>


<?php
footer();
?>