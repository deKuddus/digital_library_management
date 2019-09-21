<?php 
    include "src/header.php";

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['admin'])){
     /* echo"<pre>";
      print_r($_POST);die;*/
      $store = $librarian->store($_POST);
    }

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['super_admin'])){
     /* echo"<pre>";
      print_r($_POST);die;*/
      $store = $librarian->store($_POST);
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
        <h4 class="text-center"><?php if(isset($store)) echo $store; ?></h4> 
       <h3 class="text-center"> <a class="btn btn-info" href="librarian-list.php">Librarian List</a></h3> 
        <?php if(Session::get("librarian_role") != "super admin"){  ?>
           <form role="form" action="" method="post" enctype="multipart/form-data">
              <div class="col-md-1"></div>
              <div class="col-md-5">
                <div class="form-group">
                  <label for="librarian_name">Librarian Name</label>
                  <input type="text" class="form-control" name="librarian_name" id="librarian_name" placeholder="Write your name">
                </div>

                <div class="form-group">
                  <label for="librarian_email">Librarian Email</label>
                  <input type="email" class="form-control" name="librarian_email" id="librarian_email" placeholder="Write your email here" >
                </div>

                <div class="form-group">
                  <label for="librarian_phone">Librarian Mobile</label>
                  <input type="text" class="form-control" name="librarian_phone" id="librarian_phone" placeholder="write  mobile number here">
                </div>
                  <div class="form-group">
                  <label for="librarian_designation">Librarian Delsigantion</label>
                  <input type="text" class="form-control" name="librarian_designation" id="librarian_designation" placeholder="write designation here">
                </div>
              </div>
              <div class="col-md-5">

                 <div class="form-group">
                  <label for="librarian_role">Librarian Role</label>
                  <select class="form-control" name="librarian_role" id="librarian_role">
                    <option value="admin">Admin</option>
                  </select>
                </div>
                  <div class="form-group">
                    <label for="librarian_image">Librarian Image</label><br>
                    <input type="file" id="librarian_image" class="form-control" name="librarian_image">
                  </div>
                   <div class="form-group">
                    <label for="librarian_password">Password</label><br>
                    <input type="password" id="librarian_password" class="form-control" name="librarian_password">
                  </div>
                  <div class="form-group text-right">
                     <label for="submit"> </label>
                    <input type="submit" id="submit" name="admin" class="form-control btn btn-primary">
                  </div>
              </div>
             <div class="box-footer"></div>
            <div class="col-md-1"></div>
          </form>
          <?php } ?>
    <?php if(Session::get("librarian_role") == "super admin"){  ?>
      
                <form role="form" action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                        <div class="form-group">
                            <label for="librarian_name">Librarian Name</label>
                            <input type="text" class="form-control" name="librarian_name" id="librarian_name" placeholder="Write your name">
                          </div>

                          <div class="form-group">
                            <label for="librarian_email">Librarian Email</label>
                            <input type="email" class="form-control" name="librarian_email" id="librarian_email" placeholder="Write your email here" >
                          </div>

                          <div class="form-group">
                            <label for="librarian_phone">Librarian Mobile</label>
                            <input type="text" class="form-control" name="librarian_phone" id="librarian_phone" placeholder="write  mobile number here">
                          </div>
                            <div class="form-group">
                            <label for="librarian_designation">Librarian Delsigantion</label>
                            <input type="text" class="form-control" name="librarian_designation" id="librarian_designation" placeholder="write designation here">
                          </div>
                        </div>
                        <div class="col-md-5">

                           <div class="form-group">
                            <label for="librarian_role">Librarian Role</label>
                            <select class="form-control" name="librarian_role" id="librarian_role">
                              <option value="super admin">Super Admin</option>
                              <option value="admin">Admin</option>
                            </select>
                          </div>
                            <div class="form-group">
                              <label for="librarian_image">Librarian Image</label><br>
                              <input type="file" id="librarian_image" class="form-control" name="librarian_image">
                            </div>
                             <div class="form-group">
                              <label for="librarian_password">Password</label><br>
                              <input type="password" id="librarian_password" class="form-control" name="librarian_password">
                            </div>
                            <div class="form-group text-right">
                               <label for="submit"> </label>
                              <input type="submit" id="submit" name="super_admin" class="form-control btn btn-primary">
                            </div>
                        </div>
                       <div class="box-footer"></div>
                      <div class="col-md-1"></div>
                 </form>

    <?php } ?>
</div>
</section>
</div>
<?php include "src/footer.php" ?>
