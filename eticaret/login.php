<?php include 'header.php'; ?>

<!-- Kullanıcı giriş Yaptımı Sorgulama kısmı -->
<?php if (isset($_SESSION[ 'kullanici_ad' ])){

header("location:index.php");
}else
?>

<hr>
<br><br>

<center>
<form action="admin/islem.php" method="POST">
      
      <h1 >Login Sayfası</h1>
      <label>Kullanıcı adı</label><br>
      <input type="text"  placeholder="kullanıcı adı" name="kullanici_ad" required autofocus><br>
      <label>Şifre</label><br>
      <input type="password" placeholder="Password" name="kullanici_sifre" required><br><br>
    
      <button class="btn btn-lg btn-success" type="submit" name="kullanicigiris">Giriş Yap</button><br><br>
     

    </form>
    <a href="sifremi-unuttum.php">Şifremi Sıfırla</a><br>
     <a href="kayitol.php"><button class="btn btn-lg btn-primary" type="submit">Kaydol</button></a></center>
</body>
</html>