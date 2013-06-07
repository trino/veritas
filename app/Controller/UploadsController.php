<?php
class UploadsController extends AppController
{
    public $helpers = array('Html');
    var $components = array('Email');
    var $base;
    function __construct(CakeRequest $request, CakeResponse $response)
    {
        $this->loadModel('Document');
        $this->loadModel('Member');
        $this->loadModel('Jobmember');
        $this->loadModel('Job');
        $this->loadModel('Image');
        $this->loadModel('User');
        $this->loadModel('Doc');
        $this->loadModel('Video');
        $this->loadModel('Youtube');
        $this->loadModel('Event_log');
        
        
        parent::__construct($request,$response);
        
    }
    function beforefilter()
    {
         //echo $this->Session->read('admin'); die();    
        if($this->Session->read('admin') || $this->Session->read('user') )
        {
         
         }
        else
               $this->redirect('/');  
      
    }
    function go()
    {
        if($this->Session->read('admin'))
        {
            $this->redirect('/jobs');
        }
        else
        {
            $this->loadModel('Jobmember');
            $jobs = $this->Jobmember->find('first',array('conditions'=>array('member_id'=>$this->Session->read('id'))));
                $job_id = 'all';
                if($jobs)
                {
                    $job_ids = $jobs['Jobmember']['job_id'];
                    if(str_replace(',','',$job_ids)==$job_ids)
                    {
                        $job_id=$job_ids;
                    }
                    else
                    $job_id = 'all';
                }
                if($job_id and $job_id!='all')
                {
                    $this->redirect('/uploads/upload/'.$job_id);
                }
                else
                $this->redirect('/jobs');
                
        }
    }
    function loadall()
    {
        $this->layout = "modal_layout";
        $job = $this->Job;
        $doc = $this->Document;
        $jm = $this->Jobmember;
        $docs = $this->Doc;
        $imgs = $this->Image;
        $vdos = $this->Video;
        $this->set('job',$job);
        $this->set('doc',$doc);
        $this->set('jm',$jm);
        $this->set('docs',$docs);
        $this->set('imgs',$imgs);
        $this->set('vdos',$vdos);
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
            $q=$this->Member->find('first',array('conditions'=>array('id'=>$this->Session->read('id'))));
            $id=$q['Member']['id'];
             $this->set('contract',$this->Document->find('count',array('conditions'=>array('document_type'=>'contract','addedBy'=>$id))));
            $this->set('post_order',$this->Document->find('count',array('conditions'=>array('document_type'=>'post_order','addedBy'=>$id))));
            $this->set('audits',$this->Document->find('count',array('conditions'=>array('document_type'=>'audits','addedBy'=>$id))));
            $this->set('training_manuals',$this->Document->find('count',array('conditions'=>array('document_type'=>'training_manuals','addedBy'=>$id))));
            
        }
        else if($this->Session->read('employee'))
        {
            $q=$this->Member->find('first',array('conditions'=>array('id'=>$this->Session->read('id'))));
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
    
    function delete($id)
    {
        
        if(!$this->Document->delete($id))
        {
              if($_SERVER['SERVER_NAME']=='localhost')
                {
                    $path = $_SERVER['DOCUMENT_ROOT'].'veritas/app/webroot/img/documents/';
                }
                else
                    $path = $_SERVER['DOCUMENT_ROOT'].'/app/webroot/img/documents/';
                    
            //echo $path;
            
            if($images = $this->Image->find('all',array('conditions'=>array('document_id'=>$id))))
            {
                foreach($images as $im)
                {
                     unlink($path.$im['Image']['image']);
                     $this->Image->delete($im['Image']['id']);
                }
            }
            //die();
            if($docs = $this->Doc->find('all',array('conditions'=>array('document_id'=>$id))))
            foreach($docs as $im)
            {
                 unlink($path.$im['Doc']['doc']);
                 $this->Doc->delete($im['Doc']['id']);
            }
            
            if($videos = $this->Video->find('all',array('conditions'=>array('document_id'=>$id))))
            foreach($videos as $im)
            {
                 unlink($path.$im['Video']['video']);
                 $this->Video->delete($im['Video']['id']);
            }
            $this->Session->setFlash('Document Succesfully Deleted.');
            $this->redirect('/dashboard');
        }
         $this->Session->setFlash('Document Succesfully Deleted.');
            $this->redirect('/dashboard');
        
    }
    
    function document_edit($eid)
    {
        $this->loadModel('Canupload');
        $this->loadModel('Activity');
        $this->loadModel('Emailupload');
        $this->loadModel('Clientmemo');
        if($this->Session->read('user'))
        {
           if($this->Session->read('upload')!='1')
           {
            $this->redirect('/jobs');
           } 
        }
        if($this->Session->read('user'))
        { 
            $id = $this->Session->read('id');
           if($canupdate = $this->Canupload->find('first', array('conditions'=>array('member_id'=>$id))))
                    $this->set('canupdate',$canupdate);
              
        }
        /*
        if($images = $this->Image->find('all',array('conditions'=>array('document_id'=>$eid))))
        {
            
            foreach($images as $im)
            {
                 $attach['id'][]= $im['Image']['id'];
                 $attach['file'][]= $im['Image']['image'];
            }
        }
        
        if($docs = $this->Doc->find('all',array('conditions'=>array('document_id'=>$eid))))
        foreach($docs as $im)
        {
              $attach['id'][]= $im['Doc']['id'];
              $attach['file'][]= $im['Doc']['doc'];
        }
        
        if($videos = $this->Video->find('all',array('conditions'=>array('document_id'=>$eid))))
        foreach($videos as $im)
        {
              $attach['id'][] = $im['Video']['id'];
              $attach['file'][] = $im['Video']['video'];
        }
        */
        if(isset($_POST['document_type']))
        {
            $uri = $_SERVER['REQUEST_URI'];
                $uri = str_replace('/',' ',$uri);
                $uri = str_replace(' ','/',trim($uri));
                if($uri!='uploads'){
                    $arr_uri = explode('/',$uri);
                    $path = $_SERVER['DOCUMENT_ROOT'].'/app/webroot/img/documents/';
                }
                else
                    $path = $_SERVER['DOCUMENT_ROOT'].'/app/webroot/img/documents/';
                
                 if($_SERVER['SERVER_NAME']=='localhost')
                {
                    $path = $_SERVER['DOCUMENT_ROOT'].'veritas/app/webroot/img/documents/';
                }
                else
                    $path = $_SERVER['DOCUMENT_ROOT'].'/app/webroot/img/documents/';
            if(!$this->Session->read('admin'))   
                $id=$this->Session->read('id');
            else
                $id=0;
            //$arr['location'] = $_POST['location'];
            $arr['title'] = ucfirst($_POST['document_type']);
            $arr['description'] = $_POST['description'];
            $arr['document_type'] = $_POST['document_type'];
            $arr['draft'] = $_POST['draft'];
            if($_POST['document_type']== 'evidence')
            {
                $arr['incident_date'] = $_POST['incident_date'];
                //$arr['desc'] = $_POST['desc'];
                $arr['evidence_type'] = $_POST['evidence_type'];
                
                
               //die(); 
            }
            if($_POST['document_type']=='report')
            {
                //$arr['client_memo'] = $_POST['client_memo'];
                $this->Activity->deleteAll(array('document_id'=>$eid));
                $activity['document_id'] = $eid;
                $activity['report_type'] = $_POST['report_type'];
                foreach($_POST['activity_time'] as $k=>$v)
                {
                    if($v!="")
                    {
                        $activity['time'] = $v;
                        $activity['date'] = $_POST['activity_date'][$k];
                        $activity['desc'] = $_POST['activity_desc'][$k];
                        $this->Activity->create();
                        $this->Activity->save($activity);
                    }
                     
                }
                
                
                
            }
            elseif($_POST['document_type']== 'client_feedback')
            {
                
                $this->Clientmemo->deleteAll(array('document_id'=>$eid));
                $client['document_id'] = $eid;
                $client['memo_type'] = $_POST['memo_type'];
                $client['guard_name'] = $_POST['guard_name'];
                $client['time'] = $_POST['memo_time'];
                $client['date'] = $_POST['memo_date'];
                $this->Clientmemo->create();
                $this->Clientmemo->save($client);
                
                
                
            }
            $mails = $this->Jobmember->find('all',array('conditions'=>array('OR'=>array(array('job_id LIKE'=>$_POST['job'].',%'), array('job_id'=>$_POST['job']),array('job_id LIKE'=>'%,'.$_POST['job'].',%'),array('job_id LIKE'=>'%,'.$_POST['job'])))));
                //var_dump($mails);
                $aE = $this->User->find('first');
                $adminEmail = $aE['User']['email'];
                if($_SERVER['SERVER_NAME']=='localhost')
                    $base_url = "http://localhost/veritas/";
                else
                    $base_url ="/";
                
                
                foreach($mails as $m)
                {
                    $mem_id = $m['Jobmember']['member_id'];
                    if($emailupload = $this->Emailupload->findByMemberId($mem_id))
                    if($emailupload['Emailupload'][$_POST['document_type']] == 1 )
                    if($t = $this->Member->find('first',array('conditions'=>array('id'=>$mem_id))))
                    {
                        $to = $t['Member']['email'];
                        $emails = new CakeEmail();
                        $emails->from(array('noreply@veritas.com'=>'Veritas'));
                        
                        $emails->subject("A new Evidence Uploaded.");
                        $emails->emailFormat('html');
                        $message="A new Evidence is uploaded to your job.<br/>Evidence Type: ".$_POST['evidence_type']."<br/>Incident Date:".$_POST['incident_date']."<br/> Please <a href='".$base_url."'>Click Here</a> to Login";
                        if($to){
                        $checks = $this->Member->find('first',array('conditions'=>array('email'=>$to)));
                        $check=0;
                        if($checks)
                        {
                            if($checks['Member']['receive1']==1 ||$checks['Member']['receive2']==1)
                            $check=1;
                            else
                            $check=0;
                        }    
                        if($check==1){
                        $emails->to($to);
                        $emails->send($message);}
                        }
                    }    
                }
                
            
            $arr['date'] = date('Y-m-d H:i:s');
            $arr['job_id'] = $_POST['job'];
            $arr['addedBy'] = $id;
            $this->Document->id= $eid;
            //var_dump($arr);
            foreach($arr as $k => $v)
            {
                //echo $k.",".$v;
                $this->Document->saveField($k,$v);
            }
            
            
            $id = $this->Document->id;
            
            $doc = $_POST['document'];
            
            $ext_doc = array('doc','docx','txt','pdf','xls','xlsx','ppt','pptx','cmd');
            $ext_img = array('jpg','png','gif','jpeg','bmp');
            
            for($i=1;$i<=$doc;$i++)
            {
                if($_FILES['document_'.$i]['tmp_name']!="")
                {
                    $this->Doc->deleteAll(array('document_id'=>$id));
                    $this->Image->deleteAll(array('document_id'=>$id));
                    $this->Video->deleteAll(array('document_id'=>$id));
                    $source=$_FILES['document_'.$i]['tmp_name'];
                    $rand = rand(100000,999999);
                    $ext_arr = explode('.',$_FILES['document_'.$i]['name']);
                    $extn = end($ext_arr);
                    $img = $rand.'.'.end($ext_arr);
                    $lower_ext = strtolower($extn);
                    $destination = $path.$img;
                
                //$destination = $path.$_FILES['document_'.$i]['name'];
                
                move_uploaded_file($source,$destination);
                
                $d['document_id'] = $id;
                
                if(in_array($lower_ext,$ext_doc)){
                    
                    $d['doc'] = $img;
                    $this->Doc->create();
                    $this->Doc->save($d);
                }
                elseif(in_array($lower_ext,$ext_img)){
                    
                    $d['image'] = $img;
                    $this->Image->create();
                    $this->Image->save($d);
                }
                else
                {
                    
                    $d['video'] = $img;
                    $this->Video->create();
                    $this->Video->save($d);
                }
            }
            }
            
            $this->Session->setFlash('Data Saved Successfully.');
            $log['date'] =  date('Y-m-d');
            $log['time'] =  date('H:i:s');
            if($this->Session->read('admin'))
            {
                $log['fullname'] = 'ADMIN('.$this->Session->read('avatar').')';
                $log['username'] = $this->Session->read('email');
                $log['member_id'] = 0;
            }
            else
            {
                
                $log['fullname'] = $this->Session->read('user');
                $log['username'] = $this->Session->read('email');
                $log['member_id'] = $this->Session->read('id');   
            }
            $log['event'] = "Upload ".$_POST['document_type'];
            $log['document_id'] = $id;
            $log['event_type'] = "Upload Document";
            $this->Event_log->create();
            $this->Event_log->save($log);
        }
        $doc = $this->Document->findById($eid);
        if($doc['Document']['document_type'] == 'report')
        {
            $this->set('ac', $this->Activity->find('first',array('conditions'=>array('document_id'=>$eid))));
            $this->set('activity', $this->Activity->find('all',array('conditions'=>array('document_id'=>$eid))));
        }
        elseif($doc['Document']['document_type'] == 'client_feedback')
        {
            $this->set('memo',$this->Clientmemo->findByDocumentId($eid));
        }
        $this->set('doc', $doc);
        
        
        

    }
    function upload($ids)
    {
        $this->loadModel('Canupload');
        $this->loadModel('Activity');
        $this->loadModel('Emailupload');
        if($this->Session->read('user'))
        {
           if($this->Session->read('upload')!='1')
           {
            $this->redirect('/jobs');
           } 
        }
        if($this->Session->read('user'))
        { 
            $id = $this->Session->read('id');
           if($canupdate = $this->Canupload->find('first', array('conditions'=>array('member_id'=>$id))))
                    $this->set('canupdate',$canupdate);  
        }
        if(isset($_POST['document_type']))
        {
            $uri = $_SERVER['REQUEST_URI'];
                $uri = str_replace('/',' ',$uri);
                $uri = str_replace(' ','/',trim($uri));
                if($uri!='uploads'){
                $arr_uri = explode('/',$uri);
                $path = $_SERVER['DOCUMENT_ROOT'].'/app/webroot/img/documents/';
                }
                else
                $path = $_SERVER['DOCUMENT_ROOT'].'/app/webroot/img/documents/';
                
                 if($_SERVER['SERVER_NAME']=='localhost')
                {
                    $path = $_SERVER['DOCUMENT_ROOT'].'veritas/app/webroot/img/documents/';
                }
                else
                    $path = $_SERVER['DOCUMENT_ROOT'].'/app/webroot/img/documents/';
            if(!$this->Session->read('admin'))   
                $id=$this->Session->read('id');
            else
                $id=0;
            $arr['location'] = $_POST['location'];
            $arr['title'] = ucfirst(str_replace("_"," ",$_POST['document_type']));
            $arr['description'] = $_POST['description'];
            $arr['document_type'] = $_POST['document_type'];
            if($_POST['document_type']== 'evidence')
            {
                $arr['incident_date'] = $_POST['incident_date'];
                //$arr['desc'] = $_POST['desc'];
                $arr['evidence_type'] = $_POST['evidence_type'];
                
                
               //die(); 
            }
            
            $arr['draft'] = $_POST['draft'];
            
            //Email
            
            $mails = $this->Jobmember->find('all',array('conditions'=>array('OR'=>array(array('job_id LIKE'=>$ids.',%'), array('job_id'=>$ids),array('job_id LIKE'=>'%,'.$ids.',%'),array('job_id LIKE'=>'%,'.$ids)))));
                //var_dump($mails);
                
                $aE = $this->User->find('first');
                 $adminEmail = $aE['User']['email'];
                if($_SERVER['SERVER_NAME']=='localhost')
                    $base_url = "http://localhost/veritas/";
                else
                    $base_url ="/";
                
                
                foreach($mails as $m)
                {
                    $mem_id = $m['Jobmember']['member_id'];
                    if($emailupload = $this->Emailupload->findByMemberId($mem_id))
                    if($emailupload['Emailupload'][$_POST['document_type']] == 1 )
                    if($t = $this->Member->find('first',array('conditions'=>array('id'=>$mem_id))))
                    {
                        $to = $t['Member']['email']; 
                        $emails = new CakeEmail();
                        $emails->from(array('noreply@veritas.com'=>'Veritas'));
                        
                        $emails->subject("A new Document Uploaded.");
                        $emails->emailFormat('html');
                        if($_POST['document_type']== 'evidence')
                            $message="A new Document is uploaded to your job.<br/>Evidence Type: ".$_POST['evidence_type']."<br/>Incident Date:".$_POST['incident_date']."<br/> Please <a href='".$base_url."'>Click Here</a> to Login";
                        else
                            $message="A new Document is uploaded to your job.<br/> Please <a href='".$base_url."'>Click Here</a> to Login";
                        if($to)
                        {
                            $checks = $this->Member->find('first',array('conditions'=>array('email'=>$to)));
                            $check=0;
                        if($checks)
                        {
                            if($checks['Member']['receive1']==1 || $checks['Member']['receive2']==1)
                                $check=1;
                            else
                                $check=0;
                        }    
                        if($check==1)
                        {
                            $emails->to($to);
                            $emails->send($message);
                            $emails->reset();
                        }
                        
                        }
                    }    
                }
                
            //Email Ends// 
            $arr['date'] = date('Y-m-d H:i:s');
            $arr['job_id'] = $_POST['job'];
            $arr['addedBy'] = $id;
            $this->Document->create();
            $this->Document->save($arr);
            $id=$this->Document->id;
            if($_POST['document_type']== 'report')
            {
                $activity['document_id'] = $id;
                $activity['report_type'] = $_POST['report_type'];
                foreach($_POST['activity_time'] as $k=>$v)
                {
                    if($v != "")
                    {
                        $activity['time'] = $v;
                        $activity['date'] = $_POST['activity_date'][$k];
                        $activity['desc'] = $_POST['activity_desc'][$k];
                        $this->Activity->create();
                        $this->Activity->save($activity);
                    }
                     
                }
            }
            elseif($_POST['document_type']== 'client_feedback')
            {
                $this->loadModel('Clientmemo');
                $client['document_id'] = $id;
                $client['memo_type'] = $_POST['memo_type'];
                $client['guard_name'] = $_POST['guard_name'];
                $client['time'] = $_POST['memo_time'];
                $client['date'] = $_POST['memo_date'];
                $this->Clientmemo->create();
                $this->Clientmemo->save($client);
                
                
                
            }
            $doc = $_POST['document'];
            
            $ext_doc = array('doc','docx','txt','pdf','xls','xlsx','ppt','pptx','cmd');
            $ext_img = array('jpg','png','gif','jpeg','bmp');
            
            
            //$ext_arr = explode('.',$_FILES['document_'.$i]['name']);
            //$img = $rand.'.'.end($ext_arr);
            //$imgs = $_POST['image'];
            //$vid = $_POST['video'];
            //$you=$_POST['youtube'];
            /*
            for($i=1;$i<=$imgs;$i++)
            {
                if($_FILES['image_'.$i]['tmp_name']!="")
                {
                $source=$_FILES['image_'.$i]['tmp_name'];
                $rand = rand(100000,999999);
                $ext_arr = explode('.',$_FILES['image_'.$i]['name']);
                $img = $rand.'.'.end($ext_arr);
                $destination = $path.$img;
                //$destination = $path.$_FILES['image_'.$i]['name'];
                move_uploaded_file($source,$destination);
                $im['document_id'] = $id;
                $im['image'] = $img;
                
                $this->Image->create();
                $this->Image->save($im);
                }
            }
            */
            for($i=1;$i<=$doc;$i++)
            {
                if($_FILES['document_'.$i]['tmp_name']!="")
                {
                $source=$_FILES['document_'.$i]['tmp_name'];
                $rand = rand(100000,999999);
                $ext_arr = explode('.',$_FILES['document_'.$i]['name']);
                $extn = end($ext_arr);
                $img = $rand.'.'.end($ext_arr);
                $lower_ext = strtolower($extn);
                $destination = $path.$img;
                //$destination = $path.$_FILES['document_'.$i]['name'];
                move_uploaded_file($source,$destination);
                $d['document_id'] = $id;
                
                if(in_array($lower_ext,$ext_doc)){
                    $d['doc'] = $img;
                $this->Doc->create();
                $this->Doc->save($d);
                }
                else
                if(in_array($lower_ext,$ext_img)){
                    $d['image'] = $img;
                    $this->Image->create();
                $this->Image->save($d);
                }
                else
                {
                    $d['video'] = $img;
                    $this->Video->create();
                $this->Video->save($d);
                }
            }
            }
            /*
            for($i=1;$i<=$vid;$i++)
            {
                if($_FILES['video_'.$i]['tmp_name']!="")
                {
                $source=$_FILES['video_'.$i]['tmp_name'];
                $rand = rand(100000,999999);
                $ext_arr = explode('.',$_FILES['video_'.$i]['name']);
                $img = $rand.'.'.end($ext_arr);
                $destination = $path.$img;
                //$destination = $path.$_FILES['video_'.$i]['name'];
                move_uploaded_file($source,$destination);
                $v['document_id'] = $id;
                $v['video'] = $img;
                $this->Video->create();
                $this->Video->save($v);
                }
            }
            */
            /*
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
            */
            $this->Session->setFlash('Data Saved Successfully.');
            $log['date'] =  date('Y-m-d');
            $log['time'] =  date('H:i:s');
            if($this->Session->read('admin'))
            {
                $log['fullname'] = 'ADMIN('.$this->Session->read('avatar').')';
                $log['username'] = $this->Session->read('email');
                $log['member_id'] = 0;
            }
            else
            {
                
                $log['fullname'] = $this->Session->read('user');
                $log['username'] = $this->Session->read('email');
                $log['member_id'] = $this->Session->read('id');   
            }
            $log['event'] = "Upload ".$_POST['document_type'];
            $log['document_id'] = $id;
            $log['event_type'] = "Upload Document";
            $this->Event_log->create();
            $this->Event_log->save($log);
        }
        $this->set('job_id',$ids);
        $j = $this->Job->findById($ids);
        $name = $j['Job']['title'];
        
        $this->set('job_name',$name);
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
    
    public function view_doc($type,$jid=0)
    {
	    $this->set('mems',$this->Member);
        $this->set('jo_bs',$this->Job);
		if ($type =="contract"){$type2="Contracts";}
		else if ($type =="evidence"){$type2="Evidence";}
		else if ($type =="template"){$type2="Templates";}
		else if ($type =="report"){$type2="Report";}
		else {$type2="";}
		$this->set('title2',$type2);
        $this->set('link',$type);
		
        if($this->Session->read('avatar'))
        {
            $do=$this->Document->find('all',array('conditions'=>array('document_type'=>$type,'draft'=>0),'order by'=>'job_id'));
            if($do)
                $this->set('doc',$do);
            else
                $this->set('message','No Document Available');
        }
        else if($this->Session->read('user'))
        {
            if($this->Session->read('see'))
            {
                //die('here');
                $q=$this->Member->find('first',array('conditions'=>array('id'=>$this->Session->read('id'))));
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
                if($jid != 0)
                    $do = $this->Document->find('all',array('conditions'=>array('document_type'=>$type,'draft'=>0,'job_id'=>$jid),'order by'=>'job_id'));
                else
                    $do = $this->Document->find('all',array('conditions'=>array('document_type'=>$type,'draft'=>0,'job_id IN('.$data.'0)'),'order by'=>'job_id'));
                if($do)
                    $this->set('doc',$do);
                else
                    $this->set('message','No Document Available');
                }
            }
            else
            {
                $q=$this->Member->find('first',array('conditions'=>array('id'=>$this->Session->read('id'))));
                $id=$q['Member']['id'];
                $do = $this->Document->find('all',array('conditions'=>array('document_type'=>$type,'draft'=>0,'addedBy'=>$id,'job_id'=>$jid),'order by'=>'job_id'));
                if($do)
                    $this->set('doc',$do);
                else
                    $this->set('message','No Document Available');
            }
        }
        else if($this->Session->read('employee'))
        {
            $q=$this->Member->find('first',array('conditions'=>array('id'=>$this->Session->read('id'))));
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
                $do = $this->Document->find('all',array('conditions'=>array('draft'=>0,'document_type'=>$type,'job_id in ('.$d.')')));
                if($do)
                    $this->set('doc',$do);
                else
                    $this->set('message','No Document Available');
            }
            else
            $this->set('message','No Document Available');
        }
        else
            $this->set('message','No Document Available');
        
    }
    
