<?php 
include_once 'controller.php';

class Anasayfa extends MainController{
    public function index(){
        $this->siteshowpage("anasayfa.php");
    }
    public function Aindex()//admin index
    {
        $this->oturumkontrol();
        header("Location: ".$this->basedir."kullanicilar/Aindex");
    }
}

?>