<?php 
include "src/header.php";
?>
<script type="text/javascript">
 function create_request(isbn)
 {
  alert(isbn);
}
</script>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">booklist</li>
    </ol>
  </section>


  <section class="content">
    <div class="row">
      <h3 class="text-center text-success text-bold">Book List</h3>
      <div class="box">
        <div class="box-header">
          <?php if(Session::get('librarianlogin') == true){ ?>
            <a href="book-add-pdf.php" class="btn btn-primary"><h3 class="box-title">ADD NEW</h3></a>
          <?php } ?>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Tittle</th>
                  <th>Author</th>
                  <th>ISBN</th>
                  <th>Category</th>
                  <th>Edition</th>
                  <th>Images</th>
                  <th>PDF</th>
                  <?php if(Session::get('librarianlogin') == true){ ?>
                    <th>Status</th>
                  <?php } ?>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $p_books = $p_book->index();
                $i = 0;
                foreach ($p_books as $singleBook) { $i++;?>
                  <tr>
                    <td><?php echo $singleBook->book_tittle ?></td>
                    <td><?php echo $singleBook->book_author ?></td>
                    <td><?php echo $singleBook->book_isbn ?></td>
                    <td><?php
                    $categories = $category->index();
                    foreach ($categories as $singleCategory) { 
                      if($singleBook->book_category == $singleCategory->id){
                        echo $singleCategory->category_name;
                      }
                    }  
                    ?></td>
                    <td><?php echo $singleBook->book_edition ?></td>
                    <td>
                      <a href="<?php echo $singleBook->book_image ?>"><img src="<?php echo $singleBook->book_image ?>" heigh="40px" width="50px"></a>
                    </td>
                    <td>
                      <a style="font-size: 28px;" href="<?php echo $singleBook->pdf; ?>"/><i class="fa fa-book"></i></a>

                    </td>
                    <?php if(Session::get('librarianlogin') == true){ ?>
                      <td>
                        <?php  
                        if ($singleBook->book_status == 1) {?>
                          <a style="font-size: 22px;color:red;" title="Active" href="helper/status-change.php?book_deactiveid_pdf=<?php echo $singleBook->id ?>"><i class="fa fa-thumbs-o-up"></i></a>
                        <?php }else{?>
                          <a style="font-size: 22px;color:red;" title="Deactive" href="helper/status-change.php?book_activeid_pdf=<?php echo $singleBook->id ?>"><i class="fa fa-thumbs-o-down"></i></a>
                        <?php  }
                        ?>
                      </td>
                    <?php } ?>
                    <td>
                     <?php if(Session::get('librarianlogin') == true){ ?>
                      <a class="btn-primary" title="Edit Book" href="book-edit-pdf.php?editid=<?php echo $singleBook->id ?>"><i class="fa fa-fw fa-edit"></i>
                      </a> |
                      <a class="btn-danger" title="Delete Book" onclick="return confirm('Are you sure to delete??')" href="helper/status-change.php?book_deleteid_pdf=<?php echo $singleBook->id ?>"><i class="fa fa-fw fa-trash"></i>
                      </a>|
                    <?php } ?>
                    <a class="btn-info" title="Preview Book" href="preview-pdf.php?previewid=<?php echo $singleBook->id ?>"><i class="fa  fa-tripadvisor"></i></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <th>Tittle</th>
                <th>Author</th>
                <th>ISBN</th>
                <th>Category</th>
                <th>Edition</th>
                <th>Images</th>
                <th>PDF</th>
                <?php if(Session::get('librarianlogin') == true){ ?>
                  <th>Status</th>
                <?php } ?>
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