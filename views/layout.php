<DOCTYPE html>

<html>
<head>
  <title>Lista Contatos</title>
  <link rel="stylesheet" type="text/css" href="<?php  echo PROJECTDIR; ?>content/lib/bootstrap/bootstrap-3.3.6-dist/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php  echo PROJECTDIR; ?>content/css/site.css">

    <!-- Website Font style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

</head>
<body>

<?php

    $ss = new SessionManager();
    $idUser = $ss->getUserApp();
?>

<div class="container">
    <div class="row main">
        <div class="panel-heading">
            <div class="panel-title text-center">
                <h1 class="title"><?php echo APPNAME; ?> </h1>
                <hr />
            </div>
        </div>

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><?php echo APPNAME; ?></a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="<?php  echo PROJECTDIR; ?>contatos/index">Home</a></li>

                    <?php
                        if ($idUser === NULL){
                    ?>

                    <li><a href="<?php  echo PROJECTDIR; ?>login/index">Login</a></li>
                    <li><a href="<?php  echo PROJECTDIR; ?>login/register">Register</a></li>
                    <?php
                        }else{
                    ?>
                            <li><a href="<?php  echo PROJECTDIR; ?>login/logout">Log Out</a></li>
                    <?php }?>
                </ul>
            </div>
        </nav>

        <?php require_once('routes.php'); ?>

    </div>
</div>

</body>
</html>