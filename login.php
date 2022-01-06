<?php include 'header.php'; ?>


<div class="container" style="margin-top: 2%">
    <center>




<form action="admin/system/function.php" method="post"> 
  <div class="form-group">

    <img class="mb-4" src="img/logo.png" alt="" width="375px"><br>
    <label for="exampleInputEmail1">Kullanıcı adınız :</label>
    <input type="title" class="form-control" name="name" placeholder="Kullanıcı adınızı Giriniz....">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Şifre:</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Şifrenizi Giriniz...">
  </div>
 <br>
 <button type="submit" class="btn btn-danger" name="giris"> Giriş Yap</button>
  <a href="register.html" class="btn btn-success">Kayıt Ol</a>

  </form>


</center>
</div>




<?php include 'footer.php'; ?>