 
<?php include 'header.php'; ?>

<?php if ( $_GET[ 'sil' ] == "ok" )
	{

		$sil     = $db->prepare( "DELETE from urunler where urunler_id=:urunler_id" );
		$kontrol = $sil->execute(
			array(
				'urunler_id' => $_GET[ 'urunler_id' ]
			)
		);

		if ( $kontrol )
		{
	

			Header( "Location:urunlerim.php?durum=ok" );
		}
		else
		{

			Header( "Location:urunlerim.php?durum=no" );
		}
	}
 ?>



<?php
$uid=$kullanicicek['kullanici_id'];
 $urunsor=$db->prepare("SELECT * from urunler where kullanici_id=:id");
$urunsor->execute(array(
  'id' => $uid
));
while ($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) { ?>
<div class="card" style="width: 18rem;">
  
  <div class="card-body">
  	 <img class="card-img-top" src="<?php echo $uruncek['urun_resim']; ?>" >
    <h5 class="card-title"><?php echo $uruncek['urun_baslik']; ?></h5>
    <p class="card-text"><?php echo $uruncek['urun_detay']; ?></p>
    <p class="card-text"><?php echo $uruncek['urun_fiyat']." TL"; ?></p>
    <a href="urunekle.php?durum=duzenle&urunler_id=<?php echo $uruncek['urunler_id']; ?>" class="btn btn-primary">Düzenle</a><br>
     <a href="urunlerim.php?sil=ok&urunler_id=<?php echo $uruncek['urunler_id']; ?>" class="btn btn-danger">Sil</a>
  </div>
</div><br>
<?php  }?>