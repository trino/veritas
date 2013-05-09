<script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
                <?php echo $this->Html->css('prettyPhoto'); ?>
<?php echo $this->Html->script('jquery.prettyPhoto'); ?>
          <script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
			$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
                });
   </script>
<script>
$(function(){
    $( "#start_date" ).datepicker({dateFormat: "yy-mm-dd"});
    $( "#end_date" ).datepicker({dateFormat: "yy-mm-dd"});
    
    $('#post').live("click", function() {
    if (this.checked) {
        $('#field').show();
    }
    else {
        $('#field').hide();
    }
});
    });
</script> 
<div id="field">
    <h1>Detail of <?php echo $a['Ad']['title']; ?></h1>
<div id="right_part">
<div id="company-details">
<div class="owner">
<?php 
foreach($image as $i)
{
echo $this->Html->image('ads/'.$i['Image']['image']); 
}
?>
<div class="pe">
<?php echo $a['Ad']['description']; ?>
</div>
</div>
<div class="clear"></div>
<div id="description">
<p>Start Date :</p> <?php echo $a['Ad']['start_date']; ?><div class="clear"></div>
<?php  if($this->Session->read('type')=="business") {
?>
<p>Nearest Intersection :</p><p2><?php echo $a['Ad']['nearest_intersection']; ?></p2> <div class="clear"></div>
<p>MOP :</p><p2> <?php echo $a['Ad']['mop']; ?></p2><div class="clear"></div>
<p>References :</p> <p2><?php echo $a['Ad']['references']; ?></p2><div class="clear"></div>
<p>Return Policy :</p><p2> <?php echo $a['Ad']['return_policy']; ?></p2><div class="clear"></div>
<p>Warranty/Gurantee :</p><p2> <?php echo $a['Ad']['waranty_gurantee']; ?></p2><div class="clear"></div>
<p>Insurance :</p> <p2><?php echo $a['Ad']['insurance']; ?></p2><div class="clear"></div>
<p>licenses :</p><p2> <?php echo $a['Ad']['licenses']; ?></p2><div class="clear"></div>
<p>Qualification :</p> <p2><?php echo $a['Ad']['qualification']; ?></p2><div class="clear"></div>

<?php 
} 
else if($this->Session->read('type')=="seeker")
{
   echo "<p>Contact Information<p>";
    echo "<p>Name : ".$contact['Contact']['name']."</p>";
    echo "<p>Email : ".$contact['Contact']['email']."</p>";
    echo "<p>Phone".$contact['Contact']['phone']."</p>";
    echo "<p>Mobile ".$contact['Contact']['mobile']."</p>";
    echo "<p>Facebook ".$contact['Contact']['facebook']."</p>";
    echo "<p>Twitter ".$contact['Contact']['twitter']."</p>";
} 
?>
</div>
<?php
    if($a['Ad']['expiry']=='1')
    {
        if($a['Ad']['type']=='1')
        {
            echo $this->Html->link('Renew Ad','/user/renew_paid_ad/'.$a['Ad']['id']);
        }
        else
        {
            echo $this->Html->link('Renew Ad','/user/renew_free_add/'.$a['Ad']['id']);    
        }
    } 
?>
</div>


<?php /*
$st = str_replace(' ','+',$state['Province']['TITLE']);
    $ci = str_replace(' ','+',$city['Province']['TITLE']);
    $street = str_replace(' ','+',$a['Ad']['street']);
$address = "Canada+".$st."+".$ci."+".$street;
$url = "http://maps.google.com/maps/api/geocode/json?region=Canada&address=$address&sensor=false";
echo $url;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$response = curl_exec($ch);
curl_close($ch);
$response_a = json_decode($response);
echo $lat = $response_a->results[0]->geometry->location->lat;
echo $long = $response_a->results[0]->geometry->location->lng; */
?>
</div>
<div id="left_part">
<div class="big_img">


<?php 
     $im=explode('.',$first['Image']['image']);
        $img = $im[0]."_big.".$im[1];
    echo $this->Html->image('ads/'.$img,array('id'=>'main_image')); 
?>
</div>

<div class="thumb">
<ul class="gallery clearfix">
        <?php foreach($image as $i) { 
            $im=explode('.',$i['Image']['image']);
        $imge = $im[0]."_big.".$im[1];
        $imaa = $im[0]."_small.".$im[1];
            ?>
          <li><a href="/ads/img/ads/<?php echo $imge; ?>" rel="prettyPhoto[gallery1]"><?php echo $this->Html->image('ads/'.$imaa); ?></a></li>
          
          <?php } ?>
        </ul>
        <!-- end Basic jQuery Slider -->

      </div>
      <div class="clear"></div>
<div id="map" style="width: 500px; height: 400px;"></div>
</div>
<div class="clear"></div>
</div>
</div>
<script type="text/javascript">

<?php 
$st = str_replace(' ','+',$state['Province']['TITLE']);
    $ci = str_replace(' ','+',$city['Province']['TITLE']);
    $street = str_replace(' ','+',$a['Ad']['street']);
$address = "Canada+".$st."+".$ci."+".$street;
$url = "http://maps.google.com/maps/api/geocode/json?region=Canada&address=$address&sensor=false";
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
      ['<?php echo $a['Ad']['street']; ?>', <?php echo $lat ?>, <?php echo $long; ?>],
      
    ];
   
    <?php
    
    
$address = "Canada+".$st."+".$ci;
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