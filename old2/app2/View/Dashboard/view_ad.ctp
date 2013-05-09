<script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
<h1><?php echo $ad['Ad']['title'];  ?></h1>
<div id="company-details">
 <?php echo $this->Html->image('logo/'.$user['Register']['logo']); ?>
    Name of the Company: <?php echo $user['Register']['company']; ?><br />
    Description: <?php echo $user['Register']['description']; ?><br />
    Email: <?php echo $user['Register']['email']; ?><br />
    Phone: <?php echo $user['Register']['phone']; ?><br />
    mobile: <?php echo $user['Register']['cell']; ?><br />
    website: <?php echo $user['Register']['website']; ?><br />
    facebook : <?php echo $user['Register']['facebook']; ?><br />
    twitter: <?php echo $user['Register']['twitter']; ?><br />
    Hours of Operation: <?php echo $user['Register']['operation_start']; ?> to <?php echo $user['Register']['operation_end']; ?><br />
    No. of Employee: <?php echo $user['Register']['no_of_employee']; ?><br />
    Partners: <?php echo $user['Register']['partners']; ?>
 
</div>
<?php 
    echo $cat; echo ">>".$sub_cat."<br>";
    echo $p.">>".$c."<br>";
    foreach($image as $i)
    {
        echo $this->Html->image('ads/'.$i['Image']['image']);
    }
    echo $ad['Ad']['description']."<br>";
    
    echo "By :" .$user['Register']['full_name']."<br>";
    echo "Start Date = ".$ad['Ad']['start_date']."<br>";
?>
Nearest Intersection: <?php echo $ad['Ad']['nearest_intersection']; ?><br />
MOP <?php echo $ad['Ad']['mop']; ?><br />
References <?php echo $ad['Ad']['references']; ?><br />
Return Policy <?php echo $ad['Ad']['return_policy']; ?><br />
Warranty/Gurantee: <?php echo $ad['Ad']['waranty_gurantee']; ?><br />
Insurance: <?php echo $ad['Ad']['insurance']; ?><br />
licenses: <?php echo $ad['Ad']['licenses']; ?><br />
Qualification <?php echo $ad['Ad']['qualification']; ?><br />
    
    
    <div id="map" style="width: 500px; height: 400px;"></div>

<script type="text/javascript">

<?php 
$p = str_replace(' ','+',$p);
    $c = str_replace(' ','+',$c);
    $street = str_replace(' ','+',$ad['Ad']['street']);
$address = "Canada+".$p."+".$c."+".$street;
$url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=Canada";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$response = curl_exec($ch);
curl_close($ch);
$response_a = json_decode($response);
$lat = $response_a->results[0]->geometry->location->lat;
$long = $response_a->results[0]->geometry->location->lng;
?>

    var locations = [
      ['<?php echo $ad['Ad']['street']; ?>', <?php echo $lat ?>, <?php echo $long; ?>]
    ];
    
    <?php
$address = "Canada+".$p."+".$c;
$url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=Canada";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$response = curl_exec($ch);
curl_close($ch);
$response_a = json_decode($response);
$lat = $response_a->results[0]->geometry->location->lat;
$long = $response_a->results[0]->geometry->location->lng;
?>
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 5,
      center: new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $long; ?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>