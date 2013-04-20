<?php
class UploadsController extends AppController
{
    public $helpers = array('Html');
    function __construct(CakeRequest $request, CakeResponse $response)
    {
        $this->loadModel('Document');
        $this->loadModel('Member');
        $this->loadModel('Jobmember');
        $this->loadModel('Job');
        $this->loadModel('Image');
        $this->loadModel('Doc');
        $this->loadModel('Video');
        $this->loadModel('Youtube');
        parent::__construct($request,$response);
    }
    
    function index()
    {
			if($this->Session->read('avatar') || $this->Session->read('supervisor') || $this->Session->read('employee'))
			{

			}
			else
			{
			$this->redirect('/admin');
			}
        if($this->Session->read('avatar'))
        {
            $this->set('contract',$this->Document->find('count',array('conditions'=>array('document_type'=>'contract'))));
            $this->set('post_order',$this->Document->find('count',array('conditions'=>array('document_type'=>'post_order'))));
             $this->set('audits',$this->Document->find('count',array('conditions'=>array('document_type'=>'audits'))));
              $this->set('training_manuals',$this->Document->find('count',array('conditions'=>array('document_type'=>'training_manuals'))));
        }
        else if($this->Session->read('supervisor'))
        {
            $q=$this->Member->find('first',array('conditions'=>array('email'=>$this->Session->read('email'))));
            $id=$q['Member']['id'];
             $this->set('contract',$this->Document->find('count',array('conditions'=>array('document_type'=>'contract','addedBy'=>$id))));
            $this->set('post_order',$this->Document->find('count',array('conditions'=>array('document_type'=>'post_order','addedBy'=>$id))));
            $this->set('audits',$this->Document->find('count',array('conditions'=>array('document_type'=>'audits','addedBy'=>$id))));
            $this->set('training_manuals',$this->Document->find('count',array('conditions'=>array('document_type'=>'training_manuals','addedBy'=>$id))));
            
        }
        else if($this->Session->read('employee'))
        {
            $q=$this->Member->find('first',array('conditions'=>array('email'=>$this->Session->read('email'))));
            $id=$q['Member']['id'];
            $jo=$this->Jobmember->find('all',array('conditions'=>array('member_id'=>$id)));
            if($jo)
            {
                $data="";
                foreach($jo as $j)
                {
                    $data.=$j['Jobmember']['job_id'].",";
                }
                $d=rtrim($data, ",");
                $this->set('contract',$this->Document->find('count',array('conditions'=>array('document_type'=>'contract','job_id in ('.$d.')'))));
                $this->set('post_order',$this->Document->find('count',array('conditions'=>array('document_type'=>'post_order','job_id in ('.$d.')'))));
                $this->set('audits',$this->Document->find('count',array('conditions'=>array('document_type'=>'audits','job_id in ('.$d.')'))));
                $this->set('training_manuals',$this->Document->find('count',array('conditions'=>array('document_type'=>'training_manuals','job_id in ('.$d.')'))));
            }
            else
            {
                $this->set('contract','0');
                $this->set('post_order','0');
                $this->set('audits','0');
                $this->set('training_manuals','0');
            }
        }
    }
    
    function upload($id)
    {
        if($this->Session->read('user'))
        {
           if($this->Session->read('upload')!='1')
           {
            $this->redirect('/jobs');
           } 
        }  
        else
        {
            $this->redirect('/jobs');
        }
        if(isset($_POST['submit']))
        {
            $uri = $_SERVER['REQUEST_URI'];
                $uri = str_replace('/',' ',$uri);
                $uri = str_replace(' ','/',trim($uri));
                if($uri!='uploads'){
                $arr_uri = explode('/',$uri);
                $path = $_SERVER['DOCUMENT_ROOT'].'/app/webroot/img/documents/';
                }
                else
                $path = $_SERVER['DOCUMENT_ROOT'].'app/webroot/img/documents/';
                
                 if($_SERVER['SERVER_NAME']=='localhost')
                {
                    $path = $_SERVER['DOCUMENT_ROOT'].'veritas/app/webroot/img/documents/';
                }
                else
                    $path = $_SERVER['DOCUMENT_ROOT'].'app/webroot/img/documents/';
                $q=$this->Member->find('first',array('conditions'=>array('email'=>$this->Session->read('email'))));
            $id=$q['Member']['id'];
            $arr['location'] = $_POST['location'];
            $arr['title'] = $_POST['title'];
            $arr['description'] = $_POST['description'];
            $arr['document_type'] = $_POST['document_type'];
            $arr['date'] = date('Y-d-m H:i:s');
            $arr['job_id'] = $_POST['job'];
            $arr['addedBy'] = $id;
            $this->Document->create();
            $this->Document->save($arr);
            $id=$this->Document->id;
            $doc = $_POST['document'];
            $img = $_POST['image'];
            $vid = $_POST['video'];
            $you=$_POST['youtube'];
            for($i=1;$i<=$img;$i++)
            {
                if($_FILES['image_'.$i]['tmp_name']!="")
                {
                $source=$_FILES['image_'.$i]['tmp_name'];
                $destination = $path.$_FILES['image_'.$i]['name'];
                move_uploaded_file($source,$destination);
                $im['document_id'] = $id;
                $im['image'] = $_FILES['image_'.$i]['name'];
                
                $this->Image->create();
                $this->Image->save($im);
                }
            }
            for($i=1;$i<=$doc;$i++)
            {
                if($_FILES['document_'.$i]['tmp_name']!="")
                {
                $source=$_FILES['document_'.$i]['tmp_name'];
                $destination = $path.$_FILES['document_'.$i]['name'];
                move_uploaded_file($source,$destination);
                $d['document_id'] = $id;
                $d['doc'] = $_FILES['document_'.$i]['name'];
                $this->Doc->create();
                $this->Doc->save($d);
            }
            }
            for($i=1;$i<=$vid;$i++)
            {
                if($_FILES['video_'.$i]['tmp_name']!="")
                {
                $source=$_FILES['video_'.$i]['tmp_name'];
                $destination = $path.$_FILES['video_'.$i]['name'];
                move_uploaded_file($source,$destination);
                $v['document_id'] = $id;
                $v['video'] = $_FILES['video_'.$i]['name'];
                $this->Video->create();
                $this->Video->save($v);
                }
            }
            for($i=1;$i<=$you;$i++)
            {
                if($_POST['youtube_'.$i]!="")
                {
                $y['document_id'] = $id;
                $y['youtube'] = $_POST['youtube_'.$i];
                $this->Youtube->create();
                $this->Youtube->save($y);   
                }        
            }
            $this->Session->setFlash('Data Saved Successfully.');
        }
        $this->set('job_id',$id);
    }
    
