<?php
ob_start();
session_start();
include 'config.php';

if (isset($_POST['giris'])) {

$username=$_POST['name'];
$password=htmlspecialchars(md5(md5($_POST['password'])));


if ($username && $password) {

  $usersor=$db->prepare("SELECT * from user where user_name=:name and user_pass=:password");

  $usersor->execute(array(

    'name' => $username,

    'password' => $password

    ));

    $say=$usersor->rowCount();

    if ($say>0) {

        $_SESSION['user']=$username;

$user_id=$_SESSION['user_id'];
    header('Location:../../index.php');
} else{
  header('Location:../../login.php?durum=hatali');
}


}
}

// Dark tema ayarı

if (isset($_GET['tema'])) {
$url=$_GET['url'];
    $tema=1;
    if($_GET['tema']=="0"){
      $tema=1;
    }else{
      $tema=0;
    }
     $a=$_SESSION['user_id'];
    
  $ayarkaydet=$db->prepare("UPDATE user SET

	

		tema=:tema

		WHERE user_id= $a ");

	$update=$ayarkaydet->execute(array(


		'tema' => $tema

		));



	if ($update) {


		Header("Location:../$url");


	} else {


		Header("Location:../production/genel-ayar.php?durum=no");

	}

}

// Profil işlemleri

// Şifre Değiştirme
if (isset($_POST['passedit'])) {

  $username=$_POST['name'];
  $user_id=$_POST['id'];
   $password=htmlspecialchars(md5(md5($_POST['pass'])));

  $password1=htmlspecialchars(md5(md5($_POST['pass1'])));
  $password2=htmlspecialchars(md5(md5($_POST['pass2'])));


  if ($username && $password) {

    $usersor=$db->prepare("SELECT * from user where user_name=:name and user_pass=:password");
  
    $usersor->execute(array(
  
      'name' => $username,
  
      'password' => $password
  
      ));
  
      $say=$usersor->rowCount();
  
      if ($say>0) {


  if ($password1==$password2) {
 
 $ayarkaydet=$db->prepare("UPDATE user SET

  

    user_pass=:user_pass

    WHERE user_id=$user_id ");

  $update=$ayarkaydet->execute(array(


    'user_pass' => $password1

    ));



  if ($update) {


    Header("Location:../profile.php?sifre=ok");


  } else {


    Header("Location:../production/genel-ayar.php?durum=no");

  }


  } else{
    header('Location:../profile.php?durum=sifreuyusmuyor');
  }


  } else{
    header('Location:../profile.php?durum=sifreyanlis');
  }
  
  
  }



}elseif (isset($_POST['profileupdate'])) {

   $yol=$_POST['yol'];
  
  $user_id=$_POST['id'];
$about= $_POST['about'];

  $ayarkaydet=$db->prepare("UPDATE user SET

    name=:name,
    surname=:surname,
    mail=:mail,
    phone=:phone,
    adress=:adress,
    city=:city,
    zip=:zip,
    about=:about
    
    WHERE user_id=$user_id");

  $update=$ayarkaydet->execute(array(

    'name' => $_POST['name'],

    'surname' => $_POST['surname'],
    'phone' => $_POST['phone'],
    'adress' => $_POST['adress'],
    'city' => $_POST['city'],
    'zip' => $_POST['zip'],
    'about' => $_POST['about'],
    'mail' => $_POST['mail']


    ));



  if ($update) {


header("Location: http://$yol&durum1=ok");


  } else {


    Header("Location:../profile.php?profile=no");

  }


}
// Profil Fotoğrafı Ekleme
elseif (isset($_POST['profilephoto'])) {
   $yol=$_POST['yol'];
  $user_id=$_POST['id'];
  $uploads_dir = '../assets/images/users';

  @$tmp_name = $_FILES['resim_yol']["tmp_name"];

  @$name = $_FILES['resim_yol']["name"];

  $benzersizsayi1=rand(20000,32000);

  $benzersizsayi2=rand(20000,32000);

  $benzersizsayi3=rand(20000,32000);

  $benzersizsayi4=rand(20000,32000);

  $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

  $refimgyol=substr($uploads_dir, 3)."/".$benzersizad.$name;

  @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");



$duzenle=$db->prepare("UPDATE user SET

      user_photo=:user_photo 

      WHERE user_id={$user_id}");

    $update=$duzenle->execute(array(


      'user_photo' => $refimgyol,

      ));

  


    if ($update) {

      header("Location: http://$yol&durum1=ok");


    } else {

      Header("Location:../production/slider-duzenle.php?durum=no");

    }

}



if (isset($_POST['user_add'])) {

$password1=$_POST['password1'];
$password2=$_POST['password2'];




$password=htmlspecialchars(md5(md5($_POST['password1'])));


if ($password1==$password2) {
  $kaydet=$db->prepare("INSERT INTO user SET




    name=:name,

    surname=:surname,

    mail=:mail,

    user_name=:user_name,

    user_pass=:user_pass

    ");

  $insert=$kaydet->execute(array(



    'name' => $_POST['name'],

    'surname' => $_POST['surname'],

    'mail' => $_POST['mail'],
    'user_name' => $_POST['user_name'],
    'user_pass' => $password

    ));



  if ($insert) {



    Header("Location:../production/menu.php?durum=ok");



  } else {



    Header("Location:../user-add.php?durum=ok");

  }
}else{
   Header("Location:../user-add.php?sifre=yanlis");
}
}

if (isset($_GET['menusil'])) {
 

 $sil=$db->prepare("DELETE from menu where menu_id=:menu_id");

  $kontrol=$sil->execute(array(

    'menu_id' => $_GET['menu_id']

    ));


  if ($kontrol) {

    Header("Location:../menu.php?durum=ok");

  } else {
    Header("Location:../menu.php?durum=no");
  }





} 

//Menü ekleme işlemi



if (isset($_POST['menu_add'])) {



  $kaydet=$db->prepare("INSERT INTO menu SET


    menu_ad=:menu_ad,

    menu_keyword=:menu_keyword,

    menu_kisa=:menu_kisa,

    menu_sira=:menu_sira,

    menu_durum=:menu_durum

    ");

  $insert=$kaydet->execute(array(



    'menu_ad' => $_POST['menu_ad'],

    'menu_keyword' => $_POST['menu_keyword'],

    'menu_kisa' => $_POST['menu_kisa'],
    'menu_sira' => $_POST['menu_sira'],
    'menu_durum' => $_POST['menu_durum']

    ));



  if ($insert) {



    Header("Location:../menu-add.php?durum=ok");



  } else {



    Header("Location:../user-add.php?durum=ok");

  }
}




if (isset($_POST['menu_edit'])) {



  $a=$_POST['menu_id'];

  $ayarkaydet=$db->prepare("UPDATE menu SET

    menu_ad=:menu_ad,

    menu_keyword=:menu_keyword,

    menu_kisa=:menu_kisa,

    menu_sira=:menu_sira,

    menu_durum=:menu_durum

    WHERE menu_id= $a ");

  $update=$ayarkaydet->execute(array(

  'menu_ad' => $_POST['menu_ad'],

    'menu_keyword' => $_POST['menu_keyword'],

    'menu_kisa' => $_POST['menu_kisa'],
    'menu_sira' => $_POST['menu_sira'],
    'menu_durum' => $_POST['menu_durum']
    ));


  if ($update) {

    Header("Location:../menu-edit.php?menu_id=$a&durum=ok");

  } else {

    Header("Location:../menu-edit.php?menu_id=$a&durum=no");

  }
} 


if (isset($_GET['urunsil'])) {
 

 $sil=$db->prepare("DELETE from urun where urun_id=:urun_id");

  $kontrol=$sil->execute(array(

    'urun_id' => $_GET['urun_id']

    ));


  if ($kontrol) {

    Header("Location:../urunler.php?durum=ok");

  } else {
    Header("Location:../urunler.php?durum=no");
  }

} 


//Ürün Editleme Kısmı
if (isset($_POST['urun_edit'])) {

   $a=$_POST['urun_id'];

if (isset($_POST['resim_yol']) ) {
 
  $uploads_dir = '../../img/urun';

  @$tmp_name = $_FILES['resim_yol']["tmp_name"];

  @$name = $_FILES['resim_yol']["name"];

  $benzersizsayi1=rand(20000,32000);

  $benzersizsayi2=rand(20000,32000);

  $benzersizsayi3=rand(20000,32000);

  $benzersizsayi4=rand(20000,32000);

  $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

  $refimgyol=substr($uploads_dir, 3)."/".$benzersizad.$name;

  @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

} else {
  $refimgyol=$_POST['urun_resim'];
}


  $ayarkaydet=$db->prepare("UPDATE urun SET

    urun_resim=:urun_resim,

    urun_ad=:urun_ad,

    urun_kategori=:urun_kategori,

    urun_fiyat=:urun_fiyat,

 urun_indirimli=:urun_indirimli,

 urun_adet=:urun_adet,

 urun_satici=:urun_satici,

 urun_aciklama=:urun_aciklama,

 urun_iade=:urun_iade,
 urun_taksit=:urun_taksit


    WHERE urun_id= $a ");

  $update=$ayarkaydet->execute(array(

   'urun_resim' =>$refimgyol,
    'urun_ad' => $_POST['urun_ad'],
    'urun_kategori' => $_POST['urun_kategori'],
    'urun_fiyat' => $_POST['urun_fiyat'],
    'urun_indirimli' => $_POST['urun_indirimli'],
    'urun_adet' => $_POST['urun_adet'],
    'urun_satici' => $_POST['urun_satici'],
    'urun_aciklama' => $_POST['urun_aciklama'],
     'urun_iade' => $_POST['urun_iade'],  
     'urun_taksit' => $_POST['urun_taksit']
   
    ));


  if ($update) {

    Header("Location:../urun-edit.php?urun_id=$a&durum=ok");

  } else {

    Header("Location:../urun-edit.php?urun_id=$a&durum=no");

  }
} 




if (isset($_POST['urun_add'])) {


  $uploads_dir = '../../img/urun';

  @$tmp_name = $_FILES['resim_yol']["tmp_name"];

  @$name = $_FILES['resim_yol']["name"];

  $benzersizsayi1=rand(20000,32000);

  $benzersizsayi2=rand(20000,32000);

  $benzersizsayi3=rand(20000,32000);

  $benzersizsayi4=rand(20000,32000);

  $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

  $refimgyol=substr($uploads_dir, 3)."/".$benzersizad.$name;

  @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

  $kaydet=$db->prepare("INSERT INTO urun SET


     urun_resim=:urun_resim,

    urun_ad=:urun_ad,

    urun_kategori=:urun_kategori,

    urun_fiyat=:urun_fiyat,

 urun_indirimli=:urun_indirimli,

 urun_adet=:urun_adet,

 urun_satici=:urun_satici,

 urun_aciklama=:urun_aciklama,

 urun_iade=:urun_iade,
 urun_taksit=:urun_taksit
    ");

  $insert=$kaydet->execute(array(



       'urun_resim' =>$refimgyol,
    'urun_ad' => $_POST['urun_ad'],
    'urun_kategori' => $_POST['urun_kategori'],
    'urun_fiyat' => $_POST['urun_fiyat'],
    'urun_indirimli' => $_POST['urun_indirimli'],
    'urun_adet' => $_POST['urun_adet'],
    'urun_satici' => $_POST['urun_satici'],
    'urun_aciklama' => $_POST['urun_aciklama'],
     'urun_iade' => $_POST['urun_iade'],  
     'urun_taksit' => $_POST['urun_taksit']

    ));



  if ($insert) {



    Header("Location:../urun-add.php?durum=ok");



  } else {



    Header("Location:../urun-add.php?durum=ok");

  }
}


if (isset($_GET['slidersil'])) {
 

 $sil=$db->prepare("DELETE from slider where slider_id=:slider_id");

  $kontrol=$sil->execute(array(

    'slider_id' => $_GET['slider_id']

    ));


  if ($kontrol) {

    Header("Location:../slider.php?durum=ok");

  } else {
    Header("Location:../slider.php?durum=no");
  }

} 


if (isset($_POST['slider_add'])) {
  

  $uploads_dir = '../../img/slider';

  @$tmp_name = $_FILES['resim_yol']["tmp_name"];

  @$name = $_FILES['resim_yol']["name"];

  $benzersizsayi1=rand(20000,32000);

  $benzersizsayi2=rand(20000,32000);

  $benzersizsayi3=rand(20000,32000);

  $benzersizsayi4=rand(20000,32000);

  $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

  $refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;

  @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

  $kaydet=$db->prepare("INSERT INTO slider SET


     slider_resim=:slider_resim,

    slider_link=:slider_link,

    slider_sira=:slider_sira

    ");

  $insert=$kaydet->execute(array(



       'slider_resim' =>$refimgyol,
    'slider_link' => $_POST['slider_link'],
    'slider_sira' => $_POST['slider_sira']
    ));



  if ($insert) {



    Header("Location:../slider-add.php?durum=ok");



  } else {



    Header("Location:../slider-add.php?durum=ok");

  }


} 







  

//Slider Editleme Kısmı
if (isset($_POST['slider_edit'])) {

   $a=$_POST['slider_id'];

if (isset($_POST['resim_yol']) ) {
 
  $uploads_dir = '../../img/slider';

  @$tmp_name = $_FILES['resim_yol']["tmp_name"];

  @$name = $_FILES['resim_yol']["name"];

  $benzersizsayi1=rand(20000,32000);

  $benzersizsayi2=rand(20000,32000);

  $benzersizsayi3=rand(20000,32000);

  $benzersizsayi4=rand(20000,32000);

  $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

  $refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;

  @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

} else {
  $refimgyol=$_POST['slider_resim'];
}


  $ayarkaydet=$db->prepare("UPDATE slider SET

    slider_resim=:slider_resim,

    slider_link=:slider_link,

    slider_sira=:slider_sira



    WHERE slider_id= $a ");

  $update=$ayarkaydet->execute(array(

   'slider_resim' =>$refimgyol,
    'slider_link' => $_POST['slider_link'],
    'slider_sira' => $_POST['slider_sira']
   
    ));


  if ($update) {

    Header("Location:../slider-edit.php?slider_id=$a&durum=ok");

  } else {

    Header("Location:../slider-edit.php?slider_id=$a&durum=no");

  }
} 

// Sepet İşlemleri

if (isset($_POST['sepetekle'])) {
  if (empty($_POST[ 'user_id' ])) {
    header("Location:../../login.php");
    exit();
  }else{

 echo $user_id=$_POST[ 'kullanici_id' ];


  
  $ayarekle=$db->prepare("INSERT INTO sepet SET
    urun_adet=:urun_adet,
    user_id=:user_id,
     user_satici=:user_satici,
    urun_id=:urun_id  
    
    ");

  $insert=$ayarekle->execute(array(
    'urun_adet' => $_POST['urun_adet'],
    'user_id' => $_POST['user_id'],
    'user_satici' => $_POST['user_satici'],
    'urun_id' => $_POST['urun_id']
    
    ));


  if ($insert) {

    Header("Location:../../sepet.php?durum=ok");

  } else {

    Header("Location:../../sepet.php?durum=no");
  }

}}



if ( isset($_GET[ 'sepetsil' ]))
  {

    $sil     = $db->prepare( "DELETE from sepet where sepet_id=:sepet_id" );
    $kontrol = $sil->execute(
      array(
        'sepet_id' => $_GET[ 'sepet_id' ]
      )
    );

    if ( $kontrol )
    {


      Header( "Location:../../sepet.php?sil=ok" );
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
      user_id=:user_id,
      siparis_fiyat=:siparis_fiyat
      ");
    $insert = $kaydet->execute(
      array(
       'user_id' => $_POST[ 'user_id' ],
       'siparis_fiyat' => $_POST[ 'siparis_fiyat' ]

   ));
   

    if ( $insert )
    {
      //siparis basarılı kaydedilirse
$siparis_id= $db->lastInsertId();
     
  $user_id= $_POST['user_id'];
  $sepetsor=$db->prepare("SELECT * from sepet where user_id=:id ");
  $sepetsor->execute(array(
    'id'=> $user_id
  ));
  while ($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)) {

        echo $urun_id=$sepetcek['urun_id'];
        $urun_adet=$sepetcek['urun_adet'];          
       echo $satici_id=$sepetcek['user_satici'];    
        $urunsor=$db->prepare("SELECT * from urun where urun_id=:id ");
        $urunsor->execute(array(
          'id'=> $urun_id
          ));
        $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
        $urun_fiyat=$uruncek['urun_fiyat'];

      $kaydet = $db->prepare(
      "INSERT INTO siparis_detay SET
      siparis_id=:siparis_id,
     user_id=:user_id,
      satici_id=:satici_id,
      urun_id=:urun_id,
      urun_fiyat=:urun_fiyat,
      urun_adet=:urun_adet
       ");
    $insert = $kaydet->execute(
      array(
       'siparis_id' => $siparis_id,
       'satici_id' => $satici_id,
         'user_id' => $user_id,
       'urun_id' => $urun_id,
       'urun_fiyat' => $urun_fiyat,
        'urun_adet' => $urun_adet
       ));
}
  
  if ($insert) {   

      //Sipariş detay kayıtta başarıysa sepeti boşalt
      $user_id= $_POST['user_id'];

      $sil=$db->prepare("DELETE from sepet where user_id=:user_id");
      $kontrol=$sil->execute(array(
        'user_id' => $user_id
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

 ?>
