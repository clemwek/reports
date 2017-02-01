<?php
require_once("initialize.php");

class Token {
    public static function generate () {
        return Session::put ('tokenName', md5(uniqid()));
    }
    
    public static function check ($token) {
        $tokenName = $_SESSION['tokenName'];
        
        if (Session::exits ('tokenName') && $token === $_SESSION['tokenName']) {
            Session::delete($tokenName);
            return true;
        }
        return false;
    }
}

?>