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
        if(val=="")
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
<h1>Register Your Company</h1>
<form action="" method="post" id="Form" enctype="multipart/form-data" onsubmit="return check()" >
    Full Name : <input type="text" name="full_name" class="required" /><br />
    Company Name : <input type="text" name="company" class="required" /><br />
    Description : <textarea cols="35" rows="10" name="description"></textarea><br />
    Category : <select name="category" class="required">
                <option value="">Please Select</option>
                <?php 
                    foreach($category as $c)
                    {?>
                        <option value="<?php echo $c['Category']['id']; ?>"><?php echo $c['Category']['name']; ?></option>
                    <?php }
                ?>
                </select><br />
    Logo : <input type="file" name="logo" class="required" /><br />
    <!--Deals on : <select name="deals_on" class="required">
                <option value="">--Please Select--</option>
                <?php 
                    foreach($category as $c)
                    {?>
                        <option value="<?php echo $c['Category']['id']; ?>"><?php echo $c['Category']['name']; ?></option>
                    <?php }
                ?>  
              </select><br /> -->
    Address : <input type="text" name="address" class="required" /><br />
    State <select name="state" id="state" onchange="get_city()" class="required">
        <option value="">Please select</option>
        <?php 
            foreach($province as $p)
            {?>
                <option value="<?php echo $p['Province']['ID'] ?>"><?php echo $p['Province']['TITLE']; ?></option>
            <?php }
        ?>
        </select><br />
    City : 
    <select name="city" id="city" class="required">
    <option value="">Please select</option>
    </select>
    <br />
    No of years in Business : <input type="text" name="no_of_year" class="required" /><br />
    Phone <input type="text" name="phone" class="required"  /><br />
    Mobile <input type="text" name="cell" /><br /> 
    Fax <input type="text" name="fax" /><br />
    Website <input type="text" name="website" class="required url" /><br />
    Social Media:<br />
    Facebook: <input type="text" name="facebook" />
    Twitter: <input type="text" name="twitter" /><br />
    Operation Hour:<br />
    From <input type="text" name="operation_from" class="required" /> To: <input type="text" name="operation_to" class="required" /><br />
    No of Employee : <input type="text" name="no_of_employee" class="required number" /><br />
    Partners : <textarea name="partners" class="required"></textarea><br />
    Account Settings:<br />
    Email <input type="text" name="email" id="email" class="required email" onchange="check_email()" /><span id="response"></span><br />
    Password : <input type="password" name="password" id="password" class="required" /><br />
    Confirm Password : <input type="password" name="c_password" id="c_password" /><br />
    <input type="submit" name="submit" value="Register" />
</form>