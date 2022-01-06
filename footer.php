
<!--FOOTER -->
<div class="container">
   <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
            <img class="mb-2" src="img/logo.png" alt="" width="50%">
            <small class="d-block mb-3 text-muted">&copy; 2021-2022</small>
          </div>
          <div class="col-6 col-md">
            <h5>Özel Sayfalar</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Sevgililer Günü</a></li>
              <li><a class="text-muted" href="#">Anneler Günü</a></li>
              <li><a class="text-muted" href="#">Yılbaşı Hediyeleri</a></li>
              <li><a class="text-muted" href="#">Babalar Günü</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>Kategoriler</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="kategoriler.html">Bilgisayar/elektronik</a></li>
              <li><a class="text-muted" href="kategoriler.html">Beyaz Eşya</a></li>
              <li><a class="text-muted" href="kategoriler.html">Kozmetik</a></li>
              <li><a class="text-muted" href="kategoriler.html">Giyim ayakkabı</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>Linkler</h5>
            <ul class="list-unstyled text-small">

              <?php  
  $menusor=$db->prepare("SELECT * FROM menu order by menu_sira ");
  $menusor->execute(); ?>
  <?php while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)){ ?>
             <li><a class="text-muted" href="iletisim.html"><?php echo $menucek['menu_ad']; ?></a></li>
<?php } ?>
            </ul>
          </div>
        </div>
      </footer>
</div>





<script src="js/script.js" type="text/javascript"></script>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>