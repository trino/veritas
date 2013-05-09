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
<div id="contents">
<div class="add_new edit">
<div class="heading"  style="height: 18px;">
<h1>General Settings</h1>
</div>
<div class="clear"></div>
<div class="add_new_sub edit_form">
<form action="" method="post" id="Form" enctype="multipart/form-data" >
    <p>Full Name : </p> <input type="text" name="full_name" class="required" value="<?php echo $register['Register']['full_name']; ?>" /><div class="clear"></div>
    <p>Company Name : </p> <input type="text" name="company" class="<?php if($this->Session->read('type')=="business") echo "required"; ?>" value="<?php echo $register['Register']['company']; ?>" /><div class="clear"></div>
    <?php if($this->Session->read('type')=="business") { ?>
    <p>Description : </p> <textarea cols="35" rows="10" name="description"><?php echo $register['Register']['description']; ?></textarea><div class="clear"></div>
    <p>Category : </p> <select name="category" class="required">
                <option value="">Please Select</option>
                <?php 
                    foreach($category as $c)
                    {?>
                        <option value="<?php echo $c['Category']['id']; ?>" <?php if($c['Category']['id']==$register['Register']['category']) echo "selected='selected'"; ?>><?php echo $c['Category']['name']; ?></option>
                    <?php }
                ?>
                </select><div class="clear"></div>
                <?php } ?>
    <!--
    <!-- Deals on : <select name="deals_on" class="required">
                <option value="">--Please Select--</option>
                <?php 
                    foreach($category as $c)
                    {?>
                        <option value="<?php echo $c['Category']['id']; ?>"><?php echo $c['Category']['name']; ?></option>
                    <?php }
                ?>  
              </select><div class="clear"></div> -->
    <p>Address : </p> <input type="text" name="address" class="required" value="<?php echo $register['Register']['address']; ?>" /><div class="clear"></div>
    <p>State : </p> <select name="state" id="state" onchange="get_city()" class="required">
        <option value="">Please select</option>
        <?php 
            foreach($province as $p)
            {?>
                <option value="<?php echo $p['Province']['ID'] ?>" <?php if($p['Province']['ID']==$register['Register']['state'])echo "selected='selected'"; ?>><?php echo $p['Province']['TITLE']; ?></option>
            <?php }
        ?>
        </select><div class="clear"></div>
    <p>City : </p> 
    <select name="city" id="city" class="required">
    <option value="">Please select</option>
    <?php 
    	foreach($city as $ci)
    	{ ?>
    		<option value="<?php echo $ci['Province']['ID'] ?>" <?php if($ci['Province']['ID']==$register['Register']['city']) echo "selected='selected'"; ?>><?php echo $ci['Province']['TITLE']; ?></option>
    	<?php }
    ?>
    </select>
    <div class="clear"></div>
    <?php if($this->Session->read('type')=="business"){ ?>
    <p>Logo : </p> <input type="file" name="logo" /><div class="clear"></div><br >
    <input type="hidden" name="old_logo" value="<?php echo $register['Register']['logo']; ?>" />
    <p>No of years in Business : </p> <input type="text" name="no_of_year" class="required" value="<?php echo $register['Register']['no_of_year']; ?>" /><div class="clear"></div>
    <p><strong>Operation Hour :</strong> </p><div class="clear"></div><br>
    <p>From : </p> <input type="text" name="operation_from" class="required" value="<?php echo $register['Register']['operation_start']; ?>" /><div class="clear"></div><p> To : </p><input type="text" name="operation_to" class="required" value="<?php echo $register['Register']['operation_end']; ?>" /><div class="clear"></div>
    <p>No of Employee : </p> <input type="text" name="no_of_employee" class="required number" value="<?php echo $register['Register']['no_of_employee']; ?>" /><div class="clear"></div>
    <p>Partners : </p> <textarea name="partners" class="required"><?php echo $register['Register']['partners']; ?></textarea><div class="clear"></div>
    <?php  } ?>
    <p>Phone : </p> <input type="text" name="phone" class="required" value="<?php echo $register['Register']['phone']; ?>"  /><div class="clear"></div>
    <p>Mobile : </p> <input type="text" name="cell" value="<?php echo $register['Register']['cell']; ?>" /><div class="clear"></div> 
    <p>Fax : </p> <input type="text" name="fax" value="<?php echo $register['Register']['fax']; ?>" /><div class="clear"></div>
    <p>Website : </p> <input type="text" name="website" class="required url" value="<?php echo $register['Register']['website']; ?>" /><div class="clear"></div>
    <p>Social Media : </p><br />
    <p>Facebook : </p> <input type="text" name="facebook" value="<?php echo $register['Register']['facebook']; ?>" /><div class="clear"></div>
    <p>Twitter : </p> <input type="text" name="twitter" value="<?php echo $register['Register']['twitter']; ?>" /><div class="clear"></div>
    
    <input type="submit" class="btn btn-success " style="width: 20% !important; float: right !important;" name="submit" value="Save" />
</form>
<div class="clear"></div>
</div>
</div>
</div>