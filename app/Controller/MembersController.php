<?php
class MembersController extends AppController
{
     public $paginate = array(
        'limit' => 3
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
    public function add()
    {
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
            }    
                //$image = imagecreatefromjpeg($destination);
            //	imagecopyresampled($virtual_image, $image, 0, 0, 0, 0, $width, $height, $w, $h);
            //	imagejpeg($virtual_image, $destination);
            
            $arr['full_name']=$_POST['full_name'];
            $arr['name_avatar'] = $_POST['avatar'];
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
            $this->Session->setFlash('Data Saved Successfully.');
            $this->redirect('index');
             
        }
    }
    public function edit($id)
    {
        $this->loadModel('Member');
        if(!$this->Session->read('avatar'))
        $this->redirect('/admin');
        $this->set('m',$this->Member->find('first',array('conditions'=>array('id'=>$id))));
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
            $this->Member->id = $id;
            $this->Member->saveField('full_name',$_POST['full_name']);
            $this->Member->saveField('name_avatar',$_POST['avatar']);
            $this->Member->saveField('title',$_POST['title']);
            $this->Member->saveField('address',$_POST['address']);
            $this->Member->saveField('email',$_POST['email']);
            $this->Member->saveField('phone',$_POST['phone']);
            $this->Member->saveField('password',$_POST['password']);
            if(isset($_POST['canView']))
            {
                $this->Member->saveField('canView', 1);
            }
            else
            {
                $this->Member->saveField('canView',0);
            }
            if(isset($_POST['canUpdate']))
            {
                $this->Member->saveField('canUpdate', 1);
            }
            else
            {
                $this->Member->saveField('canUpdate',0);
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
    public function view($id)
    {
        $this->set('profile',$this->Member->find('first',array('conditions'=>array('id'=>$id))));
    }
     public function check_email2($em = '',$id=0)
    {
        $this->loadModel('Member');
              
        $c=$this->Member->find('count',array('conditions'=>array('email'=>$em,'id !='=>$id)));
        

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
}