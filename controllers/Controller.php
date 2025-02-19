<?php 

abstract class Controller{

    private $layout;
    protected $helpers;

    public function __construct(array $helpers = array())
    {
        
        $this->helpers = $helpers;

    }

    protected function setLayout($filename){

        $this->layout = $filename;

    }

    protected function view($filename, array $data = array()){

        $path = ROOT . '/views/';
        $file = $path . $filename;

        extract($data);

        if(!is_null($this->layout)){
            return require $path . $this->layout;
        }

        require $file;

    }

    protected function getId(array $parameters){
        
        $this->helpers['URLHelpers']->checkId($parameters, $this->helpers['URLHelper']->getURL('404'));
        $id = (int) $parameters[0];

        return $id;

    }

}

?>