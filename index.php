<?php include 'header.php'; ?>


<div class="container" >
  <div class="row" style="background-color: #f4f7f7" >
<!-- slider -->

<div class="container-fluid border-bottom">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
   
   <?php    $slidersor=$db->prepare("SELECT * FROM slider ");
  $slidersor->execute(); ?>

                          <?php $i=1; while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)){ ?>
    <div class="carousel-item <?php if($i==1){
      echo "active";
    } $i++?>">
     <a target="_blank" href="<?php echo $slidercek['slider_link']; ?>"><img class="d-block w-100" height="600px" src="<?php  echo $slidercek['slider_resim']; ?>" alt="Second slide"></a> 
    </div>
  <?php } ?>
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>

  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>

  </a>
</div>
</div>

<!-- slider -->

</div>
</div>

<div class="container px-4 px-lg-0 mx-auto" style="margin-top: 1%" >
<div class="card mb-3">
  <img class="card-img-top" src="img/ad-1.jpg" alt="Card image cap">

</div>
</div>


<div class="container" style="margin-top: 2%; ">
  <span style="font-size: 20px; color: gray;">-<i class="fas fa-laptop"></i>
<b>Bilgisayar</b><br>
</span>

</div>

<div class="container" style="padding-left: 10%">
 <!-- Kategori Listeleme-->
 <div class="row">



 <?php $uid=1;  
 $urunbsor=$db->prepare("SELECT * FROM urun where urun_kategori=:id limit 8 ");
  $urunbsor->execute(array(

    'id' =>$uid
  )); ?>

                          <?php  while($urunbcek=$urunbsor->fetch(PDO::FETCH_ASSOC)){ ?>


<div class="card" style="width: 20%;  margin-right: 10px;   margin-bottom: 10px; margin-top: 20px; "><form action="admin/system/function.php" method="POST">

  <br><center><span style="color: gray;"><?php  echo $urunbcek['urun_ad']; ?>
</span></center><br>
  
<a href="urun-detay.php?urun_id=<?php echo $urunbcek['urun_id']; ?>">
  <img class="card-img-top"  src="<?php   echo $urunbcek['urun_resim']; ?>" alt="Card image cap">

</a>
  <div class="card-body">
    <center><h5 class="card-text" style="color:red;"><?php  echo $urunbcek['urun_indirimli'];  ?><small> TL</small></h5></center>
     <center><p class="card-text" style="color:gray;"><s><?php  echo  $urunbcek['urun_fiyat']; ?> TL</s> </p></center><br><center>
      <input type="hidden" name="user_satici" value="<?php echo $urunbcek['urun_satici']; ?>">

<input type="hidden" name="urun_id" value="<?php echo $urunbcek['urun_id'] ?>">
<input type="hidden" name="urun_adet" value="1">
<input type="hidden" name="user_id" value="<?php echo $usercek['user_id'];?>">
   <button class="offer-alert__btn" name="sepetekle">Sepete Ekle</button></center>
  </div></form>
</div>

<?php   } ?>






</div>
</div>




<div class="container" style=" margin-top: 3%">


 <!-- Kategori Listeleme-->
 <div class="row">


<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'moda')" id="defaultOpen">Moda</button>
  <button class="tablinks" onclick="openCity(event, 'Spor')">Spor</button>
  <button class="tablinks" onclick="openCity(event, 'Kitap')">Kitap</button>
    <button class="tablinks" onclick="openCity(event, 'Müzik')">Müzik</button>
      <button class="tablinks" onclick="openCity(event, 'Film')">Film</button>
</div>








<!-- Moda Kategorisi -->
<div id="moda" class="tabcontent">
  
<div class="row" style="padding-left: 15%">
  


 <?php $uid=2;  
 $urunbsor=$db->prepare("SELECT * FROM urun where urun_kategori=:id limit 8 ");
  $urunbsor->execute(array(

    'id' =>$uid
  )); ?>

                          <?php  while($urunbcek=$urunbsor->fetch(PDO::FETCH_ASSOC)){ ?>


<div class="card" style="width: 20%;  margin-right: 10px;   margin-bottom: 10px; margin-top: 20px; "><form action="admin/system/function.php" method="POST">

  <br><center><span style="color: gray;"><?php  echo $urunbcek['urun_ad']; ?>
</span></center><br>
  
<a href="urun-detay.php?urun_id=<?php echo $urunbcek['urun_id']; ?>">
  <img class="card-img-top"  src="<?php   echo $urunbcek['urun_resim']; ?>" alt="Card image cap">

</a>
  <div class="card-body">
    <center><h5 class="card-text" style="color:red;"><?php  echo $urunbcek['urun_indirimli'];  ?><small> TL</small></h5></center>
     <center><p class="card-text" style="color:gray;"><s><?php  echo  $urunbcek['urun_fiyat']; ?> TL</s> </p></center><br><center>
      <input type="hidden" name="user_satici" value="<?php echo $urunbcek['urun_satici']; ?>">

<input type="hidden" name="urun_id" value="<?php echo $urunbcek['urun_id'] ?>">
<input type="hidden" name="urun_adet" value="1">
<input type="hidden" name="user_id" value="<?php echo $usercek['user_id'];?>">
   <button class="offer-alert__btn" name="sepetekle">Sepete Ekle</button></center>
  </div></form>
</div>

<?php   } ?>





