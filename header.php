<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
<?php if($dir == "index.php"): ?>
<title>PDFジェネレーター</title>
<?php elseif($dir == "creation.php"): ?>
<title>PDF作成 | PDFジェネレーター </title>
<?php elseif($dir == "history.php"): ?>
<title>履歴 | PDFジェネレーター </title>
<?php endif; ?>
<meta name="description" content="WEBブラウザ上でPDFを作成できるジェネレーターです。">
<meta name="keywords" content="Web,PDF,ブラウザ,ジェネレーター">
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/style.css" rel="stylesheet">
<!--cssページごとに分ける-->
<?php if($dir == "index.php"): ?>
<link href="css/top.css" rel="stylesheet">
<?php elseif($dir == "creation.php"): ?>
<link href="css/summernote.min.css" rel="stylesheet">
<?php elseif($dir == "history.php"): ?>
<link href="css/history.css" rel="stylesheet">
<?php endif; ?>
<link rel="shortcut icon" href="images/common/favicon.ico">
<link rel="apple-touch-icon" href="images/common/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="images/common/android-chrome-256x256.png">
</head>
<body>
<header>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#Navber" aria-expanded="false"> <span class="sr-only">ナビゲーションの切替</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="index.php">PDFジェネレーター</a></div>
      <!-- /.navbar-header -->
      <div class="collapse navbar-collapse" id="Navber">
        <ul class="nav navbar-nav navbar-right">
		<li><a href="index.php">トップ</a></li>
			 <li><a href="creation.php">PDF作成</a></li>
          <li><a href="history.php">履歴</a></li>
        </ul>
      </div>
      <!-- /.navbar-collapse --> 
    </div>
    <!-- /.container --> 
  </nav>
</header>