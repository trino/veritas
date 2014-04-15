<?php
class ModulesController extends AppController
{
    public function beforeFilter()
    {
        parent::beforeFilter();
        if(!$this->Session->read('admin'))
        $this->redirect('/');
    }
    function view($slug)
    {
        $this->loadModel('Document');
        $doc = $this->Document->find('all',array('conditions'=>array('document_type'=>'personal_inspection')));
        $this->loadModel('Personal_inspection');
        
        if($doc)
        {
            $arr = array();
            foreach($doc as $d)
            {
                $cond = array('document_id'=>$d['Document']['id']);
                if(isset($_GET['from']))
                {
                    
                    array_push($cond,'DATE(`date_submit`) >= "'.$_GET['from'].'"');
                }    
                
                    
                if(isset($_GET['to']))
                {
                    array_push($cond, 'DATE(`date_submit`) <="'. $_GET['to'].'"');
                }    
                $pi = $this->Personal_inspection->find('first',array('conditions'=>$cond));
                if($pi)
                {
                    if(!in_array($pi['Personal_inspection']['emp_name1'],$arr))
                    $arr[] = $pi['Personal_inspection']['emp_name1'];
                }
            }
        }
        $count= 0;
        foreach($arr as $a)
        {
            $count++;
            $cond1 = array('emp_name1'=>$a,'document_id IN (SELECT id FROM documents)');
            if(isset($_GET['from']))
        {
            
            array_push($cond1,'DATE(`date_submit`) >= "'.$_GET['from'].'"');
        }    
        
            
        if(isset($_GET['to']))
        {
            array_push($cond1, 'DATE(`date_submit`) <="'. $_GET['to'].'"');
        }    
            $all[] = $this->Personal_inspection->find('all',array('conditions'=>array('emp_name1'=>$a,'document_id IN (SELECT id FROM documents)')));
        }
        if(isset($all))
        $this->set('modules',$all);
        $this->set('count',$count);
    }
    
    function personal_inspection($title)
    {
        $this->loadModel('PersonalInspection');
        $cond = array('emp_name1'=>$title);
        if(isset($_GET['from']))
        {
            
            array_push($cond,'DATE(`date_submit`) >= "'.$_GET['from'].'"');
        }    
        
            
        if(isset($_GET['to']))
        {
            array_push($cond, 'DATE(`date_submit`) <="'. $_GET['to'].'"');
        }    
        
        

        $this->set('count',$this->PersonalInspection->find('count',array('conditions'=>$cond)));
        $this->paginate = array('conditions'=>$cond,'order'=>'date_submit','limit'=>10);
        $docs = $this->paginate('PersonalInspection');
        $this->set('docs',$docs);
        $this->set('title',$title);
        //var_dump($docs);
        $this->render('search');
        
        
    }
}