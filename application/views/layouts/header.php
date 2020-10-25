<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Place your kit's code here -->
    <script src="https://kit.fontawesome.com/b2e2dac0bc.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">
    <title>AirBnB Propertys!</title>
</head>

<body>

    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" style="width: 150px; " href="<?php echo base_url() . "HomeController" ?>"><img src="<?php echo base_url(); ?>/assets/images/logo.svg" alt="" /></a>

            <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="<?php echo base_url() . "HomeController" ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo base_url() . "api/" ?>">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url() . "features" ?>" tabindex="-1" aria-disabled="true"></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>