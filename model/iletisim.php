<?php
include "model.php";

class Iletisimdb extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function send($name,$email,$mesaj,$phone=0)
    {
        try {
            $sorgu = $this->con->prepare("insert into dbemlak.tbliletisim (adsoyad,mail,telefon,mesaj,tarih) values (?,?,?,?,?)");
            $sorgu->execute(array($name,$email,$phone,$mesaj,time()));
            if ($sorgu) return true;
            else return false;
        }
        catch (PDOException $e){return false;}
    }

    public function getIletisimler()
    {
        try {
            $sorgu = $this->con->prepare("select * from dbemlak.tbliletisim where goruldu = ?");
            $sorgu->execute([0]);
            $kayitsay = $sorgu->rowCount();
            if ($kayitsay > 0)
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

    public function getIletisimlerokunan()
    {
        try {
            $sorgu = $this->con->prepare("select * from dbemlak.tbliletisim where goruldu = ?");
            $sorgu->execute([1]);
            $kayitsay = $sorgu->rowCount();
            if ($kayitsay > 0)
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

    public function getIletisim($id)
    {
        try {
            $sorgu = $this->con->prepare("select * from dbemlak.tbliletisim where id = ?");
            $sorgu->execute([$id]);
            $kayitsay = $sorgu->rowCount();
            if ($kayitsay > 0)
            {
                $veri = $sorgu->fetch(PDO::FETCH_ASSOC);
                return $veri;
            }else return false;

        }catch (PDOException $e)
        {
            return false;
        }
    }

    public function updateDurum($id)
    {
        try {
            $sorgu = $this->con->prepare("update dbemlak.tbliletisim set goruldu =? where id = ?");
            $sorgu->execute(array(1,$id));
            if ($sorgu)
            {
                return true;
            }
            else return false;

        }catch (PDOException $e)
        {
            return false;
        }
    }
}


 ?>