<?php

include_once 'model/iletisim.php';

class iletisim extends MainController
{
    private $db;
    public function __construct()
    {
        $this->db = new Iletisimdb();
    }

    public function index(){
        $this->siteshowpage("iletisim.php");
    }

    public function AindexOkunmayan()
    {
        $this->oturumkontrol();
        $result = $this->db->getIletisimler();
        $this->adminshowpage("iletisimler.php",$result);
    }

    public function AindexOkunan()
    {
        $this->oturumkontrol();
        $result = $this->db->getIletisimlerokunan();
        $this->adminshowpage("iletisimler.php",$result);
    }

    public function send()
    {
        if (isset($_POST["send"]))
        {
            $adsoyad = filtre($_POST["adsoyad"]);
            $email = filtre($_POST["email"]);
            if (isset($_POST["tel"])) {$tel = filtre($_POST["tel"]);}
            else $tel = 0;
            $mesaj = filtre($_POST["mesaj"]);
            $result = $this->db->send($adsoyad,$email,$mesaj,$tel);
            if ($result)
            {
                header("Location: ".$this->basedir."iletisim/yes");
                die();
            }
            else{
                header("Location: ".$this->basedir."iletisim/no");
                die();
            }

        }
    }

    public function iletisimGetir($id)
    {
        $this->oturumkontrol();
        if (isset($id)) {
            $id = (int) filtre($id);
            $veri = $this->db->getIletisim($id);
            if ($veri)
            {
                $result = $this->db->updateDurum($id);
                if ($result)
                {
                    $this->adminshowpage("iletisim.php",$veri);
                }
            }

        }
    }

    public function sendMail()
    {
        $this->oturumkontrol();
        if (isset($_POST))
        {
            $adsoyad = filtre($_POST["adsoyad"]);
            $mail = filtre($_POST["mail"]);
            $konu = filtre($_POST["konu"]);
            $cevap = htmlspecialchars($_POST["cevap"],ENT_QUOTES);
            $result = mailGonder($mail,$konu,$adsoyad,$cevap);
            if ($result)
            {
                header("Location: ".$this->basedir."iletisim/AindexOkunmayan/yes");
                exit();
            }
        }
    }
}

 ?>