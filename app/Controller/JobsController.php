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
         $this->loadModel('Job_contact');
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
                if($d){
                $this->paginate = array('conditions'=>'Job.id in ('.$d.')','limit'=>10);
                $t=$this->paginate('Job');
                //$t=$this->Job->find('all', array('conditions'=>'Job.id in ('.$d.')'));
                $this->set('job',$t);
                }
                else
                $this->set('job','');
            }
            else
            {
                $this->set('msg','No Job available');
            }
        }
       
    }
    
    public function add()
    {
        $test2 = $this->Job->find('first',array('conditions'=>array('is_special'=>1)));
        if($test2)
        {
            $spe2 = $test2['Job']['id'];
        }
        $this->loadModel('Member');
        $this->set('member',$this->Member->find('all',array('conditions'=>array('id NOT IN (SELECT member_id FROM jobmembers WHERE job_id = \''.$spe2.'\')'))));
        if(!$this->Session->read('avatar'))
            $this->redirect('/admin');
            
        $this->set('kc',$this->Key_contact->find('all'));    
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
                $img = 'afimaclogo.png';
                
            //$image=$_FILES['image']['name'];
            $arr['title'] = $_POST['title'];
            $arr['description'] = $_POST['description'];
            $arr['image'] = $img;
            $arr['date_start'] = $_POST['start_date'];
            $arr['date_end'] = $_POST['end_date'];
            $arr['isApproved'] = '1';
            $arr['status'] = $_POST['status'];
            
            $this->Job->create();
            $this->Job->save($arr);
            $project['job_id'] = $this->Job->id;
            $project['client_name'] = $_POST['title'];
            $this->loadModel('Projectboard');
            $this->Projectboard->create();
            $this->Projectboard->save($project);
            $key['job_id'] = $this->Job->id;
            if(isset($_POST['member']))
            {
                $me = '';
                $this->loadModel('Jobmember');
                foreach($_POST['member'] as $mem)
                {
                    $check = $this->Jobmember->find('first',array('conditions'=>array('member_id'=>$mem)));
                    if($check)
                    {
                        
                        $this->Jobmember->id = $check['Jobmember']['id'];
                        if($check['Jobmember']['job_id']=='')
                        $this->Jobmember->saveField('job_id',$key['job_id']);
                        else
                        $this->Jobmember->saveField('job_id',$check['Jobmember']['job_id'].','.$key['job_id']);
                    }
                    else{
                    $this->Jobmember->create();
                    $chh['job_id'] = $key['job_id'];
                    $chh['member_id'] = $mem;
                    $this->Jobmember->save($chh);
                    }
                }
            }
            $id = $key['job_id'];
            foreach($_POST['key_contact'] as $k)
            {
                $key['key_id'] = $k;
                $t = $this->Key_contact->findById($k);
                $key['type'] = $t['Key_contact']['type'];
                $this->Job_contact->create();
                $this->Job_contact->save($key);
                
            }
            foreach($_POST['key_name'] as $k=>$t)
            {
                if($t != "")
                {
                    $keys['name'] = $t;
                    $keys['type'] = $_POST['type'][$k]; 
                    $keys['email'] = $_POST['key_email'][$k]; 
                    $keys['cell'] = $_POST['key_cell'][$k];
                    $keys['cellular_provider'] = $_POST['key_cellular'][$k];
                    $keys['title'] = $_POST['key_title'][$k]; 
                    $keys['company'] = $_POST['key_company'][$k]; 
                    $keys['phone'] = $_POST['key_number'][$k]; 
                    $this->Key_contact->create();
                    $this->Key_contact->save($keys);
                    $i = $this->Key_contact->id; 
                    $ke['job_id'] = $id;
                    $ke['key_id'] = $i;
                    $ke['type'] = $_POST['type'][$k];
                    $this->Job_contact->create();
                    $this->Job_contact->save($ke);
                    
                    
                }
                
            }
                        
            $this->Session->setFlash('Data Saved Successfully.');
            $this->redirect('index');
            
        }
    }
     public function edit($id)
     {
        $test = $this->Job->findById($id);
        $test2 = $this->Job->find('first',array('conditions'=>array('is_special'=>1)));
        
        if($test['Job']['is_special'] == 1){
        $spe = 1;
        $this->set('spe',1);
        }
        if($test2)
        {
            $spe2 = $test2['Job']['id'];
        }
        $this->set('jobid',$id);
        $this->loadModel('Member');
        
        if(!$test2){
        if(!isset($spe))    
        $this->set('member',$this->Member->find('all'));
        else
        $this->set('member',$this->Member->find('all',array('conditions'=>array('id IN (SELECT member_id FROM jobmembers WHERE job_id = \'\')'))));
        }
        else{
        if(isset($spe))    
        $this->set('member',$this->Member->find('all',array('conditions'=>array('id IN (SELECT member_id FROM jobmembers WHERE job_id = \''.$spe2.'\' OR job_id = \'\')'))));
        else
        $this->set('member',$this->Member->find('all',array('conditions'=>array('id NOT IN (SELECT member_id FROM jobmembers WHERE job_id = \''.$spe2.'\')'))));
        }
        
        
        $jid = $this->Jobmember->find('all',array('conditions'=>array('OR'=>array(array('job_id'=>$id),array('job_id LIKE'=>$id.',%'),array('job_id LIKE'=>'%,'.$id.',%'),array('job_id LIKE'=>'%,'.$id)))));
        $mem_arr = array();
        if($jid)
        {
            
            foreach($jid as $jm)
            {
                $mem_arr[] = $jm['Jobmember']['member_id'];
            }
        }
        $this->set('mem_arr',$mem_arr);
        if(!$this->Session->read('avatar'))
        $this->redirect('/admin');
        $this->set('kc',$this->Key_contact->find('all')); 
        $jc = $this->Job_contact->find('all',array('conditions'=>array('job_id'=>$id)));
        $this->set('jc',$jc);   
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
            $this->Job->saveField('status',$_POST['status']); 
            
            
            $project['job_id'] = $id;
            $project['client_name'] = $_POST['title'];
            $this->loadModel('Projectboard');
            $pro = $this->Projectboard->find('first',array('conditions'=>array('job_id'=>$id)));
            $this->Projectboard->id = $pro['Projectboard']['id'];
            $this->Projectboard->save($project);
            //Key Contacts
            $this->Job_contact->deleteAll(array('job_id'=>$id));
            $key['job_id'] = $id;
            if(isset($_POST['member']))
            {
                $me = '';
                $this->loadModel('Jobmember');
                foreach($_POST['member'] as $mem)
                {
                    
                    $check = $this->Jobmember->find('first',array('conditions'=>array('member_id'=>$mem)));
                    if($check)
                    {
                        
                        $this->Jobmember->id = $check['Jobmember']['id'];
                        if($check['Jobmember']['job_id']=='')
                        $this->Jobmember->saveField('job_id',$key['job_id']);
                        else{
                        $ch = explode(',',$check['Jobmember']['job_id']);
                        if(!in_array($id,$ch))    
                        $this->Jobmember->saveField('job_id',$check['Jobmember']['job_id'].','.$key['job_id']);
                        }
                    }
                    else{
                    $this->Jobmember->create();
                    $chh['job_id'] = $key['job_id'];
                    $chh['member_id'] = $mem;
                    $this->Jobmember->save($chh);
                    }
                }
            }
            foreach($_POST['key_contact'] as $k)
            {
                $key['key_id'] = $k;
                $t = $this->Key_contact->findById($k);
                $key['type'] = $t['Key_contact']['type'];
                $this->Job_contact->create();
                $this->Job_contact->save($key);
                
            }
            
            foreach($_POST['key_name'] as $k=>$t)
            {
                if($t != "")
                {
                    $keys['name'] = $t;
                    $keys['type'] = $_POST['type'][$k]; 
                    $keys['email'] = $_POST['key_email'][$k]; 
                    $keys['cell'] = $_POST['key_cell'][$k];
                    $keys['cellular_provider'] = $_POST['key_cellular'][$k];
                    $keys['title'] = $_POST['key_title'][$k]; 
                    $keys['company'] = $_POST['key_company'][$k]; 
                    $keys['phone'] = $_POST['key_number'][$k]; 
                    $this->Key_contact->create();
                    $this->Key_contact->save($keys);
                    $i = $this->Key_contact->id; 
                    $ke['job_id'] = $id;
                    $ke['key_id'] = $i;
                    $ke['type'] = $_POST['type'][$k];
                    $this->Job_contact->create();
                    $this->Job_contact->save($ke);
                    
                    
                }
                
            }
            
             
            $this->Session->setFlash('Data Saved Successfully.');
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
        
        $this->loadModel('Projectboard');
        $pro = $this->Projectboard->find('first',array('conditions'=>array('job_id'=>$id)));
        $this->Projectboard->delete($pro['Projectboard']['id']);
        
        $this->loadModel('Jobmember');
        $this->loadModel('Document');
        $docs = $this->Document->findAllByJobId($id);
        //var_dump($docs);
        foreach($docs as $d)
        {
            $jid = $d['Document']['id'];
            //$job_id = '-1';
            //$this->Document->id = $id;
            //$this->Document->saveField('job_id',$job_id);
            $this->Document->delete($jid);
            
            //die();
        }
        $this->loadModel('Job_contact');
        $q = $this->Job_contact->find('all',array('conditions'=>array('job_id'=>$id)));
            if($q)
            {
                foreach($q as $a)
                {
                    $this->Job_contact->delete($a['Job_contact']['id']);
                }
            }
            unset($q);
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
        $this->Session->setFlash('Data Deleted Successfully.');
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
            $this->paginate = array('conditions'=>array('full_name LIKE'=>$_POST['search']."%"),'limit'=>10);
            $this->set('user',$this->paginate('Member'));
        }
        else
        {
            $this->paginate = array('limit'=>10);
            $this->set('user',$this->paginate('Member'));
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
        if($id=='all')
        $this->redirect('index');
        $this->loadModel('Canupload');
        $this->loadModel('Canview');
        $this->loadModel('AdminDoc');
        $this->loadModel('SpecJob');
        $this->set('admin_doc',$this->AdminDoc->findById('1'));
      if($this->Session->read('avatar') || $this->Session->read('user'))
        {
             
        }
        else
            $this->redirect('/admin');
           
        $this->set('job',$this->Job->find('first',array('conditions'=>array('id'=>$id))));
        if($this->Session->read('user'))
        {
            $ids = $this->Session->read('id');
            $this->loadModel('Jobmember');
            $ch = $this->Jobmember->find('first',array('conditions'=>array('member_id'=>$ids,'OR'=>array(array('job_id'=>$id),array('job_id LIKE'=>$id.',%'),array('job_id LIKE'=>'%,'.$id.',%'),array('job_id LIKE'=>'%,'.$id)))));
            if(!$ch)
            {
                $this->redirect('index');
            }
            
            if($canview = $this->Canview->find('first',array('conditions'=>array('member_id'=>$ids))))
                $this->set('canview',$canview);
            if($canupdate = $this->Canupload->find('first', array('conditions'=>array('member_id'=>$ids))))
                $this->set('canupdate',$canupdate);
        }   
        if($this->Session->read('admin')){ 
            $this->set('contract',$this->Document->find('count',array('conditions'=>array('job_id'=>$id,'document_type'=>'contract'))));
            $this->set('evidence',$this->Document->find('count',array('conditions'=>array('document_type'=>'evidence','job_id'=>$id))));
            $this->set('template',$this->Document->find('count',array('conditions'=>array('document_type'=>'template','job_id'=>$id))));
            $this->set('report',$this->Document->find('count',array('conditions'=>array('document_type'=>'report','job_id'=>$id))));
            $this->set('siteOrder',$this->Document->find('count',array('conditions'=>array('document_type'=>'siteOrder','job_id'=>$id))));
            $this->set('training',$this->Document->find('count',array('conditions'=>array('document_type'=>'training','job_id'=>$id))));
            $this->set('employee',$this->Document->find('count',array('conditions'=>array('document_type'=>'employee','job_id'=>$id))));
            $this->set('KPIAudits',$this->Document->find('count',array('conditions'=>array('document_type'=>'KPIAudits','job_id'=>$id))));
            $this->set('afimac_intel',$this->SpecJob->find('count',array('conditions'=>array('document_type'=>'AFIMAC Intel','job_id'=>$id))));            
            $this->set('news_media',$this->SpecJob->find('count',array('conditions'=>array('document_type'=>'News/Media','job_id'=>$id))));
        }
        else
        {
            $this->set('contract',$this->Document->find('count',array('conditions'=>array('job_id'=>$id,'document_type'=>'contract'))));
            $this->set('evidence',$this->Document->find('count',array('conditions'=>array('document_type'=>'evidence','job_id'=>$id))));
            $this->set('template',$this->Document->find('count',array('conditions'=>array('document_type'=>'template','job_id'=>$id))));
            $this->set('report',$this->Document->find('count',array('conditions'=>array('document_type'=>'report','job_id'=>$id))));
            $this->set('siteOrder',$this->Document->find('count',array('conditions'=>array('document_type'=>'siteOrder','job_id'=>$id))));
            $this->set('training',$this->Document->find('count',array('conditions'=>array('document_type'=>'training','job_id'=>$id))));
            $this->set('employee',$this->Document->find('count',array('conditions'=>array('document_type'=>'employee','job_id'=>$id))));
            $this->set('KPIAudits',$this->Document->find('count',array('conditions'=>array('document_type'=>'KPIAudits','job_id'=>$id))));
            $this->set('afimac_intel',$this->SpecJob->find('count',array('conditions'=>array('document_type'=>'AFIMAC Intel','job_id'=>$id))));            
            $this->set('news_media',$this->SpecJob->find('count',array('conditions'=>array('document_type'=>'News/Media','job_id'=>$id))));
            
        }
        
        $this->set('key',$this->Key_contact);
        $this->set('keys', $this->Job_contact->find('all', array('conditions'=>array('job_id'=>$id),'order'=>'type')));
        $this->set('member',$this->Member->find('all'));
        $this->set('jobmember',$this->Jobmember->find('all'));
        $this->set('jobb_id',$id);
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
    public function projectboard($id)
    {
        $this->loadModel('Projectboard');
        $this->loadModel('User');
        $this->set('user',$this->User->find('first'));
        
        
        $model = $this->Projectboard->find('first',array('conditions'=>array('job_id'=>$id)));
        $job = $this->Job->find('first',array('conditions'=>array('id'=>$id)));
        $this->set('job',$job);
        $this->set('model',$model);
        $pro = $this->Projectboard->find('first',array('conditions'=>array('job_id'=>$id)));
            
        if(isset($_POST['job_id']))
        {
            foreach($_POST as $k=>$v)
            {
                if(str_replace('_date','',$k)!= $k){
                    $arrs = explode('-',$v);
                    $arr[$k] = $arrs[0].'-'.$arrs[1].'-'.$arrs[2];
                    //$arr[$k] = date('Y-m-d',strtotime($v));
                    }
                else
                    $arr[$k] = $v;
                
            }
            //die();
            
            //die();
            
            $this->Projectboard->id = $pro['Projectboard']['id'];
            $this->Projectboard->save($arr);
            $this->Session->setFlash('Successfully Saved');
            $this->redirect('index');
        }
        
    }
    public function fillboard()
    
    {
        $this->loadModel('Projectboard');
        $q = $this->Job->find('all');
        foreach($q as $j){
        $this->Projectboard->create();
        $arr['job_id'] = $j['Job']['id'];
        $arr['client_name'] = $j['Job']['title'];
        $this->Projectboard->save($arr);
        }
        die('here');
        
    }
    public function removefromjob($mem,$job)
    {
        $this->loadModel('Jobmember');
        $q = $this->Jobmember->find('first',array('conditions'=>array('member_id'=>$mem)));
        $this->Jobmember->id = $q['Jobmember']['id'];
        $job_ids = $q['Jobmember']['job_id'];
        $job_ids = str_replace(array($job.',',','.$job.',',','.$job),array('',',',''),$job_ids);
        if(str_replace(',','',$job_ids) == $job_ids && $job_ids == $job)
        $job_ids = '';
        $this->Jobmember->saveField('job_id',$job_ids);
        die();
    }
    public function addtodoc()
    {
        $this->loadModel('Document');
        $this->loadModel('Job');
        $this->loadModel('SpecJob');
        $q = $this->Document->find('all');
        $q3 = $this->Job->find('first',array('conditions'=>array('is_special'=>1)));
        foreach($q as $a)
        {
            $id = $a['Document']['id'];
            $jid = $a['Document']['job_id'];
            if($jid){
            $q2 = $this->Job->findById($jid);
            $jtit = $q2['Job']['title'];
            $this->Document->id = $id;
            $this->Document->saveField('job_title',$jtit);
            }
        }
        if($q3)
        {
            $spetit = $q3['Job']['title'];
            $query = $this->SpecJob->find('all');
            if($query)
            {
                foreach($query as $qu)
                {
                    $sid = $qu['SpecJob']['id'];
                    $this->SpecJob->id = $sid;
                    $this->SpecJob->saveField('job_title',$spetit);
                }
                
            } 
        }
        
        die('here');
    }
    
    
}