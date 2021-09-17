<?php 
session_start();
ob_start();
date_default_timezone_set('Europe/Istanbul');
$basedir = "/emlak/"; // eğer bir klasör altında ile onun adını gir

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$basemail = ""; // mail adresi
$basemailpass = ''; // şifre



function filtre($deger){
	$bir = trim($deger);
	$iki = strip_tags($bir);
	$uc = htmlspecialchars($iki,ENT_QUOTES);
	return $uc;
}

function filtrecoz($deger)
{
	$bir = htmlspecialchars_decode($deger,ENT_QUOTES);
	return $bir;
}

function mailGonder($gelenmail,$gelenkonu,$gelenadsoyad,$gelenmesaj)
{
    require 'lib/PHPMailer/PHPMailer/src/Exception.php';
    require 'lib/PHPMailer/PHPMailer/src/PHPMailer.php';
    require 'lib/PHPMailer/PHPMailer/src/SMTP.php';
    global $basemail,$basemailpass;

    $mail = new PHPMailer(true);
    try {
        $mail->charSet = "UTF8";
        //Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $basemail;
        $mail->Password = $basemailpass;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->SMTPOptions = array(
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ],
        );
        //Alıcılar
        $mail->setFrom($basemail, 'Khanjer Emlak'); // kimden gittiği
        $mail->addAddress($gelenmail); // kime gittiği
        $mail->addReplyTo($basemail, 'Khanjer Emlak'); // yanıtlamak istediğinde nereye atıağı

        // içerik
        $mail->isHTML(true);
        $mail->Subject = $gelenkonu; #
        $mail->Body    =filtrecoz($gelenmesaj);
        $mail->send();
        return true;

    } catch (Exception $e) {
        return false;
    }


}


 ?>