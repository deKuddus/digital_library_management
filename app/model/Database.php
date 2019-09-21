<?php

//use PDO,PDOException;
class Database
{
   public $DBH;
   private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
    public function __construct()
    {
       try{
           $this->DBH = new PDO("mysql:host=localhost;dbname=library", "kuddus", "kuddus2200",$this->options);

           //echo "Database connection successful";
       }catch(PDOException $error){

             echo $error->getMessage();
       }
    }
}