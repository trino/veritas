<?php
class JobsController extends AppController
{
    public $helpers = array('Html');
     public $paginate = array(
        'limit' => 10
    );
    function __construct(CakeRequest $request, CakeResponse $response)
    {
        parent::__construct($request,$response);
         $this->loadModel('Job');
         $this->loadModel('Member');
         $this->loadModel('Key_contact');
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
            $q=$this->Member->find('first',array('conditions'=>array('id'=>$this->Session->read('id'))));
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
                $this->paginate = array('conditions'=>'Job.id in ('.$d.')','limit'=>10);
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
            if(isset($_FILES['image']['name'])&&$_FILES['image']['name']){
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
                }
                else
                $img = 'generic_job.jpg';
                
            //$image=$_FILES['image']['name'];
            $arr['title'] = $_POST['title'];
            $arr['description'] = $_POST['description'];
            $arr['image'] = $img;
            $arr['date_start'] = $_POST['start_date'];
            $arr['date_end'] = $_POST['end_date'];
            $arr['isApproved'] = '1';
            
            $this->Job->create();
            $this->Job->save($arr);
            
            $job_id = $this->Job->id;
            $key_title = $_POST['key_title'];
            $key_name = $_POST['key_name'];
            $key_cell = $_POST['key_cell'];
            $key_email = $_POST['key_email'];
            $key_company = $_POST['key_company'];
            $key_number = $_POST['key_number'];
            
            for($i= 0; $i<count($key_title); $i++)
            {
              
              $key['title'] = $key_title[$i];
              $key['company'] = $key_company[$i];
              $key['phone'] = $key_number[$i];
              $key['cell'] = $key_cell[$i];
              $key['email'] = $key_email[$i];
              $key['name'] = $key_name[$i];
              $key['job_id'] = $job_id;
              
              if($key_title[$i]!="")
              {
                $this->Key_contact->create();
                $this->Key_contact->save($key);
              } 
                
            }
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
            
            //Key Contacts
            $this->Key_contact->deleteAll(array('job_id'=>$id));
            
            $job_id = $id;
            $key_title = $_POST['key_title'];
            //var_dump($_POST); die();
            $key_company = $_POST['key_company'];
            $key_number = $_POST['key_number'];
            $key_name = $_POST['key_name'];
            $key_cell = $_POST['key_cell'];
            $key_email = $_POST['key_email'];
            
            for($i= 0; $i<count($key_title); $i++)
            {
              $key['title'] = $key_title[$i];
              $key['company'] = $key_company[$i];
              $key['phone'] = $key_number[$i];
              $key['cell'] = $key_cell[$i];
              $key['email'] = $key_email[$i];
              $key['name'] = $key_name[$i];
              $key['job_id'] = $job_id;
              if($key_title[$i]!="")
              {
                  $this->Key_contact->create();
                  $this->Key_contact->save($key);
              }
                
            }
             
            $this->Session->setFlash('Data Saved Successfully');
            $this->redirect('index'); 
        }
        $this->set('j',$this->Job->find('first',array('conditions'=>array('id'=>$id))));
        $this->set('keys', $this->Key_contact->find('all', array('conditions'=>array('job_id'=>$id))));
    }
    
     public function delete($id)
    {
        if(!$this->Session->read('avatar'))
        $this->redirect('/admin');
        
        $this->Job->delete($id);
        $this->loadModel('Jobmember');
        $this->loadModel('Document');
        $docs = $this->Document->findAllByJobId($id);
        //var_dump($docs);
        foreach($docs as $d)
        {
            $id = $d['Document']['id'];
            $job_id = '-1';
            $this->Document->id = $id;
            $this->Document->saveField('job_id',$job_id);
            //die();
        }
        $q = $this->Jobmember->find('all',array('conditions'=>array('OR'=>array(array('job_id'=>$id),array('job_id LIKE'=>$id.',%'),array('job_id LIKE'=>'%,'.$id),array('job_id LIKE'=>'%,'.$id.',%')))));
        if($q)
        {
            foreach($q as $j)
            {
                $this->Jobmember->id = $j['Jobmember']['id'];
                $job_id = $j['Jobmember']['job_id'];
                $job_id = str_replace(','.$id.',',',',$job_id);
                if($job_id[0]==$id && $job_id[1]==',')
                {
                    $job_ids = '';
                    for($i=2;$i<strlen($job_id);$i++)
                    {
                        $job_ids .= $job_id[$i];
                    }
                    if($job_ids!='')
                    $job_id = $job_ids;
                }
                if(str_replace(',','',$job_id)!=$job_id)
                {
                    
                    if($job_id[strlen($job_id)-1] == $id && $job_id[strlen($job_id)-2] == ','){
                    $job_ids = '';
                    for($i=0;$i<(strlen($job_id)-2);$i++)
                    {
                        $job_ids .= $job_id[$i];
                    } 
                    if($job_ids!='')   
                    $job_id = $job_ids;
                    }
                }
                else
                {
                    if($job_id == $id)
                    $job_id ='';
                }
                //echo $job_id;die();
                $this->Jobmember->saveField('job_id',$job_id);
            }
        }
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
        $this->set('job_id',$this->Jobmember->find('first',array('conditions'=>array('member_id' =>$id))));
        if(isset($_POST['submit']))
        {
            //var_dump($_POST);            
            $arr['job_id']=$_POST['job'];
            $arr['member_id'] = $_POST['member'];
            $q = $this->Jobmember->find('first',array('conditions'=>array('member_id' =>$id)));
            if($q){
            $this->Jobmember->id = $q['Jobmember']['id'];
            $this->Jobmember->saveField('job_id',$arr['job_id']);
            }
            else
            {
                $this->Jobmember->create();
                $this->Jobmember->save($arr);
            }                        
            $this->Session->setFlash('Data Saved Successfully.');
            $this->redirect('listing');
        }
    }
    
    public function view($id)
    {
        $this->loadModel('Canupload');
        $this->loadModel('Canview');
      if($this->Session->read('avatar') || $this->Session->read('user'))
        {
             
        }
        else
            $this->redirect('/admin');
           
        $this->set('job',$this->Job->find('first',array('conditions'=>array('id'=>$id))));
        if($this->Session->read('user'))
        {
            $ids = $this->Session->read('id');
            if($canview = $this->Canview->find('first',array('conditions'=>array('member_id'=>$ids))))
                $this->set('canview',$canview);
            if($canupdate = $this->Canupload->find('first', array('conditions'=>array('member_id'=>$ids))))
                $this->set('canupdate',$canupdate);
        }    
        $this->set('contract',$this->Document->find('count',array('conditions'=>array('job_id'=>$id,'document_type'=>'contract'))));
        $this->set('evidence',$this->Document->find('count',array('conditions'=>array('document_type'=>'evidence','job_id'=>$id))));
        $this->set('template',$this->Document->find('count',array('conditions'=>array('document_type'=>'template','job_id'=>$id))));
        $this->set('report',$this->Document->find('count',array('conditions'=>array('document_type'=>'report','job_id'=>$id))));
        $this->set('keys', $this->Key_contact->find('all', array('conditions'=>array('job_id'=>$id))));
        $this->set('member',$this->Member->find('all'));
        $this->set('jobmember',$this->Jobmember->find('all'));
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
        $do=$this->Document->find('all',array('conditions'=>array('job_ids'=>$id,'document_type'=>$type)));
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