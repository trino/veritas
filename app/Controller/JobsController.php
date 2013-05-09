<?php
class JobsController extends AppController
{
    public $helpers = array('Html');
     public $paginate = array(
        'limit' => 1
    );
    function __construct(CakeRequest $request, CakeResponse $response)
    {
        parent::__construct($request,$response);
         $this->loadModel('Job');
         $this->loadModel('Member');
         $this->loadModel('Jobmember');
         $this->loadModel('Document');
    }
    public function index()
    {
        if($this->Session->read('avatar') || $this->Session->read('user'))
         {
            
         }
         else
         {
            $this->redirect('/admin');
        }
        if($this->Session->read('avatar'))
        {
            $this->paginate = array('conditions'=>array('isApproved'=>'1'),'limit'=>10);
            $this->set('job',$this->paginate('Job'));
            $this->set('member',$this->Member->find('all'));
            $this->set('jobmember',$this->Jobmember->find('all'));
        }
        else if($this->Session->read('user'))
        {
            $q=$this->Member->find('first',array('conditions'=>array('email'=>$this->Session->read('email'))));
            $id=$q['Member']['id'];
            $jo=$this->Jobmember->find('all',array('conditions'=>array('member_id'=>$id)));
            $data="";
            if($jo)
            {
                foreach($jo as $j)
                {
                    $data.=$j['Jobmember']['job_id'].',';
                }
                $d=rtrim($data, ",");
                $this->paginate = array('conditions'=>'Job.id in ('.$d.')','limit'=>2);
                $t=$this->paginate('Job');
                //$t=$this->Job->find('all', array('conditions'=>'Job.id in ('.$d.')'));
                $this->set('job',$t);
            }
            else
            {
                $this->set('msg','No Job available');
            }
        }
       
    }
    
