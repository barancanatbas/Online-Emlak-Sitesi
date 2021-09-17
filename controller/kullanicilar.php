<?php 

include_once 'model/kullaniciayar.php';

class Kullanicilar extends MainController
{
    private $db;

    public function __construct()
    {
        $this->db = new Kullanicidb();
    }

    public function index()
    {
        $result = $this->db->getUsers();
        $this->siteshowpage("calisanlar.php",$result);
    }

    public function Aindex()
    {
        $this->oturumkontrol();
        $resault = $this->db->getUser($_SESSION["kullanici"]["id"]);
        if ($resault) {
            $this->adminshowpage("kullanici.php",$resault);
        }
        else{
            header("Location: ".$this->basedir."yonetim/no");
            die();
        }
    }

    public function update()
    {
        $this->oturumkontrol();
        if (isset($_POST["guncellegenel"])) {
            $resault =$this->db->guncellegenel($_POST);
            if ($resault) {
                header("Location: ".$this->basedir."kullanicilar/Aindex");
                die();
            }else{
                header("Location: ".$this->basedir."kullanicilar/Aindex");
                die();
            }
        }

        elseif(isset($_POST["guncellesifre"])){
            $resault =$this->db->guncellesifre($_POST);
            if ($resault) {
                header("Location: ".$this->basedir."kullanicilar/Aindex");
            }else{
                header("Location: ".$this->basedir."kullanicilar/Aindex");
            }
        }

        elseif(isset($_POST["guncelleresim"])){
            $resault = $this->db->guncelleresim($_FILES);
            if ($resault) {
                header("Location: ".$this->basedir."kullanicilar/Aindex");
                die();
            }else{
                header("Location: ".$this->basedir."kullanicilar/Aindex");
                die();
            }
        }

    }

    public function newUser()
    {
        $this->oturumkontrol();
        $result = $this->db->getKidem();
        if($result)
        {
            $this->adminshowpage("yenikullanici.php",$result);
        }else{
            header("Location: ".$this->basedir."yonetim/no");
            die();
        }
    }

    public function saveUser()
    {
        $this->oturumkontrol();
        $resault = $this->db->saveUser($_POST,$_FILES);
        if ($resault) {
            header("Location: ".$this->basedir."kullanicilar/users");
            die();
        }else{
            header("Location: ".$this->basedir."kullanicilar/users");
            die();
        }
    }

    public function users()
    {
        $this->oturumkontrol();
        $veriler = $this->db->getUsers();
        if ($veriler)
        {
            $this->adminshowpage("kullanicilar.php",$veriler);
        }
        else{
            header("Location: ".$this->basedir."yonetim/no");
            die();
        }

    }

    public function deleteUser($id)
    {
        $this->oturumkontrol();
        if ($_SESSION["kullanici"]["kidem"] == "patron") {
            $id = (int)$id;
            $veri =    $this->db->getUser($id);
            unlink($veri["resim"]);
            $resault = $this->db->deleteUser($id);
            if ($resault) {
                header("Location: ".$this->basedir."kullanicilar/users");
                die();
            }else{
                header("Location:http: ".$this->basedir."kullanicilar/users");
                die();
            }
        }
        else{
            header("Location: ".$this->basedir."kullanicilar/users");
            die();
        }
    }


}

?>