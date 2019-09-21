<?php
    require_once __DIR__ . '/../vendor/autoload.php';
    Session::sessioninit();
    Session::notIsLoggedIn();
    $book = new Book;
    $student = new Student;
    $category = new Category;
    $department = new StudentDepartment; 
    $librarian = new Librarian; 
    $request = new BookRequest; 
    $p_book = new PdfBook; 

    //logout options
    if(isset($_GET['logout'])){
      Session::sessionDestroy();
    }

      $student_image = Session::get('student_image');
      $librarian_image = Session::get('librarian_image');
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Digital Library Management System-2019</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="resources/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="icon" href="resources/dist/img/favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="resources/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="resources/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="resources/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="resources/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="resources/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="resources/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="resources/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="resources/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="resources/bower_components/select2/dist/css/select2.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="resources/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="resources/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>DLM</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Digital Library</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">
                <?php 
                  
                 ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">
                <?php 
                   $new_join_request = $student->new_join_request();
                  echo $new_join_request;
                 ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php 
                  if(!empty($student_image)){
                    echo Session::get('student_image');
                  }elseif(!empty($librarian_image)){
                    echo Session::get('librarian_image');
                  }else{
                    echo 'resources/dist/img/avatar.png';
                  }
               ?>" class="user-image" alt="User Image">
              <span class="hidden-xs">
                <?php
                      if (Session::get('studentlogin') == true){
                        echo Session::get('student_name');
                      }
                      elseif(Session::get('librarianlogin') == true){
                         echo Session::get('librarian_name');
                      }
                     ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php 
                  if(!empty($student_image)){
                    echo Session::get('student_image');
                  }elseif(!empty($librarian_image)){
                    echo Session::get('librarian_image');
                  }else{
                    echo 'resources/dist/img/avatar.png';
                  }
               ?>" class="img-circle" alt="User Image">

                <p>
                   <?php
                      if (Session::get('studentlogin') == true){
                        echo Session::get('student_name');
                      }
                      elseif(Session::get('librarianlogin') == true){
                         echo Session::get('librarian_name');
                      }
                     ?>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                 <?php
                      if (Session::get('studentlogin') == true){?>
                        <a href="student-dashboard.php?student_id=<?php echo Session::get('student_id') ?>" class="btn btn-default btn-flat">Profile</a>
                      <?php }
                      elseif(Session::get('librarianlogin') == true){?>
                        <a href="librarian-dashboard.php" class="btn btn-default btn-flat">Profile</a>
                      <?php  }  ?>

                </div>
                <div class="pull-right">
                  <a href="?logout=logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>
    </nav>
  </header>
<?php 
  include 'src/sidebar.php';
 ?>