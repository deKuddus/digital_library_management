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
              $book_details = $book->edit($id);
              foreach ($book_details as  $value) {}
            }
           ?>
          <div class="col-md-6">
          <div class="box box-widget widget-user-2">
            <div class="box-footer no-padding">
              <div class="nav nav-stacked">
               <img src="<?php echo $value->book_image ?>" alt="image" height="100%" width="100%">
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
        </div>


      </div>
    </section>

  </div>
 <?php 
  include "src/footer.php"; 
  ?>