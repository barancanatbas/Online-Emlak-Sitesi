<?php
include_once 'model.php';


class Kullanicidb extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUser($id)
    {
        $sorgu =$this->con->prepare("select * from dbemlak.tblcalisan where id = ?");
        $sorgu->execute([$id]);
        $kayitsay = $sorgu->rowCount();
        if ($kayitsay > 0) {
            $veri = $sorgu->fetch(PDO::FETCH_ASSOC);
            return $veri;
        }
        else{
            return false;
        }
    }

    public function getUsers()
    {
        $sorgu = $this->con->prepare("select u.id, u.ad ,u.soyad ,u.mail ,u.resim , k.kidem , u.cinsiyet from dbemlak.tblcalisan u inner join dbemlak.tblkidem k on u.kidemid = k.id");
        $sorgu->execute();
        $kayitsay =$sorgu->rowCount();
        if ($kayitsay > 0) {
            $veriler = $sorgu->fetchAll(PDO::FETCH_ASSOC);
            return $veriler;
        }
        else{
            return false;
        }
    }

    // güncelleme işlemleri

    public function guncellegenel($post)
    {
        $ad = filtre($post["ad"]);
        $soyad = filtre($post["soyad"]);
        $kuladi = filtre($post["kuladi"]);
        $telefon = filtre($post["telefon"]);
        $email = filtre($post["mail"]);

        $sorgu = $this->con->prepare("update dbemlak.tblcalisan set ad = ?,soyad = ?,kuladi = ?,telefon = ?,mail = ? where id = ?");
        $sorgu->execute(array($ad,$soyad,$kuladi,$telefon,$email,$_SESSION["kullanici"]["id"]));

        if ($sorgu) {
            $_SESSION["kullanici"]["ad"] = $ad;
            $_SESSION["kullanici"]["soyad"] = $soyad;
            $_SESSION["kullanici"]["mail"] = $email;
            return true;
        }
        else{
            return false;
        }
    }

    public function guncellesifre($post)
    {
        $sifre = md5(filtre($post["yenisifre1"]));
        $sorgu = $this->con->prepare("update dbemlak.tblcalisan set sifre = ? where id = ?");
        $sorgu->execute(array($sifre,$_SESSION["kullanici"]["id"]));
        if ($sorgu) {
            return true;
        }else{
            return false;
        }

    }

    public function guncelleresim($file)
    {
        $this->con->beginTransaction();
        $gelenresimtmp = $file["resim"]["tmp_name"];
        $uploadimageurl = "view/adminpanel/images/".uniqid().".png";

        $sorgu = $this->con->prepare("update dbemlak.tblcalisan set resim = ? where id = ?");
        $sorgu->execute(array($uploadimageurl,$_SESSION["kullanici"]["id"]));
        if ($sorgu) {
            if (move_uploaded_file($gelenresimtmp, $uploadimageurl)) {
                $eskiresim = $_SESSION["kullanici"]["resim"];
                unlink($eskiresim);
                $this->con->commit();
                $_SESSION["kullanici"]["resim"] = $uploadimageurl;
                return true;
            }
            else{
                $this->con->rollBack();
                return false;
            }
        }else{
            $this->con->rollBack();
            return false;
        }
    }

    // yeni kullanıcı

    public function getKidem()
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

    public function saveUser($post,$file)
    {
        $ad = filtre($post["ad"]);
        $soyad = filtre($post["soyad"]);
        $kuladi = filtre($post["kuladi"]);
        $email = filtre($post["mail"]);
        $sifre = md5(filtre($post["sifre1"]));
        $kidemid = filtre($post["kidem"]);
        $cinsiyet = filtre($post["cinsiyet"]);
        $telefon = filtre($post["telefon"]);

        $gelenresim = $file["resim"];
        $gelenresimtmp = $file["resim"]["tmp_name"];
        $gelenresimadi = $file["resim"]["name"];
        $uploadimageurl = "view/adminpanel/images/".uniqid().".png";

        $this->con->beginTransaction();

        $sorgu = $this->con->prepare("insert into dbemlak.tblcalisan (ad,soyad,telefon,mail,resim,kidemid,sifre,kuladi,cinsiyet) values (?,?,?,?,?,?,?,?,?)");
        $sorgu->execute([$ad,$soyad,$telefon,$email,$uploadimageurl,$kidemid,$sifre,$kuladi,$cinsiyet]);
        if ($sorgu) {
            if (move_uploaded_file($gelenresimtmp,$uploadimageurl)) {
                $this->con->commit();
                return true;
            }
            else{
                $this->con->rollBack();
                return false;
            }
        }else{
            $this->con->rollBack();
            return false;
        }
    }

    // kullanici silme

    public function deleteUser($id)
    {
        $sorgu = $this->con->prepare("delete from dbemlak.tblcalisan where id = ? ");
        $sorgu->execute(array($id));
        if ($sorgu) {
            return true;
        }
        else{
            return false;
        }
    }

}



//eski kodlar

