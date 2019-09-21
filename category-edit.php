<?php 

include "src/header.php";

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST)){
  $update = $category->update($_POST);
}
if(isset($_GET['editid'])){
  $id = $_GET['editid'];
  $categories = $category->edit($id); 
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
          <li class="active">category add</li>
        </ol>
      </section>

      <section class="content">
        <div class="row">
          <h3 class="text-center">Category Add</h3>
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php if(isset($update)) echo $update; ?></h3>
              </div>
              <?php foreach ($categories as  $value) {?>
              <form role="form" action="" method="post" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="book_tittle">category name : </label>
                    <input type="text" class="form-control" name="category_name" id="category_name" value="<?php echo $value->category_name; ?>" >
                    <input type="hidden" name="id" value="<?php echo $value->id ?>">
                  </div>
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