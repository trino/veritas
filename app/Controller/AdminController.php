<?php

App::uses('AppController', 'Controller');

class AdminController extends AppController {

/**
 * Controller name
 */
	public $name = 'Home';
    
    
    public function beforeFilter()
    {
       
    }
	public function index() {
	    if($this->Session->read('email'))
        $this->redirect('/dashboard');
	   $this->loadModel('User');
       $this->loadModel('Member');
	   if(isset($_POST['submit']))
       {
        $un = $_POST['un'];
        $pw = $_POST['pw'];
        $q = $this->User->find('first',array('conditions'=>array('email'=>$un,'password'=>$pw)));
        $qu = $this->Member->find('first',array('conditions'=>array('email'=>$un,'password'=>$pw)));
        if($q)
        {
            $this->Session->write(array('avatar'=>$q['User']['name_avatar'],'email'=>$q['User']['email'],'image'=>$q['User']['picture'],'id'=>$q['User']['id'],'view'=>'1'));
            $this->redirect('/dashboard');
        }
        else if($qu)
        {
                $this->Session->write(array('user'=>$qu['Member']['full_name'],'email'=>$qu['Member']['email'],'image'=>$qu['Member']['image'],'id'=>$qu['Member']['id'],'upload'=>$qu['Member']['canUpdate'],'view'=>$qu['Member']['canView']));
                if($qu['Member']['canView']=="1" && $qu['Member']['canUpdate']=="0")
                    $this->Session->write(array('see'=>'1'));
                $this->redirect('/dashboard');
        }
        else
        {
            $this->Session->setFlash('Username and Password does not match');
        }
        
       }
	}
    
    function logout()
    {
        $this->Session->destroy();
        $this->redirect('/admin');
    }
    
    function email_status()
    {
        $this->loadModel('Mail');
        if($this->Session->read('avatar'))
        {
            echo $this->Mail->find('count',array('conditions'=>array('recipients_id'=>'0','status'=>'unread','delete_for IN ("s","")')));
            die();
        }
        else
        {
            echo $this->Mail->find('count',array('conditions'=>array('recipients_id'=>$this->Session->read('id'),'status'=>'unread','delete_for IN ("s","")')));
            die();
        }
    }
    
    
    
    
}
