<script type="text/javascript">
function show_email()
{
    $('#email').show();
}

function list_email(value)
{
    var em=$('#name').val();
    var ema=$('#recipients').val();
    var e=value.split('_');
    var i= $('#receipient_id').val();
    var id;
    if(em=="")
    {
        name=e[0]+',';
    }
    else
    {
    name = em+e[0]+',';
    }
    if(i=="")
    {
        id=e[1]+',';
    }
    else
    {
        id=i+e[1]+',';
    }
    if(ema=="")
    {
        email=e[2]+',';
    }
    else
    {
        email=ema+e[2]+',';
    }
    alert(email);
    $('#receipient_id').val(id);
    $('#recipients').val(email);
    $('#name').val(name);
}


</script>
<div class="message-form">
<form id="Form" action="" method="post">
<div class="left msg">
<textarea placeholder="Quick message - Type message here" name="message" class="required message"></textarea>
</div>
<div class="left inputs">
<input type="text" name="subject" placeholder="Subject" class="required" />
<input type="text" name="name" id="name" placeholder="Recipients(Separate with comma)" class="required" /> 
    <a href="javascript:void(0)" onclick="show_email();" class="btn btn-mini btn-primary left email">Email</a>
    <div id="email" style="display: none;">
        <?php foreach($mem as $m) { ?> 
        <a class="btn btn-mini btn-primary" href="javascript:void(0)" onclick="list_email(this.id)" id="<?php echo $m['Member']['full_name']."_".$m['Member']['id']."_".$m['Member']['email'];?>"><?php echo $m['Member']['full_name']; ?></a>
        <?php } ?>
        <?php 
            if(!$this->Session->read('avatar'))
            {?>
                <a class="btn btn-mini btn-primary" href="javascripit::void(0)" onclick="list_email(this.id)" id="<?php echo $ad['User']['name_avatar']."_0_".$ad['User']['email']; ?>"><?php echo $ad['User']['name_avatar']; ?></a>
            <?php }
        ?>
    </div>

<!-- <div><div class="left"><input type="text" name="attachments" placeholder="Attachments" id="attachment" readonly="" style="background: #e5f5f5;" /></div><a class="left" href="javascript:void(0)" id="attach">Attach</a><div class="clear"></div></div>-->

<input type="hidden" name="recipients" id="recipients" value="" />
<input type="hidden" name="response" id="resp" />
<input type="hidden" name="receipient_id" id="receipient_id" value="" />
<input type="submit" name="submit" value="Send" class="btn btn-mini btn-primary right" />
</div>
<div class="clear"></div>
</form>
</div>


<div class="box">
<?php if($this->Session->read('view')=='1') { ?>
    <div class="blue main-box">
        <div class="sub-box">
         <div class="corner"></div>
        <div class="icon"><i class="icon-file"></i></div>
        <div class="number">
        <?php  echo $this->Html->link($contract,'/uploads/view_doc/contract');?> Contracts
        </div>
        <div class="view-all">
        <?php echo $this->Html->link('View All '.$contract.' Documents','/uploads/view_doc/contract');?>
        <i class="icon-arrow-right m-icon-white"></i>
        </div> 
    </div>
    <div class="shadow"></div>
    </div>

    <div class="green main-box">
        <div class="sub-box">
        <div class="corner"></div>
        <div class="icon"><i class="icon-shopping-cart"></i></div>
        <div class="number">
        <?php  echo $this->Html->link($post_order,'/uploads/view_doc/post_order');?>Post Orders
        </div>
        <div class="view-all">
         <?php echo $this->Html->link('View All '.$post_order.' Documents','/uploads/view_doc/post_order');?>
         <i class="icon-arrow-right m-icon-white"></i>
     </div>
     </div>
    <div class="shadow"></div>
    </div>

    <div class="purple main-box">
        <div class="sub-box">
         <div class="corner"></div>
        <div class="icon"><i class="icon-legal"></i></div>
        <div class="number">
        <?php echo $this->Html->link($audits,'/uploads/view_doc/audits');?>Audits
        </div>
        <div class="view-all">
        <?php echo $this->Html->link('View All '.$audits.' Documents','/uploads/view_doc/audits');?>
        <i class="icon-arrow-right m-icon-white"></i>
    </div>
    </div>
    <div class="shadow"></div>
    </div>
 
    <div class="yello main-box">
        <div class="sub-box">
         <div class="corner"></div>
        <div class="icon"><i class="icon-book"></i></div>
        <div class="number">
        <?php echo $this->Html->link($training_manuals,'/uploads/view_doc/training_manuals');?>training_manuals
        </div>
        <div class="view-all">
         <?php echo $this->Html->link('View All '.$training_manuals.' Documents','/uploads/view_doc/training_manuals');?>
         <i class="icon-arrow-right m-icon-white"></i>
     </div>
     </div>
     <div class="shadow"></div>
 </div>
    <div class="clear"></div>



<?php } ?>
</div>
<?php if($this->Session->read('avatar')){
    if($activity)
{?>
<div id="table">
<h2>Document Activity Log</h2>
<table>
    <tr>
        <th>When</th>
        <th>Who</th>
        <th>What</th>
    </tr>

<?php

    foreach($activity as $a)
    {?>
        <tr>
            <td><?php echo $a['Document']['date']; ?></td>
            <td>
                <?php 
                    foreach($added as $aa)
                    {
                        if($a['Document']['addedBy']==$aa['Member']['id'])
                        {
                            echo $aa['Member']['email'];
                        }
                    }
                ?>
            </td>
            <td>Upload <?php echo $a['Document']['document_type']; ?></td>
        </tr>
    <?php } 
 ?>
 </table>
</div>
<?php } } ?> 
<script>
$(function(){
   initialize('attach');
   function initialize(button_id){
            
            var button = $('#'+button_id), interval;
            new AjaxUpload(button,{
	       action: '',
		   name: 'myfile',
		   onSubmit : function(file, ext){
			// change button text, when user selects file			
			button.text('Wait');
			
			// If you want to allow uploading only 1 file at time,
			// you can disable upload button
			this.disable();
			
			// Uploding -> Uploading. -> Uploading...
			interval = window.setInterval(function(){
				var text = button.text();
				if (text.length < 13){
					button.text(text + '.');					
				} else {
					button.text('Wait');				
				}
			}, 200);
		},
		onComplete: function(file, response){
                        
                        if(response!="error"){
                               $('#attachment').val($('#attachment').val()+file+',');
                               $('#resp').val($('#resp').val()+response+',');
                        }
			else{
                            alert(response["error_string"]);
                        }
                        button.text('Attach');
                        window.clearInterval(interval);
						
			// enable upload button
			this.enable();
			
			// add file to the list
									
		}
            });
        } 
});
</script>