/*



function kullanicigetir($id)
{
	global $con;

	$sorgu = $con->prepare("select * from dbemlak.tblcalisan where id = ?");
	$sorgu->execute([$id]);
	$kayitsay = $sorgu->rowCount();
	if ($kayitsay > 0) {
		$veri = $sorgu->fetch(PDO::FETCH_ASSOC);
		return $veri;
	}
	else{
		echo $id;
		die();
		return false;
	}
}

function tumkullanicigetir()
{
	global $con;

	$sorgu = $con->prepare("select u.id, u.ad ,u.soyad ,u.mail ,u.resim , k.kidem , u.cinsiyet from dbemlak.tblcalisan u inner join dbemlak.tblkidem k on u.kidemid = k.id");
	$sorgu->execute();
	$kayitsay =$sorgu->rowCount();
	if ($kayitsay > 0) {
		$veriler = $sorgu->fetchAll(PDO::FETCH_ASSOC);
		return $veriler;
	}
	else{
		echo "veri yok";
		die();
	}
}

// güncelleme işlemleri

function guncellegenel($post)
{
	global $con;

	$ad = filtre($post["ad"]);
	$soyad = filtre($post["soyad"]);
	$kuladi = filtre($post["kuladi"]);
	$telefon = filtre($post["telefon"]);
	$email = filtre($post["mail"]);

	$sorgu = $con->prepare("update dbemlak.tblcalisan set ad = ?,soyad = ?,kuladi = ?,telefon = ?,mail = ? where id = ?");
	$sorgu->execute(array($ad,$soyad,$kuladi,$telefon,$email,$_SESSION["kullanici"]["id"]));

	if ($sorgu) {
		$_SESSION["kullanici"]["ad"] = $ad;
		$_SESSION["kullanici"]["soyad"] = $soyad;
		$_SESSION["kullanici"]["mail"] = $mail;
		return true;
	}
	else{
		return false;
	}
}

function guncellesifre($post)
{
	global $con;

	$sifre = md5(filtre($post["yenisifre1"]));
	$sorgu = $con->prepare("update dbemlak.tblcalisan set sifre = ? where id = ?");
	$sorgu->execute(array($sifre,$_SESSION["kullanici"]["id"]));
	if ($sorgu) {
		return true;
	}else{
		return false;
	}

}

function guncelleresim($file)
{
	global $con;
	$user = kullanicigetir($_SESSION["kullanici"]["id"]);
	echo "<pre>";
	print_r($user);
	echo "</pre>";

	$con->beginTransaction();

	$gelenresim = $file["resim"];
	$gelenresimtmp = $file["resim"]["tmp_name"];
	$gelenresimadi = $file["resim"]["name"];
	$uploadimageurl = "view/adminpanel/images/".$gelenresimadi;


	$sorgu = $con->prepare("update dbemlak.tblcalisan set resim = ? where id = ?");
	$sorgu->execute(array($uploadimageurl,$_SESSION["kullanici"]["id"]));
	if ($sorgu) {
		if (move_uploaded_file($gelenresimtmp, $uploadimageurl)) {
			$eskiresim = $_SESSION["kullanici"]["resim"];
			unlink($eskiresim);
			$con->commit();
			$_SESSION["kullanici"]["resim"] = $uploadimageurl;
			return true;
		}
		else{
			return false;
		}
	}else{
		return false;
	}
}


// yeni kullanici oluşturma

function kidemgetir()
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
		echo "veri yok ya da bir hata var";
		die();
	}
}

function kullanicikaydet($post,$file)
{
	global $con;

	$ad = filtre($post["ad"]);
	$soyad = filtre($post["soyad"]);
	$kuladi = filtre($post["kuladi"]);
	$email = filtre($post["mail"]);
	$sifre = md5(filtre($post["sifre1"]));
	$kidemid = filtre($post["kidem"]);
	$cinsiyet = filtre($post["cinsiyet"]);
	$telefon = filtre($post["telefon"]);

	$gelenresim = $file["resim"];
	$gelenresimtmp = $file["resim"]["tmp_name"];
	$gelenresimadi = $file["resim"]["name"];
	$uploadimageurl = "view/adminpanel/images/".$gelenresimadi;

	$con->beginTransaction();

	$sorgu = $con->prepare("insert into dbemlak.tblcalisan (ad,soyad,telefon,mail,resim,kidemid,sifre,kuladi,cinsiyet) values (?,?,?,?,?,?,?,?,?)");
	$sorgu->execute([$ad,$soyad,$telefon,$email,$uploadimageurl,$kidemid,$sifre,$kuladi,$cinsiyet]);
	if ($sorgu) {
		if (move_uploaded_file($gelenresimtmp,$uploadimageurl)) {
			$con->commit();
			return true;
		}
		else{
			return false;
		}
	}else{
		return false;
	}

}

// kullanici silme

function kullanicisil($id)
{
	global $con;

	$sorgu = $con->prepare("delete from dbemlak.tblcalisan where id = ? ");
	$sorgu->execute(array($id));
	if ($sorgu) {
		return true;
	}
	else{
		false;
	}
}

*/
?>