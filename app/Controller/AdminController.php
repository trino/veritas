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
	   
 	  
       
	    if($this->Session->read('admin'))
            $this->redirect('/dashboard');
	   $this->loadModel('User');
       $this->loadModel('Member');
       $this->loadModel('Jobmember');
       $this->loadModel('Event_log');
	   if(isset($_POST['submit']))
       {
        
        $un = $_POST['un'];
        $pw = md5($_POST['pw']);
        $q = $this->User->find('first',array('conditions'=>array('OR'=>array(array('email'=>$un),array('name_avatar'=>$un)),'password'=>$pw)));
        $qu = $this->Member->find('first',array('conditions'=>array('OR'=>array(array('email'=>$un),array('full_name'=>$un)),'password'=>$pw)));
        
        
        if($q)
        {
            
            $this->loadModel('Logo');
            $logo = $this->Logo->find('first');
            if($logo)
            {
                if($logo['Logo']['afimac'] == 1)
                {
                    $this->Session->write('logo','afimaclogo.png');
                }
                else
                if($logo['Logo']['asap'] == 1)
                {
                    $this->Session->write('logo','asap.gif');
                }
                else
                $this->Session->write('logo','afimaclogo.png');
            }
            else
            $this->Session->write('logo','afimaclogo.png'); 
            $this->Session->write(array('is_client'=>'1','username'=>'admin','admin'=>1,'avatar'=>$q['User']['name_avatar'],'email'=>$q['User']['email'],'image'=>$q['User']['picture'],'id'=>$q['User']['id'],'view'=>'1','FMember'=>$q['User']['from_member'],'approve'=>$q['User']['approve']));
            
            
            if(isset($_GET['mail']))
            $this->redirect('/mail/read/'.$_GET['mail']);
            else
            if(isset($_GET['upload']))
            $this->redirect('/uploads/view_detail/'.$_GET['upload']);
            else
            $this->redirect('/dashboard');
        }
        else if($qu)
        {
		$quu = $this->User->find('first',array('conditions'=>array('from_member'=>0)));
            $this->loadModel('Logo');
            $logo = $this->Logo->find('first');
            if($logo)
            {
                if($logo['Logo']['afimac'] == 1)
                {
                    $this->Session->write('logo','afimaclogo.png');
                }
                else
                if($logo['Logo']['asap'] == 1)
                {
                    $this->Session->write('logo','asap.gif');
                }
                else
                    $this->Session->write('logo','afimaclogo.png');
            }
            else
                $this->Session->write('logo','afimaclogo.png'); 
                $this->Session->write('approve',$quu['User']['approve']);
                $this->Session->write(array('is_client'=>$qu['Member']['is_client'],'user'=>$qu['Member']['full_name'],'username'=>$qu['Member']['full_name'],'email'=>$qu['Member']['email'],'image'=>$qu['Member']['image'],'id'=>$qu['Member']['id'],'FMember'=>'0','upload'=>$qu['Member']['canUpdate'],'canEmail'=>$qu['Member']['canEmail'],'see'=>$qu['Member']['canView'],'view'=>$qu['Member']['canView']));
                
                $jobs = $this->Jobmember->find('first',array('conditions'=>array('member_id'=>$this->Session->read('id'))));
                
                //var_dump($jobs);
                $job_id = 'all';
                if($jobs)
                {
                    $job_ids = $jobs['Jobmember']['job_id'];
                    if(str_replace(',','',$job_ids)==$job_ids)
                    {
                        $job_id=$job_ids;
                        $this->loadModel('Job');
                        $jj = $this->Job->findById($job_ids);
                        if($jj['Job']['is_special']==1)
                        {
                            $this->Session->write('special',1);
                        }
                    }
                    else
                    $job_id = 'all';
                    
                }
                if($qu['Member']['canView']=="1" && $qu['Member']['canUpdate']=="0")
                    $this->Session->write(array('see'=>'1'));
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
            if(isset($_GET['upload'])){
            
            $this->redirect('/uploads/view_detail/'.$_GET['upload']);
            }                
            else
                if($job_id && $job_id !='all')
                {
                    $this->Session->write('job_id',$job_id);
                    $this->redirect('/jobs/view/'.$job_id);
                }
                else
                if($job_id == 'all')
                {
                    $this->Session->write('job_id',$job_id);
                    $this->redirect('/jobs');
                }
            else
                $this->redirect('/dashboard');
        }
        elseif($query = $this->Member->find('first',array('conditions'=>array('OR'=>array(array('email'=>$un),array('full_name'=>$un)),'password <>'=>$pw))))
        {
            //die('3');
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
            $this->Session->setFlash('Username and Password does not match');
            
            if(isset($_GET['mail']))
            $this->redirect('/?mail='.$_GET['mail']);
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
                $log['username'] = $un;
                $log['member_id'] = -100;
                $log['document_id'] = 0;
                $log['event_type'] = "User Login";
                $log['event'] = "Login Failed: Invalid Username or Password";
                $this->Event_log->create();
                $this->Event_log->save($log);
            }
            $this->Session->setFlash('Username and Password does not match');
//            if($_SERVER['SERVER_NAME'])
            if(isset($_GET['mail']))
            {
            
            $this->redirect('/?mail='.$_GET['mail']);
            }
            else
            $this->redirect('/');
        }
        
       }
       else
            {
            if(isset($_GET['mail']))
            $this->redirect('/?mail='.$_GET['mail']);
            else
            $this->redirect('/');
            }
	}
    
    function logout()
    {
        $this->Session->destroy();     
        $this->redirect('/');
    }
    
    function email_status()
    {
        $this->loadModel('Mailread');
        $user = 0;
        if(!$this->Session->read('admin'))
        $user = $this->Session->read('id');
        else
        if($this->Session->read('FMember')!=0)
        $user = $this->Session->read('FMember'); //FMEMBER ARE THOSE ADMIN SELECTED BY ADMIN AMONG USERS
        echo $c = $this->Mailread->find('count',array('conditions'=>array('user'=>$user,'status'=>0,'parent <>'=>0)));
        die();/*
        $this->loadModel('Mail');
        if($this->Session->read('avatar'))
        {
            $recc = 0;
            echo $this->Mail->find('count',array('conditions'=>array('OR'=>array(array('recipients_id LIKE'=>$recc.',%'),array('recipients_id LIKE'=>'%,'.$recc.',%'),array('recipients_id LIKE'=>'%,'.$recc),array('recipients_id'=>$recc)),'status'=>'unread','delete_for IN ("s","")')));
            die();
        }
        else
        {
            $recc = $this->Session->read('id');
            echo $this->Mail->find('count',array('conditions'=>array('OR'=>array(array('recipients_id LIKE'=>$recc.',%'),array('recipients_id LIKE'=>'%,'.$recc.',%'),array('recipients_id LIKE'=>'%,'.$recc),array('recipients_id'=>$recc)),'status'=>'unread','delete_for IN ("s","")')));
            die();
        }*/
    }
    
    
    
    
}
