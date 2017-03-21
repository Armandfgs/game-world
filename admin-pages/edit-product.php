<?php
    require '../includes/common.php';
    outputHead( 'Admin - Edit Product' );
    outputAdminNav( 'Edit Products' );

    checkForAdmin();
    setHomeTab();
?>

 <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-5 editProduct">
        <h2 class="pageHeaders" "> Edit Product</h2>
        <div class="col-md-10">

<?php

    require '../phpmongodb/vendor/autoload.php';

    //this can be used to output products in shop.php
    $client = new MongoDB\Client;
    $gameworld = $client->gameworld;
    $product = $gameworld->products;

    $manager = new MongoDb\Driver\Manager('mongodb://localhost:27017');
    $bulk = new MongoDB\Driver\BulkWrite;

    $idString = $_GET["id"];

    $id = new MongoDB\BSON\ObjectID( $idString );

        echo ('

        <form method="post" id="postMethod" action="store-edited-product.php?id='. $id .' " onsubmit="return productEditValidation()" name="editProduct">
        
        ');

?>
            <fieldset>
                <div class="form-group">
                    <input type="file" accept ="image" onchange="readURL(this)" name ="image" id ="image" placeholder="image">
                    <img id="inputImage" src="#" />
                    <div id="image_invalid"></div>
                </div>

                <div class="form-group ">
                    <input type="text" class="form-control" name="name" id ="name" placeholder="Product Name">
                    <div id="productname_invalid"></div>
                </div>

                <div class="form-group">
                        <select class="form-control" name="genre" id="genre" value="genre">
                            <option>First-Person shooter</option>
                            <option>Action</option>
                            <option>Action-Adventure</option>
                            <option>Adventure</option>
                            <option>Role-Playing</option>
                            <option>Sports</option>
                            <option>Strategy</option>
                        </select>
                        <div id="category_invalid"></div>
                </div>

                <div class="form-group">
                        <select class="form-control" name="platform" id="platform" placeholder="platform">
                            <option>PC</option>
                            <option>Playstation 4</option>
                            <option>Xbox One</option>
                        </select>
                        <div id="platform_invalid"></div>
                </div>

                <div class="form-group">
                        <input type="number" class="form-control" name="price" id ="price" placeholder="0.00" value="0.00">
                        <div id="price_invalid"></div>
                </div>

                <div class="form-group">
                        <textarea class="form-control" rows="5" name="description" id="description"></textarea>
                        <div id="description_invalid"></div>
                </div>   

                <div class="form-group">
                        <input type="datetime-local" class="form-control" name="releaseDate" id ="releaseDate" placeholder="Release Date">
                        <div id="release_invalid"></div>
                </div>

                <div class="form-group">
                        <input type="text" class="form-control" name="developer" id ="developer" placeholder="developer">
                        <div id="developer_invalid"></div>
                </div>

                <div class="form-group">
                        <select class="form-control" name="model" id ="model" value="model">
                            <option>Single-Player</option>
                            <option>Single-Player, Multiplayer</option>
                        </select>
                        <div id="model_invalid"></div>
                </div>

                <div class="form-group">
                        <input type="text" class="form-control" name="sku" id ="sku" placeholder="Factory Release Code (sku)">
                        <div id="sku_invalid"></div>
                </div>   

                <a href="manage-products.php" class="btn btn-danger" role="button">Cancel</a>

                <input type="submit" name="storeBtn" value="Confirm">
            </fieldset>
        </form>
        </div>
    </div>
</div>
	
	<script type="text/javascript">

     var date = new Date(),
    dt = document.getElementById('releaseDate');
    dt.value = date.toISOString();

    //reads the url from the uploaded file and displays the picture input by the user
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#inputImage')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

    var image = document.forms["editProduct"]["image"];
	var productName = document.forms["editProduct"]["name"];
    var category = document.forms["editProduct"]["genre"];
    var platform = document.forms["editProduct"]["platform"];
	var price = document.forms["editProduct"]["price"];
	var description = document.forms["editProduct"]["description"];
    var release = document.forms["editProduct"]["releaseDate"];
    var developer = document.forms["editProduct"]["developer"];
    var model = document.forms["editProduct"]["model"];
    var sku = document.forms["editProduct"]["sku"];

	var image_invalid = document.getElementById("image_invalid");
	var productName_invalid = document.getElementById("productname_invalid");
    var category_invalid = document.getElementById("category_invalid");
    var platform_invalid = document.getElementById("platform_invalid");
	var price_invalid = document.getElementById("price_invalid");
	var description_invalid = document.getElementById("description_invalid");
    var release_invalid = document.getElementById("release_invalid");
    var developer_invalid = document.getElementById("developer_invalid");
    var model_invalid = document.getElementById("model_invalid");
    var sku_invalid = document.getElementById("sku_invalid");

	productName.addEventListener("blur", productNameVerification, true);
    category.addEventListener("blur", categoryVerification, true);
    platform.addEventListener("blur", platformVerification, true);
    price.addEventListener("blur", priceVerification, true);
	description.addEventListener("blur", descriptionVerification, true);
    release.addEventListener("blur", releaseVerification, true);
    developer.addEventListener("blur", developerVerification, true);
    model.addEventListener("blur", modelVerification, true);
    sku.addEventListener("blur", skuVerification, true);
	

	function productEditValidation(){
		//image validation
        if(image.value == ""){
            image_invalid.textContent = "Image is required";
            image.style.border = "2px solid red";
            image.focus();
            return false;
        }

        //product name validation
		if(productName.value == ""){
			productName_invalid.textContent = "Please enter a product name";
			productName.style.border = "2px solid red";
			productName.focus();
			return false;
		}
		
		//category validation
		if(category.value == ""){
			category_invalid.textContent = "A type of category needs to be selected";
			category.style.border = "2px solid red";
			category.focus();
			return false;	
		}

        //platform validation
        if(platform.value == ""){
            platform_invalid.textContent = "A type of platform needs to be selected";
            platform.style.border = "2px solid red";
            platform.focus();
            return false;   
        }

        //platform price
        if(price.value == ""){
            price_invalid.textContent = "Select a price amount";
            price.style.border = "2px solid red";
            price.focus();
            return false;   
        }
		
		//description validation
		if(description.value == ""){
			description_invalid.textContent = "A description is required";
			description.style.border = "2px solid red";
			description.focus();
			return false;
		}

        //release date validation
        if(release.value == ""){
            release_invalid.textContent = "Release date required";
            release.style.border = "2px solid red";
            release.focus();
            return false;
        }

        //developer validation
        if(developer.value == ""){
            developer_invalid.textContent = "developer required";
            developer.style.border = "2px solid red";
            developer.focus();
            return false;
        }

        //model validation
        if(model.value == ""){
            model_invalid.textContent = "single/ multiplayer value required";
            model.style.border = "2px solid red";
            model.focus();
            return false;
        }

        //sku validation
        if(sku.value == ""){
            sku_invalid.textContent = "Factory release code required";
            sku.style.border = "2px solid red";
            sku.focus();
            return false;
        }
	}
	
        //verify name selection
        function productNameVerification(){
            if (productName.value != "") {
                productName_invalid.innerHTML = "";
                productName.style.border = "2px solid green";
                return true;
            }else{
                productName.style.border = "none";
            }
        }

        //verify category selection
        function categoryVerification(){
            if (category.value != "") {
                category_invalid.innerHTML = "";
                category.style.border = "2px solid green";
                return true;
            }else{
                category.style.border = "none";
            }
        }

        //verify platform selection
        function platformVerification(){
            if (platform.value != "") {
                platform_invalid.innerHTML = "";
                platform.style.border = "2px solid green";
                return true;
            }else{
                platform.style.border = "none";
            }
        }

        //price verification
        function priceVerification(){
            if (price.value != "") {
                price_invalid.innerHTML = "";
                price.style.border = "2px solid green";
                return true;
            }else{
                price.style.border = "none";
            }
        }
		
	   //verify description
        function descriptionVerification(){
            if (description.value != "") {
                description_invalid.innerHTML = "";
                description.style.border = "2px solid green";
                return true;
            }else{
                description.style.border = "none";
            }
        }				

        //verify release date selection
        function releaseVerification(){
            if (release.value != "") {
                release_invalid.innerHTML = "";
                release.style.border = "2px solid green";
                return true;
            }else{
                release.style.border = "none";
            }
        }   

        //verify developer selection
        function developerVerification(){
            if (developer.value != "") {
                developer_invalid.innerHTML = "";
                developer.style.border = "2px solid green";
                return true;
            }else{
                developer.style.border = "none";
            }
        }   

        //verify model selection
        function modelVerification(){
            if (model.value != "") {
                model_invalid.innerHTML = "";
                model.style.border = "2px solid green";
                return true;
            }else{
                model.style.border = "none";
            }
        }   

        //verify sku selection
        function skuVerification(){
            if (sku.value != "") {
                sku_invalid.innerHTML = "";
                sku.style.border = "2px solid green";
                return true;
            }else{
                sku.style.border = "none";
            }
        }   

	</script>

<?php
    footer();
?>