<?php 
include_once 'model.php';

class Evdb extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getHomes()
    {
        try {
            $sorgu = $this->con->prepare("select * from dbemlak.tblev");
            $sorgu->execute();
            $kayitsay = $sorgu->rowCount();
            if ($kayitsay > 0) {
                $values = $sorgu->fetchAll(PDO::FETCH_ASSOC);

                return $values;
            }
            else{
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getHome($id)
    {
        try {
            $sorgu = $this->con->prepare("select * from dbemlak.tblev where id = ?");
            $sorgu->execute(array($id));
            if ($sorgu) {
                $veriler = $sorgu->fetch(PDO::FETCH_ASSOC);
                if ($veriler) {
                    return $veriler;
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getHomeImages($id)
    {
        try {
            $sorgu = $this->con->prepare("select * from dbemlak.tblresimler where evid=?");
            $sorgu->execute(array($id));
            if ($sorgu) {
                $veriler = $sorgu->fetchAll(PDO::FETCH_ASSOC);
                if ($veriler) {
                    return $veriler;
                }
                else{
                    return false;
                }
            }else{
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getHomesByFiltre($max,$min,$durum)
    {
        try {
            $query ="SELECT * FROM dbemlak.tblev where fiyat >".$min." and fiyat <".$max." and durum LIKE '%".$durum."%'";
            $sorgu = $this->con->query($query);
            if ($sorgu)
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

    public function delete($id)
    {
        try {
            $sorgu = $this->con->prepare("select * from dbemlak.tblresimler where evid =?");
            $sorgu->execute(array($id));
            $veriler = $sorgu->fetchAll(PDO::FETCH_ASSOC);
            $this->con->beginTransaction();
            $sorgu2 = $this->con->prepare("delete from dbemlak.tblresimler where evid=?");
            $sorgu2->execute(array($id));
            if($sorgu2)
            {
                $sorgu3 = $this->con->prepare("delete from dbemlak.tblev where id =?");
                $sorgu3->execute(array($id));
                if ($sorgu3)
                {
                    foreach ($veriler as $veri)
                    {
                        if (!unlink($veri["resimsrc"]))
                        {
                            $this->con->rollBack();
                            $con = null;
                            return false;
                        }
                    }
                    $this->con->commit();
                    $con = null;
                    return true;
                }else{
                    $this->con->rollBack();
                    $con = null;
                    return false;
                }
            }
            else{
                $this->con->rollBack();
                $con = null;
                return false;
            }

        } catch (PDOException $e) {
            return false;
        }
    }

    public function insertImages($resimler,$evid)
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
                $sorgu = $this->con->prepare("insert into dbemlak.tblresimler (resimsrc,evid) values (?,?)");
                $sorgu->execute(array($uri,$evid));
                if (!$sorgu) {
                    die("resim veri tabanına eklenmedi knkns");
                }
            }
        }
        if ($sayac > 0) {
            return false;
        }else{
            return true;
        }
    }

    public function deleteImages($resimler)
    {
        try {
            foreach ($resimler as $resim)
            {
                $id = (int)$resim;
                $sorgu = $this->con->prepare("select * from dbemlak.tblresimler where id =?");
                $sorgu->execute(array($id));
                $kayitsay = $sorgu->rowCount();
                if ($kayitsay > 0)
                {
                    $veri = $sorgu->fetch(PDO::FETCH_ASSOC);
                    $this->con->beginTransaction();
                    $sorgu2 = $this->con->prepare("delete from dbemlak.tblresimler where id =?");
                    $sorgu2->execute(array($veri["id"]));
                    if($sorgu2)
                    {
                        if (unlink($veri["resimsrc"])){
                            $this->con->commit();
                        }else{
                            echo "resim silinmedi";
                            $this->con->rollBack();
                            return false;
                        }
                    }else{
                        echo "hata var";
                        $this->con->rollBack();
                        return false;
                    }
                }
            }
            return true;
        }
        catch (PDOException $e)
        {
            return false;
        }
    }

    public function insert($baslik,$durum,$ozellik,$aciklama,$adres,$fiyat,$gelenresimler=false)
    {
        try {
            $this->con->beginTransaction();
            $sorgu = $this->con->prepare("insert into dbemlak.tblev (baslik,durum,ozellikler,aciklama,fiyat,adres) values (?,?,?,?,?,?)");
            $sorgu->execute([$baslik,$durum,$ozellik,$aciklama,$fiyat,$adres]);
            if ($sorgu) {
                if ($gelenresimler) {
                    $evid = $this->con->lastInsertId();
                    $deger =$this->insertImages($gelenresimler,$evid);
                    if ($deger === true) {
                        $this->con->commit();
                        return true;
                    }
                    else{
                        $this->con->rollBack();
                        return false;
                    }
                }
            }else{
                return false;
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function updateGeneral($id,$baslik,$durum,$ozellikler,$aciklama,$adres,$fiyat)
    {
        try {
            $sorgu = $this->con->prepare("update dbemlak.tblev set baslik =?,durum =?,ozellikler =?,aciklama =?,fiyat =?,adres =? where id = ?");
            $sorgu->execute(array($baslik,$durum,$ozellikler,$aciklama,$fiyat,$adres,$id));
            if ($sorgu) {return true;}
            else{return false;}
        } catch (PDOException $e) {
            return false;
        }
    }

}

// eski kodlar
/*
function evlerigetir()
{
	global $con;
	try {
		$sorgu = $con->prepare("select * from dbemlak.tblev");
		$sorgu->execute();
		$kayitsay = $sorgu->rowCount();
		if ($kayitsay > 0) {
			$values = $sorgu->fetchAll(PDO::FETCH_ASSOC);
			return $values;
		}
		else{
			return false;
		}
	} catch (PDOException $e) {
		echo $e->getMessage();
		die();
	}
}

function sildb($id)
{
	global $con;
	try {
	    $sorgu = $con->prepare("select * from dbemlak.tblresimler where evid =?");
	    $sorgu->execute(array($id));
	    $veriler = $sorgu->fetchAll(PDO::FETCH_ASSOC);
	    $con->beginTransaction();
	    $sorgu2 = $con->prepare("delete from dbemlak.tblresimler where evid=?");
	    $sorgu2->execute(array($id));
	    if($sorgu2)
        {
            $sorgu3 = $con->prepare("delete from dbemlak.tblev where id =?");
            $sorgu3->execute(array($id));
            if ($sorgu3)
            {
                foreach ($veriler as $veri)
                {
                    if (!unlink($veri["resimsrc"]))
                    {
                        $con->rollBack();
                        $con = null;
                        return false;
                    }
                }
                $con->commit();
                $con = null;
                return true;
            }else{
                $con->rollBack();
                $con = null;
                return false;
            }
        }
	    else{
	        $con->rollBack();
	        $con = null;
	        return false;
        }

	} catch (PDOException $e) {
		echo $e->getMessage();
		die();
	}
}

function kaydet($baslik,$durum,$ozellik,$aciklama,$adres,$fiyat,$gelenresimler=false)
{
	global $con;
	try {
		$con->beginTransaction();
		$sorgu = $con->	prepare("insert into dbemlak.tblev (baslik,durum,ozellikler,aciklama,fiyat,adres) values (?,?,?,?,?,?)");
		$sorgu->execute([$baslik,$durum,$ozellik,$aciklama,$fiyat,$adres]);
		if ($sorgu) {
			if ($gelenresimler) {
				$evid = $con->lastInsertId();
				$deger = resimekle($gelenresimler,$evid);
				if ($deger === true) {
					$con->commit();
					return true;
				}
				else{
					$con->rollBack();
					return false;
				}
			}
		}else{
			return false;
		}

	} catch (PDOException $e) {
		echo $e->getMessage();
		die();
	}

}

function resimekle($resimler,$evid)
{
	global $con;
	$resim_dir = "view/images/";
	$sayac=0;
	for ($i=0; $i < count($resimler["name"]); $i++) { 
		$resimad = $resimler["name"][$i];
		$resimTMP = $resimler["tmp_name"][$i];
		$result = move_uploaded_file($resimTMP, $resim_dir.$resimad);
		if (!$result) {
			$sayac++;
		}else{
			$sorgu = $con->prepare("insert into dbemlak.tblresimler (resimsrc,evid) values (?,?)");
			$sorgu->execute(array($resim_dir.$resimad,$evid));
			if (!$sorgu) {
				die("resim veri tabanına eklenmedi knkns");
			}
		}
	}
	if ($sayac > 0) {
		die($sayac." adet fotoğraflar eklenmedi");
	}else{
		return true;
	}
}

function evgetirdb($id)
{
	global $con;
	try {

		$sorgu = $con->prepare("select * from dbemlak.tblev where id = ?");
		$sorgu->execute(array($id));
		if ($sorgu) {
			$veriler = $sorgu->fetch(PDO::FETCH_ASSOC);
			if ($veriler) {
				return $veriler;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
		
	} catch (PDOException $e) {
		return false;	
	}
}

function evresimgetirdb($id)
{
	global $con;

	try {
		
		$sorgu = $con->prepare("select * from dbemlak.tblresimler where evid=?");
		$sorgu->execute(array($id));
		if ($sorgu) {
			$veriler = $sorgu->fetchAll(PDO::FETCH_ASSOC);
			if ($veriler) {
				return $veriler;
			}
			else{
				return false;
			}
		}else{
			return false;
		}

	} catch (PDOException $e) {
		return false;
	}
}

function genelguncelle($id,$baslik,$durum,$ozellikler,$aciklama,$adres,$fiyat)
{
	global $con;

	try {
		$sorgu = $con->prepare("update dbemlak.tblev set baslik =?,durum =?,ozellikler =?,aciklama =?,fiyat =?,adres =? where id = ?");
		$sorgu->execute(array($baslik,$durum,$ozellikler,$aciklama,$fiyat,$adres,$id));
		if ($sorgu) {
			return true;
		}
		else{
			return false;
		}
	} catch (PDOException $e) {
		die("bir sorgu hatası var");
		return false;
	}
}

function resimsildb($resimler)
{
	global $con;
    try {
        foreach ($resimler as $resim)
        {
            $id = (int)$resim;
            $sorgu = $con->prepare("select * from dbemlak.tblresimler where id =?");
            $sorgu->execute(array($id));
            $kayitsay = $sorgu->rowCount();
            if ($kayitsay > 0)
            {
                $veri = $sorgu->fetch(PDO::FETCH_ASSOC);
                $con->beginTransaction();
                $sorgu2 = $con->prepare("delete from dbemlak.tblresimler where id =?");
                $sorgu2->execute(array($veri["id"]));
                if($sorgu2)
                {
                    if (unlink($veri["resimsrc"])){
                        $con->commit();
                    }else{
                        echo "resim silinmedi";
                        $con->rollBack();
                        return false;
                    }
                }else{
                    echo "hata var";
                    $con->rollBack();
                    return false;
                }
            }
        }
        return true;
    }
    catch (PDOException $e)
    {
        die("try catch hatası var");
        return false;
    }

}

*/

?>