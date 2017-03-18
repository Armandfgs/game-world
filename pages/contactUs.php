<?php
include ("../includes/common.php");

outputHead("Game World - Contact Us");
outputNav("contact");
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
    <article id="aboutUsTxt">
        Lorem ipsum dolor sit amet, id inani legendos indoctum has, ad vel saepe diceret. Cu ius fierent appareat perpetua. Cu nonumy accusamus instructior mea, an eam tamquam petentium tincidunt. Id idque lorem interesset sea. Qui natum mucius elaboraret cu, an mel iudico animal epicurei, ei aperiri ceteros cum. Cu quo vocibus erroribus.
        Falli constituam mei ut. Pro blandit accumsan disputationi ea, tibique definitionem an vel. Vis at amet veritus instructior. Vis cu nostrum suscipit neglegentur. Mutat altera blandit mel ex.
        Ei congue offendit nam, nec latine deleniti ad. Per similique efficiantur ut, ad dicta sententiae vim. No eum simul detraxit, ei illum corrumpit suscipiantur sit. Erant veniam iuvaret in quo. An saperet euripidis sententiae eum, ei dolore doctus usu.
        Pericula percipitur id nec, et vim ludus voluptaria theophrastus, mea tollit suscipit id. Eu nam eros vivendum, eu enim insolens definiebas vis. Vix ad viris nemore essent, oblique noluisse ei vim. Id molestiae conceptam has, et viris tantas pro, eu eos invenire vulputate.
        Cum ei elitr dolor philosophia, delenit dignissim his no. Eu sit consequat disputationi, at laudem dissentias sit. Vel at sonet probatus, his impetus equidem theophrastus ne. Ei ius audire electram. Pro in wisi omittantur, ut nonumy forensibus mei. Delenit disputationi sit at, ex dicat blandit efficiendi usu.
    </article>
</div>

<div class="col-md-3" id="infoUs">
    <p><span class="glyphicon glyphicon-earphone"></span> +356 79041997 </p>
    <p><span class="glyphicon glyphicon-envelope"></span> test123test@gmail.com </p>
    <p><span class="glyphicon glyphicon-user"></span> Facebook Account Link </p>
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

