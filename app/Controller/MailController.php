<?php
class MailController extends AppController
{
    public $helpers = array('Html');
    var $components = array('Email');
    public $paginate = array(
        'limit' => 15,
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
        $this->set('mails',$this->Mail);
        $this->set('mems',$this->Member);
        if($this->Session->read('avatar'))
        {
            $this->paginate=array('conditions'=>array('recipients_id'=>'0','delete_for IN ("s","")'),'limit'=>15,'order'=>array('date'=>'desc'));
            $em= $this->paginate('Mail');
            $this->set('email',$em);
            
            //$this->set('email',$this->Mail->find('all',array('conditions'=>array('recipients_id'=>'0'))));
        }
        else
        {
            $arr = array();
            $test = $this->Mail->find('all',array('conditions'=>array('recipients_id'=>$this->Session->read('id'),'parent <>'=>0)));
            foreach($test as $t)
            {
                if(!in_array($t['Mail']['parent'],$arr))
                $arr[] = $t['Mail']['parent'];
            }
            $str = '(0,';
            $k = 0;
            
            foreach($arr as $a)
            {
                
                $str = $str.$a.',';
                 
            }
            $str = str_replace(',',' ',$str);
            $str = trim($str);
            $str = str_replace(' ',',',$str).')';
            $this->paginate=array('conditions'=>array('OR'=>array('AND'=>array('parent'=>0,'recipients_id'=>$this->Session->read('id'),'delete_for IN("s","")'),'id IN'.$str)),'limit'=>15,'order'=>array('date'=>'desc'));
            $em= $this->paginate('Mail');
            $this->set('email',$em);
            //$this->set('email',$this->Mail->find('all',array('conditions'=>array('recipients_id'=>$this->Session->read('id')))));
        }
        $cnt = $this->Mail;
        $this->set('count',$cnt);
    }
    
    function read($id)
    {
        
    
        $this->set('mailing',$this->Mail);
        if($this->Session->read('avatar') || $this->Session->read('user'))
        {
            
        }
        else
        {
            $this->redirect('/admin');
        }
        if(isset($_POST['submit']))
        {
            $check=0;
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
                $arr['date'] = date('Y-m-d H:i:s');
                $arr['parent'] = $_POST['mail_id'];
                
                $this->Mail->create();
                $this->Mail->save($arr);
                $this->set('success','You have replied to this message.');
                $emails = new CakeEmail();
                $emails->from(array('noreply@strike.com'=>'Strike Management'));
            
                $emails->emailFormat('html');
                $emails->to($receiver);
                $emails->subject($_POST['subject']);
                $base_url = 'http://'.$_SERVER['SERVER_NAME'];
                if($_SERVER['SERVER_NAME'] == 'localhost')
                $base_url = 'http://'.$_SERVER['SERVER_NAME'].'/veritas';
                $message="You have recieved an email from ".$sender." on Strike Website. <br/><a href='".$base_url."'>Check your message, click here</a><br/>
                <p>
                <b>Subject : </b>".$arr['subject']."<br/>
                <b>Message : </b>".$arr['message']."
                </p>
                ";
                if($receiver){
                $ch_id = $_POST['recipient_id'];
                if($ch_id!=0)
                {
                    $test = $this->Member->findById($ch_id);
                    if($test)
                    {
                        if($test['Member']['receive1']==1 || $test['Member']['receive2']==1)
                        {
                            $check=1;
                        }
                        else
                        $check=0;
                    }
                }
                else
                $check =1;   
                if($check==1)
                $emails->send($message);
                }
        }
        $data = $this->Mail->find('first',array('conditions'=>array('id'=>$id)));
        $par = $data['Mail']['parent'];
        $subj = $data['Mail']['subject'];
        $this->set('subj',$subj);
        if($par != 0)
        $all = $this->Mail->find('all',array('conditions'=>array('OR'=>array('id'=>$par,'parent'=>$par)),'order'=>'id ASC'));
        else
        $all = $this->Mail->find('all',array('conditions'=>array('OR'=>array('id'=>$id,'parent'=>$id)),'order'=>'id ASC'));
        
        $this->set('all',$all);
        $this->set('member',$this->Member);
        $this->set('user',$this->User);
        
        $this->Mail->id=$id;
        
        if($this->Session->read('admin'))
        $rece = 0;
        else
        $rece = $this->Session->read('id');
        $pare = $this->Mail->find('all',array('conditions'=>array('OR'=>array('id'=>$id,'parent'=>$id),'recipients_id'=>$rece)));
        foreach($pare as $p)
        {
        unset($this->Mail->id);
        $this->Mail->id = $p['Mail']['id'];
        $this->Mail->saveField('status','read');
        }
        
        
        
        
        
        /*
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
        
        //$this->set('member',$this->Member->find('all'));*/
        
    }
    
