<?php
class ContactsController extends AppController
{
    public $name = 'contacts';
    var $components = array('Email');
    public function index($jid=-1)
    {
        //die('here');
        $this->set('select',$jid);
        $this->loadModel('Key_contact');
        $this->loadModel('Member');
        $this->loadModel('Job');

        if(!$this->Session->read('id'))
        $this->redirect('/dashboard');      
    
        if($this->Session->read('avatar'))
        {
            if($jid==-1)
            $this->paginate = array('order'=>array('job_id'),'limit'=>10);
            else
            if($jid==0)
            $this->paginate = array('conditions'=>'id NOT IN (SELECT key_id FROM job_contacts)','order'=>array('job_id'),'limit'=>10);
            else
            $this->paginate = array('conditions'=>'id IN (SELECT key_id FROM job_contacts WHERE job_id = '.$jid.')','order'=>array('job_id'),'limit'=>10);
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
        $this->set('jbs',$this->Job);
        
    }
    
    function upload()
    {
        $this->loadModel('Key_contact'); 
        $this->loadModel('Job_contact');
        
        if(isset($_POST['submit'])){
         $file = $_FILES['contacts']['tmp_name'];
         $no=0;
         $yes=0;
         $handle = fopen($file,"r");
       
        //loop through the csv file and insert into database
        do {
            if ($data[0]) {
                $key_title = $data[3];
                $key_company = $data[4];
                $key_number = $data[5];
                $key_name = $data[0];
                $key_cell = $data[2];
                $key_email = $data[1];
                $key_type = $data[6];
                $job_id = $data[7];
                
                $key['title'] = $key_title;
              $key['company'] = $key_company;
              $key['phone'] = $key_number;
              $key['cell'] = $key_cell;
              $key['email'] = $key_email;
              $key['name'] = $key_name;
              $key['type'] = $key_type;
              //if($this->Key_contact->find('first',array('conditions'=>array('email'=>$key['email'],'type'=>$key['type'],'name'=>$key['name'],'cell'=>$key['cell']))))
              if($this->Key_contact->find('first',array('conditions'=>array('email'=>$key['email']))))
              {
                $no++;
                              
             }
             else
             {
                $yes++;
                $this->Key_contact->create();
                $this->Key_contact->save($key);
                echo $k = $this->Key_contact->id;
                //die();
                if($job_id!="" || $job_id!='0')
                {
                    $job['job_id'] = $job_id;
                    $job['key_id'] = $k;
                    //$t = $this->Key_contact->findById($k);
                    $job['type'] = $key['type'];
                    //var_dump($job);die();
                    $this->Job_contact->create();
                    $this->Job_contact->save($job);
                    
                    
                }                
             }  
            }
        } while ($data = fgetcsv($handle,1000,",","'"));
        if($no !=0 && $yes!=0)
            $msg ="Contact succesfully Uploaded But Some Duplicate Record Found And Was Not Uploaded.";
        elseif($no==0&&$yes!=0)
        {
            $msg ="Contact succesfully Uploaded";
        }
        elseif($yes==0 && $no!=0)
        {
            $msg = "Duplicate Records Found And Was Not Uploaded";
        }
        else
        {
            $msg = "Sorry, No Contact Was Uploaded.";
        }
        $this->Session->setFlash($msg);
        $this->redirect('index'); 
        }
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
    function email()
    {
        $message= $_POST['msg'];
        $ema = str_replace(',',' ',$_POST['email']);
        $ema = trim($ema);
        $ema = str_replace(' ',',',$ema);
        $email = explode(',',$ema);
        foreach($email as $e){
        $emails = new CakeEmail();
                        $emails->from(array('noreply@veritas.com'=>'Veritas'));
                        
                        $emails->subject("Message from Admin.");
                        $emails->emailFormat('html');
                        
                            $message="Hi there,<br/><br/>You have received a new message from Veritas' admin.<br/><br/>Message:<br/>".$message;
						   
                        $emails->to($e);
                            $emails->send($message);
                            $emails->reset();
                            $message = "";
                            }
                            die('here');
    }
    
}