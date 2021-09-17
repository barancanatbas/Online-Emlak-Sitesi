<?php
include_once("model/blog.php");
include_once 'controller.php';

class Blog extends MainController{
    private $db;
    public function __construct()
    {
        $this->db = new Blogdb();
    }

    public function index()
    {
        $result = $this->db->bloglar();
        foreach ($result as $key => $veri)
        {
            $id = $veri["id"];
            $blogresimler =$this->db->getBlogImages($id);
            array_push($result[$key],$blogresimler);
        }

        if ($result) {
            $this->siteshowpage("bloglar.php",$result);
        }
        else{
            header("Location : ".$this->basedir."yonetim");
            die();
        }
    }

    public function Detay($id)
    {
        $id = (int)$id;
        $result = $this->db->getBlog(filtre($id));
        if ($result) {
            $this->siteshowpage("blogdetay.php",$result);
        }
        else{
            header("Location: ".$this->basedir."yonetim/no");
            die();
        }
    }

    public function Aindex()
    {
        $this->oturumkontrol();
        $result = $this->db->bloglar();
        foreach ($result as $key => $veri)
        {
            $id = $veri["id"];
            $blogresimler =$this->db->getBlogImages($id);
            array_push($result[$key],$blogresimler);
        }
        if ($result) {
            $this->adminshowpage("bloglar.php",$result);
        }
        else{
            $this->adminshowpage("bloglar.php",false);
        }
    }

    public function yeni()
    {
        $this->oturumkontrol();
        $this->adminshowpage("yeniblog.php");
    }

    public function insert()
    {
        $this->oturumkontrol();
        if (isset($_POST) and isset($_FILES)) {
            $baslik = filtre($_POST["baslik"]);
            $metin = htmlspecialchars($_POST["yazi"],ENT_QUOTES);
            $resimler = $_FILES["resim"];

            $result = $this->db->insert($baslik,$metin,$resimler);
            if ($result) {
                header("Location:".$this->basedir."blog/Aindex");
                die();
            }
            else{
                header("Location:".$this->basedir."blog/Aindex");
                die();
            }
        }
    }

    public function delete($id)
    {
        $this->oturumkontrol();
        if (isset($id))
        {
            $id = (int)$id;
            $result = $this->db->delete($id);
            if ($result) {
                header("Location:".$this->basedir."blog/Aindex");
                die();
            }
            else{
                header("Location:".$this->basedir."blog/Aindex");
                die();
            }
        }
    }

    public function AgetBlog($id)
    {
        $this->oturumkontrol();
        if (isset($id)) {
            $id = (int)$id;
            $result = $this->db->getBlog(filtre($id));
            $result2 = $this->db->getBlogImages(filtre($id));
            if ($result2) $dizi = array($result,$result2);
            else $dizi = array($result,[]);
            if ($result) {
                $this->adminshowpage("blogdetay.php", $dizi);
            } else {
                header("Location:".$this->basedir."blog/Aindex");
                die();
            }
        }
    }

    public function update($id)
    {
        $this->oturumkontrol();
        if (isset($id))
        {
            $id = filtre($id);
            if (isset($_POST["formResimSil"]))
            {
                $resimler = $_POST["resimler"];
                $result = $this->db->deleteImagesById($resimler,$id);
                if ($result)
                {
                    header("Location: ".$this->basedir."blog/AgetBlog/".$id."/yes");
                    die();
                }
                else{
                    header("Location: ".$this->basedir."blog/AgetBlog/".$id."/no");
                    die();
                }
            }
            if(isset($_POST["formResimEkle"]) and isset($_FILES["resim"]))
            {
                $resimler = $_FILES["resim"];
                $result2 = $this->db->insertImages($resimler,$id);
                if ($result2)
                {
                    header("Location: ".$this->basedir."blog/AgetBlog/".$id."/yes");
                    die();
                }
                else{
                    header("Location: ".$this->basedir."blog/AgetBlog/".$id."/no");
                    die();
                }
            }
            if (isset($_POST["formGenelGuncelle"]))
            {
                $baslik = filtre($_POST["baslik"]);
                $yazi = htmlentities($_POST["yazi"],ENT_QUOTES);
                $result = $this->db->update($baslik,$yazi,$id);
                if ($result)
                {
                    header("Location: ".$this->basedir."blog/AgetBlog/".$id."/yes");
                    die();
                }
                else{
                    header("Location: ".$this->basedir."blog/AgetBlog/".$id."/no");
                    die();
                }
            }
            else{
                header("Location: ".$this->basedir."blog/AgetBlog/".$id."/no");
                die();
            }
        }
        else{
            header("Location: ".$this->basedir."yonetim-bloglar/no");
            die();
        }
    }

}

?>