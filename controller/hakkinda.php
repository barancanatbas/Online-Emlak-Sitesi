<?php
include_once 'model/hakkinda.php';

class Hakkinda extends MainController{

    private $db;

    public function __construct()
    {
        $this->db = new Hakkindadb();
    }

    public function index()
    {
        $result = $this->db->getAbout();
        $this->siteshowpage("hakkimizda.php",$result);
    }

    public function Aindex()
    {
        $this->oturumkontrol();
        $veriler = $this->db->getAbout();
        if ($veriler)
        {
            $this->adminshowpage("hakkimizda.php",$veriler);
        }
    }

    public function update()
    {
        $this->oturumkontrol();
        if ($_POST)
        {
            $yazi = htmlspecialchars($_POST["yazi"],ENT_QUOTES);
            $result = $this->db->update($yazi);
            if ($result)
            {
                header("Location: ".$this->basedir."hakkinda/Aindex");
                die();
            }
            else{
                header("Location: ".$this->basedir."hakkinda/Aindex");
                die();
            }
        }
        else{
            header("Location: ".$this->basedir."hakkinda/Aindex");
            die();
        }
    }
}

 ?>