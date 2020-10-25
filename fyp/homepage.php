<?php
	// start the session()
	//session_start();
	require "Include/header.php";


    
      $sql = "SELECT * FROM assets";
      $result = $conn->query($sql);
      while ($row = $result -> fetch_assoc()) {
      	$rows[] = $row;
      	} 
      	$assetJson = json_encode($rows);

session_start();
   

    $type = $_SESSION["type"];
    $id = $_SESSION["loginid"];

    $timestamp = date('Y-m-d H:i:s');
    if(isset($_POST['checkin'])){
       
 
    $query = mysqli_query($conn," UPDATE users SET checkedIn = 1 WHERE id = $id");
   $query = mysqli_query($conn," UPDATE users SET TimeIn = $timestamp WHERE id = $id");

}

if(isset($_POST['checkout'])){
        
    $query = mysqli_query($conn," UPDATE users SET checkedIn = 0 WHERE id =$id ");
       $query = mysqli_query($conn," UPDATE users SET TimeOut = $timestamp WHERE id = $id");
}

?>

<div class="container">
    <div class="row">
        <h1>Asset Viewing Software</h1>






    </div>
</div>

<div id="map"></div>


<script>
    var asset_json = <?php echo $assetJson; ?>; //Storing JSON in a JS variable


    function initMap() {

        var landmark = {
            lat: 1.546952,
            lng: 110.351051
        };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 8,
            center: landmark
        });
        var infoWindow = new google.maps.InfoWindow;

        var markers = [];
        var infos = [];

        for (i = 0; i < asset_json.length; i++) {

            var pos = new google.maps.LatLng(asset_json[i].latitude, asset_json[i].longitude); //Setting postion for markers

            var info = new google.maps.InfoWindow({
                content: '<img style="float: left" src="' + asset_json[i].image + '" width=250 height=250 /> <strong>' + asset_json[i].name +
                    ' (' + asset_json[i].type + ')</strong> - ' + asset_json[i].description +
                    '<br /> <a href="assets.php">View Assets</a>',
            }); //Content of the pop-up window
            infos.push(info);

            markers[i] = new google.maps.Marker({
                position: pos,
                map: map,
                title: asset_json[i].name //Marker location and title
            });

            var addListener = function(i) {
                google.maps.event.addListener(markers[i], 'click', function() {
                    infos[i].open(map, markers[i]); //Populating all pop-up windows with their specific content    	                        
                });
            }
            addListener(i);
        }
    }
    //Please replace API Key as the free trial will end

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCe30wXf_lmZT4ha9DMw6lYdddmD53qyXU&callback=initMap" async defer></script>

</body>

</html>