</div>


</div>

<!-- Spor Kategorisi -->





<div id="Spor" class="tabcontent">
  <div class="row" style="padding-left: 15%">
  

 <?php $uid=3;  
 $urunbsor=$db->prepare("SELECT * FROM urun where urun_kategori=:id limit 8 ");
  $urunbsor->execute(array(

    'id' =>$uid
  )); ?>

                          <?php  while($urunbcek=$urunbsor->fetch(PDO::FETCH_ASSOC)){ ?>


<div class="card" style="width: 20%;  margin-right: 10px;   margin-bottom: 10px; margin-top: 20px; "><form action="admin/system/function.php" method="POST">

  <br><center><span style="color: gray;"><?php  echo $urunbcek['urun_ad']; ?>
</span></center><br>
  
<a href="urun-detay.php?urun_id=<?php echo $urunbcek['urun_id']; ?>">
  <img class="card-img-top"  src="<?php   echo $urunbcek['urun_resim']; ?>" alt="Card image cap">

</a>
  <div class="card-body">
    <center><h5 class="card-text" style="color:red;"><?php  echo $urunbcek['urun_indirimli'];  ?><small> TL</small></h5></center>
     <center><p class="card-text" style="color:gray;"><s><?php  echo  $urunbcek['urun_fiyat']; ?> TL</s> </p></center><br><center>
      <input type="hidden" name="user_satici" value="<?php echo $urunbcek['urun_satici']; ?>">

<input type="hidden" name="urun_id" value="<?php echo $urunbcek['urun_id'] ?>">
<input type="hidden" name="urun_adet" value="1">
<input type="hidden" name="user_id" value="<?php echo $usercek['user_id'];?>">
   <button class="offer-alert__btn" name="sepetekle">Sepete Ekle</button></center>
  </div></form>
</div>

<?php   } ?>



</div>

</div>



<!-- Kitap Kategorisi -->




<div id="Kitap" class="tabcontent">
  <div class="row" style="padding-left: 15%">
  

 <?php $uid=4;  
 $urunbsor=$db->prepare("SELECT * FROM urun where urun_kategori=:id limit 8 ");
  $urunbsor->execute(array(

    'id' =>$uid
  )); ?>

                          <?php  while($urunbcek=$urunbsor->fetch(PDO::FETCH_ASSOC)){ ?>


<div class="card" style="width: 20%;  margin-right: 10px;   margin-bottom: 10px; margin-top: 20px; "><form action="admin/system/function.php" method="POST">

  <br><center><span style="color: gray;"><?php  echo $urunbcek['urun_ad']; ?>
</span></center><br>
  
<a href="urun-detay.php?urun_id=<?php echo $urunbcek['urun_id']; ?>">
  <img class="card-img-top"  src="<?php   echo $urunbcek['urun_resim']; ?>" alt="Card image cap">

</a>
  <div class="card-body">
    <center><h5 class="card-text" style="color:red;"><?php  echo $urunbcek['urun_indirimli'];  ?><small> TL</small></h5></center>
     <center><p class="card-text" style="color:gray;"><s><?php  echo  $urunbcek['urun_fiyat']; ?> TL</s> </p></center><br><center>
      <input type="hidden" name="user_satici" value="<?php echo $urunbcek['urun_satici']; ?>">

<input type="hidden" name="urun_id" value="<?php echo $urunbcek['urun_id'] ?>">
<input type="hidden" name="urun_adet" value="1">
<input type="hidden" name="user_id" value="<?php echo $usercek['user_id'];?>">
   <button class="offer-alert__btn" name="sepetekle">Sepete Ekle</button></center>
  </div></form>
</div>

<?php   } ?>




</div>

</div>



<!-- Müzik Kategorisi -->



