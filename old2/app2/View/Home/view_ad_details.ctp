<script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
                <?php echo $this->Html->css('prettyPhoto'); ?>
<?php echo $this->Html->script('jquery.prettyPhoto'); ?>
          <script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
			$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
                });
   </script>
          
         
    
          
<script type="text/javascript">
    function contact_owner()
    {
        $('#owner').toggle();
    }
    
    function report_spam(id)
    {
        $.ajax({
            url: '/ads/home/report_spam',
            type: 'post',
            data: 'id='+id,
            success:function(response)
            {
                $('#'+id).remove();
                $('#response').show();
            }
            
        });       
    }
    function change_image(val)
    {
        var va=val.split('.');
        var v=va[0]+"_big."+va[1];
        var img= "/ads/img/ads/"+v;
        $('#main_image').attr("src",img);
    }
</script>

<div class="path"><?php 
    echo $cat; echo ">>".$sub_cat.">>";
?>
<?php
    echo $p.">>".$c."<br>";
?></div>

<div id="field">
<h1><?php echo $ad['Ad']['title'];  ?></h1>
<div id="right_part">
<div id="company-details">
<div class="top">
<div class="owner">
<?php
echo $this->Html->image("avatar.png"); 
?>
<?php
    echo "<strong>Posted By</strong> : " .$user['Register']['full_name']."<br>";
    echo $ad['Ad']['description']."<br>";
?>

</div>
<div class="floatright">
<a href="javascript:void(0);" id="<?php echo $ad['Ad']['id']; ?>" onclick="report_spam(this.id)">
<?php
echo $this->Html->image("flag.png"); 
?>Report Spam</a>
    <span id="response" style="display: none;">Reported As Spam</span>
    <div class="clear"></div>
    <a href="javascript:void(0);" onclick="contact_owner()" class="btn btn-success floatright margintop">Contact Owner</a>
    <div id="owner" style="display: none;">
        <form action="" method="post" id="Form" class="former">
            Name : <input type="text" name="name" id="name" class="required" /><div class="clear"></div>
            Email : <input type="text" name="email" id="email" class="required email" /><div class="clear"></div>
            Message : <textarea name="message" class="required floatright" rows="5" cols="30" c></textarea><div class="clear"></div>
            <input type="hidden" name="email_to" value="<?php echo $user['Register']['email']; ?>" />
            <input type="submit" class="btn btn-info" name="submit" value="Contact Owner" onclick="contact()" />
        </form>
    </div>
</div>
<div class="clear"></div>
</div>

 <?php echo $this->Html->image('logo/'.$user['Register']['logo']); ?><div class="clear"></div>
    <p>Name of the Company:</p><p2><?php echo $user['Register']['company']; ?></p2><div class="clear"></div>
    <p>Description:</p> <p2><?php echo $user['Register']['description']; ?></p2><div class="clear"></div>
    <p>Email:</p> <p2><?php echo $user['Register']['email']; ?></p2><div class="clear"></div>
    <p>Phone:</p> <p2><?php echo $user['Register']['phone']; ?></p2><div class="clear"></div>
    <p>mobile:</p> <p2><?php echo $user['Register']['cell']; ?></p2><div class="clear"></div>
    <p>website:</p> <p2><?php echo $user['Register']['website']; ?></p2><div class="clear"></div>
    <p>facebook :</p> <p2><?php echo $user['Register']['facebook']; ?></p2><div class="clear"></div>
    <p>twitter:</p> <p2><?php echo $user['Register']['twitter']; ?></p2><div class="clear"></div>
    <p>Hours of Operation:</p> <p2><?php echo $user['Register']['operation_start']; ?> to <?php echo $user['Register']['operation_end']; ?></p2><div class="clear"></div>
    <p>No. of Employee:</p> <p2><?php echo $user['Register']['no_of_employee']; ?></p2><div class="clear"></div>
    <p>Partners:</p> <p2><?php echo $user['Register']['partners']; ?></p2>
 
</div>
<div id="description">

<p>Nearest Intersection:</p><p2><?php echo $ad['Ad']['nearest_intersection']; ?></p2><div class="clear"></div> 
<p>MOP:</p> <p2><?php echo $ad['Ad']['mop']; ?></p2><div class="clear"></div>
<p>References:</p> <p2><?php echo $ad['Ad']['references']; ?></p2> <div class="clear"></div>
<p>Return Policy:</p> <p2><?php echo $ad['Ad']['return_policy']; ?></p2> <div class="clear"></div>
<p>Warranty/Gurantee:</p><p2> <?php echo $ad['Ad']['waranty_gurantee']; ?></p2> <div class="clear"></div>
<p>Insurance:</p> <p2><?php echo $ad['Ad']['insurance']; ?></p2><div class="clear"></div>
<p>licenses:</p><p2> <?php echo $ad['Ad']['licenses']; ?></p2> <div class="clear"></div>
<p>Qualification:</p> <p2><?php echo $ad['Ad']['qualification']; ?></p2> <div class="clear"></div>

</div>
<div class="social-plugins">
        <!-- AddThis Button BEGIN -->
        <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
        <a class="addthis_button_preferred_1"></a>
        <a class="addthis_button_preferred_2"></a>
        <a class="addthis_button_preferred_3"></a>
        <a class="addthis_button_preferred_4"></a>
        <a class="addthis_button_compact"></a>
        <a class="addthis_counter addthis_bubble_style"></a>
        </div>
        <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50cd6d093a158d38"></script>
<!-- AddThis Button END --> 
    </div>
</div>
<div id="left_part">
<div class="slider">
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
<div class="thumb">
<?php /*
    echo "<ul>";
    foreach($image as $i)
    {
        $im=explode('.',$i['Image']['image']);
        $imge = $im[0]."_small.".$im[1];
        echo "<li><a href='javascript:void(0);' id='".$i['Image']['image']."' onclick='change_image(this.id)'>".$this->Html->image('ads/'.$imge)."</a></li>";
    }
    echo "</ul>"; */
?>
</div>
</div>
<div id="map" style="width: 500px; height: 400px;"></div><br>
<?php if($ad['Ad']['youtube']!="") { 
    
        if(strstr($ad['Ad']['youtube'],"<iframe"))
        {
            echo $ad['Ad']['youtube'];
        }
        else if(strstr($ad['Ad']['youtube'],"?v="))
        {
            $str=explode('?v=',$ad['Ad']['youtube']);
            $s=$str[1];
            ?>
            <iframe width="560" height="315" src="http://www.youtube.com/embed/<?php echo $s; ?>" frameborder="0" allowfullscreen></iframe>
            <?php
        }
        else if(strstr($ad['Ad']['youtube'],"/embed"))
        {
            ?>
            <iframe width="560" height="315" src="<?php echo $ad['Ad']['youtube']; ?>" frameborder="0" allowfullscreen></iframe>
            <?php
        }
        
    ?>
    
    <?php } ?>
    
</div>
<div class="clear"></div>




    
  
    

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
  </div>
  