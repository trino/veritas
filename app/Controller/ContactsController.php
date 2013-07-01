<?php
class ContactsController extends AppController
{
    public $name = 'contacts';
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
    function add()
    {
       $this->loadModel('Key_contact'); 
       if(isset($_POST['submit']))
        {
            $key_title = $_POST['key_title'];
            $key_company = $_POST['key_company'];
            $key_number = $_POST['key_number'];
            $key_name = $_POST['key_name'];
            $key_cell = $_POST['key_cell'];
            $key_email = $_POST['key_email'];
            $key_type = $_POST['type'];
            
            
              $key['title'] = $key_title;
              $key['company'] = $key_company;
              $key['phone'] = $key_number;
              $key['cell'] = $key_cell;
              $key['email'] = $key_email;
              $key['name'] = $key_name;
              $key['type'] = $key_type;
              //$key['job_id'] = $job_id;
              $this->Key_contact->create();
              $this->Key_contact->save($key);
             $this->Session->setFlash('Contact succesfully Added.');
             $this->redirect('index'); 
                
            
            
        }
        
    }
    function edit($id)
    {
        $this->loadModel('Key_contact');
        $k = $this->Key_contact->findById($id);
        $this->set('k',$k);
        if(isset($_POST['submit']))
        {
            $key_title = $_POST['key_title'];
            $key_company = $_POST['key_company'];
            $key_number = $_POST['key_number'];
            $key_name = $_POST['key_name'];
            $key_cell = $_POST['key_cell'];
            $key_email = $_POST['key_email'];
            $key_type = $_POST['type'];
            
            
              $key['title'] = $key_title;
              $key['company'] = $key_company;
              $key['phone'] = $key_number;
              $key['cell'] = $key_cell;
              $key['email'] = $key_email;
              $key['name'] = $key_name;
              $key['type'] = $key_type;
              //$key['job_id'] = $job_id;
              $this->Key_contact->id = $id;
              foreach($key as $k=>$v)
              {
                $this->Key_contact->saveField($k,$v);
              }
             $this->Session->setFlash('Contact succesfully edited.');
             $this->redirect('index'); 
                
            
            
        }
        
    }
    
    function delete($id)
    {
        $this->loadModel('Key_contact');
        if($this->Key_contact->delete($id))
            $this->Session->setFlash("Contact Successfully Deleted");
        else
            $this->Session->setFlash("Sorry Contact Couldnot Be Deleted.");
            
            
        $this->redirect('index');
            
            
            
        
    }
}