<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript" src="<?=$base_url?>bower_components/jquery/dist/jquery.js"></script>
    <script type="text/javascript" src="<?=$base_url?>bower_components/angular/angular.js"></script>
    <link rel="stylesheet" type="text/css" href="<?=$base_url?>bower_components/bootstrap/dist/css/bootstrap.css" />

    <?php foreach($css_files as $src): ?>
    <link href="<?=$base_url.$css_path.$src?>" rel="stylesheet" type="text/css" />
  <?php endforeach; ?>
	<meta charset="utf-8">
	<title><?=$title?></title>

	
</head>
