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
        <li class="active">book request</li>
      </ol>
    </section>


    <section class="content">
      <div class="row">
        <h3 class="text-center text-success text-bold">Request List</h3>
           <div class="box">
            <div class="box-body">
              <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Book Tittle</th>
                  <th>Book Author</th>
                  <th>Book ISBN</th>
                  <th>Student Name</th>
                  <th>Student Department</th>
                  <th>Student Batch</th>
                  <th>Return date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $requests = $request->index();
                  foreach ($requests as $singleRequest) {?>
                    <tr>
                      <td><?php echo $singleRequest->book_tittle ?></td>
                      <td><?php echo $singleRequest->book_author ?></td>
                      <td><?php echo $singleRequest->book_isbn ?></td>
                      <td><?php echo $singleRequest->student_id ?></td>
                      <td><?php 
                          $departments = $department->index(); 
                          foreach ($departments as $dept) {
                            if($singleRequest->student_department == $dept->id)
                            echo $dept->department_name;
                          }
                       
                        ?></td>  
                      <td><?php echo $singleRequest->student_batch ?></td>  
                      <form action="helper/book-request.php" method="post" role="form">

                        <td>
                            <input type="hidden" name="request_id" value="<?php echo $singleRequest->id?>"> 
                              <input type="date" name="return_date" id="hire_date">
                        </td>
                     
                        <td>
                          <a class="btn-danger" title="Delete Book" onclick="return confirm('Are you sure to delete??')" href="helper/status-change.php?request_deleteid=<?php echo $singleRequest->id ?>"><i class="fa fa-fw fa-trash"></i>
                          </a>
                          <button type="submit" class="btn-primary">Confirm</button>
                        </td>
                       </form>
                    </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Book Tittle</th>
                  <th>Book Author</th>
                  <th>Book ISBN</th>
                  <th>Student Name</th>
                  <th>Student Department</th>
                  <th>Student Batch</th>
                  <th>Return date</th>
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