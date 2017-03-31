<?php
    include ("../includes/common.php");

    outputHead("Game World - Your Profile");
    outputNav("account", "search.php", "../phpmongodb/vendor/autoload.php");
    setAccountTab();

?>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 editAccount ">
        <h2 class="pageHeaders" "> Edit Account Details</h2>
        <div class="col-md-10">
            <form action="../php/updateAccount.php" method="POST" id="updateAccountForm">
                <fieldset>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nameUpdate" name="name" placeholder="Name*" value="" required maxlength="16">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="lastNameUpdate" name="lastName" placeholder="Last Name*" value="" required maxlength="16">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="passUpdate" name="passwordUpdate" placeholder="Password*" onblur="checkValidPass('passUpdate')"  minlength="6" required>
                    </div>
                    <div class="col-md-12 text-center" id="passExplanation">
                        <p>*Password must be at least 8 characters long,contain at least 1 number, 1 uppercase and any one of these symbols: !@#$%^\&amp</p>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="repassUpdate" name="repassUpdate" placeholder="Re-Type Password*" onblur="checkSamePass('passUpdate','repassUpdate')"  minlength="8" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="mobileNoUpdate" name="mobileNo" placeholder="Mobile Number" value="" required>
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
                        <input type="text" class="form-control" id="addressLine1Update" name="addressLine1" placeholder="Address Line 1" value="" required>
                        <input type="text" class="form-control" id="addressLine2Update" name="addressLine2" placeholder="Address Line 2" value="" required>
                        <input type="text" class="form-control" id="postcodeUpdate" name="postcode" placeholder="Postcode" value="" required>
                        <input type="text" class="form-control" id="cityUpdate" name="city" placeholder="City" value="" required>
                        <input type="text" class="form-control" id="countryUpdate" name="country" placeholder="Country" value="" required>
                    </div>
                    <div class="text-center col-md-12">
                        <input type="button" name="register" class="btn btn-success" value="Update Account" onclick="updateAccount();">
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 orderListSection ">
        <h2 class="pageHeaders" "> Orders</h2>
        <div class="col-md-10" id="ordersList">

        </div>
    </div>
</div>

<?php
    footer();
?>

    <script>
        window.onload = function() {
            fillForm();
        };

    </script>

