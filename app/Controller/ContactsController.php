<?php
class ContactsController extends AppController
{
    public $name = 'contacts';
    var $components = array('Email');
    public function index($jid=-1,$type=-1)
    {
        
        $this->set('select',$jid);
        $this->set('type',$type);
        $this->loadModel('Key_contact');
        $this->loadModel('Member');
        $this->loadModel('Job');

        if(!$this->Session->read('id'))
        $this->redirect('/dashboard');      
    
        if($this->Session->read('avatar'))
        {
            if($jid==-1 && $type==-1)
            $this->paginate = array('order'=>array('job_id'),'limit'=>10);
            else
            if($jid!=-1 && $type==-1)
            {
                if($jid==0)
                $this->paginate = array('conditions'=>array('id NOT IN (SELECT key_id FROM job_contacts)'),'order'=>array('job_id'),'limit'=>10);
                else
                $this->paginate = array('conditions'=>array('id IN (SELECT key_id FROM job_contacts WHERE job_id = '.$jid.')'),'order'=>array('job_id'),'limit'=>10);
            }
            else
            if($type!=-1 && $jid==-1)
                {
                    $this->paginate = array('conditions'=>array('type'=>$type),'order'=>array('job_id'),'limit'=>10);
                }
                else
                if($jid == 0)
                $this->paginate = array('conditions'=>array('id NOT IN (SELECT key_id FROM job_contacts)','type'=>$type),'order'=>array('job_id'),'limit'=>10);
                else
                $this->paginate = array('conditions'=>array('id IN (SELECT key_id FROM job_contacts WHERE job_id = '.$jid.')','type'=>$type),'order'=>array('job_id'),'limit'=>10);
            
            $docs = $this->paginate('Key_contact');
            //$docs = $this->Document->find('all',array('conditions'=>array('title LIKE'=>'%'.$search.'%')));
        }
        else
        {
            $this->loadModel('Jobmember');
            
            
            
            /* to list employee Starts*/
            
            $emp = $this->Jobmember->find('first',array('conditions'=>array('member_id'=>$this->Session->read('id'))));
            $job = $emp['Jobmember']['job_id'];
            if($job)
            {
            $job_arr = explode(',',$job);            
                if(count($job_arr)==1)
                {
                    $j_employee = $this->Jobmember->find('all',array('conditions'=>array('(job_id LIKE "'.$job_arr[0].'" OR job_id LIKE "'.$job_arr[0].',%" OR job_id LIKE "%,'.$job_id.',%" OR job_id LIKE "%,'.$job_id.'")')));
                }
                else
                {
                    for($i=0;$i<count($job_arr);$i++)
                    {
                        if($i==0)
                        $cond = '(job_id LIKE "'.$job_arr[0].'" OR job_id LIKE "'.$job_arr[0].',%" OR job_id LIKE "%,'.$job_arr[0].',%" OR job_id LIKE "%,'.$job_arr[0].'"';
                        else
                        $cond = $cond.' OR job_id LIKE "'.$job_arr[$i].'" OR job_id LIKE "'.$job_arr[$i].',%" OR job_id LIKE "%,'.$job_arr[$i].',%" OR job_id LIKE "%,'.$job_arr[$i].'"';    
                        
                    }
                    $cond = $cond.')';
                    $j_employee = $this->Jobmember->find('all',array('conditions'=>array($cond)));
                }
                $mid = '';
                if($j_employee)
                foreach($j_employee as $je)
                {
                    if($mid == '')
                    $mid = $je['Jobmember']['member_id'];
                    else
                    $mid = $mid.','.$je['Jobmember']['member_id'];
                }
                if($mid)
                $mid = '('.$mid.')';
                else
                $mid = '(99999999999999)';
                $final_emp = $this->Member->find('all',array('conditions'=>array('id IN '.$mid)));
                $this->set('employee',$final_emp);
            }
            else
            $this->set('employee',null);
            
                            
            /* to list employee Ends*/
            
            
            
            $job_ids = $this->Jobmember->find('first',array('conditions'=>array('member_id'=>$this->Session->read('id'))));
            if($job_ids)
                $jid =$job_ids['Jobmember']['job_id'];
            else
                $jid = '';
            if($jid)
                $jid = '('.$jid.')';
            else
                $jid = '('.'99999999999'.')';
            $this->loadModel('Job_contact');
            $jc = $this->Job_contact->find('all',array('conditions'=>array('job_id IN'.$jid)));
            $idd = '';
            foreach($jc as $jjc)
            {
                if($idd=='')
                $idd = $jjc['Job_contact']['key_id'];
                else
                $idd = $idd.','.$jjc['Job_contact']['key_id'];
            } 
            if($idd)
            $idd = '('.$idd.')';
            else
            $idd = '('.'99999999999'.')';
            
                //echo 2;die();
            $this->paginate = array('conditions'=>array('id IN'.$idd),'limit'=>10);
            
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
                $key_title = $data[1];
                $key_company = $data[2];
                $key_number = $data[6];
                $key_name = $data[0];
                $key_cell = $data[4];
                $key_cellular = $data[5];
                $key_email = $data[3];
                $key_type = $data[7];
                $job_id = $data[8];
                
                $key['title'] = $key_title;
              $key['company'] = $key_company;
              $key['phone'] = $key_number;
              $key['cell'] = $key_cell;
              $key['cellular_provider'] = $key_cellular;
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
                if($key['title']!='Title')
                $this->Key_contact->save($key);
                $k = $this->Key_contact->id;
                //die();
                if($job_id!="" && $job_id!='0')
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
            $msg ="Success! But there were duplicates, they were not uploaded.";
        elseif($no==0&&$yes!=0)
        {
            $msg ="Contact successfully uploaded.";
        }
        elseif($yes==0 && $no!=0)
        {
            $msg = "Duplicate records found and was not uploaded.";
        }
        else
        {
            $msg = "Failed to upload contacts!";
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
            $key_cellular = $_POST['key_cellular'];
            $key_type = $_POST['type'];
            
            
              $key['title'] = $key_title;
              $key['company'] = $key_company;
              $key['phone'] = $key_number;
              $key['cell'] = $key_cell;
              $key['email'] = $key_email;
              $key['name'] = $key_name;
              $key['type'] = $key_type;
              $key['cellular_provider'] = $key_cellular;
              //$key['job_id'] = $job_id;
              $this->Key_contact->create();
              $this->Key_contact->save($key);
             $this->Session->setFlash('Data Saved Successfully.');
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
            $key_cellular = $_POST['key_cellular'];
            $key_type = $_POST['type'];
            
            
              $key['title'] = $key_title;
              $key['company'] = $key_company;
              $key['phone'] = $key_number;
              $key['cell'] = $key_cell;
              $key['email'] = $key_email;
              $key['name'] = $key_name;
              $key['type'] = $key_type;
              $key['cellular_provider'] = $key_cellular;
              
              $this->Key_contact->id = $id;
              $this->Key_contact->save($key);

             $this->Session->setFlash('Edit Successful.');
             $this->redirect('index'); 
                

            
        }
        
    }
    
    function delete($id)
    {
        $this->loadModel('Key_contact');
        if($this->Key_contact->delete($id)){
            $this->loadModel('Job_contact');
            $q = $this->Job_contact->find('all',array('conditions'=>array('key_id'=>$id)));
            if($q)
            {
                foreach($q as $a)
                {
                    $this->Job_contact->delete($a['Job_contact']['id']);
                }
            }
            $this->Session->setFlash("Contact successfully deleted.");
            }
        else
            $this->Session->setFlash("Could not delete contact.");           
            
        $this->redirect('index');                  
            
        
    }
    function email()
    {
        $msg= $_POST['msg'];
        $ema = str_replace(',',' ',$_POST['email']);
        $ema = trim($ema);
        $ema = str_replace(' ',',',$ema);
        $email = explode(',',$ema);
        foreach($email as $e){
        $emails = new CakeEmail();
                        $emails->from(array('noreply@veritas.com'=>'Veritas'));
                        
                        $emails->subject("Veritas - New Message");
                        $emails->emailFormat('html');
                        
                            $message="You have received a new message from Veritas. Please see below:<br/><br/>".$msg;
						   
                        $emails->to($e);
                            $emails->send($message);
                            $emails->reset();
                            $message = "";
                            $this->Session->setFlash('Email Sent Successfully.');
                            }
                            die();
    }
    function sms()
    {
        $this->loadModel('Key_contact');
        $message= $_POST['msg'];
        $ema = str_replace(',',' ',$_POST['email']);
        $ema = trim($ema);
        $ema = str_replace(' ',',',$ema);
        $email = explode(',',$ema);
        foreach($email as $e){
        $emails = new CakeEmail();
                        $emails->from(array('reply@veritas.com'=>'Veritas'));
                        
                        $emails->subject("Veritas - Message");
                        $emails->emailFormat('html');
                        
                            
						$q = $this->Key_contact->find('first',array('conditions'=>array('email'=>$e)));
                        $carrier = $this->generate_carrier($q['Key_contact']['cellular_provider']);
                        if($carrier){   
                            $emails->to($q['Key_contact']['cell'].$carrier);
                            //echo $q['Key_contact']['cell'].$carrier;die();
                            $emails->send($message);
                            $emails->reset();
                            $message = "";
                            $this->Session->setFlash('SMS Text Message Sent Successfully.');
                            }
							else
							{
							    $this->Session->setFlash('Failed to send SMS Text Message. Could not locate carrier');

							}
                            }
                            die();
    }
    function generate_carrier($c)
    {
	
	
	






































        if(strtolower($c)=='at&t')
        return '@txt.att.net';
        else
        if(strtolower($c)=='boost mobile')
        return '@myboostmobile.com';
        else
        if(strtolower($c)=='sprint')
        return '@messaging.sprintpcs.com';
        else
        if(strtolower($c)=='t-mobile')
        return '@tmomail.net';
        else
        if(strtolower($c)=='us cellular')
        return '@email.uscc.net';
        else
        if(strtolower($c)=='verizon')
        return '@vtext.com';
        else
        if(strtolower($c)=='virgin mobile')
        return '@vmobl.com';
        else
        if(strtolower($c)=='bell')
        return '@txt.bell.ca';
        else
        if(strtolower($c)=='fido')
        return '@sms.fido.ca';
        else
        if(strtolower($c)=='koodo mobile')
        return '@msg.telus.com';
        else
        if(strtolower($c)=='rogers')
        return '@pcs.rogers.com';
        else
        if(strtolower($c)=='telus mobility')
        return '@msg.telus.com';
		else
        if(strtolower($c)=='wind mobile')
        return '@txt.windmobile.ca';
        else
        return '';
        
    }
    public function getJobByKid($id)
    {
        $this->loadModel('Job_contact');
        $q = $this->Job_contact->find('first',array('conditions'=>array('key_id'=>$id)));
        if($q['Job_contact']['job_id'] == 0)
        return 'empty';
        else
        {
            $this->loadModel('Job');
            $q1 = $this->Job->findById($q['Job_contact']['job_id']);
            if($q1)
            return $q1['Job']['title'];
            else
            return 'empty';
        }
    }
    public function getJobByMember($id)
    {
        $this->loadModel('Jobmember');
        $q = $this->Jobmember->find('first',array('conditions'=>array('member_id'=>$id)));
        $j = $q['Jobmember']['job_id'];
            if($j)
            {
                $job_arr = explode(',',$j);
                $jo = '';
                foreach($job_arr as $job)
                {
                    $this->loadModel('Job');
                    $q1 = $this->Job->findById($job);
                    if($jo == '')
                    $jo = ucfirst($q1['Job']['title']);
                    else
                    $jo = $jo.', '.ucfirst($q1['Job']['title']);
                }
                return $jo;
            } 
            else
            return 'empty';
        
    }
    
}