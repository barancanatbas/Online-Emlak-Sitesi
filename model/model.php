<?php 
include_once 'ayar.php';

class database {
    // model ayarlarını kendine göre ayarla
    public $con;
    private $host="localhost;";
    protected string $dbname="dbemlak;";
    private $charset = "UTF8;";
    private $username = "root";
    private $pass = "";

    public function __construct()
    {
        try {
            $this->con = new PDO("mysql:".$this->host."dbname=".$this->dbname."charset=".$this->charset,$this->username,$this->pass);
        }catch (PDOException $e)
        {
            die("Sunucumuzda Şuanda Bakım Yapılmaktadır Lütfen Daha Sonradan Gelin : ".$e->getMessage());
        }
    }
    public function closecon()
    {
        $this->con = null;
    }
}
 ?>