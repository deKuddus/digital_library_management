<?php 
use App\Utility\Utility;
class BookRequest extends Database
{

	public function index()
	{
		$selectQuery = "SELECT * FROM books_request";
    	$STH = $this->DBH->query($selectQuery);
    	$STH->setFetchMode(PDO::FETCH_OBJ);
    	return $STH->fetchAll();
	}

	public function getHiredBookList()
	{
		$selectQuery = "SELECT * FROM books_request_confirm";
    	$STH = $this->DBH->query($selectQuery);
    	$STH->setFetchMode(PDO::FETCH_OBJ);
    	return $STH->fetchAll();
	}


 
	public function store($isbn,$studentId)
	{
		$book_data = $this->bookByIsbn($isbn);
		$student_data = $this->studentById($studentId);

		foreach ($book_data as $singleBookData) {}
		foreach ($student_data as $singleStudentData) {}

		$sql = "INSERT INTO books_request (student_id,student_department,student_batch,book_isbn,book_tittle,book_author)VALUES(?,?,?,?,?,?)";
		$dataArray = array($singleStudentData->student_id,$singleStudentData->student_department,$singleStudentData->student_batch,$singleBookData->book_isbn,$singleBookData->book_tittle,$singleBookData->book_author);
		$inserted_rows = $this->DBH->prepare($sql)->execute($dataArray);
		if($inserted_rows)
		{
			Utility::redirect("../student-profile.php");
		}
		else
		{
			return $message = "<p class= 'text-danger'> Book Request added successfully.</p>";
		}

	}

	public function storeConfirmRequest($student_id,$student_department,$student_batch,$book_isbn,$book_tittle,$book_author,$hire_date,$return_date)
	{
		$sql = "INSERT INTO books_request_confirm (student_id,student_department,student_batch,book_isbn,book_tittle,book_author,hire_date,return_date)VALUES(?,?,?,?,?,?,?,?)";
		$dataArray = array($student_id,$student_department,$student_batch,$book_isbn,$book_tittle,$book_author,$hire_date,$return_date);
		$this->DBH->prepare($sql)->execute($dataArray);
	}



	public function delete($id)
	{
		$sqlQuery = "DELETE from books_request WHERE id = $id;";
        $this->DBH->exec($sqlQuery);
        Utility::redirect('../temp-book-request.php');
	}

	public function confirmRequest($data)
	{	$request_id = $data['request_id'];
		$hire_date = date('Y-m-d');
		$return_date = $data['return_date'];
		$request_data = $this->fetchRequestById($request_id);
		foreach ($request_data as $value) {}
		$storeConfirmRequest = $this->storeConfirmRequest($value->student_id,$value->student_department,$value->student_batch,$value->book_isbn,$value->book_tittle,$value->book_author,$hire_date,$return_date);
		$this->delete($request_id);
		Utility::redirect('../hired-book-list.php');
	}


	public function fetchRequestById($id)
	{
		$selectQuery = "SELECT * FROM books_request WHERE id = $id";
    	$STH = $this->DBH->query($selectQuery);
    	$STH->setFetchMode(PDO::FETCH_OBJ);
    	return $STH->fetchAll();
	}

	public  function bookByIsbn($isbn)
	{
    	$selectQuery = "SELECT * FROM books WHERE book_isbn  = '$isbn'";
    	$STH = $this->DBH->query($selectQuery);
    	$STH->setFetchMode(PDO::FETCH_OBJ);
    	return $STH->fetchAll();
        
	} 
	public  function studentById($studentId)
	{
    	$selectQuery = "SELECT * FROM students WHERE student_id  = '$studentId'";
    	$STH = $this->DBH->query($selectQuery);
    	$STH->setFetchMode(PDO::FETCH_OBJ);
    	return $STH->fetchAll();       	  
	} 

	public function checkBookAvailability($isbn)
	{
		$selectQuery = "SELECT * FROM books_request_confirm WHERE book_isbn  = '$isbn' AND status = 1";
    	$STH = $this->DBH->query($selectQuery);
    	return $STH->rowcount(); 
	}


	public function book_return_disconfirm($id)
	{
		$sqlQuery = "UPDATE  books_request_confirm SET status = 0  WHERE id = $id;";
        $this->DBH->exec($sqlQuery);
        Utility::redirect('../hired-book-list.php');
	}

	public function book_return_confirm($id)
	{
		$sqlQuery = "UPDATE  books_request_confirm SET status = 1  WHERE id = $id;";
        $this->DBH->exec($sqlQuery);
        Utility::redirect('../hired-book-list.php');
	}


}
