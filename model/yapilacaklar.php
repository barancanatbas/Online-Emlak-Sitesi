<?php
include_once 'model.php';


class Yapilacaklardb extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getir()
    {
        if (isset($_SESSION["kullanici"]))
        {
            try {
                $calisanid = (int)$_SESSION["kullanici"]["id"];
                $query =
                $sorgu = $this->con->prepare("select * from dbemlak.tblyapilacaklar where calisanFk =? and durum = ?");
                $sorgu->execute([$calisanid,0]);
                $kayitsay = $sorgu->rowCount();
                if ($kayitsay > 0)
                {
                    $veriler = $sorgu->fetchAll(PDO::FETCH_ASSOC);
                    return $veriler;
                }

            }catch (PDOException $e)
            {
                return false;
            }
        }
        else
        {
            header("Location: /emlak/login");
            die();
        }
    }

    public function insert($baslik,$icerik)
    {
        try {
            $calisanid = filtre($_SESSION["kullanici"]["id"]);

            $sorgu = $this->con->prepare("insert into dbemlak.tblyapilacaklar (title,content,calisanFk,createDate,durum) values (?,?,?,?,?)");
            $sorgu->execute([$baslik,$icerik,$calisanid,time(),0]);
            if ($sorgu) return true;
            else return false;

        }catch (PDOException $e)
        {
            return false;
        }
    }

    public function update($id)
    {
        try {
            $sorgu = $this->con->prepare("update dbemlak.tblyapilacaklar set durum = ? where id = ?");
            $sorgu->execute([1,$id]);
            if ($sorgu) return true;
            else return false;
        }catch (PDOException $e)
        {
            return false;
        }
    }
}



?>