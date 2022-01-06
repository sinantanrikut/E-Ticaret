<?php include 'header.php'; 
?>




						<!--/app header-->												<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title mb-0">Slider Ekleme</h4>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="urunler.php"><i class="fe fe-file-text mr-2 fs-14"></i>Slider</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="#"></a>Slider Ekleme</li>
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
										<h3 class="card-title">Slider Ekleme</h3>
									</div>

									<div class="card-body">
										<div class="form-group ">
											<label>Slider Fotoğrafı:</label><br>
										<br>	<input type="file" name="resim_yol">
										</div>
										
										<div class="form-group ">
												<label class="form-label">Slider Link</label>
											<input type="text" class="form-control" id="inputEmail5" name="slider_link">
										</div>
										<div class="form-group ">
										
											
									<div class="form-group ">
												<label class="form-label">Slider Sıra</label>
											<input type="number" class="form-control" id="inputEmail5" name="slider_sira">
										</div>
									
										<button class="btn btn-primary" name="slider_add">Slider Ekleme</button>
									</div>

								</div>
							
							</div>
						</div>
						<!-- End Row -->

					

					</div></form>
				</div><!-- end app-content-->
			</div>
			<?php include 'footer.php'; ?>