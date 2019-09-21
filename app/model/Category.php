<?php 

use App\Utility\Utility;
class Category extends Database

{
	public $category_name;
	public $id;

	public  function index()
	{
		$selectQuery = "SELECT * FROM books_category";
		$STH = $this->DBH->query($selectQuery);
		$STH->setFetchMode(PDO::FETCH_OBJ);
		return $STH->fetchAll();

	}	


	public function store($data)
	{
		$this->category_name = Utility::validation($data['category_name']);

		if($this->category_name == "")
		{
			return $message = "<p class= 'text-danger'> category name can not be empty.</p>";
		}else{
			$sql = "SELECT * FROM books_category WHERE category_name = '$this->category_name'";
			$stmt = $this->DBH->query($sql);
			$duplicate = $stmt->fetch();
			if($duplicate){
				return $message = "<p class= 'text-danger'> category name Exist.</p>";
			}else{

				$sql = "INSERT INTO books_category (category_name)VALUES(?)";
				$dataArray = array($this->category_name);
				$inserted_rows = $this->DBH->prepare($sql)->execute($dataArray);
				if($inserted_rows){
					echo "<script>window.location = 'category-list.php';</script>";
					//return $message = "<p class= 'text-success'> Category added successfully.</p>";
				}else{
					return $message = "<p class= 'text-danger'> Category not added.</p>";
				} 
			}
		}
	}

	public function edit($id)
	{
		$selectQuery = "SELECT * FROM books_category WHERE id = $id";
		$STH = $this->DBH->query($selectQuery);
		$STH->setFetchMode(PDO::FETCH_OBJ);
		$allData = $STH->fetchAll();
		return $allData;
	}

	public function update($data)
	{
		$this->category_name = Utility::validation($data['category_name']);
		$this->id = Utility::validation($data['id']);
		if($this->category_name == "")
		{
			return $message = "<p class= 'text-danger'> category name can not be empty.</p>";
		}else{
			$sql = "SELECT * FROM books_category WHERE category_name = '$this->category_name' AND id != '$this->id'";
			$stmt = $this->DBH->query($sql);
			$duplicate = $stmt->fetch();
			if($duplicate){
				return $message = "<p class= 'text-danger'> category name Exist.</p>";
			}else{
				$sql ="UPDATE books_category SET category_name = '$this->category_name' WHERE id = $this->id";
				$updated_row = $this->DBH->exec($sql);
				 if($updated_row){
				 	//Utility::redirect("category-list.php");
				 	echo "<script>window.location = 'category-list.php';</script>";
				}
			}
		}
	}

	public function delete($id)
	{
		$sqlQuery = "DELETE from books_category WHERE id = $id;";
		$this->DBH->exec($sqlQuery);
		Utility::redirect('../category-list.php');

	}
}