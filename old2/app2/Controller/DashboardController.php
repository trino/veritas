<?php
 class DashboardController extends AppController
 {
     public $helpers = array('Html');
        function __construct(CakeRequest $request, CakeResponse $response)
        {
         
            parent::__construct($request,$response);
            $this->layout = 'admin';
               $this->loadModel('User');
               $this->loadModel('Page');
               $this->loadModel('Category');
               $this->loadModel('Register');
               $this->loadModel('Ad');
               $this->loadModel('Contact');
               $this->loadModel('Province');
               $this->loadModel('Setting');
               $this->loadModel('Image');
        }
        public function index()
        {
            if(!$this->Session->read('admin'))
                $this->redirect('/admin');
        }
        
        public function settings()
        {
            if(!$this->Session->read('admin'))
                $this->redirect('/admin');
            if(isset($_POST['submit']))
            {
                $arr['username'] = $_POST['username'];
                $arr['password'] = $_POST['password'];
                $this->User->id= '1';
                $this->User->saveField('username',$_POST['username']);
                $this->User->saveField('password',$_POST['password']);
                $this->redirect('/dashboard');
                
            }
            $this->set('value',$this->User->find('first'));
        }
        
        public function pages()
        {
            if(!$this->Session->read('admin'))
                $this->redirect('/admin');
                $this->set('page',$this->Page->find('all'));
          
        }
        
        function slug($str)
	{
		//Unwanted: {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
		$string = strtolower($str);
		//Strip any unwanted characters
		$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
		//Clean multiple dashes or whitespaces
		$string = preg_replace("/[\s-]+/", " ", $string);
		//Convert whitespaces and underscore to dash
		$string = preg_replace("/[\s_]/", "-", $string);
		return $string; 
	}

        
        public function add_page()
        {
            if(!$this->Session->read('admin'))
                $this->redirect('/admin');
            
            if(isset($_POST['submit']))
            {
                $arr['title'] = $_POST['title'];
                $slug = $this->slug($arr['title']);
                $c=$this->Page->find('count',array('conditions'=>array('slug'=>$slug))); 
                $arr['description'] = $_POST['description'];
                $arr['meta_title'] = $_POST['seo_title'];
                $arr['meta_keyword'] = $_POST['meta_keyword'];
                $arr['meta_description'] = $_POST['meta_description'];
                $arr['slug'] = $slug;
                $this->Page->create();
                $this->Page->save($arr);
                 $id=$this->Page->id;
                 if($c>0)
                 {
                 	$this->Page->id=$id;
                 	$slug=$slug."-".$id;
                 	$this->Page->saveField('slug',$slug);
                 }
                $this->redirect('pages');
            }
        }
        
        public function edit_page($id)
        {
            if(!$this->Session->read('admin'))
                $this->redirect('/admin');
            if(isset($_POST['submit']))
            {
                $this->Page->id=$id;
                $this->Page->saveField('title',$_POST['title']);
                $this->Page->saveField('description',$_POST['description']);
                $this->Page->saveField('meta_title',$_POST['seo_title']);
                $this->Page->saveField('meta_keyword',$_POST['meta_keyword']);
                $this->Page->saveField('meta_description',$_POST['meta_description']);
                $this->redirect('pages');
            }
            $this->set('p',$this->Page->find('first',array('conditions'=>array('id'=>$id))));
        }
        
        public function delete_page($id)
        {
            if(!$this->Session->read('admin'))
                $this->redirect('/admin');
        $this->Page->delete($id);
        $this->redirect('pages');
        }
        
        public function category()
        {
            if(!$this->Session->read('admin'))
            $this->redirect('/admin');
            $this->set('main',$this->Category->find('all',array('conditions'=>array('parent_id'=>'0'),'order'=>array('id'=>'Desc'))));
            $this->set('sub',$this->Category->find('all',array('conditions'=>array('parent_id !='=>'0'),'order'=>array('id'=>'Desc'))));
        }
        
        public function add_category()
        {
            if(!$this->Session->read('admin'))
            $this->redirect('/admin');
            if(isset($_POST['submit']))
            {
                $arr['name'] = $_POST['name'];
                $arr['description'] =$_POST['description'];
                $arr['parent_id'] = $_POST['parent'];
                $this->Category->create();
                $this->Category->save($arr);
                $this->redirect('category');
                
            }
        $this->set('category',$this->Category->find('all',array('conditions'=>array('parent_id'=>'0'))));
        }
        public function edit_category($id)
        {
            if(!$this->Session->read('admin'))
            $this->redirect('/admin');
            $this->set('cat',$this->Category->find('first',array('conditions'=>array('id'=>$id))));
            $this->set('category',$this->Category->find('all',array('conditions'=>array('parent_id'=>'0'))));
            if(isset($_POST['submit']))
            {
                $this->Category->id =$id;
                $this->Category->saveField('name',$_POST['name']);
                $this->Category->saveField('description',$_POST['description']);
                $this->Category->saveField('parent_id',$_POST['parent']);
                $this->redirect('category');
            }
            
        }
        public function delete_category($id)
        {
             if(!$this->Session->read('admin'))
            $this->redirect('/admin');
            $data =  $this->Category->find('first',array('conditions'=>array('id'=>$id)));
             if($data['Category']['parent_id']=="0")
             {
                $this->Category->deleteAll(array('parent_id'=>$id));
                $this->Ad->deleteAll(array('category_id'=>$id));   
             }
             else
             {
                $this->Ad->deleteAll(array('subcategory_id'=>$id));
             }
             
             $this->Category->delete($id);
        $this->redirect('category');
        }
        
        public function business()
        {
            if(!$this->Session->read('admin'))
            $this->redirect('/admin');
            $this->set('biz',$this->Register->find('all',array('conditions'=>array('type'=>'1'),'order'=>array('id'=>'Desc'))));
        }
        public function edit_company($id)
        {
           if(!$this->Session->read('admin'))
            $this->redirect('/admin');
                $this->set('register',$this->Register->find('first',array('conditions'=>array('id'=>$id))));
        	   $this->set('category',$this->Category->find('all',array('conditions'=>array('parent_id'=>'0'))));
            	$this->set('province',$this->Province->find('all',array('conditions'=>array('PARENT_ID'=>'0'))));
            	$this->set('sub_category',$this->Category->find('all',array('conditions'=>array('parent_id !='=>'0'))));
            	$this->set('city',$this->Province->find('all',array('conditions'=>array('PARENT_ID !='=>'0'))));
            if(isset($_POST['submit']))
            {
                $this->Register->id=$id;
                $this->Register->saveField('full_name',$_POST['full_name']);
        		$this->Register->saveField('company',$_POST['company']);
                $this->Register->saveField('category',$_POST['category']);
        	        $this->Register->saveField('description', $_POST['description']);
        	        $this->Register->saveField('operation_start',$_POST['operation_from']);
                	$this->Register->saveField('operation_end',$_POST['operation_to']);
	                $this->Register->saveField('partners',$_POST['partners']);
        	        $this->Register->saveField('no_of_employee',$_POST['no_of_employee']);
        	        $this->Register->saveField('no_of_year',$_POST['no_of_year']);
                    $this->Register->saveField('address',$_POST['address']);
	                $this->Register->saveField('city',$_POST['city']);
        	        $this->Register->saveField('state',$_POST['state']);
                	$this->Register->saveField('phone',$_POST['phone']);
	                $this->Register->saveField('cell',$_POST['cell']);
        	        $this->Register->saveField('fax',$_POST['fax']);
                	$this->Register->saveField('website',$_POST['website']);
                	$this->Register->saveField('facebook',$_POST['facebook']);
	                $this->Register->saveField('twitter',$_POST['twitter']);
                    $this->Register->saveField('isApproved',$_POST['approve']);
                $this->Session->setFlash('Data Saved Successfully');
                $this->redirect('business');
            }
        }
        
        public function view_company($id)
        {
            if(!$this->Session->read('admin'))
                $this->redirect('/admin');
                $this->set('category',$this->Category->find('all',array('conditions'=>array('parent_id'=>'0'))));
            	$this->set('province',$this->Province->find('all',array('conditions'=>array('PARENT_ID'=>'0'))));
            	$this->set('sub_category',$this->Category->find('all',array('conditions'=>array('parent_id !='=>'0'))));
            	$this->set('city',$this->Province->find('all',array('conditions'=>array('PARENT_ID !='=>'0'))));
             $this->set('b',$this->Register->find('first',array('conditions'=>array('id'=>$id))));
        }
        
        public function remove_company($id)
        {
            $this->Register->delete($id);
            $this->Ad->deleteAll(array('addedBy'=>$id));
            $this->Session->setFlash('Data Deleted Successfully');
            $this->redirect('business');
        }
        
        public function seekers()
        {
            if(!$this->Session->read('admin'))
                $this->redirect('/admin');
            $this->set('seek',$this->Register->find('all',array('conditions'=>array('type'=>'0'),'order'=>array('id'=>'Desc'))));
        }
        
         public function edit_seeker($id)
        {
           if(!$this->Session->read('admin'))
            $this->redirect('/admin');
            $this->set('register',$this->Register->find('first',array('conditions'=>array('id'=>$id))));
        	   $this->set('category',$this->Category->find('all',array('conditions'=>array('parent_id'=>'0'))));
            	$this->set('province',$this->Province->find('all',array('conditions'=>array('PARENT_ID'=>'0'))));
            	$this->set('sub_category',$this->Category->find('all',array('conditions'=>array('parent_id !='=>'0'))));
            	$this->set('city',$this->Province->find('all',array('conditions'=>array('PARENT_ID !='=>'0'))));
            if(isset($_POST['submit']))
            {
                $this->Register->id=$id;
                $this->Register->saveField('full_name',$_POST['full_name']);
        		$this->Register->saveField('company',$_POST['company']);
                $this->Register->saveField('address',$_POST['address']);
	                $this->Register->saveField('city',$_POST['city']);
        	        $this->Register->saveField('state',$_POST['state']);
                	$this->Register->saveField('phone',$_POST['phone']);
	                $this->Register->saveField('cell',$_POST['cell']);
        	        $this->Register->saveField('fax',$_POST['fax']);
                	$this->Register->saveField('website',$_POST['website']);
                	$this->Register->saveField('facebook',$_POST['facebook']);
	                $this->Register->saveField('twitter',$_POST['twitter']);
                    $this->Register->saveField('isApproved',$_POST['approve']);
                $this->Session->setFlash('Data Saved Successfully');
                $this->redirect('seekers');
            }
        }
        
        public function view_seeker($id)
        {
            if(!$this->Session->read('admin'))
                $this->redirect('/admin');
                $this->set('province',$this->Province->find('all',array('conditions'=>array('PARENT_ID'=>'0'))));
            	$this->set('sub_category',$this->Category->find('all',array('conditions'=>array('parent_id !='=>'0'))));
            	$this->set('city',$this->Province->find('all',array('conditions'=>array('PARENT_ID !='=>'0'))));
             $this->set('b',$this->Register->find('first',array('conditions'=>array('id'=>$id))));
        }
        
        public function remove_seeker($id)
        {
            $this->Register->delete($id);
             $this->Ad->deleteAll(array('addedBy'=>$id));
            $this->Session->setFlash('Data Deleted Successfully');
            $this->redirect('seekers');
        }
        
        
        public function ads()
        {
            if(!$this->Session->read('admin'))
                $this->redirect('/admin');
                $b_id="";
                $s_id="";
              $data= $this->Register->find('all',array('conditions'=>array('isApproved'=>'1')));
              foreach($data as $d)
              {
              	if($d['Register']['type']=='1')
              	{
              		$b_id .= $d['Register']['id'].','; 
              	}
              	else
              	{
              		$s_id .= $d['Register']['id'].',';
              	}
              	
              }
             $b_id =rtrim($b_id,',');
              $s_id =rtrim($s_id,',');
              
            $this->set('ads',$this->Ad->find('all',array('conditions'=>array('spam'=>'0','addedBy IN ('.$b_id.')'),'order'=>array('id'=>'Desc'))));
            $this->set('w_ads',$this->Ad->find('all',array('conditions'=>array('spam'=>'0','addedBy IN ('.$s_id.')'),'order'=>array('id'=>'Desc'))));
        }
        
        public function edit_ad($id)
        {
            if(!$this->Session->read('admin'))
                $this->redirect('/admin');
            $data= $this->Ad->find('first',array('conditions'=>array('id'=>$id)));
            $this->set('s',$data);
            $this->set('user',$this->Contact->find('first',array('conditions'=>array('ad_id'=>$id))));
            $this->set('s',$this->Ad->find('first',array('conditions'=>array('id'=>$id))));
            $this->set('province',$this->Province->find('all',array('conditions'=>array('PARENT_ID'=>'0'))));
           $this->set('city',$this->Province->find('all',array('conditions'=>array('PARENT_ID !='=>'0'))));
           $this->set('category',$this->Category->find('all',array('conditions'=>array('parent_id'=>'0'))));
           $this->set('sub_category',$this->Category->find('all',array('conditions'=>array('parent_id !='=>'0'))));
            if($data['Ad']['membership']=='1')
            {
                $this->set('type','business');
            }
            else
            {
                $this->set('type','seeker');
            }
            if(isset($_POST['submit']))
            {
                $this->Ad->id = $id;
                $this->Ad->saveField('title',$_POST['title']);
                $this->Ad->saveField('description',$_POST['description']);
                $this->Ad->saveField('state',$_POST['state']);
                $this->Ad->saveField('category_id',$_POST['category']);
                $this->Ad->saveField('subcategory_id',$_POST['sub_category']);
                $this->Ad->saveField('city',$_POST['city']);
                $this->Ad->saveField('start_date',$_POST['start_date']);
                $this->Ad->saveField('end_date',$_POST['end_date']);
                $this->Ad->saveField('isApproved',$_POST['approve']);
                if($_POST['type']=="business")
                {
                $this->Ad->saveField('nearest_intersection',$_POST['nearest_intersection']);
                $this->Ad->saveField('mop', $_POST['mop']);
                $this->Ad->saveField('references',$_POST['references']);
                $this->Ad->saveField('return_policy',$_POST['return_policy']);
                $this->Ad->saveField('waranty_gurantee',$_POST['waranty_gurantee']);
                $this->Ad->saveField('insurance',$_POST['insurance']);
                $this->Ad->saveField('licenses',$_POST['license']);
                $this->Ad->saveField('qualification', $_POST['qualification']);
                }
                else if($_POST['type']=="seeker")
                {
                    $this->Ad->saveField('budget', $_POST['budget']);
                }
                if($_POST['type']=="seeker")
                {
                    $this->Contact->ad_id = $id;
                    $this->Contact->saveField('name',$_POST['name']);
                    $this->Contact->saveField('email', $_POST['email']);
                    $this->Contact->saveField('phone', $_POST['phone']);
                    $this->Contact->saveField('mobile', $_POST['mobile']);
                    $this->Contact->saveField('fax', $_POST['fax']);
                    $this->Contact->saveField('facebook', $_POST['facebook']);
                    $this->Contact->saveField('twitter', $_POST['twitter']);
                    
                    $this->Contact->save($c);
                }
                $this->Session->setFlash('Data Saved Successfully');
                $this->redirect('ads');
            }
        }
        
        public function delete_ad($id)
        {
         $this->Ad->delete($id); 
         $this->redirect('ads');
        }
        
        public function view_ad($id)
        {
            $data=$this->Ad->find('first',array('conditions'=>array('id'=>$id)));
            $cat=$this->Category->find('first',array('conditions'=>array('id'=>$data['Ad']['category_id'])));
            $scat=$this->Category->find('first',array('conditions'=>array('id'=>$data['Ad']['subcategory_id'])));
            $pro=$this->Province->find('first',array('conditions'=>array('ID'=>$data['Ad']['state'])));
            $city=$this->Province->find('first',array('conditions'=>array('ID'=>$data['Ad']['city'])));
            $this->set('user',$this->Register->find('first',array('conditions'=>array('id'=>$data['Ad']['addedBy']))));
            $this->set('ad',$data);
            $this->set('cat',$cat['Category']['name']);
            $this->set('sub_cat',$scat['Category']['name']);
            $this->set('p',$pro['Province']['TITLE']);
            $this->set('c',$city['Province']['TITLE']); 
            $this->set('image',$this->Image->find('all',array('conditions'=>array('ad_id'=>$id))));
        }
        
         public function view_want_ads($id)
        {
            $data=$this->Ad->find('first',array('conditions'=>array('id'=>$id)));
            $cat=$this->Category->find('first',array('conditions'=>array('id'=>$data['Ad']['category_id'])));
            $scat=$this->Category->find('first',array('conditions'=>array('id'=>$data['Ad']['subcategory_id'])));
            $pro=$this->Province->find('first',array('conditions'=>array('ID'=>$data['Ad']['state'])));
            $city=$this->Province->find('first',array('conditions'=>array('ID'=>$data['Ad']['city'])));
            $this->set('user',$this->Register->find('first',array('conditions'=>array('id'=>$data['Ad']['addedBy']))));
            $this->set('ad',$data);
            $this->set('cat',$cat['Category']['name']);
            $this->set('sub_cat',$scat['Category']['name']);
            $this->set('p',$pro['Province']['TITLE']);
            $this->set('c',$city['Province']['TITLE']); 
            $this->set('image',$this->Image->find('all',array('conditions'=>array('ad_id'=>$id))));
            $this->set('contact',$this->Contact->find('first',array('conditions'=>array('ad_id'=>$id))));  
         }
        public function check_email()
        {
            $em=$_POST['em'];
            $d=$this->Register->find('count',array('conditions'=>array('email'=>$em)));
            if($d>0)
                echo "0";
            else
                echo "1";
            die();
        }
        
        public function spam()
        {
            $this->set('ads',$this->Ad->find('all',array('conditions'=>array('spam >'=>'0'),'order'=>array('id'=>'Desc'))));
            $this->set('user',$this->Register->find('all'));
        }
        
        public function general_settings()
        {
            $this->set('s',$this->Setting->find('first'));
            if(isset($_POST['submit']))
            {
                $this->Setting->id = '1';
                $this->Setting->saveField('free_ad',$_POST['free_ad']);
                $this->Setting->saveField('paid_ad',$_POST['paid_ad']);
                $this->Setting->saveField('auto_registration',$_POST['auto_registration']);
                $this->Setting->saveField('auto_ads',$_POST['auto_ads']);
                $this->Session->setFlash('Data Saved Successfully');
                $this->redirect('index');
            }
        
        }
        public function mark_as_no_spam($id)
        {
        	$this->Ad->id = $id;
        	$this->Ad->saveField('spam','0');
        	$this->redirect('spam');
        }
 }