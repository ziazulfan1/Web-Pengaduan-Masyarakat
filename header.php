<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sistem Informasi Pengaduan Masalah</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-datepicker.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/tooltip.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <link href="style.css" rel="stylesheet">
  <script>
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</head>
<style>
  .imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
  }

  img.avatar {
    width: 40%;
    border-radius: 50%;
  }

  .navbar {
    margin-bottom: 0;
    min-height: 60px;
    background-color: #4863A0;
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 0px;
    border-radius: 0;
    font-family: Montserrat, sans-serif;
  }

  .navbar li a {
    color: #fff !important;
    padding: 0 15px;
    height: 60px;
    line-height: 60px;
  }

  .navbar .navbar-brand {
    color: #fff !important;
    padding: 5px 15px;
    height: 60px;
    line-height: 60px;
  }

  .navbar-nav li a:hover,
  .navbar-nav li.active a {
    color: #4863A0 !important;
    background-color: #fff !important;
  }

  .navbar-default .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
    margin-top: 23px;
    padding: 9px 10px !important;
  }
</style>

<?php
session_start();
if ($_SESSION) {

  if ($_SESSION['level'] == "User") {
    header("Location: akun.php");
  }
}

include_once('login.php');

?>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

  <nav class="navbar navbar-default navbar-fixed-top">

    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="#myPage">
          <img src="img/jjj.png" height="50" width="60" alt="" class="d-inline-block align-middle mr-2">
        </a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">



          <li><a href="#tentang"><span class="glyphicon glyphicon-user"></span> TENTANG</a></li>
          <li><a href="#aspirasi"><span class="glyphicon glyphicon-file"></span> ASPIRASI</a></li>

          <li><a href="#kerjasama"><span class="glyphicon glyphicon-share"></span> INSTANSI</a></li>

          <li><a href="#contact"><span class="glyphicon glyphicon-envelope"></span> CONTACT</a></li>



          <li><a href="#aboutModal" data-toggle="modal" data-target="#myMo"><span class="glyphicon glyphicon-log-in"></span> MASUK</a></li>

        </ul>
      </div>
    </div>
  </nav>
  <div class="modal fade" id="myMo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <br>
    <br>
    <div class="modal-dialog">

      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

          <h4 class="modal-title" id="myModalLabel">Login Form</h4>

        </div>

        <div class="imgcontainer">
          <img src="img/hhh.png" alt="Avatar" class="avatar">
        </div>

        <div class="modal-body">

          <br>
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label class="col-sm-4 control-label">Username</label>
              <div class="col-sm-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-4 control-label">Password</label>
              <div class="col-sm-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-4 control-label">Pilih Level</label>
              <div class="col-sm-6">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                  <select name="level" class="form-control" required>
                    <option value="2">User</option>
                  </select>
                </div>
              </div>
            </div>

            <br>
            <div class="form-group">
              <label class="col-sm-4 control-label">&nbsp;</label>
              <div class="col-sm-6">
                <button class="btn btn-primary" name="submit" type="submit">Login</button>
                <a href="registeruser.php" class="btn btn-danger" data-toggle="tooltip" title="register">Register</a>
              </div>
            </div>
            <center>
            <?php echo $error; ?>
            </center>
          </form>
          <br>
        </div>
        <div class="modal-footer">
          <center>
            <button type="button" class="btn btn-default" data-dismiss="modal">TUTUP</button>
          </center>
        </div>

      </div>
    </div>

  </div>
  </div>
  </div>




</body>

</html>