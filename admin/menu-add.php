


<?php include 'header.php'; ?>    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
						<!--/app header-->												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">Menü Ekleme</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#"><i class="fe fe-file-text mr-2 fs-14"></i>Menü</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="#">Menü Ekleme</a></li>
								</ol>
							</div>
							
						</div>
                        <!--End Page header-->
					
						<form method="post" action="system/function.php">

						<div class="row" style="margin-left: 25%;">
							<div class="col-md-12 col-lg-6">
								<div class="card">
									
									 	<?php if (isset($_GET['durum'])) {?>
										<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-exclamation mr-2" aria-hidden="true"></i>Menü Başarıyla Oluşturuldu 
									</div>
									<?php } else {
										
									}
									 ?>
									<div class="card-header">
										<h3 class="card-title">Yeni Menü Ekle</h3>
									</div>
									<div class="card-body">
										
										<div class="form-group ">
											<input type="text" class="form-control" id="inputEmail5" placeholder="Menü Adı" name="menu_ad">
										</div>
										<div class="form-group ">
											<input type="text" class="form-control" id="inputEmail5" placeholder="Menü Keyword" name="menu_keyword">
										</div>
										<div class="form-group ">
											<input type="text" class="form-control" id="inputEmail5" placeholder="Menü Kısa" name="menu_kisa">
										</div>
										<div class="form-group ">
											<input type="text" class="form-control" id="inputEmail5" placeholder="Menü Sıra" name="menu_sira">
										</div>
										<div class="form-group ">
											 <!-- Bootstrap CSS -->

											<div class="form-check">
	<div class="form-check">
  <input class="form-check-input" type="radio"   name="menu_durum" value="1" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Aktif
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio"  id="flexRadioDefault2" value="0" name="menu_durum"  >
  <label class="form-check-label" for="flexRadioDefault2">
    Pasif
  </label>
</div>
										</div>
									
										<div class="form-footer mt-2">
										</a><button class="btn btn-primary" name="menu_add">Yeni Kullanıcı Ekle</button>
										</div>
									</div>
								</div>
							</div>
						
						</div>
			</form>
					</div>
				</div><!-- end app-content-->
            </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
			<?php include 'footer.php'; ?>