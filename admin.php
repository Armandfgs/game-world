<?php
	require 'includes/common.php';
	outputHead("Admin - Home");
	outputAdminNav( 'Home' );
    setHomeTab();

    if (!isset($_SESSION["admin"]))
    {
        echo ('<div>
                    <h2 id="adminHeader">Login to Admin</h2>
                </div>
                
                <div class="row">
                    <div id="loginAdmin" class="col-md-12">
                        <div class="col-md-4 text-left"></div>
                        <div class="col-md-3 text-left">
                            <h2 class="pageHeaders">Login</h2>
                            <form action="php/adminLogin.php" method="POST" id="adminLoginForm">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="username" type="text" class="form-control" name="username" placeholder="username" value="" required>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="passwordAdmin" type="password" class="form-control" name="passwordAdmin" placeholder="Password" value=""  required>
                                </div>
                                <div class="text-center " id="loginButton">
                                    <input type="button" name="login" onclick="tryAdminLogin();" value="Login" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>');
    }else
    {
        echo ('<div>
                    <h2 id="adminHeader">Access Granted</h2>
                </div>
                <div class="row">
                    <div id="loginAdmin" class="col-md-12">
                        <p class=\'lead text-center\'>Welcome to the admin area ' . $_SESSION["admin"]. ' </p>
                    </div>
                </div>');
    }
?>



<?php
	footer();
?>
