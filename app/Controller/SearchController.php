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
        if(!$this->Session->read('email'))
        $this->redirect('/dashboard');
        $search = $_GET['search'];
        if($this->Session->read('avatar'))
        {
            $docs = $this->Document->find('all',array('conditions'=>array('title LIKE'=>'%'.$search.'%')));
        }
        else
        {
            $docs = $this->Document->find('all',array('conditions'=>array('addedBy'=>$this->Session->read('id'),'title LIKE'=>'%'.$search.'%'))); 
        }
        $this->set('member',$this->Member);
        $this->set('docs',$docs);
        
    }
}
?>