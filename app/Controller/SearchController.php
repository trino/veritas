<?php
App::uses('AppController', 'Controller');
class SearchController extends AppController
{
    public $name = 'Search';
    
    public function index($type = '',$job_id=0)
    {
        
        $this->loadModel('ReportviewPermission');
        $this->loadModel('User');
        $this->loadModel('Document');
        $app1 = $this->User->find('first');
        if($app1['User']['approve']==1)
        {
            $approve='1';
        }
        else
        $approve='1,0';
            $this->loadModel('ReportuploadPermission');
            $this->loadModel('EvidenceviewPermission');
            $this->loadModel('EvidenceuploadPermission');
            $this->loadModel('EmployeeuploadPermission');
            $this->loadModel('EmployeeviewPermission');
            $this->loadModel('SiteorderuploadPermission');
            $this->loadModel('SiteorderviewPermission');
        $this->loadModel('Member');
        if(!$this->Session->read('admin')){
            $sess_id = $this->Session->read('id');
        }
        else
        {
            $u = $this->Member->find('all',array('conditions'=>array('id NOT IN(SELECT member_id from jobmembers WHERE job_id IN(SELECT id FROM jobs WHERE is_special = 1))')));
            $this->set('u',$u);
            //var_dump($u);die();
        }
        //var_dump($u);die();
        $this->set('type',$type);
        $this->loadModel('Doc');
        $this->loadModel('Image');
        $this->loadModel('Video');
        $this->set('do',$this->Doc);
        $this->set('im',$this->Image);
        $this->set('v',$this->Video);
        $this->loadModel('Document');
        $this->loadModel('Member');
        $this->loadModel('Job');
        $this->loadModel('Jobmember');
        
        $this->loadModel('SpecJob');
        if(isset($sess_id))
            $sess = $this->Jobmember->find('first',array('conditions'=>array('member_id'=>$sess_id)));
        if(isset($sess))
        if($sess)
        {
            $jjj = $sess['Jobmember']['job_id'];
            if(str_replace(',','',$jjj)==$jjj)
            {
                $finds = $this->Job->findById($jjj);
                if($finds && $finds['Job']['is_special'] == 1)
                {
                    $special = 1;
                } 
            }
        }
        
        if($job_id)
        {
            $j = $this->Job->find('first',array('conditions'=>array('id'=>$job_id)));
            $this->set('jobname',$j['Job']['title']);
            unset($j);
        }
        $this->loadModel('Activity');

        if(!$this->Session->read('id'))
        $this->redirect('/dashboard');
                
        if(isset($_GET['search']))
        {
            $search = $_GET['search'];
            if(!$search)
            $search = '';
            $this->set('search',$_GET['search']);
        }
        else
            $search = '';    
                 
        if(isset($_GET['from']))
        {
            $from = $_GET['from'];
        }    
        else
            $from = '';
            
        if(isset($_GET['to']))
        {
            $to = $_GET['to'];
        }    
        else
            $to = '';  
        
            
            if(isset($_GET['order']))
            {
                
                $order = $_GET['order']." ".$_GET['ty'];
            }
            else
                $order = 'document_type,`date` DESC';
            
                
              
        if($this->Session->read('avatar'))
        {
            
            $this->set('alljob',$this->Job->find('all',array('conditions'=>array('is_special'=>0))));
            if($search != ''){
            if(!$from && !$to){
            $this->paginate = array('conditions'=>array('OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),array('draft'=>0)),'order'=>$order,'limit'=>10);
            $this->set('count',$this->Document->find('count',array('conditions'=>array('OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),array('draft'=>0)))));
            }
            else
            if($from && $to)
            {
            if($from != $to){    
            $this->paginate = array('conditions'=>array('OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),array('draft'=>0),'DATE(`date`) >= "'.$from.'"', 'DATE(`date`) <= "'.$to.'"'),'order'=>$order,'limit'=>5);
            $this->set('count',$this->Document->find('count',array('conditions'=>array('OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),array('draft'=>0),'DATE(`date`) >= "'.$from.'"', 'DATE(`date`) <= "'.$to.'"'))));
            }
            else{
            $this->paginate = array('conditions'=>array('OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),array('draft'=>0),'DATE(`date`)'=>$from),'order'=>$order,'limit'=>10);
            $this->set('count',$this->Document->find('count',array('conditions'=>array('OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),array('draft'=>0),'DATE(`date`)'=>$from))));
            }
            
            }
            }
            else
            {
            if(!$from && !$to){
            if($type!='') {
            if($job_id!=0){   
            $this->paginate = array('conditions'=>array('document_type'=>$type,'job_id'=>$job_id,'draft'=>0),'order'=>$order,'limit'=>10);
            $this->set('count',$this->Document->find('count',array('conditions'=>array('document_type'=>$type,'job_id'=>$job_id,'draft'=>0))));
            }
            else{
            $this->paginate = array('conditions'=>array('document_type'=>$type,'draft'=>0),'order'=>$order,'limit'=>10);
            $this->set('count',$this->Document->find('count',array('conditions'=>array('document_type'=>$type,'draft'=>0))));
            }
            }
            else{                        
            if(isset($_GET['member'])){    
            $this->paginate = array('conditions'=>array('addedBy'=>$_GET['member'],'draft'=>0),'order'=>$order,'limit'=>10);
            $this->set('count',$this->Document->find('count',array('conditions'=>array('addedBy'=>$_GET['member'],'draft'=>0))));
            }
            else
            {
                if(!isset($_GET['job'])){
                $this->paginate = array('conditions'=>array('draft'=>0),'order'=>$order,'limit'=>10);
            $this->set('count',$this->Document->find('count',array('conditions'=>array('draft'=>0))));
            }
            else
            {
                $this->paginate = array('conditions'=>array('job_id'=>$_GET['job'],'draft'=>0),'order'=>$order,'limit'=>10);
            $this->set('count',$this->Document->find('count',array('conditions'=>array('job_id'=>$_GET['job'],'draft'=>0))));
            }
            }
            }
            }
            else
            {
            if($from != $to){       
            $this->paginate = array('conditions'=>array('DATE(`date`) >='=>$from, 'DATE(`date`) <='=>$to,'draft'=>0),'order'=>$order,'limit'=>10);
            $this->set('count',$this->Document->find('count',array('conditions'=>array('DATE(`date`) >='=>$from, 'DATE(`date`) <='=>$to,'draft'=>0))));
            }
            else{
            $this->paginate = array('conditions'=>array('DATE(`date`)'=>$from,'draft'=>0),'order'=>$order,'limit'=>10);
            $this->set('count',$this->Document->find('count',array('conditions'=>array('DATE(`date`)'=>$from,'draft'=>0))));
            }
            }
            
            }
            $docs = $this->paginate('Document');
            //$docs = $this->Document->find('all',array('conditions'=>array('title LIKE'=>'%'.$search.'%')));
        }
        else
        {
         
            $this->loadModel('Canview');
            
            $qs = $this->Canview->find('first',array('conditions'=>array('member_id'=>$this->Session->read('id'))));
            $che = $this->Member->find('first',array('conditions',array('id'=>$this->Session->read('id'))));
            $arrs = array();
            if($type =="")
            {
            if($qs['Canview']['contracts'] || $type == 'contracts' || $type == 'contract')
            {
                $arrs[] = array('document_type'=>'contract');
            }
            if($qs['Canview']['report'])
            {
                $in = '9999999';
                if(isset($arr_m_re))
                unset($arr_m_re);
                if(isset($rvp1))
                unset($rvp1);
                $rvp = $this->ReportviewPermission->find('all',array('conditions'=>array('user_id'=>$this->Session->read('id'))));
                $rvp1 = $this->ReportuploadPermission->find('all',array('conditions'=>array('user_id'=>0)));
                if($rvp1){
                    foreach($rvp1 as $m_re)
                    {
                        $arr_m_re[] = $m_re['ReportuploadPermission']['report_type1']; 
                    }
                if($rvp){
                    $in_c = 0;        
                                    
                    foreach($rvp as $rvps)
                    {
                        if(in_array($rvps['ReportviewPermission']['report_type'],$arr_m_re)){
                        $in_c++;                        
                        if($in_c==1)
                        $in = $rvps['ReportviewPermission']['report_type'];
                        else
                        $in = $in.','.$rvps['ReportviewPermission']['report_type'];
                        }
                    }
                }
                }
                $this->loadModel('AdminDoc');
                $per = $this->AdminDoc->find('first');
                if($per['AdminDoc']['report']==0)
                {
                    $in = '999';
                }
                if($in)
                $arrs[] = array('document_type'=>'report','re_id IN ('.$in.')');
                else
                $arrs[] = array('document_type'=>'report');
            }
            $this->loadModel('EvidenceviewPermission');
            if($qs['Canview']['evidence'])
            {
                $in = '9999999';
                if(isset($arr_m_re))
                unset($arr_m_re);
                if(isset($rvp1))
                unset($rvp1);
                $evp = $this->EvidenceviewPermission->find('all',array('conditions'=>array('user_id'=>$this->Session->read('id'))));
                $rvp1 = $this->EvidenceuploadPermission->find('all',array('conditions'=>array('user_id'=>0)));
                if($rvp1){
                    foreach($rvp1 as $m_re)
                    {
                        $arr_m_re[] = $m_re['EvidenceuploadPermission']['report_type1']; 
                    }
                if($evp){
                    $in_c = 0;        
                                   
                    foreach($evp as $rvps)
                    {
                         if(in_array($rvps['EvidenceviewPermission']['report_type'],$arr_m_re)){
                        $in_c++;
                        if($in_c==1)
                        $in = $rvps['EvidenceviewPermission']['report_type'];
                        else
                        $in = $in.','.$rvps['EvidenceviewPermission']['report_type'];
                        }
                    }
                }
                }
                $this->loadModel('AdminDoc');
                $per = $this->AdminDoc->find('first');
                if($per['AdminDoc']['evidence']==0)
                {
                    $in = '999';
                }
                if($in)
                $arrs[] = array('document_type'=>'evidence','ev_id IN ('.$in.')');
                else
                $arrs[] = array('document_type'=>'evidence');
                
            }
            if($qs['Canview']['personal_inspection'])
            {
                $arrs[] = array('document_type'=>'personal_inspection');
            }
            if($qs['Canview']['mobile_inspection'])
            {
                $arrs[] = array('document_type'=>'mobile_inspection');
            }
            if($qs['Canview']['vehicle_inspection'])
            {
                $arrs[] = array('document_type'=>'vehicle_inspection');
            }
            if($qs['Canview']['mobile_log'])
            {
                $arrs[] = array('document_type'=>'mobile_log');
            }
            if($qs['Canview']['inventory'])
            {
                $arrs[] = array('document_type'=>'mobile_vehicle_trunk_inventory');
            }
            if($qs['Canview']['client_feedback'])
            {
                $arrs[] = array('document_type'=>'client_feedback');
            }
            if($qs['Canview']['templates'] || $type == 'templates' || $type=='template')
            {
                $arrs[] = array('document_type'=>'template');
            }
            $this->loadModel('SiteorderviewPermission');
            if($qs['Canview']['siteOrder'])
            {
                $in = '9999999';
                if(isset($arr_m_re))
                unset($arr_m_re);
                if(isset($rvp1))
                unset($rvp1); 
                $sovp = $this->SiteorderviewPermission->find('all',array('conditions'=>array('user_id'=>$this->Session->read('id'))));
                $rvp1 = $this->SiteorderuploadPermission->find('all',array('conditions'=>array('user_id'=>0)));
                if($rvp1){
                    foreach($rvp1 as $m_re)
                    {
                        $arr_m_re[] = $m_re['SiteorderuploadPermission']['report_type1']; 
                    }
                if($sovp){
                    $in_c = 0;        
                                   
                    foreach($sovp as $rvps)
                    {
                        if(in_array($rvps['SiteorderviewPermission']['report_type'],$arr_m_re)){
                        $in_c++;
                        if($in_c==1)
                        $in = $rvps['SiteorderviewPermission']['report_type'];
                        else
                        $in = $in.','.$rvps['SiteorderviewPermission']['report_type'];
                        }
                    }
                }
                }
                $this->loadModel('AdminDoc');
                $per = $this->AdminDoc->find('first');
                if($per['AdminDoc']['site_orders']==0)
                {
                    $in = '999';
                }
                if($in)
                $arrs[] = array('document_type'=>'siteOrder','so_id IN ('.$in.')');
                else
                $arrs[] = array('document_type'=>'siteOrder');
            }
            if($qs['Canview']['training'])
            {
                $arrs[] = array('document_type'=>'training');
            }
            $this->loadModel('EmployeeviewPermission');
            if($qs['Canview']['employee'])
            {
                $in = '9999999';
                
                
                
                
                
                
                $sovp = $this->SiteorderviewPermission->find('all',array('conditions'=>array('user_id'=>$this->Session->read('id'))));
                
                if($rvp1){
                    foreach($rvp1 as $m_re)
                    {
                        $arr_m_re[] = $m_re['SiteorderuploadPermission']['report_type1']; 
                    }
                if($sovp){
                    $in_c = 0;        
                                   
                    foreach($sovp as $rvps)
                    {
                        if(in_array($rvps['SiteorderviewPermission']['report_type'],$arr_m_re)){
                        $in_c++;
                        if($in_c==1)
                        $in = $rvps['SiteorderviewPermission']['report_type'];
                        else
                        $in = $in.','.$rvps['SiteorderviewPermission']['report_type'];
                        }
                    }
                }
                }
                
                
                
                
                if(isset($arr_m_re))
                unset($arr_m_re);
                if(isset($rvp1))
                unset($rvp1); 
                $emvp = $this->EmployeeviewPermission->find('all',array('conditions'=>array('user_id'=>$this->Session->read('id'))));
                $rvp1 = $this->EmployeeuploadPermission->find('all',array('conditions'=>array('user_id'=>0)));
                if($rvp1){
                    foreach($rvp1 as $m_re)
                    {
                        $arr_m_re[] = $m_re['EmployeeuploadPermission']['report_type1']; 
                    }
                if($emvp){
                    $in_c = 0;        
                                    
                    foreach($emvp as $rvps)
                    {
                        if(in_array($rvps['EmployeeviewPermission']['report_type'],$arr_m_re)){
                        $in_c++;
                        if($in_c==1)
                        $in = $rvps['EmployeeviewPermission']['report_type'];
                        else
                        $in = $in.','.$rvps['EmployeeviewPermission']['report_type'];
                        }
                    }
                }
                }
                $this->loadModel('AdminDoc');
                $per = $this->AdminDoc->find('first');
                if($per['AdminDoc']['employee']==0)
                {
                    $in = '999';
                }
                if($in)
                $arrs[] = array('document_type'=>'employee','emp_id IN ('.$in.')');
                else
                $arrs[] = array('document_type'=>'employee');
            }
            if($qs['Canview']['KPIAudits'])
            {
                $arrs[] = array('document_type'=>'KPIAudits');
            }
            if($qs['Canview']['afimac_intel'])
            {
                $arrs2[] = array('document_type'=>'AFIMAC Intel');
            }
            if($qs['Canview']['news_media'])
            {
                $arrs2[] = array('document_type'=>'News/Media');
            }
            }
            else
            {
                if($type == 'contracts' || $type == 'contract')
            {
                $arrs = array('document_type'=>'contract');
            }
            if($type == 'report')
            {
                $in = '9999999';
                if(isset($arr_m_re))
                unset($arr_m_re);
                if(isset($rvp1))
                unset($rvp1);
                $rvp = $this->ReportviewPermission->find('all',array('conditions'=>array('user_id'=>$this->Session->read('id'))));
                $rvp1 = $this->ReportuploadPermission->find('all',array('conditions'=>array('user_id'=>0)));
                if($rvp1){
                    foreach($rvp1 as $m_re)
                    {
                        $arr_m_re[] = $m_re['ReportuploadPermission']['report_type1']; 
                    }
                if($rvp){
                    $in_c = 0;        
                                    
                    foreach($rvp as $rvps)
                    {
                        if(in_array($rvps['ReportviewPermission']['report_type'],$arr_m_re)){
                        $in_c++;                        
                        if($in_c==1)
                        $in = $rvps['ReportviewPermission']['report_type'];
                        else
                        $in = $in.','.$rvps['ReportviewPermission']['report_type'];
                        }
                    }
                }
                }
                $this->loadModel('AdminDoc');
                $per = $this->AdminDoc->find('first');
                if($per['AdminDoc']['report']==0)
                {
                    $in = '999';
                }
                if($in)
                $arrs[] = array('document_type'=>'report','re_id IN ('.$in.')');
                else
                $arrs[] = array('document_type'=>'report');
            }
            if($type == 'evidence')
            {
                $in = '9999999';
                if(isset($arr_m_re))
                unset($arr_m_re);
                if(isset($rvp1))
                unset($rvp1);
                $evp = $this->EvidenceviewPermission->find('all',array('conditions'=>array('user_id'=>$this->Session->read('id'))));
                $rvp1 = $this->EvidenceuploadPermission->find('all',array('conditions'=>array('user_id'=>0)));
                if($rvp1){
                    foreach($rvp1 as $m_re)
                    {
                        $arr_m_re[] = $m_re['EvidenceuploadPermission']['report_type1']; 
                    }
                if($evp){
                    $in_c = 0;        
                                   
                    foreach($evp as $rvps)
                    {
                         if(in_array($rvps['EvidenceviewPermission']['report_type'],$arr_m_re)){
                        $in_c++;
                        if($in_c==1)
                        $in = $rvps['EvidenceviewPermission']['report_type'];
                        else
                        $in = $in.','.$rvps['EvidenceviewPermission']['report_type'];
                        }
                    }
                }
                }
                $this->loadModel('AdminDoc');
                $per = $this->AdminDoc->find('first');
                if($per['AdminDoc']['evidence']==0)
                {
                    $in = '999';
                }
                if($in)
                $arrs[] = array('document_type'=>'evidence','ev_id IN ('.$in.')');
                else
                $arrs[] = array('document_type'=>'evidence');
            }
            if($type == 'personal_inspection')
            {
                $arrs = array('document_type'=>'personal_inspection');
            }
            if($type == 'client_feedback')
            {
                $arrs = array('document_type'=>'client_feedback');
            }
            if( $type == 'templates' || $type=='template')
            {
                $arrs = array('document_type'=>'template');
            }
            if($type == 'siteOrder')
            {
                $in = '9999999';
                if(isset($arr_m_re))
                unset($arr_m_re);
                if(isset($rvp1))
                unset($rvp1); 
                $sovp = $this->SiteorderviewPermission->find('all',array('conditions'=>array('user_id'=>$this->Session->read('id'))));
                $rvp1 = $this->SiteorderuploadPermission->find('all',array('conditions'=>array('user_id'=>0)));
                if($rvp1){
                    foreach($rvp1 as $m_re)
                    {
                        $arr_m_re[] = $m_re['SiteorderuploadPermission']['report_type1']; 
                    }
                if($sovp){
                    $in_c = 0;        
                                   
                    foreach($sovp as $rvps)
                    {
                        if(in_array($rvps['SiteorderviewPermission']['report_type'],$arr_m_re)){
                        $in_c++;
                        if($in_c==1)
                        $in = $rvps['SiteorderviewPermission']['report_type'];
                        else
                        $in = $in.','.$rvps['SiteorderviewPermission']['report_type'];
                        }
                    }
                }
                }
                $this->loadModel('AdminDoc');
                $per = $this->AdminDoc->find('first');
                if($per['AdminDoc']['site_orders']==0)
                {
                    $in = '999';
                }
                if($in)
                $arrs[] = array('document_type'=>'siteOrder','so_id IN ('.$in.')');
                else
                $arrs[] = array('document_type'=>'siteOrder');
            }
            if($type == 'training')
            {
                $arrs = array('document_type'=>'training');
            }
            if($type == 'employee')
            {
                $in = '9999999';
                
                
                
                
                
                
                $sovp = $this->SiteorderviewPermission->find('all',array('conditions'=>array('user_id'=>$this->Session->read('id'))));
                
                if($rvp1){
                    foreach($rvp1 as $m_re)
                    {
                        $arr_m_re[] = $m_re['SiteorderuploadPermission']['report_type1']; 
                    }
                if($sovp){
                    $in_c = 0;        
                                   
                    foreach($sovp as $rvps)
                    {
                        if(in_array($rvps['SiteorderviewPermission']['report_type'],$arr_m_re)){
                        $in_c++;
                        if($in_c==1)
                        $in = $rvps['SiteorderviewPermission']['report_type'];
                        else
                        $in = $in.','.$rvps['SiteorderviewPermission']['report_type'];
                        }
                    }
                }
                }
                
                
                
                
                if(isset($arr_m_re))
                unset($arr_m_re);
                if(isset($rvp1))
                unset($rvp1); 
                $emvp = $this->EmployeeviewPermission->find('all',array('conditions'=>array('user_id'=>$this->Session->read('id'))));
                $rvp1 = $this->EmployeeuploadPermission->find('all',array('conditions'=>array('user_id'=>0)));
                if($rvp1){
                    foreach($rvp1 as $m_re)
                    {
                        $arr_m_re[] = $m_re['EmployeeuploadPermission']['report_type1']; 
                    }
                if($emvp){
                    $in_c = 0;        
                                    
                    foreach($emvp as $rvps)
                    {
                        if(in_array($rvps['EmployeeviewPermission']['report_type'],$arr_m_re)){
                        $in_c++;
                        if($in_c==1)
                        $in = $rvps['EmployeeviewPermission']['report_type'];
                        else
                        $in = $in.','.$rvps['EmployeeviewPermission']['report_type'];
                        }
                    }
                }
                }
                $this->loadModel('AdminDoc');
                $per = $this->AdminDoc->find('first');
                if($per['AdminDoc']['employee']==0)
                {
                    $in = '999';
                }
                if($in)
                $arrs[] = array('document_type'=>'employee','emp_id IN ('.$in.')');
                else
                $arrs[] = array('document_type'=>'employee');
            }
            if($type == 'KPIAudits')
            {
                $arrs = array('document_type'=>'KPIAudits');
            }
            if($type == 'AFIMAC Intel')
            {
                $arrs2 = array('document_type'=>'AFIMAC Intel');
            }
            if($type == 'News/Media')
            {
                $arrs2 = array('document_type'=>'News/Media');
            }
            if($type == 'mobile_inspection')
            {
                $arrs = array('document_type'=>'mobile_inspection');
            }
            if($type == 'mobile_log')
            {
                $arrs = array('document_type'=>'mobile_log');
            }
            if($type == 'vehicle_inspection')
            {
                $arrs = array('document_type'=>'vehicle_inspection');
            }
            if($type == 'mobile_vehicle_trunk_inventory')
            {
                $arrs = array('document_type'=>'mobile_vehicle_trunk_inventory');
            }
            if($type == 'deployment_rate')
            {
                $arrs = array('document_type'=>'deployment_rate');
            }
            }
            if(count($arrs)< 1 && count($arrs2)< 1)
            $this->set('noView',1);
            //$arrs[] = array('document_type <>'=>'client_feedback');
            
                        
            
                /*if($type!='')
                {
                    unset($arrs);
                    if($job_id==0)
                    $arrs2 = array('document_type'=>str_replace(array('contracts','templates'),array('contract','template'),$type));
                    else
                    $arrs2 = array('job_id'=>$job_id,'document_type'=>str_replace(array('contracts','templates'),array('contract','template'),$type));
                    
                }*/
            
            if(!$che['Member']['canView'])
            $this->set('noView',1);
            $this->loadModel('Jobmember');
            $job_ids = $this->Jobmember->find('first',array('conditions'=>array('member_id'=>$this->Session->read('id'))));
            if($job_ids)
                $jid =$job_ids['Jobmember']['job_id'];
            else
                $jid = '';
            if($jid)
                $jid = '('.$jid.')';
            else
                $jid = '('.'99999999999'.')';
                if($job_ids['Jobmember']['job_id'] && str_replace(',','',$job_ids['Jobmember']['job_id'] == $job_ids['Jobmember']['job_id']))
                {
                    $scheck = $this->Job->findById($job_ids['Jobmember']['job_id']);
                    if($scheck['Job']['is_special'] == 1)
                    {
                        $sid = $this->Job->findById($job_ids['Jobmember']['job_id']);
                        $this->set('sid',$sid['Job']['id']);
                    } 
                }
                
                if(!isset($sid) && $type != 'afimac_intel' && $type != 'news_media'){
            if($search!=''){            
            if(!$to && !$from){
                if($type)
                    {
                        
                    }
                    
                $this->paginate = array('conditions'=>array('OR'=>$arrs,'AND'=>array('draft'=>0,'approved IN('.$approve.')','document_type <>'=>'client_feedback','OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%'))),'job_id IN'.$jid),'order'=>$order,'limit'=>10);
                $this->set('count',$this->Document->find('count',array('conditions'=>array('OR'=>$arrs,'AND'=>array('approved IN('.$approve.')','draft'=>0,'document_type <>'=>'client_feedback','OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%'))),'job_id IN'.$jid))));
                
                
                }
            else
            if($to && $from){
                if($to!=$from){
                    $this->paginate = array('conditions'=>array('OR'=>$arrs,'AND'=>array('approved IN('.$approve.')','draft'=>0,'document_type <>'=>'client_feedback','OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'DATE(`date`) >='=>$from, 'DATE(`date`) <='=>$to,'job_id IN'.$jid)),'order'=>$order,'limit'=>10);
                    $this->set('count',$this->Document->find('count',array('conditions'=>array('OR'=>$arrs,'AND'=>array('approved IN('.$approve.')','document_type <>'=>'client_feedback','OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'DATE(`date`) >='=>$from, 'DATE(`date`) <='=>$to,'job_id IN'.$jid)))));
                }
                else{
                    $this->paginate = array('conditions'=>array('OR'=>$arrs,'AND'=>array('approved IN('.$approve.')','draft'=>0,'document_type <>'=>'client_feedback','OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'DATE(`date`)'=>$from,'job_id IN'.$jid)),'order'=>$order,'limit'=>10);
                    $this->set('count',$this->Document->find('count',array('conditions'=>array('OR'=>$arrs,'AND'=>array('approved IN('.$approve.')','draft'=>0,'document_type <>'=>'client_feedback','OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'DATE(`date`)'=>$from,'job_id IN'.$jid)))));
                }
                
                }
            

            }
            else{
                //echo 2;die();
                if(!$to && !$from){
                if($job_id == 0 )
                {
                    $this->paginate = array('conditions'=>array('OR'=>$arrs,'AND'=>array('approved IN('.$approve.')','draft'=>0,'document_type <>'=>'client_feedback','job_id IN'.$jid)),'order'=>$order,'limit'=>10);
                    $this->set('count',$this->Document->find('count',array('conditions'=>array('OR'=>$arrs,'AND'=>array('approved IN('.$approve.')','draft'=>0,'document_type <>'=>'client_feedback','job_id IN'.$jid)))));
                }
                else
                {
                    $this->paginate = array('conditions'=>array('OR'=>$arrs,'AND'=>array('approved IN('.$approve.')','draft'=>0,'document_type <>'=>'client_feedback','job_id'=>$job_id)),'order'=>$order,'limit'=>10);
                    $this->set('count',$this->Document->find('count',array('conditions'=>array('OR'=>$arrs,'AND'=>array('approved IN('.$approve.')','draft'=>0,'document_type <>'=>'client_feedback','job_id'=>$job_id )))));
                }
                }
                else
                {
                    if($to==$from)
                    {
                        $this->paginate = array('conditions'=>array('OR'=>$arrs,'AND'=>array('approved IN('.$approve.')','draft'=>0,'document_type <>'=>'client_feedback','job_id IN'.$jid,'DATE(`date`) LIKE "'.$from.'%"')),'order'=>$order,'limit'=>10);
                        $this->set('count',$this->Document->find('count',array('conditions'=>array('OR'=>$arrs,'AND'=>array('approved IN('.$approve.')','draft'=>0,'document_type <>'=>'client_feedback','job_id IN'.$jid,'DATE(`date`) LIKE "'.$from.'%"')))));
                    }
                    else{
                        $this->paginate = array('conditions'=>array('OR'=>$arrs,'AND'=>array('approved IN('.$approve.')','draft'=>0,'document_type <>'=>'client_feedback','job_id IN'.$jid,'DATE(`date`) >='=>$from,'DATE(`date`) <='=>$to)),'order'=>$order,'limit'=>10);
                        $this->set('count',$this->Document->find('count',array('conditions'=>array('OR'=>$arrs,'AND'=>array('approved IN('.$approve.')','draft'=>0,'document_type <>'=>'client_feedback','job_id IN'.$jid,'DATE(`date`) >='=>$from,'DATE(`date`) <='=>$to)))));
                        }
                }
            }
            $docs = $this->paginate('Document');

            }
            else
            {
                
                
                
                    if(isset($_GET['order']))
                    {
                        $order = $_GET['order']." ".$_GET['ty'];
                    }
                    else
                        $order = 'document_type,dop DESC';
                        
                    
                
                
                
                
                
                //die('here'.$type);
                if($search!='')
                {            
            if(!$to && !$from){
                if($type)
                    {
                        if($type == 'afimac_intel')
                        $type = 'AFIMAC Intel';
                        else
                        if($type == 'news_media')
                        $type = 'News/Media';
                        
                        $this->paginate = array('conditions'=>array('OR'=>$arrs2,'AND'=>array('OR'=>array(array('document_type'=>'%'.$type.'%'),array('`desc` LIKE'=>'%'.$search.'%')),'approved IN('.$approve.')','draft'=>0)),'order'=>$order,'limit'=>10);
                        $this->set('count',$this->SpecJob->find('count',array('conditions'=>array('OR'=>$arrs2,'AND'=>array('OR'=>array(array('document_type'=>'%'.$type.'%'),array('`desc` LIKE'=>'%'.$search.'%')),'approved IN('.$approve.')','draft'=>0)))));
                    }
                    else{
                    
                $this->paginate = array('conditions'=>array('OR'=>$arrs2,'AND'=>array('OR'=>array(array('document_type LIKE'=>'%'.$search.'%'),array('`desc` LIKE'=>'%'.$search.'%')),'approved IN('.$approve.')','draft'=>0)),'order'=>$order,'limit'=>10);
                $this->set('count',$this->SpecJob->find('count',array('conditions'=>array('OR'=>$arrs2,'AND'=>array('OR'=>array(array('document_type LIKE'=>'%'.$search.'%'),array('`desc` LIKE'=>'%'.$search.'%')),'approved IN('.$approve.')','draft'=>0)))));
                }
                
                }
            else{
            if($to && $from){
                
                if($to!=$from){
                $this->paginate = array('conditions'=>array('OR'=>$arrs,'AND'=>array('OR'=>array(array('document_type LIKE'=>'%'.$search.'%'),array('`desc` LIKE'=>'%'.$search.'%')),'DATE(`dop`) >='=>$from, 'DATE(`dop`) <='=>$to,'approved IN('.$approve.')','draft'=>0)),'order'=>$order,'limit'=>10);
                $this->set('count',$this->SpecJob->find('count',array('conditions'=>array('OR'=>$arrs,'AND'=>array('OR'=>array(array('document_type LIKE'=>'%'.$search.'%'),array('`desc` LIKE'=>'%'.$search.'%')),'DATE(`dop`) >='=>$from, 'DATE(`dop`) <='=>$to,'approved IN('.$approve.')','draft'=>0)))));
                }
                //$this->paginate = array('conditions'=>array('OR'=>$arrs,'AND'=>array('document_type <>'=>'client_feedback','OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'DATE(`date`) >='=>$from, 'DATE(`date`) <='=>$to,'job_id IN'.$jid)),'order'=>$order,'limit'=>10);
                else{
                //$this->paginate = array('conditions'=>array('OR'=>$arrs,'AND'=>array('document_type <>'=>'client_feedback','OR'=>array(array('title LIKE'=>'%'.$search.'%'),array('description LIKE'=>'%'.$search.'%')),'DATE(`date`)'=>$from,'job_id IN'.$jid)),'order'=>$order,'limit'=>10);
                $this->paginate = array('conditions'=>array('OR'=>$arrs,'AND'=>array('OR'=>array(array('document_type LIKE'=>'%'.$search.'%'),array('`desc` LIKE'=>'%'.$search.'%')),'DATE(`dop`)'=>$from,'approved IN('.$approve.')','draft'=>0)),'order'=>$order,'limit'=>10);
                $this->set('count',$this->SpecJob->find('count',array('conditions'=>array('OR'=>$arrs,'AND'=>array('OR'=>array(array('document_type LIKE'=>'%'.$search.'%'),array('`desc` LIKE'=>'%'.$search.'%')),'DATE(`dop`)'=>$from,'approved IN('.$approve.')','draft'=>0)))));
                }
                }
                }
            

            }
            else{
                //echo 2;die();
                if($type == 'afimac_intel')
                        $type = 'AFIMAC Intel';
                        else
                        if($type == 'news_media')
                        $type = 'News/Media';
                if(!$to && !$from){
                    if($type)
                    {
                        $this->paginate = array('conditions'=>array('OR'=>$arrs2,'document_type'=>$type,'approved IN('.$approve.')','draft'=>0),'order'=>$order,'limit'=>10);
                        $this->set('count',$this->SpecJob->find('count',array('conditions'=>array('OR'=>$arrs2,'document_type'=>$type,'approved IN('.$approve.')','draft'=>0))));    
                    }
                    else{
                $this->paginate = array('conditions'=>array('OR'=>$arrs2,'approved IN('.$approve.')','draft'=>0),'order'=>$order,'limit'=>10);
                $this->set('count',$this->SpecJob->find('count',array('conditions'=>array('OR'=>$arrs2,'approved IN('.$approve.')','draft'=>0))));
                }
                }
                else
                {
                    if($to==$from)
                    {
                        if($type)
                        {
                            $this->paginate = array('conditions'=>array('OR'=>$arrs2,'AND'=>array('document_type'=>$type,'approved IN('.$approve.')','draft'=>0,'DATE(`dop`) LIKE "'.$from.'%"')),'order'=>$order,'limit'=>10);
                            $this->set('count',$this->SpecJob->find('count',array('conditions'=>array('OR'=>$arrs2,'AND'=>array('document_type'=>$type,'approved IN('.$approve.')','draft'=>0,'DATE(`dop`) LIKE "'.$from.'%"')))));
                            
                        }
                        else{                        
                        $this->paginate = array('conditions'=>array('OR'=>$arrs2,'AND'=>array('approved IN('.$approve.')','draft'=>0,'DATE(`dop`) LIKE "'.$from.'%"')),'order'=>$order,'limit'=>10);
                        $this->set('count',$this->SpecJob->find('count',array('conditions'=>array('OR'=>$arrs2,'AND'=>array('approved IN('.$approve.')','draft'=>0,'DATE(`dop`) LIKE "'.$from.'%"')))));
                        }
                    }
                    else
                    if($type)
                    {
                       $this->paginate = array('conditions'=>array('OR'=>$arrs2,'AND'=>array('approved IN('.$approve.')','draft'=>0,'document_type'=>$type,'DATE(`dop`) >='=>$from,'DATE(`dop`) <='=>$to)),'order'=>$order,'limit'=>10);
                       $this->set('count',$this->SpecJob->find('count',array('conditions'=>array('OR'=>$arrs2,'AND'=>array('approved IN('.$approve.')','draft'=>0,'document_type'=>$type,'DATE(`dop`) >='=>$from,'DATE(`dop`) <='=>$to))))); 
                    }else{
                        $this->paginate = array('conditions'=>array('OR'=>$arrs2,'AND'=>array('approved IN('.$approve.')','draft'=>0,'DATE(`dop`) >='=>$from,'DATE(`dop`) <='=>$to)),'order'=>$order,'limit'=>10);
                        $this->set('count',$this->SpecJob->find('count',array('conditions'=>array('OR'=>$arrs2,'AND'=>array('approved IN('.$approve.')','draft'=>0,'DATE(`dop`) >='=>$from,'DATE(`dop`) <='=>$to)))));                        
                        }
                }
            }
            $docs = $this->paginate('SpecJob');
                
                
                
                
                
                
                
            }
            //$docs = $this->Document->find('all',array('conditions'=>array('addedBy'=>$this->Session->read('id'),'title LIKE'=>'%'.$search.'%'))); 
        }
        if(!$this->Session->read('admin'))
        {
            $idu = $this->Session->read('id');
            $ch = $this->Member->find('first',array('conditions',array('id'=>$idu)));
            if($ch['Member']['canView'] == 1)
            {
                $this->set('canView',1);
            }
        }
        $this->set('member',$this->Member);
        $this->set('jo_bs',$this->Job);
        
        $this->set('docs',$docs);
        $this->set('activity',$this->Activity);
        
    }
    
    function delete($id)
    {
        $this->loadModel('SpecJob');
        if($_SERVER['SERVER_NAME']=='localhost')
                {
                    $path = $_SERVER['DOCUMENT_ROOT'].'/veritas/app/webroot/img/documents/';
                }
                else
                    $path = $_SERVER['DOCUMENT_ROOT'].'/app/webroot/img/documents/';
        $doc = $this->SpecJob->findById($id);
        if($doc['SpecJob']['doc']!= "")
            unlink($path.$doc['SpecJob']['doc']);     
        $this->SpecJob->delete($id);
        $this->Session->setFlash('Document Succesfully Deleted.');
        $this->redirect('/dashboard');
        
        
    }
    function special($type = '',$job_id=0)
    {
        $t = $type;
        if($type == 'afimac_intel')
            $type1 = 'AFIMAC Intel';
        if($type == 'news_media')
            $type1 = 'News/Media';
        $this->loadModel('Member');    
        $u = $this->Member->find('all',array('conditions'=>array('id IN(SELECT member_id from jobmembers WHERE job_id IN(SELECT id FROM jobs WHERE is_special = 1))')));
        $this->set('u',$u);    
        $this->loadModel('SpecJob');
        if(isset($_GET['from'])&& isset($_GET['to']))
        {
            $from = $_GET['from'];
            $to = $_GET['to'];
            $this->paginate= array('conditions'=>array('document_type'=>$type1,'dop >='=>$from,'dop <='=>$to));
        }
        else
        {
            if(!isset($_GET['member']))
            $this->paginate= array('conditions'=>array('document_type'=>$type1));
            else
            $this->paginate= array('conditions'=>array('document_type'=>$type1,'addedBy'=>$_GET['member']));
        }$doc = $this->paginate('SpecJob');
        $this->set('doc',$doc);
        $this->set('type',$type);
        $this->set('t',$t);
            
            
    }
    function fill_report()
    {
        $this->loadModel('Document');
        $this->loadModel('Activity');
        $q = $this->Document->find('all',array('conditions'=>array('id IN(SELECT document_id FROM activities)')));
        foreach($q as $d)
        {
            $q1 = $this->Activity->find('first',array('conditions'=>array('document_id'=>$d['Document']['id'])));
            echo $q1['Activity']['report_type'];
            echo $d['Document']['id'];
            echo "<br>";
            $this->Document->id = $d['Document']['id'];
            $this->Document->saveField('re_id',$q1['Activity']['report_type']);
        }
        die();
    }
    function fill_evidence()
    {
        $this->loadModel('Document');        
        $q = $this->Document->find('all',array('conditions'=>array('evidence_type <>'=>'')));
        foreach($q as $d)
        {
            echo $d['Document']['id'];
            
            $arr = array('Incident Report','Line Crossing Sheet','Shift Summary','Incident Video','Executive Summary','Average Picket Count','Victim Statement','Miscellaneous');            
            $this->Document->id = $d['Document']['id'];
            $key = array_search($d['Document']['evidence_type'],$arr);
            $key = $key+1;
            echo $key;
            echo "<br/>";
            $this->Document->saveField('ev_id',$key);
        }
        die();
        

    }
    function fill_siteorder()
    {
        $this->loadModel('Document');        
        $q = $this->Document->find('all',array('conditions'=>array('site_type <>'=>'')));
        foreach($q as $d)
        {
            echo $d['Document']['id'];
            
            $arr = array('Post Orders','Operational Memos','Site Maps','Forms');            
            $this->Document->id = $d['Document']['id'];
            $key = array_search($d['Document']['site_type'],$arr);
            $key = $key+1;
            echo $key;
            echo "<br/>";
            $this->Document->saveField('so_id',$key);
        }
        die();
    }
    function fill_employee()
    {
        $this->loadModel('Document');        
        $q = $this->Document->find('all',array('conditions'=>array('employee_type <>'=>'')));
        foreach($q as $d)
        {
            echo $d['Document']['id'];
            
            $arr = array('Job Descriptions','Drug Free Policy','Schedules');            
            $this->Document->id = $d['Document']['id'];
            $key = array_search($d['Document']['employee_type'],$arr);
            $key = $key+1;
            echo $key;
            echo "<br/>";
            $this->Document->saveField('emp_id',$key);
        }
     die();
    }
    function set_default_permission()
    {
        $this->loadModel('Member');
        $q = $this->Member->find('all');
        foreach($q as $m)
        {
            $this->loadModel('ReportuploadPermission');
            for($i=1;$i<18;$i++)
            {
                $this->ReportuploadPermission->create();
                $arr['user_id'] = $m['Member']['id'];
                $arr['report_type1'] = $i;
                $this->ReportuploadPermission->save($arr);
            }
            $this->loadModel('ReportviewPermission');
            for($i=1;$i<18;$i++)
            {
                $this->ReportviewPermission->create();
                $arr['user_id'] = $m['Member']['id'];
                $arr['report_type'] = $i;
                $this->ReportviewPermission->save($arr);
            }
            
            $this->loadModel('EvidenceuploadPermission');
            for($i=1;$i<9;$i++)
            {
                $this->EvidenceuploadPermission->create();
                $arr['user_id'] = $m['Member']['id'];
                $arr['report_type1'] = $i;
                $this->EvidenceuploadPermission->save($arr);
            }
            $this->loadModel('EvidenceviewPermission');
            for($i=1;$i<9;$i++)
            {
                $this->EvidenceviewPermission->create();
                $arr['user_id'] = $m['Member']['id'];
                $arr['report_type'] = $i;
                $this->EvidenceviewPermission->save($arr);
            }
            
            $this->loadModel('SiteorderuploadPermission');
            for($i=1;$i<5;$i++)
            {
                $this->SiteorderuploadPermission->create();
                $arr['user_id'] = $m['Member']['id'];
                $arr['report_type1'] = $i;
                $this->SiteorderuploadPermission->save($arr);
            }
            $this->loadModel('SiteorderviewPermission');
            for($i=1;$i<5;$i++)
            {
                $this->SiteorderviewPermission->create();
                $arr['user_id'] = $m['Member']['id'];
                $arr['report_type'] = $i;
                $this->SiteorderviewPermission->save($arr);
            }
            $this->loadModel('EmployeeuploadPermission');
            for($i=1;$i<4;$i++)
            {
                $this->EmployeeuploadPermission->create();
                $arr['user_id'] = $m['Member']['id'];
                $arr['report_type1'] = $i;
                $this->EmployeeuploadPermission->save($arr);
            }
            $this->loadModel('EmployeeviewPermission');
            for($i=1;$i<4;$i++)
            {
                $this->EmployeeviewPermission->create();
                $arr['user_id'] = $m['Member']['id'];
                $arr['report_type'] = $i;
                $this->EmployeeviewPermission->save($arr);
            }
        }
        die();
    }
}
?>