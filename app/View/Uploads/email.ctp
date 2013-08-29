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
        $('.emailadd').val($('#emailadd').val());
        $('.sbtbtn').click();
        
    }); 
});
</script>
<input type="text" id="emailadd" placeholder="Email Address" /><br />
<a  href="javascript:void(0);" id="submitemail" class="btn">Send</a>