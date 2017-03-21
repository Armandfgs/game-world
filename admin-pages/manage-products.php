<?php
    require '../includes/common.php';
    outputHead( 'Admin - Manage Products' );
    outputAdminNav( 'Manage Products' );

    checkForAdmin();
    setHomeTab();
?>

        <h2>Product Management </h2>

        <div id= "product-wrapper">

            <a href="add-products.php" id="add-p-btn" class="btn btn-primary" role="button">Add a new Product</a>

            <div class="divTable">
                <div class="divTableBody">
                    <div class="divTableRow">
                        <div class="divTableCell"><h3>Image</h3></div>
                        <div class="divTableCell"><h3>Product Name</h3></div>
                        <div class="divTableCell"><h3>SKU</h3></div>
                        <div class="divTableCell"><h3>Developer</h3></div>
                        <div class="divTableCell"><h3>Model</h3></div>
                        <div class="divTableCell"><h3>Platform</h3></div>
                        <div class="divTableCell"><h3>Genre</h3></div>
                        <div class="divTableCell"><h3>Release Date</h3></div>
                        <div class="divTableCell"><h3>Price</h3></div>
                    </div>
                     
     <?php

        require '../phpmongodb/vendor/autoload.php';

    //this can be used to output products in shop.php
    $client = new MongoDB\Client;
    $gameworld = $client->gameworld;
    $product = $gameworld->products;

    $search = $product->find();

        foreach ($search as $document) {
            echo ('
             <div class="divTableRow">
                 <div class="divTableCell"> <div class="admin-product-image"><img src= /game-world/res/images/'. $document["image"] . ' width="125" height="100"></div></div>
                 <div class="divTableCell"><h6>'. $document["name"] . '</h6></div>
                 <div class="divTableCell"><h6>'. $document["sku"] . '</h6></div>
                 <div class="divTableCell"><h6>'. $document["developer"] . '</h6></div>
                 <div class="divTableCell"><h6>'. $document["model"] . '</h6></div>
                 <div class="divTableCell"><h6>'. $document["platform"] . '</h6></div>
                 <div class="divTableCell"><h6>'. $document["genre"] . '</h6></div>
                 <div class="divTableCell"><h6>'. $document["releaseDate"] . '</h6></div>
                 <div class="divTableCell"><h6>€'. $document["price"] . '</h6></div>
                 <div class="divTableCell"><a href="edit-product.php?id='. $document["_id"] .' " class="btn btn-link btn-sm " role="button"><span class="glyphicon glyphicon-edit"></span> edit</a></div>
                 <div class="divTableCell"><a href="delete-product.php?id='. $document["_id"] .' " class="btn btn-danger btn-sm "><span class="glyphicon glyphicon-trash"></span> delete</a></div>
            </div>
            ');        

        }  
     ?>

                    
                </div>
            </div>

        </div>



      <!--<script type="text/javascript">
        $(".prdplaceholder").load(Return-Products.php);
        $.ajax({
            type: "GET",
            url: 'controller/Action.php',
            data: "functionName=add",
            success: function(response) {
                alert(response);
            }
        });
        var target = document.getElementById("prdplaceholder");
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'Return-Products.php', true);
        xhr.onreadystatechange = function () {
            console.log('readyState: ' + xhr.readyState);
            if(xhr.readyState == 2) {
                target.innerHTML = 'Loading...';
            }
            if(xhr.readyState == 4 && xhr.status == 200) {
                target.innerHTML = xhr.responseText;
            }
        }
        xhr.send();
    </script>-->

<?php
    footer();
?>