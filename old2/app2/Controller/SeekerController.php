<?php 
    class SeekerController extends AppController
    {
         public $helpers = array('Html');
         var $paginate = array(
        'limit' => 1
    );
        function __construct(CakeRequest $request, CakeResponse $response)
        {
         parent::__construct($request,$response);
         $this->loadModel('Page');
         $this->loadModel('Register');
         $this->loadModel('Province');
         $this->loadModel('Category');
         $this->loadModel('Ad');
         $this->loadModel('Image'); 
        }
        function index()
        {
            
        }
        function add_ad()
        {
         /*if(!$this->Session->read('user'))
                $this->redirect('/');*/
            /*if(isset($_POST['submit']))
            {
                $uri = $_SERVER['REQUEST_URI'];
                $uri = str_replace('/',' ',$uri);
                $uri = str_replace(' ','/',trim($uri));
                if($uri!='user'){
                $arr_uri = explode('/',$uri);
                $path = $_SERVER['DOCUMENT_ROOT'].$arr_uri[0].'/app/webroot/img/ads/';
                }
                else
                $path = $_SERVER['DOCUMENT_ROOT'].'app/webroot/img/ads/';
                
                $arr['title'] = $_POST['title'];
                $arr['description'] = $_POST['description'];
                $arr['state'] = $_POST['state'];
                $arr['city'] =$_POST['city'];
                $arr['category_id'] = $_POST['category'];
                $arr['subcategory_id'] = $_POST['sub_category'];
                $arr['start_date'] = $_POST['start_date'];
                $arr['end_date'] = $_POST['end_date'];
                $arr['type'] = $_POST['type'];
                $arr['street'] = $_POST['street'];
                
                $this->Ad->create();
                $this->Ad->save($arr);
                $id=$this->Ad->id;
                
                $img = $_POST['image'];
                for($i=1;$i<=$img;$i++)
                {
                    $source = $_FILES['image_'.$i]['tmp_name'];
                    $destination = $path.$_FILES['image_'.$i]['name'];
                    move_uploaded_file($source,$destination);
                    $max_width = 60;
                    $max_height = 60;
                    list($w, $h) = getimagesize($destination);
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
                    $image = imagecreatefromjpeg($destination);
                	imagecopyresampled($virtual_image, $image, 0, 0, 0, 0, $width, $height, $w, $h);
                	imagejpeg($virtual_image, $destination);  
                    $image=$_FILES['image_'.$i]['name'];
                    $ad['ad_id'] = $id;
                    $ad['image'] = $image;
                    $this->Image->save($ad);
                }
                $this->redirect('ads');
            }
           $this->set('province',$this->Province->find('all',array('conditions'=>array('PARENT_ID'=>'0'))));
           $this->set('city',$this->Province->find('all',array('conditions'=>array('PARENT_ID !='=>'0'))));
           $this->set('user',$this->Register->find('first',array('conditions'=>array('id'=>$this->Session->read('id')))));
           $this->set('category',$this->Category->find('all',array('conditions'=>array('parent_id'=>'0'))));   */
        }
    }