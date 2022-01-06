<?php 
include 'header.php';
$sendid=$_GET['satici_id'];
$userid=$kullanicicek['kullanici_id'];

	$saticisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
  	$saticisor->execute(array(

    'id' => $sendid
  ));
  $saticicek=$saticisor->fetch(PDO::FETCH_ASSOC);

   ?>

   <h2><?php echo $saticicek['kullanici_adsoyad']."'a "; ?>Mesaj Gönder</h2>

<center>
<form action="admin/islem.php" method="POST">
<p>Gönderilecek Kişi</p>

<input type="text" value="<?php echo $saticicek['kullanici_adsoyad']; ?>" disabled>
<p>Mesaj Başlık</p>
   <input type="text" name="mesaj_baslik">
   <p>Mesaj İçerik</p>
   <textarea name="mesaj_detay"></textarea><br>

<input type="hidden" name="sendid" value="<?php echo $sendid ?>">

<input type="hidden" name="userid" value="<?php echo $userid ?>">
   <button class="btn btn-danger" name="mesajgonder">Gönder</button>

</form></center>