<?php include 'header.php'; ?>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
}
</style>

<h1>Anasayfa</h1>

<div class="row">

	<?php  $urunsor=$db->prepare("SELECT * from urunler order by urunler_id");
$urunsor->execute(array(0));
while ($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) { 

$saticisor=$db->prepare("SELECT * from kullanici where kullanici_id=:id");
$saticisor->execute(array(
	'id' => $uruncek['kullanici_id']
));
$saticicek=$saticisor->fetch(PDO::FETCH_ASSOC);
 ?>
  <div class="column">


<!-- Sepete Ekleme İşlemi-->
<form action="admin/islem.php" method="POST">

    <div class="card">
   <center> <img style="width: 200px; height: 200px;" class="card-img-top" src="<?php echo $uruncek['urun_resim']; ?>" ></center>
    <h5 class="card-title"><?php echo $uruncek['urun_baslik']; ?></h5>
      <p class="card-text">Satıcı:<?php echo $saticicek['kullanici_adsoyad']; ?></p>
    <p class="card-text"><?php echo $uruncek['urun_fiyat']." TL"; ?></p>

<div class="number-input" align="center">
  <p>Ürün Adedi</p>
<input class="quantity" min="1" name="urun_adet" value="1" type="number" >

</div><br>

<input type="hidden" name="urun_id" value="<?php echo $uruncek['urunler_id'] ?>">
<input type="hidden" name="kullanici_id" value="<?php if(empty($_SESSION['kullanici_ad'])){
  echo $kullanicicek['kullanici_id'];

}else{
    echo $kullanicicek['kullanici_id'];
}?>">

<!--Satıcı id-->
<input type="hidden" name="satici_id" value="<?php echo $saticicek['kullanici_id']; ?>">
<?php if ($kullanicicek['kullanici_id']==$saticicek['kullanici_id']) {?>
  <a href="javascript:void(0)" class="btn btn-danger">Kendi ürününüzü Alamazsınız</a><br>

  
<?php  }else{?>
      <button class="btn btn-primary" name="sepetekle">Sepete Ekle</button><br>
  <?php } ?>
</form>
<!--Mesaj Gönderme Kendi Kendine gönderemez kısmı... -->
<?php if ($kullanicicek['kullanici_id']==$saticicek['kullanici_id']) {?>
  <a href="javascript:void(0)" class="btn btn-danger">Kendine Mesaj Gönderemezsin</a>

<?php  }else{?>

    <a href="mesaj.php?satici_id=<?php echo $saticicek['kullanici_id']; ?>" class="btn btn-danger">Satıcıya Mesaj Gönder</a>
<?php } ?>


    </div>
  </div>
<?php } ?>

  
</div>
