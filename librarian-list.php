<?php 
    include "src/header.php";
 ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">librarian list</li>
      </ol>
    </section>


    <section class="content">
      <div class="row">
        <h3 class="text-center text-success text-bold">Student List</h3>
        <h3 class="text-center text-success text-bold"><a href="librarian-add.php">ADD NEW</a></h3>
          <div class="box">
            <div class="box-body">
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Designation</th>
                  <th>Role</th>
                  <th>Images</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $librarians = $librarian->index();
                  $i = 0;
                  foreach ($librarians as $eachlibrarian) { $i++;?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $eachlibrarian->librarian_name ?></td>
                      <td><?php echo $eachlibrarian->librarian_email ?></td>
                      <td><?php echo $eachlibrarian->librarian_designation ?></td>
                      <td><?php echo $eachlibrarian->librarian_role ?></td>
                      <td><img src="<?php echo $eachlibrarian->librarian_image ?>" heigh="40px" width="50px"></td>
                      <td><?php  
                          if ($eachlibrarian->librarian_status == 1) {?>
                            <a style="font-size: 22px;color:red;" title="Active" href="helper/status-change.php?librarian_deactiveid=<?php echo $eachlibrarian->id ?>"><i class="fa fa-thumbs-o-up"></i></a>
                          <?php }else{?>
                            <a style="font-size: 22px;color:red;" title="Deactive" href="helper/status-change.php?librarian_activeid=<?php echo $eachlibrarian->id ?>"><i class="fa fa-thumbs-o-down"></i></a>
                         <?php  }
                       ?></td>
                      <td>
                        <a class="btn-primary" title="Edit Profile" href="librarian-edit.php?editid=<?php echo $eachlibrarian->id ?>"><i class="fa fa-fw fa-edit"></i></a>
                        <a class="btn-danger" title="Delete Student" onclick="return confirm('Are you sure to delete??')" href="helper/status-change.php?librarian_deleteid=<?php echo $eachlibrarian->id ?>"><i class="fa fa-fw fa-trash"></i></a>
                      </td>
                    </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Serial</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Designation</th>
                  <th>Role</th>
                  <th>Images</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>

      </div>
    </section>

  </div>
 <?php include "src/footer.php"; ?>