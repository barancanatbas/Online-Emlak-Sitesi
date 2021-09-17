<?php

include_once 'model/login.php';

class Login extends MainController
{
    private $db;
    public function __construct()
    {
        $this->db = new Logindb();
    }

    public function index()
    {
        if (isset($_SESSION["kullanici"]))
        {
            header("Location: ".$this->basedir."anasayfa/Aindex");
            die();
        }
        $this->adminlogin();
    }

    public function login()
    {

        if (isset($_POST["btn"])) {
            $kuladi = filtre($_POST["kuladi"]);
            $sifre = md5(filtre($_POST["sifre"]));
            $resault = $this->db->loginkontroldb($kuladi,$sifre);
            if ($resault) {
                $session = array("id"=>$resault["id"],"ad"=>$resault["ad"],"soyad"=>$resault["soyad"],"resim"=>$resault["resim"],"mail"=>$resault["mail"],"kidem"=>$resault["kidem"]);
                $_SESSION["kullanici"] = $session;
                header("Location: ".$this->basedir."anasayfa/Aindex");
                die();
            }
            else{
                header("Location: ".$this->basedir."login");
                die();
            }
        }
    }

    public function logout()
    {
        unset($_SESSION["kullanici"]);
        session_destroy();
        ob_end_flush();
        header("Location: ".$this->basedir);
        die();
    }
}
 ?>