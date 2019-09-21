<?php 
    require_once __DIR__ . '/../vendor/autoload.php';
    $request = new BookRequest;

	if(isset($_GET['requestid']) && isset($_GET['studentId']))
	{
		$isbn = $_GET['requestid'];
		$studentId = $_GET['studentId'];
		$request->store($isbn,$studentId);
	}

	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST)){
      $confirm = $request->confirmRequest($_POST);
    }

 ?>