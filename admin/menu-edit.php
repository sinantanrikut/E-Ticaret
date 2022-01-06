
<?php include 'header.php'; 




$i= $_GET['menu_id'];

 $menusor=$db->prepare("select * from menu where menu_id=:id ");
                $menusor->execute(array(

    'id' =>$i
  ) );

      $menucek=$menusor->fetch(PDO::FETCH_ASSOC);
?>





   
						<!--/app header-->												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">Menü Düzenleme</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#"><i class="fe fe-file-text mr-2 fs-14"></i>Menü</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="#">Menü Düzenleme</a></li>
								</ol>
							</div>
							
						</div>
                        <!--End Page header-->
					
						<form method="post" action="system/function.php">

						<div class="row" style="margin-left: 25%;">
							<div class="col-md-12 col-lg-6">
								<div class="card">
									
									 	<?php if (isset($_GET['durum'])) {?>
										<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-exclamation mr-2" aria-hidden="true"></i>Menü Başarıyla Düzenlendi 
									</div>
									<?php } else {
										
									}
									 ?>
									<div class="card-header">
										<h3 class="card-title">Menü Düzenle</h3>
									</div>
									<div class="card-body">
										
										<div class="form-group ">
											<input type="text" class="form-control" id="inputEmail5" value="<?php echo $menucek['menu_ad']; ?>" name="menu_ad">
										</div>
										<div class="form-group ">
											<input type="text" class="form-control" id="inputEmail5" value="<?php echo $menucek['menu_keyword']; ?>" name="menu_keyword">
										</div>
										<div class="form-group ">
											<input type="text" class="form-control" id="inputEmail5" value="<?php echo $menucek['menu_kisa']; ?>" name="menu_kisa">
										</div>
										<div class="form-group ">
											<input type="text" class="form-control" id="inputEmail5" value="<?php echo $menucek['menu_sira']; ?>" name="menu_sira">
										</div>
										<div class="form-group ">
											 <!-- Bootstrap CSS -->

											<div class="form-check">
	<div class="form-check">
  <input class="form-check-input" type="radio"   name="menu_durum" value="1" id="flexRadioDefault1" <?php if ($menucek['menu_durum']=="1") {
  	echo "checked";
  } 
   ?>>
  <label class="form-check-label" for="flexRadioDefault1">
    Aktif
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio"  id="flexRadioDefault2" value="0" name="menu_durum" <?php if ($menucek['menu_durum']=="0") {
  	echo "checked";
  } ?> >
  <label class="form-check-label" for="flexRadioDefault2">
    Pasif
  </label>
</div>
										</div>
									
						<input type="hidden" name="menu_id" value="<?php echo $menucek['menu_id']; ?>">
										<div class="form-footer mt-2">
										</a><button class="btn btn-danger mt-3" name="menu_edit">Düzenle</button>
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