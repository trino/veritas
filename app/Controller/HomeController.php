<?php

App::uses('AppController', 'Controller');

class HomeController extends AppController {

/**
 * Controller name
 */
	public $name = 'Home';
    
    
    public function beforeFilter()
    {
       
    }
	public function index() {
	$this->layout = 'login';
	    if($this->Session->read('id'))
        {
        if(isset($_GET['mail']))    
        $this->redirect('/dashboard/?mail='.$_GET['mail']);
        else
        if(isset($_GET['upload']))
        $this->redirect('/dashboard/?upload='.$_GET['upload']);
        else
        if(isset($_GET['upload_s']))
        $this->redirect('/dashboard/?upload_s='.$_GET['upload_s']);
        else
        $this->redirect('/dashboard');
        }
        
	   $this->loadModel('User');
       $this->loadModel('Event_log');
       $this->loadModel('Member');
	   if(isset($_POST['submit']))
       {
        $un = $_POST['un'];
        $pw = $_POST['pw'];
        if($query = $this->Member->find('first',array('conditions'=>array('email'=>$un,'password <>'=>$pw))))
        {
            
            $log['date'] =  date('Y-m-d H:i:s');
            $log['time'] =  date('H:i:s');
            $log['fullname'] = $query['Member']['full_name'];
            $log['username'] = $un;
            $log['member_id'] = $query['Member']['id'];
            $log['document_id'] = 0;
            $log['event_type'] = "User Login";
            $log['event'] = "Login Failed: Invalid Password";
            $this->Event_log->create();
            $this->Event_log->save($log); 
        }
            
        
        
        //$q = $this->User->find('first',array('conditions'=>array('email'=>$un,'password'=>$pw)));
        $qu = $this->Member->find('first',array('conditions'=>array('email'=>$un,'password'=>$pw)));
        /*if($q)
        {
            $this->Session->write(array('avatar'=>$q['User']['name_avatar'],'email'=>$q['User']['email'],'image'=>$q['User']['picture'],'id'=>$q['User']['id'],'view'=>'1'));
            $this->redirect('/dashboard');
        }
        else */
        if($qu)
        {
                
                $this->Session->write(array('user'=>$qu['Member']['full_name'],'email'=>$qu['Member']['email'],'image'=>$qu['Member']['image'],'id'=>$qu['Member']['id'],'upload'=>$qu['Member']['canUpdate'],'view'=>$qu['Member']['canView'],'canEmail'=>$qu['Member']['canEmail']));
                $log['date'] =  date('Y-m-d H:i:s');
                $log['time'] =  date('H:i:s');
                $log['fullname'] = $qu['Member']['full_name'];
                $log['username'] = $un;
                $log['member_id'] = $qu['Member']['id'];
                $log['document_id'] = 0;
                $log['event_type'] = "User Login";
                $log['event'] = "Login SuccessFull";
                $this->Event_log->create();
                $this->Event_log->save($log); 
                if(isset($_GET['mail']))
            $this->redirect('/mail/read/'.$_GET['mail']);
            else
            $this->redirect('/');
        }
        else
        {
           if(!isset($log))
           {        
            $log['date'] =  date('Y-m-d H:i:s');
            $log['time'] =  date('H:i:s');
            $log['fullname'] = "";
            $log['username'] = "Anonymous User";
            $log['member_id'] = -100;
            $log['document_id'] = 0;
            $log['event_type'] = "User Login";
            $log['event'] = "Login Failed: Invalid Username or Password";
            $this->Event_log->create();
            $this->Event_log->save($log);
            }
        
            $this->Session->setFlash('Username and Password do not match');
            if(isset($_GET['mail']))
            $this->redirect('/?mail='.$_GET['mail']);
            else
            $this->redirect('/');
        }
        
       }
	}
    
    function logout()
    {
        $this->loadModel('Event_log');
        
        if($this->Session->read('user'))
        {
            $log['date'] =  date('Y-m-d H:i:s');
            $log['time'] =  date('H:i:s');
            $log['fullname'] = $this->Session->read('user');
            $log['username'] = $this->Session->read('email');
            $log['member_id'] = $this->Session->read('id');
            $log['document_id'] = 0;
            $log['event_type'] = "LogOut";
            $log['event'] = "LogOut SuccessFull";
            $this->Event_log->create();
            $this->Event_log->save($log);
        }
        $this->Session->destroy();
          
        $this->redirect('/');
    }
    
    function email_status()
    {
        $this->loadModel('Mail');
        if($this->Session->read('avatar'))
        {
            echo $this->Mail->find('count',array('conditions'=>array('recipients_id'=>'0','status'=>'unread')));
            die();
        }
        else
        {
            echo $this->Mail->find('count',array('conditions'=>array('recipients_id'=>$this->Session->read('id'),'status'=>'unread')));
            die();
        }
    }
    
    
    
    
}
