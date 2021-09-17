<?php 

include_once 'model/kidem.php';

class Kidem extends MainController
{
    private $db;
    public function __construct()
    {
        $this->db = new Kidemdb();
    }

    public function index()
    {
        $this->oturumkontrol();
        $result = $this->db->getKidemler();
        if ($result)
        {
            $this->adminshowpage("kidemler.php",$result);
        }
        else{
            header("Location: ".$this->basedir."yonetim/no");
            die();
        }
    }

    public function yeni()
    {
        $this->oturumkontrol();
        $this->adminshowpage("yenikidem.php");
    }

    public function insert()
    {
        $this->oturumkontrol();
        $gelenveri = filtre($_POST["kidemad"]);
        $result = $this->db->insert($gelenveri);
        if ($result) {
            header("Location: ".$this->basedir."kidem/yes");
            exit();
        }
        else{
            header("Location: ".$this->basedir."kidem/no");
            die();
        }
    }

    public function delete($id)
    {
        $this->oturumkontrol();
        $id = (int)$id;
        $result = $this->db->delete($id);
        if ($result) {
            header("Location: ".$this->basedir."kidem");
        }else{
            header("Location: ".$this->basedir."kidem");
        }
    }

}

?>