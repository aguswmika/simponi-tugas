<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php if(isset($title)) { echo $title." - "; } ?> simponi.</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">
	<link href="<?php echo base_url('fonts/fontawesome/css/fontawesome-all.min.css') ?>" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('css/custom.css') ?>">
	<link href="<?php echo base_url('css/ui.css') ?>" rel="stylesheet" type="text/css"/>



</head>
<body>

<?php view('partial/navbar') ?>