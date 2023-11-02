<?php
 
class Model extends Conf{


public function __construct() {
    $this->connect();
}


#login 
public function checkLogin($username,$password){

    try {
        
        $sql = "SELECT username,password FROM users WHERE username = ? AND password = ? LIMIT 1";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue("username", $username);
        $stmt->bindValue("password", $password);
        $stmt->execute();
        $stmt->store_result();
        $row = $stmt->fetchAll();
        if(mysqli_num_rows($row) > 0){
            return true;
            exit; // if user exist 
        }

    } catch (\Throwable $th) {
        //throw $th;
        echo $th->getMessage();
    }
   
}

#register
public function checkRegister($username,$password){

    try {

        //echo $username . " " . $password;
        
        $sql = "INSERT INTO users (username,password)VALUES('$username','$password')";
        $result = $this->con->exec($sql);
        // $result->bindValue("username",$username);
        // $result->bindValue("password",$password);
        // if($result->execute()){
        // echo "Regisgtration steve";
        // }// else throw exception

        echo "One row inserted";

    } catch (\Throwable $th) {
        //throw $th;
        echo $th->getMessage();
    }
   
}

function sec_session_start() {
    $session_name = 'sec_session_id';   // Set a custom session name
    $secure = SECURE;
    // This stops JavaScript being able to access the session id.
    $httponly = true;
    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"], 
        $cookieParams["domain"], 
        $secure,
        $httponly);
    // Sets the session name to the one set above.
    session_name($session_name);
    session_start();            // Start the PHP session 
    session_regenerate_id(true);    // regenerated the session, delete the old one. 
}




}