<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  .sidenav {
    height: 100%;
    width: 160px;
    position: fixed;
    z-index: 1;
    background-color: #4863A0;
    overflow-x: auto;
    font-family: Montserrat, sans-serif;

  }

  .sidenav a {
    padding: 15px 8px 6px 16px;
    text-decoration: none;
    font-size: 14px;
    color: #fff;
    display: block;
    border-bottom: 1px solid #fff;
    border-top: 1px solid #fff;
  }

  .sidenav a:hover {
    color: #4863A0;
    background-color: #fff;
  }

  @media screen and (max-height: 450px) {
    .sidenav {
      padding-top: 15px;
    }

    .sidenav a {
      font-size: 18px;
    }
  }

  header {
    background-color: #4863A0;
    font-size: 20px;
    line-height: 52px;
    text-align: center;
    margin-bottom: 30px;
    margin-top: 20px;
  }
</style>


<div class="sidenav">
  <header>

    <img src="img/jjj.png" height="80" width="80">

  </header>

  <a href="data_aspirasi.php"><span class="glyphicon glyphicon-list"> </span> Data Aspirasi</a>

  <a href="data_pengaduan.php"><span class="glyphicon glyphicon-list"> </span> Data Pengaduan</a>
  <a href="data_solusi.php"><span class="glyphicon glyphicon-list"> </span> Data Solusi</a>

  <?php
  if ($_SESSION['level'] == "Super Admin") { ?>
    <a href="data_ulasan.php"><span class="glyphicon glyphicon-user"></span> Data Ulasan</a>
    <a href="datauser.php"><span class="glyphicon glyphicon-user"></span> Data User</a>
    <a href="dataadmin.php"><span class="glyphicon glyphicon-user"></span> Data Admin</a>
  <?php
  }
  ?>
</div>