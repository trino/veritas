<?php include_once('inc.php');?>
<div id="table">

<?php 
  
    $ty = $doc['Document']['document_type'];
    
?>

<table class="table">
    
    <?php $type =ucwords(str_replace('_',' ',$doc['Document']['document_type']));
        if($type == "Deployment Rate")
            $type = "Deployment";
    ?> 
    <tr>
        <td><b> <?php echo $this->requestAction('dashboard/translate/Document Type');?></b></td>
        <td><?php echo $type; ?></td>
    </tr>
     <?php if($type == 'Client Feedback'){?>
    <tr>
        <td><strong>Date</strong></td>
        <td><?php echo $memo['Clientmemo']['date'];?></td>
    </tr>
    <tr>
        <td><strong><?php echo $this->requestAction('dashboard/translate/Time');?></strong></td>
        <td><?php echo $memo['Clientmemo']['time'];?></td>
    </tr>
    <tr>
        <td><strong><?php echo $this->requestAction('dashboard/translate/Memo type');?></strong></td>
        <td><?php echo $memo['Clientmemo']['memo_type'];?></td>
    </tr>
    <tr>
        <td><strong><?php echo $this->requestAction('dashboard/translate/Guard Name');?></strong></td>
        <td><?php echo $memo['Clientmemo']['guard_name'];?></td>
    </tr>        
            
    <?php } ?>
   <?php
   if($doc['Document']['document_type']!='personal_inspection' && $doc['Document']['document_type']!='vehicle_inspection'){?>
    <tr>
        <td><b>Description</b></td>
        <td><?php echo $doc['Document']['description']; ?></td>
    </tr>
    <?php }?>
    <tr>
        <td><b><?php echo $this->requestAction('dashboard/translate/Job Title');?></b></td>
        <td><?php if($j = $job->findById($doc['Document']['job_id'])) echo stripslashes($j['Job']['title']) ; ?></td>
    </tr>
    
    <?php if($type =='Deployment')
    {?>
       <tr><td><b>Period Covered - Start</b></td><td><?php echo $doc['Document']['start_peroid']." ".$doc['Document']['start_time'];?></td></tr>
       <tr><td><b>Period Covered - End</b></td><td><?php echo $doc['Document']['end_peroid']." ".$doc['Document']['end_time'];?></td></tr> 
    <?php }?>
    <?php if($type == 'Report')
    { ?>
     <!--<tr>
        <td><b>Client Memo</b></td>
        <td><?php echo $doc['Document']['client_feedback'];?></a></td>
    </tr>-->
    
    <?php
     
    if($activity){
        
        //var_dump($activity);
        $r_types = array('','Activity Log','Mobile Inspection','Mobile Security','Security Occurrence','Incident Reports','Sign-off Sheets','Loss Prevention','Static Site Audit','Insurance Site Audit','Site Signin Signout','Instructions And Site Assessment' ,'Personal Inspection','Mobile Inspection', 'Mobile Log', 'Mobile Vehicle Trunk Inventory', 'Vehicle Inspection','Disciplinary Warning','Injury and Illness','Notice of Termination','Uniform Issue - Static and Retail');
        ?>
        <tr>
        <td><strong><?php echo $this->requestAction('dashboard/translate/Report Type');?></strong></td>
        <td><?php echo $r_types[$activity[0]['Activity']['report_type']];?></td>
        </tr>
        <?php if($activity[0]['Activity']['incident_type']!=""){
            ?>
        <tr>
        <td><strong><?php echo $this->requestAction('dashboard/translate/Incident Report Type');?></strong></td>
        <td><?php echo $activity[0]['Activity']['incident_type'];?></td>
        </tr>
        <?php }
        
        
        if($activity[0]['Activity']['report_type']=='20'){?>
        <tr id="loss_prevention">
        <td colspan="2" style="padding: 0;"> <?php include('uniform_issue_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']!='8' && $activity[0]['Activity']['report_type']!='9'&& $activity[0]['Activity']['report_type']!='10'&& $activity[0]['Activity']['report_type']!='11'&& $activity[0]['Activity']['report_type']!='12'&& $activity[0]['Activity']['report_type']!='13'&& $activity[0]['Activity']['report_type']!='14'&& $activity[0]['Activity']['report_type']!='15'&& $activity[0]['Activity']['report_type']!='16'&& $activity[0]['Activity']['report_type']!='17'&& $activity[0]['Activity']['report_type']!='18'&& $activity[0]['Activity']['report_type']!='19'&& $activity[0]['Activity']['report_type']!='20')
        {
            ?>
        
        <tr><td colspan="2" style="padding: 0;">
        <table>
        <thead><th>Date</th><th><?php echo $this->requestAction('dashboard/translate/Time');?></th><th>Description</th></thead>
        <?php foreach($activity as $act)
              {?>
        <tr><td><?php echo $act['Activity']['date'];?></td><td><?php echo $act['Activity']['time'];?></td><td><?php echo $act['Activity']['desc'];?></td></tr>
        
        <?php } 
        
        ?> 
        </table></td></tr>
        
            <?php
        }
        ?>
    <?php } ?> 
     
    <?php }
 ?>    
    
    
    
    <tr>
        <td><b><?php echo $this->requestAction('dashboard/translate/Uploaded By');?></b></td>
        <td><?php if($doc['Document']['addedBy'] != 0){$q = $member->find('first',array('conditions'=>array('id'=>$doc['Document']['addedBy'])));if($q){if($this->Session->read('admin'))echo "<a href='".$base_url."members/view/".$q['Member']['id']."'>".$q['Member']['full_name']."</a>";else echo $q['Member']['full_name'];}}else echo "Admin";?></td>
    </tr>
    <tr style="border-bottom: 1px solid #DDD;">
        <td><b><?php echo $this->requestAction('dashboard/translate/Uploaded On');?></b></td>
        <td><?php echo $doc['Document']['date']?></td>
    </tr>
    
    
    
