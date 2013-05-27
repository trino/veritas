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
        <td><b>Job Title</b></td>
        <td><?php if($j = $job->findById($doc['Document']['job_id'])) echo $j['Job']['title'] ; ?></td>
    </tr>
    <tr>
        <td><b>Document Type</b></td>
        <td><?php echo $type = ucwords(str_replace('_',' ',$doc['Document']['document_type'])); ?></td>
    </tr>
    
    <?php if($type == 'Other')
    { ?>
     <!--<tr>
        <td><b>Client Memo</b></td>
        <td><?php echo $doc['Document']['client_memo'];?></a></td>
    </tr>-->
    <?php if($activity){?>
        <tr><td colspan="2"><strong>Activity</strong></td></tr>
        <tr><td colspan="2">
        <table>
        <thead><th>Time</th><th>Date</th><th>Description</th></thead>
        <?php foreach($activity as $act)
              {?>
        <tr><td><?php echo $act['Activity']['time'];?></td><td><?php echo $act['Activity']['date'];?></td><td><?php echo $act['Activity']['desc'];?></td></tr>
        <?php } ?> 
        </table></td></tr>
    <?php } ?> 
     
    <?php }
 ?>    <?php if($type == 'Evidence'){ ?>
    <tr>
        <td><b>Evidence Type</b></td>
        <td><?php echo $doc['Document']['evidence_type'];?></a></td>
    </tr>
    
    <tr>
        <td><b>Incident Date</b></td>
        <td><?php echo $doc['Document']['incident_date'];?></a></td>
    </tr>    
        
    <?php } ?>
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
        //echo $this->Html->image('video.png', array('alt' => 'video'));
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