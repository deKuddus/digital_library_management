<?php 
use App\Utility\Utility;
include_once 'Session.php';
class Librarian extends Database
{
	protected $librarian_name;
	protected $librarian_email;
	protected $librarian_phone;
	protected $librarian_designation;
	protected $librarian_role;
	protected $librarian_image;
	protected $librarian_password;
	protected $librarian_id;

	public function index()
	{
		$selectQuery = "SELECT * FROM  librarians";
    	$STH = $this->DBH->query($selectQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;
	}


	public function store($data)
	{

		$this->librarian_name 	= Utility::validation($data['librarian_name']);
		$this->librarian_email 	= Utility::validation($data['librarian_email']);
		$this->librarian_phone = Utility::validation($data['librarian_phone']);
		$this->librarian_designation = Utility::validation($data['librarian_designation']);
		$this->librarian_role = Utility::validation($data['librarian_role']);
		$this->librarian_password 	= Utility::validation($data['librarian_password']);
		$password_lenth = strlen($this->librarian_password);

		$permitted = array('jpg', 'jpeg', 'png', 'gif');
        $file_Name = $_FILES['librarian_image']['name'];
        $file_Size = $_FILES['librarian_image']['size'];
        $file_Temp = $_FILES['librarian_image']['tmp_name'];
        $div 	   = explode('.', $file_Name);
        $file_ext  = strtolower(end($div));
        $unique_image = substr(md5(time()), 0 ,10). '.' . $file_ext;
        $this->librarian_image = "librarian_images/" . $unique_image;

        if($this->librarian_name == "" OR  $this->librarian_email == "" OR  $this->librarian_phone == "" OR  $this->librarian_designation == "" OR  $this->librarian_role == "" OR $this->librarian_password == "" OR $this->librarian_image =="")
        {
        	return $message = "<p class= 'text-danger'> All Input must be provided to complete registration.</p>";
        }
        elseif (in_array($file_ext , $permitted) === false)
        {
           return $message = "<p class= 'text-danger'>Error! You can upload only jpg,jpeg,png and gif image.</p>";
        }
        elseif($password_lenth < 6)
		{
			return $message = "<p class= 'text-danger'> Error! Password should greater than or equal 6</p>";
		}
		elseif(!filter_var($this->librarian_email,FILTER_VALIDATE_EMAIL))
		{
			return $message = "<p class= 'text-danger'> Error! Invalid Email Address</p>";
		}
		else
		{
			$sql = "SELECT librarian_email FROM librarians WHERE librarian_email = '$this->librarian_email'";
			$stmt = $this->DBH->query($sql);
			$duplicate_email = $stmt->fetch();
			if(!empty($duplicate_email))
			{
				return $message = "<p class= 'text-danger'> Librarian Email already Available for registration. Try to entry another Email</p>";
			}
			else
			{
				 $this->librarian_password = md5($this->librarian_password);
				if(move_uploaded_file($file_Temp, $this->librarian_image)){

					$sql = "INSERT INTO librarians (librarian_name,librarian_email,librarian_phone,librarian_designation,librarian_role,librarian_password,librarian_image)VALUES(?,?,?,?,?,?,?)";
					$dataArray = array($this->librarian_name,$this->librarian_email,$this->librarian_phone,$this->librarian_designation,$this->librarian_role,$this->librarian_password,$this->librarian_image
					);

					$inserted_rows = $this->DBH->prepare($sql)->execute($dataArray);
					if($inserted_rows){
						return $message = "<p class= 'text-success'> Registration is Success.Need to Active his/her Status. Go to Librarian List Page</p>";
					}else{
						return $message = "<p class= 'text-danger'> Registration Was Failed.Please Try Again.</p>";
					}   
				}
			}
		}
	}

	public function edit($id)
	{
		$selectQuery = "SELECT * FROM  librarians WHERE id = $id";
    	$STH = $this->DBH->query($selectQuery);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();
        return $allData;
	}

	public function update($data)
	{
		$this->librarian_name 	= Utility::validation($data['librarian_name']);
		$this->librarian_email 	= Utility::validation($data['librarian_email']);
		$this->librarian_phone = Utility::validation($data['librarian_phone']);
		$this->librarian_designation = Utility::validation($data['librarian_designation']);
		$this->librarian_id = Utility::validation($data['librarian_id']);

		$permitted = array('jpg', 'jpeg', 'png', 'gif');
        $file_Name = $_FILES['librarian_image']['name'];
        $file_Size = $_FILES['librarian_image']['size'];
        $file_Temp = $_FILES['librarian_image']['tmp_name'];
        $div 	   = explode('.', $file_Name);
        $file_ext  = strtolower(end($div));
        $unique_image = substr(md5(time()), 0 ,10). '.' . $file_ext;
        $this->librarian_image = "librarian_images/" . $unique_image;

        if($this->librarian_name == "" OR  $this->librarian_email == "" OR  $this->librarian_phone == "" OR  $this->librarian_designation == "" )
        {
        	return $message = "<p class= 'text-danger'> All Input must be provided to complete registration.</p>";
        }
		elseif(!filter_var($this->librarian_email,FILTER_VALIDATE_EMAIL))
		{
			return $message = "<p class= 'text-danger'> Error! Invalid Email Address</p>";
		}
		else
		{
			
				
			if(!empty($file_Name)){
				if(move_uploaded_file($file_Temp, $this->librarian_image)){
				$sql = "UPDATE  librarians SET 
				librarian_name = '$this->librarian_name',
				librarian_email = '$this->librarian_email',
				librarian_phone  = '$this->librarian_phone',
				librarian_designation = '$this->librarian_designation',
				librarian_image = '$this->librarian_image' WHERE id='$this->librarian_id'";
				$updated_rows = $this->DBH->exec($sql);
				if($updated_rows){
					Utility::redirect("librarian-list.php");
				}else{
					return $message = "<p class= 'text-danger'> Profile not updated.Please Try Again.</p>";
				}   
		
				}else{
					return $message = "<p class= 'text-danger'> Profile Not update.</p>";
				}
			}else{
				$sql = "UPDATE  librarians SET 
				librarian_name = '$this->librarian_name',
				librarian_email = '$this->librarian_email',
				librarian_phone  = '$this->librarian_phone',
				librarian_designation = '$this->librarian_designation' WHERE id='$this->librarian_id'";
				$updated_rows = $this->DBH->exec($sql);
				if($updated_rows){
					Utility::redirect("librarian-list.php");
				}else{
					return $message = "<p class= 'text-danger'> Profile not updated.Please Try Again.</p>";
				} 
			}

		}

	}

	public function delete($id)
	{
		$sqlQuery = "DELETE from librarians WHERE id = $id;";
        $this->DBH->exec($sqlQuery);
        Utility::redirect('../librarian-list.php');
	}

	public function doLibrarianDeactive($id)
	{
		$sqlQuery = "UPDATE  librarians SET librarian_status = 0  WHERE id = $id";
        $this->DBH->exec($sqlQuery);
        Utility::redirect('../librarian-list.php');
	}

	public function doLibrarianActive($id)
	{
		$sqlQuery = "UPDATE  librarians SET librarian_status = 1  WHERE id = $id";
        $this->DBH->exec($sqlQuery);
        Utility::redirect('../librarian-list.php');
	}



	public function login($data)
	{
		$this->librarian_email = Utility::validation($data['librarian_email']);
		$this->librarian_password = Utility::validation($data['librarian_password']);


		if($this->librarian_email == "" OR $this->librarian_password == "")
		{
			return $message = "<p class= 'text-danger'>Error! Longin Information can not be empty</p>";
		}
		elseif(!filter_var($this->librarian_email,FILTER_VALIDATE_EMAIL))
		{
			return $message = "<p class= 'text-danger'> Error! Invalid Email Address</p>";
		}
		else
		{
			$this->librarian_password = md5($this->librarian_password);
			$selectQuery = "SELECT * FROM librarians WHERE librarian_email = '$this->librarian_email' AND librarian_password = '$this->librarian_password'";
	    	$STH = $this->DBH->query($selectQuery);
	        $STH->setFetchMode(PDO::FETCH_OBJ);
	        $allData = $STH->fetchAll();
	        if($allData)
	        {
	        	foreach ($allData as $value) {
	        		$librarian_status = $value->librarian_status;
	        	}
	        	if($librarian_status == 0)
	        	{
	        		return $message = "<p class= 'text-danger'>Error! Your Account was not approve by Super Admin. Please Contact with Super Admin.</p>";
	        	}
	        	else
	        	{
	        		Session::sessioninit();
	        		Session::set("librarianlogin", true);
                    Session::set("librarian_id", "$value->librarian_id");
                    Session::set("librarian_name", "$value->librarian_name");
                    Session::set("librarian_role", "$value->librarian_role");
                    Session::set("librarian_email", "$value->librarian_email");
                    Session::set("librarian_image", "$value->librarian_images");
                    Utility::redirect('index.php');
	        	}
	        }
	        else
	        {
	        	return $message = "<p class= 'text-danger'>Error! Login information did not match with our records</p>";
	        }
		}
	}

		public function all_librarian()
	{
		$selectQuery = "SELECT * FROM  librarians";
    	$STH = $this->DBH->query($selectQuery);
    	return $STH->rowcount();
	}

}