</table>
</div>
<?php if(isset($activity) && $activity[0]['Activity']['report_type']=='7'){?>
    <div style="margin-bottom: 15px;"><a href="javascript:void(0);" onclick="window.print();" class="btn btn-primary">Print Report</a></div>
    <?php }?>
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
            <!--<a class="btn" href="https://docs.google.com/viewer?url=http://<?php echo $_SERVER['SERVER_NAME'];if($_SERVER['SERVER_NAME']=='localhost')echo'/veritas';?>/img/documents/<?php echo $d['Doc']['doc'];  ?>"><?php echo $d['Doc']['doc'];  ?></a>-->
            <a class="btn" href="<?php echo $base_url;?>uploads/download/<?php echo $d['Doc']['doc'];  ?>"><?php echo $d['Doc']['doc'];  ?></a>
        <?php }
    ?>
    <div class="clear"></div>
</div>
<?php if($vid) { ?>
    

<div class="video">

<div style="float:left;width:40%;">

<?php foreach($vid as $v) { ?>
<input type="hidden" name="first" id="first" value="<?php echo $v['Video']['video']; ?>" /> 
<?php break; } ?>

<?php
foreach($vid as $v)
{
?>
<div class="sub-video">

<!--video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="500" height="264"
poster=""
data-setup="{}" style="background:#000;">
<source src="<?php echo $base_url;?>img/documents/<?php echo $v['Video']['video']; ?>" type='video/webm' />
<track kind="captions" src="demo.captions.vtt" srclang="en" label="English" />
</video-->

<?php $video_file = $base_url . "img/documents/" . $v['Video']['video']; ?>
<div id="myElement">Loading the player...</div>
<script type="text/javascript">
jwplayer("myElement").setup({
file: "<?=$video_file?>"
});
</script>

<!--<a href="javascript:void(0);" onclick="video(this.id)" id="<?php echo $v['Video']['video']; ?>"><?php echo $v['Video']['video']; ?></a> </div>-->
<br /><a href="<?php echo $base_url."uploads/download/".$v['Video']['video']; ?>" class="btn btn-info">Download</a>

<?php
} 
?>
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
