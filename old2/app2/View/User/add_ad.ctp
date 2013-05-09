<?php 
    if($this->Session->read('type')=='seeker' && $count>3)
    {
        echo "You have already three active Ads";
    }
    else
    {
?>
<div id="contents">
<script>
$(function(){
    $( "#start_date" ).datepicker({dateFormat: "yy-mm-dd"});
    $( "#end_date" ).datepicker({dateFormat: "yy-mm-dd"});
    });
    
    function check_type()
    {
        var val=$('#type').val();
        if(val=='2')
        {
        $.ajax({
            url: '/ads/user/check_type',
            type: 'post',
            data: 'type='+val,
            success:function(response)
            {
                if(response=='1')
                {
                    $('#response').html('You exceed the limit of the free ad.');
                }
                else{
                    $('#response').html('');
                }
            }
            
        });
        }
        else
        {
            $('#response').html('');
        }
    }
    function check()
    {
        var val=$('#response').html();
        if(val=="")
            return true;
        else
            return false;
    }
    function add_image()
{
    var doc=$('#image').val();
    doc = parseInt(doc);
    if(doc<10)
    {
        
        doc = doc + 1;
        var output = "<div id='image_"+doc+"'><div></div class='inputs'><div class=''left></div><div class='right'><input type='file' name='image_"+doc+"' /></div><div class='clear'></div></div>";   
        
        if(doc>1)
        {
            $('#remove_img').show();
        }
        $('#image').val(doc);
        $('#img').append(output);
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
function get_city()
    {
        var state = $('#state').val();
        $.ajax({
            url : '/ads/home/get_city',
            type: 'post',
            data: 'state='+state,
            success:function(response)
            {
                $('#city').html(response);
            }
        });
    }
    
    function get_subcategory()
    {
        var cat=$('#category').val();
        $.ajax({
            url: '/ads/user/get_subcategory',
            type: 'post',
            data: 'cat='+cat,
            success:function(response)
           { 
            $('#sub_category').html(response);
           }
        });
    }
</script>
<div class="add_new edit">
<div class="heading" style="height: 18px;">
<h1>Add New Ad</h1>
</div>
<div class="clear"></div>
<div class="add_new_sub edit_form">
<form action="" method="post" id="Form" enctype="multipart/form-data" >
    <p>Category : </p> <select name="category" id="category" class="required" onchange="get_subcategory()">
                <option value="">Please select</option>
                <?php 
                    foreach($category as $c)
                    {?>
                        <option value="<?php echo $c['Category']['id']; ?>"><?php echo $c['Category']['name']; ?></option>
                    <?php }
                ?>
            </select><div class="clear"></div>
    <p>Sub-categories : </p> 
        <select name="sub_category" id="sub_category" class="required">
        
        </select>
        <div class="clear"></div>
    <p>Title : </p> <input type="text" name="title" class="required" /><div class="clear"></div>
    <p>Description : </p><br> <textarea name="description" id="editor1" class="required"></textarea><div class="clear"></div>
    <script>
    
    CKEDITOR.replace( 'editor1', {
   
    filebrowserBrowseUrl : '/ads/js/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '/ads/js/ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '/ads/js/ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : '/ads/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '/ads/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '/ads/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
    </script>
    <br>
   <p>State : </p><select name="state" id="state" onchange="get_city()" class="required">
   <option value="">Please select</option>
        <?php 
            foreach($province as $p)
            {?>
                <option value="<?php echo $p['Province']['ID'] ?>" <?php if($p['Province']['ID']==$user['Register']['state']) echo "selected='selected'"; ?>><?php echo $p['Province']['TITLE']; ?></option>
            <?php }
        ?></select><div class="clear"></div>
        <p> City : </p> 
    <select name="city" id="city" class="required" >
    <option value="">Please select</option>
    <?php 
            foreach($city as $p)
            {?>
                <option value="<?php echo $p['Province']['ID'] ?>" <?php if($p['Province']['ID']==$user['Register']['city']) echo "selected='selected'"; ?>><?php echo $p['Province']['TITLE']; ?></option>
            <?php }
        ?>
    </select>
    <div class="clear"></div>
    <p>Street : </p> <input type="text" name="street" class="required" /><div class="clear"></div>
    
    <p>Image : </p> <input type="file" name="image_1" id="image_1" class="required browse" style="width: 45% !important;" /><a href="javascript:void(0);" onclick="add_image();" class="btn btn-small btn-primary floatright">Add More</a><span id="remove_img" style="display: none;"><a href="javascript:void(0);" onclick="remove_image();">Remove</a></span> <div class="clear"></div>
    <div id="img"></div>
    <input type="hidden" name="image" id="image" value="1" /><div class="clear"></div>
    <p>Youtube Embedded Code : </p> <textarea name="video"></textarea><div class="clear"></div>
    <p>Start Date : </p> <input type="text" name="start_date" id="start_date" class="required" /><div class="clear"></div>
    <!-- End Date <input type="text" name="end_date" id="end_date" class="required" /><br /> -->
   <?php if($this->Session->read('type')=='business') { ?>
    <p>Nearest Intersection : </p> <input type="text" name="nearest_intersection" /><div class="clear"></div>
    <p>MOP's : </p> <textarea name="mop"></textarea><div class="clear"></div>
    <p>References : </p> <textarea name="references"></textarea><div class="clear"></div>
    <p>Return Policy : </p> <textarea name="return_policy"></textarea><div class="clear"></div>
    <p>Warranty/Gurantee : </p> <textarea name="waranty_gurantee"></textarea><div class="clear"></div>
    <p>Liability Insurance : </p> <textarea name="insurance"></textarea><div class="clear"></div>
    <p>Licenses : </p> <input type="text" name="license" /><div class="clear"></div>
    <p>Certificate/Qualification : </p> <textarea name="qualification"></textarea><div class="clear"></div>
    
    <?php } else if($this->Session->read('type')=='seeker') {?>
    <p>Budget : </p> <input type="text" name="budget" class="required" /><div class="clear"></div>
    <p><strong>Contact Information :</strong> </p><div class="clear"></div>
    <p>Name : </p> <input type="text" name="name" class="required" value="<?php echo $user['Register']['full_name']; ?>" /><div class="clear"></div>
    <p>Email : </p> <input type="text" name="email" class="required email" value="<?php echo $user['Register']['email']; ?>" /><div class="clear"></div>
    <p>Phone : </p><input type="text" name="phone" value="<?php echo $user['Register']['phone']; ?>"  /><div class="clear"></div>
    <p>Mobile : </p><input type="text" name="mobile" value="<?php echo $user['Register']['cell']; ?>" /><div class="clear"></div>
    <p>Fax : </p><input type="text" name="fax" value="<?php echo $user['Register']['fax']; ?>"  /><div class="clear"></div>
    <p>Website : </p> <input type="text" name="url" value="<?php echo $user['Register']['website']; ?>" /><div class="clear"></div>
    <p>Social Media : </p><div class="clear"></div>
    <p>Facebook : </p> <input type="text" name="facebook" value="<?php echo $user['Register']['facebook']; ?>" /><div class="clear"></div>
    <p>Twitter : </p> <input type="text" name="twitter" value="<?php echo $user['Register']['twitter']; ?>" /><div class="clear"></div>
    <?php }?>
    <p>Type : </p> <select name="type" class="required" id="type" onchange="check_type()">
            <option value="">Choose your option</option>
            <option value="1">Paid</option>
            <option value="2">Free</option>
        </select><span id="response"></span><div class="clear"></div>
    
    <input type="submit"  class="btn btn-success " style="width: 20% !important; float: right !important;" name="submit" value="Add" />
</form>
<?php } ?>
<div class="clear"></div>
</div>
</div>
</div>