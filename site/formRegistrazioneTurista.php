<?php
require_once '..\classi\utilities\Functions.php';
use classi\utilities\Functions;
$functions=new Functions();
?>
<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="UTF-8">
<title>Registrazione turista</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css" />

<!--Fogli di stile datepicker-->
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" />

<!--Fine fogli di stile datepicker-->

<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"
	type="text/javascript"></script>

<!--Script datepicker-->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script
	src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
<!--Fine script datepicker-->

</head>
<body>

	<!--menu-->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
					aria-expanded="false">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="homepage.html" button type="button"
					class="btn btn-default btn-lg"> <span
					class="glyphicon glyphicon-home" aria-hidden="true"></span>
					Cicerone
				</a>
			</div>
		</div>
		<!-- /.container-fluid -->
	</nav>

	<!--form di registrazione-->
	<!-- Da modificare/eliminare -->
	<h4> <br>&nbsp
	Tipo registrazione</h4>
	<!-- fine da modificare/eliminare -->
	<ul class="nav nav-pills">
		<li role="presentation"><a href="formRegistrazione.php">Cicerone</a></li>
		<li role="presentation" class="active"><a
			href="formRegistrazioneTurista.php">Turista</a></li>
	</ul>

	<h1></h1>
	<form action="registrazioneTurista.php" method="post">
		<div class="form-group col-md-6">
			<label for="inputName">Nome</label> <input type="text"
				class="form-control" id="nome" placeholder="Nome" name="nome">
		</div>
		<div class="form-group col-md-6">
			<label for="inputSurname">Cognome</label> <input type="text"
				class="form-control" id="cognome" placeholder="Cognome"
				name="cognome">
		</div>
	<div class="form-group col-md-6">
	<label for="inputNation">Paese</label>
		<?php $functions->stampaSelettoreNazione();?>
	</div>

		<div class="form-group col-md-6">
			<label for="inputBirthDate">Data di nascita</label>
			<div class='input-group date' id='data_nascita'>
				<input type='text' class="form-control" placeholder="gg/mm/aaaa"
					name="data_nascita" /> <span class="input-group-addon"><span
					class="glyphicon glyphicon-calendar"></span> </span>
			</div>
		</div>

		<div class="form-group col-md-6">
			<label for="inputCounty">Provincia</label> <input type="text"
				class="form-control" id="provincia" placeholder="Provincia"
				name="provincia">
		</div>
		<div class="form-group col-md-6">
			<label for="inputCity">Città</label> <input type="text"
				class="form-control" id="citta" placeholder="Città" name="citta">
		</div>
		<div class="form-group col-md-6">
			<label for="inputCAP">CAP</label> <input type="text"
				class="form-control" id="CAP" placeholder="CAP" name="CAP">
		</div>
		<div class="form-group col-md-6">
			<label for="inputStreet">Indirizzo</label> <input type="text"
				class="form-control" id="indirizzo" placeholder="Indirizzo"
				name="indirizzo">
		</div>
		<div class="form-group col-md-6">
			<label for="inputPhone">Telefono</label> <input type="text"
				class="form-control" id="phone" placeholder="Telefono"
				name="telefono">
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputEmail4">Email</label> <input type="email"
					class="form-control" id="mail" placeholder="Email" name="mail">
			</div>
			<div class="form-group col-md-6">
				<label for="inputPassword4">Password</label> <input type="password"
					class="form-control" id="password" placeholder="Password"
					name="password">
			</div>
			<div class="form-group col-md-6">
				<label for="inputPassword4">Ripeti password</label> <input
					type="password" class="form-control" id="password2"
					placeholder="Ripeti password" name="password2">
			</div>

		</div>
		<div class="text-center">
			<div class="form-group">
				<button type="submit" class="btn btn-primary"
					name="invia_dati_turista">REGISTRATI</button>
			</div>
		</div>
	</form>


	<script src="js/bootstrap.min.js"></script>

	<!--Script Datepicker-->
	<script src="js/bootstrap-datepicker.min.js"></script>
	<script
		src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>
	<script>
		jQuery(function() {
			jQuery('#data_nascita').datepicker({
				format : 'dd/mm/yyyy',
				endDate : '+0d',
				orientation : "bottom auto",
				autoclose : true
			});

		});
	</script>
	<!--Fine script Datepicker-->
</body>
</html>
