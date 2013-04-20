<?php include_once('inc.php');?>
<script type="text/javascript">
$(function(){
   $('#document').val('1');
   $('#image').val('1');
   $('#video').val('1'); 
});
function add_document()
{
    var doc=$('#document').val();
    doc = parseInt(doc);
    doc = doc + 1;
    var output = "<div id='document_"+doc+"'><div></div class='inputs'><div class=''left></div><div class='right'><input type='file' name='document_"+doc+"' /></div><div class='clear'></div></div>";   
    
    if(doc>1)
    {
        $('#remove_doc').show();
    }
    $('#document').val(doc);
    $('#doc').append(output);
}   


function add_image()
{
    var doc=$('#image').val();
    doc = parseInt(doc);
    doc = doc + 1;
    var output = "<div id='image_"+doc+"'><div></div class='inputs'><div class=''left></div><div class='right'><input type='file' name='image_"+doc+"' /></div><div class='clear'></div></div>";   
    
    if(doc>1)
    {
        $('#remove_img').show();
    }
    $('#image').val(doc);
    $('#img').append(output);
}

function add_video()
{
    var doc=$('#video').val();
    doc = parseInt(doc);
    doc = doc + 1;
    var output = "<div id='video_"+doc+"'><div></div class='inputs'><div class=''left></div><div class='right'><input type='file' name='video_"+doc+"' /></div><div class='clear'></div></div>";   
    if(doc>1)
    {
        $('#remove_vid').show();
    }
    $('#video').val(doc);
    $('#vid').append(output);
}

function add_youtube()
{
    var doc=$('#youtube').val();
    doc = parseInt(doc);
    doc = doc + 1;
    var output = "<div id='youtube_"+doc+"'><div></div class='inputs'><div class=''left></div><div class='right'><input type='text' name='youtube_"+doc+"' /></div><div class='clear'></div></div>";   
    if(doc>1)
    {
        $('#remove_youtube').show();
    }
    $('#youtube').val(doc);
    $('#you').append(output);
}
function remove_document()
{
    var doc=$('#document').val();
    if(doc>1)
    {
        $('#document_'+doc).remove();
        doc = parseInt(doc);
        doc = doc - 1;
        $('#document').val(doc);
    }
    if(doc==1)
    {
        $('#remove_doc').hide();
    }
}

function remove_image()
{
    var doc=$('#image').val();
    if(doc>1)
    {
        $('#image_'+doc).remove();
        doc = parseInt(doc);
        doc = doc - 1;
        $('#image').val(doc);
    }
    if(doc==1)
    {
        $('#remove_img').hide();
    }
}

function remove_video()
{
    var doc=$('#video').val();
    if(doc>1)
    {
        $('#video_'+doc).remove();
        doc = parseInt(doc);
        doc = doc - 1;
        $('#video').val(doc);
    }
    if(doc==1)
    {
        $('#remove_vid').hide();
    }
}

function remove_youtube()
{
    var doc=$('#youtube').val();
    if(doc>1)
    {
        $('#youtube_'+doc).remove();
        doc = parseInt(doc);
        doc = doc - 1;
        $('#youtube').val(doc);
    }
    if(doc==1)
    {
        $('#remove_youtube').hide();
    }
}
</script>
<div>Upload Document</div>
<form id="Form" action="" method="post" enctype="multipart/form-data">
<div class="inputs"><div class="left">Location</div><div class="right"><input type="text" name="location" class="required" /></div><div class="clear"></div></div>
<div class="inputs"><div class="left">Title</div><div class="right"><input type="text" name="title" class="required" /></div><div class="clear"></div></div>
<div class="inputs"><div class="left">Description</div><div class="right"><textarea cols="35" name="description" class="required"></textarea></div><div class="clear"></div></div>
<div class="inputs"><div class="left">Documnet Type</div><div class="right"><select name="document_type" class="required"><option value="">Choose documnet type</option><option value="contract">Contracts</option><option value="post_order">Post Orders</option><option value="audits">Audits</option><option value="training_manuals">Training Manuals</option></select></div><div class="clear"></div></div>
<div class="inputs"><div class="left">Documents</div><div class="right"><input type="file" name="document_1" /><a href="javascript:void(0)" onclick="add_document()">Add</a><span id="remove_doc" style="display: none;"><a href="javascript:void(0);" onclick="remove_document();">Remove</a></span></div><div class="clear"></div></div>
<div id="doc"></div>
<div class="inputs"><div class="left">Images</div><div class="right"><input type="file" name="image_1" /><a href="javascript:void(0);" onclick="add_image()">Add</a><span id="remove_img" style="display: none;"><a href="javascript:void(0);" onclick="remove_image();">Remove</a></span></div><div class="clear"></div></div>
<div id="img"></div>
<div class="inputs"><div class="left">Videos</div><div class="right"><input type="file" name="video_1" /><a href="javascript:void(0);" onclick="add_video()">Add</a><span id="remove_vid" style="display: none;"><a href="javascript:void(0);" onclick="remove_video();">Remove</a></span></div><div class="clear"></div></div>
<div id="vid"></div>
<div class="inputs"><div class="left">Youtube Link</div><div class="right"><input type="text" name="youtube_1" /><a href="javascript:void(0);" onclick="add_youtube()">Add</a><span id="remove_youtube" style="display: none;"><a href="javascript:void(0);" onclick="remove_youtube();">Remove</a></span></div><div class="clear"></div></div>
<div id="you"></div>
<input type="hidden" name="document" id="document" value="1" />
<input type="hidden" name="image" id="image" value="1" />
<input type="hidden" name="video" id="video" value="1" />
<input type="hidden" name="youtube" id="youtube" value="1" />
<input type="hidden" name="job" value="<?php echo $job_id; ?>" />
<div class="submit"><input type="submit" class="btn" value="Add" name="submit"/></div>
</form>