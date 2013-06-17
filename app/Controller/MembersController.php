<?php
class MembersController extends AppController
{
     public $paginate = array(
        'limit' => 10
    );
    public function index()
    {
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
    function searchlist()
    {
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
        $this->loadModel('Canview');
        $this->loadModel('Canupload');
        $this->loadModel('Emailupload');
        if(isset($_POST['email'])){
            $email = $_POST['email'];
        $q=$this->Member->find('first',array('conditions'=>array('email'=>$email)));
        if($q){
        $this->Session->setFlash('Email already exist');
        $this->redirect('add');
        }}
        $this->loadModel('Member');
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
                $img = 'generic_user.jpg';
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
            $arr['password'] = $_POST['password'];
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
                $canview['contracts'] = (isset($_POST['canView_contracts']))? '1' : '0'  ;
                $canview['evidence'] = (isset($_POST['canView_evidence']))? '1' : '0'  ;
                $canview['templates'] = (isset($_POST['canView_templates']))? '1' : '0'  ;
                $canview['report'] = (isset($_POST['canView_client_memo']))? '1' : '0'  ;
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
                $this->Canview->create();
                $this->Canview->save($canview);
                
            }
            
            if(isset($_POST['canUpdate']))
            {
                $this->Canupload->deleteAll(array('member_id'=>$id));
                $canupdate['member_id'] = $id;
                $canupdate['contracts'] = (isset($_POST['canUpload_contracts']))? '1' : '0'  ;
                $canupdate['evidence'] = (isset($_POST['canUpload_evidence']))? '1' : '0'  ;
                $canupdate['templates'] = (isset($_POST['canUpload_templates']))? '1' : '0'  ;
                $canupdate['report'] = (isset($_POST['canUpload_client_memo']))? '1' : '0'  ;
                $canupdate['client_feedback'] = (isset($_POST['canUpload_client_memo1']))? '1' : '0'  ;
                
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
                $canupdate['client_feedback'] = '0' ;
                $this->Canupload->create();
                $this->Canupload->save($canupdate);
            }
            
            if(isset($_POST['canEdit']))
            {
                if(isset($_POST['receive2']))
                {
                    
                    $this->Emailupload->deleteAll(array('member_id'=>$id));
                    $emailupload['member_id'] = $id;
                    $emailupload['contract'] = (isset($_POST['Email_contracts']))? '1' : '0'  ;
                    $emailupload['evidence'] = (isset($_POST['Email_evidence']))? '1' : '0'  ;
                    $emailupload['template'] = (isset($_POST['Email_templates']))? '1' : '0'  ;
                    $emailupload['report'] = (isset($_POST['Email_client_memo']))? '1' : '0'  ;
                    $emailupload['client_feedback'] = (isset($_POST['Email_client_memo1']))? '1' : '0'  ;
                    
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
                    $emailupload['client_feedback'] = '0' ;
                    $this->Emailupload->create();
                    $this->Emailupload->save($emailupload);
                }
            }
            
            $this->Session->setFlash('Data Saved Successfully.');
            $this->redirect('index');
             
        }
    }
    public function edit($id)
    {
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
            $this->Member->saveField('password',$_POST['password']);
            if(isset($_POST['canView']))
            {
                $this->Member->saveField('canView', 1);
                $this->Canview->deleteAll(array('member_id'=>$id));
                $canview['member_id'] = $id;
                $canview['contracts'] = (isset($_POST['canView_contracts']))? '1' : '0'  ;
                $canview['evidence'] = (isset($_POST['canView_evidence']))? '1' : '0'  ;
                $canview['templates'] = (isset($_POST['canView_templates']))? '1' : '0'  ;
                $canview['report'] = (isset($_POST['canView_client_memo']))? '1' : '0'  ;
                $this->Canview->create();
                $this->Canview->save($canview);
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
                $this->Canview->create();
                $this->Canview->save($canview);
            }
            if(isset($_POST['canUpdate']))
            {
                $this->Member->saveField('canUpdate', 1);
                $this->Canupload->deleteAll(array('member_id'=>$id));
                $canupdate['member_id'] = $id;
                $canupdate['contracts'] = (isset($_POST['canUpload_contracts']))? '1' : '0'  ;
                $canupdate['evidence'] = (isset($_POST['canUpload_evidence']))? '1' : '0'  ;
                $canupdate['templates'] = (isset($_POST['canUpload_templates']))? '1' : '0'  ;
                $canupdate['report'] = (isset($_POST['canUpload_client_memo']))? '1' : '0'  ;
                $canupdate['client_feedback'] = (isset($_POST['canUpload_client_memo1']))? '1' : '0'  ;
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
                $canupdate['client_feedback'] = '0'  ;
            }
            if(isset($_POST['canEdit']))
            {
                if(isset($_POST['receive2']))
                {
                    
                    $this->Emailupload->deleteAll(array('member_id'=>$id));
                    $emailupload['member_id'] = $id;
                    $emailupload['contract'] = (isset($_POST['Email_contracts']))? '1' : '0'  ;
                    $emailupload['evidence'] = (isset($_POST['Email_evidence']))? '1' : '0'  ;
                    $emailupload['template'] = (isset($_POST['Email_templates']))? '1' : '0'  ;
                    $emailupload['report'] = (isset($_POST['Email_client_memo']))? '1' : '0'  ;
                    $emailupload['client_feedback'] = (isset($_POST['Email_client_memo1']))? '1' : '0'  ;
                    
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
                    $emailupload['client_feedback'] = '0' ;
                    $this->Emailupload->create();
                    $this->Emailupload->save($emailupload);
                }
           
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
                
            }
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
        $this->set('profile',$this->Member->find('first',array('conditions'=>array('id'=>$id))));
    }
     public function check_email2($em = '',$id=0)
    {
        $this->loadModel('Member');
              
        $c=$this->Member->find('count',array('conditions'=>array('email'=>$em,'id <>'=>$id)));
        

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
}