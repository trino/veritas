<?php
App::uses('AppController', 'Controller');
class SearchController extends AppController
{
    public $name = 'Search';
    
    public function index($type = '',$job_id=0)
    {
	  
					
        //$this->set('base_url',$base_url);
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
            
            if($qs['Canview']['contracts'] && $qs['Canview']['evidence'] && $qs['Canview']['templates'] && $qs['Canview']['report'])
                $arrs  = array('document_type <>'=>'client_feedback');
                else
                if($qs['Canview']['contracts'] && $qs['Canview']['evidence'] && $qs['Canview']['templates'])
                {
                    $arrs  = array('document_type <>'=>'client_feedback','document_type <>'=>'report');
                }
                else
                if($qs['Canview']['evidence'] && $qs['Canview']['templates'] && $qs['Canview']['report'])
                {
                    $arrs  = array('document_type <>'=>'client_feedback','document_type <>'=>'contract');
                }
                else
                if($qs['Canview']['contracts'] && $qs['Canview']['templates'] && $qs['Canview']['report'])
                {
                    $arrs  = array('document_type <>'=>'client_feedback','document_type <>'=>'evidence');
                }
                else
                if($qs['Canview']['contracts'] && $qs['Canview']['evidence'] && $qs['Canview']['report'])
                {
                    $arrs  = array('document_type <>'=>'client_feedback','document_type <>'=>'template');
                }
                else
                if($qs['Canview']['contracts'] && $qs['Canview']['evidence'])
                {
                    $arrs  = array('document_type <>'=>'client_feedback','document_type <>'=>'template','document_type <>'=>'report');
                }
                else
                if($qs['Canview']['contracts'] && $qs['Canview']['report'])
                {
                    $arrs  = array('document_type <>'=>'client_feedback','document_type <>'=>'template','document_type <>'=>'evidence');
                }
                else
                if($qs['Canview']['contracts'] && $qs['Canview']['templates'])
                {
                    $arrs  = array('document_type <>'=>'client_feedback','document_type <>'=>'report','document_type <>'=>'evidence');
                }
                else
                if($qs['Canview']['report'] && $qs['Canview']['templates'])
                {
                    $arrs  = array('document_type <>'=>'client_feedback','document_type <>'=>'evidence','document_type <>'=>'contract');
                }
                else
                if($qs['Canview']['report'] && $qs['Canview']['evidence'])
                {
                    $arrs  = array('document_type <>'=>'client_feedback','document_type <>'=>'template','document_type <>'=>'contract');
                }
                else
                if($qs['Canview']['evidence'] && $qs['Canview']['templates'])
                {
                    $arrs  = array('document_type <>'=>'client_feedback','document_type <>'=>'contract','document_type <>'=>'report');
                }
                else
                if($qs['Canview']['evidence'])
                {
                    $arrs  = array('document_type <>'=>'client_feedback','document_type <>'=>'contract','document_type <>'=>'report','document_type <>'=>'template');
                }
                else
                if($qs['Canview']['contracts'])
                {
                    $arrs  = array('document_type <>'=>'client_feedback','document_type <>'=>'evidence','document_type <>'=>'report','document_type <>'=>'template');
                }
                else
                if($qs['Canview']['report'])
                {
                    $arrs  = array('document_type <>'=>'client_feedback','document_type <>'=>'contract','document_type <>'=>'evidence','document_type <>'=>'template');
                }
                else
                if($qs['Canview']['templates'])
                {
                    $arrs  = array('document_type <>'=>'client_feedback','document_type <>'=>'contract','document_type <>'=>'report','document_type <>'=>'evidence');
                }
                else{
                    //die('here');
                $arrs = array('document_type <>'=>'client_feedback');
                $this->set('noView',1);
                }
                if($type!='')
                {
                    unset($arrs);
                    if($job_id==0)
                    $arrs = array('document_type'=>str_replace(array('contracts','templates'),array('contract','template'),$type));
                    else
                    $arrs = array('job_id'=>$job_id,'document_type'=>str_replace(array('contracts','templates'),array('contract','template'),$type));
                    
                }
            
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
                //echo 1;die();
                /*
<<<<<<< HEAD
                $this->paginate = array('conditions'=>array('OR'=>array(array('addedBy'=>$this->Session->read('id')),array('addedBy'=>0)),'OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'job_id IN'.$jid),'order'=>array('job_id'),'limit'=>10);
======= */
            
            if(!$to && !$from){
                if($type)
                    {
                     
                    }
                $this->paginate = array('conditions'=>array($arrs,'OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'job_id IN'.$jid),'order'=>$order,'limit'=>10);
                
                }
            else
            if($to && $from){
                if($to!=$from)
                $this->paginate = array('conditions'=>array($arrs,'OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'DATE(`date`) >='=>$from, 'DATE(`date`) <='=>$to,'job_id IN'.$jid),'order'=>$order,'limit'=>10);
                else
                $this->paginate = array('conditions'=>array($arrs,'OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'DATE(`date`)'=>$from,'job_id IN'.$jid),'order'=>$order,'limit'=>10);
                
                }
            
//>>>>>>> 1e5f2a4bb330172a2af5dbf3e160edeec1515ade
            }
            else{
                //echo 2;die();
                if(!$to && !$from){
                    
                $this->paginate = array('conditions'=>array($arrs,'job_id IN'.$jid),'order'=>$order,'limit'=>10);
                }
                else
                {
                    if($to==$from)
                    {
                        $this->paginate = array('conditions'=>array($arrs,'job_id IN'.$jid,'DATE(`date`) LIKE "'.$from.'%"'),'order'=>$order,'limit'=>10);
                    }
                    else
                        $this->paginate = array('conditions'=>array($arrs,'job_id IN'.$jid,'DATE(`date`) >='=>$from,'DATE(`date`) <='=>$to),'order'=>$order,'limit'=>10);
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