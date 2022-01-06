<?php include 'header.php'; 


if ($_GET['satici']=="ok") {
	$siparissor=$db->prepare("SELECT * from siparis_detay where siparis_id=:siparis_id and satici_id=:id ");
$siparissor->execute(array(
  'siparis_id' => $_GET['siparis_id'],
  'id' => $kullanicicek['kullanici_id']
));
$sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC);

$musterisor=$db->prepare("SELECT * from kullanici where kullanici_id=:id");
$musterisor->execute(array(
  'id' => $sipariscek['kullanici_id']
));
$mustericek=$musterisor->fetch(PDO::FETCH_ASSOC);
 $urunsor=$db->prepare("SELECT * from urunler where urunler_id=:id");
$urunsor->execute(array(
	'id' => $sipariscek['urunler_id']
));
$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

?>
<div>
	Müşteri Ad Soyad : 
	<input type="text" value="<?php echo $mustericek['kullanici_adsoyad']; ?>">
		Ürün id : 
	<input type="text" value="<?php echo $uruncek['urunler_id']; ?>">
		Ürün adı : 
	<input type="text" value="<?php echo $uruncek['urun_baslik']; ?>">
		Adet : 
	<input type="text" value="<?php echo $sipariscek['urun_adet']; ?>">
		Durum : 
	<label><?php if ($sipariscek['durum']=="0") {
		echo "Kullanıcı Onayı bekleniyor";
	}else{
		echo "Kullanıcı Onay Verdi.";
	} ?></label>
</div>
<?php }else{
$siparissor=$db->prepare("SELECT * from siparis_detay where siparis_id=:siparis_id and kullanici_id=:id ");
$siparissor->execute(array(
  'siparis_id' => $_GET['siparis_id'],
  'id' => $kullanicicek['kullanici_id']
));
$sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC);


 $urunsor=$db->prepare("SELECT * from urunler where urunler_id=:id");
$urunsor->execute(array(
	'id' => $sipariscek['urunler_id']
));
$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
?>
<form action="admin/islem.php" method="POST">
<div>
		Ürün id : 
	<input type="text" value="<?php echo $uruncek['urunler_id']; ?>">
		Ürün adı : 
	<input type="text" value="<?php echo $uruncek['urun_baslik']; ?>">
		Adet : 
	<input type="text" value="<?php echo $sipariscek['urun_adet']; ?>">

		Durum : 
		<?php if ($sipariscek['siparis_durum']=="0") {?>
			<input type="hidden" name="siparis_id" value="<?php echo $sipariscek['siparis_id']; ?>">
<input type="hidden" name="siparisdetay_id" value="<?php echo $sipariscek['siparisdetay_id']; ?>">
<button class="btn btn-success" name="siparisonayla">Siparişi Onayla</button>	

	<?php }else{
		echo "Tamamlandı";
	} ?>

</div>
<?php
}

?>
</form>

