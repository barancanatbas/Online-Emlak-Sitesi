<?php 
// hakkında kısmında olan tüm model methodları burada olacak
include_once 'model.php';


class Hakkindadb extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAbout()
    {
        try {
            $sorgu = $this->con->prepare("select * from dbemlak.tblhakkimizda limit 1");
            $sorgu->execute();
            $kayitsay = $sorgu->rowCount();
            if ($kayitsay > 0)
            {
                $veri = $sorgu->fetch(PDO::FETCH_ASSOC);
                return $veri;
            }
            else return false;
        }catch (PDOException $e)
        {
            return false;
        }
    }

    public function update($yazi)
    {
        try {
            $sorgu = $this->con->prepare("update dbemlak.tblhakkimizda set yazi=?");
            $sorgu->execute([$yazi]);
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