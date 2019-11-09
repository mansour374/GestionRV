<?php 
  require "config/Db.php";
  require "model/Model.php";
  require "model/Service.php";


  

  $serviceManager = new Service();

  $services = $serviceManager->getAll();
   
  

?>
	
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="Colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Gestion Rendez-vous</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">=
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">
			<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>

			<header class="default-header">
				<div class="container">
					<div class="header-wrap">
						<div class="header-top d-flex justify-content-between align-items-center">
							<div class="logo">
								<a href="index.php">Gestion Rendez-vous</a>
							</div>
							<div class="main-menubar d-flex align-items-center">
								<nav class="hide">
									<a href="index.php">Home</a>
								</nav>
								<div class="menu-bar"><span class="lnr lnr-menu"></span></div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<div class="container mt-5">
				<div class="row">
					<div class="col-sm-6 p-4 service-banner">
                      
					</div>
					<div class="col-sm-6 bg-info p-4">
						 <h2 class="display-4 text-weight-bold text-white">Bienvenue sur Gestion rendez-vous</h2>
						 <br>
						 <p class="display text-warning">Veillez selectionner votre service</p>
						 <form action="rv.php" method="GET">
						     <select name="service_id" class="form-control mb-3" id="service">
									<?php foreach($services as $service): ?>
									    <option value="<?=$service->id?>" class="form-control"><?=$service->nom_service?></option>
                                 	<?php endforeach; ?>
							 </select>

							 <button class="btn btn-primary btn-block">Continuer</button>
						</form>
					</div>
				</div>
			</div>

			
		

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>
			<script src="js/jquery.sticky.js"></script>
			<script src="js/parallax.min.js"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>
			<script src="js/waypoints.min.js"></script>
			<script src="js/jquery.counterup.min.js"></script>
			<script src="js/main.js"></script>
		</body>
	</html>
