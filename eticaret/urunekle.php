 
<?php include 'header.php'; ?>
<?php if ($_GET['durum']=="duzenle") {
	
	$uid=$kullanicicek['kullanici_id'];
 $urunsor=$db->prepare("SELECT * from urunler where urunler_id=:id");
$urunsor->execute(array(
  'id' => $_GET['urunler_id']
));
$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
} ?>
 <form action="admin/islem.php" method="POST" enctype="multipart/form-data" >

<p>Ürün Fotoğrafı</p>
               
 <input class="form-control" type="file" name="urun_resim">
           


<p>Ürün Adı</p>
<input type="text" name="urun_baslik" value="<?php echo $uruncek['urun_baslik']; ?>">
<p>Ürün Açıklama</p>
<input type="text" name="urun_detay" value="<?php echo $uruncek['urun_detay']; ?>">
<p>Ürün Fiyat</p>
<input type="text" name="urun_fiyat" value="<?php echo $uruncek['urun_fiyat']; ?>">
<br>

          <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">

  	<?php if ($_GET['durum']=="duzenle") {?>
  		<input type="hidden" name="urunler_id" value="<?php echo $uruncek['urunler_id']; ?>">
  <button class="btn btn-success w-100" type="submit" name="urunduzenle">Ürün Düzenle</button>
  	<?php  } else{?>

  		 <button class="btn btn-success w-100" type="submit" name="urunekle">Ürün Ekle</button>
  	<?php }?>
               


              </form>