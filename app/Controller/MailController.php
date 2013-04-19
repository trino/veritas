<?php
class MailController extends AppController
{
    public $helpers = array('Html');
    var $components = array('Email');
    public $paginate = array(
        'limit' => 1,
        'order' => array('date'=>'desc')
    );
    function __construct(CakeRequest $request, CakeResponse $response)
    {
        parent::__construct($request,$response);
        $this->loadModel('Mail');
        $this->loadModel('User');
        $this->loadModel('Member');
         
    }
    
    function index()
    {
        if($this->Session->read('avatar'))
        {
            $this->paginate=array('conditions'=>array('recipients_id'=>'0','delete_for IN ("s","")'),'limit'=>1,'order'=>array('date'=>'desc'));
            $em= $this->paginate('Mail');
            $this->set('email',$em);
            
            //$this->set('email',$this->Mail->find('all',array('conditions'=>array('recipients_id'=>'0'))));
        }
        else
        {
            $this->paginate=array('conditions'=>array('recipients_id'=>$this->Session->read('id'),'delete_for IN("s","")'),'limit'=>1,'order'=>array('date'=>'desc'));
            $em= $this->paginate('Mail');
            $this->set('email',$em);
            //$this->set('email',$this->Mail->find('all',array('conditions'=>array('recipients_id'=>$this->Session->read('id')))));
        }
    }
    
    function read($id)
    {
        
    
       
        if($this->Session->read('avatar') || $this->Session->read('user'))
        {
            
        }
        else
        {
            $this->redirect('/admin');
        }
        if(isset($_POST['submit']))
        {
            $arr['recipients_id'] = $_POST['recipient_id'];
            $receiver = $_POST['recipient_email'];
            if($this->Session->read('avatar'))
            {
                $sender = 'admin';
                $sender_id = '0';
            }
            else if($this->Session->read('user'))
            {
                $sender = $this->Session->read('user');
                $sender_id = $this->Session->read('id');
            }
                $arr['sender'] = $sender;
                $arr['subject'] = $_POST['subject'];
                $arr['message'] = $_POST['reply'];
                $arr['sender_id'] = $sender_id;
                $arr['status'] = 'unread';
                $arr['date'] = date('Y-m-d');
                $arr['parent'] = $_POST['mail_id'];
                $this->Mail->create();
                $this->Mail->save($arr);
                $this->Email->from    = $this->Session->read('email');
                $this->Email->to = $receiver;
                $this->Email->subject = $_POST['subject'];
                $message="You have recieved an email from ".$sender." on Strike Website. Please Login to see the message";
                $this->Email->send($message);
        }
        $data = $this->Mail->find('first',array('conditions'=>array('id'=>$id)));
        $u_id=$data['Mail']['sender_id'];
        if($u_id=='0')
        {
            $em=$this->User->find('first');
            $sender = $em['User']['email'];
            $name = 'Admin';
        }
        else
        {
            $em=$this->Member->find('first',array('conditions'=>array('id'=>$u_id)));
            $sender = $em['Member']['email'];
            $name = $em['Member']['full_name'];
        }
        $this->set('email',$data);
        $this->set('name',$name);
        $this->set('sender',$sender);
        $p_id=$data['Mail']['parent'];
        if($p_id=="0")
        {
            $this->set('reply',$this->Mail->find('all',array('conditions'=>array('parent'=>$id))));
        }
        else
        {
            $this->set('reply',$this->Mail->find('all',array('conditions'=>array('id'=>$p_id))));
        }
        
        $this->set('member',$this->Member->find('all'));
        $this->Mail->id=$id;
        $this->Mail->saveField('status','read');
    }
    
    public function sent_mail()
    {
        
        if($this->Session->read('avatar'))
        {
            $this->paginate=array('conditions'=>array('sender_id'=>'0','delete_for IN("r","")'),'limit'=>1,'order'=>array('date'=>'desc'));
            $this->set('email',$this->paginate('Mail'));
        }
        else
        {
            $this->paginate=array('conditions'=>array('sender_id'=>$this->Session->read('id'),'delete_for IN ("r","")'),'limit'=>1,'order'=>array('date'=>'desc'));
            $this->set('email',$this->paginate('Mail'));
        }   
    }
    
    public function delete_mail($type,$id)
    {
            $d=$this->Mail->find('first',array('conditions'=>array('id'=>$id)));
            $de=$d['Mail']['delete_for'];
            if($de=="")
            {
                if($type=='sender')
                {
                    $delete_for = 's';
                }
                else
                {
                    $delete_for = 'r';
                }
            }
            else
            {
                $delete_for = "both";
            }
            $this->Mail->id = $id;
            $this->Mail->saveField('delete_for',$delete_for);
            $this->Session->setFlash('Email Deleted Successfully');
            $this->redirect('index');
        
    }
}