    public function view($id)
    {
         if(!$this->Session->read('user'))
            $this->redirect('/admin');
         if($this->Session->read('upload')!='1')
         {
            
         }
            $this->set('job',$this->Job->find('first',array('conditions'=>array('id'=>$id))));
            
    }
    
    function getExtension($str) 
    {
        $i = strrpos($str,".");
        if (!$i) { return ""; }
        $l = strlen($str) - $i;
        $ext = substr($str,$i+1,$l);
        return $ext;
    }
    
    public function view_doc($type)
    {
        if($this->Session->read('avatar'))
        {
            $do=$this->Document->find('all',array('conditions'=>array('document_type'=>$type)));
            if($do)
            $this->set('doc',$do);
            else
            $this->set('message','No Document Available');
        }
        else if($this->Session->read('user'))
        {
            if($this->Session->read('see'))
            {
                $q=$this->Member->find('first',array('conditions'=>array('email'=>$this->Session->read('email'))));
                $id=$q['Member']['id'];
                $this->set('update',$q['Member']['canUpdate']);
                $jo=$this->Jobmember->find('all',array('conditions'=>array('member_id'=>$id)));
                $data="";
                if($jo)
                {
                    foreach($jo as $j)
                    {
                        $data.=$j['Jobmember']['job_id'].",";
                    }
                $d=rtrim($data,',');
                $do = $this->Document->find('all',array('conditions'=>array('document_type'=>$type,'job_id in ('.$d.')')));
                if($do)
                    $this->set('doc',$do);
                else
                    $this->set('message','No Document Available');
                }
            }
            else
            {
                $q=$this->Member->find('first',array('conditions'=>array('email'=>$this->Session->read('email'))));
                $id=$q['Member']['id'];
                $do = $this->Document->find('all',array('conditions'=>array('document_type'=>$type,'addedBy'=>$id)));
                if($do)
                $this->set('doc',$do);
                else
                $this->set('message','No Document Available');
            }
        }
        else if($this->Session->read('employee'))
        {
            $q=$this->Member->find('first',array('conditions'=>array('email'=>$this->Session->read('email'))));
            $id=$q['Member']['id'];
            $this->set('update',$q['Member']['canUpdate']);
            $jo=$this->Jobmember->find('all',array('conditions'=>array('member_id'=>$id)));
            $data="";
            if($jo)
            {
            foreach($jo as $j)
            {
                $data.=$j['Jobmember']['job_id'].",";
            }
            $d=rtrim($data,',');
                $do = $this->Document->find('all',array('conditions'=>array('document_type'=>$type,'job_id in ('.$d.')')));
                if($do)
                    $this->set('doc',$do);
                else
                    $this->set('message','No Document Available');
            }
            else
            $this->set('message','No Document Available');
        }
        
    }
    
    function view_detail($id)
    {
        if($this->Session->read('user') || $this->Session->read('avatar'))
        {
           if($this->Session->read('view')!='1')
           {
            $this->redirect('/jobs');
           } 
        }  
        else
        {
            $this->redirect('/jobs');
        }
        $this->set('doc',$this->Document->find('first',array('conditions'=>array('id'=>$id))));
        $this->set('do',$this->Doc->find('all',array('conditions'=>array('document_id'=>$id))));
        $this->set('image',$this->Image->find('all',array('conditions'=>array('document_id'=>$id))));
        $this->set('vid',$this->Video->find('all',array('conditions'=>array('document_id'=>$id))));
        $this->set('you',$this->Youtube->find('all',array('conditions'=>array('document_id'=>$id))));
    }
    
    public function edit($id)
    {
        $do=$this->Document->find('first',array('conditions'=>array('id'=>$id)));
        $this->set('doc',$do);
        if(isset($_POST['submit']))
        {
            $this->Document->id=$id;
            $this->Document->saveField('location',$_POST['location']);
            $this->Document->saveField('title',$_POST['title']);
            $this->Document->saveField('description',$_POST['description']);
            $this->Session->setFlash('Data Saved Successfully.');
        }
    }
}