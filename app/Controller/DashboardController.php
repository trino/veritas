<?php
class DashboardController extends AppController
{
    var $components = array('Email','Language');
    
    public function beforeFilter()
    {
        //parent::__construct();
        
         if($this->Session->read('avatar') || $this->Session->read('user'))
        {
            //die('here');
        }
        else
        {
            //die('there');
            $this->redirect('/admin');
        }
        
        if(!$this->Session->read('lang'))
        {
            $this->Session->write('lang','eng');
        }
        
    }
    public function changelang($lang)
    {
        $this->Session->write('lang',$lang);
        die();
        
    }
    public function translate($fi)
    { //echo $fi;
        $fi = trim($fi);
        if(!$this->Session->read('lang'))
            $this->Session->write('lang','eng');
        $lang = $this->Session->read('lang');
        $field = strtolower(str_replace(" ","_",$fi));
        
        $this->{'Convert'} = ClassRegistry::init('Convert');
         if($fi == 'Special Notes (Guard Request etc.)')
         {
            if($lang=='fre')
            return "Note spéciale (Garde Demande d', etc.)";
         }
         //if($st = $this->Convert->findByField($field)){
            if($st = $this->Convert->findByEng($fi)){
            return $st['Convert'][$lang];
            }
        else
            return $fi;
        
        
    }
    function upload()
    {
        
        if($this->Session->read('user'))
        {
            $this->loadModel('Member');
            $id = $this->Session->read('id');
            $u = $this->Member->findById($id);            
            if($u['Member']['canUpdate'])
            {
                $this->loadModel('Jobmember');
                $ch = $this->Jobmember->find('first',array('conditions'=>array('member_id'=>$id)));
                if(trim($ch['Jobmember']['job_id']))
                return true;
                else
                return false;
            }
            
        }
        else
            return '0';
        
        
    }
    function getall()
    {
         if($this->Session->read('user'))
        {
            $this->loadModel('Member');
            $this->loadModel('Canupload');
            $this->loadModel('Canview');
            $id = $this->Session->read('id');
            $u = $this->Member->findById($id);
            if($s = $this->Canupload->findByMemberId($id))
            foreach($s as $k=>$v)
            $u['Member'][$k] = $v;
            if($s = $this->Canview->findByMemberId($id))
            foreach($s as $k=>$v)
            $u['Member'][$k] = $v;
            
            return $u;
        }
        else
            return '0';
    }
    public function index()
    {
        
        if($this->Session->read('avatar') || $this->Session->read('user'))
        {
            //die('here');
            
        }
        else
        {
            //die('there');
            if(!isset($_GET['mail']))
            $this->redirect('/admin');
            else
            $this->redirect('/admin?mail='.$_GET['mail']);
        }
        
       if(isset($_GET['mail']))
            $this->redirect('/mail/read/'.$_GET['mail']);
       if(isset($_GET['upload']))
            $this->redirect('/uploads/view_detail/'.$_GET['upload']);
            if(isset($_GET['upload_s'])){
            $this->redirect('/uploads/view_detail/'.$_GET['upload_s'].'/special');
            }
        if($this->Session->read('job_id'))
        {
            $this->redirect('/jobs/view/'.$this->Session->read('job_id'));
        }     
        $this->loadModel('Member');
        $this->loadModel('Mail');
        $this->loadModel('User');
        $this->loadModel('Document');
        $this->loadModel('Jobmember');
        $this->loadModel('Event_log');
        $this->loadModel('Canview');
        $this->loadModel('Canupload');
        $this->loadModel('AdminDoc');
        $this->loadModel('SpecJob');
        $this->loadModel('Vehicle_inspection');
        $this->set('admin_doc',$this->AdminDoc->findById('1'));
        //$this->set('ad',$this->User->find('first'));
        if($this->Session->read('avatar'))
        {
            $this->loadModel('ReportuploadPermission');
            $apr = $this->ReportuploadPermission->find('all',array('conditions'=>array('user_id'=>0)));
            if($apr)
            {
                $m=0;
                foreach($apr as $ar)
                {
                    $m++;
                    if($m==1)
                    $arr_re = $ar['ReportuploadPermission']['report_type1'];
                    else
                    $arr_re = $arr_re.','.$ar['ReportuploadPermission']['report_type1'];
                }
            }
            else
            $arr_re = '999999999';
            
            $this->loadModel('EvidenceuploadPermission');
            $ape = $this->EvidenceuploadPermission->find('all',array('conditions'=>array('user_id'=>0)));
            if($ape)
            {
                $m=0;
                foreach($ape as $ae)
                {
                    $m++;
                    if($m==1)
                    $arr_ev = $ae['EvidenceuploadPermission']['report_type1'];
                    else
                    $arr_ev = $arr_ev.','.$ae['EvidenceuploadPermission']['report_type1'];
                }
            }
            else
            $arr_ev = '999999999';
            
            $this->loadModel('SiteorderuploadPermission');
            $aps = $this->SiteorderuploadPermission->find('all',array('conditions'=>array('user_id'=>0)));
            if($aps)
            {
                $m=0;
                foreach($aps as $as)
                {
                    $m++;
                    if($m==1)
                    $arr_so = $as['SiteorderuploadPermission']['report_type1'];
                    else
                    $arr_so = $arr_so.','.$as['SiteorderuploadPermission']['report_type1'];
                }
            }
            else
            $arr_so = '999999999';
            
            $this->loadModel('EmployeeuploadPermission');
            $apem = $this->EmployeeuploadPermission->find('all',array('conditions'=>array('user_id'=>0)));
            if($apem)
            {
                $m=0;
                foreach($apem as $ae)
                {
                    $m++;
                    if($m==1)
                    $arr_em = $ae['EmployeeuploadPermission']['report_type1'];
                    else
                    $arr_em = $arr_so.','.$ae['EmployeeuploadPermission']['report_type1'];
                }
            }
            else
            $arr_em = '999999999';
            
            $this->set('contract',$this->Document->find('count',array('conditions'=>array('document_type'=>'contract','draft'=>0))));
            $this->set('evidence',$this->Document->find('count',array('conditions'=>array('document_type'=>'evidence','draft'=>0,'ev_id IN('.$arr_ev.')'))));
            $this->set('template',$this->Document->find('count',array('conditions'=>array('document_type'=>'template','draft'=>0))));
            $this->set('report',$this->Document->find('count',array('conditions'=>array('document_type'=>'report','draft'=>0,'re_id IN('.$arr_re.')'))));
            $this->set('siteOrder',$this->Document->find('count',array('conditions'=>array('document_type'=>'siteOrder','draft'=>0,'so_id IN('.$arr_so.')'))));
            $this->set('training',$this->Document->find('count',array('conditions'=>array('document_type'=>'training','draft'=>0))));
            $this->set('employee',$this->Document->find('count',array('conditions'=>array('document_type'=>'employee','draft'=>0,'emp_id IN('.$arr_em.')'))));
            $this->set('KPIAudits',$this->Document->find('count',array('conditions'=>array('document_type'=>'KPIAudits','draft'=>0))));
            $this->set('afimac_intel',$this->SpecJob->find('count',array('conditions'=>array('document_type'=>'AFIMAC Intel'))));            
            $this->set('news_media',$this->SpecJob->find('count',array('conditions'=>array('document_type'=>'News/Media'))));
            $this->set('personal_inspection',$this->Document->find('count',array('conditions'=>array('document_type'=>'personal_inspection','draft'=>0))));
            $this->set('mobile_inspection',$this->Document->find('count',array('conditions'=>array('document_type'=>'mobile_inspection','draft'=>0))));
            $this->set('mobile_log',$this->Document->find('count',array('conditions'=>array('document_type'=>'mobile_log','draft'=>0))));        
            $this->set('inventory', $this->Document->find('count',array('conditions'=>array('document_type'=>'mobile_vehicle_trunk_inventory','draft'=>0))));
            $this->set('deployment_rate', $this->Document->find('count',array('conditions'=>array('document_type'=>'deployment_rate','draft'=>0))));
            $this->set('vehicle_inspection', $this->Document->find('count',array('conditions'=>array('document_type'=>'vehicle_inspection','draft'=>0))));
            $this->paginate = array('limit'=>10,'order'=>'date desc ,time desc');
             //$this->set('activity',$this->paginate('Document'));
             $this->set('added',$this->Member->find('all'));
             $this->set('activity', $this->paginate('Event_log'));
             
        }
        else
        {
              
             $this->set('job_id', $this->Document);
             $id = $this->Session->read('id');
             if($jo = $this->Jobmember->find('first',array('conditions'=>array('member_id'=>$id))))
             {
                $this->set('jm',$jo['Jobmember']['job_id']);
                $this->paginate = array('limit'=>10,'order'=>'date desc ,time desc');
             //$this->set('activity',$this->paginate('Document'));
                $this->set('activity', $this->paginate('Event_log', array('event_type '=>'Upload Document')));
             }
             else
             {
               $this->set('activity',''); 
                $this->set('jm','');
             }
            if($this->Session->read('see'))
            {
                $q=$this->Member->find('first',array('conditions'=>array('id'=>$this->Session->read('id'))));
                $id=$q['Member']['id'];
                if($canview = $this->Canview->find('first',array('conditions'=>array('member_id'=>$id))))
                    $this->set('canview',$canview);
                if($canupdate = $this->Canupload->find('first', array('conditions'=>array('member_id'=>$id))))
                    $this->set('canupdate',$canupdate);
                    
                $jo=$this->Jobmember->find('all',array('conditions'=>array('member_id'=>$id)));
                
                if($jo)
                {
                    $data="";
                    foreach($jo as $j)
                    {
                        $data.=$j['Jobmember']['job_id'].",";
                    }
                    $d= rtrim($data, ",");
                    if($d != "")
                    {
                        $this->set('contract',$this->Document->find('count',array('conditions'=>array('document_type'=>'contract','job_id in ('.$d.')'))));
                        $this->set('evidence',$this->Document->find('count',array('conditions'=>array('document_type'=>'evidence','job_id in ('.$d.')'))));
                        $this->set('template',$this->Document->find('count',array('conditions'=>array('document_type'=>'template','job_id in ('.$d.')'))));
                        $this->set('report',$this->Document->find('count',array('conditions'=>array('draft'=>0,'document_type'=>'report','job_id in ('.$d.')'))));
                        $this->set('SiteOrder',$this->Document->find('count',array('conditions'=>array('document_type'=>'siteOrder','job_id in ('.$d.')'))));
                        $this->set('training',$this->Document->find('count',array('conditions'=>array('document_type'=>'training','job_id in ('.$d.')'))));
                        $this->set('employee',$this->Document->find('count',array('conditions'=>array('document_type'=>'employee','job_id in ('.$d.')'))));
                        $this->set('deployment_rate',$this->Document->find('count',array('conditions'=>array('document_type'=>'deployment_rate','job_id in ('.$d.')'))));
                        $this->set('KPIAudits',$this->Document->find('count',array('conditions'=>array('document_type'=>'KPIAudits','job_id in ('.$d.')'))));
                        $this->set('afimac_intel',$this->SpecJob->find('count',array('conditions'=>array('document_type'=>'AFIMAC Intel','job_id in ('.$d.')'))));            
                        $this->set('news_media',$this->SpecJob->find('count',array('conditions'=>array('document_type'=>'News/Media','job_id in ('.$d.')'))));
        
                    }
                    else
                    {
                        $this->set('contract','0');
                        $this->set('evidence','0');
                        $this->set('template','0');
                        $this->set('report','0'); 
                        $this->set('SiteOrder','0'); 
                        $this->set('training','0'); 
                        $this->set('employee','0'); 
                        $this->set('KPIAudits','0');
                        $this->set('afimac_intel','0');
                        $this->set('news_media','0');
                         
                    }//$this->set('training_manuals',$this->Document->find('count',array('conditions'=>array('document_type'=>'training_manuals','job_id in ('.$d.')'))));
                }
                else
                {
                    $this->set('contract','0');
                    $this->set('evidence','0');
                    $this->set('template','0');
                    $this->set('report','0');
                    //$this->set('training_manuals','0');
                }
            }
            else
            {
                $q=$this->Member->find('first',array('conditions'=>array('id'=>$this->Session->read('id'))));
                $id=$q['Member']['id'];
                $this->set('contract',$this->Document->find('count',array('conditions'=>array('document_type'=>'contract','addedBy'=>$id))));
                $this->set('evidence',$this->Document->find('count',array('conditions'=>array('document_type'=>'evidence','addedBy'=>$id))));
                $this->set('template',$this->Document->find('count',array('conditions'=>array('document_type'=>'template','addedBy'=>$id))));
                $this->set('report',$this->Document->find('count',array('conditions'=>array('document_type'=>'report','addedBy'=>$id))));
                //$this->set('training_manuals',$this->Document->find('count',array('conditions'=>array('document_type'=>'training_manuals','addedBy'=>$id))));
            }
        }
        $uri = $_SERVER['REQUEST_URI'];
                $uri = str_replace('/',' ',$uri);
                $uri = str_replace(' ','/',trim($uri));
                if($uri!='dashboard'){
                $arr_uri = explode('/',$uri);
                $path = $_SERVER['DOCUMENT_ROOT'].'/app/webroot/img/attachment/';
                }
                else
                $path = $_SERVER['DOCUMENT_ROOT'].'app/webroot/img/attachment/';
        
         if($_SERVER['SERVER_NAME']=='localhost')
                {
                    $path = $_SERVER['DOCUMENT_ROOT'].'veritas/app/webroot/img/attachment/';
                }
                else
                    $path = $_SERVER['DOCUMENT_ROOT'].'app/webroot/img/attachment/';        
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
                $data['status'] = 'unread';
                $data['date'] = date('Y-m-d');
                $this->Mail->create();
                $this->Mail->save($data); 
            }
            
