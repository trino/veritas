<?php 
    class HomeController extends AppController
    {
         public $helpers = array('Html');
         var $paginate = array(
        'limit' => 3
    );
    var $components = array('Email');
        function __construct(CakeRequest $request, CakeResponse $response)
        {
         parent::__construct($request,$response);
         $this->loadModel('Page');
         $this->loadModel('Register');
         $this->loadModel('Province');
         $this->loadModel('Category');
         $this->loadModel('Ad');
         $this->loadModel('User');
         $this->loadModel('Image');
         $this->loadModel('Contact');
         $this->loadModel('Setting');
        }
        function index()
        {
            /*$this->Session->delete('error');
            if(isset($_POST['submit']))
            {
                $un=$_POST['username'];
                $pw=$_POST['password'];
                $q=$this->Register->find('first',array('conditions'=>array('email'=>$un,'password'=>$pw,'isApproved'=>'1')));
                if($q)
                {
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
                    
                }
                else
                {
                    $this->Session->write(array('error'=>'error'));
                    $this->redirect('/user/login/error');
                }
            }
            if(isset($_POST['province']))
            {
                $state=$_POST['state'];
                $city=$_POST['city'];
                $this->Session->write(array('state_id'=>$state,'city_id'=>$city));
            }
            if($this->Session->read('state_id'))
            {
                $this->set('ads',$this->Ad->find('all',array('conditions'=>array('membership'=>'1','isApproved'=>'1','state'=>$this->Session->read('state_id'),'city'=>$this->Session->read('city_id'),'expiry'=>'0'))));
                $this->set('want_ad',$this->Ad->find('all',array('conditions'=>array('membership'=>'0','isapproved'=>'1','state'=>$this->Session->read('state_id'),'city'=>$this->Session->read('city_id'),'expiry'=>'0'))));
                $this->set('category',$this->paginate('Category',array('parent_id'=>'0')));
               $this->set('sub_category',$this->Category->find('all',array('conditions'=>array('parent_id !='=>'0'))));
           }*/
           $this->set('province',$this->Province->find('all',array('conditions'=>array('PARENT_ID'=>'0'))));
        }
        function get_breadcrum()
        {
            $data = $this->Page->find('all');
            return $data;   
        }
        
        public function register()
        {
            
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
        public function register_company()
        {
            if(isset($_POST['submit']))
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
                	
                $arr['logo'] = $_FILES['logo']['name'];
                $arr['full_name'] = $_POST['full_name'];
                $arr['company'] = $_POST['company'];
                $arr['category'] = $_POST['category'];
                $arr['description'] = $_POST['description'];
                $arr['email'] = $_POST['email'];
                $arr['password'] = $_POST['password'];
                $arr['address'] = $_POST['address'];
                $arr['city'] = $_POST['city'];
                $arr['state'] = $_POST['state'];
                $arr['phone'] = $_POST['phone'];
                $arr['cell'] = $_POST['cell'];
                $arr['fax'] = $_POST['fax'];
                $arr['website'] = $_POST['website'];
                //$arr['deals_on'] = $_POST['deals_on'];
                $arr['no_of_year'] = $_POST['no_of_year'];
                $arr['facebook'] = $_POST['facebook'];
                $arr['twitter'] = $_POST['twitter'];
                $arr['operation_start'] = $_POST['operation_from'];
                $arr['operation_end'] = $_POST['operation_to'];
                $arr['partners'] = $_POST['partners'];
                $arr['no_of_employee'] = $_POST['no_of_employee'];
                $arr['type'] = '1';
                $d=$this->Setting->find('first');
                if($d['Setting']['auto_registration']=='1')
                {
                    $arr['isApproved'] = '1';
                }
                else
                {
                    $arr['isApproved'] = '0';
                }
                $this->Register->create();
                $this->Register->save($arr);
                //mail to the registered owner
                $data=$this->User->find('first');
                $this->Email->from    = 'I Want Deals <info@iwantdeals.ca>';
                $this->Email->to = $arr['email'];
                $this->Email->sendAs = 'both';
                $this->Email->subject = "Registration Successful";
                $message="Hi there <br><br> Thank you for registering with Iwantdeals.ca. You are now ready to login and post your ads.<br>";
                $message.="You login details are: <br> username:".$arr['email']."<br> password: " .$arr['password'] . "<br><br>";
                $message.="Wish you good deals!<br>Thank you!<br>Iwantdeals.ca Team";
                $this->Email->send($message);
                
                //mail to admin
                $this->Email->reset();
                $this->Email->from    = 'I Want Deals <info@iwantdeals.ca>';
                $this->Email->to = $data['User']['username'];
                $this->Email->sendAs = 'both';
                $this->Email->subject = "New Registration";
                $message = "Hi There <br> A new business has been registered in Iwantdeals.ca. <br> Please login to view the details. <br><br>";
                $message.="Thank you!<br>Iwantdeals.ca Team";
                $this->Email->send($message);
                $this->Session->setFlash('Email Send Successfully.');
                //$this->Session->setFlash('Data Saved Successfully');
                $this->redirect('thankyou');
            }
            $this->set('category',$this->Category->find('all',array('conditions'=>array('parent_id'=>'0'))));
            $this->set('province',$this->Province->find('all',array('conditions'=>array('PARENT_ID'=>'0'))));
        }
        
        
        public function register_user()
        {
            if(isset($_POST['submit']))
            {
                $arr['full_name'] = $_POST['full_name'];
                $arr['company'] = $_POST['company'];
                $arr['email'] = $_POST['email'];
                $arr['password'] = $_POST['password'];
                $arr['address'] = $_POST['address'];
                $arr['city'] = $_POST['city'];
                $arr['state'] = $_POST['state'];
                $arr['phone'] = $_POST['phone'];
                $arr['fax'] = $_POST['fax'];
                $arr['website'] = $_POST['website'];
                $arr['facebook'] = $_POST['facebook'];
                $arr['twitter'] = $_POST['twitter'];
                $arr['cell'] = $_POST['cell'];
                $arr['type'] = '0';
                $d=$this->Setting->find('first');
                if($d['Setting']['auto_registration']=='1')
                {
                    $arr['isApproved'] = '1';
                }
                else
                {
                    $arr['isApproved'] = '0';
                }
                $this->Register->create();
                $this->Register->save($arr);
                $data=$this->User->find('first');
                $this->Email->from    = 'I Want Deals <info@iwantdeals.ca>';
                $this->Email->to = $arr['email'];
                $this->Email->sendAs = 'both';
                $this->Email->subject = "Registration Successful";
                $message="Hi there <br><br> Thank you for registering with Iwantdeals.ca. You are now ready to login and post your ads.<br><br>";
                $message.="You login details are: <br> username:".$arr['email']."<br> password: " .$arr['password'] . "<br><br>";
                $message.="Wish you good deals!<br>Thank you!<br>Iwantdeals.ca Team";
                $this->Email->send($message);
                
                //mail to admin
                $this->Email->reset();
                $this->Email->from    = 'I Want Deals <info@iwantdeals.ca>';
                $this->Email->to = $data['User']['username'];
                $this->Email->sendAs = 'both';
                $this->Email->subject = "New Registration";
                $message = "Hi There <br><br> A new Seeker has been registered in Iwantdeals.ca. <br> Please login to view the details. <br><br>";
                $message.="Thank you!<br>Iwantdeals.ca Team";
                $this->Email->send($message);
                $this->redirect('thankyou');
            }
            $this->set('province',$this->Province->find('all',array('conditions'=>array('PARENT_ID'=>'0'))));
        }
        
        public function thankyou()
        {
            
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
        
        public function forget_password()
        {
            if(isset($_POST['submit']))
            {
                $em=$_POST['email'];
                $q=$this->Register->find('first',array('conditions'=>array('email'=>$em)));
                if($q)
                {
                    $this->Email->from    = 'I Want Deals <info@iwantdeals.ca>';
                    $this->Email->to = $em;
                    $this->Email->sendAs = 'both';
                    $this->Email->subject = "Login details";
                    $message = "Hi There <br><br> Your Login details are: <br><br>";
                    $message.="username:".$em."<br>password:".$q['Register']['password']."<br><br>";
                    $message.="Thank you!<br>Iwantdeals.ca Team";
                    $this->Email->send($message);
                    $this->redirect('login_details');
                }
                else
                {
                    $this->set('msg','Email doesnot exist.');
                }
            }
        }
        
        public function request_a_quote()
        {
            
        }
        
        public function pages($slug)
        {
            $this->set('p',$this->Page->find('first',array('conditions'=>array('slug'=>$slug))));
            
        }
        
        public function get_city()
        {
            $state = $_POST['state'];
            $city=$this->Province->find('all',array('conditions'=>array('PARENT_ID'=>$state)));
            $option = "";
            foreach($city as $c)
            {
                $option.="<option value='".$c['Province']['ID']."'>".$c['Province']['TITLE']."</option>";
            }
            /*foreach($city as $c)
            {
                $option.="<a href='javascript:void(0);' id='".$c['Province']['ID']."' onclick='city(this.id)'>".$c['Province']['TITLE']."</a>";
            }*/
            echo $option;
            die();
        }
        
        public function view_ads($type,$id)
        {
            if($type=="main")
            {
                $data=$this->Category->find('first',array('conditions'=>array('id'=>$id)));
                $this->set('category',$data['Category']['name']);
                $this->set('business_ad',$this->Ad->find('all',array('conditions'=>array('membership'=>'1','category_id'=>$id,'isApproved'=>'1','state'=>$this->Session->read('state_id'),'city'=>$this->Session->read('city_id'),'expiry'=>'0'))));
                $this->set('want_ad',$this->Ad->find('all',array('conditions'=>array('membership'=>'0','category_id'=>$id,'isApproved'=>'1','state'=>$this->Session->read('state_id'),'city'=>$this->Session->read('city_id'),'expiry'=>'0'))));
                $this->set('image',$this->Image->find('all'));
                $this->set('state',$this->Province->find('first',array('conditions'=>array('ID'=>$this->Session->read('state_id')))));
                $this->set('city',$this->Province->find('first',array('conditions'=>array('ID'=>$this->Session->read('city_id')))));
                $this->set('user',$this->Register->find('all'));
            }
            else
            {
                $data=$this->Category->find('first',array('conditions'=>array('id'=>$id)));
                $cat=$this->Category->find('first',array('conditions'=>array('id'=>$data['Category']['parent_id'])));
                $this->set('category',$cat['Category']['name']);
                $this->set('sub_category',$data['Category']['name']);
                $this->set('business_ad',$this->Ad->find('all',array('conditions'=>array('membership'=>'1','subcategory_id'=>$id,'isApproved'=>'1','state'=>$this->Session->read('state_id'),'city'=>$this->Session->read('city_id'),'expiry'=>'0'))));
                $this->set('want_ad',$this->Ad->find('all',array('conditions'=>array('membership'=>'0','subcategory_id'=>$id,'isApproved'=>'1','state'=>$this->Session->read('state_id'),'city'=>$this->Session->read('city_id'),'expiry'=>'0'))));
                $this->set('image',$this->Image->find('all'));
                $this->set('user',$this->Register->find('all'));
                $this->set('state',$this->Province->find('first',array('conditions'=>array('ID'=>$this->Session->read('state_id')))));
                $this->set('city',$this->Province->find('first',array('conditions'=>array('ID'=>$this->Session->read('city_id')))));
                
            }
        }
        
        public function view_ad_details($slug)
        {
            $sl=explode('-',$slug);
            $id=$sl[0];
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
            $this->set('first',$this->Image->find('first',array('conditions'=>array('ad_id'=>$id))));
            $this->set('image',$this->Image->find('all',array('conditions'=>array('ad_id'=>$id))));
            if(isset($_POST['submit']))
            {
                            
                            $this->Email->from    = $_POST['name']."<".$_POST['email'].">";
                            $this->Email->sendAs = 'both';
                            $this->Email->to = $_POST['email_to'];
                            $this->Email->subject = 'About the Your Ad';
                            $message= $_POST['message'];
                            $this->Email->send($message);
            }
        }
        
        public function report_spam()
        {
            $id=$_POST['id'];
            $data = $this->Ad->find('first',array('conditions'=>array('id'=>$id)));
            $us=$this->User->find('first');
            $spam=$data['Ad']['spam'];
            $spam = $spam + 1;
            $this->Ad->id = $id;
            $this->Ad->saveField('spam',$spam);
            $d=$this->User->find('first');
            $this->Email->from    = 'I Want Deals <info@iwantdeals.ca>';
            $this->Email->to = $us['User']['username'];
            $this->Email->sendAs = 'both';
            $this->Email->subject = 'Spam Ad';
            $message= "Hi there <br><br> One of the Ad has been marked as the spam. <br><br> Login in the site for the more detail <br>";
            $this->Email->send($message);
            $message.="Thank you!<br>Iwantdeals.ca Team";
            $this->Email->send($message);
            die();
        }
        
        public function test()
        {
            $email = new CakeEmail();
            $email->from('sudip@access-keys.com');
            $email->to('adiksudip@gmail.com');
            $email->subject('Email testing Subject');       
            $email->send('Email testing content');
            die();
        }
        public function view_want_details($slug)
        {
            $sl=explode('-',$slug);
            $id=$sl[0];
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
            $this->set('first',$this->Image->find('first',array('conditions'=>array('ad_id'=>$id))));
            $this->set('image',$this->Image->find('all',array('conditions'=>array('ad_id'=>$id))));
            $this->set('contact',$this->Contact->find('first',array('conditions'=>array('ad_id'=>$id))));  
            if(isset($_POST['submit']))
            {
                            
                            $this->Email->from    = $_POST['name']."<".$_POST['email'].">";
                            $this->Email->sendAs = 'both';
                            $this->Email->to = $_POST['email_to'];
                            $this->Email->subject = 'About the Your Ad';
                            $message= $_POST['message'];
                            $this->Email->send($message);
            }
        }
        
        public function province($province)
        {
            $province = str_replace('-','_',$province);
            $this->set('state',str_replace('_',' ',$province));
            $data= $this->Province->find('first',array('conditions'=>array('TITLE_URL'=>$province)));
            $id=$data['Province']['ID'];
            $this->set('city',$this->Province->find('all',array('conditions'=>array('PARENT_ID'=>$id))));
            
        }
        
        public function ads($p,$s)
        {
           $province = str_replace('-','_',$p);
           $this->set('state',str_replace('_',' ',$province));
            $data= $this->Province->find('first',array('conditions'=>array('TITLE_URL'=>$province)));
            $p_id=$data['Province']['ID'];
            $city = str_replace('-','_',$s);
            $this->set('city',str_replace('_',' ',$city));
            $data= $this->Province->find('first',array('conditions'=>array('TITLE_URL'=>$city)));
            $c_id=$data['Province']['ID'];
            $this->Session->write(array('state_id'=>$p_id,'city_id'=>$c_id));
            $this->set('ads',$this->Ad->find('all',array('conditions'=>array('membership'=>'1','isApproved'=>'1','state'=>$p_id,'city'=>$c_id,'expiry'=>'0'))));
            $this->set('want_ad',$this->Ad->find('all',array('conditions'=>array('membership'=>'0','isapproved'=>'1','state'=>$p_id,'city'=>$c_id,'expiry'=>'0'))));
            $this->set('category',$this->paginate('Category',array('parent_id'=>'0')));
            $this->set('sub_category',$this->Category->find('all',array('conditions'=>array('parent_id !='=>'0'))));
        }
        public function contact_us()
        {
        
        } 
        
        public function login_details()
        {
            
        }
        
        
    }