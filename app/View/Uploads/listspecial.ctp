<style>
.ui-widget-content,.dialog-modals{background:#313A43!important;color:#FFF;}

hr{border-top:#313A43 1px solid;}
.ui-dialog-titlebar{background:#000;color:#EEE;border:1px solid #333;}
.lists div div div{padding: 3px 0;}
.title{color:#BBB;padding:10px 0;}
.left{float:left;}
</style>
<div style="width: 1030px;font-weight:bold;margin-top:10px;margin-bottom:5px;font-size: 14px;"><div class="left" style="width:120px;">Job</div><div class="left" style="width:120px;margin-left:5px;">Title</div><div class="left" style="width:120px;margin-left:5px;">Type</div><div class="left" style="width:480px;margin-left:5px;">File</div><div class="left" style="width:100px;margin-left:5px;">Choose</div><div class="clearfix"></div></div>
<?php
//if(isset($name) && $name !="")
if($this->Session->read('admin'))
{
    
                $q3 = $spe->find('all',array('conditions'=>array('document_type LIKE "%'.$name.'%"')));
                if($q3)
                {
                    
                    foreach($q3 as $do)
                    {
                        ?>
                        
                            
                            
                            <div class="myclass" style="width: 1030px;font-size:13px;">
                            <div class="left" style="width:120px;"><?php echo stripslashes($jname);?></div> 
                            
                                
                                <div class="left" style="width:120px;margin-left:5px;">
                                
                                <?php echo $do['SpecJob']['document_type'];?>
                                </div>
                                
                                <?php //if else login
                                //if else login
                                //if else login
                                //if else login
                                //if else login
                                //if else login?>
                                
                                <div class="left" style="width:120px;margin-left:5px;">Documents</div>
                                
                            
                                
                                    <div class="left" style="width:480px;margin-left:5px;">
                                    <?php echo "&nbsp;".$do['SpecJob']['doc'];?>
                                    </div>
                                    <div class="left" style="width:100px;margin-left:5px;"><input type="checkbox" class="doc" value="<?php echo $do['SpecJob']['doc'];?>" /></div>
                                    <div style="clear:both;"></div>
                                    
                                    
                                
                                
                                
                            </div>
                        
                        <?php
                    }
                }}
                
else
{
    $id = $this->Session->read('id');
    //$q = $jm->find('first',array('conditions'=>array('member_id'=>$id)));
    $ch = $canV->find('first',array('conditions'=>array('member_id'=>$id)));
    if($ch)
    {
        $ch_arr = array('afimac_intel'=>$ch['Canview']['afimac_intel'],'news_media'=>$ch['Canview']['news_media']);
    }
    else
    {
        $ch_arr = array('afimac_intel'=>0,'news_media'=>0);
    }
    
        $job_array = array($sid);
        if(!empty($job_array))
        {
            foreach($job_array as $j)
            {
                if($jid)
                    {
                        if($jid!=trim($j))
                        continue;
                    }
                $q2 = $job->find('first',array('conditions'=>array('id'=>trim($j))));
                ?>
                <!--<h3 style="font-size: 15px;"><?php echo stripslashes($q2['Job']['title']);?></h3>-->
                
                <?php
                if($jid && !$name)
                {
                    $q3 = $spe->find('all');
                }
                else
                $q3 = $spe->find('all',array('conditions'=>array('document_type LIKE "%'.$name.'%"')));
                if($q3)
                {
                    $test = 0;
                    foreach($q3 as $do)
                    {
                        if($ch_arr[strtolower(str_replace(array(' ','/'),array('_','_'),$do['SpecJob']['document_type']))])
                        {
                        
                        ?>
                        <div class="myclass" style="width:1030px;font-size:13px;">
                        <div class="left" style="width:120px;"><?php echo stripslashes($q2['Job']['title']);?></div> 
                        <?php
                        
                            //$documents = $docs->find('all',array('conditions'=>array('document_id'=>$do['Document']['id'])));
                               ?>
                                
                                <div  class="left" style="width:120px;margin-left:5px;"><?php echo $do['SpecJob']['document_type'];?></div>
                                
                                
                                
                                <?php
                                //ifelse condition
                                //ifelse condition
                                //ifelse condition
                                //ifelse condition
                                ?>
                            
                                <div class="left" style="width:120px;margin-left:5px;">Documents</div>
                            
                            
                               
                                    <div class="left" style="width:480px;margin-left:5px;">
                                    <?php echo "&nbsp;".$do['SpecJob']['doc'];?>
                                    </div>
                                    <div class="left" style="width:100px;margin-left:5px;"><input type="checkbox" class="doc" value="<?php echo $do['SpecJob']['doc'];?>" /></div>
                                    <div style="clear:both;"></div>
                                    
                                    
                                
                                
                            </div>
                        
                        <?php
                    }}
                }
                ?>
                
                <?php
            }
        }
    
}
?>