<div id="Müzik" class="tabcontent">
 <div class="row" style="padding-left: 15%">

 <?php $uid=5;  
 $urunbsor=$db->prepare("SELECT * FROM urun where urun_kategori=:id limit 8 ");
  $urunbsor->execute(array(

    'id' =>$uid
  )); ?>

                          <?php  while($urunbcek=$urunbsor->fetch(PDO::FETCH_ASSOC)){ ?>


<div class="card" style="width: 20%;  margin-right: 10px;   margin-bottom: 10px; margin-top: 20px; "><form action="admin/system/function.php" method="POST">

  <br><center><span style="color: gray;"><?php  echo $urunbcek['urun_ad']; ?>
</span></center><br>
  
<a href="urun-detay.php?urun_id=<?php echo $urunbcek['urun_id']; ?>">
  <img class="card-img-top"  src="<?php   echo $urunbcek['urun_resim']; ?>" alt="Card image cap">

</a>
  <div class="card-body">
    <center><h5 class="card-text" style="color:red;"><?php  echo $urunbcek['urun_indirimli'];  ?><small> TL</small></h5></center>
     <center><p class="card-text" style="color:gray;"><s><?php  echo  $urunbcek['urun_fiyat']; ?> TL</s> </p></center><br><center>
      <input type="hidden" name="user_satici" value="<?php echo $urunbcek['urun_satici']; ?>">

<input type="hidden" name="urun_id" value="<?php echo $urunbcek['urun_id'] ?>">
<input type="hidden" name="urun_adet" value="1">
<input type="hidden" name="user_id" value="<?php echo $usercek['user_id'];?>">
   <button class="offer-alert__btn" name="sepetekle">Sepete Ekle</button></center>
  </div></form>
</div>

<?php   } ?>



</div>

</div>



<!-- Film Kategorisi -->




<div id="Film" class="tabcontent">
<div class="row" style="padding-left: 15%">
  


 <?php $uid=6;  
 $urunbsor=$db->prepare("SELECT * FROM urun where urun_kategori=:id limit 8 ");
  $urunbsor->execute(array(

    'id' =>$uid
  )); ?>

                          <?php  while($urunbcek=$urunbsor->fetch(PDO::FETCH_ASSOC)){ ?>


<div class="card" style="width: 20%;  margin-right: 10px;   margin-bottom: 10px; margin-top: 20px; "><form action="admin/system/function.php" method="POST">

  <br><center><span style="color: gray;"><?php  echo $urunbcek['urun_ad']; ?>
</span></center><br>
  
<a href="urun-detay.php?urun_id=<?php echo $urunbcek['urun_id']; ?>">
  <img class="card-img-top"  src="<?php   echo $urunbcek['urun_resim']; ?>" alt="Card image cap">

</a>
  <div class="card-body">
    <center><h5 class="card-text" style="color:red;"><?php  echo $urunbcek['urun_indirimli'];  ?><small> TL</small></h5></center>
     <center><p class="card-text" style="color:gray;"><s><?php  echo  $urunbcek['urun_fiyat']; ?> TL</s> </p></center><br><center>
      <input type="hidden" name="user_satici" value="<?php echo $urunbcek['urun_satici']; ?>">

<input type="hidden" name="urun_id" value="<?php echo $urunbcek['urun_id'] ?>">
<input type="hidden" name="urun_adet" value="1">
<input type="hidden" name="user_id" value="<?php echo $usercek['user_id'];?>">
   <button class="offer-alert__btn" name="sepetekle">Sepete Ekle</button></center>
  </div></form>
</div>

<?php   } ?>





</div>

</div>
</div></div>




<div class="container" style="margin-top: 2%; ">
  <span style="font-size: 20px; color: gray;">-<i class="fas fa-laptop"></i>
<b>Telefon</b><br>
</span>

</div>

<div class="container" style="padding-left: 10%">




 <!-- Kategori Listeleme-->
 <div class="row">





 <?php $uid=7;  
 $urunbsor=$db->prepare("SELECT * FROM urun where urun_kategori=:id limit 8 ");
  $urunbsor->execute(array(

    'id' =>$uid
  )); ?>

                          <?php  while($urunbcek=$urunbsor->fetch(PDO::FETCH_ASSOC)){ ?>


<div class="card" style="width: 20%;  margin-right: 10px;   margin-bottom: 10px; margin-top: 20px; "><form action="admin/system/function.php" method="POST">

  <br><center><span style="color: gray;"><?php  echo $urunbcek['urun_ad']; ?>
</span></center><br>
  
<a href="urun-detay.php?urun_id=<?php echo $urunbcek['urun_id']; ?>">
  <img class="card-img-top"  src="<?php   echo $urunbcek['urun_resim']; ?>" alt="Card image cap">

</a>
  <div class="card-body">
    <center><h5 class="card-text" style="color:red;"><?php  echo $urunbcek['urun_indirimli'];  ?><small> TL</small></h5></center>
     <center><p class="card-text" style="color:gray;"><s><?php  echo  $urunbcek['urun_fiyat']; ?> TL</s> </p></center><br><center>
      <input type="hidden" name="user_satici" value="<?php echo $urunbcek['urun_satici']; ?>">

<input type="hidden" name="urun_id" value="<?php echo $urunbcek['urun_id'] ?>">
<input type="hidden" name="urun_adet" value="1">
<input type="hidden" name="user_id" value="<?php echo $usercek['user_id'];?>">
   <button class="offer-alert__btn" name="sepetekle">Sepete Ekle</button></center>
  </div></form>
</div>

<?php   } ?>







</div>
</div>

<?php include 'footer.php'; ?>