<?php 
error_reporting(0);
ob_start();
session_start();

//Veri tabanı bağlantısı dahil
include 'admin/baglanti.php';


  //Üye Çekme

$kullanici_ad=$_SESSION['kullanici_ad'];

$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_ad=:kad");
  $kullanicisor->execute(array(

    'kad' => $kullanici_ad
  ));
  $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>

 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

 </head>
 <header>
 	<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
</style>
 	
<ul>
  <li><a href="index.php">Anasayfa</a></li>

<!-- Kullanıcı giriş Yaptımı Sorgulama kısmı -->
<?php if (isset($_SESSION[ 'kullanici_ad' ])) {

	?>
	<li><a href="panel.php">Panelim</a></li>
	<li><a href="sepet.php">Sepet</a></li>
  
	  <li><a href="cikis.php">Çıkış Yap</a></li><br>
	  <?php echo $kullanicicek['kullanici_adsoyad']." Hoşgeldiniz";
	?>  

<?php }else {?>
  <li><a href="sepet.php">Sepet</a></li>
	<li><a href="login.php">Giriş Yap</a></li>
	

<?php }?>
  	</ul>
  	

  	<hr>
   

 </header>
 <body>
 

