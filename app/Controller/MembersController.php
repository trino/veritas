<?php
class MembersController extends AppController
{
     public $paginate = array(
        'limit' => 10
    );
    var $components = array('Email');
    public function index()
    {
        $this->loadModel('Jobmember');
        $this->loadModel('Job');
        $this->set('job',$this->Job);
        $this->set('job_m',$this->Jobmember);
        if(!$this->Session->read('avatar'))
        $this->redirect('/admin');
        $this->loadModel('Member');
        $mem=$this->paginate('Member');
        $this->set('mem',$mem);
        //$this->set('mem',$this->Member->find('all'));
    }
    public function loadall()
    {
        
        $this->layout = 'modal_layout';
        $this->loadModel('Job');
        $this->loadModel('Jobmember');
        if($this->Session->read('admin'))
        $this->set('job',$this->Job->find('all',array('order'=>'title')));
        else
        {
            $q = $this->Jobmember->find('first',array('conditions'=>array('member_id'=>$this->Session->read('id'))));
            if($q)
            {
                
                $jobs = $q['Jobmember']['job_id'];
                if(trim($jobs)=='')
                $jobs='0';
                $arr = '('.$jobs.')';
                $this->set('job',$this->Job->find('all',array('order'=>'title','conditions'=>array('id IN '.$arr))));
            }
            else
            $this->set('job',false);
        }
        $this->set('member',$this->Member);
        $this->set('job_model',$this->Job);
        $this->set('jm',$this->Jobmember);
        
    }
    function searchlist($id=0)
    {
        $this->set('jid',$id);
        $name = $_POST['name'];
        $this->set('name',$name);        
        $this->layout = 'modal_layout';
        $this->loadModel('Job');
        $this->loadModel('Jobmember');
        if($this->Session->read('admin'))
        $this->set('job',$this->Job->find('all',array('order'=>'title')));
        else
        {
            $q = $this->Jobmember->find('first',array('conditions'=>array('member_id'=>$this->Session->read('id'))));
            if($q)
            {
                
                $jobs = $q['Jobmember']['job_id'];
                if(trim($jobs)=='')
                $jobs='0';
                $arr = '('.$jobs.')';
                $this->set('job',$this->Job->find('all',array('order'=>'title','conditions'=>array('id IN '.$arr))));
            }
            else
            $this->set('job',false);
        }
        $this->set('member',$this->Member);
        $this->set('job_model',$this->Job);
        $this->set('jm',$this->Jobmember);
        
    }
    public function add()
    {
        $this->loadModel('Job');
        $this->loadModel('Jobmember');
        $this->set('job',$this->Job);
        $this->loadModel('Canview');
        $this->loadModel('Canupload');
        $this->loadModel('Emailupload');
        if(isset($_POST['email'])){
            $email = $_POST['email'];
        $q=$this->Member->find('first',array('conditions'=>array('email'=>$email)));
        if(trim($email))
        if($q){
            $this->Session->setFlash('Email already exist');
            $this->redirect('add');
        }}
        $this->loadModel('Member');
        $this->loadModel('AdminDoc');
        $this->set('admin_doc',$this->AdminDoc->findById('1'));
        if(!$this->Session->read('avatar'))
        $this->redirect('/admin');
        if(isset($_POST['submit']))
        {
            
            if(isset($_POST['img_gender']))
            {
                if($_POST['img_gender'] == 'male.png')
                {
                    $img = 'male.png';
                }
                else
                $img = 'female.png';
            }
            else            
            if(isset($_FILES['image']['name']) && $_FILES['image']['name']){
            $uri = $_SERVER['REQUEST_URI'];
                $uri = str_replace('/',' ',$uri);
                $uri = str_replace(' ','/',trim($uri));
                if($uri!='members'){
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
             //move_uploaded_file($source,$destination);
            /*
            $this->Image = $this->Components->load('Image');
            if($destination1 = $this->Image->resize($source,$_FILES['image']['name'],'60','60'))
            {
                //print_r($this->Image->getErrors());
                //die($destination1);
                copy($destination1,$path);
            }
            */
            move_uploaded_file($source,$destination);
            $max_width = 60;
            $max_height = 60;
            
            list($w, $h ) = getimagesize($destination);
            //die($image_params['mime']);
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
            }}
            else
            {
                $img = 'male.png';
            }    
                //$image = imagecreatefromjpeg($destination);
            //	imagecopyresampled($virtual_image, $image, 0, 0, 0, 0, $width, $height, $w, $h);
            //	imagejpeg($virtual_image, $destination);
            $arr['fname']=$_POST['fname'];
            $arr['lname']=$_POST['lname'];
            $arr['full_name']=$_POST['full_name'];
            //$arr['name_avatar'] = $_POST['avatar'];
            $arr['title'] = $_POST['title'];
            $arr['address'] = $_POST['address'];
            $arr['email'] = $_POST['email'];
            $arr['phone'] = $_POST['phone'];
            $arr['password'] = md5($_POST['password']);
            $arr['image'] = $img;
            if(isset($_POST['canView']))
            {
                $arr['canView'] = 1;
            }
            if(isset($_POST['canUpdate']))
            {
                $arr['canUpdate'] = 1;
                
            }
            if(isset($_POST['canEmail']))
            {
                $arr['canEmail'] = 1;
            }
            if(isset($_POST['receive1']))
            {
                $arr['receive1'] = 1;
            }
            if(isset($_POST['canEdit']))
                $arr['canEdit']= 1;
                
            if(isset($_POST['receive2']))
            {
                $arr['receive2'] = 1;
            }
            if(isset($_POST['isSupervisor']))
            {
                $arr['isSupervisor'] = 1;
            }
            if(isset($_POST['isEmployee']))
            {
                $arr['isEmployee'] = 1;
            }
            $this->Member->create();
            $this->Member->save($arr);
            
            $id = $this->Member->id;
            if(isset($_POST['canView']))
            {
                $this->Canview->deleteAll(array('member_id'=>$id));
                $canview['member_id'] = $id;
                $canview['contracts'] = (isset($_POST['canView_contracts'])&& $_POST['canView_contracts']!= '0' )? '1' : '0'  ;
                $canview['evidence'] = (isset($_POST['canView_evidence'])&& $_POST['canView_templates']!= '0')? '1' : '0'  ;
                $canview['templates'] = (isset($_POST['canView_templates'])&& $_POST['canView_templates']!= '0')? '1' : '0'  ;
                $canview['report'] = (isset($_POST['canView_client_memo'])&& $_POST['canView_siteOrder']!= '0')? '1' : '0'  ;
                if($canview['report']=='1')
                {
                    $this->loadModel('ReportviewPermission');
                    $this->ReportviewPermission->deleteAll(array('user_id'=>$id));
                    foreach($_POST['report_canView'] as $k=>$v)
                    {
                            $arr['user_id'] = $id;
                            $arr['report_type'] = $v;
                            $arr['can_view'] = 1; 
                            $this->ReportviewPermission->create();
                            $this->ReportviewPermission->save($arr);
                    }
                    
                }
                $canview['siteOrder'] = (isset($_POST['canView_siteOrder'])&& $_POST['canView_siteOrder']!= '0')? '1' : '0'  ;
                $canview['training'] = (isset($_POST['canView_training'])&& $_POST['canView_training']!= '0')? '1' : '0'  ;
                $canview['employee'] = (isset($_POST['canView_employee'])&& $_POST['canView_employee']!= '0')? '1' : '0'  ;
                $canview['KPIAudits'] = (isset($_POST['canView_KPIAudits'])&& $_POST['canView_KPIAudits']!= '0')? '1' : '0'  ;
                $canview['afimac_intel'] = (isset($_POST['canView_afimac_intel'])&& $_POST['canView_afimac_intel']!= '0')? '1' : '0'  ;
                $canview['news_media'] = (isset($_POST['canView_news_media'])&& $_POST['canView_news_media']!= '0')? '1' : '0'  ;
                $canview['mobile_log'] =  (isset($_POST['canView_mobile_log'])&& $_POST['canView_mobile_log'])? '1' : '0'  ;
                $canview['personal_inspection'] = (isset($_POST['canView_personal_inspection'])&& $_POST['canView_personal_inspection'])? '1' : '0'  ;
                $canview['mobile_inspection'] = (isset($_POST['canView_mobile_inspection'])&& $_POST['canView_mobile_inspection'])? '1' : '0'  ;
                $canview['inventory'] = (isset($_POST['canView_inventory'])&& $_POST['canView_inventory'])? '1' : '0'  ;
                $canview['vehicle_inspection'] = (isset($_POST['canView_vehicle_inspection'])&& $_POST['canView_vehicle_inspection'])? '1' : '0'  ;
                $canview['deployment_rate'] = (isset($_POST['canView_deployment_rate'])&&$_POST['canView_deployment_rate'])? '1' : '0';
                $this->Canview->create();
                $this->Canview->save($canview);
            }
            else
            {
                $this->Canview->deleteAll(array('member_id'=>$id));
                $canview['member_id'] = $id;
                $canview['contracts'] =  '0';
                $canview['evidence'] =  '0';
                $canview['templates'] = '0';
                $canview['report'] = '0';
                $canview['siteOrder'] =  '0'  ;
                $canview['training'] =  '0'  ;
                $canview['employee'] =  '0'  ;
                $canview['KPIAudits'] =  '0'  ;
                $canview['afimac_intel'] = '0';
                $canview['news_media'] = '0';
                $canview['deployment_rate'] = 0;
                $this->Canview->create();
                $this->Canview->save($canview);
                
            }
            
            if(isset($_POST['canUpdate']))
            {
                $this->Canupload->deleteAll(array('member_id'=>$id));
                $canupdate['member_id'] = $id;
                $canupdate['contracts'] = (isset($_POST['canUpload_contracts'])&& $_POST['canView_KPIAudits']!= '0')? '1' : '0'  ;
                $canupdate['evidence'] = (isset($_POST['canUpload_evidence'])&& $_POST['canUpload_evidence']!= '0')? '1' : '0'  ;
                $canupdate['templates'] = (isset($_POST['canUpload_templates'])&& $_POST['canUpload_client_memo']!= '0')? '1' : '0'  ;
                $canupdate['report'] = (isset($_POST['canUpload_client_memo'])&& $_POST['canUpload_client_memo']!= '0')? '1' : '0'  ;
                if($canupdate['report']=='1')
                {
                    $this->loadModel('ReportuploadPermission');
                    $this->ReportuploadPermission->deleteAll(array('user_id'=>$id));
                    foreach($_POST['report_canUpload'] as $k=>$v)
                    {
                            $arr['user_id'] = $id;
                            $arr['report_type1'] = $v;
                            $arr['can_upload'] = 1; 
                            $this->ReportuploadPermission->create();
                            $this->ReportuploadPermission->save($arr);
                    }
                    
                }
                $canupdate['siteOrder'] = (isset($_POST['canUpload_siteOrder'])&& $_POST['canUpload_training']!= '0')? '1' : '0'  ;
                $canupdate['training'] = (isset($_POST['canUpload_training'])&& $_POST['canUpload_training']!= '0')? '1' : '0'  ;
                $canupdate['employee'] = (isset($_POST['canUpload_employee'])&& $_POST['canUpload_employee']!= '0')? '1' : '0'  ;
                $canupdate['KPIAudits'] = (isset($_POST['canUpload_KPIAudits'])&& $_POST['canUpload_KPIAudits']!= '0')? '1' : '0'  ;
                $canupdate['afimac_intel'] = (isset($_POST['canUpload_afimac_intel'])&& $_POST['canUpload_afimac_intel']!= '0')? '1' : '0'  ;
                $canupdate['news_media'] = (isset($_POST['canUpload_news_media'])&& $_POST['canUpload_news_media']!= '0')? '1' : '0'  ;
                $canupdate['client_feedback'] = (isset($_POST['canUpload_client_memo1']))? '1' : '0'  ;
                $canupdate['personal_inspection'] = (isset($_POST['canUpload_personal_inspection'])&& $_POST['canUpload_personal_inspection'])? '1' : '0'  ;
                $canupdate['mobile_inspection'] = (isset($_POST['canUpload_mobile_inspection'])&& $_POST['canUpload_mobile_inspection'])? '1' : '0'  ;
                $canupdate['mobile_log'] = (isset($_POST['canUpload_mobile_log'])&& $_POST['canUpload_mobile_log'])? '1' : '0'  ;
                $canupdate['inventory'] = (isset($_POST['canUpload_inventory'])&& $_POST['canUpload_inventory'])? '1' : '0'  ;
                $canupdate['vehicle_inspection'] = (isset($_POST['canUpload_vehicle_inspection'])&& $_POST['canUpload_vehicle_inspection'])? '1' : '0'  ;
                $canupdate['deployment_rate'] = (isset($_POST['canUpload_deployment_rate'])&& $_POST['canUpload_deployment_rate'])? '1' : '0'  ;
                $this->Canupload->create();
                $this->Canupload->save($canupdate);  
                
            }
            else
            {
                $this->Canupload->deleteAll(array('member_id'=>$id));
                $canupdate['member_id'] = $id;
                $canupdate['contracts'] = '0'  ;
                $canupdate['evidence'] = '0'  ;
                $canupdate['templates'] = '0' ;
                $canupdate['report'] = '0' ;
                $canupdate['siteOrder'] =  '0'  ;
                $canupdate['training'] = '0'  ;
                $canupdate['employee'] =  '0'  ;
                $canupdate['KPIAudits'] =  '0'  ;
                $canupdate['afimac_intel'] =  '0'  ;
                $canupdate['news_media'] =  '0'  ;
                $canupdate['client_feedback'] = '0' ;
                $canupdate['deployment_rate'] = '0';
                $this->Canupload->create();
                $this->Canupload->save($canupdate);
            }
            
            
                if(isset($_POST['receive2']))
                {
                    
                    $this->Emailupload->deleteAll(array('member_id'=>$id));
                    $emailupload['member_id'] = $id;
                    $emailupload['contract'] = (isset($_POST['Email_contracts'])&& $_POST['Email_contracts']!= '0')? '1' : '0'  ;
                    $emailupload['evidence'] = (isset($_POST['Email_evidence'])&& $_POST['Email_evidence']!= '0')? '1' : '0'  ;
                    $emailupload['template'] = (isset($_POST['Email_templates'])&& $_POST['Email_templates']!= '0')? '1' : '0'  ;
                    $emailupload['report'] = (isset($_POST['Email_client_memo'])&& $_POST['Email_client_memo']!= '0')? '1' : '0'  ;
                    $emailupload['siteOrder'] = (isset($_POST['Email_siteOrder'])&& $_POST['Email_siteOrder']!= '0')? '1' : '0'  ;
                    $emailupload['training'] = (isset($_POST['Email_training'])&& $_POST['Email_training']!= '0')? '1' : '0'  ;
                    $emailupload['employee'] = (isset($_POST['Email_employee'])&& $_POST['Email_employee']!= '0')? '1' : '0'  ;
                    $emailupload['KPIAudits'] = (isset($_POST['Email_KPIAudits'])&& $_POST['Email_KPIAudits']!= '0')? '1' : '0'  ;
                    $emailupload['afimac_intel'] = (isset($_POST['Email_afimac_intel'])&& $_POST['Email_afimac_intel']!= '0')? '1' : '0'  ;
                    $emailupload['news_media'] = (isset($_POST['Email_news_media'])&& $_POST['Email_news_media']!= '0')? '1' : '0'  ;
                
                    $emailupload['client_feedback'] = (isset($_POST['Email_client_memo1']))? '1' : '0'  ;
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
                    $this->Emailupload->deleteAll(array('member_id'=>$id));
                    $emailupload['member_id'] = $id;
                    $emailupload['contract'] = '0'  ;
                    $emailupload['evidence'] = '0'  ;
                    $emailupload['template'] = '0' ;
                    $emailupload['report'] = '0' ;
                    $emailupload['siteOrder'] =  '0' ;
                    $emailupload['training'] =  '0' ;
                    $emailupload['employee'] =  '0' ;
                    $emailupload['KPIAudits'] =  '0' ;
                    $emailupload['client_feedback'] = '0' ;
                    $emailupload['afimac_intel'] = '0' ;
                    $emailupload['news_media'] = '0' ;
                    $this->Emailupload->create();
                    $this->Emailupload->save($emailupload);
                }
            
            
            $this->Session->setFlash('Data Saved Successfully.');
            if(isset($_POST['job']))
            {
                $arr['job_id'] = '';
                $k=0;
                $this->Jobmember->create();
                foreach($_POST['job'] as $j)
                {
                    $k++;
                    
                    if($k==1)
                        $jarr['job_id'] = $j;
                    else
                    {
                        $jarr['job_id'] .= ','.$j;
                    }
                        
                }
                $jarr['member_id'] = $id;
                $this->Jobmember->save($jarr);
            }
            else
            {
                $this->Jobmember->create();
                $arr['job_id'] = '';
                $jarr['member_id'] = $id;
                $this->Jobmember->save($jarr);
                
            }
            
            if($_POST['email']!= "")
            {   
                if($_SERVER['SERVER_NAME']=='localhost')
                   $base_url = "http://localhost/veritas/";
               else
                   {
                       $base_url =         str_replace('//','___',$_SERVER['SERVER_NAME']);
                       $base_url =  str_replace('/',' ',$_SERVER['SERVER_NAME']);
                       $base_url = trim($base_url);
                       $base_url = str_replace(' ','/',$base_url);
                       $base_url = str_replace('___','//',$base_url);
                       $base_url = $base_url.'/';
                   }
                $emails = new CakeEmail();
                $emails->from(array('noreply@veritas.com'=>'Veritas'));
                
                $emails->subject("New Account Created");
                $emails->emailFormat('html');
                $message = "Hi there,<br/>
                            A new account has been created for you in Veritas.<br/>
                            Your Login Detail:<br/>
                            Username:".$_POST['email']."<br/>
                            Password:".$_POST['password']."<br/>
                            Please <a href='".$base_url."'>Click Here</a> to login.";
                $emails->to($_POST['email']);
                $emails->send($message);
            }
            $this->redirect('index');
             
        }
    }
    public function edit($id)
    {
        
        $this->loadModel('Job');
        $this->loadModel('Jobmember');
        $this->loadModel('AdminDoc');
        $this->set('admin_doc',$this->AdminDoc->findById('1'));
        $this->set('job',$this->Job);
        $qjm = $this->Jobmember->find('first',array('conditions'=>array('member_id'=>$id)));
        if($qjm)
        {
            $jobs = $qjm['Jobmember']['job_id'];
            if(str_replace(',','',$jobs) == $jobs)
            {
                $che = $this->Job->findById($jobs);
                if($che && $che['Job']['is_special'] == 1){
                $this->set('sid',$jobs);
                $this->set('stit',$che['Job']['title']);     }           
            }
            $arr_j = explode(',',$jobs);
            $this->set('jm',$arr_j);
            $this->set('jmid',$qjm['Jobmember']['id']);
        }
        else
        {
            $this->set('jmid','0');
            $this->set('jm',array(''));
        }
        $this->loadModel('Member');
        $this->loadModel('Canview');
        $this->loadModel('Canupload');
        $this->loadModel('Emailupload');
              
        if(!$this->Session->read('avatar'))
            $this->redirect('/admin');
        if($mem = $this->Member->find('first',array('conditions'=>array('id'=>$id))))
            $image = $mem['Member']['image'];
        
        //if($mem['Member']['canUpload']== '1')
           $u = $this->Canupload->find('first', array('conditions'=>array('member_id'=>$id)));     
        //if($mem['Member']['canView']== '1')
           $v = $this->Canview->find('first', array('conditions'=>array('member_id'=>$id)));  
           
           $e = $this->Emailupload->find('first', array('conditions'=>array('member_id'=>$id)));   
        
        $this->set('m',$mem);
        $this->set('u',$u);
        $this->set('v',$v);
        $this->set('e',$e);
        if(isset($_POST['submit']))
        {
            
            if($_POST['email'])
            {
                $ch = $this->check_email2($_POST['email'],$id);
                if(!$ch)
                {
                    $this->Session->setFlash('Email Already Taken');
                    $this->redirect('edit/'.$id);
                }
            }
            
            if(isset($_POST['img_gender']))
            {
                if($_POST['img_gender'] == 'male.png')
                {
                    $img = 'male.png';
                }
                else
                $img = 'female.png';
            }
            else
            if($_FILES['image']['name']!= "")
            {
                $uri = $_SERVER['REQUEST_URI'];
                $uri = str_replace('/',' ',$uri);
                $uri = str_replace(' ','/',trim($uri));
                if($uri!='members'){
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
           // var_dump($ext_arr);
            $img = $rand.'.'.end($ext_arr);
            //die();
            $destination = $path.$img;
             //move_uploaded_file($source,$destination);
            /*
            $this->Image = $this->Components->load('Image');
            if($destination1 = $this->Image->resize($source,$_FILES['image']['name'],'60','60'))
            {
                //print_r($this->Image->getErrors());
                //die($destination1);
                copy($destination1,$path);
            }
            */
            if(move_uploaded_file($source,$destination))
                unlink($path.$image);
            else
                $img = $image;        
            $max_width = 60;
            $max_height = 60;
            
            list($w, $h ) = getimagesize($destination);
            //die($image_params['mime']);
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
            }
            
            $this->Member->id = $id;
            $this->Member->saveField('fname',$_POST['fname']);
            $this->Member->saveField('lname',$_POST['lname']);
            $this->Member->saveField('full_name',$_POST['full_name']);
            //$this->Member->saveField('name_avatar',$_POST['avatar']);
            $this->Member->saveField('title',$_POST['title']);
            $this->Member->saveField('address',$_POST['address']);
            if(isset($img))
            $this->Member->saveField('image',$img);
            $this->Member->saveField('email',$_POST['email']);
            $this->Member->saveField('phone',$_POST['phone']);
            $chpw = $this->Member->findById($id);
            if($chpw['Member']['password']!=$_POST['password'])
            $this->Member->saveField('password',md5($_POST['password']));
            if(isset($_POST['canView']))
            {
                $this->Member->saveField('canView', 1);
                $this->Canview->deleteAll(array('member_id'=>$id));
                $canview['member_id'] = $id;
                $canview['contracts'] = (isset($_POST['canView_contracts'])&& $_POST['canView_contracts'])? '1' : '0'  ;
                $canview['evidence'] = (isset($_POST['canView_evidence'])&& $_POST['canView_evidence'])? '1' : '0'  ;
                if($canview['evidence']=='1')
                {
                    $this->loadModel('EvidenceviewPermission');
                    $this->EvidenceviewPermission->deleteAll(array('user_id'=>$id));
                    foreach($_POST['evidence_canView'] as $k=>$v)
                    {
                            $arr['user_id'] = $id;
                            $arr['report_type'] = $v;
                            $arr['can_view'] = 1; 
                            $this->EvidenceviewPermission->create();
                            $this->EvidenceviewPermission->save($arr);
                    }
                    
                }
                $canview['templates'] = (isset($_POST['canView_templates'])&& $_POST['canView_templates'])? '1' : '0'  ;
                $canview['report'] = (isset($_POST['canView_client_memo'])&& $_POST['canView_client_memo'])? '1' : '0'  ;
                if($canview['report']=='1')
                {
                    $this->loadModel('ReportviewPermission');
                    $this->ReportviewPermission->deleteAll(array('user_id'=>$id));
                    foreach($_POST['report_canView'] as $k=>$v)
                    {
                            $arr['user_id'] = $id;
                            $arr['report_type'] = $v;
                            $arr['can_view'] = 1; 
                            $this->ReportviewPermission->create();
                            $this->ReportviewPermission->save($arr);
                    }
                    
                }
                $canview['siteOrder'] = (isset($_POST['canView_siteOrder'])&& $_POST['canView_siteOrder'])? '1' : '0'  ;
                $canview['training'] = (isset($_POST['canView_training'])&& $_POST['canView_training'])? '1' : '0'  ;
                $canview['employee'] = (isset($_POST['canView_employee'])&& $_POST['canView_employee'])? '1' : '0'  ;
                $canview['KPIAudits'] = (isset($_POST['canView_KPIAudits'])&& $_POST['canView_KPIAudits'])? '1' : '0'  ;
                $canview['afimac_intel'] = (isset($_POST['canView_afimac_intel'])&& $_POST['canView_afimac_intel'])? '1' : '0'  ;
                $canview['news_media'] = (isset($_POST['canView_news_media'])&& $_POST['canView_news_media'])? '1' : '0'  ;
                $canview['mobile_log'] =  (isset($_POST['canView_mobile_log'])&& $_POST['canView_mobile_log'])? '1' : '0'  ;
                $canview['personal_inspection'] = (isset($_POST['canView_personal_inspection'])&& $_POST['canView_personal_inspection'])? '1' : '0'  ;
                $canview['mobile_inspection'] = (isset($_POST['canView_mobile_inspection'])&& $_POST['canView_mobile_inspection'])? '1' : '0'  ;
                $canview['inventory'] = (isset($_POST['canView_inventory'])&& $_POST['canView_inventory'])? '1' : '0'  ;
                $canview['vehicle_inspection'] = (isset($_POST['canView_vehicle_inspection'])&& $_POST['canView_vehicle_inspection'])? '1' : '0'  ;
                $canview['deployment_rate'] = (isset($_POST['canView_deployment_rate'])&& $_POST['canView_deployment_rate'])? '1' : '0'  ;                
                $this->Canview->create();
                $this->Canview->save($canview);
                //die('here');
            }
            else
            {
                $this->Member->saveField('canView',0);
                $this->Canview->deleteAll(array('member_id'=>$id));
                $canview['member_id'] = $id;
                $canview['contracts'] = '0'  ;
                $canview['evidence'] = '0'  ;
                $canview['templates'] = '0'  ;
                $canview['report'] = '0'  ;
                $canview['siteOrder'] =  '0'  ;
                $canview['training'] = '0'  ;
                $canview['employee'] = '0'  ;
                $canview['KPIAudits'] = '0'  ;
                $canview['afimac_intel'] = '0'  ;
                $canview['news_media'] = '0'  ;
                $canview['personal_inspection'] = '0'  ;
                $canview['mobile_inspection'] = '0'  ;
                $canview['mobile_log'] = '0'  ;
                $canview['inventory'] = '0'  ;
                $canview['deployment_rate'] = '0';
                $this->Canview->create();
                $this->Canview->save($canview);
            }
            if(isset($_POST['canUpdate']))
            {
                $this->Member->saveField('canUpdate', 1);
                $this->Canupload->deleteAll(array('member_id'=>$id));
                $canupdate['member_id'] = $id;
                $canupdate['contracts'] = (isset($_POST['canUpload_contracts'])&& $_POST['canUpload_contracts'])? '1' : '0'  ;
                $canupdate['evidence'] = (isset($_POST['canUpload_evidence'])&& $_POST['canUpload_evidence'])? '1' : '0'  ;
                if($canupdate['evidence']=='1')
                {
                    $this->loadModel('EvidenceuploadPermission');
                    $this->EvidenceuploadPermission->deleteAll(array('user_id'=>$id));
                    foreach($_POST['evidence_canUpload'] as $k=>$v)
                    {
                            $arr['user_id'] = $id;
                            $arr['report_type1'] = $v;
                            $arr['can_upload'] = 1; 
                            $this->EvidenceuploadPermission->create();
                            $this->EvidenceuploadPermission->save($arr);
                    }
                    
                }
                $canupdate['templates'] = (isset($_POST['canUpload_templates'])&& $_POST['canUpload_templates'])? '1' : '0'  ;
                $canupdate['report'] = (isset($_POST['canUpload_client_memo'])&& $_POST['canUpload_client_memo'])? '1' : '0'  ;
                if($canupdate['report']=='1')
                {
                    $this->loadModel('ReportuploadPermission');
                    $this->ReportuploadPermission->deleteAll(array('user_id'=>$id));
                    foreach($_POST['report_canUpload'] as $k=>$v)
                    {
                            $arr['user_id'] = $id;
                            $arr['report_type1'] = $v;
                            $arr['can_upload'] = 1; 
                            $this->ReportuploadPermission->create();
                            $this->ReportuploadPermission->save($arr);
                    }
                    
                }
                $canupdate['siteOrder'] = (isset($_POST['canUpload_siteOrder'])&& $_POST['canUpload_siteOrder'])? '1' : '0'  ;
                $canupdate['training'] = (isset($_POST['canUpload_training'])&& $_POST['canUpload_training'])? '1' : '0'  ;
                $canupdate['employee'] = (isset($_POST['canUpload_employee'])&& $_POST['canUpload_employee'])? '1' : '0'  ;
                $canupdate['KPIAudits'] = (isset($_POST['canUpload_KPIAudits'])&& $_POST['canUpload_KPIAudits'])? '1' : '0'  ;
                $canupdate['client_feedback'] = (isset($_POST['canUpload_client_memo1']))? '1' : '0'  ;
                $canupdate['afimac_intel'] = (isset($_POST['canUpload_afimac_intel'])&& $_POST['canUpload_afimac_intel'])? '1' : '0'  ;
                $canupdate['news_media'] = (isset($_POST['canUpload_news_media'])&& $_POST['canUpload_news_media'])? '1' : '0'  ;
                $canupdate['personal_inspection'] = (isset($_POST['canUpload_personal_inspection'])&& $_POST['canUpload_personal_inspection'])? '1' : '0'  ;
                $canupdate['mobile_inspection'] = (isset($_POST['canUpload_mobile_inspection'])&& $_POST['canUpload_mobile_inspection'])? '1' : '0'  ;
                $canupdate['mobile_log'] = (isset($_POST['canUpload_mobile_log'])&& $_POST['canUpload_mobile_log'])? '1' : '0'  ;
                $canupdate['inventory'] = (isset($_POST['canUpload_inventory'])&& $_POST['canUpload_inventory'])? '1' : '0'  ;
                $canupdate['vehicle_inspection'] = (isset($_POST['canUpload_vehicle_inspection'])&& $_POST['canUpload_vehicle_inspection'])? '1' : '0'  ;
                $canupdate['deployment_rate'] = (isset($_POST['canUpload_deployment_rate'])&& $_POST['canUpload_deployment_rate'])? '1' : '0'  ;                
                $this->Canupload->create();
                $this->Canupload->save($canupdate);
                //die();
            }
            else
            {
                $this->Member->saveField('canUpdate',0);
                $this->Canupload->deleteAll(array('member_id'=>$id));
                $canupdate['member_id'] = $id;
                $canupdate['contracts'] = '0'  ;
                $canupdate['evidence'] = '0'  ;
                $canupdate['templates'] = '0'  ;
                $canupdate['report'] = '0'  ;
                $canupdate['siteOrder'] =  '0'  ;
                $canupdate['training'] =  '0'  ;
                $canupdate['employee'] =  '0'  ;
                $canupdate['KPIAudits'] = '0'  ;
                $canupdate['afimac_intel'] = '0'  ;
                $canupdate['news_media'] = '0'  ;
                $canupdate['client_feedback'] = '0'  ;
                $canupdate['personal_inspection'] = '0'  ;
                $canupdate['mobile_inspection'] = '0'  ;
                $canupdate['mobile_log'] = '0'  ;
                $canupdate['inventory'] = '0'  ;
                $canupdate['deployment_rate'] = '0';
            }
    
            if(isset($_POST['receive2']))
            {
                
                $this->Emailupload->deleteAll(array('member_id'=>$id));
                $emailupload['member_id'] = $id;
                $emailupload['contract'] = (isset($_POST['Email_contracts'])&& $_POST['Email_contracts'])? '1' : '0'  ;
                $emailupload['evidence'] = (isset($_POST['Email_evidence'])&& $_POST['Email_evidence'])? '1' : '0'  ;
                $emailupload['template'] = (isset($_POST['Email_templates'])&& $_POST['Email_templates'])? '1' : '0'  ;
                $emailupload['report'] = (isset($_POST['Email_client_memo'])&& $_POST['Email_client_memo'])? '1' : '0'  ;
                $emailupload['siteOrder'] = (isset($_POST['Email_siteOrder'])&& $_POST['Email_siteOrder'])? '1' : '0'  ;
                $emailupload['training'] = (isset($_POST['Email_training'])&& $_POST['Email_training'])? '1' : '0'  ;
                $emailupload['employee'] = (isset($_POST['Email_employee'])&& $_POST['Email_employee'])? '1' : '0'  ;
                $emailupload['KPIAudits'] = (isset($_POST['Email_KPIAudits'])&& $_POST['Email_KPIAudits'])? '1' : '0'  ;
                $emailupload['afimac_intel'] = (isset($_POST['Email_afimac_intel'])&& $_POST['Email_afimac_intel'])? '1' : '0'  ;
                $emailupload['news_media'] = (isset($_POST['Email_news_media'])&& $_POST['Email_news_media'])? '1' : '0'  ;
                $emailupload['client_feedback'] = (isset($_POST['Email_client_memo1']))? '1' : '0'  ;
                
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
                $this->Emailupload->deleteAll(array('member_id'=>$id));
                $emailupload['member_id'] = $id;
                $emailupload['contract'] = '0'  ;
                $emailupload['evidence'] = '0'  ;
                $emailupload['template'] = '0' ;
                $emailupload['report'] = '0' ;
                $emailupload['siteOrder'] = '0'  ;
                $emailupload['training'] = '0'  ;
                $emailupload['employee'] = '0'  ;
                $emailupload['KPIAudits'] = '0'  ;
                $emailupload['afimac_intel'] = '0'  ;
                $emailupload['news_media'] = '0'  ;
                
                $emailupload['client_feedback'] = '0' ;
                $this->Emailupload->create();
                $this->Emailupload->save($emailupload);
            }
       
            if(isset($_POST['canEdit']))
            {
                $this->Member->saveField('canEdit',1);
            }
            else
                $this->Member->saveField('canEdit',0);
                
            if(isset($_POST['receive1']))
            {
                $this->Member->saveField('receive1',1);
            }
            else
                $this->Member->saveField('receive1',0);
            
            if(isset($_POST['receive2']))
            {
                $this->Member->saveField('receive2',1);
            }
            else
                $this->Member->saveField('receive2',0);
            
            
            if(isset($_POST['canEmail']))
            {
                $this->Member->saveField('canEmail', 1);
                
            }
            else
            {
                $this->Member->saveField('canEmail',0);
            }

            if(!$this->Session->read('avatar'))
            {
                $this->Session->email($_POST['email']);
            }
            
            if(isset($_POST['job']))
            {
                //var_dump($_POST['job']);
                $arr['job_id'] = '';
                $k=0;
                //echo $_POST['jmid'];
                 $this->Jobmember->id = $_POST['jmid'];
                foreach($_POST['job'] as $j)
                {
                    
                    $k++;
                    if($k==1)
                        $jarr['job_id'] = $j;
                    else
                    {
                        $jarr['job_id'] .= ','.$j;
                    }
                        
                }
               // echo $jarr['job_id'];
                //die();
                
                    $this->Jobmember->saveField('job_id',$jarr['job_id']);
                //$jarr['member_id'] = $id;
                
            }
            
            
            $this->Session->setFlash('Data Saved Successfully.');
            $this->redirect('index');
        }
    }
    public function delete($id)
    {
        $this->loadModel('Member');
        if(!$this->Session->read('avatar'))
        $this->redirect('/admin');
        $this->Member->delete($id);
        $this->Session->setFlash('Data Deleted Successfully.');
        $this->redirect('index');
    }
    
    public function check_email()
    {
        $this->loadModel('Member');
        $this->loadModel('User');
        $email = $_POST['email'];
        $a_em = $this->User->find('count',array('conditions'=>array('email'=>$email)));
        $val = $this->Member->find('count',array('conditions'=>array('email'=>$email)));
        if($a_em>0)
        {
            echo "1";
        }
        else if($val>0)
        {
            echo "1";
        }
        else
        {
            echo "0";
        }
        die();
    }
    public function check_name()
    {
        $this->loadModel('Member');
        $this->loadModel('User');
        $full_name = $_POST['full_name'];
        //$a_em = $this->User->find('count',array('conditions'=>array('email'=>$full_name)));
        $val = $this->Member->find('count',array('conditions'=>array('full_name LIKE'=>$full_name)));
        if($val>0)
        {
            echo "1";
        }
        else
        {
            echo "0";
        }
        die();
    }
    
    public function view($id)
    {
        $this->loadModel('EventLog');
        $this->loadModel('Jobmember');
        $this->loadModel('Job');
        $this->set('profile',$this->Member->find('first',array('conditions'=>array('id'=>$id))));
        $this->set('doc_count',$this->EventLog->find('count',array('conditions'=>array('member_id'=>$id,'event_type'=>'Upload Document'))));
        $this->set('assigned',$this->Jobmember->findByMemberId($id));
        $this->set('Job', $this->Job);
        $this->paginate = array('conditions'=>array('member_id'=>$id,'event_type <>'=> 'User Login'),'limit'=>10);
        $user_stat = $this->paginate('EventLog');
        $this->set('user_stat',$user_stat);
    }
	
	public function videos()
    {
    }
	
     public function check_email2($em = '',$id=0)
    {
        $this->loadModel('Member');
              
        $c=$this->Member->find('count',array('conditions'=>array('email'=>$em,'id <>'=>$id)));
        
        if(!trim($em))
        return true;
        if($c>0)
        {
            
            return false;
        }
        else
        {
            
            return true;
        }
        die();
    }
    
    function check_name2()
    {
        $this->loadModel('Member');
        $name = $_POST['full_name'];
        if(isset($_POST['id']))
            $id = $_POST['id'];
        else
            $id = 0;
              
        $c=$this->Member->find('count',array('conditions'=>array('full_name LIKE'=>$name,'id <>'=>$id)));
        
        
        if($c>0)
        {
            
             echo "1";
        }
        else
        {
             echo "0";
        }
        die();
    }
    function make_admin($id,$flag)
    {
        //echo $id.'_'.$flag;die();
        $this->loadModel('User');
        $this->loadModel('Member');
        $this->Member->id = $id;
        $this->Member->saveField('is_admin',$flag);
        if($flag == 1)
        {
            
            $q = $this->Member->findById($id);
            $arr['name_avatar'] = $q['Member']['full_name'];
            $arr['email'] = $q['Member']['email'];
            $arr['password'] = $q['Member']['password'];
            $arr['picture'] = $q['Member']['image'];
            $arr['country'] = 'canada';
            $arr['from_member'] = $id;
            $this->User->create();
            $this->User->save($arr);
            
        }
        else
        {
            $this->User->deleteAll(array('from_member'=>$id));
        }
        die();
    }
    
    function loadextra($type, $uid="")
    {
        $this->loadModel('ReportviewPermission');
        $this->loadModel('EvidenceviewPermission');
        $this->layout = "modal_layout";
       if($type == 'report' )
       {
        /*
           if($uid!="")
            $reportstat = $this->ReportPermission->find('all',array('conditions'=>array('user_id'=>$uid)));
           else
            $reportstat ="";
         */ 
            $this->set('uid',$uid);
           $this->set('reportstat',$this->ReportviewPermission);
           
            $this->render('report_type');
       }
       if($type == 'evidence') 
       {
            $this->set('uid',$uid);
            $this->set('evidencestat',$this->EvidenceviewPermission);
            $this->render('evidence_type');
       }
    }
     function loadupload($type, $uid="")
    {
        $this->loadModel('ReportuploadPermission');
        $this->loadModel('EvidenceuploadPermission');
        $this->loadModel('SiteorderuploadPermission');
        $this->loadModel('EmployeeuploadPermission');
        $this->layout = "modal_layout";
       if($type == 'report' )
       {
       
            $this->set('uid',$uid);
            $this->set('reportstat',$this->ReportuploadPermission);
            $this->render('reportupload_type');
       }
       if($type == 'evidence') 
       {
            $this->set('uid',$uid);
            $this->set('evidencestat',$this->EvidenceuploadPermission);
            $this->render('evidenceupload_type');
       }
       if($type == 'siteorder') 
       {
            $this->set('uid',$uid);
            $this->set('siteorderstat',$this->SiteorderuploadPermission);
            $this->render('siteorderupload_type');
       }
       if($type == 'employee') 
       {
            $this->set('uid',$uid);
            $this->set('employeestat',$this->EmployeeuploadPermission);
            $this->render('employeeupload_type');
       }
    }
    /*function encrypt()
    {
        $q = $this->Member->find('all');
        foreach($q as $a)
        {
            $p = $a['Member']['password'];
            $this->Member->id = $a['Member']['id'];
            $this->Member->saveField('password',md5($p));
        }
        unset($q);
        $this->loadModel('User');
        $q = $this->User->find('all');
        foreach($q as $a)
        {
            $p = $a['User']['password'];
            $this->User->id = $a['User']['id'];
            $this->User->saveField('password',md5($p));
        }
    }*/
}