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
    
                $q12 = $job->find('all');
                foreach($q12 as $q2){
                ?>
                <!--<h3 style="font-size: 15px;"><?php echo stripslashes($q2['Job']['title']);?></h3>-->
                
                <?php
                $q3 = $doc->find('all',array('conditions'=>array('job_id'=>$q2['Job']['id'],'draft'=>0,'title LIKE "%'.$name.'%"')));
                if($q3)
                {
                    //$tests = 0;
                    foreach($q3 as $do)
                    {
                        /*$tests++;
                        if($tests==1)
                        {
                            ?>
                            <h3 style="font-size: 15px;"><?php echo stripslashes($q2['Job']['title']);?></h3>
                            <?php
                        }*/
                        ?>
                        
                            
                            
                            <div class="myclass" style="width: 1030px;font-size:13px;">
                            <div class="left" style="width:120px;"><?php echo stripslashes($q2['Job']['title']);?></div> 
                            <?php
                            $documents = $docs->find('all',array('conditions'=>array('document_id'=>$do['Document']['id'])));
                            if($documents)
                            {
                                ?>
                                
                                <div class="left" style="width:120px;margin-left:5px;">
                                
                                <?php echo $do['Document']['title'];?>
                                </div>
                                <div class="left" style="width:120px;margin-left:5px;">Documents</div>
                                
                            
                                <?php
                                foreach($documents as $dcs)
                                {
                                    ?>
                                    <div class="left" style="width:480px;margin-left:5px;">
                                    <?php echo $dcs['Doc']['doc'];?>
                                    </div>
                                    <div class="left" style="width:100px;margin-left:5px;"><input type="checkbox" class="doc" value="<?php echo $dcs['Doc']['doc'];?>" /></div>
                                    <div style="clear:both;"></div>
                                    
                                    <?php
                                }
                                ?>
                                
                                
                                <?php
                            }
                            $images = $imgs->find('all',array('conditions'=>array('document_id'=>$do['Document']['id'])));
                            if($images)
                            {
                                ?>
                                
                                <div class="left" style="width:120px;margin-left:5px;"><?php echo $do['Document']['title'];?></div>
                                
                                <div class="left" style="width:120px;margin-left:5px;">Images</div>
                                
                            
                                <?php
                                foreach($images as $dcs)
                                {
                                    ?>
                                    <div class="left" style="width:480px;margin-left:5px;">
                                    <?php echo $dcs['Image']['image'];?>
                                    </div>
                                    <div class="left" style="width:100px;margin-left:5px;"><input type="checkbox" class="doc" value="<?php echo $dcs['Image']['image'];?>" /></div>
                                    <div style="clear:both;"></div>
                                    
                                    <?php
                                }
                                ?>
                                
                                <?php
                            }
                            $videos = $vdos->find('all',array('conditions'=>array('document_id'=>$do['Document']['id'])));
                            if($videos)
                            {
                                ?>
                                
                                <div class="left" style="width:120px;margin-left:5px;"><?php echo $do['Document']['title'];?></div>
                                
                                <div class="left" style="width:120px;margin-left:5px;">Videos</div>
                                
                            
                                <?php
                                foreach($videos as $dcs)
                                {
                                    ?>
                                    <div class="left" style="width:480px;margin-left:5px;">
                                    <?php echo $dcs['Video']['video'];?></div>
                                    <div class="left" style="width:100px;margin-left:5px;"><input type="checkbox" class="doc" value="<?php echo $dcs['Video']['video'];?>" /></div>
                                    
                                    <?php
                                }
                                ?>
                                
                                <?php
                            }
                            ?>
                            </div>
                        
                        <?php
                    }
                }}
                ?>
                
                <?php
            
}
else
{
    $id = $this->Session->read('id');
    $q = $jm->find('first',array('conditions'=>array('member_id'=>$id)));
    if($q)
    {
        $job_array = explode(',',$q['Jobmember']['job_id']);
        if(!empty($job_array))
        {
            foreach($job_array as $j)
            {
                $q2 = $job->find('first',array('conditions'=>array('id'=>trim($j))));
                ?>
                <!--<h3 style="font-size: 15px;"><?php echo stripslashes($q2['Job']['title']);?></h3>-->
                
                <?php
                $q3 = $doc->find('all',array('conditions'=>array('job_id'=>$q2['Job']['id'],'draft'=>0,'title LIKE "%'.$name.'%"')));
                if($q3)
                {
                    $test = 0;
                    foreach($q3 as $do)
                    {
                        ?>
                        <div class="myclass" style="width:1030px;font-size:13px;">
                        <div class="left" style="width:120px;"><?php echo stripslashes($q2['Job']['title']);?></div> 
                        <?php
                        
                            $documents = $docs->find('all',array('conditions'=>array('document_id'=>$do['Document']['id'])));
                            if($documents)
                            {
                                ?>
                                
                                <div  class="left" style="width:120px;margin-left:5px;"><?php echo $do['Document']['title'];?></div>
                            
                                <div class="left" style="width:120px;margin-left:5px;">Documents</div>
                            
                            
                                <?php
                                foreach($documents as $dcs)
                                {
                                    ?>
                                    <div class="left" style="width:480px;margin-left:5px;">
                                    <?php echo $dcs['Doc']['doc'];?>
                                    </div>
                                    <div class="left" style="width:100px;margin-left:5px;"><input type="checkbox" class="doc" value="<?php echo $dcs['Doc']['doc'];?>" /></div>
                                    <div style="clear:both;"></div>
                                    
                                    <?php
                                }
                                ?>
                                
                                <?php
                            }
                            $images = $imgs->find('all',array('conditions'=>array('document_id'=>$do['Document']['id'])));
                            if($images)
                            {
                                ?>
                                
                                <div  class="left" style="width:120px;margin-left:5px;"><?php echo $do['Document']['title'];?></div>
                            
                                <div class="left" style="width:120px;margin-left:5px;">Images</div>
                                
                            
                                <?php
                                foreach($images as $dcs)
                                {
                                    ?>
                                    <div class="left" style="width:480px;margin-left:5px;">
                                        <?php echo $dcs['Image']['image'];?>
                                    </div>
                                    <div class="left" style="width:100px;margin-left:5px;"><input type="checkbox" class="doc" value="<?php echo $dcs['Image']['image'];?>" /></div>
                                    <div style="clear:both;"></div>
                                    
                                    <?php
                                }
                                ?>
                                
                                <?php
                            }
                            $videos = $vdos->find('all',array('conditions'=>array('document_id'=>$do['Document']['id'])));
                            if($videos)
                            {
                                ?>
                               
                                <div class="left" style="width:120px;margin-left:5px;"><?php echo $do['Document']['title'];?></div>
                            
                                <div class="left" style="width:120px;margin-left:5px;">Videos</div>
                                
                            
                                <?php
                                foreach($videos as $dcs)
                                {
                                    ?>
                                    <div class="left" style="width:480px;margin-left:5px;">
                                    <?php echo $dcs['Video']['video'];?></div>
                                    <div class="left" style="width:120px;margin-left:5px;"><input type="checkbox" class="doc" value="<?php echo $dcs['Video']['video'];?>" /></div>
                                    <div style="clear:both;"></div>
                                    
                                    <?php
                                }
                                ?>
                                
                                <?php
                            }
                            ?>
                            </div>
                        
                        <?php
                    }
                }
                ?>
                
                <?php
            }
        }
    }
}
?>