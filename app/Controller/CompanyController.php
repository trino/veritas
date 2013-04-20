<?php 
    class CompanyController extends AppController
    {
        public $helpers = array('Html');
         var $components = array('Email');
        function __construct(CakeRequest $request, CakeResponse $response)
        {
            parent::__construct($request,$response);#
            $this->loadModel('Company');
            $this->loadModel('Job');
            $this->loadModel('Page');
            $this->layout = "user";
        }
        public function index()
        {
            if(isset($_POST['submit']))
            {
			debug($_POST);
                $un=$_POST['username'];
                $pw=$_POST['password'];
                $q=$this->Company->find('first',array('conditions'=>array('email'=>$un,'password'=>$pw)));
                if($q)
                {
                    $this->Session->write(array('company'=>$q['Company']['company'],'id'=>$q['Company']['id'],'image'=>$q['Company']['image'],'email'=>$_POST['username']));
                    $this->redirect('dashboard');
                }
                else
                {
                    $this->Session->setFlash('Username and Password donot match.');
                }
            }
            $this->set('page',$this->Page->find('first'));
        }
        
        public function dashboard()
        {
            if(!$this->Session->read('company'))
                $this->redirect('/company');
            $this->set('job',$this->Job->find('all',array('conditions'=>array('addedBy'=>$this->Session->read('id')))));
        }
        public function add()
        {
            if(!$this->Session->read('company'))
            $this->redirect('/');
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
                
                $image=$_FILES['image']['name'];
                $arr['title'] = $_POST['title'];
                $arr['description'] = $_POST['description'];
                $arr['image'] = $image;
                $arr['date_start'] = $_POST['start_date'];
                $arr['date_end'] = $_POST['end_date'];
                $arr['addedBy'] = $this->Session->read('id');
                $this->Job->create();
                $this->Job->save($arr);
                $this->Session->setFlash('Data Saved Successfully');
                $this->Email->from    = $this->Session->read('email');
                $this->Email->to = 'adiksudip@gmail.com';
                $this->Email->subject = "New Job Added";
                $message="Hi there ! A new job has been added by".$this->Session->read('company').". Please Login to see the message";
                $this->Email->send($message);
                $this->redirect('dashboard');
            }
        }
        
        public function edit($id)
     {
        if(!$this->Session->read('company'))
        $this->redirect('index');
        
        if(isset($_POST['submit']))
        {
            $img=$_FILES['image']['name'];
            if($img!="")
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
                $image=$_FILES['image']['name'];
            }
            else
            {
                $image =  $_POST['img'];
            }
            $this->Job->id = $id;
            $this->Job->saveField('title',$_POST['title']);
            $this->Job->saveField('description',$_POST['description']);
            $this->Job->saveField('image',$image);
            $this->Job->saveField('date_start',$_POST['start_date']);
            $this->Job->saveField('date_end',$_POST['end_date']);  
            $this->Session->setFlash('Data Saved Successfully');
            $this->redirect('dashboard'); 
        }
        $this->set('j',$this->Job->find('first',array('conditions'=>array('id'=>$id))));
    }
    
    public function delete($id)
    {
        if(!$this->Session->read('company'))
            $this->redirect('index');
        $this->Job->delete($id);
    }
    
    public function view($id)
    {
        if(!$this->Session->read('company'))
            $this->redirect('/company');
        $this->set('j',$this->Job->find('first',array('conditions'=>array('id'=>$id))));
    }
    
    public function settings()
    {
        if(!$this->Session->read('company'))
         $this->redirect('index');
         if(isset($_POST['submit']))
         {
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
             }
             else
             {
                $img = $this->Session->read('image');
             }
             $this->Company->id = $this->Session->read('id');
             $this->Company->saveField('email',$_POST['email']);
             $this->Company->saveField('password',$_POST['password']);
             $this->Company->saveField('image',$img);
             $this->Session->setFlash('Data Saved Successfully.');
             $this->Session->write(array('image'=>$img));
            
         }

          $this->set('c',$this->Company->find('first',array('conditions'=>array('id'=>$this->Session->read('id')))));
    }
    
    public function check_pass()
    {
        $pass=$_POST['pass'];
        $c=$this->Company->find('count',array('conditions'=>array('password'=>$pass,'id'=>$this->Session->read('id'))));
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
    
    public function check_email()
    {
        $em=$_POST['email'];
        $c=$this->Company->find('count',array('conditions'=>array('email'=>$em,'id !='=>$this->Session->read('id'))));
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
    public function logout()
    {
        $this->Session->destroy();
        $this->redirect('/company');
    }
}