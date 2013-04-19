<?php
    class CompController extends AppController
    {
        public $helpers = array('Html');
        function __construct(CakeRequest $request, CakeResponse $response)
        {
            parent::__construct($request,$response);#
            $this->loadModel('Company');
            $this->loadModel('Job');
            $this->loadModel('Member');
        }
        public function index()
        {
            if(!$this->Session->read('avatar'))
             $this->redirect('/admin');
            
            $this->set('company',$this->Company->find('all'));
        }
        
        public function register()
        {
            if(!$this->Session->read('avatar'))
            {
                $this->redirect('/admin');
            }
            if(isset($_POST['submit']))
            {
                $uri = $_SERVER['REQUEST_URI'];
                $uri = str_replace('/',' ',$uri);
                $uri = str_replace(' ','/',trim($uri));
                if($uri!='company'){
                $arr_uri = explode('/',$uri);
                $path = $_SERVER['DOCUMENT_ROOT'].'/app/webroot/img/uploads/';
                }
                else
                $path = $_SERVER['DOCUMENT_ROOT'].'app/webroot/img/uploads/';
                
                $source = $_FILES['image']['tmp_name'];
                $destination = $path.$_FILES['image']['name'];
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
                $image = imagecreatefromjpeg($destination);
            	imagecopyresampled($virtual_image, $image, 0, 0, 0, 0, $width, $height, $w, $h);
            	imagejpeg($virtual_image, $destination);   
                $img=$_FILES['image']['name'];
                
                $arr['full_name'] = $_POST['name'];
                $arr['company'] = $_POST['company'];
                $arr['email'] = $_POST['email'];
                $arr['password'] = $_POST['password'];
                $arr['phone'] = $_POST['phone'];
                $arr['no_of_worker'] = $_POST['worker'];
                $arr['description'] = $_POST['description'];
                $arr['image'] = $img;
                $this->Company->create();
                $this->Company->save($arr);
                $this->Session->setFlash('Data added Successfully');
                $this->redirect('/comp');

            }
            
        }
        public function member()
        {
            if(isset($_POST['submit']))
            {
                
                $un=$_POST['username'];
                $pass=$_POST['password'];
                $q = $this->Company->find('first',array('conditions'=>array('email'=>$un,'password'=>$pass)));
                if($q)
                {
                 $this->Session->write(array('company'=>$q['Company']['company'],'id'=>$q['Company']['id'],'image'=>$q['Company']['image']));
                 $this->redirect('dashboard');   
                }
                else
                {
                    $this->set('msg','Username and Password donot match.');
                }
                
            }
            
        }
        
        public function dashboard()
        {
            if(!$this->Session->read('company'))
            $this->redirect('member');
            $this->set('job',$this->Job->find('all',array('conditions'=>array('addedBy'=>$this->Session->read('id'),'isApproved'=>1))));
        }
        
        public function check_email()
        {
            $em=$_POST['em'];
            $c=$this->Company->find('count',array('conditions'=>array('email'=>$em)));
            if($c>0)
            {
                echo "0";
            }
            else
            {
                echo "1";
            }
            die();
        }
        
        
        public function delete()
        {
            if(!$this->Session->read('company'))
                $this->redirect('member');  
             $this->Job->delete($id);
            $this->Session->setFlash('Data Deleted Successfully'); 
        }
        
        public function edit_company($id)
        {
            if(!$this->Session->read('avatar'))
                $this->redirect('/admin');
             $this->set('company',$this->Company->find('first',array('conditions'=>array('id'=>$id))));
             if(isset($_POST['submit']))
             {
                if($_FILES['image']['name']!="")
                {
                    $uri = $_SERVER['REQUEST_URI'];
                    $uri = str_replace('/',' ',$uri);
                    $uri = str_replace(' ','/',trim($uri));
                    if($uri!='company'){
                    $arr_uri = explode('/',$uri);
                    $path = $_SERVER['DOCUMENT_ROOT'].'/app/webroot/img/uploads/';
                    }
                    else
                    $path = $_SERVER['DOCUMENT_ROOT'].'app/webroot/img/uploads/';
                
                    $source = $_FILES['image']['tmp_name'];
                    $destination = $path.$_FILES['image']['name'];
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
                    $image = imagecreatefromjpeg($destination);
            	   imagecopyresampled($virtual_image, $image, 0, 0, 0, 0, $width, $height, $w, $h);
            	   imagejpeg($virtual_image, $destination);   
                   $image = $_FILES['image']['name'];
                }
                else
                {
                    $image = $_POST['old_image'];
                }
                $this->Company->id=$id;
                $this->Company->saveField('full_name',$_POST['name']);
                $this->Company->saveField('company',$_POST['company']);
                $this->Company->saveField('phone',$_POST['phone']);
                $this->Company->saveField('no_of_worker',$_POST['worker']);
                $this->Company->saveField('description',$_POST['description']);
                $this->Company->saveField('image',$image);
                $this->Session->setFlash('Data Saved Successfully');
                $this->redirect('index');
             } 
                
        }
        function view($id)
        {
            if(!$this->Session->read('avatar'))
                $this->redirect('/admin');
            $this->set('c',$this->Company->find('first',array('conditions'=>array('id'=>$id))));
        }
        function delete_company($id)
        {
            if(!$this->Session->read('avatar'))
                $this->redirect('/admin');
            $this->Company->delete($id);
            $this->Session->setFlash('Data Deleted Successfully');
            $this->redirect('index');
        }
        
    }