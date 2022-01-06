<?php
ob_start();
session_start();
include 'baglanti.php'; 
error_reporting(0);


if ( isset( $_POST[ 'kullanicigiris' ] ) )
{

$kullanici_ad= htmlspecialchars(trim($_POST[ 'kullanici_ad' ]));
$kullanici_sifre= htmlspecialchars(md5(trim($_POST[ 'kullanici_sifre' ])));


//Üye girişi
if ( $kullanici_ad && $kullanici_sifre )
	{
		$kullanicisor = $db->prepare( "SELECT * from kullanici where kullanici_ad=:adi and kullanici_sifre=:pass" );
		$kullanicisor->execute(
			array(
				'adi'  => $kullanici_ad,
				'pass' => $kullanici_sifre,
			)
		);

		$say = $kullanicisor->rowCount();

		if ( $say > 0 )
		{

			$_SESSION[ 'kullanici_ad' ] = $kullanici_ad;

			header( 'Location:../index.php' );
		}
		else
		{

			header( 'Location:../login.php?durum=no' );
      exit();
		}
		}

}

//Üye Kayıt Olma

if (isset($_POST['kullanicikayit'])) {

$kullanici_ad= htmlspecialchars($_POST[ 'kullanici_ad' ]);
$kullanici_adsoyad=htmlspecialchars($_POST[ 'kullanici_adsoyad' ]);
$kullanici_mail=htmlspecialchars($_POST[ 'kullanici_mail' ]);


 $kullanici_sifre1=$_POST[ 'kullanici_sifre1' ];

$kullanici_sifre2=$_POST[ 'kullanici_sifre2' ];

if ($kullanici_sifre1==$kullanici_sifre2) {
	

	if (strlen($kullanici_sifre1)>=6) {


		$kullanicisor=$db->prepare("select * from kullanici where kullanici_ad=:kad");
			$kullanicisor->execute(array(
				'kad' => $kullanici_ad
			));

			//dönen satır sayısını belirtir
			$say=$kullanicisor->rowCount();


if ($say==0) {

				//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
				echo $password=md5($_POST[ 'kullanici_sifre1' ]);
    
			//Kullanıcı kayıt işlemi yapılıyor...
				$kullanicikaydet=$db->prepare("INSERT INTO kullanici SET
					kullanici_ad=:kullanici_ad,
					kullanici_adsoyad=:kullanici_adsoyad,
					kullanici_mail=:kullanici_mail,
					kullanici_sifre=:kullanici_sifre
					");
				$insert=$kullanicikaydet->execute(array(
					'kullanici_ad' => $kullanici_ad,
					'kullanici_adsoyad' => $kullanici_adsoyad,
					'kullanici_mail' => $kullanici_mail,
					'kullanici_sifre' => $password
				));

				if ($insert) {


					header("Location:../login.php?durum=kayitbasarili");
          exit();


				} else {


					header("Location:../kayitol.php?durum=basarisiz");
          exit();
				}

			} else {

				header("Location:../kayitol.php?durum=kayitli");
        exit();

			}


	}else{

			header("Location:../kayitol.php?durum=eksiksifre");

		exit();
	}


}else{


		header("Location:../kayitol.php?durum=farklisifre");
		exit();

}
}

if (isset($_POST['urunekle'])) {

  		 $uploads_dir = '../img/urunler';
        $uploads_dirs = '../img/urunler';
        $tmp_name = $_FILES[ 'urun_resim' ][ "tmp_name" ];
        $benzersizsayi1 = rand( 20000, 32000 );
        $benzersizsayi2 = rand( 20000, 32000 );
        $uzanti = '.jpg';
        $benzersizad    = $benzersizsayi1 . $benzersizsayi2 ;
        $refimgyol      = substr( $uploads_dir, 3 ) . "/" . $benzersizad . $uzanti;
        $refimgyolss      = substr( $uploads_dirs, 3 ) . "/" . $benzersizad . $uzanti;
        move_uploaded_file( $tmp_name, "$uploads_dir/$benzersizad$uzanti" );

$kaydet = $db->prepare(
       "INSERT INTO urunler SET
        urun_baslik=:baslik,
    	kullanici_id=:kullanici_id,
    	urun_detay=:detay,
    	urun_fiyat=:fiyat,
    	urun_resim=:resim
       ");
      $insert = $kaydet->execute(
       array(
      'baslik'    => $_POST[ 'urun_baslik' ],
     'detay'    => $_POST[ 'urun_detay' ],
     'fiyat'     => $_POST[ 'urun_fiyat' ],
     'kullanici_id'     => $_POST[ 'kullanici_id' ],
     'resim'    => $refimgyolss
    ));

      if ( $insert )
      {

       Header( "Location:../urunlerim.php" );
   }
   else
   {

       Header( "Location:../urunlerim.php" );
   }



}




if (isset($_POST['urunduzenle'])) {


if ( $_FILES[ 'urun_resim' ][ "size" ] > 0 )
  {

   $uploads_dir = '../img';
   @$tmp_name = $_FILES[ 'urun_resim' ][ "tmp_name" ];
   $benzersizsayi1 = rand( 20000, 32000 );
   $benzersizsayi2 = rand( 20000, 32000 );
   $uzanti = '.jpg';
   $benzersizad    = $benzersizsayi1 . $benzersizsayi2;
   $refimgyol      = substr( $uploads_dir, 3 ) . "/" . $benzersizad . $uzanti;
   @move_uploaded_file( $tmp_name, "$uploads_dir/$benzersizad$uzanti" );

   $duzenle = $db->prepare(
    "UPDATE urunler SET
       urun_baslik=:baslik,
    	kullanici_id=:kullanici_id,
    	urun_detay=:detay,
    	urun_fiyat=:fiyat,
    	urun_resim=:resim
    WHERE urunler_id={$_POST['urunler_id']}"
);
   $update  = $duzenle->execute(
    array(
   'baslik'    => $_POST[ 'urun_baslik' ],
     'detay'    => $_POST[ 'urun_detay' ],
     'fiyat'     => $_POST[ 'urun_fiyat' ],
     'kullanici_id'     => $_POST[ 'kullanici_id' ],
     'resim'    => $refimgyol
 )
);

   if ( $update )
   {

    $resimsilunlink = $_POST[ 'eski_yol' ];
    unlink( "../$resimsilunlink" );

    Header( "Location:../urunlerim.php?durum=ok" );
}
else
{

    Header( "Location:../urunlerim.php?durum=no" );
}
} else {
   $duzenle = $db->prepare(
    "UPDATE urunler SET
         urun_baslik=:baslik,
    	kullanici_id=:kullanici_id,
    	urun_detay=:detay,
    	urun_fiyat=:fiyat

    WHERE urunler_id={$_POST['urunler_id']}"
);
   $update  = $duzenle->execute(
    array(
 'baslik'    => $_POST[ 'urun_baslik' ],
     'detay'    => $_POST[ 'urun_detay' ],
     'fiyat'     => $_POST[ 'urun_fiyat' ],
     'kullanici_id'     => $_POST[ 'kullanici_id' ]
 )
);

   if ( $update )
   {


    Header( "Location:../urunlerim.php?durum=ok" );
}
else
{

    Header( "Location:../urunlerim.php?durum=no" );
}
}


}

if ( isset( $_POST[ 'mesajgonder' ] ) )
{


$sendid=$_POST[ 'sendid' ];

    $ayarkaydet = $db->prepare(
      "INSERT INTO mesaj SET
       mesaj_baslik=:baslik,
      mesaj_detay=:detay,
      userid=:userid,
      sendid=:sendid

      "
  );
    $update     = $ayarkaydet->execute(
      array(
          'baslik'     => htmlspecialchars($_POST[ 'mesaj_baslik' ]),
         'detay'     => htmlspecialchars($_POST[ 'mesaj_detay' ]),
         'userid'     => htmlspecialchars($_POST[ 'userid' ]),
         'sendid'     => htmlspecialchars($_POST[ 'sendid' ])
        
     )
  );

    if ( $update )
    {
      Header( "Location:../giden-mesajlar.php?durum=mesajgonderildi" );
      exit();
  }
  else
  {

      Header( "Location:../mesaj.php?durum=no" );
      exit();
  }
}

if ($_GET['mesajsil']=="ok") {
 
  $gidemesaj=$db->prepare("UPDATE mesaj SET 
 
    mesajgiden_sil=:sil
 
    where mesaj_id={$_GET['mesaj_id']}");
 
  $update=$gidemesaj->execute(array(

    'sil' => 1
  ));
 
  if ($update) {
 
    Header("Location:../giden-mesajlar.php");
 
  } else {
 
    Header("Location:../giden-mesajlar?sil=no");
  }
 
}
if ($_GET['gelenmesajsil']=="ok") {
 
  $gidemesaj=$db->prepare("UPDATE mesaj SET 
 
    mesajgelen_sil=:sil
 
    where mesaj_id={$_GET['mesaj_id']}");
 
  $update=$gidemesaj->execute(array(

    'sil' => 1
  ));
 
  if ($update) {
 
    Header("Location:../gelen-mesajlar.php");
 
  } else {
 
    Header("Location:../gelen-mesajlar?sil=no");
  }
 
}

if (isset($_POST['sepetekle'])) {
  if (empty($_POST[ 'kullanici_id' ])) {
    header("Location:../login.php");
    exit();
  }else{
 echo $adet=htmlspecialchars(trim($_POST[ 'urun_adet' ]));
 echo $kullanici_id=$_POST[ 'kullanici_id' ];


  $ayarekle=$db->prepare("INSERT INTO sepet SET
    urun_adet=:urun_adet,
    kullanici_id=:kullanici_id,
     satici_id=:satici_id,
    urun_id=:urun_id  
    
    ");

  $insert=$ayarekle->execute(array(
    'urun_adet' => $adet,
    'kullanici_id' => $_POST['kullanici_id'],
    'satici_id' => $_POST['satici_id'],
    'urun_id' => $_POST['urun_id']
    
    ));


  if ($insert) {

    Header("Location:../sepet.php?durum=ok");

  } else {

    Header("Location:../sepet.php?durum=no");
  }

}}

if ( $_GET[ 'sepetsil' ] == "ok" )
  {

    $sil     = $db->prepare( "DELETE from sepet where sepet_id=:sepet_id" );
    $kontrol = $sil->execute(
      array(
        'sepet_id' => $_GET[ 'sepet_id' ]
      )
    );

    if ( $kontrol )
    {


      Header( "Location:../sepet.php?sil=ok" );
    }
    else
    {

      Header( "Location:../../index.php?sayfa=urun-detay" );
    }
  }



//Sipariş İşlemi

if (isset($_POST['satinal'])) {

    $kaydet = $db->prepare(
      "INSERT INTO siparis SET
      kullanici_id=:kullanici_id,
      siparis_fiyat=:siparis_fiyat
      ");
    $insert = $kaydet->execute(
      array(
       'kullanici_id' => $_POST[ 'kullanici_id' ],
       'siparis_fiyat' => $_POST[ 'siparis_fiyat' ]

   ));
   

    if ( $insert )
    {
      //siparis basarılı kaydedilirse
$siparis_id= $db->lastInsertId();
      
  
  $kullanici_id= $_POST['kullanici_id'];
  $sepetsor=$db->prepare("SELECT * from sepet where kullanici_id=:id ");
  $sepetsor->execute(array(
    'id'=> $kullanici_id
  ));
  while ($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)) {

        echo $urun_id=$sepetcek['urun_id'];
        $urun_adet=$sepetcek['urun_adet'];          
       echo $satici_id=$sepetcek['satici_id'];    
        $urunsor=$db->prepare("SELECT * from urunler where urunler_id=:id ");
        $urunsor->execute(array(
          'id'=> $urun_id
          ));
        $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
        $urun_fiyat=$uruncek['urun_fiyat'];

      $kaydet = $db->prepare(
      "INSERT INTO siparis_detay SET
      siparis_id=:siparis_id,
          kullanici_id=:kullanici_id,
      satici_id=:satici_id,
      urunler_id=:urunler_id,
      urun_fiyat=:urun_fiyat,
      urun_adet=:urun_adet
       ");
    $insert = $kaydet->execute(
      array(
       'siparis_id' => $siparis_id,
       'satici_id' => $satici_id,
         'kullanici_id' => $kullanici_id,
       'urunler_id' => $urun_id,
       'urun_fiyat' => $urun_fiyat,
        'urun_adet' => $urun_adet
       ));
}
  
  if ($insert) {   

      //Sipariş detay kayıtta başarıysa sepeti boşalt
      $kullanici_id= $_POST['kullanici_id'];

      $sil=$db->prepare("DELETE from sepet where kullanici_id=:kullanici_id");
      $kontrol=$sil->execute(array(
        'kullanici_id' => $kullanici_id
      ));

      
      Header("Location:../siparis-durum.php?durum=ok");
      exit;


    }

  }
  else
  {



      Header("Location:../sepet.php?durum=hata" );
      exit();
  }


}

if (isset($_POST['siparisonayla'])) {
$id=$_POST['siparis_id'];
  $siparis=$db->prepare("UPDATE siparis_detay SET 
 
    siparis_durum=:durum
 
    where siparisdetay_id={$_POST['siparisdetay_id']}");
 
  $update=$siparis->execute(array(

    'durum' => 1
  ));
 
  if ($update) {
 
    Header("Location:../siparis-detay.php?siparis_id=$id");
 
  } else {
 
    Header("Location:../siparis-detay.php");
  }

}

?>