    public function add()
    {
        if(!$this->Session->read('avatar'))
        $this->redirect('/admin');
        if(isset($_POST['submit']))
        {
            $uri = $_SERVER['REQUEST_URI'];
                $uri = str_replace('/',' ',$uri);
                $uri = str_replace(' ','/',trim($uri));
                if($uri!='jobs'){
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
                
                
            //$image=$_FILES['image']['name'];
            $arr['title'] = $_POST['title'];
            $arr['description'] = $_POST['description'];
            $arr['image'] = $img;
            $arr['date_start'] = $_POST['start_date'];
            $arr['date_end'] = $_POST['end_date'];
            $arr['isApproved'] = '1';
            $this->Job->create();
            $this->Job->save($arr);
            $this->Session->setFlash('Data Saved Successfully');
            $this->redirect('index');
            
        }
    }
     public function edit($id)
     {
        if(!$this->Session->read('avatar'))
        $this->redirect('/admin');
        
        if(isset($_POST['submit']))
        {
            $img=$_FILES['image']['name'];
            if($img!="")
            {
                $uri = $_SERVER['REQUEST_URI'];
                $uri = str_replace('/',' ',$uri);
                $uri = str_replace(' ','/',trim($uri));
                if($uri!='jobs'){
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
                $img =  $_POST['img'];
            }
            $this->Job->id = $id;
            $this->Job->saveField('title',$_POST['title']);
            $this->Job->saveField('description',$_POST['description']);
            $this->Job->saveField('image',$img);
            $this->Job->saveField('date_start',$_POST['start_date']);
            $this->Job->saveField('date_end',$_POST['end_date']);  
            $this->Session->setFlash('Data Saved Successfully');
            $this->redirect('index'); 
        }
        $this->set('j',$this->Job->find('first',array('conditions'=>array('id'=>$id))));
    }
    
     public function delete($id)
    {
        if(!$this->Session->read('avatar'))
        $this->redirect('/admin');
        $this->Job->delete($id);
        $this->Session->setFlash('Data Deleted Successfully');
        $this->redirect('index');
    }
    public function listing()
    {
         if(!$this->Session->read('avatar'))
        $this->redirect('/admin');
        //$this->set('job',$this->Job->find('all'));
        /*if(isset($_POST['submit']))
        {
            $this->set('emp',$this->Member->find('all',array('conditions'=>array('full_name LIKE'=>$_POST['search']."%",'isEmployee'=>'1' ))));
            $this->set('sup',$this->Member->find('all',array('conditions'=>array('full_name LIKE'=>$_POST['search']."%",'isSuperVisor'=>'1' ))));
            
        }
        else
        {
        $this->set('emp',$this->Member->find('all',array('conditions'=>array('isEmployee'=>'1'))));
        $this->set('sup',$this->Member->find('all',array('conditions'=>array('isSupervisor'=>'1'))));
        }*/
        if(isset($_POST['submit']))
        {
            $this->set('user',$this->Member->find('all',array('conditions'=>array('full_name LIKE'=>$_POST['search']."%"))));
        }
        else
        {
            $this->set('user',$this->Member->find('all'));
        }
        
    }
    
    function assign($id)
    {
        if(!$this->Session->read('avatar'))
        $this->redirect('/admin');
        $data = $this->Member->findById($id);
        $this->set('mem',$this->Member->findById($id));
        $this->set('job',$this->Job->find('all'));
        $id  = $data['Member']['id'];
        $this->set('job_id',$this->Jobmember->find('all',array('conditions'=>array('member_id in ('.$id.')'))));
        if(isset($_POST['submit']))
        {
            $arr['job_id']=$_POST['job'];
            $arr['member_id'] = $_POST['member'];
            $this->Jobmember->create();
            $this->Jobmember->save($arr);
            $this->Session->setFlash('Data Saved Successfully.');
            $this->redirect('listing');
        }
    }
    
    public function view($id)
    {
      if($this->Session->read('avatar') || $this->Session->read('user'))
        {
             
        }
        else
            $this->redirect('/admin');
           
        $this->set('job',$this->Job->find('first',array('conditions'=>array('id'=>$id))));
        $this->set('contract',$this->Document->find('count',array('conditions'=>array('job_id'=>$id,'document_type'=>'contract'))));
        $this->set('post_order',$this->Document->find('count',array('conditions'=>array('document_type'=>'post_order','job_id'=>$id))));
        $this->set('audits',$this->Document->find('count',array('conditions'=>array('document_type'=>'audits','job_id'=>$id))));
        $this->set('training_manuals',$this->Document->find('count',array('conditions'=>array('document_type'=>'training_manuals','job_id'=>$id))));
    }
    
    public function view_doc($type,$id)
    {
        if($this->Session->read('avatar') || $this->Session->read('user'))
        {
            if(!$this->Session->read('view')=='1')
            {
             $this->redirect('/jobs/');   
            }  
            
        }
        else
            $this->redirect('/admin');
        $do=$this->Document->find('all',array('conditions'=>array('job_id'=>$id,'document_type'=>$type)));
        if($do)
        $this->set('doc',$do);
        else
        $this->set('message','No Document Available');
        
    }
    
    public function sorting()
    {
        $order = $_POST['order'];
        $type = $_POST['type'];
        if($type=="employee")
        {
            $data=$this->Member->find('all',array('conditions'=>array('isEmployee'=>'1'),'order'=>'full_name '.$order));
        }
        else if($type=="supervisor")
        {
            $data=$this->Member->find('all',array('conditions'=>array('isSupervisor'=>'1'),'order'=>'full_name '.$order));
        }
        $value="";
        foreach($data as $d)
        {
            $value.=$d['Member']['full_name']."<a href='/jobs/assign/".$d['Member']['id']."'>Assign</a><br>";
        }
        echo $value;
        die();
        
    }
    
    public function pending()
    {
        if(!$this->Session->read('avatar'))
            $this->redirect('/admin');
        
        $this->set('jobs',$this->Job->find('all',array('conditions'=>array('isApproved'=>'0'))));
    }
    public function approve()
    {
        If(!$this->Session->read('avatar'))
            $this->redirect('/admin');
        $this->Job->id=$_POST['id'];
        $this->Job->saveField('isApproved','1');
        echo "1";
        die();
    }
    
}