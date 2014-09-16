<?php include_once('inc.php');?>
<script src="<?php echo $base_url;?>js/highlight.js"></script>
<script src="<?php echo $base_url;?>js/highscript.js"></script>
<style>
#table{border: none!important;}
.table{border-left:1px solid #ddd!important;border-right:1px solid #ddd!important;}
@media print {
    
  body * {
    visibility:hidden;
  }
  .printlogo,#table, #table * {
    visibility:visible;
    
  }
  
  #table {
    position:absolute;
    left:0;
    top:0;
  }
  
}
</style>


<h3 class="page-title">
<?php if($j = $job->findById($doc['Document']['job_id'])) echo stripslashes($j['Job']['title']) ; ?> / 
	Documents: <?php echo str_replace('_',' ',$doc['Document']['title']); ?>
</h3>

<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard"><?php echo $this->requestAction('dashboard/translate/Home');?></a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>uploads/view_detail/<?php echo $doc['Document']['id']; ?>">Documents: <?php echo $doc['Document']['title']; ?></a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>


<?php echo $this->Html->css('prettyPhoto'); ?>
<?php echo $this->Html->script('jquery.prettyPhoto'); ?>


<div id="table">

<div class="printlogo">
<?php if( $this->Session->read('logo')=="afimaclogo.png"){?>
<img src="<?php echo $base_url?>img/printafimac.jpg" />
<?php }
else
{
    ?>
    <img src="<?php echo $base_url?>img/uploads/asap.gif" />
    <br />
    <strong>&nbsp;</strong>
    8160 Parkhill Drive, Milton, Ontario, Canada, L9T 5V7 T: 1.877.923.2727, F: 905.875.1997, info@asapsecured.com<br /><br />
    <?php
}
?>
</div>

<?php 
if($doc['Document']['document_type']=='contract')
    $ty = "contracts";
elseif($doc['Document']['document_type']=='template')
    $ty = "templates";
elseif($doc['Document']['document_type'] == 'mobile_vehicle_trunk_inventory')
    $ty = "inventory";
/*elseif($doc['Document']['document_type'] == 'client_feedback')
    $ty = "";*/
else    
    $ty = $doc['Document']['document_type'];
