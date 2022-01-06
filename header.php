<?php 
error_reporting(0);
ob_start();
session_start();


//Veri tabanı bağlantısı dahil
include 'admin/system/config.php';

$ayarsor=$db->prepare("SELECT * from siteayar where siteayar_id=:id");
$ayarsor->execute(array(
  'id' => 1
));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);


$usersor=$db->prepare("select * from user where user_name=:name");

$usersor->execute(array(

  'name' => $_SESSION['user']

  ));

$usercek=$usersor->fetch(PDO::FETCH_ASSOC);

 ?>

<!DOCTYPE html>
<html>
<head>
  <title><?php echo $ayarcek['siteayar_title']; ?></title>
<meta charset="UTF-8">

  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
   <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Crete+Round&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/7eb949d6f0.js" crossorigin="anonymous"></script>
</head>
<body>

  <div class="offer-alert">
       <div class="offer-alert__container container">
         <span>🔥😍 Kırklareli Üniveersitesi Öğrencilerine %50 Dev indirim</span> <a href="#" class="offer-alert__btn">Detayları Gör </a>
       </div>
     </div>





  <header class="hero container-fluid border-bottom">

<nav class="hero-nav container px-4 px-lg-0 mx-auto">

      <ul class="nav w-100 list-unstyled align-items-center p-0">
        <li class="hero-nav__item">
         <a href="index.php"><img  class="hero-nav__logo" src="<?php echo $ayarcek['siteayar_logo']; ?>"></a> 
        </li>



<div class="input-group mb-0 w-50 "  style="margin-left: 10%">

  <input type="text" class="form-control" placeholder="Arama Yapmak İstediğiniz Kelimeyi Giriniz" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">

    <button class="btn btn-danger" type="button"><i class="fas fa-search"></i> </button>
  </div>
</div>




        <li id="hero-menu" class="flex-grow-1 hero__nav-list hero__nav-list--mobile-menu ft-menu">
          <ul class="hero__menu-content nav flex-column flex-lg-row ft-menu__slider animated list-unstyled p-2 p-lg-0">
            <li class="flex-grow-1">
              <ul class="nav nav--lg-side list-unstyled align-items-center p-0">
<li><a href="sepet.php" class="btn btn-secondary"><i class="fas fa-shopping-cart"></i> Sepetim</a></li>


<?php if (isset( $_SESSION['user'])) {?>

        <li><a style="margin-right: 10px;" href="#" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Hesabım</a>

            <ul class="dropdown-menu">
         <?php if ($usercek['user_yetki']==2) {?>
         <li class="hero-nav__item" style="float: left;"><a href="panel.php" class="hero-nav__link">Satıcı Paneli</a></li><br> 
                <hr>
         <?php } 
          ?>
              
                      <li class="hero-nav__item" style="float: left;" ><a href="#" class="hero-nav__link">Siparişlerim</a></li><br>
                      <li class="hero-nav__item" style="float: left;"><a href="#" class="hero-nav__link">Cüzdanım</a></li><br>
                      <li class="hero-nav__item" style="float: left;"><a href="#" class="hero-nav__link">Hesabım</a></li><br> 
                      <li class="hero-nav__item" style="float: left;"><a href="#" class="hero-nav__link">Değerlendirmelerim</a></li>
              <br>

                <li class="hero-nav__item" style="float: left;"><a href="logout.php" class="hero-nav__link">Güvenli Çıkış</a></li>
            </ul>


        </li>
<?php 








}

 else {?>
<li><a style="margin-right: 10px;" href="login.php" class="btn btn-danger"> Giriş Yap</a></li>

<?php  }
 ?>
  <?php if ($usercek['user_yetki']==3) {?>
    <li><a style="margin-right: 10px;" href="admin" class="btn btn-danger">Admin</a></li>
         <?php } 
          ?>
        
               

              </ul>


            </li>
          </ul>
          
        </li>
     
      </ul>
    </nav>
</header>
