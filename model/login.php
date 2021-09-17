<?php
include "model.php";

class Logindb extends database{

    public function loginkontroldb($kuladi,$sifre)
    {
        $sorgu = $this->con->prepare("select u.id,u.ad,u.soyad,u.mail,u.resim,k.kidem from dbemlak.tblcalisan u inner join dbemlak.tblkidem k on u.kidemid = k.id where kuladi = ? AND sifre = ?");

        $sorgu->execute(array($kuladi,$sifre));
        $kayitsay = $sorgu->rowCount();
        if ($kayitsay > 0) {
            $veri = $sorgu->fetch(PDO::FETCH_ASSOC);
            return $veri;
        }else{
            return false;
        }
    }

}

// eski kodlar

function loginkontroldb($kuladi,$sifre)
{
	global $con;

	$sorgu = $con->prepare("select u.id,u.ad,u.soyad,u.mail,u.resim,k.kidem from dbemlak.tblcalisan u inner join dbemlak.tblkidem k on u.kidemid = k.id where kuladi = ? AND sifre = ?");

	$sorgu->execute(array($kuladi,$sifre));
	$kayitsay = $sorgu->rowCount();
	if ($kayitsay > 0) {
		$veri = $sorgu->fetch(PDO::FETCH_ASSOC);
		return $veri;
	}else{
		return false;
	}

}



 ?>