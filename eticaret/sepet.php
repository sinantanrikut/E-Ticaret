<?php include 'header.php'; ?>
<?php if (empty($_SESSION[ 'kullanici_ad' ])){

header("location:index.php");
}else
?>
<form action="admin/islem.php" method="POST">

<table id="cart" class="table table-hover table-condensed">

<thead>

<tr>

<th style="width:50%">Ürün</th>

<th style="width:8%">Adet</th>

<th style="width:22%" class="text-center">Fiyat</th>

<th style="width:10%"></th>

</tr>

</thead>

<tbody>


<?php 

$sepetsor=$db->prepare("SELECT * from sepet where kullanici_id=:id ");
$sepetsor->execute(array(
'id'=> $kullanicicek['kullanici_id']
));
while ($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)) {

		$urun_id=$sepetcek['urun_id'];
		$urunsor=$db->prepare("SELECT * from urunler where urunler_id=:id ");
		$urunsor->execute(array(
		'id'=> $urun_id
		));
		$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

		$toplam_fiyat+=$uruncek['urun_fiyat'] * $sepetcek['urun_adet'];

	?> 
<tr>

<td data-th="Product">

<div class="row">

<div class="col-sm-2 hidden-xs"><img height="100px;" src="<?php echo $uruncek['urun_resim']; ?>" class="img-responsive"/></div>

<div class="col-sm-10">

<h4 class="nomargin"><?php echo $uruncek['urun_baslik']; ?></h4>


</div>

</div>

</td>



<td data-th="Quantity">

<input type="number" class="form-control text-center" value="<?php echo $fiyat=$sepetcek['urun_adet']; ?>" disabled="">

</td>

<td data-th="Subtotal" class="text-center"><?php echo $fiyat=$sepetcek['urun_adet']*$uruncek['urun_fiyat']; ?> TL</td>

<td class="actions" data-th="">


<a class="btn btn-danger btn-sm" href="admin/islem.php?sepetsil=ok&sepet_id=<?php echo $sepetcek['sepet_id'];?>" ><i class="fa fa-trash-o"></i>Sil</a>

</td>

</tr>

<?php } ?>
</tbody>

<tfoot>







<tr>

<td><a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Alışverişe Devam Et</a></td>

<td colspan="2" class="hidden-xs"></td>

<td class="hidden-xs text-center"><strong>Toplam <?php echo $toplam_fiyat; ?> TL</strong></td>
<input type="hidden" name="siparis_fiyat" value="<?php echo $toplam_fiyat; ?> ">
<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?> ">

<?php


if (!empty($uruncek['urunler_id'])) {?>
<td><button class="btn btn-success" name="satinal">Satın Al</button></td>
<?php }else{?>
	<td><a href="javascript:void(0)" class="btn btn-success">Satın Al</a>
	</td>
<?php } ?>


</tr>

</tfoot>

</table>
</form>