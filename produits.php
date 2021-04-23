<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

//Inclusion de la barre de navigation Bootstrap
include "./html/barreDeNavigation.html";
?>


<!DOCTYPE html>

<html lang="fr">

<html>
	<head>
		<title>Produits</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="libs/bootstrap-5.0.0/css/Bootstrap.css">    
	</head>
	
	
	</body>
		<div class="container py-5">
			<div class="row text-center text-white mb-5">
				<div class="col-lg-7 mx-auto">
					<h1 class="display-4">Product List</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 mx-auto">
					<!-- List group-->
					<ul class="list-group shadow">
						<!-- list group item-->
						<li class="list-group-item">
							<!-- Custom content-->
							<div class="media align-items-lg-center flex-column flex-lg-row p-3">
								<div class="media-body order-2 order-lg-1">
									<h5 class="mt-0 font-weight-bold mb-2">Apple iPhone XR (Red, 128 GB)</h5>
									<p class="font-italic text-muted mb-0 small">128 GB ROM | 15.49 cm (6.1 inch) Display 12MP Rear Camera | 7MP Front Camera A12 Bionic Chip Processor</p>
									<div class="d-flex align-items-center justify-content-between mt-1">
										<h6 class="font-weight-bold my-2">₹64,999</h6>
										<ul class="list-inline small">
											<li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
											<li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
											<li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
											<li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
											<li class="list-inline-item m-0"><i class="fa fa-star-o text-gray"></i></li>
										</ul>
									</div>
								</div><img src="https://i.imgur.com/KFojDGa.jpg" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
							</div> <!-- End -->
						</li> <!-- End -->
						<!-- list group item-->
						<li class="list-group-item">
							<!-- Custom content-->
							<div class="media align-items-lg-center flex-column flex-lg-row p-3">
								<div class="media-body order-2 order-lg-1">
									<h5 class="mt-0 font-weight-bold mb-2">Apple iPhone XS (Silver, 64 GB)</h5>
									<p class="font-italic text-muted mb-0 small">64 GB ROM | 14.73 cm (5.8 inch) Super Retina HD Display 12MP + 12MP | 7MP Front Camera A12 Bionic Chip Processor</p>
									<div class="d-flex align-items-center justify-content-between mt-1">
										<h6 class="font-weight-bold my-2">₹99,900</h6>
										<ul class="list-inline small">
											<li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
											<li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
											<li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
											<li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
											<li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
										</ul>
									</div>
								</div><img src="https://i.imgur.com/KFojDGa.jpg" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
							</div> <!-- End -->
						</li> <!-- End -->
						<!-- list group item -->
						<li class="list-group-item">
							<!-- Custom content-->
							<div class="media align-items-lg-center flex-column flex-lg-row p-3">
								<div class="media-body order-2 order-lg-1">
									<h5 class="mt-0 font-weight-bold mb-2">Apple iPhone XS Max (Gold, 64 GB)</h5>
									<p class="font-italic text-muted mb-0 small">64 GB ROM | 16.51 cm (6.5 inch) Super Retina HD Display 12MP + 12MP | 7MP Front Camera A12 Bionic Chip Processor</p>
									<div class="d-flex align-items-center justify-content-between mt-1">
										<h6 class="font-weight-bold my-2">₹1,09,900</h6>
										<ul class="list-inline small">
											<li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
											<li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
											<li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
											<li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
											<li class="list-inline-item m-0"><i class="fa fa-star-o text-gray"></i></li>
										</ul>
									</div>
								</div><img src="https://i.imgur.com/KFojDGa.jpg" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
							</div> <!-- End -->
						</li> <!-- End -->
						<!-- list group item -->
						<li class="list-group-item">
							<!-- Custom content-->
							<div class="media align-items-lg-center flex-column flex-lg-row p-3">
								<div class="media-body order-2 order-lg-1">
									<h5 class="mt-0 font-weight-bold mb-2">OnePlus 7 Pro (Almond, 256 GB)</h5>
									<p class="font-italic text-muted mb-0 small">Rear Camera|48MP (Primary)+ 8MP (Tele-photo)+16MP (ultrawide)| Front Camera|16 MP POP-UP Camera|8GB RAM|Android pie</p>
									<div class="d-flex align-items-center justify-content-between mt-1">
										<h6 class="font-weight-bold my-2">₹ 52,999</h6>
										<ul class="list-inline small">
											<li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
											<li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
											<li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
											<li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
											<li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
										</ul>
									</div>
								</div><img src="https://i.imgur.com/6IUbEME.jpg" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
							</div> <!-- End -->
						</li> <!-- End -->
					</ul> <!-- End -->
				</div>
			</div>
		</div>
</body>