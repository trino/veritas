<?php
App::uses('AppController', 'Controller');
class SearchController extends AppController
{
    public $name = 'Search';
    public function index()
    {
        //die('here');
        $this->loadModel('Document');
        $this->loadModel('Member');
        $this->loadModel('Job');
        if(!$this->Session->read('email'))
            $this->redirect('/dashboard');
        
        if(isset($_GET['search']))
        {
            $search = $_GET['search'];
            $this->set('search',$_GET['search']);
        }
        else
            $search = '';         
        if($this->Session->read('avatar'))
        {
            $this->paginate = array('conditions'=>array('title LIKE'=>'%'.$search.'%'),'order'=>array('job_id'),'limit'=>5);
            $docs = $this->paginate('Document');
            //$docs = $this->Document->find('all',array('conditions'=>array('title LIKE'=>'%'.$search.'%')));
        }
        else
        {
            $this->paginate = array('conditions'=>array('addedBy'=>$this->Session->read('id'),'title LIKE'=>'%'.$search.'%'),'order'=>array('job_id'),'limit'=>10);
            $docs = $this->paginate('Document');
            //$docs = $this->Document->find('all',array('conditions'=>array('addedBy'=>$this->Session->read('id'),'title LIKE'=>'%'.$search.'%'))); 
        }
        $this->set('member',$this->Member);
        $this->set('jo_bs',$this->Job);
        $this->set('docs',$docs);
        
    }
}
?>