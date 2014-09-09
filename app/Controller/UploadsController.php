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
        $this->loadModel('Canview');
        $this->loadModel('Activity');
        parent::__construct($request,$response);
        
    }
    function beforefilter()
    {
         //echo $this->Session->read('admin'); die();    
        if($this->Session->read('admin') || $this->Session->read('user') )
        {
             if($this->Session->read('user'))
        {
            $this->loadModel('Member');
            $this->loadModel('Canupload');
            $this->loadModel('Canview');
            $id = $this->Session->read('id');
            $u = $this->Member->findById($id);
            if($s = $this->Canupload->findByMemberId($id))
            foreach($s as $k=>$v)
            $u['Member'][$k] = $v;
            if($s = $this->Canview->findByMemberId($id))
            foreach($s as $k=>$v)
            $u['Member'][$k] = $v;
            $this->set('usr1',$u);
        }
         }
        else
               $this->redirect('/');  
      
    }
    
    function graphs()
    {
		//die('here');
		if($_SERVER['SERVER_NAME']=='localhost')
		{
		  $base_url = "http://localhost/veritas/";
		}
		else{
		$base_url =	 str_replace('//','___',$_SERVER['SERVER_NAME']);
		$base_url =  str_replace('/',' ',$_SERVER['SERVER_NAME']);
		$base_url = trim($base_url);
		$base_url = str_replace(' ','/',$base_url);
		$base_url = str_replace('___','//',$base_url);
		$base_url = $base_url.'/';
		}
		
		$this->set('base_url',  $base_url);

		/*
		elseif(isset($_GET['from']))
		{
			$from = $_GET['from'];
			//$to = $_GET['to'];
			$cond = "WHERE `date` >='$from' ";
			$cond1 = "and `date`>='$from' ";
		}
		elseif(isset($_GET['to']))
		{
			//$from = $_GET['from'];
			$to = $_GET['to'];
			$cond = "WHERE `date` <='$to' ";
			$cond1 = " and `date` <='$to' ";
		}
		if(isset($_GET['addedBy']) && $_GET['addedBy']!="" && !(isset($_GET['from'])) && !(isset($_GET['to'])))
		if(isset($_GET['addedBy']) && $_GET['addedBy']!="")
		{
			$this->loadModel('Member');
			if($_GET['addedBy']!=0){
			$q = $this->Member->find('first',array('conditions'=>array('id'=>$_GET['addedBy'])));
			$this->set('by',$q['Member']['full_name']);
			}
			else
			$this->set('by','Admin');
			$addedBy = $_GET['addedBy'];
			$cond.= " WHERE addedBy= '$addedBy'";
			$cond1.= " and addedBy = '$addedBy'";
		}
		else
		*/
		
		
		$cond =" ";
		$cond1 =" ";

		if(isset($_GET['from']) && isset($_GET['to']))
		{
			$from = $_GET['from']; 
			$to = $_GET['to'];
			$cond = "WHERE `date`>='$from' and `date` <='$to' ";
			$cond1 = "and `date`>='$from' and `date` <='$to' ";
		}
		
		if(isset($_GET['addedBy']) && $_GET['addedBy']!="")
		{
			$addedBy = $_GET['addedBy'];
			$q = $this->Member->find('first',array('conditions'=>array('id'=>$_GET['addedBy'])));
				$this->set('addedBy',$q['Member']['full_name']);
			if(isset($_GET['from']) && isset($_GET['to']))
			{
				$cond.= " and addedBy= '$addedBy'";
			}
			else
			{
				$cond.= " where addedBy= '$addedBy'";
			}
			
			$cond1.= " AND addedBy = '$addedBy'";

			if(isset($_POST['addedBy']) && $_POST['addedBy']!=0)
			{
				$q = $this->Member->find('first',array('conditions'=>array('id'=>$_POST['addedBy'])));
				$this->set('by',$q['Member']['full_name']);
            }
            else
			{
				$this->set('by','Admin');
			}
		}

		//echo "SELECT COUNT( * ) as cnt , `document_type` , DATE( `date` ) DateOnly FROM `documents` $cond GROUP BY `document_type` , DateOnly";
		//die();
		
		if($all = $this->Document->query("SELECT COUNT( * ) as cnt , `document_type` , DATE( `date` ) DateOnly FROM `documents` $cond GROUP BY `document_type` , DateOnly"))
		$this->set('all', $all);

		if($report = $this->Activity->query("SELECT COUNT( * ) as cnt , `report_type` , DATE( `uploaded_on` ) DateOnly  FROM `activities` $cond GROUP BY `report_type` , DateOnly"))
		$this->set('report', $report);

		if($incident = $this->Activity->query("SELECT COUNT( * ) as cnt , `incident_type` , DATE( `uploaded_on` ) DateOnly FROM `activities` WHERE `incident_type` <> ' ' $cond1 GROUP BY `incident_type` , DateOnly ORDER BY DateOnly"))
		$this->set('incident', $incident);
		
		if($evidence = $this->Document->query("SELECT COUNT( * ) as cnt , `evidence_type` , DATE( `date` ) DateOnly FROM `documents` WHERE `evidence_type`<> ' ' $cond1 GROUP BY `evidence_type` , DateOnly"))
		$this->set('evidence', $evidence);
		
		/*
		$template = $this->Document->query("SELECT COUNT( * ) as cnt , `template_type` , DATE( `date` ) DateOnly FROM `documents` WHERE `template_type`<> ' ' $cond1 GROUP BY `template_type` , DateOnly");
		$this->set('template', $template);
		*/
		
		if($site = $this->Document->query("SELECT COUNT( * ) as cnt , `site_type` , DATE( `date` ) DateOnly FROM `documents` WHERE `site_type`<> ' ' $cond1 GROUP BY `site_type` , DateOnly"))
		$this->set('site', $site);

		if($client = $this->Document->query("SELECT COUNT( * ) as cnt , `client_feedback` , DATE( `date` ) DateOnly FROM `documents` WHERE `client_feedback`<> ' ' $cond1 GROUP BY `client_feedback` , DateOnly"))
		$this->set('client', $client);
		
		if($training = $this->Document->query("SELECT COUNT( * ) as cnt , `training_type` , DATE( `date` ) DateOnly FROM `documents` WHERE `training_type`<> ' ' $cond1 GROUP BY `training_type` , DateOnly"))
		$this->set('training', $training);

		if($employee = $this->Document->query("SELECT COUNT( * ) as cnt , `employee_type` , DATE( `date` ) DateOnly FROM `documents` WHERE `employee_type`<> ' ' $cond1 GROUP BY `employee_type` , DateOnly"))
		$this->set('employee', $employee);
	}
    
    function stats()
    {
		//die('here');
		if($_SERVER['SERVER_NAME']=='localhost')
		$base_url = "http://localhost/veritas/";
		else{
		$base_url =	 str_replace('//','___',$_SERVER['SERVER_NAME']);
		$base_url =  str_replace('/',' ',$_SERVER['SERVER_NAME']);
		$base_url = trim($base_url);
		$base_url = str_replace(' ','/',$base_url);
		$base_url = str_replace('___','//',$base_url);
		$base_url = $base_url.'/';

		}
		$this->set('base_url',  $base_url);

					
        $cond = '';
        $cond1 = '';
        if(isset($_POST['addedBy']) && $_POST['addedBy']!="")
        {
            $this->loadModel('Member');
            if($_POST['addedBy']!=0){
                $q = $this->Member->find('first',array('conditions'=>array('id'=>$_POST['addedBy'])));
                $this->set('by',$q['Member']['full_name']);
            }
            else
            $this->set('by','Admin');
            $addedBy = $_POST['addedBy'];
            $cond = "WHERE addedBy ='$addedBy'";
            $cond1 = "and addedBy = '$addedBy'";
            $this->set('addedBy',$addedBy);
        }
        if(isset($_POST['from']) && isset($_POST['to']) && $_POST['from']!="" && $_POST['to']!="")
        {
            $from = $_POST['from'];
            $to = $_POST['to'];
            $all = $this->Document->query("SELECT COUNT(*) as cnt, document_type FROM documents WHERE `date`>='$from' and `date`<='$to' $cond1 GROUP BY document_type");
            $this->set('from',$_POST['from']);
            $this->set('to', $_POST['to']);
        }
        elseif(isset($_POST['from'])&& $_POST['from']!="")
        {
            $from = $_POST['from'];
            $all = $this->Document->query("SELECT COUNT(*) as cnt, document_type FROM documents WHERE `date`>='$from' $cond1  GROUP BY document_type");
            $this->set('from',$_POST['from']);
            
        }
        elseif(isset($_POST['to']) && $_POST['to']!="")
        {
            $to = $_POST['to'];
            $all = $this->Document->query("SELECT COUNT(*) as cnt, document_type FROM documents WHERE `date`<='$to' $cond1 GROUP BY document_type");
            $this->set('to', $_POST['to']);
        }
        else
            $all = $this->Document->query("SELECT COUNT(*) as cnt, document_type FROM documents $cond GROUP BY document_type");
        $report_type = $this->Activity;
        $doc = $this->Document;
        $this->set('report_type',$report_type);
        $this->set('doc',$doc);
        $this->set('all',$all);
        $users = $this->Member->find('all');
        $this->set('users',$users);
        //var_dump($all); //die();
        
        
    }
    function go($id='')
    {
        if($id)
        {
            $job_id = $id;
            $this->redirect('/uploads/upload/'.$job_id);
        }{
        
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
    function searchlist($id=0)
    {
        
        $name = $_POST['name'];
        $this->layout = "modal_layout1";
        $job = $this->Job;
        $doc = $this->Document;
        $jm = $this->Jobmember;
        $docs = $this->Doc;
        $imgs = $this->Image;
        $vdos = $this->Video;
        $this->loadModel('SpecJob');
        $this->set('spe',$this->SpecJob);
        $this->set('job',$job);
        $this->set('doc',$doc);
        $this->set('jm',$jm);
        $this->set('docs',$docs);
        $this->set('imgs',$imgs);
        $this->set('vdos',$vdos);
        $this->set('canV',$this->Canview);
        $this->set('name',$name);
        $this->loadModel('Jobmember');
        if(!$this->Session->read('admin')){
        $q = $this->Jobmember->find('first',array('conditions'=>array('member_id'=>$this->Session->read('id'))));
        $job = $q['Jobmember']['job_id'];
        if(str_replace(',','',$job) == $job)
        {
            $j = $this->Job->findById($job);
            if($j['Job']['is_special'] == 1)
            {
                $this->set('jname',$j['Job']['title']);
                $this->set('sid',$job);
                $this->set('jid',$job);
                $this->render('listspecial');
                die();
            }
        }
        }
        
        $this->set('jid',$id);
        
        
        
        
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
             $this->set('contract',$this->Document->find('count',array('conditions'=>array('document_type'=>'contract'))));
            $this->set('post_order',$this->Document->find('count',array('conditions'=>array('document_type'=>'post_order'))));
            $this->set('audits',$this->Document->find('count',array('conditions'=>array('document_type'=>'audits'))));
            $this->set('training_manuals',$this->Document->find('count',array('conditions'=>array('document_type'=>'training_manuals'))));
            
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
    
    function delete($id, $draft='')
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
            
            if(isset($draft) && $draft == 'draft')
            {
                $this->Session->setFlash('Draft Succesfully Deleted.');
                $this->redirect('/uploads/draft'); 
            }
            else
            {
                $this->Session->setFlash('Document Succesfully Deleted.');
                $this->redirect('/dashboard');
            }
        }
        if(isset($draft) && $draft == 'draft')
        {
            $this->Session->setFlash('Draft Succesfully Deleted.');
            $this->redirect('/uploads/draft');
        }
        else
        {
            $this->Session->setFlash('Document Succesfully Deleted.');
            $this->redirect('/dashboard');
        }
        
    }
    
    function document_edit($eid)
    {
        $this->loadModel('Canupload');
        $this->loadModel('Emailupload');
        $this->loadModel('Clientmemo');
        $this->loadModel('AdminDoc');
        
        $this->loadModel('Personal_inspection');
        $this->loadModel('MobileInspection');
        $this->loadModel('MobileAction');
        $this->loadModel('MobileLog');
        $this->loadModel('MobileNote');
        $this->loadModel('MobileSite');
        $this->loadModel('MobileTrunk');
        $this->loadModel('Vehicle_inspection');
        $this->loadModel('StaticSiteAudit');
        $this->loadModel('InsuranceSiteAudit');
        
        
        if($eid)
        {
            //$this->set('perso',$this->Personal_inspection->find('first',array('conditions'=>array('document_id'=>$eid))));
            
            $docz = $this->Document->findById($eid);
            $this->loadModel('DeploymentRate');
            if($rates = $this->DeploymentRate->findByJobId($docz['Document']['job_id']))
            {
                $this->set('rates',$rates);
                $this->set('job_id',$docz['Document']['job_id']);
            }
            
            if($in = $this->MobileTrunk->findByDocumentId($eid))
            {
                $this->set('inv', $in);
            }
        }            
        $this->set('admin_doc',$this->AdminDoc->find('first'));
        if($this->Session->read('user'))
        {
           if($this->Session->read('upload')!='1')
                $this->redirect('/jobs');
            
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
            unset($arr);
            $arr['title'] = ucfirst($_POST['document_type']);
            if($_POST['document_type']!='personal_inspection')
                $arr['description'] = $_POST['description'];
            $arr['draft'] = $_POST['draft'];
            
            if($_POST['document_type']=='report')
            {
                $arr['re_id'] = $_POST['report_type'];
            }
            if($_POST['document_type']== 'evidence')
            {
                $arr['incident_date'] = $_POST['incident_date'];
                //$arr['desc'] = $_POST['desc'];
                $arr['evidence_type'] = $_POST['evidence_type'];
                $arr['evidence_author'] = $_POST['evidence_author'];
                $arr_e = array('Incident Report','Line Crossing Sheet','Shift Summary','Incident Video','Executive Summary','Average Picket Count','Victim Statement','Miscellaneous');
                $k   = array_search($_POST['evidence_type'],$arr_e);
                $arr['ev_id'] = $k+1;
            
                
                
               //die(); 
            }
            elseif($_POST['document_type'] == 'siteOrder')
            {
                $arr['site_type'] = $_POST['site_type'];
                $subname = '_'.$_POST['site_type'];
                //$arr['site_type'] = $_POST['site_type'];
                $arr_so = array('Post Orders','Operational Memos','Site Maps','Forms');
                $k = array_search($_POST['site_type'],$arr_so);
                $arr['so_id'] = $k+1;
                //$subname = '_'.$_POST['site_type'];
            }
            elseif($_POST['document_type'] == 'employee')
            {
                $arr['employee_type'] = $_POST['employee_type'];
                $arr_em = array('Job Descriptions','Drug Free Policy','Schedules');
                $k = array_search($_POST['employee_type'],$arr_em);
                $arr['emp_id'] = $k+1;
                 $subname = '_'.$_POST['employee_type'];
            }
            elseif($_POST['document_type'] == 'training')
            {
                $arr['training_type'] = $_POST['training_type'];
                $subname = '_'.$_POST['training_type'];
            }
            else
            if($_POST['document_type']=='deployment_rate')
            {
                $this->loadModel('Equipment');
                $this->loadModel('Personnel');
                $count = count($_POST['Equipment']['items']);
                $equ = $_POST['Equipment'];
                $this->Equipment->deleteAll(array('doc_id'=>$eid));
                for($i=0;$i<$count;$i++)
                {
                    $eq['items'] =  $equ['items'][$i];
                    $eq['qty'] =  $equ['qty'][$i];
                    if(isset($equ['kms'][$i]))
                    $eq['kms'] =  $equ['kms'][$i];
                    if(isset($equ['fuel_cost'][$i]))
                    $eq['fuel_cost'] =  str_replace('$','',$equ['fuel_cost'][$i]);
                    if(isset($equ['hotel_cost'][$i]))
                    $eq['hotel_cost'] =  str_replace('$','',$equ['hotel_cost'][$i]);
                    
                    $eq['amount_billable'] =  str_replace('$','',$equ['amount_billable'][$i]);
                    $eq['doc_id'] = $eid;
                    
                    $eq['total'] =$_POST['total'];
                    $eq['tax'] =$_POST['tax'];
                    $eq['a_fee'] =$_POST['a_fee'];
                    $eq['g_total'] =$_POST['g2_tot'];
                    
                    $this->Equipment->create();
                    $this->Equipment->save($eq);
                }
                
                unset($equ);
                unset($eq);
                
                $count = count($_POST['Personnel']['position']);
                $equ = $_POST['Personnel'];
                $this->Personnel->deleteAll(array('doc_id'=>$eid));
                for($i=0;$i<$count;$i++)
                {
                    $eq['position'] =  $equ['position'][$i];
                    $eq['no_of_staff'] =  $equ['no_of_staff'][$i];
                    $eq['start_time'] =  $equ['start_time'][$i];
                    $eq['end_time'] =  $equ['end_time'][$i];
                    $eq['total_hours'] =  $equ['total_hours'][$i];
                    $eq['hours_billable'] =  str_replace('$','',$equ['hours_billable'][$i]);
                    $eq['travel'] =  $equ['travel'][$i];
                    $eq['travel_billable'] =  str_replace('$','',$equ['travel_billable'][$i]);
                    $eq['meal_amount'] =  $equ['meal_amount'][$i];
                    $eq['meal_billable'] =  str_replace('$','',$equ['meal_billable'][$i]);
                    $eq['doc_id'] = $eid;
                    
                    $eq['total'] =$_POST['total'];
                    $eq['tax'] =$_POST['tax'];
                    $eq['a_fee'] =$_POST['a_fee'];
                    $eq['g_total'] =$_POST['g2_tot'];
                    
                    $this->Personnel->create();
                    $this->Personnel->save($eq);
                }
                              
            }
            elseif($_POST['document_type']=='report')
            {
                $this->Activity->deleteAll(array('document_id'=>$eid));
                $activity['document_id'] = $eid;
                $activity['report_type'] = $_POST['report_type'];
                $activity['addedBy'] = $id;
                $activity['uploaded_on'] = date('Y-m-d');
                if(isset($activity['report_type']))
                    $activity['incident_type'] = $_POST['incident_type'];
                
                if($_POST['report_type']=='8')
                {
                    
                    $this->StaticSiteAudit->deleteAll(array('doc_id'=>$eid));
                    $_POST['doc_id'] = $eid;
                    $this->StaticSiteAudit->create();
                    $this->StaticSiteAudit->save($_POST);
                    
                }
                if($_POST['report_type']=='9')
                {
                    $this->InsuranceSiteAudit->deleteAll(array('doc_id'=>$eid));
                    $_POST['doc_id'] = $eid;
                    $this->InsuranceSiteAudit->create();
                    $this->InsuranceSiteAudit->save($_POST);
                    
                }
                
                if($_POST['report_type'] == '18')
                {
                    $illness = $_POST;
                    $illness['document_id'] = $eid;
                    $illness['signature'] = $this->Session->read('image_name');
                    $this->loadModel('InjuryIllness');
                    $this->InjuryIllness->deleteAll(array('document_id'=>$eid));                    
                    $this->InjuryIllness->create();
                    $this->InjuryIllness->save($illness);
                    
                    if(isset($_POST['picture']))
                    {
                        $this->loadModel('InjuryPicture');
                        $this->InjuryPicture->deleteAll(array('document_id'=>$eid));
                        foreach($_POST['picture'] as $p){
                        $pic['document_id'] = $eid;
                        $pic['file'] = $p;
                        
                        $this->InjuryPicture->create();
                        $this->InjuryPicture->save($pic);
                        }   
                    }
                    if(isset($_POST['medical_forms']))
                    {
                        $this->loadModel('InjuryForm');
                        $this->InjuryForm->deleteAll(array('document_id'=>$eid));
                        foreach($_POST['medical_forms'] as $p){
                        $form['document_id'] = $eid;
                        $form['file'] = $p;
                        
                        $this->InjuryForm->create();
                        $this->InjuryForm->save($form);
                        }   
                    }
                }
                if($_POST['report_type']=='11')
                {
                    
                    $this->loadModel('Instruction');
                    $ins = $this->Instruction->findByDocId($eid);
                    if(!$this->Session->read('image_name'))
                    $this->Session->write('image_name',$ins['Instruction']['signature']);
                    $this->Instruction->deleteAll(array('doc_id'=>$eid));
                    $_POST['doc_id'] = $eid;
                    $_POST['signature'] = $this->Session->read('image_name');
                    $this->Instruction->create();
                    $this->Instruction->save($_POST);
                    $this->Session->delete('image_name');
                    
                    
                }
                if($_POST['report_type']== '12')
                {
                    $this->Personal_inspection->deleteAll(array('document_id'=>$eid));
                 
                    $per['document_id'] = $eid;
                    foreach($_POST as $key=>$post)
                    {
                        $in = array('document_type','emp_name1','site','jobs_title','date_submit','date_verify','date_verify2','evaluation','manager_name','emp_name2','overall_rating','uniform','uniform2','grooming','proper_equipment','piercing','positioning');
                        if(in_array($key,$in))
                        {
                            $per[$key] = $post;
                        }
                    }
                    $per['signature'] = $this->Session->read('image_name');
                    $this->loadModel('Personal_inspection');
                    $this->Personal_inspection->create();
                    $this->Personal_inspection->save($per);            
                    
                }
                if($_POST['report_type'] == '13')
                {
                    if(isset($_POST['mobile_id']))
                        $mid = $_POST['mobile_id'];
                    if(isset($mid) && $mid != "")
                    {
                        $this->MobileInspection->id = $mid;
                        //var_dump($_POST['mobile_ins']); die();
                        foreach($_POST['mobile_ins'] as $k=>$v)
                        {
                            
                            $this->MobileInspection->saveField($k,$v);
                        }
                        
                        $this->MobileInspection->saveField('signature',$this->Session->read('image_name'));
                    }
                    else
                    {
                        $mob['document_id'] = $eid;
                        //echo $_POST['mobile_ins']['date'];
                        if($_POST['mobile_ins']['date']=="")
                           $_POST['mobile_ins']['date']='0000-00-00';
                           //die();
                    //var_dump($_POST['mobile_ins']);die();
                        $this->MobileInspection->deleteAll(array('document_id'=>$eid));
                        foreach($_POST['mobile_ins'] as $k=>$v)
                        {
                            $mob[$k] = $v;
                        }
                        //$this->loadModel('MobileInspection');
                        $this->MobileInspection->create();
                        $this->MobileInspection->save($mob);
                        $mid = $this->MobileInspection->id;   
                    }
                    
                    
                    $this->MobileAction->deleteAll(array('mobileins_id'=>$mid));
                    $action['mobileins_id'] = $mid;
                    foreach($_POST['mobtime'] as $key =>$time)
                    {
                        if($time!="")
                        {
                            $action['time'] = $time;
                            $action['detail'] = $_POST['mobdetail'][$key];
                            $this->MobileAction->create();
                            $this->MobileAction->save($action);
                        }
                    }    
                }
                if($_POST['report_type']=='10')
                {
                    
                    $this->loadModel('SiteSignin');
                    $this->SiteSignin->deleteAll(array('doc_id'=>$eid));
                    $sitesignin['doc_id'] = $eid;
                    $sitesignin['guard_name'] = $_POST['guard_name'];
                    $sitesignin['date'] = $_POST['date'];
                    $sitesignin['loss_location'] = $_POST['loss_location'];
                    $sitesignin['sign']=$this->Session->read('image_name');
                    //var_dump($_POST['arrival']);
                    //die('10');
                    foreach($_POST['arrival'] as $k=>$v)
                    {
                        
                        if($v!= "")
                        {
                           $sitesignin['arrival'] =$v;
                           $sitesignin['depart'] = $_POST['depart'][$k];
                           $sitesignin['print_name'] = $_POST['name'][$k];
                           $sitesignin['phone_no'] = $_POST['phone'][$k];
                           $sitesignin['company'] = $_POST['company'][$k];
                           $sitesignin['signature'] = $_POST['sign'][$k];
                           
                            $this->SiteSignin->create();
                            $this->SiteSignin->save($sitesignin);
                        }
                    }
                       
                }
                if($_POST['report_type'] == '16')
                {
                    $v = $this->Vehicle_inspection->findByDocumentId($eid);
                    $vid = $v['Vehicle_inspection']['id'];
                    $this->Vehicle_inspection->deleteAll(array('document_id'=>$eid));
                    $veh['document_id'] = $eid;
                    //$veh['document_id'] = $id;
                    $too = $_POST['to'];
                    $att_to = explode(':',$too);
                    $veh['hour_to'] = $att_to[0];
                    $veh['min_to'] = $att_to[1];
                    
                    $from = $_POST['from'];
                    $att_fo = explode(':',$from);
                    $veh['hour_from'] = $att_fo[0];
                    $veh['min_from'] = $att_fo[1];
                    foreach($_POST as $key=>$post)
                    {
                        $in2 = array('vehicle_date','hour_from','min_from','hour_to','min_to','guard','vehicle_unit_number','plate','start_km','finish_km','light','horn','rotating_light','spot_light','safety','file_box','lock_box','first_aid','ownership','front','back','side','note','operation_review');
                        if(in_array($key,$in2))
                        {
                            $veh[$key] = $post;
                        }
                    }
                    
                    $veh['signature'] = $this->Session->read('image_name');
                    //var_dump($veh);die();
                    $this->loadModel('Vehicle_inspection');
                    $this->Vehicle_inspection->create();
                    $this->Vehicle_inspection->save($veh);
                    $vehicle_id = $this->Vehicle_inspection->id;
                    $this->loadModel('Vehicle_note');
                    $this->Vehicle_note->deleteAll(array('vehicle_id'=>$vid));
                    if($_POST['desc1'] && $_POST['report_type']=='16')
                    {
                        foreach($_POST['desc1'] as $desc1)
                        {
                            $notes = $desc1;
                            $ar_no = explode('__',$notes);
                            $arr_v['notes'] = $ar_no[0];
                            $arr_v['coords'] = $ar_no[1];
                            $arr_v['note_no'] = $ar_no[2];
                            $arr_v['vehicle_id'] = $vehicle_id;                        
                            $arr_v['image'] = 'first';
                            $this->loadModel('Vehicle_note');
                            $this->Vehicle_note->create();
                            $this->Vehicle_note->save($arr_v);
                            unset($ar_no);
                            unset($arr_v);
                        }
                        foreach($_POST['desc2'] as $desc1)
                        {
                            $notes = $desc1;
                            $ar_no = explode('__',$notes);
                            $arr_v['notes'] = $ar_no[0];
                            $arr_v['coords'] = $ar_no[1];
                            $arr_v['note_no'] = $ar_no[2];
                            $arr_v['vehicle_id'] = $vehicle_id;
                            $arr_v['image'] = 'second';
                            $this->loadModel('Vehicle_note');
                            $this->Vehicle_note->create();
                            $this->Vehicle_note->save($arr_v);
                            unset($ar_no);
                            unset($arr_v);
                        }
                        foreach($_POST['desc3'] as $desc1)
                        {
                            $notes = $desc1;
                            $ar_no = explode('__',$notes);
                            $arr_v['notes'] = $ar_no[0];
                            $arr_v['coords'] = $ar_no[1];
                            $arr_v['note_no'] = $ar_no[2];
                            $arr_v['vehicle_id'] = $vehicle_id;
                            $arr_v['image'] = 'third';
                            $this->loadModel('Vehicle_note');
                            $this->Vehicle_note->create();
                            $this->Vehicle_note->save($arr_v);
                        }
                        
                    }
                }
                 if($_POST['report_type']=='17')
                {
                    //die('aa');
                    $this->loadModel('Dispilinary');
                    $this->Dispilinary->deleteAll(array('document_id'=>$eid));
                    $_POST['disp']['document_id'] = $eid;
                    $this->Dispilinary->create();
                    $_POST['disp']['signature'] = $this->Session->read('image_name');
                    foreach($_POST['disp']['rules']as $k=>$v)
                    {
                        $_POST['disp']['rule'] .= $v;
                        if($k != count($_POST['disp']['rules'])-1)
                            $_POST['disp']['rule'] .= ",";
                    }
                    foreach($_POST['disp']['warnings']as $k=>$v)
                    {
                        $_POST['disp']['warning'] .= $v;
                        if($k != count($_POST['disp']['warnings'])-1)
                            $_POST['disp']['warning'] .= ",";
                    }
                    
                    //var_dump($_POST['disp']);
                    //die();
                    $this->Dispilinary->save($_POST['disp']);
                    
                }
                if($_POST['report_type'] == '15')
                {
                  if(isset($_POST['inv_id']))
                    $iid = $_POST['inv_id'];
                  
                  if(isset($iid) && $iid!="")
                  {
                      $this->MobileTrunk->id = $iid;
                      foreach($_POST['inventory'] as $k=>$v)
                      {
                        $this->MobileTrunk->saveField($k, $v);
                      }
                      $this->MobileTrunk->saveField('signature',$this->Session->read('image_name'));
                        
                  }
                  else
                  {
                        $inventory['document_id'] = $eid;
                    $this->MobileTrunk->deleteAll(array('document_id'=>$eid));
                    foreach($_POST['inventory'] as $k=>$v)
                    {
                        $inventory[$k] = $v;
                    }
                    //var_dump($inventory);
                    
                    //$this->loadModel('MobileTrunk');
                    $inventory['signature'] = $this->Session->read('image_name');
                    $this->MobileTrunk->create();
                    $this->MobileTrunk->save($inventory);
                  }
                }
                if($_POST['report_type'] == '14')
                {
                    $this->loadModel('MobileLog');
                    if(isset($_POST['log_id']))
                        $lid = $_POST['log_id'];
                    
                    if(isset($lid) && $lid !="" )
                    {
                        $this->MobileLog->id = $lid;
                        
                        //var_dump($_POST['mobile_ins']);die();
                        foreach($_POST['log'] as $k=>$v)
                        {
                            $this->MobileLog->saveField($k,$v);
                        }
                        $this->MobileLog->saveField('signature',$this->Session->read('image_name'));
                    }
                    else
                    {
                        $mob['document_id'] = $eid;
                        $this->MobileLog->deleteAll(array('document_id'=>$eid));
                        /*if($_POST['log']['start_date']=="")
                            $_POST['log']['start_date']="0000-00-00";
                        if($_POST['log']['end_date']=="")
                            $_POST['log']['end_date']="0000-00-00";*/
                    //var_dump($_POST['mobile_ins']);die();
                        foreach($_POST['log'] as $k=>$v)
                        {
                            $mob[$k] = $v;
                        }
                        $this->MobileLog->create();
                        $this->MobileLog->save($mob);
                        $lid = $this->MobileLog->id;
    
                    }
                    $this->loadModel('MobileNote');
                    $this->MobileNote->deleteAll(array('mobileins_id'=>$lid));
                    $action['mobileins_id'] = $lid;
                    
                    foreach($_POST['mobtime'] as $key =>$time)
                    {
                        if($time!="")
                        {
                            $action['time'] = $time;
                            $action['detail'] = $_POST['mobdetail'][$key];
                            $this->MobileNote->create();
                            $this->MobileNote->save($action);
                        }
                    }
                    $this->loadModel('MobileSite');
                    $this->MobileSite->deleteAll(array('mobilelog_id'=>$lid));
                    $site['mobilelog_id'] = $lid;
                    foreach($_POST['arrival'] as $k=>$s)
                    {
                        if($s!= "")
                        {
                            $site['arrival'] = $s;
                            $site['depart'] = $_POST['depart'][$k];
                            $site['siteaddress'] = $_POST['siteaddress'][$k];
                            $site['guardonsite'] = $_POST['guardonsite'][$k];
                            $this->MobileSite->create();
                            $this->MobileSite->save($site);
                        }
                    }
                    
                    
                }    
                if($_POST['report_type']=='7')
                {
                    /* report type 7*/
                    $this->loadModel('StoreInfo');
                    $this->loadModel('SubjectInfo');
                    $this->loadModel('SpecialistInfo');
                    $this->loadModel('ProductDInfo');
                    $this->loadModel('PoliceInfo');
                    $this->loadModel('JuvenileInfo');
                    $this->loadModel('NoticeInfo');
                    $this->loadModel('AdditionalInfo');
                    $this->loadModel('ItemInfo');
                    /* report type 7*/
                    
                    $this->StoreInfo->deleteAll(array('doc_id'=>$eid));
                    $store['doc_id'] = $eid;
                    foreach($_POST['store'] as $k=>$v)
                    {
                        $store[$k] = $v ;
                    }
                    unset($v, $k);
                    $this->StoreInfo->save($store);
                    
                    $this->SubjectInfo->deleteAll(array('doc_id'=>$eid));
                    $subject['doc_id'] = $eid;
                    foreach($_POST['subject'] as $k=>$v)
                    {
                       $subject[$k] = $v; 
                    }
                    unset($v , $k);
                    $this->SubjectInfo->save($subject);
                    
                    $this->SpecialistInfo->deleteAll(array('doc_id'=>$eid));
                    $special['doc_id'] = $eid;
                    foreach($_POST['specialist'] as $k=>$v)
                    {
                       $special[$k] = $v; 
                    }
                    unset($v , $k);
                    $this->SpecialistInfo->save($special);
                    
                    $this->ProductDInfo->deleteAll(array('doc_id'=>$eid));
                    $product['doc_id'] = $eid;
                    foreach($_POST['product'] as $k=>$v)
                    {
                       $product[$k] = $v; 
                    }
                    unset($v , $k);
                    $this->ProductDInfo->save($product);
                    
                    $this->PoliceInfo->deleteAll(array('doc_id'=>$eid));
                    $police['doc_id'] = $eid;
                    foreach($_POST['police'] as $k=>$v)
                    {
                       $police[$k] = $v; 
                    }
                    unset($v , $k);
                    $this->PoliceInfo->save($police);
                    
                    $this->JuvenileInfo->deleteAll(array('doc_id'=>$eid));
                    $juvenile['doc_id'] = $eid;
                    foreach($_POST['juvenile'] as $k=>$v)
                    {
                       $juvenile[$k] = $v; 
                    }
                    unset($v , $k);
                    $this->JuvenileInfo->save($juvenile);
                    
                    $this->NoticeInfo->deleteAll(array('doc_id'=>$eid));
                    $notice['doc_id'] = $eid;
                    foreach($_POST['notice'] as $k=>$v)
                    {
                       $notice[$k] = $v; 
                    }
                    unset($v , $k);
                    $this->NoticeInfo->save($notice);
                    
                    $this->AdditionalInfo->deleteAll(array('doc_id'=>$eid));
                    $add['doc_id'] = $eid;
                    foreach($_POST['additional'] as $k=>$v)
                    {
                       $add[$k] = $v; 
                    }
                    unset($v , $k);
                    $this->AdditionalInfo->save($add);
                    
                    $this->ItemInfo->deleteAll(array('doc_id'=>$eid));
                    $ii=-1;
                    $arr['case'] = $_POST['item_case'];
                    $arr['doc_id'] = $eid ;
                    for($i=0;$i<8;$i++)//$_POST['item'] as $key=>$val)
                    {
                        
                        $this->ItemInfo->create();
                        $arr['ids'] = $_POST['item']['id'][$i];
                        $arr['desc'] = $_POST['item']['desc'][$i];
                        $arr['sku'] = $_POST['item']['sku'][$i];
                        $arr['price'] = $_POST['item']['price'][$i];
                        $this->ItemInfo->save($arr);
                    }
                    //die();
                    //var_dump($item); die();
                    //var_dump($_POST['item']); die();
                    
                }    
                    
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
                $client['client_feedback'] = $_POST['memo_type'];
                $client['guard_name'] = $_POST['guard_name'];
                $client['time'] = $_POST['memo_time'];
                $client['date'] = $_POST['memo_date'];
				
		
				
                $this->Clientmemo->create();
                $this->Clientmemo->save($client);
                
                
                
            }/*
            elseif($_POST['document_type']== 'personal_inspection')
            {
                $this->Personal_inspection->deleteAll(array('document_id'=>$eid));
             
                $per['document_id'] = $eid;
                foreach($_POST as $key=>$post)
                {
                    $in = array('document_type','emp_name1','site','jobs_title','date_submit','date_verify','date_verify2','evaluation','manager_name','emp_name2','overall_rating','uniform','uniform2','grooming','proper_equipment','piercing','positioning');
                    if(in_array($key,$in))
                    {
                        $per[$key] = $post;
                    }
                }
                $this->loadModel('Personal_inspection');
                $this->Personal_inspection->create();
                $this->Personal_inspection->save($per);            
                
            }
            elseif($_POST['document_type'] == 'vehicle_inspection')
            {
                $this->Vehicle_inspection->deleteAll(array('document_id'=>$eid));
                $veh['document_id'] = $eid;
                //$veh['document_id'] = $id;
                $too = $_POST['to'];
                $att_to = explode(':',$too);
                $veh['hour_to'] = $att_to[0];
                $veh['min_to'] = $att_to[1];
                
                $from = $_POST['from'];
                $att_fo = explode(':',$from);
                $veh['hour_from'] = $att_fo[0];
                $veh['min_from'] = $att_fo[1];
                foreach($_POST as $key=>$post)
                {
                    $in2 = array('vehicle_date','hour_from','min_from','hour_to','min_to','guard','vehicle_unit_number','plate','start_km','finish_km','light','horn','rotating_light','spot_light','safety','file_box','lock_box','first_aid','ownership','front','back','side','note','operation_review');
                    if(in_array($key,$in2))
                    {
                        $veh[$key] = $post;
                    }
                }
                //var_dump($veh);die();
                $this->loadModel('Vehicle_inspection');
                $this->Vehicle_inspection->create();
                $this->Vehicle_inspection->save($veh);
                $vehicle_id = $this->Vehicle_inspection->id;
                $this->loadModel('Vehicle_note');
                $this->Vehicle_note->deleteAll(array('vehicle_id'=>$vid));
                if($_POST['desc1'] && $_POST['document_type']=='vehicle_inspection')
                {
                    foreach($_POST['desc1'] as $desc1)
                    {
                        $notes = $desc1;
                        $ar_no = explode('__',$notes);
                        $arr_v['notes'] = $ar_no[0];
                        $arr_v['coords'] = $ar_no[1];
                        $arr_v['note_no'] = $ar_no[2];
                        $arr_v['vehicle_id'] = $vehicle_id;                        
                        $arr_v['image'] = 'first';
                        $this->loadModel('Vehicle_note');
                        $this->Vehicle_note->create();
                        $this->Vehicle_note->save($arr_v);
                        unset($ar_no);
                        unset($arr_v);
                    }
                    foreach($_POST['desc2'] as $desc1)
                    {
                        $notes = $desc1;
                        $ar_no = explode('__',$notes);
                        $arr_v['notes'] = $ar_no[0];
                        $arr_v['coords'] = $ar_no[1];
                        $arr_v['note_no'] = $ar_no[2];
                        $arr_v['vehicle_id'] = $vehicle_id;
                        $arr_v['image'] = 'second';
                        $this->loadModel('Vehicle_note');
                        $this->Vehicle_note->create();
                        $this->Vehicle_note->save($arr_v);
                        unset($ar_no);
                        unset($arr_v);
                    }
                    foreach($_POST['desc3'] as $desc1)
                    {
                        $notes = $desc1;
                        $ar_no = explode('__',$notes);
                        $arr_v['notes'] = $ar_no[0];
                        $arr_v['coords'] = $ar_no[1];
                        $arr_v['note_no'] = $ar_no[2];
                        $arr_v['vehicle_id'] = $vehicle_id;
                        $arr_v['image'] = 'third';
                        $this->loadModel('Vehicle_note');
                        $this->Vehicle_note->create();
                        $this->Vehicle_note->save($arr_v);
                    }
                    
                }
            }
            elseif($_POST['document_type'] == 'mobile_inspection')
            {
                if(isset($_POST['mobile_id']))
                    $mid = $_POST['mobile_id'];
                if(isset($mid) && $mid != "")
                {
                    $this->MobileInspection->id = $mid;
                    //var_dump($_POST['mobile_ins']); die();
                    foreach($_POST['mobile_ins'] as $k=>$v)
                    {
                        
                        $this->MobileInspection->saveField($k,$v);
                    }
                }
                else
                {
                    $mob['document_id'] = $eid;
                    //echo $_POST['mobile_ins']['date'];
                    if($_POST['mobile_ins']['date']=="")
                       $_POST['mobile_ins']['date']='0000-00-00';
                       //die();
                //var_dump($_POST['mobile_ins']);die();
                    $this->MobileInspection->deleteAll(array('document_id'=>$eid));
                    foreach($_POST['mobile_ins'] as $k=>$v)
                    {
                        $mob[$k] = $v;
                    }
                    //$this->loadModel('MobileInspection');
                    $this->MobileInspection->create();
                    $this->MobileInspection->save($mob);
                    $mid = $this->MobileInspection->id;   
                }
                
                
                $this->MobileAction->deleteAll(array('mobileins_id'=>$mid));
                $action['mobileins_id'] = $mid;
                foreach($_POST['mobtime'] as $key =>$time)
                {
                    if($time!="")
                    {
                        $action['time'] = $time;
                        $action['detail'] = $_POST['mobdetail'][$key];
                        $this->MobileAction->create();
                        $this->MobileAction->save($action);
                    }
                }    
            }
            elseif($_POST['document_type'] == 'mobile_vehicle_trunk_inventory')
            {
              if(isset($_POST['inv_id']))
                $iid = $_POST['inv_id'];
              
              if(isset($iid) && $iid!="")
              {
                  $this->MobileTrunk->id = $iid;
                  foreach($_POST['inventory'] as $k=>$v)
                  {
                    $this->MobileTrunk->saveField($k, $v);
                  }  
              }
              else
              {
                    $inventory['document_id'] = $eid;
                $this->MobileTrunk->deleteAll(array('document_id'=>$eid));
                foreach($_POST['inventory'] as $k=>$v)
                {
                    $inventory[$k] = $v;
                }
                //var_dump($inventory);
                
                //$this->loadModel('MobileTrunk');
                $this->MobileTrunk->create();
                $this->MobileTrunk->save($inventory);
              }
            }
            elseif($_POST['document_type'] == 'mobile_log')
            {
                $this->loadModel('MobileLog');
                if(isset($_POST['log_id']))
                    $lid = $_POST['log_id'];
                
                if(isset($lid) && $lid !="" )
                {
                    $this->MobileLog->id = $lid;
                    
                    //var_dump($_POST['mobile_ins']);die();
                    foreach($_POST['log'] as $k=>$v)
                    {
                        $this->MobileLog->saveField($k,$v);
                    }
                }
                else
                {
                    $mob['document_id'] = $eid;
                    $this->MobileLog->deleteAll(array('document_id'=>$eid));
                    
                //var_dump($_POST['mobile_ins']);die();
                    foreach($_POST['log'] as $k=>$v)
                    {
                        $mob[$k] = $v;
                    }
                    $this->MobileLog->create();
                    $this->MobileLog->save($mob);
                    $lid = $this->MobileLog->id;

                }
                $this->loadModel('MobileNote');
                $this->MobileNote->deleteAll(array('mobileins_id'=>$lid));
                $action['mobileins_id'] = $lid;
                
                foreach($_POST['mobtime'] as $key =>$time)
                {
                    if($time!="")
                    {
                        $action['time'] = $time;
                        $action['detail'] = $_POST['mobdetail'][$key];
                        $this->MobileNote->create();
                        $this->MobileNote->save($action);
                    }
                }
                $this->loadModel('MobileSite');
                $this->MobileSite->deleteAll(array('mobilelog_id'=>$lid));
                $site['mobilelog_id'] = $lid;
                foreach($_POST['arrival'] as $k=>$s)
                {
                    if($s!= "")
                    {
                        $site['arrival'] = $s;
                        $site['depart'] = $_POST['depart'][$k];
                        $site['siteaddress'] = $_POST['siteaddress'][$k];
                        $site['guardonsite'] = $_POST['guardonsite'][$k];
                        $this->MobileSite->create();
                        $this->MobileSite->save($site);
                    }
                }
                
                
            }*/
                $mails = $this->Jobmember->find('all',array('conditions'=>array('OR'=>array(array('job_id LIKE'=>$_POST['job'].',%'), array('job_id'=>$_POST['job']),array('job_id LIKE'=>'%,'.$_POST['job'].',%'),array('job_id LIKE'=>'%,'.$_POST['job'])))));
                //var_dump($mails);
                $aE = $this->User->find('first');
                $adminEmail = $aE['User']['email'];
                if($_SERVER['SERVER_NAME']=='localhost')
                    $base_url = "http://localhost/veritas/";
                else
                    {
                        $base_url =	 str_replace('//','___',$_SERVER['SERVER_NAME']);
                        $base_url =  str_replace('/',' ',$_SERVER['SERVER_NAME']);
                        $base_url = trim($base_url);
                        $base_url = str_replace(' ','/',$base_url);
                        $base_url = str_replace('___','//',$base_url);
                        $base_url = $base_url.'/';
                        
                    }
                    
                if(str_replace('http://','',$base_url) == $base_url)
                        $base_url = 'http://'.$base_url;
                
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
                        
                        $emails->subject("A new document has been uploaded.");
                        $emails->emailFormat('html');
                        $jj = $this->Job->find('first',array('conditions'=>array('id'=>$_POST['job'])));
                        if($jj)
                        $job_title = $jj['Job']['title'];
                        else
                        $job_title = '';
                        if($_POST['document_type']== 'evidence')
                            $message="Job: ".$job_title."<br/>
                            Document: ".$arr['title']."<br/>
                            Author: ".$_POST['evidence_author']."<br/>
                            Evidence Type: ".$_POST['evidence_type']."<br/>Incident Date:".$_POST['incident_date']."<br/>Uploaded by: ".$this->Session->read('username')."<br/>
                            Upload Date: ".date('Y-m-d')."<br/> Please <a href='".$base_url."?upload=".$eid."'>Click Here</a> to Login<br><br>- The Veritas Team";
                        else
                            $message="
                            Job: ".$job_title."<br/>
                            Document: ".$arr['title']."<br/>
                            Who Uploaded: ".$this->Session->read('username')."<br/>
                            Upload Date: ".date('Y-m-d')."
                            <br/> Please <a href='".$base_url."?upload=".$eid."'>Click Here</a> to Login<br><br>- The Veritas Team";
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
            
            $arr['document_type'] = $_POST['document_type'];
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
            
            $ext_doc = array('doc','docx','txt','pdf','xls','xlsx','ppt','pptx','cmd','csv');
            $ext_img = array('jpg','png','gif','jpeg','bmp');
            $ext_video = array('mp4');
            
            for($i=1;$i<=$doc;$i++)
            {
                if($_FILES['document_'.$i]['tmp_name']!="")
                {
                    $this->Doc->deleteAll(array('document_id'=>$id));
                    $this->Image->deleteAll(array('document_id'=>$id));
                    $this->Video->deleteAll(array('document_id'=>$id));
                    $source=$_FILES['document_'.$i]['tmp_name'];
                    $rand = $arr['title'].$subname."_".date('Y-m-d_H-i-s');
                    $whiteSpace = '';
                    $pattern = '/[^a-zA-Z0-9-_'  . $whiteSpace . ']/u';
                    $rand = preg_replace($pattern, '', (string) $rand);
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
                if(in_array($lower_ext,$ext_video))
                {
                    
                    $d['video'] = $img;
                    $this->Video->create();
                    $this->Video->save($d);
                }
                else
                {
                    $this->Session->setFlash('Document Updated, but the file couldn\'t be saved due to unknown extension');
                }
        
            }
            }
            if(isset($_POST['emailadd']) && $_POST['emailadd'])
            {
                if(isset($jj))
                    unset($jj);
                $jj = $this->Job->find('first',array('conditions'=>array('id'=>$_POST['job'])));
                if($jj)
                    $job_title = $jj['Job']['title'];
                else
                    $job_title = '';
                if($_SERVER['SERVER_NAME']=='localhost')
                    $base_url = "http://localhost/veritas/";
                else{
                        $base_url =	 str_replace('//','___',$_SERVER['SERVER_NAME']);
                        $base_url =  str_replace('/',' ',$_SERVER['SERVER_NAME']);
                        $base_url = trim($base_url);
                        $base_url = str_replace(' ','/',$base_url);
                        $base_url = str_replace('___','//',$base_url);
                        $base_url = $base_url.'/';
                        
                    }
                    if(str_replace('http://','',$base_url)==$base_url)
                    $base_url = 'http://'.$base_url;
                            $tosend = $_POST['emailadd'] ;
							
							
							$bcc = array($_POST['emailadd2'], $_POST['emailadd3']);

		
                            $msg = 
                            
                            "A report has been uploaded in Veritas. Please see below for more detail.<br/><br/>
                            <table border='1' style='width:100%;'>
                                <tr><td><strong>Document Type</strong></td><td>Report</td></tr>
                                
                                <tr><td><strong>Job Title</strong></td><td>".$job_title."</td></tr>
                                <tr><td><strong>Report Type</strong></td><td>Incident Report</td></tr>
                                <tr><td><strong>Incident Report Type</strong></td><td>".$_POST['incident_type']."</td></tr>
                                
                                <tr><td colspan='2'>
                                    <table width='100%'>
                                        <tr><td><strong>Date</strong></td><td><strong>Time</strong></td><td><strong>Description</strong></td></tr>";
                                        if(isset($activity))
                                        unset($activity);
                                        foreach($_POST['activity_time'] as $k=>$v){
                                        $activity['time'] = $v;
                                        $activity['date'] = $_POST['activity_date'][$k];
                                        $activity['desc'] = $_POST['activity_desc'][$k];    
                                        $msg = $msg. "<tr><td>".$activity['date']."</td><td>".$activity['time']."</td><td>".$activity['desc']."</td></tr>";
                                        }
                                        
                                    $msg = $msg. "</table>
                                </td></tr>
                                <tr><td><strong>Additional notes</strong></td><td>".$_POST['description']."</td></tr>
                                <tr><td><strong>Uploaded By</strong></td><td>".$this->Session->read('username')."</td></tr>
                                <tr><td><strong>Uploaded On</strong></td><td>".date('Y-m-d')."</td></tr>
                            </table>";
                            
                            
                            if($tosend)
                            {
                                $emails = new CakeEmail();
                                $emails->from(array('noreply@veritas.com'=>'Veritas'));

                                $emails->subject("Veritas - Report Uploaded");
                                $emails->emailFormat('html');
                                $emails->to($tosend);
								$emails->bcc      = $bcc;

                                if($img)
                                $emails->attachments(APP . 'webroot/img/documents/'.$img);
                                $emails->send($msg);
                                $emails->reset();
                                
                            }
                        }
            if($_POST['emailadd'])
                $this->Session->setFlash('Data Saved Successfully, Email Sent.');
            $log['date'] =  date('Y-m-d H:i:s');
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
            $this->Session->setFlash('Data Saved Successfully.');
            $this->redirect('/dashboard');
        }
        else
        {
            $this->Session->delete('image_name');
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
        $jjj = $this->Job->findById($doc['Document']['job_id']);
        $this->set('job_name',$jjj['Job']['title']);
        $this->set('doc', $doc);
    }
    
    function special_doc($eid='')
    {
        $this->loadModel('Canupdload');
        if($this->Session->read('user'))
        { 
            $id = $this->Session->read('id');
           if($canupdate = $this->Canupload->find('first', array('conditions'=>array('member_id'=>$id))))
                    $this->set('canupdate',$canupdate);
              
        }
        $this->loadModel('AdminDoc');
        $this->set('admin_doc',$this->AdminDoc->find('first'));
       $this->loadModel('SpecJob');
       if($eid != "")
       {
            $doc = $this->SpecJob->find('first',array('conditions'=>array('id'=>$eid)));
            $this ->set('doc',$doc);
            $this->set('eid',$eid);
       }
       if(isset($_POST['submit']))
       {
            $this->loadModel('Emailupload');
            $this->loadModel('Job');
            $this->loadModel('Member');
            $this->loadModel('User');
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
                $path = $_SERVER['DOCUMENT_ROOT'].'/veritas/app/webroot/img/documents/';
            }
            else
                $path = $_SERVER['DOCUMENT_ROOT'].'/app/webroot/img/documents/';
            if(!$this->Session->read('admin'))   
                $id=$this->Session->read('id');
            else
                $id=0;
                
            $arr['dop'] = $_POST['incident_date'];
            $arr['author'] =  $_POST['author'];
            $arr['job_id'] = $_POST['job_id'];
            $this->loadModel('Job');
            $jobf = $this->Job->findById($_POST['job_id']);
            $arr['job_title'] = $jobf['Job']['title'];
            $arr['on_date'] =  date('Y-m-d H:i:s');
            $arr['addedBy'] = $id;
            $arr['link'] = $_POST['link'];
            //$arr['title'] = ucfirst(str_replace("_"," ",$_POST['document_type']));
            $arr['desc'] = $_POST['description'];
            $arr['document_type'] = $_POST['document_type'];
                        
            $ext_doc = array('doc','docx','txt','pdf','xls','xlsx','ppt','pptx','cmd','csv');
            $ext_img = array('jpg','png','gif','jpeg','bmp');
            $ext_video = array('mp4');
            if($_FILES['document']['tmp_name']!="")
            {
                $source=$_FILES['document']['tmp_name'];
                $rand = rand('10000','99999')."_".date('Y-m-d_H-i-s');
                $whiteSpace = '';
                $pattern = '/[^a-zA-Z0-9-_'  . $whiteSpace . ']/u';
                $rand = preg_replace($pattern, '', (string) $rand);
                $ext_arr = explode('.',$_FILES['document']['name']);
                $extn = end($ext_arr);
                
                $lower_ext = strtolower($extn);
                if(in_array($lower_ext,$ext_doc)|| in_array($lower_ext,$ext_img)|| in_array($lower_ext,$ext_video))
                {    
                    $img = $rand.'.'.$lower_ext;
                    $destination = $path.$img;
                    move_uploaded_file($source,$destination);
                    $arr['doc'] = $img;
                }
            }
            if($eid!="")
            {
                $this->SpecJob->id =$eid;
                foreach($arr as $key=>$val)
                {
                    $this->SpecJob->saveField($key,$val);
                }
            }
            else
            {
                $this->SpecJob->create();
                $this->SpecJob->save($arr);
                $eid = $this->SpecJob->id;
            }
            $log['date'] =  date('Y-m-d H:i:s');
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
            
            
            
            
            
            
            
            /* for eamil */
            
            $jobbid = $this->Job->find('first',array('conditions'=>array('is_special'=>1)));
            if($jobbid){
            $mails = $this->Jobmember->find('all',array('conditions'=>array('job_id'=>$jobbid['Job']['id'])));
                //var_dump($mails);
                
                $aE = $this->User->find('first');
                 $adminEmail = $aE['User']['email'];
                if($_SERVER['SERVER_NAME']=='localhost')
                    $base_url = "http://localhost/veritas/";
                else{
                        $base_url =	 str_replace('//','___',$_SERVER['SERVER_NAME']);
                        $base_url =  str_replace('/',' ',$_SERVER['SERVER_NAME']);
                        $base_url = trim($base_url);
                        $base_url = str_replace(' ','/',$base_url);
                        $base_url = str_replace('___','//',$base_url);
                        $base_url = $base_url.'/';
                        
                    }
                    if(str_replace('http://','',$base_url)==$base_url)
                    $base_url = 'http://'.$base_url;
                
                
                
                
            //Email Ends// 
            $arr['date'] = date('Y-m-d H:i:s');
            $arr['job_id'] = $jobbid['Job']['id'];
            $arr['addedBy'] = $id;
            $addedBy = $id;
            $job_title = $jobbid['Job']['title'];
			
		//	debug($arr);exit;
            //$this->Document->create();
            //$this->Document->save($arr);
            //$id=$this->Document->id;
            //var_dump($mails);die();
            //var_dump($mails);die();
            
            foreach($mails as $m)
                {
                    
                    $mem_id = $m['Jobmember']['member_id'];
                    if($emailupload = $this->Emailupload->findByMemberId($mem_id))
                    if($_POST['document_type'] == 'AFIMAC Intel')
                    $doct = 'afimac_intel';
                    else
                    $doct = 'news_media';
                    if($emailupload['Emailupload'][$doct] == 1 )
                    if($t = $this->Member->find('first',array('conditions'=>array('id'=>$mem_id))))
                    {
                        //die('here1');
                        $to = $t['Member']['email'];
                        $emails = new CakeEmail();
                        $emails->from(array('noreply@veritas.com'=>'Veritas'));
                        
                        $emails->subject("A new document has been uploaded!");
                        $emails->emailFormat('html');
                        
                            $message="
							Job: ".$job_title."<br/>
                            Document: ".$arr['document_type']."<br/>
                            Author: ".$arr['author']."<br/>
                            Upload Date: ".date('Y-m-d')."<br/><a href='".$base_url."?upload_s=".$eid."'>Click Here</a> to login and view the document.";
                        
                            
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
                            //die($to);
                            $emails->to($to);
                            if($to != $this->Session->read('email'))
                            $emails->send($message);
                            $emails->reset();
                        }
                        
                        }
                    }    
                }
                //die('here');
            }
            
            /* for emial */
         
            $this->Event_log->create();
            $this->Event_log->save($log);
            $this->Session->setFlash('Data Saved Successfully.');
            $this->redirect('/dashboard');
                 
        }
    }
    function upload($ids,$typee='')
    {
        $this->loadModel('DeploymentRate');
        if($rates = $this->DeploymentRate->findByJobId($ids))
        {
            $this->set('rates',$rates);
        }
        $jj = $this->Job->find('first',array('conditions'=>array('id'=>$ids)));
        if($jj)
            $job_title = $jj['Job']['title'];
        else
            $job_title = '';
            $this->loadModel('Canupload');
            $this->loadModel('AdminDoc');
        $this->set('admin_doc',$this->AdminDoc->find('first'));
        if($this->Session->read('user'))
        { 
            $id = $this->Session->read('id');
           if($canupdate = $this->Canupload->find('first', array('conditions'=>array('member_id'=>$id))))
                    $this->set('canupdate',$canupdate);  
        }
          //var_dump($jj);  
        if($jj['Job']['is_special']=='1')
        {
            $this->set('job_id',$ids);
            $this->render('special_doc');
            
        }
        else
        {   
        if($typee!='email')                 
            $this->set('typee',$typee);
        $subname = '';
        
        $this->loadModel('Activity');
        $this->loadModel('Emailupload');
        
        if($this->Session->read('user'))
        {
           if($this->Session->read('upload')!='1')
           {
            $this->redirect('/jobs');
           } 
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
            if($this->Session->read('admin'))
                $arr['approved'] = '1'; 
            $doc_typ = $_POST['document_type'];
            if($doc_typ!='personal_inspection'){
            $arr['description'] = $_POST['description'];
            }
            $arr['document_type'] = $_POST['document_type'];
            
            if($_POST['document_type']== 'evidence')
            {
                $arr['incident_date'] = $_POST['incident_date'];
            
                //$arr['desc'] = $_POST['desc'];
                $arr['evidence_type'] = $_POST['evidence_type'];
                $arr_e = array('Incident Report','Line Crossing Sheet','Shift Summary','Incident Video','Executive Summary','Average Picket Count','Victim Statement','Miscellaneous');
                $k   = array_search($_POST['evidence_type'],$arr_e);
                $arr['ev_id'] = $k+1;
                $arr['evidence_author'] = $_POST['evidence_author'];
                $subname = '_'.$_POST['evidence_type'];
              
            }
            elseif($_POST['document_type'] == 'siteOrder')
            {
                $arr['site_type'] = $_POST['site_type'];
                $arr_so = array('Post Orders','Operational Memos','Site Maps','Forms');
                $k = array_search($_POST['site_type'],$arr_so);
                $arr['so_id'] = $k+1;
                $subname = '_'.$_POST['site_type'];
            }
            elseif($_POST['document_type'] == 'employee')
            {
                $arr['employee_type'] = $_POST['employee_type'];
                $arr_em = array('Job Descriptions','Drug Free Policy','Schedules');
                $k = array_search($_POST['employee_type'],$arr_em);
                $arr['emp_id'] = $k+1;
                 $subname = '_'.$_POST['employee_type'];

            }
            elseif($_POST['document_type'] == 'training')
            {
                $arr['training_type'] = $_POST['training_type'];
                 
                $subname = '_'.$_POST['training_type'];
				//debug($arr);exit;
            }
            elseif($_POST['document_type'] == 'client_feedback')
            {
                $arr['client_feedback'] = $_POST['memo_type'];
                $subname = '_'.$_POST['memo_type'];
				//debug($arr);exit;
            }
            if($_POST['document_type']=='report')
            {
                $arr['re_id'] = $_POST['report_type'];
            }
            $arr['draft'] = $_POST['draft'];
            
           
                
                $aE = $this->User->find('first');
                 $adminEmail = $aE['User']['email'];
                if($_SERVER['SERVER_NAME']=='localhost')
                    $base_url = "http://localhost/veritas/";
                else{
                        $base_url =	 str_replace('//','___',$_SERVER['SERVER_NAME']);
                        $base_url =  str_replace('/',' ',$_SERVER['SERVER_NAME']);
                        $base_url = trim($base_url);
                        $base_url = str_replace(' ','/',$base_url);
                        $base_url = str_replace('___','//',$base_url);
                        $base_url = $base_url.'/';
                        
                    }
                    if(str_replace('http://','',$base_url)==$base_url)
                    $base_url = 'http://'.$base_url;
          
            $arr['date'] = date('Y-m-d H:i:s');
            $arr['job_id'] = $_POST['job'];
            $this->loadModel('Job');
            $jobf = $this->Job->findById($_POST['job']);
            $arr['job_title'] = $jobf['Job']['title'];
            $arr['addedBy'] = $id;
            $addedBy = $id;
			
		//	debug($arr);exit;
            $this->Document->create();
            $this->Document->save($arr);
            $id=$this->Document->id;
            
            if($_POST['document_type']=='deployment_rate')
            {
                $this->loadModel('Equipment');
                $this->loadModel('Personnel');
                $count = count($_POST['Equipment']['items']);
                $equ = $_POST['Equipment'];
                for($i=0;$i<$count;$i++)
                {
                    $eq['items'] =  $equ['items'][$i];
                    $eq['qty'] =  $equ['qty'][$i];
                    if(isset($equ['kms'][$i]))
                    $eq['kms'] =  $equ['kms'][$i];
                    if(isset($equ['fuel_cost'][$i]))
                    $eq['fuel_cost'] =  str_replace('$','',$equ['fuel_cost'][$i]);
                    if(isset($equ['hotel_cost'][$i]))
                    $eq['hotel_cost'] =  str_replace('$','',$equ['hotel_cost'][$i]);
                    
                    $eq['amount_billable'] =  str_replace('$','',$equ['amount_billable'][$i]);
                    $eq['doc_id'] = $id;
                    $eq['total'] =$_POST['total'];
                    $eq['tax'] =$_POST['tax'];
                    $eq['a_fee'] =$_POST['a_fee'];
                    $eq['g_total'] =$_POST['g2_tot'];
                    $this->Equipment->create();
                    $this->Equipment->save($eq);
                }
                
                unset($equ);
                unset($eq);
                
                $count = count($_POST['Personnel']['position']);
                $equ = $_POST['Personnel'];
                for($i=0;$i<$count;$i++)
                {
                    $eq['position'] =  $equ['position'][$i];
                    $eq['no_of_staff'] =  $equ['no_of_staff'][$i];
                    $eq['start_time'] =  $equ['start_time'][$i];
                    $eq['end_time'] =  $equ['end_time'][$i];
                    $eq['total_hours'] =  $equ['total_hours'][$i];
                    $eq['hours_billable'] =  str_replace('$','',$equ['hours_billable'][$i]);
                    $eq['travel'] =  $equ['travel'][$i];
                    $eq['travel_billable'] =  str_replace('$','',$equ['travel_billable'][$i]);
                    $eq['meal_amount'] =  $equ['meal_amount'][$i];
                    $eq['meal_billable'] =  str_replace('$','',$equ['meal_billable'][$i]);
                    $eq['doc_id'] = $id;
                    $eq['doc_id'] = $id;
                    $eq['total'] =$_POST['total'];
                    $eq['tax'] =$_POST['tax'];
                    $eq['a_fee'] =$_POST['a_fee'];
                    $eq['g_total'] =$_POST['g2_tot'];
                    $this->Personnel->create();
                    $this->Personnel->save($eq);
                }
                              
            }
            
            if($_POST['document_type'] == 'vehicle_inspection')
            {
                $veh['document_id'] = $id;
                $too = $_POST['to'];
                $att_to = explode(':',$too);
                
                $veh['hour_to'] = $att_to[0];
                $veh['min_to'] = $att_to[1];
                
                $from = $_POST['from'];
                $att_fo = explode(':',$from);
                $veh['hour_from'] = $att_fo[0];
                $veh['min_from'] = $att_fo[1];
                foreach($_POST as $key=>$post)
                {
                    $in2 = array('vehicle_date','hour_from','min_from','hour_to','min_to','guard','vehicle_unit_number','plate','start_km','finish_km','light','horn','rotating_light','spot_light','safety','file_box','lock_box','first_aid','ownership','front','back','side','note','operation_review');
                    if(in_array($key,$in2))
                    {
                        $veh[$key] = $post;
                    }
                }
                //var_dump($veh);die();
                $this->loadModel('Vehicle_inspection');
                $this->Vehicle_inspection->create();
                $this->Vehicle_inspection->save($veh);
                $vehicle_id = $this->Vehicle_inspection->id;
                if($_POST['desc1'] && $_POST['document_type']=='vehicle_inspection')
                {
                    foreach($_POST['desc1'] as $desc1)
                    {
                        $notes = $desc1;
                        $ar_no = explode('__',$notes);
                        $arr_v['notes'] = $ar_no[0];
                        $arr_v['coords'] = $ar_no[1];
                        $arr_v['note_no'] = $ar_no[2];
                        $arr_v['vehicle_id'] = $vehicle_id;
                        $arr_v['image'] = 'first';
                        $this->loadModel('Vehicle_note');
                        $this->Vehicle_note->create();
                        $this->Vehicle_note->save($arr_v);
                        unset($ar_no);
                        unset($arr_v);
                    }
                    foreach($_POST['desc2'] as $desc1)
                    {
                        $notes = $desc1;
                        $ar_no = explode('__',$notes);
                        $arr_v['notes'] = $ar_no[0];
                        $arr_v['coords'] = $ar_no[1];
                        $arr_v['note_no'] = $ar_no[2];
                        $arr_v['vehicle_id'] = $vehicle_id;
                        $arr_v['image'] = 'second';
                        $this->loadModel('Vehicle_note');
                        $this->Vehicle_note->create();
                        $this->Vehicle_note->save($arr_v);
                        unset($ar_no);
                        unset($arr_v);
                    }
                    foreach($_POST['desc3'] as $desc1)
                    {
                        $notes = $desc1;
                        $ar_no = explode('__',$notes);
                        $arr_v['notes'] = $ar_no[0];
                        $arr_v['coords'] = $ar_no[1];
                        $arr_v['note_no'] = $ar_no[2];
                        $arr_v['vehicle_id'] = $vehicle_id;
                        $arr_v['image'] = 'third';
                        $this->loadModel('Vehicle_note');
                        $this->Vehicle_note->create();
                        $this->Vehicle_note->save($arr_v);
                    }
                    
                }
            }
            if($_POST['document_type'] == 'mobile_vehicle_trunk_inventory')
            {
                $inventory['document_id'] = $id;
                
                foreach($_POST['inventory'] as $k=>$v)
                {
                    $inventory[$k] = $v;
                }
                //var_dump($inventory);
                
                $this->loadModel('MobileTrunk');
                $this->MobileTrunk->create();
                $this->MobileTrunk->save($inventory);
            }
            
            if($_POST['document_type'] == 'mobile_log')
            {
                $mob['document_id'] = $id;
                //var_dump($_POST['mobile_ins']);die();
                foreach($_POST['log'] as $k=>$v)
                {
                    $mob[$k] = $v;
                }
                $this->loadModel('MobileLog');
                $this->MobileLog->create();
                $this->MobileLog->save($mob);
                $action['mobileins_id'] = $this->MobileLog->id;
                $site['mobilelog_id'] = $this->MobileLog->id;
                $this->loadModel('MobileNote');
                foreach($_POST['mobtime'] as $key =>$time)
                {
                    if($time!="")
                    {
                        $action['time'] = $time;
                        $action['detail'] = $_POST['mobdetail'][$key];
                        $this->MobileNote->create();
                        $this->MobileNote->save($action);
                    }
                }
                $this->loadModel('MobileSite');
                foreach($_POST['arrival'] as $k=>$s)
                {
                    if($s!= "")
                    {
                        $site['arrival'] = $s;
                        $site['depart'] = $_POST['depart'][$k];
                        $site['siteaddress'] = $_POST['siteaddress'][$k];
                        $site['guardonsite'] = $_POST['guardonsite'][$k];
                        $this->MobileSite->create();
                        $this->MobileSite->save($site);
                    }
                }
                
                
            }
            if($_POST['document_type'] == 'mobile_inspection')
            {
                $mob['document_id'] = $id;
                //var_dump($_POST['mobile_ins']);die();
                foreach($_POST['mobile_ins'] as $k=>$v)
                {
                    $mob[$k] = $v;
                }
                $this->loadModel('MobileInspection');
                $this->MobileInspection->create();
                $this->MobileInspection->save($mob);
                $action['mobileins_id'] = $this->MobileInspection->id;
                $this->loadModel('MobileAction');
                foreach($_POST['mobtime'] as $key =>$time)
                {
                    if($time!="")
                    {
                        $action['time'] = $time;
                        $action['detail'] = $_POST['mobdetail'][$key];
                        $this->MobileAction->create();
                        $this->MobileAction->save($action);
                    }
                }
                
                
            }
            if($_POST['document_type']== 'report')
            {
                $activity['document_id'] = $id;
                $activity['report_type'] = $_POST['report_type'];
                $activity['uploaded_on'] = date('Y-m-d');
                if(isset($activity['report_type']))
                    $activity['incident_type'] = $_POST['incident_type'];
                    
                $act_type = array('','activityLog','mobileInspection','mobileSecurity','securityOccurence','incidentReport','signOffSheet','lossPrevention','staticSiteAudit','insuranceSiteAudit','siteSignin','instruction','personalInspection','mobileInspection','mobileLog','inventory','vehicleInspection','dispilinary');
                if($_POST['report_type'])
                    $subname = '_'.$act_type[$_POST['report_type']];
                if($_POST['report_type']=='8')
                {
                    $this->loadModel('StaticSiteAudit');
                    $_POST['doc_id'] = $id;
                    $this->StaticSiteAudit->create();
                    $this->StaticSiteAudit->save($_POST);
                    
                }
                if($_POST['report_type']=='11')
                {
                    $this->loadModel('Instruction');
                    $this->Instruction->create();
                    $_POST['doc_id'] = $id;
                    $_POST['signature'] = $this->Session->read('image_name');
                    $this->Instruction->save($_POST);
                }
                // Personal Inspection 
                if($_POST['report_type'] == '12')
                {
                    $per['document_id'] = $id;
                    
                    foreach($_POST as $key=>$post)
                    {
                        $in = array('document_type','emp_name1','site','jobs_title','date_submit','date_verify','date_verify2','evaluation','manager_name','emp_name2','overall_rating','uniform','uniform2','grooming','proper_equipment','piercing','positioning');
                        if(in_array($key,$in))
                        {
                            $per[$key] = $post;
                        }
                    }
                    $per['signature'] = $this->Session->read('image_name');
                    $this->loadModel('Personal_inspection');
                    $this->Personal_inspection->create();
                    $this->Personal_inspection->save($per);
                }
                if($_POST['report_type'] == '13')
                {
                    $mob['document_id'] = $id;
                    //var_dump($_POST['mobile_ins']);die();
                    foreach($_POST['mobile_ins'] as $k=>$v)
                    {
                        $mob[$k] = $v;
                    }
                    $mob['signature'] = $this->Session->read('image_name');
                    $this->loadModel('MobileInspection');
                    $this->MobileInspection->create();
                    $this->MobileInspection->save($mob);
                    $action['mobileins_id'] = $this->MobileInspection->id;
                    $this->loadModel('MobileAction');
                    foreach($_POST['mobtime'] as $key =>$time)
                    {
                        if($time!="")
                        {
                            $action['time'] = $time;
                            $action['detail'] = $_POST['mobdetail'][$key];
                            $this->MobileAction->create();
                            $this->MobileAction->save($action);
                        }
                    }
                    
                    
                }
                if($_POST['report_type'] == '16')
                {
                    $veh['document_id'] = $id;
                    $too = $_POST['to'];
                    $att_to = explode(':',$too);
                    
                    $veh['hour_to'] = $att_to[0];
                    $veh['min_to'] = $att_to[1];
                    
                    $from = $_POST['from'];
                    $att_fo = explode(':',$from);
                    $veh['hour_from'] = $att_fo[0];
                    $veh['min_from'] = $att_fo[1];
                    foreach($_POST as $key=>$post)
                    {
                        $in2 = array('vehicle_date','hour_from','min_from','hour_to','min_to','guard','vehicle_unit_number','plate','start_km','finish_km','light','horn','rotating_light','spot_light','safety','file_box','lock_box','first_aid','ownership','front','back','side','note','operation_review');
                        if(in_array($key,$in2))
                        {
                            $veh[$key] = $post;
                        }
                    }
                    $veh['signature'] = $this->Session->read('image_name');
                    //var_dump($veh);die();
                    $this->loadModel('Vehicle_inspection');
                    $this->Vehicle_inspection->create();
                    $this->Vehicle_inspection->save($veh);
                    $vehicle_id = $this->Vehicle_inspection->id;
                    if($_POST['desc1'] && $_POST['report_type']=='16')
                    {
                        $this->loadModel('Vehicle_note');
                        foreach($_POST['desc1'] as $desc1)
                    {
                        $notes = $desc1;
                        $ar_no = explode('__',$notes);
                        $arr_v['notes'] = $ar_no[0];
                        $arr_v['coords'] = $ar_no[1];
                        $arr_v['note_no'] = $ar_no[2];
                        $arr_v['vehicle_id'] = $vehicle_id;
                        $arr_v['image'] = 'first';
                        
                        $this->Vehicle_note->create();
                        $this->Vehicle_note->save($arr_v);
                        unset($ar_no);
                        unset($arr_v);
                    }
                    foreach($_POST['desc2'] as $desc1)
                    {
                        $notes = $desc1;
                        $ar_no = explode('__',$notes);
                        $arr_v['notes'] = $ar_no[0];
                        $arr_v['coords'] = $ar_no[1];
                        $arr_v['note_no'] = $ar_no[2];
                        $arr_v['vehicle_id'] = $vehicle_id;
                        $arr_v['image'] = 'second';
                        
                        $this->Vehicle_note->create();
                        $this->Vehicle_note->save($arr_v);
                        unset($ar_no);
                        unset($arr_v);
                    }
                    
                    foreach($_POST['desc3'] as $desc1)
                    {
                        $notes = $desc1;
                        $ar_no = explode('__',$notes);
                        $arr_v['notes'] = $ar_no[0];
                        $arr_v['coords'] = $ar_no[1];
                        $arr_v['note_no'] = $ar_no[2];
                        $arr_v['vehicle_id'] = $vehicle_id;
                        $arr_v['image'] = 'third';
                        
                        $this->Vehicle_note->create();
                        $this->Vehicle_note->save($arr_v);
                    }
                    
                }
            }
            if($_POST['report_type'] == '15')
            {
                $inventory['document_id'] = $id;
                
                foreach($_POST['inventory'] as $k=>$v)
                {
                    $inventory[$k] = $v;
                }
                $inventory['signature'] = $this->Session->read('image_name');
                //var_dump($inventory);
                
                $this->loadModel('MobileTrunk');
                $this->MobileTrunk->create();
                $this->MobileTrunk->save($inventory);
            }
            
            if($_POST['report_type'] == '18')
            {
                $illness = $_POST;
                $illness['document_id'] = $id;
                $illness['signature'] = $this->Session->read('image_name');
                $this->loadModel('InjuryIllness');
                if(isset($_POST['picture']))
                {
                    foreach($_POST['picture'] as $p){
                    $pic['document_id'] = $id;
                    $pic['file'] = $p;
                    $this->loadModel('InjuryPicture');
                    $this->InjuryPicture->create();
                    $this->InjuryPicture->save($pic);
                    }   
                }
                if(isset($_POST['medical_forms']))
                {
                    foreach($_POST['medical_forms'] as $p){
                    $form['document_id'] = $id;
                    $form['file'] = $p;
                    $this->loadModel('InjuryForm');
                    $this->InjuryForm->create();
                    $this->InjuryForm->save($form);
                    }   
                }
                $this->InjuryIllness->create();
                $this->InjuryIllness->save($illness);
            }
            
            if($_POST['report_type'] == '14')
            {
                $mob['document_id'] = $id;
                //var_dump($_POST['mobile_ins']);die();
                foreach($_POST['log'] as $k=>$v)
                {
                    $mob[$k] = $v;
                }
                $mob['signature'] = $this->Session->read('image_name');
                $this->loadModel('MobileLog');
                $this->MobileLog->create();
                $this->MobileLog->save($mob);
                $action['mobileins_id'] = $this->MobileLog->id;
                $site['mobilelog_id'] = $this->MobileLog->id;
                $this->loadModel('MobileNote');
                foreach($_POST['mobtime'] as $key =>$time)
                {
                    if($time!="")
                    {
                        $action['time'] = $time;
                        $action['detail'] = $_POST['mobdetail'][$key];
                        $this->MobileNote->create();
                        $this->MobileNote->save($action);
                    }
                }
                $this->loadModel('MobileSite');
                foreach($_POST['arrival'] as $k=>$s)
                {
                    if($s!= "")
                    {
                        $site['arrival'] = $s;
                        $site['depart'] = $_POST['depart'][$k];
                        $site['siteaddress'] = $_POST['siteaddress'][$k];
                        $site['guardonsite'] = $_POST['guardonsite'][$k];
                        $this->MobileSite->create();
                        $this->MobileSite->save($site);
                    }
                }
                
                
            }
                if($_POST['report_type']=='10')
                {
                    
                    $this->loadModel('SiteSignin');
                    $sitesignin['doc_id'] = $id;
                    $sitesignin['guard_name'] = $_POST['guard_name'];
                    $sitesignin['date'] = $_POST['date'];
                    $sitesignin['loss_location'] = $_POST['loss_location'];
                    $sitesignin['sign']=$this->Session->read('image_name');
                    //var_dump($_POST['arrival']);
                    //die('10');
                    foreach($_POST['arrival'] as $k=>$v)
                    {
                        
                        if($v!= "")
                        {
                           $sitesignin['arrival'] =$v;
                           $sitesignin['depart'] = $_POST['depart'][$k];
                           $sitesignin['print_name'] = $_POST['name'][$k];
                           $sitesignin['phone_no'] = $_POST['phone'][$k];
                           $sitesignin['company'] = $_POST['company'][$k];
                           $sitesignin['signature'] = $_POST['sign'][$k];
                        
                            $this->SiteSignin->create();
                            $this->SiteSignin->save($sitesignin);
                        }
                    }
                       
                }
                if($_POST['report_type']=='9')
                {
                    $this->loadModel('InsuranceSiteAudit');
                     $_POST['doc_id'] = $id;
                    $this->InsuranceSiteAudit->create();
                    $this->InsuranceSiteAudit->save($_POST);
                    
                }
                 if($_POST['report_type']=='17')
                {
                    //die('aa');
                    $this->loadModel('Dispilinary');
                    $_POST['disp']['document_id'] = $id;
                    $this->Dispilinary->create();
                    foreach($_POST['disp']['rules']as $k=>$v)
                    {
                        $_POST['disp']['rule'] .= $v;
                        if($k != count($_POST['disp']['rules'])-1)
                            $_POST['disp']['rule'] .= ",";
                    }
                    foreach($_POST['disp']['warnings']as $k=>$v)
                    {
                        $_POST['disp']['warning'] .= $v;
                        if($k != count($_POST['disp']['warnings'])-1)
                            $_POST['disp']['warning'] .= ",";
                    }
                    
                    //var_dump($_POST['disp']);
                    //die();
                    $_POST['disp']['signature'] = $this->Session->read('image_name');
                    $this->Dispilinary->save($_POST['disp']);
                    
                }
                if($_POST['report_type']=='7')
                {
                    
                    $this->loadModel('StoreInfo');
                    $store['doc_id'] = $id;
                    foreach($_POST['store'] as $k=>$v)
                    {
                        $store[$k] = $v ;
                    }
                    unset($v, $k);
                    $this->StoreInfo->save($store);
                    
                    $this->loadModel('SubjectInfo');
                    $subject['doc_id'] = $id;
                    foreach($_POST['subject'] as $k=>$v)
                    {
                       $subject[$k] = $v; 
                    }
                    unset($v , $k);
                    $this->SubjectInfo->save($subject);
                    
                    $this->loadModel('SpecialistInfo');
                    $special['doc_id'] = $id;
                    foreach($_POST['specialist'] as $k=>$v)
                    {
                       $special[$k] = $v; 
                    }
                    unset($v , $k);
                    $this->SpecialistInfo->save($special);
                    
                    $this->loadModel('ProductDInfo');
                    $product['doc_id'] = $id;
                    foreach($_POST['product'] as $k=>$v)
                    {
                       $product[$k] = $v; 
                    }
                    unset($v , $k);
                    $this->ProductDInfo->save($product);
                    
                    $this->loadModel('PoliceInfo');
                    $police['doc_id'] = $id;
                    foreach($_POST['police'] as $k=>$v)
                    {
                       $police[$k] = $v; 
                    }
                    unset($v , $k);
                    $this->PoliceInfo->save($police);
                    
                    $this->loadModel('JuvenileInfo');
                    $juvenile['doc_id'] = $id;
                    foreach($_POST['juvenile'] as $k=>$v)
                    {
                       $juvenile[$k] = $v; 
                    }
                    unset($v , $k);
                    $this->JuvenileInfo->save($juvenile);
                    
                    $this->loadModel('NoticeInfo');
                    $notice['doc_id'] = $id;
                    foreach($_POST['notice'] as $k=>$v)
                    {
                       $notice[$k] = $v; 
                    }
                    unset($v , $k);
                    $this->NoticeInfo->save($notice);
                    
                    $this->loadModel('AdditionalInfo');
                    $add['doc_id'] = $id;
                    foreach($_POST['additional'] as $k=>$v)
                    {
                       $add[$k] = $v; 
                    }
                    unset($v , $k);
                    $this->AdditionalInfo->save($add);
                    
                    $this->loadModel('ItemInfo');
                    $ii=-1;
                    $arr['case'] = $_POST['item_case'];
                    $arr['doc_id'] = $id ;
                    for($i=0;$i<8;$i++)//$_POST['item'] as $key=>$val)
                    {
                        
                        $this->ItemInfo->create();
                        $arr['ids'] = $_POST['item']['id'][$i];
                        $arr['desc'] = $_POST['item']['desc'][$i];
                        $arr['sku'] = $_POST['item']['sku'][$i];
                        $arr['price'] = $_POST['item']['price'][$i];
                        $this->ItemInfo->save($arr);
                    }
                    //die();
                    //var_dump($item); die();
                    //var_dump($_POST['item']); die();
                    
                }
                if($_POST['report_type']==8 || $_POST['report_type']==9|| $_POST['report_type']==10|| $_POST['report_type']==11|| $_POST['report_type']==12|| $_POST['report_type']==13|| $_POST['report_type']==14|| $_POST['report_type']==15|| $_POST['report_type']==16|| $_POST['report_type']==17|| $_POST['report_type']==18)
                {
                    $this->Activity->create();
                    $this->Activity->save($activity);
                }
                else
                {
                    foreach($_POST['activity_time'] as $k=>$v)
                    {
                        if($v != "")
                        {
                            $activity['time'] = $v;
                            $activity['addedBy'] = $addedBy;
                            $activity['date'] = $_POST['activity_date'][$k];
                            $activity['desc'] = $_POST['activity_desc'][$k];
                            $this->Activity->create();
                            $this->Activity->save($activity);
                            
                        }
                         
                    }
                }
                
                
            }
            $mails = $this->Jobmember->find('all',array('conditions'=>array('OR'=>array(array('job_id LIKE'=>$ids.',%'), array('job_id'=>$ids),array('job_id LIKE'=>'%,'.$ids.',%'),array('job_id LIKE'=>'%,'.$ids)))));
            if($this->Session->read('approve')=='0'){
            foreach($mails as $m)
            {
                    
                    $mem_id = $m['Jobmember']['member_id']; 
                    if($emailupload = $this->Emailupload->findByMemberId($mem_id))
                    if($emailupload['Emailupload'][$_POST['document_type']] == 1 )
                    if($t = $this->Member->find('first',array('conditions'=>array('id'=>$mem_id))))
                    {
                        //var_dump($t);die();
                        $to = $t['Member']['email'];
                        $emails = new CakeEmail();
                        $emails->from(array('noreply@veritas.com'=>'Veritas'));
                        
                        $emails->subject("A new document has been uploaded!");
                        $emails->emailFormat('html');
                        if($_POST['document_type']== 'evidence')
                            $message="
							Job: ".$job_title."<br/>
                            Document: ".$arr['title']."<br/>
                            Author: ".$_POST['evidence_author']."<br/>
                            Evidence Type: ".$_POST['evidence_type']."<br/>Description: ".$_POST['description']."<br/>Incident Date:".$_POST['incident_date']."<br/>Uploaded by: ".$this->Session->read('username')."<br/>
                            Upload Date: ".date('Y-m-d')."<br/><a href='".$base_url."?upload=".$id."'>Click Here</a> to login and view the document.";
                        else
                            $message="
                            Job: ".$job_title."<br/>
                            Document: ".$arr['title']."<br/>
                            Who Uploaded: ".$this->Session->read('username')."<br/>
                            Upload Date: ".date('Y-m-d')."

                            <br/><a href='".$base_url."?upload=".$id."'>Click Here</a> to login and view the document.";
                            
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
                            //die($to);
                            $emails->to($to);
                            if($to != $this->Session->read('email'))
                                $emails->send($message);
                            $emails->reset();
                        }
                        
                        }
                    }    
                }
              } 
              
            if($_POST['document_type']== 'client_feedback')
            {
                $this->loadModel('Clientmemo');
                $client['document_id'] = $id;
                $client['memo_type'] = $_POST['memo_type'];
                $client['guard_name'] = $_POST['guard_name'];
                $client['time'] = $_POST['memo_time'];
                $client['date'] = $_POST['memo_date'];
                $this->Clientmemo->create();
                $this->Clientmemo->save($client);
                $qA = $this->User->find('all');
				//debug($qa);exit;
                if($qA)
                {
                    if($this->Session->read('approve')=='0')
                    foreach($qA as $qa){
                    $emails = new CakeEmail();
                        $emails->from(array('noreply@veritas.com'=>'Veritas'));
                        
                        $emails->subject("Client Feedback Uploaded.");
                        $emails->emailFormat('html');
                        
                            $message="                            
                            Job: ".$job_title."<br/>
                            Document: ".$arr['title']."<br/>Uploaded by: ".$this->Session->read('username')."<br/>
                           Upload Date: ".date('Y-m-d')."<br/><a href='".$base_url."?upload=".$id."'>Click Here</a> to login and view the document.";
						   
                        $emails->to($qa['User']['email']);
                            $emails->send($message);
                            $emails->reset();
                            }
                }
                
                
            }
            $doc = $_POST['document'];
            
            $ext_doc = array('doc','docx','txt','pdf','xls','xlsx','ppt','pptx','cmd','csv');
            $ext_img = array('jpg','png','gif','jpeg','bmp');
            $ext_video = array('mp4');
            
            
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
                /*
                if(strlen($arr['description'])>10)
                    $fname = substr($arr['description'],0,10);
                else
                    $fname = $arr['description'];
                
                    //echo $fname;die();
                $fname = str_replace(' ',"_",$fname);
                $fname = urlencode($fname);
                */
                $rand = $arr['title'].$subname."_".date('Y-m-d_H-i-s');
                $whiteSpace = '';
                $pattern = '/[^a-zA-Z0-9-_'  . $whiteSpace . ']/u';
                $rand = preg_replace($pattern, '', (string) $rand);
                $ext_arr = explode('.',$_FILES['document_'.$i]['name']);
                $extn = end($ext_arr);
                
                $lower_ext = strtolower($extn);
                $img = $rand.'.'.$lower_ext;
                //die($img);
                $destination = $path.$img;
                //$destination = $path.$_FILES['document_'.$i]['name'];
                move_uploaded_file($source,$destination);
                $d['document_id'] = $id;
                
                if(in_array($lower_ext,$ext_doc)){
                    
                    $do = $img;
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
                if(in_array($lower_ext,$ext_video))
                {
                    $d['video'] = $img;
                    $this->Video->create();
                $this->Video->save($d);
                }
                else
                {
                    $this->Session->setFlash('Document Saved, but the file couldn\'t be saved due to an unknown extension.');
                }

            }
            }
            if(isset($_POST['emailadd']) && $_POST['emailadd'])
            {
                if($this->Session->read('approve')=='0')
                {            
                if($_SERVER['SERVER_NAME']=='localhost')
                    $base_url = "http://localhost/veritas/";
                else{
                        $base_url =	 str_replace('//','___',$_SERVER['SERVER_NAME']);
                        $base_url =  str_replace('/',' ',$_SERVER['SERVER_NAME']);
                        $base_url = trim($base_url);
                        $base_url = str_replace(' ','/',$base_url);
                        $base_url = str_replace('___','//',$base_url);
                        $base_url = $base_url.'/';
                        
                    }
					
                            $tosend = $_POST['emailadd'];
							$bcc = array($_POST['emailadd2'], $_POST['emailadd3']);
                            $msg = 
                            
                            "A report has been uploaded in Veritas. Please see below for more detail.<br/><br/>
                            <table border='1' style='width:100%;'>
                                <tr><td><strong>Document Type</strong></td><td>Report</td></tr>
                                
                                <tr><td><strong>Job Title</strong></td><td>".$job_title."</td></tr>
                                <tr><td><strong>Report Type</strong></td><td>Incident Report</td></tr>
                                <tr><td><strong>Incident Report Type</strong></td><td>".$_POST['incident_type']."</td></tr>
                                
                                <tr><td colspan='2'>
                                    <table width='100%'>
                                        <tr><td><strong>Date</strong></td><td><strong>Time</strong></td><td><strong>Description</strong></td></tr>";
                                        if(isset($activity))
                                        unset($activity);
                                        foreach($_POST['activity_time'] as $k=>$v){
                                        $activity['time'] = $v;
                                        $activity['date'] = $_POST['activity_date'][$k];
                                        $activity['desc'] = $_POST['activity_desc'][$k];    
                                        $msg = $msg. "<tr><td>".$activity['date']."</td><td>".$activity['time']."</td><td>".$activity['desc']."</td></tr>";
                                        }
                                        
                                    $msg = $msg. "</table>
                                </td></tr>
                                <tr><td><strong>Additional notes</strong></td><td>".$_POST['description']."</td></tr>
                                <tr><td><strong>Uploaded By</strong></td><td>".$this->Session->read('username')."</td></tr>
                                <tr><td><strong>Uploaded On</strong></td><td>".date('Y-m-d')."</td></tr>
                            </table>";
                            
                            //echo $msg;die();
                            if($tosend)
                            {
                                $emails = new CakeEmail();
                                $emails->from(array('noreply@veritas.com'=>'Veritas'));
                        
                                $emails->subject("Veritas - Report Uploaded");
                                $emails->emailFormat('html');
                                $emails->to($tosend);
                                $emails->bcc($bcc);
                                if($img)
                                $emails->attachments(APP . 'webroot/img/documents/'.$img);
                                $emails->send($msg);
                                $emails->reset();
                                
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
            if(isset($_POST['emailadd'] )&& $_POST['emailadd'])
                $this->Session->setFlash('Data Saved Successfully, Email Sent.');
            else
                $this->Session->setFlash('Data Saved Successfully.');
            $log['date'] =  date('Y-m-d H:i:s');
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
            $this->redirect('/dashboard');
        }
        else
        {
            $this->Session->delete('image_name');
        }
        $this->set('job_id',$ids);
        $j = $this->Job->findById($ids);
        $name = $j['Job']['title'];
        
        $this->set('job_name',$name);
        $this->render('document_edit');
    }
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
                $do = $this->Document->find('all',array('conditions'=>array('document_type'=>$type,'draft'=>0,'job_id'=>$jid),'order by'=>'job_id'));
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
    
    function view_detail($id,$spec='')
    {
        //die('here');
        $this->loadModel('Personal_inspection');
        $this->loadModel('MobileInspection');
        $this->loadModel('MobileAction');
        $this->loadModel('MobileLog');
        $this->loadModel('MobileNote');
        $this->loadModel('MobileSite');
        $this->loadModel('MobileTrunk');
        $this->loadModel('Dispilinary');
        $this->loadModel('Vehicle_inspection');
        if($id)
        {
            $this->set('perso',$this->Personal_inspection->find('first',array('conditions'=>array('document_id'=>$id))));
            $this->set('vehicle',$this->Vehicle_inspection->find('first',array('conditions'=>array('document_id'=>$id))));
            $vi2 = $this->Dispilinary->find('first',array('conditions'=>array('document_id'=>$id)));
            $this->set('dw',$vi2);
            $vi = $this->Vehicle_inspection->find('first',array('conditions'=>array('document_id'=>$id)));
            if($vi)
            {
                $vid = $vi['Vehicle_inspection']['id'];
                $this->loadModel('Vehicle_note');
                $this->set('vn',$this->Vehicle_note->find('all',array('conditions'=>array('vehicle_id'=>$vid))));
            }
            if($mem = $this->MobileInspection->findByDocumentId($id))
            {
                $mem_action = $this->MobileAction->find('all',array('conditions'=>array('mobileins_id'=>$mem['MobileInspection']['id'])));
                $this->set('mem_action',$mem_action);
                $this->set('mobins',$mem);
            }
            if($n = $this->MobileLog->findByDocumentId($id))
            {
                //var_dump($n);
                $mem_note = $this->MobileNote->find('all',array('conditions'=>array('mobileins_id'=>$n['MobileLog']['id'])));
                $this->set('mem_note',$mem_note);
                
                if($mem_site = $this->MobileSite->find('all',array('conditions'=>array('mobilelog_id'=>$n['MobileLog']['id']))))
                    $this->set('mem_site',$mem_site);
                
                $this->set('moblog',$n); 
            }
            if($in = $this->MobileTrunk->findByDocumentId($id))
            {
                $this->set('inv', $in);
            }            
        }
        $this->loadModel('Activity');
        $this->loadModel('Clientmemo');
        $this->loadModel('SpecJob');
        $this->set('job',$this->Job);
                $this->set('member',$this->Member);
        if($spec =='special')
        {
            $this->set('doc',$this->SpecJob->findById($id));
            $this->set('job',$this->Job);
            $this->render('view_special');
        }
        else
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
            
            if($this->Document->find('first',array('conditions'=>array('id'=>$id))))
            {
                
                $doc = $this->Document->find('first',array('conditions'=>array('id'=>$id)));
                $job_id = $doc['Document']['job_id'];
                if($doc['Document']['document_type']== 'report')
                {
                    $eid = $id;
                    $act = $this->Activity->find('all',array('conditions'=>array('document_id'=>$id)));
                    $this->set('activity', $act);
                    $this->loadModel('StoreInfo');
                    if($act[0]['Activity']['report_type'] == '7')
                    {
                        $this->set('store',$this->StoreInfo->find('first', array('conditions'=>array('doc_id'=>$eid))));
                        $this->loadModel('SubjectInfo');
                            $this->set('subject',$this->SubjectInfo->find('first', array('conditions'=>array('doc_id'=>$eid))));
                         
                        $this->loadModel('SpecialistInfo');
                            $this->set('special',$this->SpecialistInfo->find('first', array('conditions'=>array('doc_id'=>$eid))));
                        $this->loadModel('ProductDInfo');
                            $this->set('product',$this->ProductDInfo->find('first', array('conditions'=>array('doc_id'=>$eid))));
                        $this->loadModel('PoliceInfo');
                            $this->set('police',$this->PoliceInfo->find('first', array('conditions'=>array('doc_id'=>$eid))));
                        $this->loadModel('JuvenileInfo');
                            $this->set('juv',$this->JuvenileInfo->find('first', array('conditions'=>array('doc_id'=>$eid))));
                        $this->loadModel('NoticeInfo');
                            $this->set('notice',$this->NoticeInfo->find('first', array('conditions'=>array('doc_id'=>$eid))));
                        $this->loadModel('AdditionalInfo');
                            $this->set('add',$this->AdditionalInfo->find('first', array('conditions'=>array('doc_id'=>$eid))));
                        $this->loadModel('ItemInfo');
                            $this->set('item',$this->ItemInfo->find('all', array('conditions'=>array('doc_id'=>$eid))));
                        
                    }
                    if($act[0]['Activity']['report_type']=='8')
                    {
                        $this->loadModel('StaticSiteAudit');
                            $this->set('static',$this->StaticSiteAudit->find('first', array('conditions'=>array('doc_id'=>$eid))));
                    }
                    if($act[0]['Activity']['report_type']='18')
                    {
                        //die('a');
                        $this->loadModel('InjuryIllness');
                        $this->loadModel('InjuryPicture');
                        $this->loadModel('InjuryForm');
                        $this->set('ii',$this->InjuryIllness->findByDocumentId($eid));
                        $this->set('ip',$this->InjuryPicture->find('all',array('conditions'=>array('document_id'=>$eid))));
                        $this->set('if',$this->InjuryForm->find('all',array('conditions'=>array('document_id'=>$eid))));
                        //$this->set('if',$this->InjuryForm->findByDocumentId($did));        
                        
                    }
                    if($act[0]['Activity']['report_type']=='9')
                    {
                        $this->loadModel('InsuranceSiteAudit');
                            $this->set('static',$this->InsuranceSiteAudit->find('first', array('conditions'=>array('doc_id'=>$eid))));
                    }
                    if($act[0]['Activity']['report_type']=='10')
                    {
                        $this->loadModel('SiteSignin');
                            $this->set('static',$this->SiteSignin->find('all', array('conditions'=>array('doc_id'=>$eid))));
                            
                    }
                    if($act[0]['Activity']['report_type']=='11')
                    {
                            $this->loadModel('Instruction');
                            $this->set('instructions',$this->Instruction->find('first', array('conditions'=>array('doc_id'=>$eid))));
                    }
                     if($act[0]['Activity']['report_type']=='12')
                    {
                        $this->set('perso',$this->Personal_inspection->find('first',array('conditions'=>array('document_id'=>$eid))));
                    }
                    
                    if($act[0]['Activity']['report_type']=='13')
                    {
                       if($mem = $this->MobileInspection->findByDocumentId($id))
                        {
                            $mem_action = $this->MobileAction->find('all',array('conditions'=>array('mobileins_id'=>$mem['MobileInspection']['id'])));
                            $this->set('mem_action',$mem_action);
                            $this->set('mobins',$mem);
                        } 
                    }
                    if($act[0]['Activity']['report_type']=='14')
                    {
                         if($n = $this->MobileLog->findByDocumentId($id))
                        {
                            //var_dump($n);
                            $mem_note = $this->MobileNote->find('all',array('conditions'=>array('mobileins_id'=>$n['MobileLog']['id'])));
                            $this->set('mem_note',$mem_note);
                            
                            if($mem_site = $this->MobileSite->find('all',array('conditions'=>array('mobilelog_id'=>$n['MobileLog']['id']))))
                                $this->set('mem_site',$mem_site);
                            
                            $this->set('moblog',$n); 
                        }
                    } 
                     if($act[0]['Activity']['report_type']=='15')
                     {
                        if($in = $this->MobileTrunk->findByDocumentId($id))
                        {
                            $this->set('inv', $in);
                        }   
                     }
                      if($act[0]['Activity']['report_type']=='16')
                      {
                        if($vi)
                        {
                            $vid = $vi['Vehicle_inspection']['id'];
                            $this->loadModel('Vehicle_note');
                            $this->set('vn',$this->Vehicle_note->find('all',array('conditions'=>array('vehicle_id'=>$vid))));
                        }
                      }
                      if($act[0]['Activity']['report_type']=='17')
                      {
                        if($vi)
                        {
                            $vid = $vi['Disciplinary']['id'];
                            $this->loadModel('Disciplinary');
                            $this->set('vn',$this->Vehicle_note->find('all',array('conditions'=>array('vehicle_id'=>$vid))));
                        }
                      }
                }
                elseif($doc['Document']['document_type'] == 'client_feedback')
                    $this->set('memo',$this->Clientmemo->findByDocumentId($id));
                elseif($doc['Document']['document_type'] == 'deployment_rate'){
                    $this->loadModel('Personnel');
                    $this->loadModel('Equipment');
                $this->set('personnel',$this->Personnel->find('all',array('conditions'=>array('doc_id'=>$id))));
                $this->set('equipment',$this->Equipment->find('all',array('conditions'=>array('doc_id'=>$id))));    
                }
                
                $log['date'] = date('Y-m-d H:i:s');
                $log['time'] = date('H:i:s');
                if($this->Session->read('admin'))
                {
                    $log['fullname'] = 'ADMIN('.$this->Session->read('avatar').')';
                    $log['username'] = $this->Session->read('email');
                    $log['member_id'] = 0;
                }
                else
                {
                    $ids = $this->Session->read('id');
                    $ch = $this->Jobmember->find('first',array('conditions'=>array('member_id'=>$ids,'OR'=>array(array('job_id'=>$job_id),array('job_id LIKE'=>$job_id.',%'),array('job_id LIKE'=>'%,'.$job_id.',%'),array('job_id LIKE'=>'%,'.$job_id)))));
                    if(!$ch)
                    {
                        $this->redirect('go');
                    }
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
                
            }
            else
            {
                $this->Session->setFlash('Sorry! This Document Already Deleted.');
                $this->redirect('/dashboard');
            }
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
         $this->loadModel('User');
        
        $app1 = $this->User->find('first');
        /*if($app1['User']['approve']==1)
        {
            $app = "'approved'=1";
        }
        else*/
            $app = "";
        $drafts = $this->Document->find('all',array('conditions'=>array('draft'=>'1','addedBy'=>$this->Session->read('id'),$app)));
        
        $this->set('drafts',$drafts);
    }
    public function download($file) {
        //echo APP . 'outside_webroot_dir' . DS; die();
        $this->viewClass = 'Media';
        // Download app/outside_webroot_dir/example.zip
        
        $params = array(
            'id'        => $file,
            'download'  => true,
            'path'      => APP . 'webroot/img/documents/'
        );
        $this->set($params);
    }
    
  public function email($id)
  {
    $this->layout = "modal_layout";
    $this->set('id',$id);
  }
  public function loss_prevention()
  {
    
  }
  public function checkAdminPerm($type)
  {
    if($this->Session->read('admin'))
    {
        $this->loadModel('AdminDoc');
        $q = $this->AdminDoc->find('first');
        if($q['AdminDoc'][$type]==1)
        return true;
        else
        return false;
    }
    else
    {
        $this->loadModel('Canview');
        $q = $this->Canview->find('first',array('conditions'=>array('member_id'=>$this->Session->read('id'))));
        if($type == 'kpiaudits')
        $type = 'KPIAudits';
        if($type == 'site_orders')
        $type = 'siteOrder';
        if($q['Canview'][$type] == 1)
        return true;
        else
        return false;
    }
  }
  function documentType($did='',$type='')
  {
    $did = str_replace('id_','',$did);
    $this->layout = 'modal_layout';
    $this->set('type',$type);
    if($did=='')
    {
        
    }
    else
    {
        if($type=='personal_inspection')
        {
            $this->loadModel('Personal_inspection');
            $this->set('perso',$this->Personal_inspection->find('first',array('conditions'=>array('document_id'=>$did))));
        }
        if($type=='vehicle_inspection')
        {
            $this->loadModel('Vehicle_inspection');
            $vi = $this->Vehicle_inspection->find('first',array('conditions'=>array('document_id'=>$did)));
            $this->set('vehicle',$vi);            
            if($vi)
            {
                $vid = $vi['Vehicle_inspection']['id'];
                $this->loadModel('Vehicle_note');
                $this->set('vn',$this->Vehicle_note->find('all',array('conditions'=>array('vehicle_id'=>$did))));
            }
        }
        if($type=='mobile_inspection')
        {
            $this->loadModel('MobileInspection');
            if($mem = $this->MobileInspection->findByDocumentId($did))
            {
                $this->loadModel('MobileAction');
                $mem_action = $this->MobileAction->find('all',array('conditions'=>array('mobileins_id'=>$mem['MobileInspection']['id'])));
                $this->set('mem_action',$mem_action);
                $this->set('mobins',$mem);
            }
        }
        if($type=='mobile_log')
        {
            $this->loadModel('MobileLog');
            $this->loadModel('MobileNote');
            $this->loadModel('MobileSite');
             if($n = $this->MobileLog->findByDocumentId($did))
                {
                    //var_dump($n);
                    $mem_note = $this->MobileNote->find('all',array('conditions'=>array('mobileins_id'=>$n['MobileLog']['id'])));
                    $this->set('mem_note',$mem_note);                
                    if($mem_site = $this->MobileSite->find('all',array('conditions'=>array('mobilelog_id'=>$n['MobileLog']['id']))))
                        $this->set('mem_site',$mem_site);                
                    $this->set('moblog',$n); 
                }   
        }
    }
  }
  function reportType($did='',$type='')
  {
    $did = str_replace('id_','',$did);
    $this->layout = 'modal_layout';
    $this->set('type',$type);
    if($did=='')
    {
        
    }
    else{
        if($type == "8"){
            $this->loadModel('StaticSiteAudit');
            $this->set('static',$this->StaticSiteAudit->find('first',array('conditions'=>array('doc_id'=>$did))));
            $this->set('type',$type);
        }
        if($type == '9')
        {
            $this->loadModel('InsuranceSiteAudit');
            $this->set('static',$this->InsuranceSiteAudit->find('first',array('conditions'=>array('doc_id'=>$did))));
            $this->set('type',$type);
        }
        if($type == '10')
        {
            $this->loadModel('SiteSignin');
            $this->set('static',$this->SiteSignin->find('all',array('conditions'=>array('doc_id'=>$did))));
            $this->set('type',$type);
        }
        if($type == '11')
        {
            
            $this->loadModel('Instruction');
            $this->set('instructions',$this->Instruction->find('first',array('conditions'=>array('doc_id'=>$did))));
            $this->set('type',$type);
        }
        if($type == '12')
        {
            $this->loadModel('Personal_inspection');
            $this->set('perso',$this->Personal_inspection->find('first',array('conditions'=>array('document_id'=>$did))));
        
        }
        if($type=='13')
        {
            $this->loadModel('MobileInspection');
            if($mem = $this->MobileInspection->findByDocumentId($did))
            {
                $this->loadModel('MobileAction');
                $mem_action = $this->MobileAction->find('all',array('conditions'=>array('mobileins_id'=>$mem['MobileInspection']['id'])));
                $this->set('mem_action',$mem_action);
                $this->set('mobins',$mem);
            }
        }
        if($type=='14')
        {
            $this->loadModel('MobileLog');
            $this->loadModel('MobileNote');
            $this->loadModel('MobileSite');
             if($n = $this->MobileLog->findByDocumentId($did))
                {
                    //var_dump($n);
                    $mem_note = $this->MobileNote->find('all',array('conditions'=>array('mobileins_id'=>$n['MobileLog']['id'])));
                    $this->set('mem_note',$mem_note);                
                    if($mem_site = $this->MobileSite->find('all',array('conditions'=>array('mobilelog_id'=>$n['MobileLog']['id']))))
                        $this->set('mem_site',$mem_site);                
                    $this->set('moblog',$n); 
                }   
        }
        if($type == '15')
        {
            $this->loadModel('MobileTrunk');
            if($in = $this->MobileTrunk->findByDocumentId($did))
            {
                $this->set('inv', $in);
            }            
        }
        if($type=='16')
        {
            $this->loadModel('Vehicle_inspection');
            $vi = $this->Vehicle_inspection->find('first',array('conditions'=>array('document_id'=>$did)));
            $this->set('vehicle',$vi);            
            if($vi)
            {
                $vid = $vi['Vehicle_inspection']['id'];
                $this->loadModel('Vehicle_note');
                $this->set('vn',$this->Vehicle_note->find('all',array('conditions'=>array('vehicle_id'=>$did))));
            }
        }
        if($type=='17')
        {
            //die('a');
            $this->loadModel('Dispilinary');
            $vi = $this->Dispilinary->find('first',array('conditions'=>array('document_id'=>$did)));
            $this->set('vi',$vi);            
            
        }
        if($type=='18')
        {
            //die('a');
            $this->loadModel('InjuryIllness');
            $this->loadModel('InjuryPicture');
            $this->loadModel('InjuryForm');
            $this->set('ii',$this->InjuryIllness->findByDocumentId($did));
            $this->set('ip',$this->InjuryPicture->find('all',array('conditions'=>array('document_id'=>$did))));
            $this->set('if',$this->InjuryForm->find('all',array('conditions'=>array('document_id'=>$did))));
            //$this->set('if',$this->InjuryForm->findByDocumentId($did));        
            
        }
        if($type == '7')
        {
            $this->set('type',$type);
            $eid= $did;
            $this->loadModel('StoreInfo');
            $this->loadModel('SubjectInfo');
            $this->loadModel('SpecialistInfo');
            $this->loadModel('ProductDInfo');
            $this->loadModel('PoliceInfo');
            $this->loadModel('JuvenileInfo');
            $this->loadModel('NoticeInfo');
            $this->loadModel('AdditionalInfo');
            $this->loadModel('ItemInfo');
            $this->set('store',$this->StoreInfo->find('first', array('conditions'=>array('doc_id'=>$eid))));        
            $this->set('subject',$this->SubjectInfo->find('first', array('conditions'=>array('doc_id'=>$eid))));         
        
            $this->set('special',$this->SpecialistInfo->find('first', array('conditions'=>array('doc_id'=>$eid))));
        
            $this->set('product',$this->ProductDInfo->find('first', array('conditions'=>array('doc_id'=>$eid))));
        
            $this->set('police',$this->PoliceInfo->find('first', array('conditions'=>array('doc_id'=>$eid))));
        
            $this->set('juv',$this->JuvenileInfo->find('first', array('conditions'=>array('doc_id'=>$eid))));
        
            $this->set('notice',$this->NoticeInfo->find('first', array('conditions'=>array('doc_id'=>$eid))));
        
            $this->set('add',$this->AdditionalInfo->find('first', array('conditions'=>array('doc_id'=>$eid))));
        
            $this->set('item',$this->ItemInfo->find('all', array('conditions'=>array('doc_id'=>$eid))));
        }
    }
  }
  function image_sess($image)
  {
    $this->Session->write('image_name',$image);
    die();
  }
  
  function deployment_rate($jid)
  {
    $this->loadModel('DeploymentRate');
    $this->set('jid',$jid);
    $job = $this->Job->findById($jid);
    $this->set('jname',$job['Job']['title']);
    
    if($rates = $this->DeploymentRate->findByJobId($jid))
    {
       $this->set("rate",$rates); 
    }
    if(isset($_POST['submit']))
    {
        $this->DeploymentRate->deleteAll(array("job_id",$jid));
        $this->DeploymentRate->create();
        foreach($_POST as $k=>$v)
        {
            if(!$v)
            $v=0;
            $role[$k]=$v;
            
        }
        if($this->DeploymentRate->save($role))
        {
            $this->Session->setFlash("Deployment Rates Successfully Saved.");
            $this->redirect('/jobs');
        }
        
    }
    
  }
  function deployment($jid,$did=null)
  {
    
    $this->loadModel('DeploymentRate');
    $this->loadModel('Personnel');
    $this->loadModel('Equipment');
    $q1=$this->DeploymentRate->findByJobId($jid);
    $this->set('rate',$q1);
    $this->layout = 'modal_layout';
    if($did)
    {
        $this->set('pers',$this->Personnel->find('all',array('conditions'=>array('doc_id'=>$did))));
        $this->set('equip',$this->Equipment->find('all',array('conditions'=>array('doc_id'=>$did))));
    }
  }
  function updatepi()
  {
    $this->loadModel('PersonalInspection');
    $q = $this->PersonalInspection->find('all');
    foreach($q as $p)
    {
        $id = $p['PersonalInspection']['id'];
        echo ($p['PersonalInspection']['uniform']/5);
        echo "<br/>";
        echo ($p['PersonalInspection']['uniform2']/5);
        echo "<br/>";
        
        echo ($p['PersonalInspection']['grooming']/5);
        echo "<br/>";
        echo ($p['PersonalInspection']['proper_equipment']/5);
        echo "<br/>";
        echo ($p['PersonalInspection']['piercing']/5);
        echo "<br/>";
        echo ($p['PersonalInspection']['positioning']/5);
        echo "<br/>";
        echo "<br/>";
        $oa = $p['PersonalInspection']['uniform']+$p['PersonalInspection']['uniform2']+$p['PersonalInspection']['grooming']+$p['PersonalInspection']['proper_equipment']+$p['PersonalInspection']['piercing']+$p['PersonalInspection']['positioning'];
        $oa = $oa/30;
        $oa = $oa*5;
        $number = $oa;

$decimals = 2;

$expo = pow(10,$decimals);

$oa = intval($number*$expo)/$expo;
        $this->PersonalInspection->id = $id;
        $this->PersonalInspection->saveField('overall_rating',$oa);
    }
    die();
  }
  function check_p($model,$id)
  {
    if(!$this->Session->read('admin'))
    $uid = $this->Session->read('id');
    
    $this->loadModel($model);
    if($model=='ReportuploadPermission')
    {
        if($this->ReportuploadPermission->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>$id)))){
        if(!$this->Session->read('admin')){    
        $q = $this->ReportuploadPermission->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>$id)));
        return $q;
        }
        else
        return true;
        }
        else
        return false;
    }
    else
    if($model=='EvidenceuploadPermission')
    {
        
        if($this->EvidenceuploadPermission->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>$id)))){
        if(!$this->Session->read('admin')){    
        $q = $this->EvidenceuploadPermission->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>$id)));
        return $q;
        }
        else
        return true;
        }
        else
        return false;
    }
    else
    if($model=='SiteorderuploadPermission')
    {
        if($this->SiteorderuploadPermission->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>$id)))){
        if(!$this->Session->read('admin')){    
        $q = $this->SiteorderuploadPermission->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>$id)));
        return $q;
        }
        else
        return true;
        }
        else
        return false;
        
    }
    else
    if($model=='EmployeeuploadPermission')
    {
        if($this->EmployeeuploadPermission->find('first',array('conditions'=>array('user_id'=>0,'report_type1'=>$id)))){
        if(!$this->Session->read('admin')){    
        $q = $this->EmployeeuploadPermission->find('first',array('conditions'=>array('user_id'=>$uid,'report_type1'=>$id)));
        return $q;
        }
        else
        return true;
        }
        else
        return false;
        
    }
    return false;
  }
  
  function approve($doc_id,$url ="")
  {
        $this->loadModel('Jobmember');
        $this->loadModel('Document');
        $this->loadModel('Emailupload');
        $this->loadModel('Member');
        if(!$this->Session->read('admin'))
            $this->redirect('/dashboard');
        
        if($_SERVER['SERVER_NAME']=='localhost')
            $base_url = "http://localhost/veritas/";
        else{
                $base_url =	 str_replace('//','___',$_SERVER['SERVER_NAME']);
                $base_url =  str_replace('/',' ',$_SERVER['SERVER_NAME']);
                $base_url = trim($base_url);
                $base_url = str_replace(' ','/',$base_url);
                $base_url = str_replace('___','//',$base_url);
                $base_url = $base_url.'/';
                
            }
        if(str_replace('http://','',$base_url)==$base_url)
            $base_url = 'http://'.$base_url;
        $doc = $this->Document->findById($doc_id);
        $this->Document->id = $doc_id;
        if($this->Document->saveField('approved','1'))
        {    
            $ids = $doc['Document']['job_id'];
            $mails = $this->Jobmember->find('all',array('conditions'=>array('OR'=>array(array('job_id LIKE'=>$ids.',%'), array('job_id'=>$ids),array('job_id LIKE'=>'%,'.$ids.',%'),array('job_id LIKE'=>'%,'.$ids)))));
            //var_dump($mails);die();
            foreach($mails as $m)
            {
                    
                    $mem_id = $m['Jobmember']['member_id']; 
                    if($emailupload = $this->Emailupload->findByMemberId($mem_id))
                    if($emailupload['Emailupload'][$doc['Document']['document_type']] == 1 )
                    if($t = $this->Member->find('first',array('conditions'=>array('id'=>$mem_id))))
                    {
                        //var_dump($t);die();
                        $to = $t['Member']['email'];
                        $emails = new CakeEmail();
                        $emails->from(array('noreply@veritas.com'=>'Veritas'));
                        
                        $emails->subject("A new document has been uploaded!");
                        $emails->emailFormat('html');
                        $jj = $this->Job->find('first',array('conditions'=>array('id'=>$ids)));
                        if($jj)
                            $job_title = $jj['Job']['title'];
                        else
                            $job_title = '';
                        if($_POST['document_type']== 'evidence')
                            $message="
							Job: ".$job_title."<br/>
                            Document: ".$doc['Document']['title']."<br/>
                            Author: ".$_POST['evidence_author']."<br/>
                            Evidence Type: ".$_POST['evidence_type']."<br/>Description: ".$_POST['description']."<br/>Incident Date:".$doc['Document']['incident_date']."<br/>Uploaded by: ".$this->Session->read('username')."<br/>
                            Upload Date: ".date('Y-m-d')."<br/><a href='".$base_url."?upload=".$doc_id."'>Click Here</a> to login and view the document.";
                        else
                            $message="
                            Job: ".$job_title."<br/>
                            Document: ".$doc['Document']['title']."<br/>
                            Who Uploaded: ".$this->Session->read('username')."<br/>
                            Upload Date: ".date('Y-m-d')."

                            <br/><a href='".$base_url."?upload=".$doc_id."'>Click Here</a> to login and view the document.";
                            
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
                                //die($to);
                                $emails->to($to);
                                if($to != $this->Session->read('email'))
                                    $emails->send($message);
                                $emails->reset();
                            }
                        
                        }
                    }    
                
                
                }
            $this->Session->setFlash('Document Approved.','default',array('class'=>'good'));
            if($url =="")
                $this->redirect("/search");
            else
                $this->redirect("view_detail/".$doc_id);
        
        }
        else
            {
                $this->Session->setFlash('Sorry Document Couldnot Be Approved. Please Try Again.','default',array('class'=>'bad'));
                if($url =="")
                    $this->redirect("/search");
                else
                    $this->redirect("view_detail/".$doc_id);
            }
    
    
    
  }
  function attachment_statement1()
  {
            $exp = explode('.',$_FILES['myfile']['name']);
            $ext = end($exp);
            $rand = rand(100000,999999).'_'.rand(100000,999999);
            $file = $rand.'.'.$ext;
            $path = APP.'webroot/img/uploads/'.$file;
            
            move_uploaded_file($_FILES['myfile']['tmp_name'],$path);
            
			echo $file;
            die();
  }
  
}