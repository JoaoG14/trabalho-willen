<?php 

class AdminSession
{

    private function control(){

        if(!isset($_SESSION)){
            session_start();
        }

    }

    public function save($data){

        $this->control();
        $_SESSION['admin'] = $data;
        return true;

    }

    public function has(){
        $this->control();

        if(isset($_SESSION['admin'])){
            return true;
        }
        
        return false;
    }

    public function get($info){

        $this->control();
        if(isset($_SESSION['admin'][$info])){
            return $_SESSION['admin'][$info];
        }

    }

    public function set($info, $value){

        $this->control();
        $_SESSION['admin'][$info] = $value;

    }

    public function delete(){
        $this->control();
        unset($_SESSION['admin']);
    }

}

?>