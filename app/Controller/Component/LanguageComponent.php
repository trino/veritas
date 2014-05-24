<?php
App::uses('Component', 'Controller');
App::import('Model', 'Convert');
class LanguageComponent extends Component {
    public function translate($field,$lang='fre')
    {
        $field = strtolower(str_replace(" ","_",$field));
        $this->{'Convert'} = ClassRegistry::init('Convert');
        //$this->loadModel('Convert');
         $st = $this->Convert->findByField($field);
        return $st['Convert'][$lang];
        
        
    }
}

