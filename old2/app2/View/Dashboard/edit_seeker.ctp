<script>
    function check_email()
    {
        var em=$('#email').val();
        $.ajax({
            url: '/ads/home/check_email',
            type: 'post',
            data: 'em='+em,
            success:function(response)
            {
                if(response=="1")
                {
                    $('#response').html('');
                }
                else
                {
                    $('#response').html('Email Already Exists');
                }
            } 
        });
    }
    function check()
    {
        var val = $('#response').html();
        alert(val);
        if(val=" ")
            return true;
        else
            return false;
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
</script>
<h1>Edit Company Details</h1>
<form action="" method="post" id="Form" enctype="multipart/form-data" >
    Full Name : <input type="text" name="full_name" class="required" value="<?php echo $register['Register']['full_name']; ?>" /><br />
    Company Name : <input type="text" name="company" class="<?php if($this->Session->read('type')=="business") echo "required"; ?>" value="<?php echo $register['Register']['company']; ?>" /><br />
   
    
    Address : <input type="text" name="address" class="required" value="<?php echo $register['Register']['address']; ?>" /><br />
    State <select name="state" id="state" onchange="get_city()" class="required">
        <option value="">Please select</option>
        <?php 
            foreach($province as $p)
            {?>
                <option value="<?php echo $p['Province']['ID'] ?>" <?php if($p['Province']['ID']==$register['Register']['state'])echo "selected='selected'"; ?>><?php echo $p['Province']['TITLE']; ?></option>
            <?php }
        ?>
        </select><br />
    City : 
    <select name="city" id="city" class="required">
    <option value="">Please select</option>
    <?php 
    	foreach($city as $ci)
    	{ ?>
    		<option value="<?php echo $ci['Province']['ID'] ?>" <?php if($ci['Province']['ID']==$register['Register']['city']) echo "selected='selected'"; ?>><?php echo $ci['Province']['TITLE']; ?></option>
    	<?php }
    ?>
    </select>
    <br />
    Phone <input type="text" name="phone" class="required" value="<?php echo $register['Register']['phone']; ?>"  /><br />
    Mobile <input type="text" name="cell" value="<?php echo $register['Register']['cell']; ?>" /><br /> 
    Fax <input type="text" name="fax" value="<?php echo $register['Register']['fax']; ?>" /><br />
    Website <input type="text" name="website" class="required url" value="<?php echo $register['Register']['website']; ?>" /><br />
    Social Media:<br />
    Facebook: <input type="text" name="facebook" value="<?php echo $register['Register']['facebook']; ?>" />
    Twitter: <input type="text" name="twitter" value="<?php echo $register['Register']['twitter']; ?>" /><br />
     Approve : <input type="checkbox" name="approve" value="1" <?php if($register['Register']['isApproved']=='1') echo "checked='checked'" ?> /><br />
    
    <input type="submit" name="submit" value="Save" />
</form>