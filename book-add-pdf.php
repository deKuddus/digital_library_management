<?php 
    include "src/header.php";
    
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST)){
      /*echo"<pre>";
      print_r($_POST);*/
      $store = $p_book->store($_POST);
    }
      

 ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">book add</li>
      </ol>
    </section>


    <section class="content">
      <div class="row">
        <h3 class="text-center">Books Add Panel</h3>

<div class="col-md-2"></div>
<div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php if(isset($store)) echo $store; ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="book_tittle">Book Tittle</label>
                  <input type="text" class="form-control" name="book_tittle" id="book_tittle" placeholder="Enter book Tittle">
                </div>

                <div class="form-group">
                  <label for="book_author">Book Author</label>
                  <input type="text" class="form-control" name="book_author" id="book_author" placeholder="Enter book Author">
                </div>

                <div class="form-group">
                  <label for="book_isbn">Book ISBN</label>
                  <input type="text" class="form-control" name="book_isbn" id="book_isbn" placeholder="Enter book ISBN">
                </div>

                <div class="form-group">
                  <label for="book_publisher">Book Publisher</label>
                  <input type="text" class="form-control" name="book_publisher" id="book_publisher" placeholder="Enter book Publisher">
                </div>

                <div class="form-group">
                  <label for="book_edition">Book Version/Edition</label>
                  <input type="text" class="form-control" name="book_edition" id="book_edition" placeholder="Enter book Edition">
                </div>

                <div class="form-group">
                  <label>Book Category</label>
                  <select class="form-control select2" name="book_category" style="width: 100%;">
                    <?php 
                      $categories = $category->index();
                      foreach ($categories as  $value) {
                     ?>
                    <option value="<?php echo $value->id  ?>"><?php echo $value->category_name ?></option>
                  <?php } ?>
                  </select>
                </div>
 

                <div class="form-group">
                  <label for="exampleInputFile">Book Image</label>
                  <input type="file" id="exampleInputFile" name="book_image">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Upload PDF</label>
                  <input type="file" id="exampleInputFile" name="book_pdf">
                </div>

                 <div class="box-body pad">
                  <textarea id="editor1" name="book_description" rows="10" cols="80">
                     book description here
                  </textarea>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="1" name="book_status"> publish
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          </div>
        <div class="col-md-2"></div>

      </div>
    </section>

  </div>
 <?php 
  include "src/footer.php"; 
  ?>