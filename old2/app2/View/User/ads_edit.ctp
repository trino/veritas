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
        alert('test');
        var val=$('#response').html();
        alert(val);
        if(val=="null")
            return true;
        else
            return false;
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
   <p> Category : </p> <select name="category" id="category" class="required" onchange="get_subcategory()">
                <option value="">Please select</option>
                <?php 
                    foreach($category as $c)
                    {?>
                        <option value="<?php echo $c['Category']['id']; ?>" <?php if($c['Category']['id']==$s['Ad']['category_id']) echo "selected='selected'"; ?>><?php echo $c['Category']['name']; ?></option>
                    <?php }
                ?>
            </select>
<div class="clear"></div>
            
    <p>Sub-categories : </p>
        <select name="sub_category" id="sub_category">
        <?php
            foreach($sub_category as $sub)
            {?>
                <option value="<?php echo $sub['Category']['id']; ?>" <?php if($sub['Category']['id']==$s['Ad']['subcategory_id']) echo "selected='selected'"; ?>><?php echo $sub['Category']['name']; ?></option>
            <?php } 
        ?>
        
        </select>
    <div class="clear"></div>
    <p>Title : </p> <input type="text" name="title" class="required" value="<?php echo $s['Ad']['title'];?>" /><div class="clear"></div>
    <p>Description : </p>  <br>
    <div class="clear"></div>
    <textarea name="description" id="editor1" class="required"><?php echo $s['Ad']['description']; ?></textarea><div class="clear"></div>
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
  <p>State : </p>  <select name="state" id="state" onchange="get_city()" class="required">
   <option value="">Please select</option>
        <?php 
            foreach($province as $p)
            {?>
                <option value="<?php echo $p['Province']['ID'] ?>" <?php if($p['Province']['ID']==$s['Ad']['state']) echo "selected='selected'"; ?>><?php echo $p['Province']['TITLE']; ?></option>
            <?php }
        ?></select><div class="clear"></div>
        
        <p> City : </p> 
    <select name="city" id="city" class="required" >
    <option value="">Please select</option>
    <?php 
            foreach($city as $p)
            {?>
                <option value="<?php echo $p['Province']['ID'] ?>" <?php if($p['Province']['ID']==$s['Ad']['city']) echo "selected='selected'"; ?>><?php echo $p['Province']['TITLE']; ?></option>
            <?php }
        ?>
    </select>
    
    <div class="clear"></div>
    <!--Image : <input type="file" name="image_1" id="image_1" class="required" /><a href="javascript:void(0);" onclick="add_image();">Add More</a><span id="remove_img" style="display: none;"><a href="javascript:void(0);" onclick="remove_image();">Remove</a></span> <br />
    <div id="img"></div>-->
    <input type="hidden" name="image" id="image" value="1" />
    <p>Youtube Embedded Code : </p>  <textarea name="video"><?php echo $s['Ad']['youtube']; ?></textarea><div class="clear"></div>
    <p>Start Date : </p>  <input type="text" name="start_date" id="start_date" class="required" value="<?php echo $s['Ad']['start_date']; ?>" /><div class="clear"></div>
    <!-- <p>End Date : </p>  <input type="text" name="end_date" id="end_date" class="required" value="<?php echo $s['Ad']['end_date']; ?>" /><div class="clear"></div>-->
   <?php if($this->Session->read('type')=="business") { ?>
    <p>Nearest Intersection : </p> <input type="text" name="nearest_intersection" class="required" value="<?php echo $s['Ad']['nearest_intersection']; ?>" /><div class="clear"></div>
    <p>MOP's : </p> <textarea name="mop"><?php echo $s['Ad']['mop']; ?></textarea><div class="clear"></div>
    <p>References : </p> <textarea name="references"><?php echo $s['Ad']['references']; ?></textarea><div class="clear"></div>
    <p>Return Policy : </p> <textarea name="return_policy"><?php echo $s['Ad']['return_policy']; ?></textarea><div class="clear"></div>
    <p>Warranty/Gurantee : </p> <textarea name="waranty_gurantee"><?php echo $s['Ad']['waranty_gurantee']; ?></textarea><div class="clear"></div>
    <p>Liability Insurance: </p> <textarea name="insurance"><?php echo $s['Ad']['insurance']; ?></textarea><div class="clear"></div>
    <p>Licenses : </p> <input type="text" name="license" value="<?php echo $s['Ad']['licenses']; ?>" /><div class="clear"></div>
    <p>Certificate/Qualification : </p> <textarea name="qualification"><?php echo $s['Ad']['qualification']; ?></textarea><div class="clear"></div>
    <?php } else if($this->Session->read('type')=="seeker") { ?>
     <p>Budget : </p> <input type="text" name="budget" class="required" value="<?php echo $s['Ad']['budget']; ?>" /><div class="clear"></div>
    <p>Contact Information : </p> <div class="clear"></div>
    <p>Name : </p> <input type="text" name="name" class="required" value="<?php echo $user['Contact']['name']; ?>" /><div class="clear"></div>
    <p>Email : </p> <input type="text" name="email" class="required email" value="<?php echo $user['Contact']['email']; ?>" /><div class="clear"></div>
    <p>Phone : </p> <input type="text" name="phone" value="<?php echo $user['Contact']['phone']; ?>"  /><div class="clear"></div>
    <p>Mobile : </p> <input type="text" name="mobile" value="<?php echo $user['Contact']['mobile']; ?>" /><div class="clear"></div>
    <p>Fax : </p> <input type="text" name="fax" value="<?php echo $user['Contact']['fax']; ?>"  /><div class="clear"></div>
    <p>Website : </p> <input type="text" name="url" value="<?php echo $user['Contact']['website']; ?>" /><div class="clear"></div>
    <p>Social Media : </p> <br />
     <p>Facebook : </p>  <input type="text" name="facebook" value="<?php echo $user['Contact']['facebook']; ?>" /><div class="clear"></div>
     <p>Twitter : </p>  <input type="text" name="twitter" value="<?php echo $user['Contact']['twitter']; ?>" /<div class="clear"></div>
    <?php }?>
    <!--Type <select name="type" class="required" id="type" onchange="check_type()">
            <option value="">Choose your option</option>
            <option value="1" <?php if($s['Ad']['type']=="1") echo "selected='selected'"; ?>>Paid</option>
            <option value="2" <?php if($s['Ad']['type']=="1") echo "selected='selected'"; ?>>Free</option>
        </select><span id="response"></span><br />-->
    <input type="submit" class="btn btn-success " style="width: 20% !important; float: right !important;" name="submit" value="Save" />
</form>
<div class="clear"></div>
</div>
</div>
</div>