    function view_detail($id)
    {
        $this->loadModel('Activity');
        $this->loadModel('Clientmemo');
        
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
        
        if($this->Document->find('first',array('conditions'=>array('id'=>$id))))
        {
            $doc = $this->Document->find('first',array('conditions'=>array('id'=>$id)));
            if($doc['Document']['document_type']== 'report')
                $this->set('activity',$this->Activity->find('all',array('conditions'=>array('document_id'=>$id))));
            elseif($doc['Document']['document_type'] == 'client_feedback')
                $this->set('memo',$this->Clientmemo->findByDocumentId($id));
            
            $log['date'] = date('Y-m-d');
            $log['time'] = date('H:i:s');
            if($this->Session->read('admin'))
            {
                $log['fullname'] = 'ADMIN('.$this->Session->read('avatar').')';
                $log['username'] = $this->Session->read('email');
                $log['member_id'] = 0;
            }
            else
            {
                
                $log['fullname'] = $this->Session->read('user');
                $log['username'] = $this->Session->read('email');
                $log['member_id'] = $this->Session->read('id');   
            }
            
            $log['document_id'] = $id;
            $log['event_type'] = "Document Viewed";
            $log['event'] = "Viewed ".ucwords($doc['Document']['document_type']);
            $this->Event_log->create();
            $this->Event_log->save($log);
          
            
            
            
            $this->set('doc', $doc);
            $this->set('do',$this->Doc->find('all',array('conditions'=>array('document_id'=>$id))));
            $this->set('image',$this->Image->find('all',array('conditions'=>array('document_id'=>$id))));
            $this->set('vid',$this->Video->find('all',array('conditions'=>array('document_id'=>$id))));
            $this->set('you',$this->Youtube->find('all',array('conditions'=>array('document_id'=>$id))));
            $this->set('job',$this->Job);
            $this->set('member',$this->Member);
        }
        else
        {
            $this->Session->setFlash('Sorry! This Document is Already Deleted.');
            $this->redirect('/dashboard');
        }
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
    public function draft()
    {
        if($this->Session->read('admin'))
            $this->redirect('/dashboard');
        $drafts = $this->Document->find('all',array('conditions'=>array('draft'=>'1','addedBy'=>$this->Session->read('id'))));
        
        $this->set('drafts',$drafts);
    }
    
}