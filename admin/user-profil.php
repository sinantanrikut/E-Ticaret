<?php include 'header.php'; 


$i= $_GET['user_id'];

 $usersor=$db->prepare("select * from user where user_id=:id ");
                $usersor->execute(array(

    'id' =>$i
  ) );

      $usercek=$usersor->fetch(PDO::FETCH_ASSOC);
    
?>				



								<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">Profili Düzenleyin</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#"><i class="fe fe-layers mr-2 fs-14"></i>Sayfalar</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="#">Profil</a></li>
								</ol>
							</div>

						</div>
                        <!--End Page header-->
												<!-- Row -->
						<div class="row">
							<div class="col-xl-3 col-lg-4">
								<div class="card box-widget widget-user">
									<div class="widget-user-image mx-auto mt-5"><img alt="User Avatar" width="128px" class="rounded-circle" src="



<?php   if (strlen($usercek['user_photo'])>0) {
	echo $usercek['user_photo'];
 } else { echo "assets/images/users/default.jpg"; }  ?>

										



										"></div>




		<form action="system/function.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
									<div class="card-body text-center pt-2">
										<div class="pro-user">
								
									<input type="file" name="resim_yol">
											<input type="hidden" name="id" value="<?php echo $usercek['user_id']; ?>">
												<input type="hidden" name="yol" value="<?php  $y=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; echo $y; ?>">
									<button type="submit" name="profilephoto" class="btn btn-danger mt-3">Güncelle</button>
										</div>
									</div>
									</form>




								</div>
								<div class="card">


<!-- Password Change-->

<?php if ($_GET['sifre']=="ok") {?>

	<script type="text/javascript">
	swal("Şifreniz Başarıyla Değiştirilmiştir", "Bilgileriniz artık güncel.", "success");
</script>
<?php 
}elseif ($_GET['profile']=="ok") {
	?>

	<script type="text/javascript">
	swal("Profiliniz GÜncellenmiştir", "Bilgileriniz artık güncel.", "success");
</script>
<?php 
}  ?>

									<div class="card-header">
										<div class="card-title">Şifreni Değiştir</div>
									</div>
									<div class="card-body">
										<div class="text-center mb-5">
											<div class="widget-user-image">
												<img alt="User Avatar" class="rounded-circle  mr-3" src="<?php   if (strlen($usercek['user_photo'])>0) {
	echo $usercek['user_photo'];
 } else { echo "assets/images/users/default.jpg"; }  ?>
">
											</div>
										</div>

<form action="system/function.php" method="post">

										<div class="form-group">
											<label class="form-label">Şifrenizi Giriniz:</label>
											<input type="password" class="form-control" name="pass" placeholder="Şifrenizi Giriniz">
										</div>
										<div class="form-group">
											<label class="form-label">Yeni Şifre:</label>
											<input type="password" class="form-control" name="pass1" placeholder="Yeni Şifreyi Giriniz">
										</div>
										<div class="form-group">
											<label class="form-label">Yeni Şifre Tekrar:</label>
											<input type="password" class="form-control" name="pass2" placeholder="Yeni Şifreyi Tekrar Giriniz">
										</div>
									</div>
									<div class="card-footer text-right">
									<input type="hidden" name="name" value="<?php echo $usercek['user_name']; ?>">
									<input type="hidden" name="id" value="<?php echo $usercek['user_id']; ?>">
										<button type="submit" name="passedit" class="btn btn-primary">Güncelle</button>


										<a href="profile.php" class="btn btn-danger">İptal</a>
									</div>



								</div>
							</div>
</form>
							<div class="col-xl-9 col-lg-8">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Profili Düzenleyin</div>
									</div>	<form action="system/function.php" method="post">
									<div class="card-body">
										<?php if (isset($_GET['durum1'])) {?>
										<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-exclamation mr-2" aria-hidden="true"></i>Başarıyla Güncellendi</div>
									<?php } else {
										
									}
									 ?>
										<div class="card-title font-weight-bold">Kişisel Bİlgiler:</div>
										<div class="row">

											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Ad</label>
													<input type="text" class="form-control" name="name" value="<?php echo $usercek['name']; ?>">
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Soyad</label>
													<input type="text" class="form-control" name="surname" value="<?php echo $usercek['surname']; ?>">
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Email Adres</label>
													<input type="email" class="form-control" name="mail" value="<?php echo $usercek['mail']; ?>" >
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Phone Number</label>
													<input type="text" class="form-control" name="phone" value="<?php echo $usercek['phone']; ?>">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="form-label">Address</label>
													<input type="text" class="form-control" name="adress"  value="<?php echo $usercek['adress']; ?>">
												</div>
											</div>
											<div class="col-sm-6 col-md-4">
												<div class="form-group">
													<label class="form-label">City</label>
													<input type="text" class="form-control" placeholder="City" name="city"  value="<?php echo $usercek['city']; ?>">
												</div>
											</div>
											<div class="col-sm-6 col-md-3">
												<div class="form-group">
													<label class="form-label">Postal Code</label>
													<input type="text" class="form-control" name="zip"  value="<?php echo $usercek['city']; ?>">
												</div>
											</div>
										
										</div>
										<div class="card-title font-weight-bold mt-5">External Links:</div>
										<div class="row">
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Facebook</label>
													<input type="text" class="form-control" placeholder="https://www.facebook.com/">
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Google</label>
													<input type="text" class="form-control" placeholder="https://www.google.com/">
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Twitter</label>
													<input type="text" class="form-control" placeholder="https://twitter.com/">
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Pinterest</label>
													<input type="text" class="form-control" placeholder="https://in.pinterest.com/">
												</div>
											</div>
										</div>
										<div class="card-title font-weight-bold mt-5">About:</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="form-label">About Me</label>
													<textarea rows="5" class="form-control" name="about"  placeholder="Enter About your description" > <?php echo $usercek['about']; ?></textarea>
												</div>
											</div>
										</div>
									</div>
									<input type="hidden" name="id" value="<?php echo $usercek['user_id']; ?>">
									<input type="hidden" name="yol" value="<?php  $y=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; echo $y; ?>">
									<div class="card-footer text-right">
										<button type="submit" class="btn btn-primary" name="profileupdate">Güncelle</button>
								</form>
										<a href="profile.php" class="btn btn-danger">İptal</a>

									</div>
								</div>
							</div>




							
						</div>
						<!-- End Row-->

					</div>
				</div><!-- end app-content-->
            </div>
						<!--Footer-->
		<?php include 'footer.php'; ?>
