<?php 
include_once 'model/ev.php';

class Ev extends MainController {

    private $db;
    public function __construct()
    {
        $this->db = new Evdb();
        $this->basedir = "/emlak/";
    }

    public function index()
    {
        if (isset($_POST["filtre"]))
        {
            $max =(int)filtre($_POST["max"]);
            $min = (int)filtre($_POST["min"]);
            $durum = (string)filtre($_POST["durum"]);
            if ($durum == "hepsi") $durum = "";
            $veriler = $this->db->getHomesByFiltre($max,$min,$durum);
            if ($veriler) {
                foreach ($veriler as $key => $ev) {
                    $resimler = $this->db->getHomeImages($ev["id"]);
                    array_push($veriler[$key], $resimler);
                }
                $this->siteshowpage('evler.php', $veriler);
            }
            else{
                $this->siteshowpage('evler.php', false);
            }
        }
        else {
            $evler = $this->db->getHomes();

            if ($evler) {
                foreach ($evler as $key => $ev) {
                    $resimler = $this->db->getHomeImages($ev["id"]);
                    array_push($evler[$key], $resimler);
                }
                $this->siteshowpage('evler.php', $evler);
            } else {
                $this->siteshowpage('evler.php', false);
            }
        }

    }

    public function gethome($id)
    {
        $id = (int)$id;
        if (isset($id) and !empty($id) and is_int($id))
        {

            $result = $this->db->getHome($id);
            if ($result)
            {
                $resim = $this->db->getHomeImages($id);
                array_push($result,$resim);
                $this->siteshowpage('evdetay.php',$result);
            }
            else{
                $this->siteshowpage('evdetay.php',false);
            }
        }

    }

    public function Aindex()
    {
        $this->oturumkontrol();
        $result = $this->db->getHomes();
        if ($result) {

            $this->adminshowpage("evler.php",$result);
        }
        else{
            $this->adminshowpage("evler.php",false);
        }
    }

    public function AgetHome($id)
    {
        $this->oturumkontrol();
        $id = (int)$id;
        if (isset($id)) {
            $result = $this->db->getHome($id);
            $result2 = $this->db->getHomeImages($id);
            if ($result2) {
                $dizi = array($result,$result2);
            }else{
                $dizi = array($result,[]);
            }

            if ($result) {
                $this->adminshowpage("evguncelle.php",$dizi);
            }
            else{
                header("Location: ".$this->basedir."ev/Aindex");
                die();
            }
        }
        else{
            header("Location: ".$this->basedir."ev/Aindex");
            die();
        }
    }

    public function delete($id)
    {
        $this->oturumkontrol();
        if (isset($id)) {
            $id = (int)$id;
            $result = $this->db->delete($id);
            if ($result) {
                header("Location: ".$this->basedir."ev/Aindex");
                die();
            }
            else{
                header("Location: ".$this->basedir."ev/Aindex");
                die();
            }
        }
    }

    public function yeni()
    {
        $this->oturumkontrol();
        $this->adminshowpage("yeniev.php");
    }

    public function insert()
    {
        $this->oturumkontrol();
        if (isset($_POST)) {
            $baslik = filtre($_POST["baslik"]);
            $durum = filtre($_POST["durum"]);
            $ozellik = htmlspecialchars($_POST["ozellikler"],ENT_QUOTES);
            $aciklama = filtre($_POST["aciklama"]);
            $adres = filtre($_POST["adres"]);
            $fiyat = filtre($_POST["fiyat"]);
            if (isset($_FILES)) {
                $gelenresimler = $_FILES["resim"];

                $result = $this->db->insert($baslik,$durum,$ozellik,$aciklama,$adres,$fiyat,$gelenresimler);
                if ($result) {
                    header("Location: ".$this->basedir."ev/Aindex");
                    die();
                }
                else{
                    header("Location: ".$this->basedir."ev/Aindex");
                    die();
                }
            }else{
                header("Location: ".$this->basedir."ev/Aindex");
                die();
            }
        }
    }

    public function update($id)
    {
        $this->oturumkontrol();
        if (isset($id)) {
            $id = (int)$id;

            // genel bilgilerin güncellenecek kodları
            if (isset($_POST["form1"])) {
                $baslik = filtre($_POST["baslik"]);
                $durum = filtre($_POST["durum"]);
                $ozellikler = filtre($_POST["ozellikler"]);
                $aciklama = filtre($_POST["aciklama"]);
                $adres = filtre($_POST["adres"]);
                $fiyat = filtre($_POST["fiyat"]);

                $result = $this->db->updateGeneral($id,$baslik,$durum,$ozellikler,$aciklama,$adres,$fiyat);
                if ($result) {
                    header("Location: ".$this->basedir."ev/AgetHome/".$id);
                    die();
                }
                else{
                    header("Location: ".$this->basedir."ev/AgetHome/".$id);
                    die();
                }
            }

            // yeni bir resim eklemek istersek
            if (isset($_FILES["resim"])) {
                if (isset($_FILES["resim"])) {
                    $files = $_FILES["resim"];
                    $result = $this->db->insertImages($files,$id);
                    if ($result) {
                        header("Location: ".$this->basedir."ev/AgetHome/".$id);
                        die();
                    }
                    else{
                        header("Location: ".$this->basedir."ev/AgetHome/".$id);
                        die();
                    }
                }else{
                    header("Location: ".$this->basedir."ev/AgetHome/".$id);
                    die();
                }
            }

            // var olan resimi silmek istersek
            if (isset($_POST["form3"])) {
                if (isset($_POST["resimler"])) {
                    $resimler = $_POST["resimler"];

                    $result1 = $this->db->deleteImages($resimler);
                    if ($result1) {
                        header("Location: ".$this->basedir."ev/AgetHome/".$id);
                        die();
                    }else{
                        header("Location: ".$this->basedir."ev/AgetHome/".$id);
                        die();
                    }
                }
                else{
                    header("Location: ".$this->basedir."ev/AgetHome/".$id);
                    die();
                }
            }

            // eğer formdan bir veri gelmezse
            else{
                header("Location: ".$this->basedir."ev/AgetHome/".$id);
                die();
            }
        }
        else{
            header("Location: ".$this->basedir."ev/AgetHome/".$id);
            die();
        }
    }
}
?>