<?php
App::uses('AppController', 'Controller');
class SearchController extends AppController
{
    public $name = 'Search';
    
    public function index($type = '',$job_id=0)
    {
        $this->set('type',$type);
        $this->loadModel('Doc');
        $this->loadModel('Image');
        $this->loadModel('Video');
        $this->set('do',$this->Doc);
        $this->set('im',$this->Image);
        $this->set('v',$this->Video);
        //die('here');
        $this->loadModel('Document');
        $this->loadModel('Member');
        $this->loadModel('Job');
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
                $order = 'job_id,'.$_GET['order']." ".$_GET['ty'];
            }
            else
                $order = 'job_id,document_type,`date` DESC';
              
        if($this->Session->read('avatar'))
        {
            
            if($search != ''){
            if(!$from && !$to)
            $this->paginate = array('conditions'=>array('OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%'))),'order'=>$order,'limit'=>10);
            else
            if($from && $to)
            {
            if($from != $to)    
            $this->paginate = array('conditions'=>array('OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'DATE(`date`) >= "'.$from.'"', 'DATE(`date`) <= "'.$to.'"'),'order'=>$order,'limit'=>5);
            else
            $this->paginate = array('conditions'=>array('OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'DATE(`date`)'=>$from),'order'=>$order,'limit'=>10);
            
            }
            }
            else
            {
            if(!$from && !$to){
            if($type!='') {
            if($job_id!=0)   
            $this->paginate = array('conditions'=>array('document_type'=>$type,'job_id'=>$job_id),'order'=>$order,'limit'=>10);
            else
            $this->paginate = array('conditions'=>array('document_type'=>$type),'order'=>$order,'limit'=>10);
            }
            else                        
            $this->paginate = array('order'=>$order,'limit'=>10);
            }
            else
            {
            if($from != $to)       
            $this->paginate = array('conditions'=>array('DATE(`date`) >='=>$from, 'DATE(`date`) <='=>$to),'order'=>$order,'limit'=>10);
            else
            $this->paginate = array('conditions'=>array('DATE(`date`)'=>$from),'order'=>$order,'limit'=>10);
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
            if($qs['Canview']['contracts'] || $type == 'contracts' || $type=='contract')
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
            if(count($arrs)<1)
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
            if($search!=''){            
            if(!$to && !$from){
                if($type)
                    {
                     
                    }
                    
                $this->paginate = array('conditions'=>array('OR'=>$arrs,'AND'=>array('document_type <>'=>'client_feedback','OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%'))),'job_id IN'.$jid),'order'=>$order,'limit'=>10);
                
                }
            else
            if($to && $from){
                if($to!=$from)
                $this->paginate = array('conditions'=>array('OR'=>$arrs,'document_type <>'=>'client_feedback','OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'DATE(`date`) >='=>$from, 'DATE(`date`) <='=>$to,'job_id IN'.$jid),'order'=>$order,'limit'=>10);
                else
                $this->paginate = array('conditions'=>array('OR'=>$arrs,'document_type <>'=>'client_feedback','OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'DATE(`date`)'=>$from,'job_id IN'.$jid),'order'=>$order,'limit'=>10);
                
                }
            

            }
            else{
                //echo 2;die();
                if(!$to && !$from){
                    
                $this->paginate = array('conditions'=>array('OR'=>$arrs,'document_type <>'=>'client_feedback','job_id IN'.$jid),'order'=>$order,'limit'=>10);
                }
                else
                {
                    if($to==$from)
                    {
                        $this->paginate = array('conditions'=>array('OR'=>$arrs,'document_type <>'=>'client_feedback','job_id IN'.$jid,'DATE(`date`) LIKE "'.$from.'%"'),'order'=>$order,'limit'=>10);
                    }
                    else
                        $this->paginate = array('conditions'=>array('OR'=>$arrs,'document_type <>'=>'client_feedback','job_id IN'.$jid,'DATE(`date`) >='=>$from,'DATE(`date`) <='=>$to),'order'=>$order,'limit'=>10);
                }
            }
            $docs = $this->paginate('Document');
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
    
}
?>