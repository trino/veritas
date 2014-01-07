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
<?php if($j = $job->findById($doc['SpecJob']['job_id'])) echo stripslashes($j['Job']['title']) ; ?> / 
	Documents: <?php 
        $type = ucfirst(str_replace(array('_','intel','News media'),array(' ','Intel','News/Media'),$doc['SpecJob']['document_type']));
        echo str_replace('News media','News/Media',$type);
        ?>
</h3>

<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>uploads/view_detail/<?php echo $doc['SpecJob']['id']; ?>/special">Documents: Special</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>


<?php echo $this->Html->css('prettyPhoto'); ?>
<?php echo $this->Html->script('jquery.prettyPhoto'); ?>

<div id="table">
<?php 
if($doc['SpecJob']['document_type']=='AFIMAC Intel')
    $ty = "afimac_intel";
elseif($doc['SpecJob']['document_type']=='News/Media')
    $ty = "news_media";
if($this->Session->read('admin')||($usr1['Member']['canView']==1 && $usr1['Member']['Canview'][$ty]=='1')){?>
<table class="table">
    
    <tr>
        <td><b>Document Type</b></td>
        <td><?php echo $type = ucwords(str_replace('_',' ',$doc['SpecJob']['document_type'])); ?></td>
    </tr>
    <tr>
        <td><b>Date of Publishment</b></td>
        <td><?php echo $doc['SpecJob']['dop']; ?></td>
    </tr>
    
    <tr >
        <td><b>Link</b></td>
        <td><?php if($doc['SpecJob']['link']){?><?php echo $doc['SpecJob']['link']; ?><?php }?></td>
    </tr>
    
    <tr>
        <td><b>Description</b></td>
        <td><?php echo $doc['SpecJob']['desc']; ?></td>
    </tr>
    <tr>
        <td><b>Job Title</b></td>
        <td><?php if($j = $job->findById($doc['SpecJob']['job_id'])) echo stripslashes($j['Job']['title']) ; ?></td>
    </tr>
    
    <tr>
        <td><b>Uploaded By</b></td>
        <td><?php if($doc['SpecJob']['addedBy'] != 0){$q = $member->find('first',array('conditions'=>array('id'=>$doc['SpecJob']['addedBy'])));if($q){if($this->Session->read('admin'))echo "<a href='".$base_url."members/view/".$q['Member']['id']."'>".$q['Member']['full_name']."</a>";else echo $q['Member']['full_name'];}}else echo "Admin";?></td>
    </tr>
    <tr>
        <td><b>Uploaded On</b></td>
        <td><?php echo $doc['SpecJob']['on_date']?></td>
    </tr>
    
</table>
</div>
<?php if(isset($activity) && $activity[0]['Activity']['report_type']=='7'){?>
    <div style="margin-bottom: 15px;"><a href="javascript:void(0);" onclick="window.print();" class="btn btn-primary">Print Report</a></div>
    <?php }?>
    
<?php
    if($doc['SpecJob']['doc']!= "")
    {
        $ext = explode('.',$doc['SpecJob']['doc']);
        $ext = end($ext);
    }
    else
        $ext = "";
    $ext_doc = array('doc','docx','txt','pdf','xls','xlsx','ppt','pptx','cmd','csv');
    $ext_img = array('jpg','png','gif','jpeg','bmp');
    $ext_video = array('mp4');
 ?>    
<div class="image">
<ul class="gallery clearfix">
    <?php
    
    if(in_array($ext,$ext_img))
    {?>
        <li><a href="<?php echo $base_url;?>img/documents/<?php echo $doc['SpecJob']['doc']; ?>" rel="prettyPhoto[gallery1]"><?php echo $this->Html->image('documents/'.$doc['SpecJob']['doc'],array('width'=>'100','height'=>'100')); ?></a></li>
        
    <?php } 
    ?>
    <div class="clear"></div>
    </ul>
</div>
<div class="documents">
    <?php 
        if(in_array($ext,$ext_doc))
        { ?>
            <!--<a class="btn" href="https://docs.google.com/viewer?url=http://<?php echo $_SERVER['SERVER_NAME'];if($_SERVER['SERVER_NAME']=='localhost')echo'/veritas';?>/img/documents/<?php echo $doc['SpecJob']['doc'];  ?>"><?php echo $doc['SpecJob']['doc'];  ?></a>-->
            <a class="btn" href="<?php echo $base_url;?>uploads/download/<?php echo $doc['SpecJob']['doc'];  ?>"><?php echo $doc['SpecJob']['doc'];  ?></a>
        <?php 
        }
    ?>
    <div class="clear"></div>
</div>
<?php if(in_array($ext,$ext_video)){ ?>
    

<div class="video">

<div style="float:left;width:40%;">


<input type="hidden" name="first" id="first" value="<?php echo $doc['SpecJob']['doc']; ?>" /> 



<div class="sub-video">

<!--video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="500" height="264"
poster=""
data-setup="{}" style="background:#000;">
<source src="<?php echo $base_url;?>img/documents/<?php echo $v['Video']['video']; ?>" type='video/webm' />
<track kind="captions" src="demo.captions.vtt" srclang="en" label="English" />
</video-->

<?php $video_file = $base_url . "img/documents/" . $doc['SpecJob']['doc']; ?>
<div id="myElement">Loading the player...</div>
<script type="text/javascript">
jwplayer("myElement").setup({
file: "<?=$video_file?>"
});
</script>

<!--<a href="javascript:void(0);" onclick="video(this.id)" id="<?php echo $doc['SpecJob']['doc']; ?>"><?php echo $doc['SpecJob']['doc']; ?></a> </div>-->
<br /><a href="<?php echo $base_url."uploads/download/".$doc['SpecJob']['doc']; ?>" class="btn btn-info">Download</a>


</div>

</div>
<div style="float:left;width:40%;border:1px solid #dadada; padding:20px;margin-left:120px;">
Please be patient. Some video files are large and may take a up to a minute to load.
<br><br>
Video not playing? Check the compatibility of your browser <a target = "_blank" href = "http://www.longtailvideo.com/support/jw-player/28837/browser-device-support/">here</a>.
<br><br>
You may also download the video and play it on your local device.
</div>
<?php } ?>


<div class="clear"></div>

<div id="youtube">
<?php if(isset($you))
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
    <!--<input type="button" onclick="window.print();" value="Print" class="btn btn-primary" />-->
    <?php
//}
?>
<?php }
    else
        echo "You are not authorized to view this file.";
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

