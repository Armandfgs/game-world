<?php
	require '../includes/common.php';
	outputHead("Admin - Home");
	outputAdminNav( 'account' );
	checkForAdmin();
    setHomeTab();

?>

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-5 createAccount">
        <h2 class="pageHeaders" "> Add Admin</h2>
        <div class="col-md-10">
            <form action="../php/registerAdmin.php" method="POST" id="adminRegisterForm">
                <fieldset>
                    <div class="form-group">
                        <input type="text" class="form-control" id="newAdminName" name="username" placeholder="Username*" required maxlength="16">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="newAdminPass" name="password" placeholder="Password*" onblur="checkValidPass('newAdminPass')" minlength="6" required>
                    </div>
                    <div class="col-md-12 text-center" id="passExplanation">
                        <p>*Password must be at least 8 characters long,contain at least 1 number, 1 uppercase and any one of these symbols: !@#$%^\&amp</p>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="newAdminRepass" name="repass" placeholder="Re-Type Password*" onblur="checkSamePass('newAdminPass','newAdminRepass')" minlength="8" required>
                    </div>
                    <div class="text-center col-md-12">
                        <input type="button" name="register" class="btn btn-success" value="Add Admin" onclick="registerAdmin();">
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <div class="col-md-5">
        <div class="col-md-2"></div>
        <div class="col-md-5">
            <h2 class="pageHeaders" ">Admin List</h2>
        </div>
        <div class="col-md-12" id="adminList">
        </div>
    </div>
</div>

<script type="text/javascript"> window.onload = function () {
        getAdminList();
    };</script>

<?php
footer();
?>

