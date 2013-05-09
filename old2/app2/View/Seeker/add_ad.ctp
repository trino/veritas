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
<h1>Add New Ad</h1>
<form action="" method="post" id="Form" enctype="multipart/form-data" onsubmit="return check()">
    Category <select name="category" id="category" class="required" onchange="get_subcategory()">
                <option value="">Please select</option>
                <?php 
                    foreach($category as $c)
                    {?>
                        <option value="<?php echo $c['Category']['id']; ?>"><?php echo $c['Category']['name']; ?></option>
                    <?php }
                ?>
            </select><br />
    Sub-categories : 
        <select name="sub_category" id="sub_category">
        
        </select>
    Title <input type="text" name="title" class="required" /><br />
    Description <textarea name="description" id="editor1" class="required"></textarea><br />
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
   State <select name="state" id="state" onchange="get_city()" class="required">
   <option value="">Please select</option>
        <?php 
            foreach($province as $p)
            {?>
                <option value="<?php echo $p['Province']['ID'] ?>"><?php echo $p['Province']['TITLE']; ?></option>
            <?php }
        ?></select><br />
         City : 
    <select name="city" id="city" class="required" >
    <option value="">Please select</option>
    <?php 
            foreach($city as $p)
            {?>
                <option value="<?php echo $p['Province']['ID'] ?>" <?php if($p['Province']['ID']==$user['Register']['city']) echo "selected='selected'"; ?>><?php echo $p['Province']['TITLE']; ?></option>
            <?php }
        ?>
    </select>
    <br />
    Street : <input type="text" name="street" class="required" /><br />
    
    Image : <input type="file" name="image_1" id="image_1" class="required" /><a href="javascript:void(0);" onclick="add_image();">Add More</a><span id="remove_img" style="display: none;"><a href="javascript:void(0);" onclick="remove_image();">Remove</a></span> <br />
    <div id="img"></div>
    <input type="hidden" name="image" id="image" value="1" /><br />
    Youtube Embedded Code: <textarea name="video"></textarea><br />
    Start Date <input type="text" name="start_date" id="start_date" class="required" /><br />
    End Date <input type="text" name="end_date" id="end_date" class="required" /><br />
   
    Type <select name="type" class="required" id="type" onchange="check_type()">
            <option value="">Choose your option</option>
            <option value="1">Paid</option>
            <option value="2">Free</option>
        </select><span id="response"></span><br />
         Budget: <input type="text" name="budget" class="required" /><br />
    Contact Information:<br />
    Name: <input type="text" name="name" class="required" /><br />
    Email: <input type="text" name="email" class="required email" /><br />
    Phone: <input type="text" name="phone"  /><br />
    Mobile: <input type="text" name="mobile" /><br />
    Fax: <input type="text" name="fax"  /><br />
    Website: <input type="text" name="url" /><br />
    Social Media:<br />
     Facebook <input type="text" name="facebook" /><br />
     Twitter <input type="text" name="twitter" /><br />
    <input type="submit" name="submit" value="Add" />
</form>