<?php
class KeycontactsController extends AppController
{
    public $name = 'Keycontacts';
    public function index()
    {
        //die('here');
        $this->loadModel('Key_contact');
        $this->loadModel('Member');
        $this->loadModel('Job');

        if(!$this->Session->read('id'))
        $this->redirect('/dashboard');      
    
        if($this->Session->read('avatar'))
        {
            
            $this->paginate = array('order'=>array('job_id'),'limit'=>10);
            $docs = $this->paginate('Key_contact');
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
            $this->paginate = array('conditions'=>array('job_id IN'.$jid),'order'=>array('job_id'),'limit'=>10);
            
            $docs = $this->paginate('Key_contact');
            //$docs = $this->Document->find('all',array('conditions'=>array('addedBy'=>$this->Session->read('id'),'title LIKE'=>'%'.$search.'%'))); 
        }
        $this->set('member',$this->Member);
        $this->set('jo_bs',$this->Job);
        $this->set('docs',$docs);
        
    }
}