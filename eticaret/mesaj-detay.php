<?php include 'header.php'; ?>

<?php 

$mesajsor=$db->prepare("SELECT * from mesaj where mesaj_id=:id");
$mesajsor->execute(array(
	'id' => $_GET['mesaj_id']
));
$mesajcek=$mesajsor->fetch(PDO::FETCH_ASSOC);

 ?>


<center>
<div>
	 <h5>Mesaj İçeriği:</h5> <textarea disabled=""><?php echo $mesajcek['mesaj_detay'] ; ?></textarea>
</div></center>

<?php $sendid=$_GET['sendid'];
$userid=$kullanicicek['kullanici_id']; ?>

<?php if ($_GET['gelenmesaj']=="ok") {?>
<hr><br>
<center>
<form action="admin/islem.php" method="POST">
<p>Cevap Ver</p>

   <p>Mesaj İçerik</p>
   <textarea name="mesaj_detay"></textarea><br>

<input type="hidden" name="sendid" value="<?php echo $sendid ?>">

<input type="hidden" name="userid" value="<?php echo $userid ?>">
   <button class="btn btn-danger" name="mesajgonder">Gönder</button>

</form></center>

<?php }else{} ?>