<?php

use App\Utility\Utility;
class Session
{
    public  static  function sessioninit(){
      session_start();

    }
    public  static function set($key,$value){

        $_SESSION[$key] = $value;
    }
    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        else{
            return false;
        }
    }


    public static function isLoggedIn(){
        self::sessioninit();
        if(self::get("librarianlogin") == true OR self::get("studentlogin") == true){
             Utility::redirect("index.php");
        }
    }

    public static function notIsLoggedIn(){
        self::sessioninit();
        if(self::get("librarianlogin") == false && self::get("studentlogin") == false){
             Utility::redirect("login.php");
        }
    }





    public static function sessionDestroy(){

        session_destroy();
        Utility::redirect("login.php");
    }

 
}