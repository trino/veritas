<?php
App::uses('AppController', 'Controller');
class SearchController extends AppController
{
    public $name = 'Search';
    public function index()
    {
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
              
        if($this->Session->read('avatar'))
        {
            
            if($search != ''){
            if(!$from && !$to)
            $this->paginate = array('conditions'=>array('OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%'))),'order'=>array('job_id'),'limit'=>10);
            else
            if($from && $to)
            $this->paginate = array('conditions'=>array('OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'`date` >='=>$from, '`date` <='=>$to),'order'=>array('job_id'),'limit'=>10);
            }
            else
            {
            if(!$from && !$to)
            $this->paginate = array('order'=>array('job_id'),'limit'=>10);
            else
            $this->paginate = array('conditions'=>array('`date` >='=>$from, '`date` <='=>$to),'order'=>array('job_id'),'limit'=>10);
            
            }
            $docs = $this->paginate('Document');
            //$docs = $this->Document->find('all',array('conditions'=>array('title LIKE'=>'%'.$search.'%')));
        }
        else
        {
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
            if(!$to && !$from)    
            $this->paginate = array('conditions'=>array('OR'=>array(array('addedBy'=>$this->Session->read('id')),array('addedBy'=>0)),'OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'job_id IN'.$jid),'order'=>array('job_id'),'limit'=>10);
            else
            if($to && $from)
            $this->paginate = array('conditions'=>array('OR'=>array(array('addedBy'=>$this->Session->read('id')),array('addedBy'=>0)),'OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'`date` >='=>$from, '`date` <='=>$to,'job_id IN'.$jid),'order'=>array('job_id'),'limit'=>10);
            
            }
            else{
                //echo 2;die();
            $this->paginate = array('conditions'=>array('OR'=>array(array('addedBy'=>$this->Session->read('id')),array('addedBy'=>0)),'job_id IN'.$jid),'order'=>array('job_id'),'limit'=>10);
            }
            $docs = $this->paginate('Document');
            //$docs = $this->Document->find('all',array('conditions'=>array('addedBy'=>$this->Session->read('id'),'title LIKE'=>'%'.$search.'%'))); 
        }
        $this->set('member',$this->Member);
        $this->set('jo_bs',$this->Job);
        $this->set('docs',$docs);
        $this->set('activity',$this->Activity);
        
    }
}
?>