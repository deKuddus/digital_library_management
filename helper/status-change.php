<?php 
    require_once __DIR__ . '/../vendor/autoload.php';
    $student = new Student;
    $book = new Book;
    $p_book = new PdfBook;
    $librarian = new Librarian;
    $request = new BookRequest;
    $category = new Category;


    	/*student section start*/
		    if(isset($_GET['student_deleteid'])){
		      $id = $_GET['student_deleteid'];
		      $student->delete($id);
		    }

		    if(isset($_GET['student_deactiveid'])){
		      $id = $_GET['student_deactiveid'];
		      $student->doStudentDeactive($id);
		    }
		    if(isset($_GET['student_activeid'])){
		      $id = $_GET['student_activeid'];
		      $student->doStudentActive($id);
		    }
		/*student section end*/

	    /*librarian section start*/
		    if(isset($_GET['librarian_deleteid'])){
		      $id = $_GET['librarian_deleteid'];
		      $librarian->delete($id);
		    }

		    if(isset($_GET['librarian_deactiveid'])){
		      $id = $_GET['librarian_deactiveid'];
		      $librarian->doLibrarianDeactive($id);
		    }
		    if(isset($_GET['librarian_activeid'])){
		      $id = $_GET['librarian_activeid'];
		      $librarian->doLibrarianActive($id);
		    }
		/*librarian section end*/



		/*book section start*/
		   if(isset($_GET['book_deleteid'])){
		      $id = $_GET['book_deleteid'];
		      $book->delete($id);
		   }

		   	if(isset($_GET['book_deactiveid'])){
		      $id = $_GET['book_deactiveid'];
		      $book->doBookDeactive($id);
		    }
		    if(isset($_GET['book_activeid'])){
		      $id = $_GET['book_activeid'];
		      $book->doBookActive($id);
		    }

		/*book section end*/

		/*pdf book section start*/
	   if(isset($_GET['book_deleteid_pdf'])){
	      $id = $_GET['book_deleteid_pdf'];
	      $p_book->delete($id);
	   }

	   	if(isset($_GET['book_deactiveid_pdf'])){
	      $id = $_GET['book_deactiveid_pdf'];
	      $p_book->doBookDeactive($id);
	    }
	    if(isset($_GET['book_activeid_pdf'])){
	      $id = $_GET['book_activeid_pdf'];
	      $p_book->doBookActive($id);
	    }

		/*pdf book section end*/


		/*delete request*/
		if(isset($_GET['request_deleteid']))
		{
			$requestId = $_GET['request_deleteid'];
			$request->delete($requestId);
		}

		/*hired book section*/
		if(isset($_GET['book_return_disconfirm'])){
	      $id = $_GET['book_return_disconfirm'];
	      $request->book_return_disconfirm($id);
	    }
	    if(isset($_GET['book_return_confirm'])){
	      $id = $_GET['book_return_confirm'];
	      $request->book_return_confirm($id);
	    }
		/*hired book section*/


		/*cateogy delete*/
		if(isset($_GET['category_deleteid'])){
			$id = $_GET['category_deleteid'];
			$category->delete($id);
		}
		/*cateogy delete*/

 ?>