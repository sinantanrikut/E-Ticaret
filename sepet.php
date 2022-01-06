<?php include 'header.php'; ?>


<div class="container">
	<div class="row">


<form action="admin/system/function.php" method="post">
                <table class="table table-bordered" id="Tablo">
                    <thead>
                        <tr>
                            <th>Resim</th>
                            <th>Ürün Adı</th>
                            <th>Adet</th>
                            <th>Fiyat</th>
                            <th>Toplam Tutar</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

 <?php $uid=$usercek['user_id'];  
 $sepetsor=$db->prepare("SELECT * FROM sepet where user_id=:id ");
  $sepetsor->execute(array(

    'id' =>$uid
  )); ?>

                          <?php  while($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)){ 

        $urun_id=$sepetcek['urun_id'];
		$urunsor=$db->prepare("SELECT * from urun where urun_id=:id ");
		$urunsor->execute(array(
		'id'=> $urun_id
		));
		$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

		$toplam_fiyat+=$uruncek['urun_indirimli'] * $sepetcek['urun_adet'];
		?>
                        <tr>
                            <td>
                                <a href="urun-detay.php?urun_id=<?php echo $uruncek['urun_id']; ?>"><img width="100" src="<?php echo $uruncek['urun_resim']; ?>" /></a>
                            </td>
                            <td><?php echo $uruncek['urun_ad']; ?></td>
                            <td><?php echo $sepetcek['urun_adet']; ?></td>
                            <td><?php echo $uruncek['urun_indirimli']; ?> ₺</td>
                            <td><?php echo $sepetcek['urun_adet']*$uruncek['urun_indirimli']; ?> ₺</td>
                            <td><a href="admin/system/function.php?sepetsil=ok&sepet_id=<?php echo $sepetcek['sepet_id']; ?>"><button class="btn btn-danger"><i class="icon-trash"></i> Sil</button> </a></td>
                        </tr>
<?php } ?>
              
                        <tr>
                            <td colspan="4"></td>
                            <input type="hidden" name="user_id" value="<?php echo $usercek['user_id']; ?>">
                            <input type="hidden" name="siparis_fiyat" value=" <?php echo $toplam_fiyat; ?> ">

                            <td class="label label-danger" style="display:block"><strong> Toplam Tutar: <?php echo $toplam_fiyat; ?> TL</strong> </td>
                            <td><button class="btn btn-success" name="satinal">Ödemeye Geç</button></td>
                        </tr>
                    </tbody>
                </table>
</form>
        



	</div>
</div>


<?php include 'footer.php'; ?>