            for($i=0;$i<sizeof($arr)-1;$i++)
            {
                $emails = new CakeEmail();
                $emails->from($this->Session->read('email'));
                $tos = $this->User->find('first'); 
                $to = $tos['User']['email'];
                //die();
                $emails->to($arr[$i]);
                $emails->subject($_POST['subject']);
                $emails->emailFormat('html');
                //$this->Email->from    = $this->Session->read('email');
                //$this->Email->to = $arr[$i];
                //$this->Email->subject = $_POST['subject'];
                $message="You have received a message from ".$sender." on Veritas. Please login to see the message";
                $emails->send($message);
                $this->Session->setFlash('Message Sent Successfully.');
            }
            
        }
        else
        if(isset($_FILES['myfile']['name']))
        {
            $arr = explode('.',$_FILES['myfile']['name']);
            $ext = end($arr);
            if($ext != 'exe' || $ext != 'EXE')
            {
                $name = rand(10000000,99999999).'_'.rand(10000000,99999999).'.'.$ext;
                
                if(move_uploaded_file($_FILES['myfile']['tmp_name'],$path.$name))
                {
                    echo $name;die();
                }
            }
            else{
            echo "error";
            die();
            }
        }
    }
    public function get_email_list()
    {
        $this->loadModel('Member');
        return $this->Member->find('all');
    }        
    public function get_user()
    {
        $this->loadModel('User');
        return $this->User->find('first');die();
            
            
    }
    
    public function contactus()
    {
        $this->loadModel('User');
        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $message = $_POST['message'];
            
            $emails = new CakeEmail();
            $emails->from($email);
            $tos = $this->User->find('first'); 
            $to = $tos['User']['email'];
            //die();
            $emails->to($to);
            $emails->cc('ahrusca@daltongroup.ca');
            $emails->subject("User Support");
            $emails->emailFormat('html');
            $base_url = 'http://'.$_SERVER['SERVER_NAME'];
            if($_SERVER['SERVER_NAME'] == 'localhost')
            $base_url = 'http://'.$_SERVER['SERVER_NAME'].'/veritas';
            $message="You have received a message from ".$email.". <br/>".$message;
            if($emails->send($message))
            {
                $this->Session->setFlash("Message Successfully Sent.");
            }
            else
              $this->Session->setFlash("Sorry, message could not be Sent.");  
              
        }
        
    }            
    public function settings()
    {
        
        //echo $this->Session->read('logo');die();
        $this->loadModel('Member');
        $this->loadModel('Mail');
        $this->loadModel('User');
        $this->loadModel('Emailupload');
        $this->loadModel('AdminDoc');
        $this->loadModel('Logo');
        $this->loadModel('AdminModule');
        if($this->Session->read('admin'))
        $this->set('module',$this->AdminModule->find('all'));
        $this->set('l',$this->Logo);
        //var_dump($this->AdminDoc->findById('1'));
        $this->set('admin_doc',$this->AdminDoc->findById('1'));
        
        if(isset($_POST['submit']))
        {
            $query = $this->AdminModule->find('all'); 
            foreach($query as $qu)
            {
                $this->AdminModule->id = $qu['AdminModule']['id'];
                $this->AdminModule->saveField('status',0);
            }
            if(isset($_POST['mod']))
            {
                
                
                foreach($_POST['mod'] as $v)
                {
                 $this->AdminModule->id = $v;
                 $this->AdminModule->saveField('status',1);   
                }
            }
            if($_POST['logo'] == 'afimac')
            {
                $logo['afimac'] = 1;
                $logo['asap'] = 0;
                $this->Session->write('logo','afimaclogo.png');
            }
            else
            {
                $logo['asap'] = 1;
                $logo['afimac'] = 0;
                $this->Session->write('logo','asap.gif');
            }
            $this->loadModel('Logo');
            $this->Logo->id = 1;
            $this->Logo->save($logo);
            //if()
            if($_POST['email'])
            {
                $ch = $this->check_email($_POST['email']);
                if(!$ch)
                {
                    $this->Session->setFlash('Email Already Taken');
                    $this->redirect('settings');
                }
            }
            if($_POST['old_password'])
            {
                $ch2 = $this->check_password(md5($_POST['old_password']));
                if(!$ch2)
                {
                    $this->Session->setFlash('Old Password Does Not Match!');
                    $this->redirect('settings');
                }
            }
            if($this->Session->read('admin')){
            
            if(isset($_POST['show']))
            {
                //var_dump($_POST['show']);die();
                foreach($_POST['show'] as $k=>$v)
                {
                    $sh['id']= '1';
                    $sh[$k]=$v;
                    if($k=='report' && $v=='1')
                    {
                        $this->loadModel('ReportuploadPermission');
                        $this->ReportuploadPermission->deleteAll(array('user_id'=>0));
                        foreach($_POST['report_canUpload'] as $k=>$v)
                        {
                                $arr['user_id'] = 0;
                                $arr['report_type1'] = $v;
                                $arr['can_upload'] = 1; 
                                $this->ReportuploadPermission->create();
                                $this->ReportuploadPermission->save($arr);
                        }
                    }
                    if($k == 'evidence' && $v =='1')
                    {
                        $this->loadModel('EvidenceuploadPermission');
                        $this->EvidenceuploadPermission->deleteAll(array('user_id'=>0));
                        foreach($_POST['evidence_canUpload'] as $k=>$v)
                        {
                                $arr['user_id'] = 0;
                                $arr['report_type1'] = $v;
                                $arr['can_upload'] = 1; 
                                $this->EvidenceuploadPermission->create();
                                $this->EvidenceuploadPermission->save($arr);
                        }
                        
                    }
                    if($k =='site_orders' && $v =='1')
                    {
                        $this->loadModel('SiteorderuploadPermission');
                        $this->SiteorderuploadPermission->deleteAll(array('user_id'=>0));
                        foreach($_POST['siteorder_canUpload'] as $k=>$v)
                        {
                                $arr['user_id'] = 0;
                                $arr['report_type1'] = $v;
                                $arr['can_upload'] = 1; 
                                $this->SiteorderuploadPermission->create();
                                $this->SiteorderuploadPermission->save($arr);
                        }
                        
                    }
                    if($k =='employee' && $v =='1')
                    {
                        $this->loadModel('EmployeeuploadPermission');
                        $this->EmployeeuploadPermission->deleteAll(array('user_id'=>0));
                        foreach($_POST['employee_canUpload'] as $k=>$v)
                        {
                                $arr['user_id'] = 0;
                                $arr['report_type1'] = $v;
                                $arr['can_upload'] = 1; 
                                $this->EmployeeuploadPermission->create();
                                $this->EmployeeuploadPermission->save($arr);
                        }
                        
                    }
                    
                }
                
                if(isset($sh) && is_array($sh)){
                $this->AdminDoc->deleteAll(array('id >'=>0));                
                $this->AdminDoc->create();
                $this->AdminDoc->save($sh);
                }
                
            }
            }
           
            
            if($_FILES['image']['name']!="")
            {
                $uri = $_SERVER['REQUEST_URI'];
                $uri = str_replace('/',' ',$uri);
                $uri = str_replace(' ','/',trim($uri));
                if($uri!='dashboard'){
                $arr_uri = explode('/',$uri);
                $path = $_SERVER['DOCUMENT_ROOT'].'/app/webroot/img/uploads/';
                }
                else
                $path = $_SERVER['DOCUMENT_ROOT'].'/app/webroot/img/uploads/';
                 if($_SERVER['SERVER_NAME']=='localhost')
                {
                    $path = $_SERVER['DOCUMENT_ROOT'].'veritas/app/webroot/img/uploads/';
                }
                else
                    $path = $_SERVER['DOCUMENT_ROOT'].'/app/webroot/img/uploads/';
                $source = $_FILES['image']['tmp_name'];
                $rand = rand(100000,999999);
                $ext_arr = explode('.',$_FILES['image']['name']);
                $img = $rand.'.'.end($ext_arr);
                $destination = $path.$img;
                move_uploaded_file($source,$destination);
                $max_width = 60;
                $max_height = 60;
                list($w, $h) = getimagesize($destination);
                if($w > $h)
                {
                    $width = $max_width;
                    $ratio = $max_width/$w;
                    $height = $ratio * $h;
                
                }
                else
                {
                    $height = $max_height;
                    $ratio = $max_height/$h;
                    $width = $ratio * $w;
                }
            	$virtual_image = imagecreatetruecolor($width, $height);
                          $image_params = getimagesize($destination);
            $ext = $image_params['mime'];
            switch($ext)
            {
                case 'image/png':
                    $image = imagecreatefrompng($destination);
                    imagecopyresampled($virtual_image, $image, 0, 0, 0, 0, $width, $height, $w, $h);
    	            imagepng($virtual_image, $destination);
                    break;
                case 'image/gif':
                    $image = imagecreatefromgif($destination);
                    imagecopyresampled($virtual_image, $image, 0, 0, 0, 0, $width, $height, $w, $h);
                	imagegif($virtual_image, $destination);
                    break;
                case 'image/jpeg':
                    $image = imagecreatefromjpeg($destination);
                    imagecopyresampled($virtual_image, $image, 0, 0, 0, 0, $width, $height, $w, $h);
                	imagejpeg($virtual_image, $destination);
                    break;
                default:
                    $image = imagecreatefromjpeg($destination);
                    imagecopyresampled($virtual_image, $image, 0, 0, 0, 0, $width, $height, $w, $h);
                	imagejpeg($virtual_image, $destination);
                    break; 
            } 
                
                //$img=$_FILES['image']['name'];
           }
           else
           {
            $img=$this->Session->read('image');
           }
           
              if($this->Session->read('avatar'))
              {
                
                $this->User->id=$this->Session->read('id');
                $this->User->saveField('name_avatar',$_POST['name']);
                $this->User->saveField('email',$_POST['email']);
                $this->User->saveField('approve',(isset($_POST['approve'])? "1":"0"));
                $this->Session->write('approve',(isset($_POST['approve'])? "1":"0"));
                if($_POST['password'] != ''){
                $this->User->saveField('password',md5($_POST['password']));
                if($this->Session->read('FMember'))
                {
                    $fm = $this->User->findById($this->Session->read('id'));
                    $this->Member->id = $fm['User']['from_member'];
                    $this->Member->saveField('password',md5($_POST['password']));
                }
                }
                $this->User->saveField('picture',$img);
                $this->User->saveField('country',$_POST['country']);
                //die('here');
              }
              else
              {
                //die('there');
                $this->Member->id = $this->Session->read('id');
                $this->Member->saveField('fname',$_POST['fname']);
                $this->Member->saveField('lname',$_POST['lname']);
                $this->Member->saveField('full_name',$_POST['name']);
                $this->Member->saveField('email',$_POST['email']);
                if(isset($_POST['receive1']))
                    $this->Member->saveField('receive1',1);
                else
                    $this->Member->saveField('receive1',0);
                    
                if(isset($_POST['receive2']))
                    $this->Member->saveField('receive2',1);
                else
                    $this->Member->saveField('receive2',0);
                if(isset($_POST['receive2']))
                {
                    
                    $this->Emailupload->deleteAll(array('member_id'=>$this->Session->read('id')));
                    $emailupload['member_id'] = $this->Session->read('id');
                    $emailupload['contract'] = (isset($_POST['Email_contracts']))? '1' : '0'  ;
                    $emailupload['evidence'] = (isset($_POST['Email_evidence']))? '1' : '0'  ;
                    $emailupload['template'] = (isset($_POST['Email_templates']))? '1' : '0'  ;
                    $emailupload['report'] = (isset($_POST['Email_client_memo']))? '1' : '0'  ;
                    $emailupload['client_feedback'] = (isset($_POST['Email_client_memo1']))? '1' : '0'  ;
                    $emailupload['siteOrder'] = (isset($_POST['Email_siteOrder']))? '1' : '0'  ;
                    $emailupload['training'] = (isset($_POST['Email_training']))? '1' : '0'  ;
                    $emailupload['employee'] = (isset($_POST['Email_employee']))? '1' : '0'  ;
                    $emailupload['KPIAudits'] = (isset($_POST['Email_KPIAudits']))? '1' : '0'  ;
                    $emailupload['personal_inspection'] = (isset($_POST['Email_personal_inspection'])&& $_POST['Email_personal_inspection'])? '1' : '0'  ;
                    $emailupload['mobile_inspection'] = (isset($_POST['Email_mobile_inspection'])&& $_POST['Email_mobile_inspection'])? '1' : '0'  ;
                    $emailupload['mobile_log'] = (isset($_POST['Email_mobile_log'])&& $_POST['Email_mobile_log'])? '1' : '0'  ;
                    $emailupload['mobile_vehicle_trunk_inventory'] = (isset($_POST['Email_mobile_vehicle_trunk_inventory'])&& $_POST['Email_mobile_vehicle_trunk_inventory'])? '1' : '0'  ;
                    $emailupload['vehicle_inspection'] = (isset($_POST['Email_vehicle_inspection'])&& $_POST['Email_vehicle_inspection'])? '1' : '0'  ;
                 
                    
                    $this->Emailupload->create();
                    $this->Emailupload->save($emailupload);  
                    
                }
                else
                {
                    $this->Emailupload->deleteAll(array('member_id'=>$this->Session->read('id')));
                    $emailupload['member_id'] = $this->Session->read('id');
                    $emailupload['contract'] = '0'  ;
                    $emailupload['evidence'] = '0'  ;
                    $emailupload['template'] = '0' ;
                    $emailupload['report'] = '0' ;
                    $emailupload['siteOrder'] =  '0' ;
                    $emailupload['training'] =  '0' ;
                    $emailupload['employee'] =  '0' ;
                    $emailupload['KPIAudits'] =  '0' ;
                    $emailupload['client_feedback'] = '0' ;
                    $this->Emailupload->create();
                    $this->Emailupload->save($emailupload);
                }
                if($_POST['password']!='')
                $this->Member->saveField('password',md5($_POST['password']));
                $this->Member->saveField('address', $_POST['address']);
                $this->Member->saveField('phone',$_POST['phone']);
                $this->Member->saveField('image',$img);
              }
              if($this->Session->read('avatar'))
              {
                 $this->Session->write(array('avatar'=>$_POST['name'],'email'=>$_POST['email'],'image'=>$img));
              }
              else if($this->Session->read('user'))
              {
                 $this->Session->write(array('user'=>$_POST['name'],'email'=>$_POST['email'],'image'=>$img));
              }
              $this->Session->setFlash('Data Saved Successfully');
              $this->redirect('/admin');
        }
        if($this->Session->read('avatar'))
        {
            $this->set('user',$this->User->find('first',array('conditions'=>array('id'=>$this->Session->read('id')))));
        }
        else
        {
            $this->set('user',$this->Member->find('first',array('conditions'=>array('id'=>$this->Session->read('id')))));
            $e = $this->Emailupload->find('first', array('conditions'=>array('member_id'=>$this->Session->read('id'))));
            $this->set('e',$e);
        }
        
    }
    
    public function check_password($p='')
    {
         $this->loadModel('Member');
        $this->loadModel('Mail');
        $this->loadModel('User');
        if(isset($_POST['pass']))
        $pass = md5($_POST['pass']);
        else
        $pass = $p;
        //echo $p;die();
        if($this->Session->read('avatar'))
        {
            //die('here');
            $val = $this->User->find('count',array('conditions'=>array('name_avatar'=>$this->Session->read('avatar'),'password'=>$pass)));
            //die('here');
        }
        else
        {
            $val = $this->Member->find('count',array('conditions'=>array('id'=>$this->Session->read('id'),'password'=>$pass)));
        }
        if($val>0)
        {
            if(isset($_POST['pass']) && !$p)
            echo "1";
            else
            return true;
        }
        else
        {
            if(isset($_POST['pass']) && !$p)
            echo "0";
            else
            return false;
        }
        die();
    }
    public function check_email($em = '')
    {
        $this->loadModel('Member');
        $this->loadModel('Mail');
        $this->loadModel('User');
        if(isset($_POST['email']))
        $em=$_POST['email'];
        if($this->Session->read('admin')){
            
        $c=$this->User->find('count',array('conditions'=>array('email'=>$em,'id !='=>$this->Session->read('id'))));
        
        }
        else        
        $c=$this->User->find('count',array('conditions'=>array('email'=>$em)));
        if($this->Session->read('admin')){
        if($this->Session->read('FMember')){    
        echo $co = $this->Member->find('count',array('conditions'=>array('email'=>$em,'id !='=>$this->Session->read('FMember'))));
        //echo "<br/>".$this->Session->read('FMember');
        //die();
        }
        else
        $co = $this->Member->find('count',array('conditions'=>array('email'=>$em)));
        }
        else
        $co=$this->Member->find('count',array('conditions'=>array('email'=>$em,'id !='=>$this->Session->read('id'))));

        if($c>0 || $co>0)
        {
            if(isset($_POST['email']) && !$em)
            echo "0";
            else
            return false;
        }
        else
        {
            if(isset($_POST['email']) && !$em)
            echo "1";
            else
            return true;
        }
        die();
    }
    
    public function home()
    {
        $this->loadModel('Page');
        $this->set('page',$this->Page->find('first'));
        
    }
    public function page_edit()
    {
        $this->loadModel('Page');
        if(isset($_POST['submit']))
        {
            
            $this->Page->id='1';
            $this->Page->saveField('title',$_POST['title']);
            $this->Page->saveField('description',$_POST['description']);
            $this->Session->setFlash('Data Saved Successfully');
            $this->redirect('home');
        }
         $this->set('page',$this->Page->find('first'));
    }
    public function get_jobs()
    {
        $this->loadModel('Job');
        if($this->Session->read('admin')){
        $q = $this->Job->find('all',array('order'=>'title'));
        return $q;
        }
        else
        {
            $this->loadModel('Jobmember');
            if($this->Session->read('id'))
            {
                $jm = $this->Jobmember->find('first',array('conditions'=>array('member_id'=>$this->Session->read('id'))));
                if($jm)
                {
                    $jids = $jm['Jobmember']['job_id'];
                    $j_arr = explode(',',$jids);
                    if($j_arr)
                    {
                        $ji = '(';
                        foreach($j_arr as $jid)
                        {
                            
                            if($ji == '(')
                            $ji = $ji.$jid;
                            else
                            $ji = $ji.','.$jid;
                            
                            
                        }
                        $ji = $ji.')';
                        if($ji != "()")
                        {
                            $q = $this->Job->find('all',array('conditions'=>array('id IN'.$ji)));
                            return $q;
                        }
                    }
                    else return false;
                     
                }
                else return false;
            }
            else
            return false;
        }
    }
    function get_job2()
    {
        $this->loadModel('Jobmember');
        $jm = $this->Jobmember->find('first',array('conditions'=>array('member_id'=>$this->Session->read('id'))));
        if($jm)
        {
            return $jm['Jobmember']['job_id'];
        }
        else
        return false;
    }
    function get_active_module()
    {
        $this->loadModel('AdminModule');
        $module = $this->AdminModule->find('all',array('conditions'=>array('status'=>1)));
        return $module;
        
    }
}