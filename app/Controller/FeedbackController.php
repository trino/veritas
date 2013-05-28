<?php
class FeedbackController extends AppController
{
   public $name = 'Feedback';
   
   function index()
   {
    $this->loadModel('Document');
    $this->loadModel('Job');
    if(!$this->Session->read('id'))
        $this->redirect('/dashboard');      
    
        if($this->Session->read('avatar'))
        {
            
            $this->paginate = array('conditions'=>array('document_type'=>'client_memo'),'order'=>array('job_id'),'limit'=>10);
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
            
                //echo 2;die();
            $this->paginate = array('conditions'=>array('document_type'=>'client_memo','job_id IN'.$jid),'order'=>array('job_id'),'limit'=>10);
            
            $docs = $this->paginate('Document');
            //$docs = $this->Document->find('all',array('conditions'=>array('addedBy'=>$this->Session->read('id'),'title LIKE'=>'%'.$search.'%'))); 
        }
    //$doc = $this->Document->find('all',array('conditions'=>array('document_type'=>'client_memo')));
    $this->set('docs',$docs);
    $this->set('jo_bs',$this->Job);
   }
    
    
    
}