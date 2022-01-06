<?php include 'header.php'; ?>
    <div class="page-content-wrapper">
      <div class="container">


<table class="table">
  <thead>
    <tr>
      <th scope="col">Mesaj Tarihi</th>
      <th scope="col">Gönderici</th>

       <th scope="col"><center>İşlemler</center></th>
  
    </tr>
  </thead>
  <tbody>

                  <?php 

                $mesajsor=$db->prepare("SELECT * FROM mesaj where sendid=:id and mesajgelen_sil=:sil order by mesaj_zaman DESC");
                  $mesajsor->execute(array(

                    'id' => $kullanicicek['kullanici_id'],
                    'sil' => 0
                  ));

                  while($mesajcek=$mesajsor->fetch(PDO::FETCH_ASSOC)) {

                   $userid=$mesajcek['userid'];
                    ?>

    <tr>

<?php $saticisor=$db->prepare("SELECT * from kullanici where kullanici_id=:id");
$saticisor->execute(array(
	'id' => $userid
));
$saticicek=$saticisor->fetch(PDO::FETCH_ASSOC);
 ?>
      <td><?php echo $mesajcek['mesaj_zaman']; ?></td>
      <td><?php echo $saticicek['kullanici_adsoyad']; ?></td>



        <td class="text-center">
         
               <a href="mesaj-detay.php?gelenmesaj=ok&mesaj_id=<?php echo $mesajcek['mesaj_id']; ?>&sendid=<?php  echo $mesajcek['userid']; ?>"><button  class="btn btn-success">Detay</button></a>
    
     <a href="admin/islem.php?gelenmesajsil=ok&mesaj_id=<?php echo $mesajcek['mesaj_id']; ?>"><button  class="btn btn-danger">Sil</button></a></td>

    </tr>
<?php } ?>
   
  </tbody>
</table>


</div>