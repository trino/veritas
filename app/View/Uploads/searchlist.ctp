<?php

if($this->Session->read('admin'))
{
    
                $q12 = $job->find('all');
                foreach($q12 as $q2){
                ?>
                <h3 style="font-size: 15px;"><?php echo $q2['Job']['title'];?></h3>
                
                <?php
                $q3 = $doc->find('all',array('conditions'=>array('job_id'=>$q2['Job']['id'],'draft'=>0,'title LIKE "%'.$name.'%"')));
                if($q3)
                {
                    foreach($q3 as $do)
                    {
                        ?>
                        <div style="background: #e5e5e5;margin-bottom:5px;padding:5px;border-radius:5px;font-size:13px;">
                            <b style="font-size: 14px;"><?php echo $do['Document']['title'];?></b>
                            <br />
                            
                             
                            <?php
                            $documents = $docs->find('all',array('conditions'=>array('document_id'=>$do['Document']['id'])));
                            if($documents)
                            {
                                ?>
                                <b style="font-size:13px;">(Documents)</b>
                                <br />
                            
                                <?php
                                foreach($documents as $dcs)
                                {
                                    ?>
                                    <div style="width: 350px;font-size: 12px;">
                                    <div style="float: left;"><?php echo $dcs['Doc']['doc'];?></div>
                                    <div style="float: right;"><input type="checkbox" class="doc" value="<?php echo $dcs['Doc']['doc'];?>" /></div>
                                    <div style="clear:both;"></div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <p>&nbsp;</p>
                                <?php
                            }
                            $images = $imgs->find('all',array('conditions'=>array('document_id'=>$do['Document']['id'])));
                            if($images)
                            {
                                ?>
                                <b style="font-size: 13px;">(Images)</b>
                                <br />
                            
                                <?php
                                foreach($images as $dcs)
                                {
                                    ?>
                                    <div style="width: 350px;font-size:12px;">
                                    <div style="float: left;"><?php echo $dcs['Image']['image'];?></div>
                                    <div style="float: right;"><input type="checkbox" class="doc" value="<?php echo $dcs['Image']['image'];?>" /></div>
                                    <div style="clear:both;"></div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <p>&nbsp;</p>
                                <?php
                            }
                            $videos = $vdos->find('all',array('conditions'=>array('document_id'=>$do['Document']['id'])));
                            if($videos)
                            {
                                ?>
                                <b style="font-size: 13px;">(Videos)</b>
                                <br />
                            
                                <?php
                                foreach($videos as $dcs)
                                {
                                    ?>
                                    <div style="width: 350px;font-size:12px;">
                                    <div style="float: left;"><?php echo $dcs['Video']['video'];?></div>
                                    <div style="float: right;"><input type="checkbox" class="doc" value="<?php echo $dcs['Video']['video'];?>" /></div>
                                    <div style="clear:both;"></div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <p>&nbsp;</p>
                                <?php
                            }
                            ?>
                            
                        </div>
                        <?php
                    }
                }}
                ?>
                <hr />
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
                <h3 style="font-size: 15px;"><?php echo $q2['Job']['title'];?></h3>
                
                <?php
                $q3 = $doc->find('all',array('conditions'=>array('job_id'=>$q2['Job']['id'],'draft'=>0,'title LIKE "%'.$name.'%"')));
                if($q3)
                {
                    foreach($q3 as $do)
                    {
                        ?>
                        <div style="background: #e5e5e5;margin-bottom:5px;padding:5px;border-radius:5px;font-size:13px;">
                            <b style="font-size: 14px;"><?php echo $do['Document']['title'];?></b>
                            <br />
                            
                             
                            <?php
                            $documents = $docs->find('all',array('conditions'=>array('document_id'=>$do['Document']['id'])));
                            if($documents)
                            {
                                ?>
                                <b style="font-size: 13px;">(Documents)</b>
                                <br />
                            
                                <?php
                                foreach($documents as $dcs)
                                {
                                    ?>
                                    <div style="width: 350px;font-size: 12px;">
                                    <div style="float: left;"><?php echo $dcs['Doc']['doc'];?></div>
                                    <div style="float: right;"><input type="checkbox" class="doc" value="<?php echo $dcs['Doc']['doc'];?>" /></div>
                                    <div style="clear:both;"></div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <p>&nbsp;</p>
                                <?php
                            }
                            $images = $imgs->find('all',array('conditions'=>array('document_id'=>$do['Document']['id'])));
                            if($images)
                            {
                                ?>
                                <b style="font-size: 13px;">(Images)</b>
                                <br />
                            
                                <?php
                                foreach($images as $dcs)
                                {
                                    ?>
                                    <div style="width: 350px;font-size:12px;">
                                    <div style="float: left;"><?php echo $dcs['Image']['image'];?></div>
                                    <div style="float: right;"><input type="checkbox" class="doc" value="<?php echo $dcs['Image']['image'];?>" /></div>
                                    <div style="clear:both;"></div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <p>&nbsp;</p>
                                <?php
                            }
                            $videos = $vdos->find('all',array('conditions'=>array('document_id'=>$do['Document']['id'])));
                            if($videos)
                            {
                                ?>
                                <b style="font-size: 13px;">(Videos)</b>
                                <br />
                            
                                <?php
                                foreach($videos as $dcs)
                                {
                                    ?>
                                    <div style="width: 350px;font-size:12px;">
                                    <div style="float: left;"><?php echo $dcs['Video']['video'];?></div>
                                    <div style="float: right;"><input type="checkbox" class="doc" value="<?php echo $dcs['Video']['video'];?>" /></div>
                                    <div style="clear:both;"></div>
                                    </div>
                                    <?php
                                }
                                ?>
                                <p>&nbsp;</p>
                                <?php
                            }
                            ?>
                            
                        </div>
                        <?php
                    }
                }
                ?>
                <hr />
                <?php
            }
        }
    }
}
?>