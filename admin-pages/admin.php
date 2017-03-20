<?php
	require '../includes/common.php';
	outputHead("Admin - Home");
	outputAdminNav( 'Home' );
?>

<h2>Welcome to the Admin Area!</h2>
<div id="loginaAdmin" class="col-md-5">
    <h2 class="pageHeaders">Login</h2>
    <form action="../php/login.php?a=0" method="POST" id="adminLoginForm">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="username" type="text" class="form-control" name="username" placeholder="Username" required>
        </div>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="passwordAdmin" type="password" class="form-control" name="passwordAdmin" placeholder="Password" required>
        </div>
        <div class="text-center " id="loginButton">
            <input type="button" name="login" onclick="tryLogin(0);" value="Login" class="btn btn-success">
        </div>
    </form>
</div>

<?php
	footer();
?>
