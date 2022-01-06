<?php include 'header.php'; ?>
    <div class="page-content-wrapper">
      <div class="container">


<table class="table">
  <thead>
    <tr>
      <th scope="col">Müşteri</th>
       <th scope="col">Ürün</th>
      <th scope="col">Adet</th>
      <th scope="col">Tutar</th>

       <th scope="col"><center>İşlemler</center></th>
  
    </tr>
  </thead>
  <tbody>

                  <?php 

                $siparissor=$db->prepare("SELECT * FROM siparis_detay where satici_id=:id ");
                  $siparissor->execute(array(

                    'id' => $kullanicicek['kullanici_id'],
                  ));

                  while($sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC)) {
                    ?>

    <tr>

<?php $urunsor=$db->prepare("SELECT * from urunler where urunler_id=:id");
$urunsor->execute(array(
	'id' => $sipariscek['urunler_id']
));
$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

$musterisor=$db->prepare("SELECT * from kullanici where kullanici_id=:id");
$musterisor->execute(array(
  'id' => $sipariscek['kullanici_id']
));
$mustericek=$musterisor->fetch(PDO::FETCH_ASSOC);
 ?>

      <td><?php echo $mustericek['kullanici_adsoyad']; ?></td>
               <td><?php echo $uruncek['urun_baslik']; ?></td>
       <td><?php echo $sipariscek['urun_adet']; ?></td>
         <td><?php echo $sipariscek['urun_fiyat']*$sipariscek['urun_adet']; ?></td>



        <td class="text-center">
         
               <a href="siparis-detay.php?siparis_id=<?php echo $sipariscek['siparis_id']; ?>&satici=ok"><button  class="btn btn-success">Detay</button></a>
    
   </td>

    </tr>
<?php } ?>
   
  </tbody>
</table>


</div>