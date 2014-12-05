<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript" src="<?=$base_url?>bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="<?=$base_url?>bower_components/angular/angular.js"></script>
    <script type="text/javascript" src="<?=$base_url?>bower_components/underscore/underscore-min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?=$base_url?>bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <script type="text/javascript" src="<?=$base_url.$js_path?>selection.js"></script>
    <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/md5.js"></script>
    
    <script type="text/javascript" src="<?=$base_url?>bower_components/angular-ui-select/dist/select.js"></script>
    <script type="text/javascript" src="<?=$base_url?>bower_components/angular-sanitize/angular-sanitize.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?=$base_url?>bower_components/angular-ui-select/dist/select.css" />


        <script type="text/javascript" src="<?=$base_url.$js_path?>ui-bootstrap.js"></script>

    <?php foreach($css_files as $src): ?>
    <link href="<?=$base_url.$css_path.$src?>" rel="stylesheet" type="text/css" />
  <?php endforeach; ?>
	<meta charset="utf-8">
	<title><?=$title?></title>

	
</head>
