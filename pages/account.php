<?php
include ("../includes/common.php");
outputHead("Game World - Account");
outputNav("account", "search.php");
setAccountTab();
?>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-5 createAccount">
        <h2 class="pageHeaders"> Create an Account</h2>
        <div class="col-md-10">
            <form action="../php/registerAccount.php" method="POST" id="registerForm">
                <fieldset>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nameSignUp" name="name" placeholder="Name*" required maxlength="16">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="lastnameSignUp" name="lastName" placeholder="Last Name*" required maxlength="16">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="emailSignUp" name="emailSignUp" placeholder="E-Mail*" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="passSignUp" name="passwordSignUp" placeholder="Password*" onblur="checkValidPass('passSignUp')" minlength="6" required>
                    </div>
                    <div class="col-md-12 text-center" id="passExplanation">
                        <p>*Password must be at least 8 characters long,contain at least 1 number, 1 uppercase and any one of these symbols: !@#$%^\&amp;</p>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="repassSignUp" name="repass" placeholder="Re-Type Password*" onblur="checkSamePass('passSignUp','repassSignUp')" minlength="8" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="mobileNo" name="mobileNo" placeholder="Mobile Number" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="sel1">Sex:</label>
                        <select class="form-control" id="sex" name="sex">
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="addressLine1">Address:</label>
                        <input type="text" class="form-control" id="addressLine1" name="addressLine1" placeholder="Address Line 1" required>
                        <input type="text" class="form-control" id="addressLine2" name="addressLine2" placeholder="Address Line 2" required>
                        <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Postcode" required>
                        <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                        <input type="text" class="form-control" id="country" name="country" placeholder="Country" required>
                    </div>
                    <input type="hidden" name="isAdmin" value="false"/>
                    <div class="text-center col-md-12">
                        <input type="button" name="register" class="btn btn-success" value="Register" onclick="registerAccount();">
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <div id="login" class="col-md-5">
        <h2 class="pageHeaders">Login</h2>
        <form action="../php/login.php" method="POST" id="loginForm">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input id="emailLogin" type="text" class="form-control" name="emailLogin" placeholder="Email" required>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="passwordLogin" type="password" class="form-control" name="passwordLogin" placeholder="Password" required>
            </div>
            <div class="text-center " id="loginButton">
                <input type="button" name="login" onclick="tryLogin();" value="Login" class="btn btn-success">
            </div>
        </form>
    </div>
</div>

<?php
footer();

?>