if($this->Session->read('admin')||($usr1['Member']['canView']==1 && $usr1['Member']['Canview'][$ty]=='1')){?>
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
        <td><b> <?php echo $this->requestAction('dashboard/translate/Document Type');?></b></td>
        <td><?php echo $type = ucwords(str_replace('_',' ',$doc['Document']['document_type'])); ?></td>
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
    
    
    <?php if($type == 'Report')
    { ?>
     <!--<tr>
        <td><b>Client Memo</b></td>
        <td><?php echo $doc['Document']['client_feedback'];?></a></td>
    </tr>-->
    
    <?php if($activity){
        //var_dump($activity);
        $r_types = array('','Activity Log','Mobile Inspection','Mobile Security','Security Occurance','Incident Reports','Sign-off Sheets','Loss Prevention','Static Site Audit','Insurance Site Audit','Site Signin Signout','Instructions And Site Assessment' ,'Personal Inspection','Mobile Inspection', 'Mobile Log', 'Mobile Vehicle Trunk Inventory', 'Vehicle Inspection','Disciplinary Warning','Injury and Illness');
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
        <?php }?>
        
        <?php if($activity[0]['Activity']['report_type']=='7'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('loss_prevention.php');?></td>
        </tr>
        <?php }?>
        
        <?php if($activity[0]['Activity']['report_type']=='8'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('static_site_audit_view.php');?></td>
        </tr>
        <?php }?>
        
        <?php if($activity[0]['Activity']['report_type']=='9'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('insurance_site_audit_view.php');?></td>
        </tr>
        <?php }?>
        <?php if($activity[0]['Activity']['report_type']=='10'){?>
        <tr id="loss_prevention">
        <td colspan="2" style="padding: 0;"> <?php include('site_signin_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='11'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('instruction_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='12'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('personal_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='13'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('mobile_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='14'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('log_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='15'){?>
        <tr id="loss_prevention">
         <?php include('inventory.php');?>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='16'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('vehicle_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='17'){?>
        <tr id="loss_prevention">
        <td colspan="2"> <?php include('disciplinary_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']=='18'){?>
        <tr id="loss_prevention">
        <td colspan="2" style="padding: 0;"> <?php include('injury_illness_view.php');?></td>
        </tr>
        <?php }
        if($activity[0]['Activity']['report_type']!='8' && $activity[0]['Activity']['report_type']!='9'&& $activity[0]['Activity']['report_type']!='10'&& $activity[0]['Activity']['report_type']!='11'&& $activity[0]['Activity']['report_type']!='12'&& $activity[0]['Activity']['report_type']!='13'&& $activity[0]['Activity']['report_type']!='14'&& $activity[0]['Activity']['report_type']!='15'&& $activity[0]['Activity']['report_type']!='16')
        {
            ?>
        
        <tr><td colspan="2" style="padding: 0;">
        <table>
        <thead><th>Date</th><th><?php echo $this->requestAction('dashboard/translate/Time');?></th><th>Description</th></thead>
        <?php foreach($activity as $act)
              {?>
        <tr><td><?php echo $act['Activity']['date'];?></td><td><?php echo $act['Activity']['time'];?></td><td><?php echo $act['Activity']['desc'];?></td></tr>
        
        <?php } ?> 
        </table></td></tr>
        
            <?php
        }
        ?>
    <?php } ?> 
     
    <?php }
 ?>    <?php if($type == 'Evidence'){ ?>
    <tr>
        <td><b><?php echo $this->requestAction('dashboard/translate/Evidence Type');?></b></td>
        <td><?php echo $doc['Document']['evidence_type'];?></a></td>
    </tr>
    
    <tr>
        <td><b><?php echo $this->requestAction('dashboard/translate/Incident Date');?></b></td>
        <td><?php echo $doc['Document']['incident_date'];?></a></td>
    </tr>    
        
    <?php } ?>
     <?php if($type == 'Training'){ ?>
    <tr>
        <td><b><?php echo $this->requestAction('dashboard/translate/Training Type');?> </b></td>
        <td><?php echo $doc['Document']['training_type'];?></a></td>
    </tr>
    <?php } ?>
    <?php if($type == 'SiteOrder'){ ?>
    <tr>
        <td><b><?php echo $this->requestAction('dashboard/translate/Site Order Type');?> </b></td>
        <td><?php echo $doc['Document']['site_type'];?></a></td>
    </tr>
    <?php } ?>
    <?php if($type == 'Employee'){ ?>
    <tr>
        <td><b><?php echo $this->requestAction('dashboard/translate/Employee Option');?> </b></td>
        <td><?php echo $doc['Document']['employee_type'];?></a></td>
    </tr>
    <?php } ?>
    <tr>
        <td><b><?php echo $this->requestAction('dashboard/translate/Uploaded By');?></b></td>
        <td><?php if($doc['Document']['addedBy'] != 0){$q = $member->find('first',array('conditions'=>array('id'=>$doc['Document']['addedBy'])));if($q){if($this->Session->read('admin'))echo "<a href='".$base_url."members/view/".$q['Member']['id']."'>".$q['Member']['full_name']."</a>";else echo $q['Member']['full_name'];}}else echo "Admin";?></td>
    </tr>
    <tr style="border-bottom: 1px solid #DDD;">
        <td><b><?php echo $this->requestAction('dashboard/translate/Uploaded On');?></b></td>
        <td><?php echo $doc['Document']['date']?></td>
    </tr>
    <?php
    if($doc['Document']['document_type']=='personal_inspection')
    {
        include('personal_view.php');
    }
    ?>
    <?php
    if($doc['Document']['document_type']=='vehicle_inspection')
    {
        include('vehicle_view.php');
    }
    ?>
    <?php
    if($doc['Document']['document_type']=='mobile_inspection')
    {
        include('mobile_view.php');
    }
    ?>
    <?php
    if($doc['Document']['document_type']=='mobile_log')
    {
        include('log_view.php');
    }
    ?>
    <?php
    if($doc['Document']['document_type']=='mobile_vehicle_trunk_inventory')
    {
        include('inventory.php');
    }
    ?>
    <?php
    if($doc['Document']['document_type']=='deployment_rate')
    {
        include('deploy_view.php');
    }
    ?>
    
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
<?php
/*
if($type == 'Report')
{
    */?>
    <?php if($this->Session->read('approve')=='1' && $doc['Document']['approved']=='0'){?><a href="<?php echo $this->webroot;?>uploads/approve/<?php echo $doc['Document']['id'];?>/detail" class="btn btn-success">Approve Document</a><?php }else{echo "<button class='btn btn-success' disabled>Approved</button>";}?>
    <input type="button" onclick="window.print();" value="<?php echo $this->requestAction('dashboard/translate/Print');?>" class="btn btn-primary" />
    <?php
//}
?>
<?php }
    else
        echo "You are not authorized to view this file.";
?>
<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
			 $('.map').maphilight({
            fillColor: '008800'
        });
        <?php
    if(isset($vehicle) && $vehicle)
    {
        ?>
        var front = '<?php echo $vehicle['Vehicle_inspection']['front'];?>';
        var back = '<?php echo $vehicle['Vehicle_inspection']['back'];?>';
        var side = '<?php echo $vehicle['Vehicle_inspection']['side'];?>';
        
        var arr_f = front.split('_');
        
        var arr_b = back.split('_');
        var arr_s = side.split('_');
        $('.front').val('');
        $('.back').val('');
        $('.side').val('');
        if(arr_f.length >0)
        {
            $('.f area').each(function(){
                var co = $(this).attr('coords');
                if(jQuery.inArray( co, arr_f )>=0)
                $(this).click() ;               
            });
        }
        if(arr_b.length >0)
        {
            $('.b area').each(function(){
                var co = $(this).attr('coords');
                if(jQuery.inArray( co, arr_b )>=0)
                $(this).click() ;               
            });
        }
        if(arr_s.length >0)
        {
            $('.s area').each(function(){
                var co = $(this).attr('coords');
                
                if(jQuery.inArray( co, arr_s )>=0)
                $(this).click() ;               
            });
        }
        <?php
    }
    ?>
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

