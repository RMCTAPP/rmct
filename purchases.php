<?php 

include '../shared/configuration.php';

$token = $_GET['token'];
$currentPage = 'purchases';

$query = $conn->prepare("SELECT * FROM product_items");
$query->execute();
$products = $query->fetchAll(PDO::FETCH_ASSOC);



?>

<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title></title>
    <meta name="description" content="">
    <meta name="keywords" content="" />
    <?php include 'partials/styles.php'; ?>
    <style type="text/css">
    
    </style>
</head>
<body>

    <?php include 'partials/loader.php'; ?>

    <div class="appHeader bg-primary text-light">
        <div class="left">

        </div>
        <div class="pageTitle">
            <img src="../shared/media/logo-no-bg.png" alt="logo" class="logo w45">
            <span style="vertical-align: middle;">RMCT</span>
        </div>
        <div class="right">

        </div>
    </div>
    <div id="appCapsule">

        

    </div>
    <?php 
        include 'partials/bottom-nav.php';
        include 'partials/sidebar.php';
        include 'partials/scripts.php'; 
    ?>
    <script type="text/javascript">
        $(function() {
           

        });
    </script>
</body>
</html>