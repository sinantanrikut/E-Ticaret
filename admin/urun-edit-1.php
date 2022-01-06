<?php include 'header.php'; 


$i= $_GET['urun_id'];

 $urunsor=$db->prepare("select * from urun where urun_id=:id ");
                $urunsor->execute(array(

    'id' =>$i
  ) );

      $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
?>




						<!--/app header-->												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">Ürün Düzenle</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="urunler.php"><i class="fe fe-file-text mr-2 fs-14"></i>Ürünler</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="#"></a>Ürün Düzenle</li>
								</ol>
							</div>
							<div class="page-rightheader">
							
							</div>
						</div>
                        <!--End Page header-->
								<form action="system/function.php" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">				<!-- Row -->
						<div class="row row-cards">
							<div class="col-md-12">
								
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Ürün Düzenle</h3>
									</div>

									<div class="card-body">
										<div class="form-group ">
											<label>Ürün Fotoğrafı:</label><br>
											<img width="200px" src="<?php echo $uruncek['urun_resim']; ?>">
										<br>	<input type="file" name="resim_yol">
										</div>
										<div class="form-group ">
												<label class="form-label">Ürün Adı</label>
											<input type="text" class="form-control" id="inputEmail5" value="<?php echo $uruncek['urun_ad']; ?>" name="urun_ad">
										</div>
										<div class="form-group ">
											<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
											<label class="form-label">Ürün Kategorisi</label>
												<select class="form-select" aria-label="Default select example" name="urun_kategori">

  <?php 
  $kategorisor=$db->prepare("SELECT * FROM urun_kategori ");
  $kategorisor->execute(); 
  ?>	<?php while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)){ ?>
  <option value="<?php echo $kategoricek['kategori_id']; ?>"><?php echo $kategoricek['kategori_ad']; ?></option>
 <?php } ?>
</select>
											
										</div>
									<div class="form-group ">
												<label class="form-label">Ürün Fiyat</label>
											<input type="number" class="form-control" id="inputEmail5" value="<?php echo $uruncek['urun_fiyat']; ?>" name="urun_fiyat">
										</div>
									<div class="form-group ">
												<label class="form-label">Ürün İndirimli Fiyat</label>
											<input type="text" class="form-control" id="inputEmail5" value="<?php echo $uruncek['urun_indirimli']; ?>" name="urun_indirimli">
										</div>
												<div class="form-group ">
												<label class="form-label">Ürün Adet</label>
											<input type="text" class="form-control" id="inputEmail5" value="<?php echo $uruncek['urun_adet']; ?>" name="urun_adet">
										</div>
													<div class="form-group ">
												<label class="form-label">Satıcı ID</label>
											<input type="text" class="form-control" id="inputEmail5" value="<?php echo $uruncek['urun_satici']; ?>" name="urun_satici">
										</div>
								<label class="form-label">Ürün Açıklama</label>
										<textarea class="content" name="urun_aciklama"><?php echo $uruncek['urun_aciklama']; ?></textarea>
										<br>
									<label class="form-label">Ürün İade Koşulları</label>
										<textarea class="content" name="urun_iade"><?php echo $uruncek['urun_iade']; ?></textarea>
										<br>
										<input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id']; ?>">
										<input type="hidden" name="urun_resim" value="<?php echo $uruncek['urun_resim']; ?>">
									<label class="form-label">Ürün Taksit</label>
										<textarea class="content" name="urun_taksit"><?php echo $uruncek['urun_taksit']; ?></textarea>
										<br>
										<button class="btn btn-primary" name="urun_edit">Ürünü Düzenle</button>
									</div>

								</div>
							
							</div>
						</div>
						<!-- End Row -->

					

					</div></form>
				</div><!-- end app-content-->
			</div>
			<?php include 'footer.php'; ?>