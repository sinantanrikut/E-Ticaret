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
      <ul><li>22 saat 6 dakika i??inde sipari?? verirseniz yar??n kargoda
</li></ul>
     <a href="odeme.html"> <button type="button" class="btn btn-danger btn-md mr-1 mb-2">??imdi Sat??n Al</button></a>
      <a href="sepet.html"><button type="button" class="btn btn-success btn-md mr-1 mb-2"><i
          class="fas fa-shopping-cart pr-2"></i>Sepete Ekle</button></a>
    </div>
  </div>



</div>


<div class="container">
  
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">??r??n A????klamas??</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Taksit Se??enekleri</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">??ade Ko??ullar??</button>
</div>

<div id="London" class="tabcontent">
 <center><b> MARS  E Serisi</b></center><br>
  <img src="https://images.hepsiburada.net/assets/ProductDescription/202006/62a43753-7f60-4c37-ba70-b0910eb57837.png">

<br>
<b>??retkenlik ve ????kl??k Bir Arada</b>
<br>
???? ama??l?? kullan??lan bu diz??st?? bilgisayarlar??n etkileyici g??r??n??m?? ve ??zelliklerinden yararlanarak, k??????k ??l??ekli i??letmenize benzersiz bir tarz kat??n. ????inizi yeniden ki??isel hale getiren bir g??r??n??me sahip olan bu diz??st?? bilgisayarlar, g??venlik ve ??retkenlik i??in geli??tirilmi??tir.
</div>

<div id="Paris" class="tabcontent">
  <center><img src="https://images.hepsiburada.net/assets/storefront/installment-campaign/campaign.png"></center>
  <p> Taksite Se??enekleri</p>
</div>

<div id="Tokyo" class="tabcontent">
  ??nceledi??iniz ??r??n, do??rudan ??retici firma taraf??ndan size kargoyla g??nderilecektir. ??ade i??lemlerinizi a??a????daki ??ekilde yapmal??s??n??z:
<br>
??r??n??n adresinize teslim tarihinden itibaren 14 g??n i??inde "Sipari?? Takibi" sayfas??ndan "??ade ve Geri g??nderim" ba??vurusunda bulunarak iade s??recinizi ba??latabilirsiniz.
Ba??vurunuz sonras??nda "Hesab??m" sayfas??nda bulunan ba??vuru takibi b??l??m??nde g??sterilen kargo g??nderi kodu ile g??ndermeniz gerekmektedir. ??adenizin kabul edilmesi i??in, ??r??n??n hasar g??rmemi?? ve kullan??lmam???? olmas?? gerekmektedir.
??ade etmek istedi??iniz ??r??n, taraf??m??zdan ??retici firmaya ula??t??r??lacak ve iade i??lemleriniz Hepsiburada.com taraf??ndan takip edilecektir.
Daha detayl?? bilgi i??in ????z??m Merkezi sayfas??n?? ziyaret edebilirsiniz.
<br>
Bedel ??adesi:<br>
??ade i??lemi sonu??land??ktan sonra bedel ??demesi kredi kart??n??za/banka hesab??n??za 24 saat i??inde yap??lmaktad??r. ??deme i??lemlerinin hesab??n??za yans??ma s??resi bankan??za g??re de??i??kenlik g??sterebilir.
<br>
Al????veri?? Kredisi ile sat??n al??nan ??r??n iadelerinde; standart prosed??r ge??erlidir.
<br>
??r??n iptal/iadeniz ger??ekle??ti??i durumda, ??r??n tutar??n??z Hepsiburada taraf??ndan tan??mlad??????n??z hesab??n??za geri ??denir.
<br>
Kredili sipari??iniz iptal/iade al??nd??????nda krediniz kapanm???? say??lmamaktad??r. ??r??n iptal/iadesinden sonra ayr??ca krediden cayma talebiniz olur ise banka ile bireysel olarak ileti??ime ge??meniz gerekmektedir. Sipari?? tarihinizden kredi kapama tarihinize kadar olu??an faizden sorumlu olacaks??n??z.
<br>
??ade ba??vurusunda nas??l bulunabilirim? 
</div>

</div>
<?php include 'footer.php'; ?>