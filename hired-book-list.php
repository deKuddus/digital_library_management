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
        <li class="active">hired book list</li>
      </ol>
    </section>


    <section class="content">
      <div class="row">
        <h3 class="text-center text-success text-bold">Hired Book List</h3>
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
                  <th>Hire date</th>
                  <th>Return date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $lists = $request->getHiredBookList();
                  foreach ($lists as $list) {?>
                    <tr>
                      <td><?php echo $list->book_tittle ?></td>
                      <td><?php echo $list->book_author ?></td>
                      <td><?php echo $list->book_isbn ?></td>
                      <td><?php echo $list->student_id ?></td>
                      <td><?php 
                        $departments = $department->index(); 
                        foreach ($departments as $dept) {
                          if($list->student_department == $dept->id)
                          echo $dept->department_name;
                        }
                       ?></td>  
                      <td><?php echo $list->student_batch ?></td>  
                      <td><?php echo $list->hire_date ?></td>  
                      <td><?php echo $list->return_date ?></td>  
                      <td><?php if($list->status == 1)
                                {
                                  echo "<span class='text-danger text-bold'> Not Returned </span>";
                                }else{
                                  echo "<span class='text-success'> Returned </span>";
                                }
                       ?></td>  

                     
                      <td>
                        <?php if($list->status == 1){?>
                            <a  title="Return Confirmed" onclick="return confirm('Are you sure to return confirm??')" href="helper/status-change.php?book_return_disconfirm=<?php echo $list->id ?>"><i class="fa fa-thumbs-o-up text-info" style="font-size: 25px;"></i>
                        </a>
                        <?php }else{?>
                        <a  title="Return DisConfirmed" onclick="return confirm('Are you sure to return not confirm??')" href="helper/status-change.php?book_return_confirm=<?php echo $list->id ?>"><i class="fa fa-thumbs-o-down text-danger" style="font-size: 25px;"></i>
                        </a>
                         <?php } ?>
                      </td>
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
                  <th>Hire date</th>
                  <th>Return date</th>
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