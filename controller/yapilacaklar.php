<?php
include_once 'controller.php';
include_once 'model/yapilacaklar.php';

class Yapilacaklar extends MainController
{
    private $db;
    public function __construct()
    {
        $this->db = new Yapilacaklardb();
    }

    public function index()
    {
        $this->oturumkontrol();
        $veriler = $this->db->getir();
        if ($veriler) {
            $this->adminshowpage('yapilacaklar.php',$veriler);
        }
        else{
            $this->adminshowpage('yapilacaklar.php',false);
        }
    }

    public function insert()
    {
        $this->oturumkontrol();
        if (isset($_POST)) {
            $baslik = filtre($_POST["baslik"]);
            $icerik = filtre($_POST["icerik"]);
            $result = $this->db->insert($baslik,$icerik);
            if ($result)
            {
                header("Location: ".$this->basedir."yapilacaklar");
                die();
            }
            else{
                header("Location: ".$this->basedir."yapilacaklar");
                die();
            }
        }
        else{
            header("Location: ".$this->basedir."yapilacaklar");
            die();
        }
    }

    public function update($id)
    {
        $this->oturumkontrol();
        if (isset($id))
        {
            $id = (int) filtre($id);
            $result = $this->db->update($id);
            if ($result)
            {
                header("Location: ".$this->basedir."yapilacaklar");
                die();
            }
            else{
                header("Location: ".$this->basedir."yapilacaklar");
                die();
            }
        }
        else{
            header("Location: ".$this->basedir."yapilacaklar");
            die();
        }
    }
}


?>