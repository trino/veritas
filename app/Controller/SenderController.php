<?php
class SenderController extends AppController{
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
    function sendUniformEmail($id)
    {
        //die('here');
        App::uses('CakeEmail', 'Network/Email');
        $emails = new CakeEmail();
        $emails->from(array('noreply@veritas.com'=>'Veritas'));
        $whole =  Router::url(null,true);
        $base_url_arr = explode('/sender',$whole);
        $base_url = $base_url_arr['0'];
        $emails->subject("A new uniform issue has been uploaded.");
        $emails->emailFormat('html');
        //echo file_get_contents($base_url.'/sender/uniformEmail/'.$id);die();
        //echo $base_url.'/sender/uniformEmail/'.$id;die();
        $message=file_get_contents($base_url.'/sender/uniformEmail/'.$id);
        $to = array('justdoit2045@gmail.com','admin@web-nepal.com');                
        $emails->to($to);
        $emails->send($message);
        return true;
    }
    function uniformEmail($id,$spec='')
    {
        $this->layout = 'modal_layout';
        
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
        $whole =  Router::url(null,true);
        $base_url_arr = explode('/sender',$whole);
        $base_url = $base_url_arr['0'];
        $this->set('base_url',$base_url);
        $this->set('base_urls',$base_url);
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
            
            
            if($this->Document->find('first',array('conditions'=>array('id'=>$id))))
            {
                
                $doc = $this->Document->find('first',array('conditions'=>array('id'=>$id)));
                $job_id = $doc['Document']['job_id'];
                if($doc['Document']['document_type']== 'report')
                {
                    
                    $eid = $id;
                    $act = $this->Activity->find('all',array('conditions'=>array('document_id'=>$id)));
                    $this->set('activity', $act);
                    //var_dump($act);
                    $this->loadModel('StoreInfo');
                     
                    if($act[0]['Activity']['report_type']=='20')
                    {
                        
                        $this->loadModel('UniformIssue');
                        $this->set('uniform',$this->UniformIssue->findByDocId($id));
                    } 
                     
                }
                
                
                
              
                
                
                
                $this->set('doc', $doc);
                $this->set('do',$this->Doc->find('all',array('conditions'=>array('document_id'=>$id))));
                $this->set('image',$this->Image->find('all',array('conditions'=>array('document_id'=>$id))));
                $this->set('vid',$this->Video->find('all',array('conditions'=>array('document_id'=>$id))));
                $this->set('you',$this->Youtube->find('all',array('conditions'=>array('document_id'=>$id))));
                
            }
            
        }
        $this->render('/sender/view_detail');
        
    }
}