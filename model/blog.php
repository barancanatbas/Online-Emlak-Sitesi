<?php
include_once 'model.php';

class Blogdb extends database {

    public function __construct()
    {
        parent::__construct();
    }

    public function getImages($id)
    {
        try {
            $query = $this->con->prepare("select * from dbemlak.tblresimler where blogid = ?");
            $query->execute(array($id));
            $kayitsay = $query->rowCount();
            if ($kayitsay > 0)
            {
                $Images = $query->fetchAll(PDO::FETCH_ASSOC);
                return $Images;
            }
            else{
                return "resimyok";
            }
        }catch (PDOException $e)
        {
            return false;
        }
    }

    public function bloglar()
    {
        $sorgu = $this->con->prepare("select tblblog.* , tblcalisan.ad,tblcalisan.soyad from dbemlak.tblblog INNER JOIN dbemlak.tblcalisan ON tblblog.calisanid = tblcalisan.id;");
        $sorgu->execute();
        $kayitsay = $sorgu->rowCount();
        if ($kayitsay > 0) {
            $veriler = $sorgu->fetchAll(PDO::FETCH_ASSOC);
            return $veriler;
        }else{
            return false;
        }
    }

    public function getBlog($id)
    {
        try {
            $sorgu = $this->con->prepare("select tblblog.* , tblcalisan.ad,tblcalisan.soyad from dbemlak.tblblog INNER JOIN dbemlak.tblcalisan ON tblblog.calisanid = tblcalisan.id where tblblog.id = ?");
            $sorgu->execute(array($id));
            $kayitsay = $sorgu->rowCount();
            if ($kayitsay > 0) {
                $resimler = $this->getBlogImages($id);
                $veriler = $sorgu->fetch(PDO::FETCH_ASSOC);
                array_push($veriler,$resimler);
                return $veriler;
            }else{
                return false;
            }

        } catch (PDOException $e) {
            return false;
        }
    }

    public function getBlogImages($id)
    {
        try {
            $sorgu = $this->con->prepare("select * from dbemlak.tblresimler where blogid = ?");
            $sorgu->execute([$id]);
            $kayitsay = $sorgu->rowCount();
            if($kayitsay > 0)
            {
                $veriler = $sorgu->fetchAll(PDO::FETCH_ASSOC);
                return $veriler;
            }
            else return false;
        }catch (PDOException $e)
        {
            return false;
        }
    }

    public function deleteImagesById($resimler,$blogid)
    {
        try {
            $veriler = $this->getBlogImages($blogid);

            $this->con->beginTransaction();
            foreach ($resimler as $resim) {
                $query = $this->con->prepare("delete from dbemlak.tblresimler where id=?");
                $query->execute(array($resim));
                if (!$query) {
                    $this->con->rollBack();
                    return false;
                }
            }
            foreach ($veriler as $veri)
            {
                foreach ($resimler as $resim)
                {
                    if ($veri["id"] == $resim)
                    {
                        unlink($veri["resimsrc"]);
                    }
                }
            }
            $this->con->commit();
            return true;
        }catch (PDOException $e)
        {
            return false;
        }
    }

    public function deleteImages($blogid)
    {
        try {
            $query = $this->con->prepare("delete from dbemlak.tblresimler where blogid=?");
            $query->execute(array($blogid));
            if ($query)
            {
                return true;
            }
            else{
                return false;
            }
        }catch (PDOException $e)
        {
            return false;
        }
    }

    public function insertImages($resimler,$blogid)
    {
        $resim_dir = "view/images/";
        $sayac=0;
        for ($i=0; $i < count($resimler["name"]); $i++) {
            $resimad = $resimler["name"][$i];
            $resimTMP = $resimler["tmp_name"][$i];
            $uri = $resim_dir.uniqid().".png";
            $result = move_uploaded_file($resimTMP, $uri);
            if (!$result) {
                $sayac++;
            }else{
                $sorgu = $this->con->prepare("insert into dbemlak.tblresimler (resimsrc,blogid) values (?,?)");
                $sorgu->execute(array($uri,$blogid));
                if (!$sorgu) {
                   return false;
                }
            }
        }
        if ($sayac > 0) {
            return false;
        }else{
            return true;
        }
    }

    public function insert($baslik,$metin,$resimler=false)
    {
        try {
            $this->con->beginTransaction();
            $sorgu = $this->con->prepare("insert into dbemlak.tblblog (baslik,yazi,tarih,calisanid) values (?,?,?,?)");
            $sorgu->execute(array($baslik,$metin,time(),$_SESSION["kullanici"]["id"]));
            if ($sorgu) {
                if($resimler)
                {
                    $blogid = $this->con->lastInsertId();
                    $result = $this->insertImages($resimler,$blogid);
                    if ($result)
                    {
                        $this->con->commit();
                        return true;
                    }
                    else{
                        $this->con->rollBack();
                        return false;
                    }
                }
                return true;
            }else{
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $resimler = $this->getImages($id);
            $this->con->beginTransaction();
            $sorgu = $this->con->prepare("delete from dbemlak.tblblog where id = ?");
            $sorgu->execute(array($id));
            if ($sorgu) {
                if ($resimler == true)
                {

                    $result = $this->deleteImages($id);
                    if($result)
                    {
                        foreach ($resimler as $resim)
                        {
                            if (!unlink($resim["resimsrc"]))
                            {
                                echo "burda hata var";
                                die();
                                return false;
                            }
                        }
                        $this->con->commit();
                        return true;
                    }
                    else $this->con->rollBack(); return false;
                }
                elseif ($resimler === "resimyok")
                {
                    $this->con->commit();
                    return true;
                }
                else {
                    $this->con->rollBack();
                    return true;
                }
            }else{
                $this->con->rollBack();
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function update($baslik,$yazi,$id)
    {
        try {

            $sorgu = $this->con->prepare("update dbemlak.tblblog set baslik=?,yazi=? where id =?");
            $sorgu->execute([$baslik,$yazi,$id]);
            if ($sorgu)
            {
                return true;
            }else return false;

        }catch (PDOException $e)
        {
            return false;
        }
    }

}

?>