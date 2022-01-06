<?php include 'header.php'; 
?>




						<!--/app header-->												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">Ürün Ekleme</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="urunler.php"><i class="fe fe-file-text mr-2 fs-14"></i>Ürünler</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="#"></a>Ürün Ekleme</li>
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
										<h3 class="card-title">Ürün Ekleme</h3>
									</div>

									<div class="card-body">
										<div class="form-group ">
											<label>Ürün Fotoğrafı:</label><br>
										<br>	<input type="file" name="resim_yol">
										</div>
										<div class="form-group ">
												<label class="form-label">Ürün Adı</label>
											<input type="text" class="form-control" id="inputEmail5" value="<?php echo $uruncek['urun_ad']; ?>" name="urun_ad">
										</div>
										<div class="form-group ">
										
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
											<input type="number" class="form-control" id="inputEmail5" name="urun_fiyat">
										</div>
									<div class="form-group ">
												<label class="form-label">Ürün İndirimli Fiyat</label>
											<input type="text" class="form-control" id="inputEmail5"  name="urun_indirimli">
										</div>
												<div class="form-group ">
												<label class="form-label">Ürün Adet</label>
											<input type="text" class="form-control" id="inputEmail5"  name="urun_adet">
										</div>
													<div class="form-group ">
												<label class="form-label">Satıcı ID</label>
											<input type="text" class="form-control" id="inputEmail5"  name="urun_satici">
										</div>
								<label class="form-label">Ürün Açıklama</label>
										<textarea class="content" name="urun_aciklama"></textarea>
										<br>
									
										<input type="hidden" name="urun_taksit" value="<?php echo $uruncek['urun_id']; ?>">
									<input type="hidden" name="urun_iade" value="<?php echo $uruncek['urun_id']; ?>">
										<button class="btn btn-primary" name="urun_add">Ürünü Düzenle</button>
									</div>

								</div>
							
							</div>
						</div>
						<!-- End Row -->

					

					</div></form>
				</div><!-- end app-content-->
			</div>
			<?php include 'footer.php'; ?>