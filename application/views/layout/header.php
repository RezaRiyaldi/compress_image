<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pres | <?= $title ?></title>

   <!-- CSS -->
   <style>
      p {
         margin: 0 !important;
      }

      .alert {
         position: absolute !important;
         z-index: 99;
         <?php if (!isset($home)) { ?>
            width: 100%;
         <?php } ?>
      }

      .img {
         max-height: 200px;
         max-width: 100%;
         overflow: hidden;
      }
   </style>

   <!-- LIBRARY -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-L31QB2VZN1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-L31QB2VZN1');
    </script>
</head>

<body>
   <?php
   if (isset($home)) {
      include "_navbar.php";
   }

   if (!empty($this->session->flashdata('success'))) {
      $success = $this->session->flashdata('success');
   ?>

      <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
         <?= $success ?>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

   <?php
   } else if (!empty($this->session->flashdata('error'))) {
      $error = $this->session->flashdata('error');
   ?>

      <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
         <?= $error ?>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

   <?php } ?>
   <?php if (!empty(validation_errors())) { ?>

      <div class="alert alert-danger alert-dismissible fade show text-center rounded-0" role="alert">
         <?= validation_errors() ?>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

   <?php } ?>