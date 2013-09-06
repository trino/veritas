<?php include_once('inc.php');?>
<style>
.ui-widget-content,.dialog-modals{background:#313A43!important;color:#FFF;}
hr{border-top:#313A43 1px solid;}
.ui-dialog-titlebar{background:#000;color:#EEE;border:1px solid #333;}
.lists div div div{padding: 3px 0;}
.title{color:#BBB;padding:10px 0;}
.ui-dialog-titlebar-close{background:#FFF;}
</style>
<script>
$(function(){
   $('#submitemail').click(function(){
        
        if($('#emailadd').val()=='')
        {
            alert('Invalid email address');
            return false;
        }
        else
        {
            if($('#emailadd').val().replace('@','')==$('#emailadd').val()){
            alert('Invalid email address');
            return false;
            }
            else
            if($('#emailadd').val().replace('.','')==$('#emailadd').val()){
            alert('Invalid email address');
            return false;
            
            }
            
        }
        $('.emailadd').val($('#emailadd').val());
        $('.emailadd2').val($('#emailadd2').val());
        $('.emailadd3').val($('#emailadd3').val());
        $('.sbtbtn').click();
        
    }); 
});
</script>

The following recipients will receive a copy of this report in their inbox.<br><br>
<input type="text" id="emailadd" placeholder=""  value ="info@trinoweb.com"  /><br />
<input type="text" id="emailadd2" placeholder=""   value ="admin@trinoweb.com"  /><br />
<input type="text" id="emailadd3" placeholder=""   value ="dvt1985@hotmail.com"  /><br />
<br>
<a style="float:right;"  href="javascript:void(0);" id="submitemail" class="btn">Upload and Send</a>