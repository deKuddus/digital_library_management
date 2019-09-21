<?php
namespace App\Utility;

class Utility{

    public static function d($data){
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }

    public static function dd($data){
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
        die();
    }


    public static function redirect($data){
        header('Location:'.$data);

    }

    public static function validation($data)
    {

        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        $data = str_replace('"', "", $data);
        $data = str_replace("'", "", $data);
        return $data;

    }




}