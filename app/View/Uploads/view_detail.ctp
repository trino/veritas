<?php include_once('inc.php');?>
<style>
@media print {
  body * {
    visibility:hidden;
  }
  #table, #table * {
    visibility:visible;
  }
  #table {
    position:absolute;
    left:0;
    top:0;
  }
}
</style>

<script>
    $(function(){
       
        
    });
  </script>
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
<table class="table">
    <!--<tr>
        <td style="width:140px;"><b>Title</b></td>
        <td><?php echo $doc['Document']['title']; ?></td>
    </tr>
    <tr>
        <td><b>Location</b></td>
        <td><?php echo $doc['Document']['location']; ?></td>
    </tr> -->
    <tr>
        <td><b>Document Type</b></td>
        <td><?php echo $type = ucwords(str_replace('_',' ',$doc['Document']['document_type'])); ?></td>
    </tr>
     <?php if($type == 'Client Feedback'){?>
    <tr>
        <td><strong>Date</strong></td>
        <td><?php echo $memo['Clientmemo']['date'];?></td>
    </tr>
    <tr>
        <td><strong>Time</strong></td>
        <td><?php echo $memo['Clientmemo']['time'];?></td>
    </tr>
    <tr>
        <td><strong>Memo type</strong></td>
        <td><?php echo $memo['Clientmemo']['memo_type'];?></td>
    </tr>
    <tr>
        <td><strong>Guard Name</strong></td>
        <td><?php echo $memo['Clientmemo']['guard_name'];?></td>
    </tr>        
            
    <?php } ?>
   
    <tr>
        <td><b>Description</b></td>
        <td><?php echo $doc['Document']['description']; ?></td>
    </tr>
    <tr>
        <td><b>Job Title</b></td>
        <td><?php if($j = $job->findById($doc['Document']['job_id'])) echo $j['Job']['title'] ; ?></td>
    </tr>
    
    
    <?php if($type == 'Report')
    { ?>
     <!--<tr>
        <td><b>Client Memo</b></td>
        <td><?php echo $doc['Document']['client_feedback'];?></a></td>
    </tr>-->
    
    <?php if($activity){
        $r_types = array('','Activity Log','Mobile Inspection','Mobile Security','Security Occurance');
        ?>
        <tr>
        <td><strong>Report Type</strong></td>
        <td><?php echo $r_types[$activity[0]['Activity']['report_type']];?></td>
        </tr>
        <tr><td colspan="2">
        <table>
        <thead><th>Date</th><th>Time</th><th>Description</th></thead>
        <?php foreach($activity as $act)
              {?>
        <tr><td><?php echo $act['Activity']['date'];?></td><td><?php echo $act['Activity']['time'];?></td><td><?php echo $act['Activity']['desc'];?></td></tr>
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
<?php if($vid) { 
    
    ?>
    
    <?php
    /*?>
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
</script><?php */?>
<div class="video">
<?php foreach($vid as $v) { ?><input type="hidden" name="first" id="first" value="<?php echo $v['Video']['video']; ?>" /> <?php break; } ?>
    <?php
    foreach($vid as $v)
    { ?>
<div class="sub-video"> <?php
        //echo $this->Html->image('video.png', array('alt' => 'video'));
        ?>
        <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="500" height="264"
      poster=""
      data-setup="{}" style="background:#000;">
    <source src="<?php echo $base_url;?>img/documents/<?php echo $v['Video']['video']; ?>" type='video/webm' />
    <track kind="captions" src="demo.captions.vtt" srclang="en" label="English" />
  </video>
        <!--<a href="javascript:void(0);" onclick="video(this.id)" id="<?php echo $v['Video']['video']; ?>"><?php echo $v['Video']['video']; ?></a> </div>-->
        <br /><a href="<?php echo $base_url."uploads/download/".$v['Video']['video']; ?>" class="btn btn-info">Download</a>
        <br /><br /> 
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
<?php
/*
if($type == 'Report')
{
    */?>
    <input type="button" onclick="window.print();" value="Print" class="btn btn-primary" />
    <?php
//}
?>
<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
			$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
                });
   

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        mywindow.document.write('');
        /*optional stylesheet*/ mywindow.document.write('<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>css/bootstrap.min.css" />');
        
        mywindow.document.write('<div style="font-size:12px;">'+data+'</div>');
        

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>