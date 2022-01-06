<?php include 'header.php'; ?>

<!-- Kullanıcı giriş Yaptımı Sorgulama kısmı -->
<?php if (isset($_SESSION[ 'kullanici_ad' ])){

header("location:index.php");
}else
?>
  <?php 

        if ($_GET['durum']=="farklisifre") {?>

        <div class="alert alert-danger">
          <strong>Başarısız!</strong> Girdiğiniz şifreler eşleşmiyor.
        </div>
          
        <?php } elseif ($_GET['durum']=="eksiksifre") {?>

        <div class="alert alert-danger">
          <strong>Başarısız!</strong> Şifreniz minimum 6 karakter uzunluğunda olmalıdır.
        </div>
          
        <?php } elseif ($_GET['durum']=="mukerrerkayit") {?>

        <div class="alert alert-danger">
          <strong>Başarısız!</strong> Bu kullanıcı daha önce kayıt edilmiş.
        </div>
          
        <?php } elseif ($_GET['durum']=="basarisiz") {?>

        <div class="alert alert-danger">
          <strong>Başarısız!</strong> Kayıt Yapılamadı Sistem Yöneticisine Danışınız.
        </div>
          
        <?php }
         ?>
<hr>
<br><br>

<center>
<form action="admin/islem.php" method="POST">
      
      <h1 >Kayıt Ol</h1>
      <label>Kullanıcı adı</label><br>
      <input type="text"  placeholder="kullanıcı adı" name="kullanici_ad" required autofocus><br>
      <label>Ad Soyad</label><br>
      <input type="text"  placeholder="Ad Soyad" name="kullanici_adsoyad" required autofocus><br>
       <label>mail</label><br>
      <input type="mail" placeholder="mail" name="kullanici_mail" required><br><br>
    
      <label>Şifre</label><br>
      <input type="password" placeholder="Password" name="kullanici_sifre1" required><br><br>
      <label>Tekrar Şifre</label><br>
      <input type="password" placeholder="Password" name="kullanici_sifre2" required><br><br>
     
      <button class="btn btn-lg btn-success" type="submit" name="kullanicikayit">Kaydol</button><br><br>
     

    </form>
    
</body>
</html>