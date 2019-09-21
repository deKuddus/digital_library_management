<?php 

use App\Utility\Utility;
class PdfBook extends Database
{
	
	public $book_tittle;
	public $book_author;
	public $book_isbn;
	public $book_category;
	public $book_edition;
	public $book_publisher;
	public $book_description;
	public $book_image;
	public $book_pdf;
	public $book_status;
	public $book_added_date;
	public $book_updated_date;
	public $book_id;




    public function index()
    {
    	$selectQuery = "SELECT * FROM pdf_books";
    	$STH = $this->DBH->query($selectQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;
    }

	public function store($data)
	{


		$this->book_tittle = Utility::validation($data['book_tittle']);
		$this->book_author = Utility::validation($data['book_author']);
		$this->book_isbn = Utility::validation($data['book_isbn']);
		$this->book_edition = Utility::validation($data['book_edition']);
		$this->book_publisher = Utility::validation($data['book_publisher']);
		$this->book_category = Utility::validation($data['book_category']);
		$this->book_description = Utility::validation($data['book_description']);
		$this->book_status = Utility::validation($data['book_status']);



		$permitted = array('jpg', 'jpeg', 'png', 'gif');
        $file_Name = $_FILES['book_image']['name'];
        $file_Size = $_FILES['book_image']['size'];
        $file_Temp = $_FILES['book_image']['tmp_name'];
        $div = explode('.', $file_Name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $this->book_image = "book_images/" . $unique_image;

        $pdf_permitted = array('pdf');
        $pdf_Name = $_FILES['book_pdf']['name'];
        $pdf_Size = $_FILES['book_pdf']['size'];
        $pdf_Temp = $_FILES['book_pdf']['tmp_name'];
        $div = explode('.', $pdf_Name);
        $file_extention = strtolower(end($div));
        $unique_name = str_replace(' ', '_', $this->book_tittle). '.' . $file_extention;
        $this->book_pdf = "book_pdf/" . $unique_name;



		if($this->book_tittle == "" OR $this->book_author == "" OR  $this->book_isbn == "" OR  $this->book_edition == "" OR  $this->book_publisher == "" OR  $this->book_category == "" OR  $this->book_description == "" OR $pdf_Name =="")
		{
			return $message = "<p class= 'text-danger'> Book information can not be empty.</p>";
		}
		elseif(!in_array($file_extention, $pdf_permitted))
		{
			return $message = "<p class= 'text-danger'> Invalid PDF</p>";
		}
		elseif(!in_array($file_ext, $permitted))
		{
			return $message = "<p class= 'text-danger'> Invalid Image</p>";
		}
		else
		{
			$sql = "SELECT * FROM pdf_books WHERE book_tittle = '$this->book_tittle' AND book_isbn = '$this->book_isbn'";
			$stmt = $this->DBH->query($sql);
			$duplicate = $stmt->fetch();

			if($duplicate){
				return $message = "<p class= 'text-danger'> Book Tittle or ISBN is already added.Try to change it.</p>";

			}else{

				if(move_uploaded_file($file_Temp, $this->book_image) && move_uploaded_file($pdf_Temp, $this->book_pdf)){

					$sql = "INSERT INTO pdf_books (book_tittle,book_author,book_isbn,book_edition,book_publisher,book_category,book_description,book_image,book_status,pdf)VALUES(?,?,?,?,?,?,?,?,?,?)";
					$dataArray = array($this->book_tittle,$this->book_author,$this->book_isbn,$this->book_edition,$this->book_publisher,$this->book_category,$this->book_description,$this->book_image,$this->book_status,$this->book_pdf
					);

					$inserted_rows = $this->DBH->prepare($sql)->execute($dataArray);
					if($inserted_rows){
						return $message = "<p class= 'text-success'> Book information added successfully.</p>";
					}else{
						return $message = "<p class= 'text-danger'> Book information not added.</p>";
					}   
				}
			}

		}

	}

	public function edit($id)
	{
		$selectQuery = "SELECT * FROM pdf_books WHERE id = $id";
    	$STH = $this->DBH->query($selectQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;
	}

	public function update($data)
	{
	 	$this->book_tittle = Utility::validation($data['book_tittle']);
		$this->book_author = Utility::validation($data['book_author']);
		$this->book_isbn = Utility::validation($data['book_isbn']);
		$this->book_edition = Utility::validation($data['book_edition']);
		$this->book_publisher = Utility::validation($data['book_publisher']);
		$this->book_category = Utility::validation($data['book_category']);
		$this->book_description = Utility::validation($data['book_description']);
		$this->book_id = Utility::validation($data['book_id']);
		$this->book_updated_date = date('Y-m-d');


		$permitted = array('jpg', 'jpeg', 'png', 'gif');
        $file_Name = $_FILES['book_image']['name'];
        $file_Size = $_FILES['book_image']['size'];
        $file_Temp = $_FILES['book_image']['tmp_name'];
        $div = explode('.', $file_Name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $this->book_image = "book_images/" . $unique_image;

        $pdf_permitted = array('pdf');
        $pdf_Name = $_FILES['book_pdf']['name'];
        $pdf_Size = $_FILES['book_pdf']['size'];
        $pdf_Temp = $_FILES['book_pdf']['tmp_name'];
        $div = explode('.', $file_Name);
        $file_extention = strtolower(end($div));
        $unique_name = str_replace(' ', '_', $this->book_tittle). '.' . $file_extention;
        $this->book_pdf = "book_pdf/" . $unique_name;


        if($this->book_tittle == "" OR  $this->book_author == "" OR  $this->book_isbn == "" OR  $this->book_edition == "" OR  $this->book_publisher == "" OR  $this->book_category == "")
		{
			return $message = "<p class= 'text-danger'> Book information can not be empty.</p>";
		}
		else
		{
			if(!empty($file_Name) && !empty($pdf_Name)){
				if(move_uploaded_file($file_Temp, $this->book_image) && move_uploaded_file($pdf_Temp, $this->book_pdf)){

				    $sql ="UPDATE pdf_books  
					   SET book_tittle = '$this->book_tittle'
					     , book_author = '$this->book_author'
					     , book_isbn = '$this->book_isbn'
					     , book_edition = '$this->book_edition'
					     , book_publisher = '$this->book_publisher'
					     , book_category = '$this->book_category'
					     , book_description = '$this->book_description'
					     , book_updated_date = '$this->book_updated_date'
					     , book_image = '$this->book_image'
					     , pdf = '$this->book_pdf'
					      WHERE id = $this->book_id";
					 $updated_row = $this->DBH->exec($sql);
					 if($updated_row){
					 	Utility::redirect("book-list.php");
					 }
				}
			}elseif(!empty($file_Name) && empty($pdf_Name)){
				if(move_uploaded_file($file_Temp, $this->book_image)){

				    $sql ="UPDATE pdf_books  
					   SET book_tittle = '$this->book_tittle'
					     , book_author = '$this->book_author'
					     , book_isbn = '$this->book_isbn'
					     , book_edition = '$this->book_edition'
					     , book_publisher = '$this->book_publisher'
					     , book_category = '$this->book_category'
					     , book_description = '$this->book_description'
					     , book_updated_date = '$this->book_updated_date'
					     , book_image = '$this->book_image' WHERE id = $this->book_id";
					 $updated_row = $this->DBH->exec($sql);
					 if($updated_row){
					 	echo "<script>window.location = 'book-list-pdf.php';</script>";
					 	//Utility::redirect("book-list.php");
					 }
				}
			}elseif(empty($file_Name) && !empty($pdf_Name)){
				if( move_uploaded_file($pdf_Temp, $this->book_pdf)){

				    $sql ="UPDATE pdf_books  
					   SET book_tittle = '$this->book_tittle'
					     , book_author = '$this->book_author'
					     , book_isbn = '$this->book_isbn'
					     , book_edition = '$this->book_edition'
					     , book_publisher = '$this->book_publisher'
					     , book_category = '$this->book_category'
					     , book_description = '$this->book_description'
					     , book_updated_date = '$this->book_updated_date'
					     , pdf = '$this->book_pdf' WHERE id = $this->book_id";
					 $updated_row = $this->DBH->exec($sql);
					 if($updated_row){
					 	echo "<script>window.location = 'book-list-pdf.php';</script>";
					 	//Utility::redirect("book-list.php");
					 }
				}
			}else{
					$sql ="UPDATE pdf_books   SET 
						   book_tittle = '$this->book_tittle'
					     , book_author = '$this->book_author'
					     , book_isbn = '$this->book_isbn'
					     , book_edition = '$this->book_edition'
					     , book_publisher = '$this->book_publisher'
					     , book_category = '$this->book_category'
					     , book_description = '$this->book_description'
					     , book_updated_date = '$this->book_updated_date' WHERE id = $this->book_id";
					 $updated_row = $this->DBH->exec($sql);
					 if($updated_row){
					 	echo "<script>window.location = 'book-list-pdf.php';</script>";
					 	//Utility::redirect("book-list.php");
					 }
			}
		}
	}


	public function delete($id)
	{
		$sqlQuery = "DELETE from pdf_books WHERE id = $id;";
        $this->DBH->exec($sqlQuery);
        Utility::redirect('../book-list-pdf.php');

	}

	public function copyOfBook($isbn)
	{
		$selectQuery = "SELECT * FROM pdf_books WHERE book_isbn  = '$isbn'";
    	$STH = $this->DBH->query($selectQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        foreach ($allData as $value) {}
        return $value->copy_of_book; 
	}

	public function countBook()
	{
		$selectQuery = "SELECT * FROM pdf_books";
    	$STH = $this->DBH->query($selectQuery);
    	return $STH->rowcount();
	}

	public function doBookDeactive($id)
	{
		$sqlQuery = "UPDATE  pdf_books SET book_status = 0  WHERE id = $id;";
        $this->DBH->exec($sqlQuery);
        Utility::redirect('../book-list-pdf.php');
	}

	public function doBookActive($id)
	{
		$sqlQuery = "UPDATE  pdf_books SET book_status = 1  WHERE id = $id;";
        $this->DBH->exec($sqlQuery);
        Utility::redirect('../book-list-pdf.php');
	}

}