<?php
App::uses('AppController', 'Controller');
class SearchController extends AppController
{
    public $name = 'Search';
    
    public function index($type = '',$job_id=0)
    {
        $this->loadModel('Member');
        if(!$this->Session->read('admin')){
            $sess_id = $this->Session->read('id');
        }
        else
        {
            $u = $this->Member->find('all',array('conditions'=>array('id NOT IN(SELECT member_id from jobmembers WHERE job_id IN(SELECT id FROM jobs WHERE is_special = 1))')));
            $this->set('u',$u);
            //var_dump($u);die();
        }
        //var_dump($u);die();
        $this->set('type',$type);
        $this->loadModel('Doc');
        $this->loadModel('Image');
        $this->loadModel('Video');
        $this->set('do',$this->Doc);
        $this->set('im',$this->Image);
        $this->set('v',$this->Video);
        $this->loadModel('Document');
        $this->loadModel('Member');
        $this->loadModel('Job');
        $this->loadModel('Jobmember');
        
        $this->loadModel('SpecJob');
        if(isset($sess_id))
            $sess = $this->Jobmember->find('first',array('conditions'=>array('member_id'=>$sess_id)));
        if(isset($sess))
        if($sess)
        {
            $jjj = $sess['Jobmember']['job_id'];
            if(str_replace(',','',$jjj)==$jjj)
            {
                $finds = $this->Job->findById($jjj);
                if($finds && $finds['Job']['is_special'] == 1)
                {
                    $special = 1;
                } 
            }
        }
        
        if($job_id)
        {
            $j = $this->Job->find('first',array('conditions'=>array('id'=>$job_id)));
            $this->set('jobname',$j['Job']['title']);
            unset($j);
        }
        $this->loadModel('Activity');

        if(!$this->Session->read('id'))
        $this->redirect('/dashboard');
                
        if(isset($_GET['search']))
        {
            $search = $_GET['search'];
            if(!$search)
            $search = '';
            $this->set('search',$_GET['search']);
        }
        else
            $search = '';    
                 
        if(isset($_GET['from']))
        {
            $from = $_GET['from'];
        }    
        else
            $from = '';
            
        if(isset($_GET['to']))
        {
            $to = $_GET['to'];
        }    
        else
            $to = '';  
        
            
            if(isset($_GET['order']))
            {
                
                $order = $_GET['order']." ".$_GET['ty'];
            }
            else
                $order = 'document_type,`date` DESC';
            
                
              
        if($this->Session->read('avatar'))
        {
            
            $this->set('alljob',$this->Job->find('all',array('conditions'=>array('is_special'=>0))));
            if($search != ''){
            if(!$from && !$to){
            $this->paginate = array('conditions'=>array('OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%'))),'order'=>$order,'limit'=>10);
            $this->set('count',$this->Document->find('count',array('conditions'=>array('OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%'))))));
            }
            else
            if($from && $to)
            {
            if($from != $to){    
            $this->paginate = array('conditions'=>array('OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'DATE(`date`) >= "'.$from.'"', 'DATE(`date`) <= "'.$to.'"'),'order'=>$order,'limit'=>5);
            $this->set('count',$this->Document->find('count',array('conditions'=>array('OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'DATE(`date`) >= "'.$from.'"', 'DATE(`date`) <= "'.$to.'"'))));
            }
            else{
            $this->paginate = array('conditions'=>array('OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'DATE(`date`)'=>$from),'order'=>$order,'limit'=>10);
            $this->set('count',$this->Document->find('count',array('conditions'=>array('OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'DATE(`date`)'=>$from))));
            }
            
            }
            }
            else
            {
            if(!$from && !$to){
            if($type!='') {
            if($job_id!=0){   
            $this->paginate = array('conditions'=>array('document_type'=>$type,'job_id'=>$job_id),'order'=>$order,'limit'=>10);
            $this->set('count',$this->Document->find('count',array('conditions'=>array('document_type'=>$type,'job_id'=>$job_id))));
            }
            else{
            $this->paginate = array('conditions'=>array('document_type'=>$type),'order'=>$order,'limit'=>10);
            $this->set('count',$this->Document->find('count',array('conditions'=>array('document_type'=>$type))));
            }
            }
            else{                        
            if(isset($_GET['member'])){    
            $this->paginate = array('conditions'=>array('addedBy'=>$_GET['member']),'order'=>$order,'limit'=>10);
            $this->set('count',$this->Document->find('count',array('conditions'=>array('addedBy'=>$_GET['member']))));
            }
            else
            {
                if(!isset($_GET['job'])){
                $this->paginate = array('order'=>$order,'limit'=>10);
            $this->set('count',$this->Document->find('count'));
            }
            else
            {
                $this->paginate = array('conditions'=>array('job_id'=>$_GET['job']),'order'=>$order,'limit'=>10);
            $this->set('count',$this->Document->find('count',array('conditions'=>array('job_id'=>$_GET['job']))));
            }
            }
            }
            }
            else
            {
            if($from != $to){       
            $this->paginate = array('conditions'=>array('DATE(`date`) >='=>$from, 'DATE(`date`) <='=>$to),'order'=>$order,'limit'=>10);
            $this->set('count',$this->Document->find('count',array('conditions'=>array('DATE(`date`) >='=>$from, 'DATE(`date`) <='=>$to))));
            }
            else{
            $this->paginate = array('conditions'=>array('DATE(`date`)'=>$from),'order'=>$order,'limit'=>10);
            $this->set('count',$this->Document->find('count',array('conditions'=>array('DATE(`date`)'=>$from))));
            }
            }
            
            }
            $docs = $this->paginate('Document');
            //$docs = $this->Document->find('all',array('conditions'=>array('title LIKE'=>'%'.$search.'%')));
        }
        else
        {
         
            $this->loadModel('Canview');
            $qs = $this->Canview->find('first',array('conditions'=>array('member_id'=>$this->Session->read('id'))));
            $che = $this->Member->find('first',array('conditions',array('id'=>$this->Session->read('id'))));
            $arrs = array();
            if($type =="")
            {
            if($qs['Canview']['contracts'] || $type == 'contracts' || $type == 'contract')
            {
                $arrs[] = array('document_type'=>'contract');
            }
            if($qs['Canview']['report'])
            {
                $arrs[] = array('document_type'=>'report');
            }
            if($qs['Canview']['evidence'])
            {
                $arrs[] = array('document_type'=>'evidence');
            }
            if($qs['Canview']['personal_inspection'])
            {
                $arrs[] = array('document_type'=>'personal_inspection');
            }
            if($qs['Canview']['mobile_inspection'])
            {
                $arrs[] = array('document_type'=>'mobile_inspection');
            }
            if($qs['Canview']['vehicle_inspection'])
            {
                $arrs[] = array('document_type'=>'vehicle_inspection');
            }
            if($qs['Canview']['mobile_log'])
            {
                $arrs[] = array('document_type'=>'mobile_log');
            }
            if($qs['Canview']['inventory'])
            {
                $arrs[] = array('document_type'=>'mobile_vehicle_trunk_inventory');
            }
            if($qs['Canview']['client_feedback'])
            {
                $arrs[] = array('document_type'=>'client_feedback');
            }
            if($qs['Canview']['templates'] || $type == 'templates' || $type=='template')
            {
                $arrs[] = array('document_type'=>'template');
            }
            if($qs['Canview']['siteOrder'])
            {
                $arrs[] = array('document_type'=>'siteOrder');
            }
            if($qs['Canview']['training'])
            {
                $arrs[] = array('document_type'=>'training');
            }
            if($qs['Canview']['employee'])
            {
                $arrs[] = array('document_type'=>'employee');
            }
            if($qs['Canview']['KPIAudits'])
            {
                $arrs[] = array('document_type'=>'KPIAudits');
            }
            if($qs['Canview']['afimac_intel'])
            {
                $arrs2[] = array('document_type'=>'AFIMAC Intel');
            }
            if($qs['Canview']['news_media'])
            {
                $arrs2[] = array('document_type'=>'News/Media');
            }
            }
            else
            {
                if($type == 'contracts' || $type == 'contract')
            {
                $arrs = array('document_type'=>'contract');
            }
            if($type == 'report')
            {
                $arrs = array('document_type'=>'report');
            }
            if($type == 'evidence')
            {
                $arrs = array('document_type'=>'evidence');
            }
            if($type == 'personal_inspection')
            {
                $arrs = array('document_type'=>'personal_inspection');
            }
            if($type == 'client_feedback')
            {
                $arrs = array('document_type'=>'client_feedback');
            }
            if( $type == 'templates' || $type=='template')
            {
                $arrs = array('document_type'=>'template');
            }
            if($type == 'siteOrder')
            {
                $arrs = array('document_type'=>'siteOrder');
            }
            if($type == 'training')
            {
                $arrs = array('document_type'=>'training');
            }
            if($type == 'employee')
            {
                $arrs = array('document_type'=>'employee');
            }
            if($type == 'KPIAudits')
            {
                $arrs = array('document_type'=>'KPIAudits');
            }
            if($type == 'AFIMAC Intel')
            {
                $arrs2 = array('document_type'=>'AFIMAC Intel');
            }
            if($type == 'News/Media')
            {
                $arrs2 = array('document_type'=>'News/Media');
            }
            if($type == 'mobile_inspection')
            {
                $arrs = array('document_type'=>'mobile_inspection');
            }
            if($type == 'mobile_log')
            {
                $arrs = array('document_type'=>'mobile_log');
            }
            if($type == 'vehicle_inspection')
            {
                $arrs = array('document_type'=>'vehicle_inspection');
            }
            if($type == 'mobile_vehicle_trunk_inventory')
            {
                $arrs = array('document_type'=>'mobile_vehicle_trunk_inventory');
            }
            }
            if(count($arrs)< 1 && count($arrs2)< 1)
            $this->set('noView',1);
            //$arrs[] = array('document_type <>'=>'client_feedback');
            
                        
            
                /*if($type!='')
                {
                    unset($arrs);
                    if($job_id==0)
                    $arrs2 = array('document_type'=>str_replace(array('contracts','templates'),array('contract','template'),$type));
                    else
                    $arrs2 = array('job_id'=>$job_id,'document_type'=>str_replace(array('contracts','templates'),array('contract','template'),$type));
                    
                }*/
            
            if(!$che['Member']['canView'])
            $this->set('noView',1);
            $this->loadModel('Jobmember');
            $job_ids = $this->Jobmember->find('first',array('conditions'=>array('member_id'=>$this->Session->read('id'))));
            if($job_ids)
                $jid =$job_ids['Jobmember']['job_id'];
            else
                $jid = '';
            if($jid)
                $jid = '('.$jid.')';
            else
                $jid = '('.'99999999999'.')';
                if($job_ids['Jobmember']['job_id'] && str_replace(',','',$job_ids['Jobmember']['job_id'] == $job_ids['Jobmember']['job_id']))
                {
                    $scheck = $this->Job->findById($job_ids['Jobmember']['job_id']);
                    if($scheck['Job']['is_special'] == 1)
                    {
                        $sid = $this->Job->findById($job_ids['Jobmember']['job_id']);
                        $this->set('sid',$sid['Job']['id']);
                    } 
                }
                
                if(!isset($sid) && $type != 'afimac_intel' && $type != 'news_media'){
            if($search!=''){            
            if(!$to && !$from){
                if($type)
                    {
                        
                    }
                    
                $this->paginate = array('conditions'=>array('OR'=>$arrs,'AND'=>array('document_type <>'=>'client_feedback','OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%'))),'job_id IN'.$jid),'order'=>$order,'limit'=>10);
                $this->set('count',$this->Document->find('count',array('conditions'=>array('OR'=>$arrs,'AND'=>array('document_type <>'=>'client_feedback','OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%'))),'job_id IN'.$jid))));
                
                
                }
            else
            if($to && $from){
                if($to!=$from){
                    $this->paginate = array('conditions'=>array('OR'=>$arrs,'AND'=>array('document_type <>'=>'client_feedback','OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'DATE(`date`) >='=>$from, 'DATE(`date`) <='=>$to,'job_id IN'.$jid)),'order'=>$order,'limit'=>10);
                    $this->set('count',$this->Document->find('count',array('conditions'=>array('OR'=>$arrs,'AND'=>array('document_type <>'=>'client_feedback','OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'DATE(`date`) >='=>$from, 'DATE(`date`) <='=>$to,'job_id IN'.$jid)))));
                }
                else{
                    $this->paginate = array('conditions'=>array('OR'=>$arrs,'AND'=>array('document_type <>'=>'client_feedback','OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'DATE(`date`)'=>$from,'job_id IN'.$jid)),'order'=>$order,'limit'=>10);
                    $this->set('count',$this->Document->find('count',array('conditions'=>array('OR'=>$arrs,'AND'=>array('document_type <>'=>'client_feedback','OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'DATE(`date`)'=>$from,'job_id IN'.$jid)))));
                }
                
                }
            

            }
            else{
                //echo 2;die();
                if(!$to && !$from){
                if($job_id == 0 )
                {
                    $this->paginate = array('conditions'=>array('OR'=>$arrs,'AND'=>array('document_type <>'=>'client_feedback','job_id IN'.$jid)),'order'=>$order,'limit'=>10);
                    $this->set('count',$this->Document->find('count',array('conditions'=>array('OR'=>$arrs,'AND'=>array('document_type <>'=>'client_feedback','job_id IN'.$jid)))));
                }
                else
                {
                    $this->paginate = array('conditions'=>array('OR'=>$arrs,'AND'=>array('document_type <>'=>'client_feedback','job_id'=>$job_id)),'order'=>$order,'limit'=>10);
                    $this->set('count',$this->Document->find('count',array('conditions'=>array('OR'=>$arrs,'AND'=>array('document_type <>'=>'client_feedback','job_id'=>$job_id )))));
                }
                }
                else
                {
                    if($to==$from)
                    {
                        $this->paginate = array('conditions'=>array('OR'=>$arrs,'AND'=>array('document_type <>'=>'client_feedback','job_id IN'.$jid,'DATE(`date`) LIKE "'.$from.'%"')),'order'=>$order,'limit'=>10);
                        $this->set('count',$this->Document->find('count',array('conditions'=>array('OR'=>$arrs,'AND'=>array('document_type <>'=>'client_feedback','job_id IN'.$jid,'DATE(`date`) LIKE "'.$from.'%"')))));
                    }
                    else{
                        $this->paginate = array('conditions'=>array('OR'=>$arrs,'AND'=>array('document_type <>'=>'client_feedback','job_id IN'.$jid,'DATE(`date`) >='=>$from,'DATE(`date`) <='=>$to)),'order'=>$order,'limit'=>10);
                        $this->set('count',$this->Document->find('count',array('conditions'=>array('OR'=>$arrs,'AND'=>array('document_type <>'=>'client_feedback','job_id IN'.$jid,'DATE(`date`) >='=>$from,'DATE(`date`) <='=>$to)))));
                        }
                }
            }
            $docs = $this->paginate('Document');

            }
            else
            {
                
                
                
                    if(isset($_GET['order']))
                    {
                        $order = $_GET['order']." ".$_GET['ty'];
                    }
                    else
                        $order = 'document_type,dop DESC';
                        
                    
                
                
                
                
                
                //die('here'.$type);
                if($search!='')
                {            
            if(!$to && !$from){
                if($type)
                    {
                        if($type == 'afimac_intel')
                        $type = 'AFIMAC Intel';
                        else
                        if($type == 'news_media')
                        $type = 'News/Media';
                        
                        $this->paginate = array('conditions'=>array('OR'=>$arrs2,'AND'=>array('OR'=>array(array('document_type'=>'%'.$type.'%'),array('`desc` LIKE'=>'%'.$search.'%')))),'order'=>$order,'limit'=>10);
                        $this->set('count',$this->SpecJob->find('count',array('conditions'=>array('OR'=>$arrs2,'AND'=>array('OR'=>array(array('document_type'=>'%'.$type.'%'),array('`desc` LIKE'=>'%'.$search.'%')))))));
                    }
                    else{
                    
                $this->paginate = array('conditions'=>array('OR'=>$arrs2,'AND'=>array('OR'=>array(array('document_type LIKE'=>'%'.$search.'%'),array('`desc` LIKE'=>'%'.$search.'%')))),'order'=>$order,'limit'=>10);
                $this->set('count',$this->SpecJob->find('count',array('conditions'=>array('OR'=>$arrs2,'AND'=>array('OR'=>array(array('document_type LIKE'=>'%'.$search.'%'),array('`desc` LIKE'=>'%'.$search.'%')))))));
                }
                
                }
            else{
            if($to && $from){
                
                if($to!=$from){
                $this->paginate = array('conditions'=>array('OR'=>$arrs,'AND'=>array('OR'=>array(array('document_type LIKE'=>'%'.$search.'%'),array('`desc` LIKE'=>'%'.$search.'%')),'DATE(`dop`) >='=>$from, 'DATE(`dop`) <='=>$to)),'order'=>$order,'limit'=>10);
                $this->set('count',$this->SpecJob->find('count',array('conditions'=>array('OR'=>$arrs,'AND'=>array('OR'=>array(array('document_type LIKE'=>'%'.$search.'%'),array('`desc` LIKE'=>'%'.$search.'%')),'DATE(`dop`) >='=>$from, 'DATE(`dop`) <='=>$to)))));
                }
                //$this->paginate = array('conditions'=>array('OR'=>$arrs,'AND'=>array('document_type <>'=>'client_feedback','OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'DATE(`date`) >='=>$from, 'DATE(`date`) <='=>$to,'job_id IN'.$jid)),'order'=>$order,'limit'=>10);
                else{
                //$this->paginate = array('conditions'=>array('OR'=>$arrs,'AND'=>array('document_type <>'=>'client_feedback','OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'DATE(`date`)'=>$from,'job_id IN'.$jid)),'order'=>$order,'limit'=>10);
                $this->paginate = array('conditions'=>array('OR'=>$arrs,'AND'=>array('OR'=>array(array('document_type LIKE'=>'%'.$search.'%'),array('`desc` LIKE'=>'%'.$search.'%')),'DATE(`dop`)'=>$from)),'order'=>$order,'limit'=>10);
                $this->set('count',$this->SpecJob->find('count',array('conditions'=>array('OR'=>$arrs,'AND'=>array('OR'=>array(array('document_type LIKE'=>'%'.$search.'%'),array('`desc` LIKE'=>'%'.$search.'%')),'DATE(`dop`)'=>$from)))));
                }
                }
                }
            

            }
            else{
                //echo 2;die();
                if($type == 'afimac_intel')
                        $type = 'AFIMAC Intel';
                        else
                        if($type == 'news_media')
                        $type = 'News/Media';
                if(!$to && !$from){
                    if($type)
                    {
                        $this->paginate = array('conditions'=>array('OR'=>$arrs2,'document_type'=>$type),'order'=>$order,'limit'=>10);
                        $this->set('count',$this->SpecJob->find('count',array('conditions'=>array('OR'=>$arrs2,'document_type'=>$type))));    
                    }
                    else{
                $this->paginate = array('conditions'=>array('OR'=>$arrs2),'order'=>$order,'limit'=>10);
                $this->set('count',$this->SpecJob->find('count',array('conditions'=>array('OR'=>$arrs2))));
                }
                }
                else
                {
                    if($to==$from)
                    {
                        if($type)
                        {
                            $this->paginate = array('conditions'=>array('OR'=>$arrs2,'AND'=>array('document_type'=>$type,'DATE(`dop`) LIKE "'.$from.'%"')),'order'=>$order,'limit'=>10);
                            $this->set('count',$this->SpecJob->find('count',array('conditions'=>array('OR'=>$arrs2,'AND'=>array('document_type'=>$type,'DATE(`dop`) LIKE "'.$from.'%"')))));
                            
                        }
                        else{                        
                        $this->paginate = array('conditions'=>array('OR'=>$arrs2,'AND'=>array('DATE(`dop`) LIKE "'.$from.'%"')),'order'=>$order,'limit'=>10);
                        $this->set('count',$this->SpecJob->find('count',array('conditions'=>array('OR'=>$arrs2,'AND'=>array('DATE(`dop`) LIKE "'.$from.'%"')))));
                        }
                    }
                    else
                    if($type)
                    {
                       $this->paginate = array('conditions'=>array('OR'=>$arrs2,'AND'=>array('document_type'=>$type,'DATE(`dop`) >='=>$from,'DATE(`dop`) <='=>$to)),'order'=>$order,'limit'=>10);
                       $this->set('count',$this->SpecJob->find('count',array('conditions'=>array('OR'=>$arrs2,'AND'=>array('document_type'=>$type,'DATE(`dop`) >='=>$from,'DATE(`dop`) <='=>$to))))); 
                    }else{
                        $this->paginate = array('conditions'=>array('OR'=>$arrs2,'AND'=>array('DATE(`dop`) >='=>$from,'DATE(`dop`) <='=>$to)),'order'=>$order,'limit'=>10);
                        $this->set('count',$this->SpecJob->find('count',array('conditions'=>array('OR'=>$arrs2,'AND'=>array('DATE(`dop`) >='=>$from,'DATE(`dop`) <='=>$to)))));                        
                        }
                }
            }
            $docs = $this->paginate('SpecJob');
                
                
                
                
                
                
                
            }
            //$docs = $this->Document->find('all',array('conditions'=>array('addedBy'=>$this->Session->read('id'),'title LIKE'=>'%'.$search.'%'))); 
        }
        if(!$this->Session->read('admin'))
        {
            $idu = $this->Session->read('id');
            $ch = $this->Member->find('first',array('conditions',array('id'=>$idu)));
            if($ch['Member']['canView'] == 1)
            {
                $this->set('canView',1);
            }
        }
        $this->set('member',$this->Member);
        $this->set('jo_bs',$this->Job);
        
        $this->set('docs',$docs);
        $this->set('activity',$this->Activity);
        
    }
    
    function delete($id)
    {
        $this->loadModel('SpecJob');
        if($_SERVER['SERVER_NAME']=='localhost')
                {
                    $path = $_SERVER['DOCUMENT_ROOT'].'/veritas/app/webroot/img/documents/';
                }
                else
                    $path = $_SERVER['DOCUMENT_ROOT'].'/app/webroot/img/documents/';
        $doc = $this->SpecJob->findById($id);
        if($doc['SpecJob']['doc']!= "")
            unlink($path.$doc['SpecJob']['doc']);     
        $this->SpecJob->delete($id);
        $this->Session->setFlash('Document Succesfully Deleted.');
        $this->redirect('/dashboard');
        
        
    }
    function special($type = '',$job_id=0)
    {
        $t = $type;
        if($type == 'afimac_intel')
            $type1 = 'AFIMAC Intel';
        if($type == 'news_media')
            $type1 = 'News/Media';
        $this->loadModel('Member');    
        $u = $this->Member->find('all',array('conditions'=>array('id IN(SELECT member_id from jobmembers WHERE job_id IN(SELECT id FROM jobs WHERE is_special = 1))')));
        $this->set('u',$u);    
        $this->loadModel('SpecJob');
        if(isset($_GET['from'])&& isset($_GET['to']))
        {
            $from = $_GET['from'];
            $to = $_GET['to'];
            $this->paginate= array('conditions'=>array('document_type'=>$type1,'dop >='=>$from,'dop <='=>$to));
        }
        else
        {
            if(!isset($_GET['member']))
            $this->paginate= array('conditions'=>array('document_type'=>$type1));
            else
            $this->paginate= array('conditions'=>array('document_type'=>$type1,'addedBy'=>$_GET['member']));
        }$doc = $this->paginate('SpecJob');
        $this->set('doc',$doc);
        $this->set('type',$type);
        $this->set('t',$t);
            
            
    }
    
}
?>