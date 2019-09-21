<?php 
include "src/header.php";

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST)){
      /*echo"<pre>";
      print_r($_POST);*/
      $store = $category->store($_POST);
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
                <h3 class="box-title"><?php if(isset($store)) echo $store; ?></h3>
              </div>
              <form role="form" action="" method="post" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="book_tittle">category name : </label>
                    <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Enter category name">
                  </div>
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