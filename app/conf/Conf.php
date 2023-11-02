<?php

class Conf{

private $dsn;
private $dbuser;
private $dbpass;
private $dbname;
public $con;

#sql connection 
public function connect(){
    
    $this->dsn = "mysql:host=127.0.0.1;port=3306;dbname=mvc";
    $this->dbuser = "root";
    $this->dbpass = "root";
    $this->charset = "utf8mb4";

    try {
        
        $this->con = new PDO($this->dsn, $this->dbuser, $this->dbpass);
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->con->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
        return $this->con;

    } catch (\Throwable $th) {
        //throw $th;
        echo $th->getMessage();
    }
  }

#sql disconnection
public function disconnect(){
    $this->con = null;
}

}
