<DOCTYPE html>

<html>
<head>
  <title>Lista Contatos</title>
  <link rel="stylesheet" type="text/css" href="/<?php  echo PROJECTDIR; ?>/content/lib/bootstrap/bootstrap-3.3.6-dist/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="/<?php  echo PROJECTDIR; ?>/content/css/site.css">
</head>
<body>

<div class="jumbotron">

    <ul class="nav nav-tabs nav-justified">
        <li><a href="/<?php  echo PROJECTDIR; ?>/contatos/home">Home</a></li>
    </ul>

    <h3> Lista Contatos</h3>

    <?php require_once('routes.php'); ?>


</div>
</body>
</html>