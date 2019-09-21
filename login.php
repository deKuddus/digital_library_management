<?php 

require_once __DIR__ . '/vendor/autoload.php';
Session::sessioninit();
Session::isLoggedIn();


$student = new Student;
$librarian = new Librarian;

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['student_login'])){

  $login = $student->login($_POST);
}

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['librarian_login'])){
  $login = $librarian->login($_POST);
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student login</title>
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
      <h3 ><b>Login</b> Area</h3>
      <h3 class="text-center">
        <?php if(isset($login)) echo $login; ?>
      </h3>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
  <div class="container">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <button class="btn btn-success text-center" id="student_div">STUDENT</button>
        <button class="btn btn-info text-center" id="librarian_div">LIBRARIAN</button> 
        <a class="btn btn-primary text-center" id="librarian_div" href="student-registration.php">Student Register</a> 
      </div>
      <div class="col-md-3"></div>    
  </div>
<br>

      <div class="col-md-3"></div>
      <div class="col-md-6" id="student">
        <form action="" method="post">
          <div class="form-group">
            <label for="student_email">Student Email</label>
            <input type="email" class="form-control" name="student_email" id="student_email" placeholder="Write your email here" >
          </div>

          <div class="form-group">
            <label for="student_password">Password</label><br>
            <input type="password" id="student_password" class="form-control" name="student_password">
          </div>


          <div class="form-group text-right">
           <label for="submit"> </label>
           <input type="submit" id="submit" name="student_login" class="form-control   btn btn-primary">
         </div>
       </div>

     </form>
     <div class="col-md-6" id="librarian">
      <form action="" method="post">
        <div class="form-group">
          <label for="librarian_email">Librarian Email</label>
          <input type="email" class="form-control" name="librarian_email" id="librarian_email" placeholder="Write your email here" >
        </div>

        <div class="form-group">
          <label for="librarian_password">Librarian Password</label><br>
          <input type="password" id="librarian_password" class="form-control" name="librarian_password">
        </div>


        <div class="form-group text-right">
         <label for="submit"> </label>
         <input type="submit" id="submit" name="librarian_login" class="form-control   btn btn-primary">
       </div>
     </form>
   </div>
   <div class="col-md-3"></div>           
   <div class="box-footer">


   </div>
 </form>



<!--     <a href="#">I forgot my password</a><br>
  <a href="register.html" class="text-center">Register a new membership</a> -->

</div>
<!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="resources/bower_components/jquery/dist/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $("#librarian").hide();

    $("#student_div").click(function(){
      $("#student").show();
      $("#librarian").hide();
    });
    $("#librarian_div").click(function(){
      $("#student").hide();
      $("#librarian").show();
    });
  })
</script>
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
