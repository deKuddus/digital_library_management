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
        <li class="active">book details</li>
      </ol>
    </section>


    <section class="content">
        <div class="row">
          <?php 
            if(isset($_GET['previewid'])){
              $id = $_GET['previewid'];
              $book_details = $p_book->edit($id);
              foreach ($book_details as  $value) {}
            }
           ?>
          <div class="col-md-6">
          <div class="box box-widget widget-user-2">
            <div class="box-footer no-padding">
              <div class="nav nav-stacked">
               <a href="<?php echo $value->book_image ?>"><img src="<?php echo $value->book_image ?>" alt="image" height="50%" width="50%"></a><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <a style="font-size: 80px;" href="<?php echo $value->pdf; ?>"/><i class="fa fa-book"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-widget widget-user-2">
            <div class="box-footer no-padding">

              <ul class="nav nav-stacked">
                <li><a href="#">TITTLE <span class="pull-right" style="font-size: 16px;"><?php echo $value->book_tittle ?></span></a></li></a></li>
                <li><a href="#">AUTHOR <span class="pull-right" style="font-size: 16px;"><?php echo $value->book_author ?></span></a></li></a></li>
                <li><a href="#">ISBN <span class="pull-right" style="font-size: 16px;"><?php echo $value->book_isbn ?></span></a></li></a></li>
                <li><a href="#">EDITION <span class="pull-right" style="font-size: 16px;"><?php echo $value->book_edition ?></span></a></li></a></li>
                <li><a href="#">PUBLISHER <span class="pull-right" style="font-size: 16px;"><?php echo $value->book_publisher ?></span></a></li></a></li>
                <li><a href="#">DESCRIPTION<span class="pull-right" style="font-size: 16px;"><?php echo $value->book_description ?> </span></a></li></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-5"></div>
          <div class="col-md-2">
            <a href="book-list-pdf.php">
              <button class="btn btn-info">BACK</button>
            </a>
            </div>
          <div class="col-md-5"></div>

        </div>


      </div>
    </section>

  </div>
 <?php 
  include "src/footer.php"; 
  ?>