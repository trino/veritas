<?php
    class AdminController extends AppController
    {
        public $helpers = array('Html');
        function __construct(CakeRequest $request, CakeResponse $response)
        {
         
            parent::__construct($request,$response);
            $this->layout = 'login';
               $this->loadModel('User');
        }
        
        public function index()
        {
            if($this->Session->read('admin'))
            {
                $this->redirect('/dashboard');
            }
            if(isset($_POST['submit']))
            {
                $co = $this->User->find('count',array('conditions'=>array('username'=>$_POST['username'],'password'=>$_POST['password'])));
                if($co>0)
                {
                    $this->Session->write('admin','admin');
                    $this->Session->write('email',$_POST['username']);
                    $this->redirect('/dashboard');   
                }
                else
                {
                    $this->set('msg','Username and Password donot match ');
                }
            }
        }
        public function logout()
        {
            $this->Session->delete('admin'); 
            $this->redirect('/admin');
        }
        
        
    
    }