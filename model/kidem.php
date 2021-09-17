<?php 
include_once 'model.php';

class Kidemdb extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getKidemler()
    {
        $sorgu = $this->con->prepare("select * from dbemlak.tblkidem");
        $sorgu->execute();
        $kayitsay = $sorgu->rowCount();
        if ($kayitsay > 0) {
            $veriler = $sorgu->fetchAll(PDO::FETCH_ASSOC);
            return $veriler;
        }
        else{
            return false;
        }
    }

    public function insert($gelenveri)
    {
        try {
            $sorgu = $this->con->prepare("insert into  dbemlak.tblkidem (kidem) values (?)");
            $sorgu->execute(array($gelenveri));
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $sorgu = $this->con->prepare("delete from dbemlak.tblkidem where id = ?");
            $sorgu->execute(array($id));
            return true;
        } catch (PDOException $e) {return false;}
    }
}




function kidemlerigetir()
{
	global $con;

	$sorgu = $con->prepare("select * from dbemlak.tblkidem");
	$sorgu->execute();
	$kayitsay = $sorgu->rowCount();
	if ($kayitsay > 0) {
		$veriler = $sorgu->fetchAll(PDO::FETCH_ASSOC);
		return $veriler;
	}
	else{
		return false;
	}
}

function ekle($gelenveri)
{
	try {
		global $con;

		$sorgu = $con->prepare("insert into  dbemlak.tblkidem (kidem) values (?)");
		$sorgu->execute(array($gelenveri));
		return true;
	} catch (PDOException $e) {
		echo "hata var : ".$e->getMessage();
		return false;
	}	
}


function verisil($id)
{
	try {
		global $con;

		$sorgu = $con->prepare("delete from dbemlak.tblkidem where id = ?");
		$sorgu->execute(array($id));
		return true;
	} catch (PDOException $e) {
		echo "bir hata var silinemedi hata vt de ".$e->getMessage();
		die();
	}

}

?>