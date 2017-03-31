<?php
include ("../includes/common.php");

outputHead("Game World - Contact Us");
outputNav("contact", "search.php", "../phpmongodb/vendor/autoload.php");
setAccountTab();
?>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4">
        <h2 class="pageHeaders"> Contact Us</h2>
    </div>
</div>
<div class="col-md-2"></div>
<div class = "col-md-4">
    <h3>A Little Bit About Us</h3>
    <article class="text-justify" id="aboutUsTxt">
        <p class="text-justify">
            Hi, we are Armand-F Grech Scerri and Charlot Borg, two Middlesex University Students aged 20 and 24.
            We are currently studying BsC Computer Studies at the Maltese Campus.
            This website was created due to an assignment that was issued to use in the Web Design and Databases module.
            It is here to demonstrate our knowledge and ability to use many different technologies including, HTML, CSS,
            JavaScript, JQuery, Ajax, PHP, MongoDB and Bootstrap.
        </p>
        <p class="text-justify">
            Game World is an E-Commerce Website that sells Mainly Video Games. The website has a custom built Content Managment
            System and admins are able to add, remove or edit the items in the store. It also includes a fully functional cart built on Ajax
            and the user can confirm the order where the order will then be stored. No actual money is processed. Users can search through the store
            and some simple tracking is done to highlight items that the user might like based off his searches. We hope you have a good experience
            going through our project. If you have any Queries feel free to contact us from the contact information offered.
        </p>

    </article>
</div>

<div class="col-md-3 text-right" id="infoUs">
    <p class="text-right"><span class="glyphicon glyphicon-earphone"></span> +356 79041997 </p>
    <p class="text-right"><span class="glyphicon glyphicon-earphone"></span> +356 99019134</p>
    <p class="text-right"><span class="glyphicon glyphicon-envelope"></span> armandfgs@gmail.com </p>
    <p class="text-right"><span class="glyphicon glyphicon-envelope"></span> charlotborg.mdx@gmail.com</p>
    <div class="row ">
        <div class="col-md-6"></div>
        <div class="col-md-5 ">
            <div class="col-md-5">
                <a href="https://www.facebook.com/armandfgs" class="btn btn-block btn-social btn-facebook">
                    <span class="fa fa-facebook-square fa-3x"></span>
                </a>
            </div>
            <div class="col-md-5">
                <a href="https://www.facebook.com/charlot.borg.33" class="btn btn-block btn-social btn-facebook">
                    <span class="fa fa-facebook-square fa-3x"></span>
                </a>
            </div>
        </div>



    </div>


</div>

<div id="map" class="col-md-12"></div>

<script>
    $(function () {
        function initMap() {
            var location = new google.maps.LatLng(35.925368, 14.477084);

            var mapCanvas = document.getElementById('map');
            var mapOptions = {
                center: location,
                zoom: 18,
                mapTypeId: 'satellite'
            }
            var map = new google.maps.Map(mapCanvas, mapOptions);
            var marker = new google.maps.Marker({position:location});
            marker.setMap(map);
        }
        google.maps.event.addDomListener(window, 'load', initMap);
    });
</script>

