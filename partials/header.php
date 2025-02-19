<?php session_start();?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>LOGIN SYS</title>
</head>
<body>
    <header>
       
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">LOGIN SYS</a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <?php 
                        if(isset($_SESSION['user_uid'])){
                        ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-primary font-weight-bold"><?php echo' Hello '.$_SESSION["user_uid"].'!';?></a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link btn btn-primary text-white">LOGOUT</a>
                        </li>
                        <?php
                        }
                        else {
                        ?>
                        <li class="nav-item">
                            <a href="index.php" class="nav-link btn btn-primary text-white">LOGIN</a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

   

