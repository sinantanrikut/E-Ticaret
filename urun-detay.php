<?php include 'header.php'; 


$i= $_GET['urun_id'];

 $urunsor=$db->prepare("select * from urun where urun_id=:id ");
                $urunsor->execute(array(

    'id' =>$i
  ) );

      $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
  ?>

<div class="container" style="margin-top: 2%">

<center><img width="100%" height="180px"src="img/ad-1.jpg"></center><br>
  <div class="row">
    <div class="col-md-6 mb-4 mb-md-0">

      <div id="mdb-lightbox-ui"></div>

      <div class="mdb-lightbox">

        <div class="row product-gallery mx-1">

          <div class="col-12 mb-0">
            <figure class="view overlay rounded z-depth-1 main-img">
              <a href="<?php echo $uruncek['urun_resim']; ?>"
                data-size="710x823">
                <img src="<?php echo $uruncek['urun_resim']; ?>"
                  class="img-fluid z-depth-1">
              </a>
            </figure>
            
          </div>
          
        </div>

      </div>

    </div>
    <div class="col-md-6" style="margin-top: 2%">

      <h5><?php echo $uruncek['urun_ad']; ?>
</h5>
      <p class="mb-2 text-muted text-uppercase small" style="color: blue !important;"><?php 


$ia= $uruncek['urun_kategori'];

 $ksor=$db->prepare("select * from urun_kategori where kategori_id=:id ");
                $ksor->execute(array(

    'id' =>$ia
  ) );

      $kcek=$ksor->fetch(PDO::FETCH_ASSOC);
      echo $kcek['kategori_ad']; ?></p>
      <br>
      <h3><span class="mr-1"><strong><?php echo $uruncek['urun_fiyat']; ?></strong><small>TL</small></span></h3>
       <h6><span class="mr-1" style="color: red"><strong><s><?php echo $uruncek['urun_indirimli']; ?></s></strong><small>TL</small></span></h6>
     
 
     
      <div class="table-responsive mb-2" style="margin-top: 7%">
         <hr>
        <table class="table table-sm table-borderless">
          <tbody>
            <tr>
              <td class="pl-0 pb-0 w-25">Adet</td>
              
            </tr>
            <tr>
              <td class="pl-0">
                <div class="def-number-input number-input safari_only mb-0">
                  <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                    class="minus"></button>
                  <input class="quantity" min="0" name="quantity" value="1" type="number">
                  <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                    class="plus"></button>
                </div>
              </td>
          
            </tr>
          </tbody>
        </table>
      </div>
      <ul><li>22 saat 6 dakika içinde sipariş verirseniz yarın kargoda
</li></ul>
     <a href="odeme.html"> <button type="button" class="btn btn-danger btn-md mr-1 mb-2">Şimdi Satın Al</button></a>
      <a href="sepet.html"><button type="button" class="btn btn-success btn-md mr-1 mb-2"><i
          class="fas fa-shopping-cart pr-2"></i>Sepete Ekle</button></a>
    </div>
  </div>



</div>


<div class="container">
  
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Ürün Açıklaması</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Taksit Seçenekleri</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">İade Koşulları</button>
</div>

<div id="London" class="tabcontent">
 <center><b> MARS  E Serisi</b></center><br>
  <img src="https://images.hepsiburada.net/assets/ProductDescription/202006/62a43753-7f60-4c37-ba70-b0910eb57837.png">

<br>
<b>Üretkenlik ve Şıklık Bir Arada</b>
<br>
İş amaçlı kullanılan bu dizüstü bilgisayarların etkileyici görünümü ve özelliklerinden yararlanarak, küçük ölçekli işletmenize benzersiz bir tarz katın. İşinizi yeniden kişisel hale getiren bir görünüme sahip olan bu dizüstü bilgisayarlar, güvenlik ve üretkenlik için geliştirilmiştir.
</div>

<div id="Paris" class="tabcontent">
  <center><img src="https://images.hepsiburada.net/assets/storefront/installment-campaign/campaign.png"></center>
  <p> Taksite Seçenekleri</p>
</div>

<div id="Tokyo" class="tabcontent">
  İncelediğiniz ürün, doğrudan üretici firma tarafından size kargoyla gönderilecektir. İade işlemlerinizi aşağıdaki şekilde yapmalısınız:
<br>
Ürünün adresinize teslim tarihinden itibaren 14 gün içinde "Sipariş Takibi" sayfasından "İade ve Geri gönderim" başvurusunda bulunarak iade sürecinizi başlatabilirsiniz.
Başvurunuz sonrasında "Hesabım" sayfasında bulunan başvuru takibi bölümünde gösterilen kargo gönderi kodu ile göndermeniz gerekmektedir. İadenizin kabul edilmesi için, ürünün hasar görmemiş ve kullanılmamış olması gerekmektedir.
İade etmek istediğiniz ürün, tarafımızdan üretici firmaya ulaştırılacak ve iade işlemleriniz Hepsiburada.com tarafından takip edilecektir.
Daha detaylı bilgi için Çözüm Merkezi sayfasını ziyaret edebilirsiniz.
<br>
Bedel İadesi:<br>
İade işlemi sonuçlandıktan sonra bedel ödemesi kredi kartınıza/banka hesabınıza 24 saat içinde yapılmaktadır. Ödeme işlemlerinin hesabınıza yansıma süresi bankanıza göre değişkenlik gösterebilir.
<br>
Alışveriş Kredisi ile satın alınan ürün iadelerinde; standart prosedür geçerlidir.
<br>
Ürün iptal/iadeniz gerçekleştiği durumda, ürün tutarınız Hepsiburada tarafından tanımladığınız hesabınıza geri ödenir.
<br>
Kredili siparişiniz iptal/iade alındığında krediniz kapanmış sayılmamaktadır. Ürün iptal/iadesinden sonra ayrıca krediden cayma talebiniz olur ise banka ile bireysel olarak iletişime geçmeniz gerekmektedir. Sipariş tarihinizden kredi kapama tarihinize kadar oluşan faizden sorumlu olacaksınız.
<br>
İade başvurusunda nasıl bulunabilirim? 
</div>

</div>
<?php include 'footer.php'; ?>