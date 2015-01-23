<?php require_once('Connections/koneksi.php'); ?>
<?php include('session-admin.php'); ?>
<?php session_start(); ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Welcome to Quality Control PT Sandoz Indonesia</title>
<meta http-equiv="content-type" content="text/html;charset=iso-8859-2" />
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />

<!--
.style1 {font-size: 0.74px}
-->
</style>
<style type="text/css">
<!--
.style8 {color: #FFFF00}
.style15 {font-size: 24px}
.style16 {font-size: 16px}
-->
</style>
<script>
function confirmDelete(delUrl) {
  if (confirm("Apakah anda yakin untuk menghapus ?")) {
    document.location = delUrl;
  }
}
</script>

</head>
<body>
<div class="content">
  <div class="header_right">
    <div class="top_info">
      <div class="top_info_right">
        
        
      </div>
    </div>
    <div class="bar"></div>
  </div>
  <div class="logo">
    
    <p align="center">&nbsp;</p>
  </div>
  <div class="left">
    <div class="left_articles">
      <h1 align="center"><a href="admin.php">Menu Admin Quality Control PT Sandoz Indonesia</a></h1>

</div>
                         <div align="center">

  <div class="subheader">
    <div align="center">
      <h1 class="style8 style16">Anda login sebagai, <?php echo $_SESSION["MM_Username"];?> | <a href="update/update-password.php">Change Password</a> | <a href="logout.php">Logout</a></h1>
      <p class="style8 style15">Menu Admin :</p>
      <p class="style8 style15">1. <a href="input/alat/index.php">Input Alat</a></p>
      <p class="style8 style15">2.<a href="input/user/index.php"> Input User</a></p>
      <p class="style8 style15">3. <a href="input/uar/index.php">User Account Request</a></p>
      <p class="style8 style15">4. <a href="upload/index.php">UAR Scan Uploader</a></p>
      <p class="style8 style15">5. <a href="input/produk/index.php">Input Produk</a></p>
      <h2>&nbsp;</h2>
    </div>
    </div>
    </div>
 


         <?php include('footer.php'); ?>
    <!-- end of templatemo_footer --> 


</body>
</html>

