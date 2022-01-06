


<?php include 'header.php'; ?>
						<!--/app header-->												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">Kullanıcı Ekleme</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#"><i class="fe fe-file-text mr-2 fs-14"></i>kullanıcılar</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="#">Kullanıcı Ekleme</a></li>
								</ol>
							</div>
							
						</div>
                        <!--End Page header-->
					
						<form method="post" action="system/function.php">

						<div class="row" style="margin-left: 25%;">
							<div class="col-md-12 col-lg-6">
								<div class="card">
									<?php if (isset($_GET['sifre'])) {?>
										<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-exclamation mr-2" aria-hidden="true"></i>Şifreleriniz Uyuşmuyor</div>
									<?php } else {
										
									}
									 ?>
									 	<?php if (isset($_GET['durum'])) {?>
										<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-exclamation mr-2" aria-hidden="true"></i>Kullanıcı Başarıyla Oluşturuldu 
									</div>
									<?php } else {
										
									}
									 ?>
									<div class="card-header">
										<h3 class="card-title">Yeni Kullanıcı Ekle</h3>
									</div>
									<div class="card-body">
										<div class="form-row">
											<div class="form-group col-md-6 mb-0">
												<div class="form-group">
													<input type="text" class="form-control" id="name1" placeholder="Ad" name="name">
												</div>
											</div>
											<div class="form-group col-md-6 mb-0">
												<div class="form-group">
													<input type="text" class="form-control" id="name2" placeholder="Soyad" name="surname">
												</div>
											</div>
										</div>
										<div class="form-group ">
											<input type="email" class="form-control" id="inputEmail5" placeholder="mail">
										</div>
										<div class="form-group ">
											<input type="text" class="form-control" id="inputEmail5" placeholder="Kullanıcı Adı" name="user_name">
										</div>
										<div class="form-group ">
											<input type="password" class="form-control" id="inputEmail5" placeholder="Şifre" name="password1">
										</div>
										<div class="form-group ">
											<input type="password" class="form-control" id="inputEmail5" placeholder="Şifrenizi Tekrar Giriniz:" name="password2">
										</div>
										
									
										<div class="form-footer mt-2">
										</a><button class="btn btn-primary" name="user_add">Yeni Kullanıcı Ekle</button>
										</div>
									</div>
								</div>
							</div>
						
						</div>
			</form>
					</div>
				</div><!-- end app-content-->
            </div>
			<?php include 'footer.php'; ?>