<?php 
    include "src/header.php";

    if(isset($_GET['editid']))
    {
      $id = $_GET['editid'];
      $librarians = $librarian->edit($id);
      foreach ($librarians as $singleLibrarian) {}
    }

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST)){
/*      echo"<pre>";
      print_r($_POST);*/
      $update = $librarian->update($_POST);
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
        <li class="active">Dashboard</li>
      </ol>
    </section>


    <section class="content">
      <div class="row">
        <h3 class="text-center">Welcome to admin panel</h3>  
        <h4 class="text-center"><?php if(isset($update)) echo $update; ?></h4>
       <h3 class="text-center"> <a class="btn btn-info" href="librarian-list.php">Librarian List</a></h3> 
           <form role="form" action="" method="post" enctype="multipart/form-data">
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <div class="form-group">
                  <label for="librarian_name">Librarian Name</label>
                  <input type="hidden" name="librarian_id" value="<?php echo $singleLibrarian->id; ?>">
                  <input type="text" class="form-control" name="librarian_name" id="librarian_name" value="<?php echo $singleLibrarian->librarian_name ?>">
                </div>

                <div class="form-group">
                  <label for="librarian_email">Librarian Email</label>
                  <input type="email" class="form-control" name="librarian_email" id="librarian_email" value="<?php echo $singleLibrarian->librarian_email ?>">
                </div>

                <div class="form-group">
                  <label for="librarian_phone">Librarian Mobile</label>
                  <input type="text" class="form-control" name="librarian_phone" id="librarian_phone" value="<?php echo $singleLibrarian->librarian_phone ?>">
                </div>
                  <div class="form-group">
                  <label for="librarian_designation">Librarian Delsigantion</label>
                  <input type="text" class="form-control" name="librarian_designation" id="librarian_designation" value="<?php echo $singleLibrarian->librarian_designation ?>">
                </div>
              </div>
              <div class="col-md-5">
                  <div class="form-group">
                    <label for="librarian_image">Librarian Image</label><br>
                    <input type="file" id="librarian_image" class="form-control" name="librarian_image">
                  </div>
                  <div class="form-group">
                    <label for="librarian_image">Librarian Image</label><br>
                    <img src="<?php echo $singleLibrarian->librarian_image ?>" height="100px" width="100px">
                  </div>
                  <div class="form-group text-right">
                     <label for="submit"> </label>
                    <input type="submit" id="submit" class="form-control btn btn-primary">
                  </div>
              </div>
             <div class="box-footer"></div>
            <div class="col-md-1"></div>
   </form>
</div>
</section>
</div>
<?php include "src/footer.php" ?>
