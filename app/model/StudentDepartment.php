<?php 


class StudentDepartment extends Database
{
	public  function index()
	{
		$selectQuery = "SELECT * FROM std_department";
    	$STH = $this->DBH->query($selectQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetchAll();
         
	}


	public  function batch()
	{
		$selectQuery = "SELECT * FROM std_batch";
    	$STH = $this->DBH->query($selectQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetchAll();
         
	}
}