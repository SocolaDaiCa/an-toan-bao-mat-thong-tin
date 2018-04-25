<?php

/**
 * @Author: Socola
 * @Email: TokenTien@gmail.com
 * @Date:   2018-04-23 07:03:47
 * @Last Modified by:   Socola
 * @Last Modified time: 2018-04-26 05:55:55
 */
?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="manifest" href="manifest.json">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title></title>
		<link rel="stylesheet" type="text/css" href="vendors/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/app.css">
		<script src="vendors/jquery/jquery.min.js"></script>
		<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-MML-AM_CHTML' async></script> -->
		<script src="vendors/vue/vue.min.js"></script>
	</head>

	<body>
		<script src="js/app.js"></script>
		<?php //require_once 'casio.php'; ?>
		<div role="tabpanel">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation">
					<a href="#home" aria-controls="home" role="tab" data-toggle="tab">DSA</a>
				</li>
				<li role="presentation">
					<a href="#tab-rsa" aria-controls="tab" role="tab" data-toggle="tab">RSA</a>
				</li>
				<li role="presentation">
					<a href="#tab-modulo" aria-controls="tab" role="tab" data-toggle="tab">Modulo</a>
				</li>
				<li role="presentation">
					<a href="#tab-gcd" aria-controls="tab" role="tab" data-toggle="tab">gcd</a>
				</li>
				<li role="presentation">
					<a href="#tab-ceaser" aria-controls="tab" role="tab" data-toggle="tab">Ceaser</a>
				</li>
				<li role="presentation">
					<a href="#tab-mod" aria-controls="tab" role="tab" data-toggle="tab">Mod</a>
				</li>
				<li role="presentation">
					<a href="#tab-can-nguyen-thuy" aria-controls="tab" role="tab" data-toggle="tab">Căn nguyên thủy</a>
				</li>
				<li role="presentation">
					<a href="#tab-logarit-roi-rac" aria-controls="tab" role="tab" data-toggle="tab">Logarit rời rạc</a>
				</li>
				<li role="presentation">
					<a href="#tab-hellman" aria-controls="tab" role="tab" data-toggle="tab">Hellman</a>
				</li>
				<li role="presentation">
					<a href="#tab-elgamal" aria-controls="tab" role="tab" data-toggle="tab">Elgamal</a>
				</li>
				<li role="presentation" class="active">
					<a href="#tab-search" aria-controls="tab" role="tab" data-toggle="tab">Search</a>
				</li>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane" id="home">
					<?php require_once 'dsa.php'; ?>
				</div>
				<div role="tabpanel" class="tab-pane" id="tab-rsa">
					<?php require_once 'rsa.php'; ?>
				</div>
				<div role="tabpanel" class="tab-pane" id="tab-modulo">
					<?php require_once 'nghich-dao-modulo.php'; ?>
				</div>
				<div role="tabpanel" class="tab-pane" id="tab-gcd">
					<?php require_once 'gcd.php'; ?>
				</div>
				<div role="tabpanel" class="tab-pane" id="tab-ceaser">
					<?php require_once 'ceaser.php'; ?>
				</div>
				<div role="tabpanel" class="tab-pane" id="tab-mod">
					<?php require_once 'mod.php'; ?>
				</div>
				<div role="tabpanel" class="tab-pane" id="tab-can-nguyen-thuy">
					<?php require_once 'can-nguyen-thuy.php'; ?>
				</div>
				<div role="tabpanel" class="tab-pane" id="tab-logarit-roi-rac">
					<?php require_once 'logarit-roi-rac.php'; ?>
				</div>
				<div role="tabpanel" class="tab-pane" id="tab-hellman">
					<?php require_once 'hellman.php'; ?>
				</div>
				<div role="tabpanel" class="tab-pane" id="tab-elgamal">
					<?php require_once 'elgamal.php'; ?>
				</div>
				<div role="tabpanel" class="tab-pane active" id="tab-search">
					<?php require_once 'search.php'; ?>
				</div>
			</div>
		</div>
		<script src="vendors/jquery/jquery.min.js"></script>
		<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="manifest.js"></script>
	</body>

	</html>
