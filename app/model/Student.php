<?php 

use App\Utility\Utility;
include_once 'Session.php';
class Student extends Database 
{

	protected $student_name;
	protected $student_id;
	protected $student_email;
	protected $student_mobile;
	protected $student_department;
	protected $student_faculty;
	protected $student_image;
	protected $student_joining_date;
	protected $student_updating_date;
	protected $student_password;
	protected $student_batch;

	public function index()
	{
		$selectQuery = "SELECT * FROM students";
    	$STH = $this->DBH->query($selectQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;
	}
	public  function store($data)
	{

		$this->student_id 			= Utility::validation($data['student_id']);
		$this->student_name 		= Utility::validation($data['student_name']);
		$this->student_email 		= Utility::validation($data['student_email']);
		$this->student_mobile 		= Utility::validation($data['student_mobile']);
		$this->student_faculty 		= Utility::validation($data['student_faculty']);
		$this->student_department 	= Utility::validation($data['student_department']);
		$this->student_password 	= Utility::validation($data['student_password']);
		$this->student_batch 	= Utility::validation($data['student_batch']);

		$this->student_joining_date = date('Y-m-d');

		$password_lenth = strlen($this->student_password);

		$permitted = array('jpg', 'jpeg', 'png', 'gif');
        $file_Name = $_FILES['student_image']['name'];
        $file_Size = $_FILES['student_image']['size'];
        $file_Temp = $_FILES['student_image']['tmp_name'];
        $div 	   = explode('.', $file_Name);
        $file_ext  = strtolower(end($div));
        $unique_image = $this->student_id. '.' . $file_ext;
        $this->student_image = "students_images/" . $unique_image;

		if($this->student_id == "" OR  $this->student_name == "" OR  $this->student_email == "" OR  $this->student_mobile == "" OR  $this->student_faculty == "" OR  $file_Name == "" OR $this->student_batch =="")
		{
			return $message = "<p class= 'text-danger'> All Input must be provided.</p>";
		}
		elseif($password_lenth < 6)
		{
			return $message = "<p class= 'text-danger'> Error! Password should greater than or equal 6</p>";
		}
		elseif(!filter_var($this->student_email,FILTER_VALIDATE_EMAIL))
		{
			return $message = "<p class= 'text-danger'> Error! Invalid Email Address</p>";
		}
		/*
			image type validation rules will be attach here
		*/
		
		else
		{
			$sql = "SELECT student_id,student_department FROM students WHERE student_id = '$this->student_id' AND student_department = '$this->student_department'";
			$stmt = $this->DBH->query($sql);
			$duplicate_id = $stmt->fetch();

			$sql = "SELECT student_email,student_department FROM students WHERE student_email = '$this->student_email' AND student_email = '$this->student_email'";
			$stmt = $this->DBH->query($sql);
			$duplicate_email = $stmt->fetch();

			if(!empty($duplicate_id))
			{
				return $message = "<p class= 'text-danger'> Student ID already Available for this department. Try to entry valid ID</p>";
			}
			elseif(!empty($duplicate_email))
			{
				return $message = "<p class= 'text-danger'> Student Email already Available for this department. Try to entry valid Email</p>";
			}
			else
			{
				$this->student_password = md5($this->student_password);
				if(move_uploaded_file($file_Temp, $this->student_image)){

					$sql = "INSERT INTO students (student_id,student_name,student_email,student_mobile,student_department,student_batch,student_faculty,student_password,student_images,student_joining_date)VALUES(?,?,?,?,?,?,?,?,?,?)";
					$dataArray = array($this->student_id,$this->student_name,$this->student_email,$this->student_mobile,$this->student_department,$this->student_batch,$this->student_faculty,$this->student_password,$this->student_image,$this->student_joining_date
					);

					$inserted_rows = $this->DBH->prepare($sql)->execute($dataArray);
					if($inserted_rows){
						return $message = "<p class= 'text-success'> Your Registration is Success.Please wait for administrator aproval</p>";
					}else{
						return $message = "<p class= 'text-danger'> Your Registration Was Failed.Please Try Again.</p>";
					}   
				}
			}

		}
	}

	public function edit($id)
	{
		$selectQuery = "SELECT * FROM students WHERE student_id = $id";
    	$STH = $this->DBH->query($selectQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;
	}

	public function update($data)
	{
		$this->student_name 		= Utility::validation($data['student_name']);
		$this->student_email 		= Utility::validation($data['student_email']);
		$this->student_mobile 		= Utility::validation($data['student_mobile']);
		$this->student_faculty 		= Utility::validation($data['student_faculty']);
		$this->student_department 	= Utility::validation($data['student_department']);
		$this->student_id 	= Utility::validation($data['student_id']);
		$this->student_updating_date = date('Y-m-d');

		$permitted = array('jpg', 'jpeg', 'png', 'gif');
        $file_Name = $_FILES['student_image']['name'];
        $file_Size = $_FILES['student_image']['size'];
        $file_Temp = $_FILES['student_image']['tmp_name'];
        $div 	   = explode('.', $file_Name);
        $file_ext  = strtolower(end($div));
        $unique_image = $this->student_id. '.' . $file_ext;
        $this->student_image = "students_images/" . $unique_image;

		if($this->student_id == "" OR  $this->student_name == "" OR  $this->student_email == "" OR  $this->student_mobile == "" OR  $this->student_faculty == "" )
		{
			return $message = "<p class= 'text-danger'> All Input must be provided.</p>";
		}
		
		
		else
		{
			/*$sql = "SELECT student_id,student_department FROM students WHERE student_id != '$this->student_id' AND student_department = '$this->student_department'";
			$stmt = $this->DBH->query($sql);
			$duplicate_id = $stmt->fetch();

			$sql = "SELECT student_email,student_department FROM students WHERE student_email != '$this->student_email' AND student_email = '$this->student_email'";
			$stmt = $this->DBH->query($sql);
			$duplicate_email = $stmt->fetch();

			if(!empty($duplicate_id))
			{
				return $message = "<p class= 'text-danger'> Student ID already Available for this department. Try to entry valid ID</p>";
			}
			elseif(!empty($duplicate_email))
			{
				return $message = "<p class= 'text-danger'> Student Email already Available for this department. Try to entry valid Email</p>";
			}
			else
			{
			*/	if(!empty($file_Name)){
					$this->remove_student_image_by_id($this->student_id);
					if(move_uploaded_file($file_Temp, $this->student_image)){

						$sql = "UPDATE students SET 
							student_name  = '$this->student_name'
							,student_email = '$this->student_email'
							,student_mobile = '$this->student_mobile'
							,student_department = '$this->student_department'
							,student_faculty = '$this->student_faculty'
							,student_images = '$this->student_image'
							,student_updating_date = '$this->student_updating_date' WHERE student_id = '$this->student_id'
						";
						$updated_row = $this->DBH->exec($sql);
						if($updated_row){
							return $message = "<p class= 'text-success'> Pfrofile Successfully Updated.</p>";
						}else{
							return $message = "<p class= 'text-danger'> Pfrofile Successfully Not Updated.</p>";
						}   
					}
				}else{
						$sql = "UPDATE students SET 
							student_name  = '$this->student_name'
							,student_email = '$this->student_email'
							,student_mobile = '$this->student_mobile'
							,student_department = '$this->student_department'
							,student_faculty = '$this->student_faculty'
							,student_updating_date = '$this->student_updating_date' WHERE student_id = '$this->student_id'
						";
						$updated_row = $this->DBH->exec($sql);
						if($updated_row){
							return $message = "<p class= 'text-success'> Pfrofile Successfully Updated.</p>";
						}else{
							return $message = "<p class= 'text-danger'> Pfrofile Successfully Not Updated.</p>";
						}  
				}
			//}

		}
	}

	public function delete($id)
	{
		$sqlQuery = "DELETE from students WHERE id = $id;";
        $this->DBH->exec($sqlQuery);
        Utility::redirect('../student-list.php');
	}


	public function doStudentDeactive($id)
	{
		$sqlQuery = "UPDATE  students SET student_status = 0  WHERE student_id = '$id'";
        $this->DBH->exec($sqlQuery);
        Utility::redirect('../student-list.php');
	}

	public function doStudentActive($id)
	{
		$sqlQuery = "UPDATE  students SET student_status = 1  WHERE student_id = '$id'";
        $this->DBH->exec($sqlQuery);
        Utility::redirect('../student-list.php');
	}


	public function login($data)
	{
		$this->student_email 		= Utility::validation($data['student_email']);
		$this->student_password 	= Utility::validation($data['student_password']);

		if($this->student_email == "" OR $this->student_password =="")
		{
			return $message = "<p class= 'text-danger'>Error! Login information can not be empty.</p>";
		}
		elseif(!filter_var($this->student_email,FILTER_VALIDATE_EMAIL))
		{
			return $message = "<p class= 'text-danger'> Error! Invalid Email Address</p>";
		}
		else
		{
			$this->student_password = md5($this->student_password);
			$selectQuery = "SELECT * FROM students WHERE student_email = '$this->student_email' AND student_password = '$this->student_password'";
	    	$STH = $this->DBH->query($selectQuery);
	        $STH->setFetchMode(PDO::FETCH_OBJ);
	        $allData = $STH->fetchAll();
	        if($allData)
	        {
	        	foreach ($allData as $value) {
	        		$student_status = $value->student_status;
	        	}
	        	if($student_status == 0)
	        	{
	        		return $message = "<p class= 'text-danger'>Error! Your Account was not approve by Administrator. Please Contact with Administrator.</p>";
	        	}
	        	else
	        	{
	        		Session::sessioninit();
	        		Session::set("studentlogin", true);
                    Session::set("student_id", "$value->student_id");
                    Session::set("student_name", "$value->student_name");
                    Session::set("student_email", "$value->student_email");
                    Session::set("student_image", "$value->student_images");
                    Utility::redirect('index.php');
	        	}
	        }
	        else
	        {
	        	return $message = "<p class= 'text-danger'>Error! Login information did not match with our records</p>";
	        }
		}
	}

	public function getAllHiredBookByStudentId($id)
	{
		$selectQuery = "SELECT * FROM books_request_confirm WHERE student_id = '$id'";
    	$STH = $this->DBH->query($selectQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;
	}

	public function new_join_request()
	{
		$selectQuery = "SELECT * FROM students WHERE student_status = 0";
    	$STH = $this->DBH->query($selectQuery);
        return $STH->rowcount();
	}

	public function countStudent()
	{
		$selectQuery = "SELECT * FROM students";
    	$STH = $this->DBH->query($selectQuery);
        return $STH->rowcount();
	}

	public function remove_student_image_by_id($id){
		$sql = "SELECT student_images FROM students WHERE student_id = '$id'";
		$STH = $this->DBH->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        foreach ($allData as  $value) {
        	$image =  $value->student_images;
        }
        unlink($image);
	}

}

                 
                 