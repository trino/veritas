<?php include_once('inc.php'); 
    if(isset($job_name))
    $job_n=$job_name;
else
    $job_n ="";
?>
<h3 class="page-title">
	<?php echo (isset($eid))? "Edit Special Document":"Upload Special Document";?>
</h3>
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="<?=$base_url;?>dashboard">Home</a> <span class="icon-angle-right"></span>
		<a href="<?=$base_url;?>jobs"><?php echo($this->request->params['action']=='special_edit')? "Edit":"Upload";?> Document</a> <!--span class="icon-angle-right"></span-->
	</li>
</ul>
<form id="my_form" action="<?=$base_url;?>uploads/special_doc<?php if(isset($eid) && $eid!= "") echo "/".$eid;?>" method="post" enctype="multipart/form-data">

<div id="table">
<table>
    <tr><td><b>Document Type</b></td>
<td>
    <div class="right">
    <select name="document_type" class="required" id="document_type">
        <option value="">Select Type</option>
        <option value="AFIMAC Intel" <?php if(isset($doc['SpecJob']['document_type'])&& $doc['SpecJob']['document_type']  == 'AFIMAC Intel'){ echo "selected='selected'";} ?>>AFIMAC Intel</option>
        <option value="News/Media" <?php if(isset($doc['SpecJob']['document_type'])&& $doc['SpecJob']['document_type']  == 'News/Media'){ echo "selected='selected'";} ?>>News/Media</option>
    </select>
    </div>
</td>
</tr>
<tr><td><strong>Date of Posting</strong></td>
<td><input type="text"  class="incident_date required" name="incident_date" value="<?php if(isset($doc['SpecJob']['dop'])) echo $doc['SpecJob']['dop'];?>" /></td></tr>
<tr><td id="auth"><strong>Author</strong></td><td><input type="text" class="required" name="author" value="<?php if(isset($doc['SpecJob']['author'])) echo $doc['SpecJob']['author'];?>"/></td></tr>
<tr><td class="main_desc"><strong>Description</strong></td>
<td><textarea name="description"  class="text_area_long" cols="10" rows="5" id="repl" onKeyDown="limitText(this.form.description,this.form.countdown,70);"
onKeyUp="limitText(this.form.description,this.form.countdown,70);"><?php if(isset($doc['SpecJob']['desc'])) echo $doc['SpecJob']['desc'];?></textarea>
<br />
<font size="1" class="desc_bot">(Maximum characters: 70)<br />
You have <input readonly type="text" name="countdown" id="countssss" style="background:none; border:0; padding:0; margin:0; text-align:center; border-radius:none; width:30px; box-shadow:none;" value="70" /> characters left.</font><br />
</td></tr>
<!--<tr><td><b>Description</b></td><td><div class="right"><textarea cols="35" name="description" class="required"></textarea></div></td></tr>-->

<tr><td><b>Images/Videos/Docs</b></td><td><div class="right">
<input type="file" name="document" />
</div><div id="doc"></div>


</td></tr>
<?php if(isset($doc['SpecJob']['doc']) && $doc['SpecJob']['doc']!= ""){?>
<tr><td></td>
<td>
<?php
    if(isset($doc['SpecJob']['doc']) && $doc['SpecJob']['doc']!= "")
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



</div>

</div>
<?php }?>
</td>
</tr>
<?php }?>
</table>

<input type="hidden" value="<?php if(isset($job_id))echo  $job_id; else if(isset($doc['SpecJob']['job_id']))echo $doc['SpecJob']['job_id'];?>" name="job_id" />
<div class="submit"><input type="submit" class="btn btn-primary sbtbtn" style="float: left;" value="Submit Document" name="submit"/> </div>



</form>


<script>

$(function(){
    $('#my_form').validate();
    $('.incident_date').datepicker({dateFormat: 'yy-mm-dd',maxDate: new Date} );
    $('#document_type').change(function(){
        $id = $(this).val();
        if($id == 'AFIMAC Intel')
            $('#auth').html('<strong>Author</strong>');
        else
            $('#auth').html('<strong>Source</strong>');        
    
        
    });
    
     
});
function limitText(limitField, limitCount, limitNum)
{
    if (limitField.value.length > limitNum) 
    {
        limitField.value = limitField.value.substring(0, limitNum);
    }
     else
    {
        limitCount.value = limitNum - limitField.value.length;
    }
}
</script>
