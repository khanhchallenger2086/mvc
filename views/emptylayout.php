<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="<?= TEMPLATE ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= TEMPLATE ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= TEMPLATE ?>vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= TEMPLATE ?>build/css/custom.min.css" rel="stylesheet">
</head>

<body class="<?= $class ?? "" ?>">

    <?php include $view ?>

    <!-- jQuery -->
    <script src="<?= TEMPLATE ?>vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= TEMPLATE ?>vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?= TEMPLATE ?>vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?= TEMPLATE ?>vendors/nprogress/nprogress.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?= TEMPLATE ?>build/js/custom.min.js"></script>
</body>

</html>