<?php 
	    require_once __DIR__ . '/vendor/autoload.php';
    	$librarian = new Librarian; 
	        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST)){
			     /* echo"<pre>";
			      print_r($_POST);*/
			      $librarian->update($_POST);
    }

 ?>