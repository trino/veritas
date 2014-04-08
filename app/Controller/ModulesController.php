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
                $pi = $this->Personal_inspection->find('first',array('conditions'=>array('document_id'=>$d['Document']['id'])));
                if($pi)
                {
                    if(!in_array($pi['Personal_inspection']['emp_name1'],$arr))
                    $arr[] = $pi['Personal_inspection']['emp_name1'];
                }
            }
        }
        foreach($arr as $a)
        {
            $all[] = $this->Personal_inspection->find('all',array('conditions'=>array('emp_name1'=>$a,'document_id IN (SELECT id FROM documents)')));
        }
        
        $this->set('modules',$all);
    }
}