
<?php
session_start();
require "config/Db.php";
require "model/Model.php";
require "model/Specialite.php";
require "model/Patient.php";




  $_SESSION['service_id'] = $_GET['service_id'];

  
  $specialiteManager = new Specialite();
  $patientManager = new Patient();
  $rvManager = new RendezVous();


  $specialites = $specialiteManager->specialites();

  $rvs = $rvManager->getLastRv();

 
  if(isset($_POST) && !empty($_POST))
  {
	 $patient = [];
	 $rv = [] ;
	 $patient['nom'] = $_POST['nom'];
	 $patient['prenom'] = $_POST['prenom'];
	 $patient['age'] = $_POST['age'];
	 $patient['sexe'] = $_POST['sexe'];
	 $patient['telephone'] = $_POST['telephone'];
	$patientManager->addPatient($patient);


	$rv['patient_id'] = $patientManager->con->lastInsertId();
	$rv['date'] = $_POST['date'];
	$rv['specialite_id'] = $_POST['specialite_id'];
	$rv['heure'] = $_POST['heure'];
	$rvManager->addRv($rv);    
	
  }
  

   
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
		<title>Gestion rendex-vous</title>

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

			<!-- Start Header Area -->
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
					<form action="" id="sign-up" class="form-horizontal form-signin " method="POST" >
		                <div class="row">
                             <div class="col-sm-6">
								 <h2 class="mb-4">Details Rendez-vous</h2>
								<div class="form-group">
									<label for="">Date</label>
									<input name="date" class="form-control" type="date">
								</div>
								<div class="form-group">
									<label for="">Heure</label>
									<input name="heure" class="form-control" type="time" >
								</div>
								<div class="form-group">
									<label for="">Specialite</label>
									<select name="specialite_id" class="form-control mb-3" id="service">
										<?php foreach($specialites as $specialite): ?>
											<option value="<?=$specialite->id?>" class="form-control"><?=$specialite->nom?></option>
										<?php endforeach; ?>
									</select>
								</div>
							 </div>
							 <div class="col-sm-6">
								   <h2 class="mb-4">Informations Patient</h2>
									<div class="form-group">
										<input name="prenom" class="form-control" type="text" placeholder="Prenom" >
									</div>
									<div class="form-group">
										<input name="nom" class="form-control" type="text" placeholder="Nom" >
									</div>
									<div class="form-group">
										<input name="age" class="form-control" type="text" placeholder="Age" >
									</div>
									<div class="form-group">
										<input name="sexe" class="form-control" type="text" placeholder="Sexe" >
									</div>
									<div class="form-group">
										<input name="telephone" class="form-control" type="text" placeholder="Telephone" >
									</div>
							 </div>
						</div>
						<div class="form-group margin-bottom-100 mobile-bottom-50">
							<button id="submit-form-button" class="btn btn-sm btn-success center mobile-bottom-10"
									type="submit">Enregistrer</button>
				  </div>
			  </form>

			  <div class="rv-list">
				  <h2>Liste des rendez-vous</h2>
			  <table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Age</th>
	  <th scope="col">Sexe</th>
      <th scope="col">Telephone</th>
      <th scope="col">Date</th>
	  <th scope="col">Heure</th>
      <th scope="col">Specialite</th>
    </tr>
  </thead>
  <tbody>
	  <?php foreach ($rvs as $rv):?>
    <tr>
	  <th><?=$rv->nom ?></th>
      <th><?=$rv->prenom ?></th>
      <th><?=$rv->age ?></th>
      <th><?=$rv->sexe ?></th>
      <th><?=$rv->telephone ?></th>
      <th><?=$rv->date ?></th>
      <th><?=$rv->heure ?></th>
      <th><?=$rv->specialite ?></th>
	</tr>
<?php endforeach; ?>
  </tbody>
</table>
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
