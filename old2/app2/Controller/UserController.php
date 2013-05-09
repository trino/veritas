<?php 
    class UserController extends AppController
    {
         public $helpers = array('Html');
         var $components = array('Email');
        function __construct(CakeRequest $request, CakeResponse $response)
        {
         parent::__construct($request,$response);
         $this->loadModel('Page');
         $this->loadModel('Register');
         $this->loadModel('Ad');
         $this->loadModel('Province');
         $this->loadModel('Category');
         $this->loadModel('Image');
         $this->loadModel('Contact');
         $this->loadModel('Setting');
         $this->loadModel('User');
        }
        
        public function index()
        {
            if(!$this->Session->read('user'))
                $this->redirect('/');
        }
        public function login($msg=NULL)
        {
           
            if($msg=="error")
            {
                $this->set('msg','Login Failed.');
            }
            if(isset($_POST['submit']))
            {
                $un=$_POST['username'];
                $pw=$_POST['password'];
                $q=$this->Register->find('first',array('conditions'=>array('email'=>$un,'password'=>$pw,'isApproved'=>'1')));
                if($q)
                {
                    $this->Session->delete('error');
                    $this->Session->write(array('user'=>$un,'id'=>$q['Register']['id'],'type'=>$q['Register']['type']));
                    if($q['Register']['type']=='1')
                    {
                        $this->Session->write(array('type'=>'business'));
                        $this->redirect('/user');    
                    }
                    else
                    {
                        $this->Session->write(array('type'=>'seeker'));
                        $this->redirect('/user');
                    }
                    $this->redirect('/user/index');
                }
                else
                {
                    $this->set('msg','Username and Password do not match.');
                }
            }
        }
        
        public function settings()
        {
            
        }
        
        public function account_settings()
        {
        	if(!$this->Session->read('user'))
                $this->redirect('/');
            if(isset($_POST['submit']))
            {
                $this->Register->id=$this->Session->read('id');
                $this->Register->saveField('email',$_POST['email']);
                $this->Register->saveField('password',$_POST['password']);
                $this->Session->write(array('user'=>$_POST['email']));
                $this->redirect('index');
            }
        }
        
        public function general_settings()
        {
        	$this->set('register',$this->Register->find('first',array('conditions'=>array('id'=>$this->Session->read('id')))));
        	$this->set('category',$this->Category->find('all',array('conditions'=>array('parent_id'=>'0'))));
            	$this->set('province',$this->Province->find('all',array('conditions'=>array('PARENT_ID'=>'0'))));
            	$this->set('sub_category',$this->Category->find('all',array('conditions'=>array('parent_id !='=>'0'))));
            	$this->set('city',$this->Province->find('all',array('conditions'=>array('PARENT_ID !='=>'0'))));
        	if(isset($_POST['submit']))
        	{
        		$this->Register->id=$this->Session->read('id');
        		$this->Register->saveField('full_name',$_POST['full_name']);
        		$this->Register->saveField('company',$_POST['company']);
        		if($this->Session->read('type')=="business") 
        		{
        		$logo=$_FILES['logo']['name'];
        		if($logo=="")
        		{
        		$image = $_POST['old_logo'];
        		}
        		else
        		{
        		   $uri = $_SERVER['REQUEST_URI'];
                $uri = str_replace('/',' ',$uri);
                $uri = str_replace(' ','/',trim($uri));
                if($uri!='home'){
                $arr_uri = explode('/',$uri);
                $path = $_SERVER['DOCUMENT_ROOT'].'/ads/app/webroot/img/logo/';
                }
                else
                $path = $_SERVER['DOCUMENT_ROOT'].'/ads/app/webroot/img/logo/';
                $source = $_FILES['logo']['tmp_name'];
                    $destination = $path.$_FILES['logo']['name'];
                    move_uploaded_file($source,$destination);
                    $max_width = 60;
                    $max_height = 60;
                    list($w, $h,$ext) = getimagesize($destination);
                    //echo get_image_extension($destination);
                  	$e = $this->get_extension($ext);
                    if($w > $h)
                    {
                        $width = $max_width;
                        $ratio = $max_width/$w;
                        $height = $ratio * $h;
                    
                    }
                    else
                    {
                        $height = $max_height;
                        $ratio = $max_height/$h;
                        $width = $ratio * $w;
                    }
                	$virtual_image = imagecreatetruecolor($width, $height);
                	switch ($e)
                	{
                		case 'gif':
                		 $image = imagecreatefromgif($destination);
                		 break;
                		 case 'jpeg':
                		 	$image = imagecreatefromjpeg($destination);
                		 	break;
                		 case 'png' :
                		 	$image = imagecreatefrompng($destination);
                		 	break;
                		  
                	}
                	
                    
                	imagecopyresampled($virtual_image, $image, 0, 0, 0, 0, $width, $height, $w, $h);
                	switch($e)
                	{
                		case 'gif':
                		 imagegif($virtual_image, $destination);
                		 break;
                		 case 'jpeg':
                		 	imagejpeg($virtual_image, $destination);
                		 	break;
                		 case 'png' :
                		 	imagepng($virtual_image, $destination);
                		 	break;
                	}
                	
                    $image = $_FILES['logo']['name'];
        		}
	                $this->Register->saveField('category',$_POST['category']);
        	        $this->Register->saveField('description', $_POST['description']);
        	        $this->Register->saveField('operation_start',$_POST['operation_from']);
                	$this->Register->saveField('operation_end',$_POST['operation_to']);
	                $this->Register->saveField('partners',$_POST['partners']);
        	        $this->Register->saveField('no_of_employee',$_POST['no_of_employee']);
        	        $this->Register->saveField('no_of_year',$_POST['no_of_year']);
                    $this->Register->saveField('logo',$image);
        	        }
                	$this->Register->saveField('address',$_POST['address']);
	                $this->Register->saveField('city',$_POST['city']);
        	        $this->Register->saveField('state',$_POST['state']);
                	$this->Register->saveField('phone',$_POST['phone']);
	                $this->Register->saveField('cell',$_POST['cell']);
        	        $this->Register->saveField('fax',$_POST['fax']);
                	$this->Register->saveField('website',$_POST['website']);
	                //$arr['deals_on'] = $_POST['deals_on'];
        	        
                	$this->Register->saveField('facebook',$_POST['facebook']);
	                $this->Register->saveField('twitter',$_POST['twitter']);
	                $this->Session->setFlash('Data Saved Successfully.');
	                $this->redirect('index');
        	        
        	}
        	
        }
        
        public function check_pass()
        {
            $pw=$_POST['pw'];
            $d=$this->Register->find('count',array('conditions'=>array('password'=>$pw)));
            if($d>0)
                echo "1";
            else
                echo "0";
            die();
        }
        
        public function ads()
        {
             if(!$this->Session->read('user'))
                $this->redirect('/');
             $this->set('ads',$this->Ad->find('all',array('conditions'=>array('addedBy'=>$this->Session->read('id')))));
        }
        
         public function get_extension($type)
        {
        	switch($type)
        	{
        		case 1: return 'gif'; break;
        		case 2: return 'jpeg'; break;
        		case 3: return 'png'; break;
        		default: return false;
        	}
        	
        }
        
        public function add_ad()
        {
            if(!$this->Session->read('user'))
                $this->redirect('/');
            if(isset($_POST['submit']))
            {
                $uri = $_SERVER['REQUEST_URI'];
                $uri = str_replace('/',' ',$uri);
                $uri = str_replace(' ','/',trim($uri));
                if($uri!='user'){
                $arr_uri = explode('/',$uri);
                $path = $_SERVER['DOCUMENT_ROOT'].'/ads/app/webroot/img/ads/';
                }
                else
                $path = $_SERVER['DOCUMENT_ROOT'].'/ads/app/webroot/img/ads/';
                
                $arr['title'] = $_POST['title'];
                $arr['description'] = $_POST['description'];
                $arr['state'] = $_POST['state'];
                $arr['city'] =$_POST['city'];
                $arr['category_id'] = $_POST['category'];
                $arr['subcategory_id'] = $_POST['sub_category'];
                $arr['start_date'] = $_POST['start_date'];
                //$arr['end_date'] = $_POST['end_date'];
                $arr['type'] = $_POST['type'];
                $arr['street'] = $_POST['street'];
                $arr['added_date'] = date('Y-m-d');
                $s=$this->Setting->find('first');
                if($s['Setting']['auto_ads']=='1')
                {
                    $arr['isApproved'] = '1';
                }
                else
                {
                    $arr['isApproved'] = '0';
                }
                $us=$this->User->find('first');
                $this->Email->from    = 'I Want Deals <info@iwantdeals.ca>';
                $this->Email->to = $us['User']['username'];
                $this->Email->sendAs = 'both';
                $this->Email->subject = "New Ads";
                $message = "Hi There <br><br> A new ad has been posted in Iwantdeals.ca. <br><br> Please login to view the details. <br><br>";
                $message.="Thank you!<br>Iwantdeals.ca Team";
                $this->Email->send($message);
                
                
                if($this->Session->read('type')=="seeker")
                {
                     $data=$this->Register->find('all',array('type'=>'1'));
                    foreach($data as $d)
                    {
                        if($d['Register']['state']==$arr['state'] && $d['Register']['city']==$arr['city'] && $d['Register']['category']==$arr['category_id'])
                        {
                                $this->Email->reset();
                                $this->Email->from    = 'I Want Deals <info@iwantdeals.ca>';
                                $this->Email->to = $d['Register']['email'];
                                $this->Email->sendAs = 'both';
                                $this->Email->subject = 'New Ads';
                                $message="Hi there <br><br> An Ad has been posted in Iwantdeals.ca in your location. <br><br> Please visit the site for more details. <br><br> Thank you!<br>Iwantdeals.ca Team";
                                $this->Email->send($message);
                        }
                    }   
                }
                
                if($this->Session->read('type')=="business")
                {
                $arr['nearest_intersection'] = $_POST['nearest_intersection'];
                $arr['mop'] = $_POST['mop'];
                $arr['references'] = $_POST['references'];
                $arr['return_policy'] = $_POST['return_policy'];
                $arr['waranty_gurantee'] = $_POST['waranty_gurantee'];
                $arr['insurance'] = $_POST['insurance'];
                $arr['licenses'] = $_POST['license'];
                $arr['qualification'] = $_POST['qualification'];
                }
                else if($this->Session->read('type')=="seeker")
                {
                    $arr['budget'] = $_POST['budget'];
                }
                
                $arr['youtube'] = $_POST['video'];
                $arr['addedBy'] = $this->Session->read('id');
                $data=$this->Register->find('first',array('conditions'=>array('id'=>$this->Session->read('id'))));
                $arr['membership'] = $data['Register']['type'];
                $this->Ad->create();
                $this->Ad->save($arr);
                $id=$this->Ad->id;
                if($this->Session->read('type')=="seeker")
                {
                    $c['name'] = $_POST['name'];
                    $c['email'] = $_POST['email'];
                    $c['phone'] = $_POST['phone'];
                    $c['mobile'] = $_POST['mobile'];
                    $c['fax'] = $_POST['fax'];
                    $c['facebook'] = $_POST['facebook'];
                    $c['twitter'] = $_POST['twitter'];
                    $c['ad_id'] = $id;
                    $this->Contact->save($c);
                }
                
                $img = $_POST['image'];
                for($i=1;$i<=$img;$i++)
                {
                    
                    $source = $_FILES['image_'.$i]['tmp_name'];
                    $destination = $path.$_FILES['image_'.$i]['name'];
                    move_uploaded_file($source,$destination);
                    $max_width = 100;
                    $max_height = 100;
                    list($w, $h, $ext) = getimagesize($destination);
                    $e = $this->get_extension($ext);
                    if($w > $h)
                    {
                        $width = $max_width;
                        $ratio = $max_width/$w;
                        $height = $ratio * $h;
                    
                    }
                    else
                    {
                        $height = $max_height;
                        $ratio = $max_height/$h;
                        $width = $ratio * $w;
                    }
                	$virtual_image = imagecreatetruecolor($width, $height);
                    switch ($e)
                	{
                		case 'gif':
                		 $image = imagecreatefromgif($destination);
                		 break;
                		 case 'jpeg':
                		 	$image = imagecreatefromjpeg($destination);
                		 	break;
                		 case 'png' :
                		 	$image = imagecreatefrompng($destination);
                		 	break;
                		  
                	}
                	imagecopyresampled($virtual_image, $image, 0, 0, 0, 0, $width, $height, $w, $h);
                    
                    $j=explode($e,$_FILES['image_'.$i]['name']);
                    $name = rand(000000, 999999);
                    
                    
                    
                    $name1 = $path.$name."_small.".$e;
                    $name2 = $path.$name."_big.".$e;
                	switch($e)
                	{
                		case 'gif':
                		 imagegif($virtual_image, $name1);
                		 break;
                		 case 'jpeg':
                		 	imagejpeg($virtual_image, $name1);
                		 	break;
                		 case 'png' :
                		 	imagepng($virtual_image, $name1);
                		 	break;
                	}
                    
                    $max_width = 500;
                    $max_height = 300;
                    list($w, $h, $ext) = getimagesize($destination);
                    $e = $this->get_extension($ext);
                    if($w > $h)
                    {
                        $width = $max_width;
                        $ratio = $max_width/$w;
                        $height = $ratio * $h;
                    
                    }
                    else
                    {
                        $height = $max_height;
                        $ratio = $max_height/$h;
                        $width = $ratio * $w;
                    }
                	$virtual_image = imagecreatetruecolor($width, $height);
                    switch ($e)
                	{
                		case 'gif':
                		 $image = imagecreatefromgif($destination);
                		 break;
                		 case 'jpeg':
                		 	$image = imagecreatefromjpeg($destination);
                		 	break;
                		 case 'png' :
                		 	$image = imagecreatefrompng($destination);
                		 	break;
                		  
                	}
                	imagecopyresampled($virtual_image, $image, 0, 0, 0, 0, $width, $height, $w, $h);
                    
                	switch($e)
                	{
                		case 'gif':
                		 imagegif($virtual_image, $name2);
                		 break;
                		 case 'jpeg':
                		 	imagejpeg($virtual_image, $name2);
                		 	break;
                		 case 'png' :
                		 	imagepng($virtual_image, $name2);
                		 	break;
                	}
                    $imag = $name.".".$e;
                    
                    $ad['ad_id'] = $id;
                    $ad['image'] = $imag;
                    $this->Image->create();
                    $this->Image->save($ad);
                    //$image=$_FILES['image_'.$i]['name'];
                    
                    //$ad = "";
                }
                
                if($arr['type']=="1")
                {
                    $this->redirect('paypal');
                }
                else
                    $this->redirect('ads');
            }
           $this->set('province',$this->Province->find('all',array('conditions'=>array('PARENT_ID'=>'0'))));
           $this->set('city',$this->Province->find('all',array('conditions'=>array('PARENT_ID !='=>'0'))));
           $this->set('user',$this->Register->find('first',array('conditions'=>array('id'=>$this->Session->read('id')))));
           $this->set('category',$this->Category->find('all',array('conditions'=>array('parent_id'=>'0'))));
           $this->set('count',$this->Ad->find('count',array('conditions'=>array('addedBy'=>$this->Session->read('id'),'isApproved'=>'1','expiry'=>'0'))));
            
        }
        
        public function ads_edit($id)
        {
            if(!$this->Session->read('user'))
                $this->redirect('/');
            $this->set('s',$this->Ad->find('first',array('conditions'=>array('id'=>$id))));
            $this->set('province',$this->Province->find('all',array('conditions'=>array('PARENT_ID'=>'0'))));
           $this->set('city',$this->Province->find('all',array('conditions'=>array('PARENT_ID !='=>'0'))));
           $this->set('user',$this->Contact->find('first',array('conditions'=>array('ad_id'=>$id))));
           $this->set('category',$this->Category->find('all',array('conditions'=>array('parent_id'=>'0'))));
           $this->set('sub_category',$this->Category->find('all',array('conditions'=>array('parent_id !='=>'0'))));
           
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
                $this->Ad->saveField('youtube',$_POST['video']);
                if($this->Session->read('type')=="business")
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
                else if($this->Session->read('type')=="seeker")
                {
                    $this->Ad->saveField('budget', $_POST['budget']);
                }
                if($this->Session->read('type')=="seeker")
                {
                    $this->Contact->ad_id = $id;
                    $this->Contact->saveField('name',$_POST['name']);
                    $this->Contact->saveField('email', $_POST['email']);
                    $this->Contact->saveField('phone', $_POST['phone']);
                    $this->Contact->saveField('mobile', $_POST['mobile']);
                    $this->Contact->saveField('fax', $_POST['fax']);
                    $this->Contact->saveField('facebook', $_POST['facebook']);
                    $this->Contact->saveField('twitter', $_POST['twitter']);
                    
                }
                $this->Session->setFlash('Data Saved Successfully');
                $this->redirect('ads');
            }
        }
        
        public function view_ads($id)
        {
            if(!$this->Session->read('user'))
                $this->redirect('/');
                if(isset($_POST['submit']))
                {
                    $this->Ad->id=$_POST['id'];
                    $this->Ad->saveField('end_date',$_POST['end_date']);
                    $this->Session->setFlash('Data saved successsfully');
                    $this->redirect('ads');
                    
                }
            $data=$this->Ad->find('first',array('conditions'=>array('id'=>$id)));
            $this->set('contact',$this->Contact->find('first',array('conditions'=>array('ad_id'=>$id))));
            $this->set('state',$this->Province->find('first',array('conditions'=>array('ID'=>$data['Ad']['state']))));
            $this->set('city',$this->Province->find('first',array('conditions'=>array('ID'=>$data['Ad']['city']))));
            $this->set('first',$this->Image->find('first',array('conditions'=>array('ad_id'=>$id))));
            $this->set('image',$this->Image->find('all',array('conditions'=>array('ad_id'=>$id))));
            $this->set('a',$data);
        }
        
        public function ads_remove($id)
        {
        	$this->Ad->delete($id);
             $this->Session->setFlash('Data Deleted successsfully');
        	$this->redirect('ads');
        }
        
        public function logout()
        {
            $this->Session->delete('user');
            $this->Session->delete('id');
            $this->redirect('/');
        }
        
        public function check_type()
        {
            $type=$_POST['type'];
            $c=$this->Ad->find('count',array('conditions'=>array('type'=>$type,'addedBy'=>$this->Session->read('id'))));
            if($c=='3')
                echo "1";
            else
                echo "0";
            
            die();
        }
        
        public function get_subcategory()
        {
            $data=$this->Category->find('all',array('conditions'=>array('parent_id'=>$_POST['cat'])));
            $da="<option value=''>please select</option>";
            foreach($data as $d)
            {
                $da.="<option value='".$d['Category']['id']."'>".$d['Category']['name']."</option>";
            }
            echo $da;
            die();
        }
        
        public function paypal()
        {
            
        }
        
        public function renew_free_add($id)
        {
            $date = date('Y-m-d');
            $this->Ad->id = $id;
            $this->Ad->saveField('added_date',$date);
            $this->Ad->saveField('expiry','0');
            $us=$this->User->find('first');
                $this->Email->from    = 'I Want Deals <info@iwantdeals.ca>';
                $this->Email->to = $us['User']['username'];
                $this->Email->sendAs = 'both';
                $this->Email->subject = "Ads Renewed";
                $message = "Hi There <br><br> An ad has been renewed in Iwantdeals.ca. <br><br> Please login to view the details. <br><br>";
                $message.="Thank you!<br>Iwantdeals.ca Team";
                $this->Email->send($message);
        }
        
        public function renew_paid_ad($id)
        {
            $date = date('Y-m-d');
            $this->Ad->id = $id;
            $this->Ad->saveField('added_date',$date);
            $this->Ad->saveField('expiry','0');
            $this->Email->from    = 'I Want Deals <info@iwantdeals.ca>';
            $us=$this->User->find('first');
                $this->Email->to = $us['User']['username'];
                $this->Email->sendAs = 'both';
                $this->Email->subject = "Ads Renewed";
                $message = "Hi There <br><br> An ad has been renewed in Iwantdeals.ca. <br><br> Please login to view the details. <br><br>";
                $message.="Thank you!<br>Iwantdeals.ca Team";
                $this->Email->send($message);
            $this->redirect('paypal');
        }
        
    }