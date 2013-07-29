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
        $this->loadModel('Doc');
        $this->loadModel('Image');
        $this->loadModel('Video');
        $this->loadModel('Mailread');
         
    }
    function beforeFilter()
    {
        if($this->Session->read('avatar') || $this->Session->read('user'))
        {
            
        }
        else
        {
            $this->redirect('/admin');
        }
    }
    
    function index()
    {
        $this->loadModel('Lastsender');
        $this->set('read',$this->Mailread);
        $this->set('ls',$this->Lastsender);
        $this->set('mails',$this->Mail);
        $this->set('mems',$this->Member);
        /*if($this->Session->read('avatar'))
        {
            $this->paginate=array('conditions'=>array('parent'=>0,'recipients_id'=>'0','delete_for IN ("s","")'),'limit'=>15,'order'=>array('date'=>'desc'));
            $em= $this->paginate('Mail');
            $this->set('email',$em);
            
            //$this->set('email',$this->Mail->find('all',array('conditions'=>array('recipients_id'=>'0'))));
        }*/
        //else
        //{
            $arr = array();
            if(!$this->Session->read('admin'))
            $recc = $this->Session->read('id');
            else
            $recc = 0;
            $test = $this->Mail->find('all',array('conditions'=>array('OR'=>array(array('recipients_id LIKE'=>$recc.',%'),array('recipients_id LIKE'=>'%,'.$recc.',%'),array('recipients_id LIKE'=>'%,'.$recc),array('recipients_id'=>$recc)),'parent <>'=>0)));
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
            $this->paginate=array('conditions'=>array('OR'=>array('AND'=>array('parent'=>0,'OR'=>array(array('recipients_id LIKE'=>$recc.',%'),array('recipients_id LIKE'=>'%,'.$recc.',%'),array('recipients_id LIKE'=>'%,'.$recc),array('recipients_id'=>$recc)),'delete_for IN("s","")'),'id IN'.$str)),'limit'=>15,'order'=>array('date'=>'desc'));
            $em= $this->paginate('Mail');
            $this->set('email',$em);
            //$this->set('email',$this->Mail->find('all',array('conditions'=>array('recipients_id'=>$this->Session->read('id')))));
       // }
        $cnt = $this->Mail;
        $this->set('count',$cnt);
    }
    
    function read($id)
    {
        if(!$this->Session->read('admin'))
        $user = $this->Session->read('id');
        else
        $user = 0;
        $checks = $this->Mailread->find('first',array('conditions'=>array('parent'=>$id,'user'=>$user)));
        if(!$checks)
        {
            $this->redirect('index');
        }
        $this->Mailread->id = $checks['Mailread']['id'];
        $this->Mailread->saveField('status',1);
        $this->loadModel('Lastsender');
        $this->set('ddo',$this->Doc);
        $this->set('dvo',$this->Video);
        $this->set('dio',$this->Image);
        $this->set('mainid',$id);
        $this->set('mailing',$this->Mail);
        $this->set('last',$this->Lastsender);
        $this->loadModel('Document');
        $this->set('docu',$this->Document);
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
                $last_model = $this->Lastsender->find('first',array('conditions'=>array('parent'=>$arr['parent'],'first'=>$arr['recipients_id'])));
                $this->Lastsender->id = $last_model['Lastsender']['id'];                
                $this->Lastsender->saveField('second',$sender_id);
                
                $che = $this->Mailread->find('first',array('conditions'=>array('user'=>$_POST['recipient_id'],'parent'=>$arr['parent'])));
                $this->Mailread->id = $che['Mailread']['id'];
                $this->Mailread->saveField('status',0);
                
                $this->Mail->create();
                $this->Mail->save($arr);
                $this->set('success','You have replied to this message.');
                $emails = new CakeEmail();
                $emails->from(array('noreply@veritas.com'=>'Veritas'));
            
                $emails->emailFormat('html');
                
                $emails->subject('New Email');
                $base_url = 'http://'.$_SERVER['SERVER_NAME'];
                if($_SERVER['SERVER_NAME'] == 'localhost')
                $base_url = 'http://'.$_SERVER['SERVER_NAME'].'/veritas';
                
                $message="
                You have recieved a message on Veritas.<br/> 
To check your message, click <a href='".$base_url."/?mail=".$arr['parent']."'>here</a><br/><br/>
<b>FROM:</b> ".$sender."<br/>
<b>Subject</b> : ".$_POST['subject']."<br/>
<b>Message</b> : ".$arr['message'];
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
                {
                $emails->to($receiver);
                $emails->send($message);
                }
                }
        }
        $data = $this->Mail->find('first',array('conditions'=>array('id'=>$id)));
        $par = $data['Mail']['id'];
        if(!$this->Session->read('admin'))
        $sent_id = $this->Session->read('id');
        else
        $sent_id = 0;
        //echo $par;die();
        $all = $this->Mail->find('all',array('conditions'=>array('AND'=>array(array('OR'=>array(array('id'=>$par),array('parent'=>$par))),'OR'=>array(array('sender_id'=>$sent_id),array('recipients_id LIKE'=>$sent_id.',%'),array('recipients_id LIKE'=>'%,'.$sent_id.',%'),array('recipients_id LIKE'=>'%,'.$sent_id),array('recipients_id LIKE'=>$sent_id))))));
        //var_dump($all);die();
        $this->set('all',$all);
        $this->set('member',$this->Member);
        $this->set('user',$this->User);
        $subj = $data['Mail']['subject'];
        $this->set('subj',$subj);
        /*
        $data = $this->Mail->find('first',array('conditions'=>array('id'=>$id)));
        $par = $data['Mail']['parent'];
        $subj = $data['Mail']['subject'];
        $this->set('subj',$subj);
        if($par != 0)
        $all = $this->Mail->find('all',array('conditions'=>array('OR'=>array('id'=>$par,'parent'=>$par)),'order'=>'id ASC'));
        else
        $all = $this->Mail->find('all',array('conditions'=>array('OR'=>array('id'=>$id,'parent'=>$id,)),'order'=>'id ASC'));
        
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
        
        if(($this->Session->read('user') && $p['Mail']['sender_id']!=$this->Session->read('id')|| ($this->Session->read('admin')&& $p['Mail']['sender_id']!=0)))
        $this->Mail->saveField('status','read');
        }*/
        
        
        
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
            $this->Session->setFlash('Message Deleted Successfully');
            $this->redirect('index');
        
    }
    public function send()
    {
        $this->loadModel('Lastsender');
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
                if($i==0)
                $data['recipients_id'] = $d[$i];
                else
                $data['recipients_id'] = $data['recipients_id'].','.$d[$i];
                //echo $data['recipients_id'].' '; 
                $data['subject'] = $_POST['subject'];
                $data['message'] = $_POST['message'];
                $data['attachment'] = str_replace(' ','',$_POST['attachments']);
                $data['status'] = 'unread';
                $data['date'] = date('Y-m-d H:i:s');
                
            }
            //die('here');
            if($data){
            $this->Mail->create();
                $this->Mail->save($data);
                $par = $this->Mail->id; 
                }
            for($i=0;$i<sizeof($d);$i++)
            {
                if($i==0)
                {
                    $this->Mailread->create();
                $arrr['user'] = $sender_id;
                $arrr['parent'] = $par;
                $arrr['status'] = -1;
                $this->Mailread->save($arrr);
                }
                if($i!=(sizeof($d)-1)){
                $this->Mailread->create();
                $arrr['user'] = $d[$i];
                $arrr['parent'] = $par;
                $arrr['status'] = 0;
                $this->Mailread->save($arrr);}
                if($i==0){
                $da['first'] = $sender_id;
                $da['parent'] = $par;
                }
                else
                {
                    $da['first'] = $d[$i-1];
                    $da['second'] = $sender_id;
                    $da['parent'] = $par;
                }
                $this->Lastsender->create();
                $this->Lastsender->save($da);
            }
            
            for($i=0;$i<sizeof($arr)-1;$i++)
            {
                $emails = new CakeEmail();
                $to = trim($arr[$i]);
            
            $emails->from(array('noreply@veritas.com'=>'Veritas'));
            
            $emails->subject($_POST['subject']);
            $emails->emailFormat('html');
            if(isset($che))
            unset($che);
            if($to !=''){
            $che = $this->Member->find('first',array('conditions'=>array('email'=>$to)));    
            if(!$che){
            if(isset($che))
            unset($che);    
            $che['Member']['id'] = 0;
            }
            $url = $this->Mail->find('first',array('conditions'=>array('message'=>$data['message'],'subject'=>$_POST['subject'],'recipients_id'=>$che['Member']['id']),'order'=>'id DESC'));
                        
            }
            if(isset($url)&&$url)
            {
                $link = '/?mail='.$url['Mail']['id'];
            }
            else
            $link = '';
            $base_url = 'http://'.$_SERVER['SERVER_NAME'];
            if($_SERVER['SERVER_NAME'] == 'localhost')
            $base_url = 'http://'.$_SERVER['SERVER_NAME'].'/veritas';
            $message="
                You have recieved a message on Veritas.<br/> 
To check your message, click <a href='".$base_url.$link."'>here</a><br/><br/>
<b>FROM:</b> ".$sender."<br/>
<b>Subject</b> : ".$_POST['subject']."<br/>
<b>Message</b> : ".$data['message'];            
                       
            if(str_replace(' ','',$to)){
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
                
                if($check == 1){
                $emails->to($to);
                $emails->send($message);
                
                }
                }
            $emails->reset();
            $this->Session->setFlash('Message Sent Successfully.');
            
            }
            
            
        }
        $this->redirect(str_replace('veritas/','',$return));
    }
    public function replyall()
    {
        $this->loadModel('Lastsender');
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
                $arr['is_replyall'] = 1;
                $par = $this->Mail->find('first',array('conditions'=>array('id'=>$arr['parent'])));
                $q = $this->Mail->find('all',array('conditions'=>array('OR'=>array(array('parent'=>$arr['parent']),array('id'=>$arr['parent']),array('sender'=>$par['Mail']['sender'],'subject'=>$par['Mail']['subject'],'message'=>$par['Mail']['message'],'date'=>$par['Mail']['date'],'parent'=>0)))));
                foreach($q as $qs)
                {
                    $reci = $qs['Mail']['recipients_id'];
                    $arrs = explode(',',$reci);
                    foreach($arrs as $a){
                    $arrays[] = $a;
                    }
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
                    $z=0;
                foreach($arr_final as $af){
                    
                //$arr['recipients_id'] = $_POST['recipient_id'];
                if($af != $sender_id){
                    $z++;
                $qs = $this->Lastsender->find('first',array('conditions'=>array('parent'=>$arr['parent'],'first'=>$af)));
                $this->Lastsender->id = $qs['Lastsender']['id'];
                $this->Lastsender->saveField('second',$sender_id);  
                if($z==1)  
                $arr['recipients_id'] = $af;
                else
                $arr['recipients_id'] = $arr['recipients_id'].','.$af;
                if($af!=0)
                {
                    $r = $this->Member->find('first',array('conditions'=>array('id'=>$af)));
                    $receiver = $r['Member']['email'];
                }
                else{
                $r = $this->User->find('first');
                $receiver = $r['User']['email'];
                }
                $checkss = $this->Mailread->find('first',array('conditions'=>array('user'=>$af,'parent'=>$arr['parent'])));
                $this->Mailread->id = $checkss['Mailread']['id'];
                $this->Mailread->saveField('status',0);
            
                
                
                $this->set('success','You have replied to this message.');
                $emails = new CakeEmail();
                $emails->from(array('noreply@veritas.com'=>'Veritas'));
            
                $emails->emailFormat('html');
                
                $emails->subject($_POST['subject']);
                $base_url = 'http://'.$_SERVER['SERVER_NAME'];
                if($_SERVER['SERVER_NAME'] == 'localhost')
                $base_url = 'http://'.$_SERVER['SERVER_NAME'].'/veritas';
                $message="You have received a message from ".$sender." on Veritas. <br/><a href='".$base_url."/?mail=".$arr['parent']."'>To check your message, click here</a><br/>
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
                if($check == 1){
                    //echo 'test';die();
                $emails->to($receiver);
                $emails->send($message);
                }
                }
                $emails->reset();
                }}
                $this->Mail->create();
                $this->Mail->save($arr);
                }
                $this->Session->setFlash('You have replied to this message.');
                $this->redirect('read/'.$arr['parent']);
    }
}