    public function sent_mail()
    {
        $this->set('mems',$this->Member);
        if($this->Session->read('avatar'))
        {
            $this->paginate=array('conditions'=>array('sender_id'=>'0','delete_for IN("r","")'),'limit'=>15,'order'=>array('date'=>'desc'));
            $this->set('email',$this->paginate('Mail'));
        }
        else
        {
            $this->paginate=array('conditions'=>array('sender_id'=>$this->Session->read('id'),'delete_for IN ("r","")'),'limit'=>15,'order'=>array('date'=>'desc'));
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
    public function send()
    {
        $check=0;
        $return = urldecode($_GET['return']);
        $return = str_replace('/',' ',$return);
        $return = trim($return);
        $return = '/'.str_replace(' ','/',$return);
        if(isset($_POST['submit']))
        {
            $r = $_POST['recipients'];
            $id = $_POST['receipient_id'];
            if(str_replace(',','',$r) != $r)
            {
                $arr = explode(',',$r);
                
                for($i=1;$i<count($arr);$i++)
                {
                    if(trim($arr[$i])!='')
                    $a[$i-1] = trim($arr[$i]);
                }
            }
            if(str_replace(',','',$id) != $id)
            {
                $d = explode(',',$id);
            }
            $att = $_POST['response'];
            if($att){
            $att_arr = explode(',',$att);
            
            for($j=0;$j<count($att_arr);$j++)
            {
                if(trim($att_arr[$j]) != '')
                $arr_att[] = trim($path.$att_arr[$j]);
            }
            //var_dump($arr_att);die();
            
            }
            else
            $arr_att = false;
            
            
            /*die();
            $this->Email->to = rtrim($_POST['recipients']);
            if(isset($a))
            $this->Email->cc = $a;
            /*if(isset($arr))
            $this->Email->to      = trim($arr[0]);
            else
            
            */
            /*if($arr_att){
               
            $this->Email->attachments = $arr_att;
            }*/
            if($this->Session->read('avatar'))
            {
                $sender_id = '0';
                $sender= 'Admin';
            }
            else
            {
                $sender_id = $this->Session->read('id');
                $na= $this->Member->find('first',array('conditions'=>array('id'=>$sender_id)));
                $sender = $na['Member']['full_name'];
            }
            for($i=0;$i<sizeof($d)-1;$i++)
            {
                $data['sender_id'] = $sender_id;
                $data['sender'] = $sender;
                $data['recipients_id'] = $d[$i];
                $data['subject'] = $_POST['subject'];
                $data['message'] = $_POST['message'];
                $data['attachment'] = $_POST['attachments'];
                $data['status'] = 'unread';
                $data['date'] = date('Y-m-d H:i:s');
                $this->Mail->create();
                $this->Mail->save($data); 
            }
            
            for($i=0;$i<sizeof($arr)-1;$i++)
            {
                $emails = new CakeEmail();
            //$emails->from($this->Session->read('email'));
            
            $to = trim($arr[$i]);
            //die();
            $emails->from(array('noreply@strike.com'=>'Strike Management'));
            $emails->to($to);
            $emails->subject($_POST['subject']);
            $emails->emailFormat('html');
            $base_url = 'http://'.$_SERVER['SERVER_NAME'];
            if($_SERVER['SERVER_NAME'] == 'localhost')
            $base_url = 'http://'.$_SERVER['SERVER_NAME'].'/veritas';
            $message="You have recieved an email from ".$sender." on Strike Website. <br/><a href='".$base_url."'>Check your message, click here</a><br/>
                <p>
                <b>Subject : </b>".$_POST['subject']."<br/>
                <b>Message : </b>".$data['message']."
                </p>
                ";           
            if($to){
                $checks = $this->Member->find('first',array('conditions'=>array('email'=>$to)));
                if($checks)
                {
                    if($checks['Member']['receive1']==1 || $checks['Member']['receive2']==1)
                    $check = 1;
                    else
                    $check =0;
                }
                else
                $check =1;
                
                if($check == 1)
                $emails->send($message);
                }
            $emails->reset();
            $this->Session->setFlash('Email Send Successfully.');
            
            }
            $this->redirect(str_replace('veritas/','',$return));
            
        }
    }
    public function replyall()
    {
        $check=0;
        
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
                $arr['date'] = date('Y-m-d H:i:s');
                $arr['parent'] = $_POST['mail_id'];
                $par = $this->Mail->find('first',array('conditions'=>array('id'=>$arr['parent'])));
                $q = $this->Mail->find('all',array('conditions'=>array('OR'=>array(array('parent'=>$arr['parent']),array('id'=>$arr['parent']),array('sender'=>$par['Mail']['sender'],'subject'=>$par['Mail']['subject'],'message'=>$par['Mail']['message'],'date'=>$par['Mail']['date'],'parent'=>0)))));
                foreach($q as $qs)
                {
                    $arrays[] = $qs['Mail']['recipients_id'];
                    $arrays[] = $qs['Mail']['sender_id'];
                }
                if(isset($arrays))
                {
                    $i = 0;
                    foreach($arrays as $ar)
                    {
                        if($i == 0)
                        $arr_final[] = $ar;
                        else
                        if(!in_array($ar,$arr_final))
                        $arr_final[] = $ar;
                        $i++; 
                    }
                }
                //var_dump($arr_final);die();
                if(isset($arr_final))
                {
                foreach($arr_final as $af){    
                //$arr['recipients_id'] = $_POST['recipient_id'];
                if($af != $sender_id){
                $arr['recipients_id'] = $af;
                if($af!=0)
                {
                    $r = $this->Member->find('first',array('conditions'=>array('id'=>$af)));
                    $receiver = $r['Member']['email'];
                }
                else{
                $r = $this->User->find('first');
                $receiver = $r['User']['email'];
                }
            
                
                $this->Mail->create();
                $this->Mail->save($arr);
                $this->set('success','You have replied to this message.');
                $emails = new CakeEmail();
                $emails->from(array('noreply@strike.com'=>'Strike Management'));
            
                $emails->emailFormat('html');
                $emails->to($receiver);
                $emails->subject($_POST['subject']);
                $base_url = 'http://'.$_SERVER['SERVER_NAME'];
                if($_SERVER['SERVER_NAME'] == 'localhost')
                $base_url = 'http://'.$_SERVER['SERVER_NAME'].'/veritas';
                $message="You have recieved an email from ".$sender." on Strike Website. <br/><a href='".$base_url."'>Check your message, click here</a><br/>
                <p>
                <b>Subject : </b>".$arr['subject']."<br/>
                <b>Message : </b>".$arr['message']."
                </p>
                ";
                if($receiver){                    
                if($af!=0)
                {
                    $checks = $this->Member->findById($af);
                    if($checks['Member']['receive1']==1 || $checks['Member']['receive2']==1)
                    $check =1;
                    else
                    $check =0;
                    
                    
                }
                else
                $check =1;
                if($check == 1)
                $emails->send($message);
                }
                $emails->reset();
                }}
                }
                $this->redirect('read/'.$arr['parent']);
    }
}