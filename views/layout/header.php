
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PupuSA | <?= $viewData["title"] ?? DEFAULT_TITLE ?></title>

    <!-- Bootstrap V5.2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Sweat Alert V2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- PERSONAL CSS -->
    <link rel="stylesheet" href="<?= URL . "public/css/style.css" ?>">
    <link rel="shortcut icon" href="<?= URL . "public/img/logo.png" ?>" type="image/x-icon">
</head>
<body>
  


<!-- Inicio Navbar -->
<?php if(isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin"){ ?>
    <!--Navbar admin-->
    <?php require_once VIEW_LAYOUT_PATH . 'navadmin.php' ?>

<?php } else { ?>

    <!-- Navbar usuario comun -->
    <?php require_once VIEW_LAYOUT_PATH . 'navcomun.php' ?>

<?php } ?>

<style>
    @media (max-width: 991.98px) {
  .half-screen {
    width: 50%;
    max-width: 250px;
  }
}

</style>

<!-- Fin navbar -->
