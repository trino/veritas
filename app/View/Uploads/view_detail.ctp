<?php include_once('inc.php');?>



<h3 class="page-title">
	Documents: <?php echo $doc['Document']['title']; ?></td>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>uploads/view_detail/<?php echo $doc['Document']['id']; ?></td>">Documents: <?php echo $doc['Document']['title']; ?></td></a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>


<?php echo $this->Html->css('prettyPhoto'); ?>
<?php echo $this->Html->script('jquery.prettyPhoto'); ?>
<div id="table">
<table>
    <tr>
        <td style="width:140px;"><b>Title</b></td>
        <td><?php echo $doc['Document']['title']; ?></td>
    </tr>
    <!--<tr>
        <td><b>Location</b></td>
        <td><?php echo $doc['Document']['location']; ?></td>
    </tr> -->
    <tr>
        <td><b>Description</b></td>
        <td><?php echo $doc['Document']['description']; ?></td>
    </tr>
    <tr>
        <td><b>Uploaded By</b></td>
        <td><?php if($doc['Document']['addedBy'] != 0){$q = $member->find('first',array('conditions'=>array('id'=>$doc['Document']['addedBy'])));if($q){echo "<a href='".$base_url."members/view/".$q['Member']['id']."'>".$q['Member']['full_name']."</a>";}}else echo "Admin";?></td>
    </tr>
    <tr>
        <td><b>Uploaded On</b></td>
        <td><?php echo $doc['Document']['date']?></td>
    </tr>
</table>
</div>
<div class="image">
<ul class="gallery clearfix">
    <?php
    foreach($image as $i)
    {?>
        <li><a href="<?php echo $base_url;?>img/documents/<?php echo $i['Image']['image']; ?>" rel="prettyPhoto[gallery1]"><?php echo $this->Html->image('documents/'.$i['Image']['image'],array('width'=>'100','height'=>'100')); ?></a></li>
        
    <?php } 
    ?>
    <div class="clear"></div>
    </ul>
</div>
<div class="documents">
    <?php 
        foreach($do as $d)
        { ?>
            <a class="btn" href="https://docs.google.com/viewer?url=http://<?php echo $_SERVER['SERVER_NAME'];if($_SERVER['SERVER_NAME']=='localhost')echo'/veritas';?>/img/documents/<?php echo $d['Doc']['doc'];  ?>"><?php echo $d['Doc']['doc'];  ?></a>
        <?php }
    ?>
    <div class="clear"></div>
</div>
<?php if($vid) { ?>
<div id="myElement">Loading the player...</div>
<script type="text/javascript">
    function video(value)
    {
        jwplayer("myElement").setup({
        file: "<?php echo $base_url;?>img/documents/"+value,
        image: "<?php echo $base_url;?>img/documents/ZaideesVID-Clip1.flv"
    });
    }
    $(function(){
    var video = $('#first').val();
    jwplayer("myElement").setup({
        file: "<?php echo $base_url;?>img/documents/"+video,
        image: "<?php echo $base_url;?>img/documents/ZaideesVID-Clip1.flv"
    });
    });
</script>
<div class="video">
<?php foreach($vid as $v) { ?><input type="hidden" name="first" id="first" value="<?php echo $v['Video']['video']; ?>" /> <?php break; } ?>
    <?php
    foreach($vid as $v)
    { ?>
<div class="sub-video"> <?php
        echo $this->Html->image('video.png', array('alt' => 'video'));
        ?>
        
        <a href="javascript:void(0);" onclick="video(this.id)" id="<?php echo $v['Video']['video']; ?>"><?php echo $v['Video']['video']; ?></a> </div>
    <?php } 
    ?>
</div>
<?php } ?>
<div class="clear"></div>

<div id="youtube">
<?php if($you)
{
    foreach($you as $y)
    {
        $yo=$y['Youtube']['youtube'];
        if(strstr($yo,'iframe'))
        {
         echo $yo;   
        }
        else
        {
            $yoo=explode('/',$yo);
            //var_dump($yoo);
            if($yoo['3']=='embed')
            {
                $link=$yo;
            }   
            else
            {
                $yl=explode('?v=',$yo);
                $link='http://www.youtube.com/embed/'.$yl[1];
            }
            ?>
            <iframe width="560" height="315" src="<?php echo $link; ?>" frameborder="0" allowfullscreen></iframe>
            <?php 
        }
    }
}  
?>
</div>
<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
			$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
                });
   </script>