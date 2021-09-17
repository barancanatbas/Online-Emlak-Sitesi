<?php
include_once 'ayar.php';

class MainController
{
    public $basedir = "/emlak/";

    public function oturumkontrol()
    {
        if (isset($_SESSION["kullanici"])) {
            return true;
        }
        else{
            header("Location: ".$this->basedir."login");
            exit();
        }
    }

    public function siteshowpage($src,$values=false){
        include_once("view/site/layout/header.php");
        include_once("view/site/".$src);
        include_once("view/site/layout/footer.php");
    }

    public function adminshowpage($src,$values=false)
    {
        include_once("view/adminpanel/layout/header.php");
        include_once("view/adminpanel/".$src);
        include_once("view/adminpanel/layout/footer.php");
    }

    public function adminlogin()
    {
        include_once("view/adminpanel/login.php");
    }
}
 ?>