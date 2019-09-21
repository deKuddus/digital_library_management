<?php 
    require_once __DIR__ . '/vendor/autoload.php';
      $department = new StudentDepartment;
      $student = new Student;

      if(isset($_GET['editid'])){
        $id = $_GET['editid'];
        $single_student_info = $student->edit($id);
        foreach ($single_student_info as  $value) { }
      }

      if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST)){
/*      echo"<pre>";
      print_r($_POST);*/
      $update = $student->update($_POST);
    }
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student profile edit</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="resources/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="resources/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="resources/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="resources/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="resources/plugins/iCheck/square/blue.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo" style="margin-top: -7px">
    <h3 >Student <b>Profile Editing</b> Area</h3>
     <h3 class="text-center">
      <?php if(isset($update)) echo $update; ?>
    </h3>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
   <form role="form" action="" method="post" enctype="multipart/form-data">
      <div class="col-md-1"></div>
      <div class="col-md-5">
        <div class="form-group">
          <label for="student_name">Student Name</label>
          <input type="text" class="form-control" name="student_name" id="student_name" value="<?php echo $value->student_name ?>">
          <input type="hidden" name="student_id"  value="<?php echo $value->student_id ?>">
        </div>

        <div class="form-group">
          <label for="student_email">Student Email</label>
          <input type="email" class="form-control" name="student_email" id="student_email" value="<?php echo $value->student_email?>" >
        </div>

        <div class="form-group">
          <label for="student_mobile">Student Mobile</label>
          <input type="text" class="form-control" name="student_mobile" id="student_mobile" value="<?php echo $value->student_mobile ?>">
        </div>
      </div>
      <div class="col-md-5">
          <div class="form-group">
            <label>Student Department</label>
            <select class="form-control select2" name="student_department" style="width: 100%;">
              <?php 
                $department_name = $department->index();
                foreach ($department_name as  $dept) {
               ?>
              <option value="<?php echo $dept->id  ?>"
                  <?php if($value->student_department == $dept->id) echo "selected"; ?>
                ><?php echo $dept->department_name ?></option>
            <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label for="student_faculty">Student Faculty</label>
            <input type="text" class="form-control" name="student_faculty" id="student_faculty" value="<?php echo $value->student_faculty ?>">
          </div>

          <div class="form-group">
            <label for="student_image">Student Image</label><br>
            <input type="file" id="student_image" class="form-control" name="student_image">
          </div>
          <div class="form-group">
            <label for="student_image">Previous Image</label><br>
           <img src="<?php echo $value->student_images ?>" height="100px" width="100px">
          </div>

      </div>
                
                    <div class="form-group text-right">
             <label for="submit"> </label>
            <input type="submit" id="submit" class="form-control   btn btn-primary">
          </div>
      <div class="col-md-1"></div>
   </form>



<!--     <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="resources/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="resources/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="resources/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
