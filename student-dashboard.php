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
        <li class="active">Dashboard</li>
      </ol>
    </section>


    <section class="content">
        <div class="row">
          <?php 
            if(isset($_GET['student_id'])){
              $id = $_GET['student_id'];
              $student_details = $student->edit($id);//method for details by id
              foreach ($student_details as  $value) {}
            }
           ?>

        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="box box-widget widget-user-2">
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="<?php echo $value->student_images ?>" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?php echo $value->student_name ?></h3>
              <h5 class="widget-user-desc"></h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Name: <span class="pull-right" style="font-size: 16px;"><?php echo $value->student_name ?></span></a></li></a></li>
                <li><a href="#">Email: <span class="pull-right" style="font-size: 16px;"><?php echo $value->student_email ?></span></a></li></a></li>
                <li><a href="#">Mobile: <span class="pull-right" style="font-size: 16px;"><?php echo $value->student_mobile ?></span></a></li></a></li>
                <li><a href="#">Department <span class="pull-right" style="font-size: 16px;">
                  <?php 
                    $departments = $department->index();
                    foreach ($departments as $dept_name) {
                      if($value->student_department == $dept_name->id)
                      {
                        echo $dept_name->department_name;
                      }
                    } 

                  ?>
                </span></a></li></a></li>
                <li><a href="#">Batch <span class="pull-right" style="font-size: 16px;"><?php echo $value->student_batch ?></span></a></li></a></li>
                <li><a href="#">Faculty<span class="pull-right" style="font-size: 16px;"><?php echo $value->student_faculty ?> </span></a></li></a></li>
                <li><a href="#">Join Date<span class="pull-right" style="font-size: 16px;"><?php echo $value->student_joining_date ?> </span></a></li></a></li>
                <li><a href="#">Status<span class="pull-right " style="font-size: 16px;">
                  <?php  
                     if($value->student_status == 1){
                      echo "<span class='badge bg-blue'>Active</span>";
                     } 
                     else{
                      echo "<span class='badge bg-red'>Dective</span>";
                     }
                  ?> 
              </span></a></li></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-2"></div>
      </div>
    </section>

    <!-- Book hired by student -->
  <section class="content">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <h3 class="text-center text-success text-bold">Rent Book List</h3>
          <div class="box">
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Serial</th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>ISBN</th>
                    <th>Hire Date</th>
                    <th>Return Date</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $books = $student->getAllHiredBookByStudentId($_GET['student_id']);
                    $i = 0;
                    foreach ($books as $eachStudents) { $i++;?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $eachStudents->book_tittle ?></td>
                        <td><?php echo $eachStudents->book_isbn ?></td>
                        <td><?php echo $eachStudents->book_author ?></td>
                        <td><?php echo $eachStudents->hire_date ?></td>
                        <td><?php echo $eachStudents->return_date  ?></td>
                        <td><?php  
                          if($eachStudents->status == 1)
                            {
                              echo "<span class='text-danger'>Not Returned</span>";
                            }
                            else
                            {
                              echo "<span class='text-success'> Returned</span>";
                            }  
                        ?></td>

                      </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Serial</th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>ISBN</th>
                    <th>Hire Date</th>
                    <th>Return Date</th>
                    <th>Status</th>
                  </tr>
                  </tfoot>
                </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
        <div class="col-md-2"></div>
      </div>
    </section>
  </div>
 <?php 
  include "src/footer.php"; 
  ?>