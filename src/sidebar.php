  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php 
          if(!empty($student_image)){
            echo Session::get('student_image');
            }elseif(!empty($librarian_image)){
              echo Session::get('librarian_image');
              }else{
                echo 'resources/dist/img/avatar.png';
              }
              ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>

                <?php
                if (Session::get('studentlogin') == true){
                  echo Session::get('student_name');
                }
                elseif(Session::get('librarianlogin') == true){
                 echo Session::get('librarian_name');
               }
               ?>

             </p><br>
             <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
           </div>
         </div>
         <!-- search form -->
         <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Book Section</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php  if (Session::get('librarianlogin') == true){ ?>
                <li class="active"><a href="book-add.php"><i class="fa fa-circle-o"></i>Book Add</a></li>
                <li class="active"><a href="book-add-pdf.php"><i class="fa fa-circle-o"></i>PDF Book Add</a></li>
              <?php } ?>

              <?php  if (Session::get('studentlogin') == true OR Session::get('librarianlogin') == true){ ?>
                <li><a href="book-list.php"><i class="fa fa-circle-o"></i>Book List</a></li>
                <li><a href="book-list-pdf.php"><i class="fa fa-circle-o"></i>PDF Book List</a></li>
              <?php } ?>
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Student Section</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <<!-- li class="active"><a href="student-registration.php"><i class="fa fa-circle-o"></i>student register</a></li> -->
              <?php  if (Session::get('librarianlogin') == true){ ?>
                <li><a href="student-list.php"><i class="fa fa-circle-o"></i>student List</a></li>
              <?php } ?>
            </ul>
          </li>

          <?php  if (Session::get('librarianlogin') == true){ ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Librarian Section</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="librarian-add.php"><i class="fa fa-circle-o"></i>Librarian register</a></li>
                <li><a href="librarian-list.php"><i class="fa fa-circle-o"></i>Librarian List</a></li>
              </ul>
            </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Request Section</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="temp-book-request.php"><i class="fa fa-circle-o"></i>Request List</a></li>
              <li><a href="hired-book-list.php"><i class="fa fa-circle-o"></i>Hired Book list</a></li>
            </ul>
          </li>


          <li class="treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Category</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="category-add.php"><i class="fa fa-circle-o"></i>Add Category</a></li>
              <li><a href="category-list.php"><i class="fa fa-circle-o"></i>Category List</a></li>
            </ul>
          </li>
          <?php } ?>
        </ul>
      </section>
      <!-- /.sidebar -->

    </aside>
