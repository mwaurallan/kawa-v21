<?php
//define page title
//include connection
$title = 'Kawa Self Help Group';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php if(isset($title)){ echo $title; }?></title>
    <link   href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link   href="bootstrap/custom.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverted">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><?php if(isset($title)){ echo $title; }?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">
        </a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="members.php">Member</a></li>
        <li><a href="bank_savings.php">Bankings</a></li>
        <li><a href="#">Savings</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right dropdown">
        <button class="dropbtn">Reports</button>
        <div class="dropdown-content">
          <a href="members_report4.php">Report 1</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
        </div>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid">
<div class="row">
