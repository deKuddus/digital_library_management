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
      <li class="active">category list</li>
    </ol>
  </section>


  <section class="content">
    <div class="row">
      <h3 class="text-center text-success text-bold">Category List</h3>
      <div class="box">
        <div class="box-header">
          <a href="category-add.php" class="btn btn-primary"><h3 class="box-title">ADD NEW</h3></a>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Serial</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $categories = $category->index();
                $i = 0;
                foreach ($categories as $eachCategory) { $i++;?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $eachCategory->category_name ?></td>
                   <td>
                    <a class="btn-primary" title="Edit Book" href="category-edit.php?editid=<?php echo $eachCategory->id ?>"><i class="fa fa-fw fa-edit"></i>
                    </a> |
                    <a class="btn-danger" title="Delete Book" onclick="return confirm('Are you sure to delete??')" href="helper/status-change.php?category_deleteid=<?php echo $eachCategory->id ?>"><i class="fa fa-fw fa-trash"></i>
                    </a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                  <th>Serial</th>
                  <th>Name</th>
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