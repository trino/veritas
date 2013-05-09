<?php 
    class CronController extends AppController
    {
         var $components = array('Email');
        function __construct(CakeRequest $request, CakeResponse $response)
        {
            parent::__construct($request,$response);
             $this->loadModel('Page');
             $this->loadModel('Register');
             $this->loadModel('Province');
             $this->loadModel('Category');
             $this->loadModel('Ad');
             $this->loadModel('Image');
             $this->loadModel('Contact');
             $this->loadModel('Setting');
        }
        
        public function check_expiry_of_ads()
        {
            $ads=$this->Ad->find('all',array('conditions'=>array('isApproved'=>'1','spam'=>'0','expiry'=>'0')));
            $expiry = $this->Setting->find('first');
            $free=$expiry['Setting']['free_ad'];
             $paid=$expiry['Setting']['paid_ad'];
                        
            $date1 = "2009-06-24";
            $date2 = "2009-06-26";
            $c_date = date('Y-m-d');
            foreach($ads as $a)
            {
                $this->Email->reset();
                $s_date = $a['Ad']['start_date'];
                $diff= abs(strtotime($c_date)-strtotime($s_date)); 
                $years = floor($diff / (365*60*60*24));
                $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                $em=$this->Register->find('first',array('id'=>$a['Ad']['addedBy']));
                $email=$em['Register']['email'];
                $addeby=$a['Ad']['addedBy'];
                $data=$this->Register->find('first',array('id'=>$addedBy));
                if($data['Register']['type']=="0")
                {
                    if($days>=30)
                    {
                            $this->Ad->id = $a['Ad']['id'];
                            $this->Ad->saveField('expiry','1');
                            $this->Email->from    = "Ads Site <noreply@ads.com>";
                            $this->Email->sendAs = 'both';
                            $this->Email->to = $email;
                            $this->Email->subject = 'Ads Expiry';
                            $message="Hi there <br> One of your ad in the Ads site has expired. <br> Please visit the site for more detaisl. <br> Thanks! Ads Site";
                            $this->Email->send($message);
                    }   
                }
                else
                {
                    if($a['Ad']['type']=='1')
                    {
                        if($days>=15)
                        {
                            $this->Ad->id = $a['Ad']['id'];
                            $this->Ad->saveField('expiry','1');
                            $this->Email->from    = "Ads Site <noreply@ads.com>";
                            $this->Email->sendAs = 'both';
                            $this->Email->to = $email;
                            $this->Email->subject = 'Ads Expiry';
                            $message="Hi there <br> One of your ad in the Ads site has expired. <br> Please visit the site for more detaisl. <br> Thanks! Ads Site";
                            $this->Email->send($message);
                        }
                    }
                    elseif($a['Ad']['type']=='2')
                    {
                        if($days>=2)
                        {
                            $this->Ad->id = $a['Ad']['id'];
                            $this->Ad->saveField('expiry','1');
                            $this->Email->from    = "Ads Site <noreply@ads.com>";
                            $this->Email->sendAs = 'both';
                            $this->Email->to = $email;
                            $this->Email->subject = 'Ads Expiry';
                            $message="Hi there <br> One of your ad in the Ads site has expired. <br> Please visit the site for more detaisl. <br> Thanks! Ads Site";
                            $this->Email->send($message);
                        }
                    }
                }
                
            
            }
            
            die();
        }
    }