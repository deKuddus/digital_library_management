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
        <li class="active">studentlist</li>
      </ol>
    </section>


    <section class="content">
      <div class="row">
        <h3 class="text-center text-success text-bold">Student List</h3>
          <div class="box">
            <div class="box-body">
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial</th>
                  <th>Name</th>
                  <th>ID</th>
                  <th>Email</th>
                  <th>Dpt</th>
                  <th>Faculty</th>
                  <th>Images</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $students = $student->index();
                  $i = 0;
                  foreach ($students as $eachStudents) { $i++;?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $eachStudents->student_name ?></td>
                      <td><?php echo $eachStudents->student_id ?></td>
                      <td><?php echo $eachStudents->student_email ?></td>
                      <td><?php
                        $departments = $department->index(); 
                        foreach ($departments as $dept) {
                          if($eachStudents->student_department == $dept->id)
                          echo $dept->department_name;
                        }

                       ?></td>
                      <td><?php echo $eachStudents->student_faculty ?></td>
                      <td><img src="<?php echo $eachStudents->student_images ?>" heigh="40px" width="50px"> </td>

                      <td><?php  
                          if ($eachStudents->student_status == 1) {?>
                            <a style="font-size: 22px;color:red;" title="Active" href="helper/status-change.php?student_deactiveid=<?php echo $eachStudents->student_id ?>"><i class="fa fa-thumbs-o-up"></i></a>
                          <?php }else{?>
                            <a style="font-size: 22px;color:red;" title="Deactive" href="helper/status-change.php?student_activeid=<?php echo $eachStudents->student_id ?>"><i class="fa fa-thumbs-o-down"></i></a>
                         <?php  }
                       ?></td>
                      <td>
                        <a class="btn-primary" title="Edit Profile" href="student-edit.php?editid=<?php echo $eachStudents->student_id ?>"><i class="fa fa-fw fa-edit"></i></a>
                        <a class="btn-danger" title="Delete Student" onclick="return confirm('Are you sure to delete??')" href="helper/status-change.php?student_deleteid=<?php echo $eachStudents->id ?>"><i class="fa fa-fw fa-trash"></i></a>
                      </td>
                    </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Serial</th>
                  <th>Name</th>
                  <th>ID</th>
                  <th>Email</th>
                  <th>Dpt</th>
                  <th>Faculty</th>
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
 <?php 
  include "src/footer.php"; 
  ?>