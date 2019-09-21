<?php 
    include "src/header.php";
    
    if(isset($_GET['editid'])){
      $id = $_GET['editid'];
      $books = $book->edit($id); 
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST)){
      $store = $book->update($_POST);
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
            <?php 
              foreach ($books as $singleBook) {
             ?>
            <form role="form" action="" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="book_tittle">Book Tittle</label>
                  <input type="hidden" name="book_id"  value="<?php echo $singleBook->id ?>">
                  <input type="text" class="form-control" name="book_tittle" id="book_tittle" value="<?php echo $singleBook->book_tittle ?>">
                </div>

                <div class="form-group">
                  <label for="book_author">Book Author</label>
                  <input type="text" class="form-control" name="book_author" id="book_author" value="<?php echo $singleBook->book_author ?>">
                </div>

                <div class="form-group">
                  <label for="book_isbn">Book ISBN</label>
                  <input type="text" class="form-control" name="book_isbn" id="book_isbn" value="<?php echo $singleBook->book_isbn ?>">
                </div>

                <div class="form-group">
                  <label for="book_publisher">Book Publisher</label>
                  <input type="text" class="form-control" name="book_publisher" id="book_publisher" value="<?php echo $singleBook->book_publisher ?>">
                </div>

                <div class="form-group">
                  <label for="book_edition">Book Version/Edition</label>
                  <input type="text" class="form-control" name="book_edition" id="book_edition" value="<?php echo $singleBook->book_edition ?>">
                </div>

                <div class="form-group">
                  <label>Book Category</label>
                  <select class="form-control select2" name="book_category" style="width: 100%;">
                    <?php 
                      $categories = $category->index();
                      foreach ($categories as  $value) {
                     ?>
                    <option value="<?php echo $value->id  ?>"
                        <?php if($value->id == $singleBook->book_category) echo "selected"; ?>
                      ><?php echo $value->category_name ?></option>
                  <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Book Image</label>
                  <input type="file" id="exampleInputFile" name="book_image">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">previous Image</label><br>
                  <img src="<?php echo $singleBook->book_image ?>" height="100px" width="100px">
                </div>
                 <div class="box-body pad">
                  <textarea id="editor1" name="book_description" rows="10" cols="80">
                     <?php echo $singleBook->book_description ?>
                  </textarea>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          <?php } ?>
          </div>
          </div>
        <div class="col-md-2"></div>

      </div>
    </section>

  </div>
 <?php 
  include "src/footer.php"; 
  ?>