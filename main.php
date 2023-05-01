<?php 

include '../shared/configuration.php';

$token = $_GET['token'];
$currentPage = 'products';

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

        <div class="section full bg-white">
            <ul class="nav nav-tabs lined" role="tablist">
                <li class="nav-item">
                    <a class="nav-link product-category active" data-bs-toggle="tab" href="javascript:void(0);" role="tab" data-category="all">
                        All
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link product-category" data-bs-toggle="tab" href="javascript:void(0);" role="tab" data-category="1">
                        Desktop
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link product-category" data-bs-toggle="tab" href="javascript:void(0);" role="tab" data-category="2">
                        Laptop
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link product-category" data-bs-toggle="tab" href="javascript:void(0);" role="tab" data-category="3">
                        Other
                    </a>
                </li>
            </ul>
        </div>
        <div class="section pb-1">
            <div class="transactions mt-2">
                <?php foreach($products as $product): 
                    $query = $conn->prepare("SELECT * FROM product_item_images WHERE product_item_id=?");
                    $query->execute([$product['id']]);
                    $productItemImages = $query->fetchAll();

                    $imageDirectory = $app_url.'shared/uploads/';
                    $productItemImage = 'no-image-available.png';
                    if ($productItemImages) {
                        $productItemImage = $productItemImages[0]['filename'];
                    }
                    $productItemImage = $imageDirectory.$productItemImage;
                ?>
                <a href="product.php?id=<?=$product['id']; ?>&token=<?=$token; ?>" class="item product-item product-item-<?=$product['id']; ?>">
                    <div class="detail">
                        <img src="<?=$productItemImage; ?>" alt="img" class="image-block imaged w100">
                        <div>
                            <strong><?=$product['name']; ?></strong>
                            <div class="price text-dark">₱ <?=number_format($product['price'], 2); ?></div>
                            <div class="text-muted"><?=$product['current_stocks']; ?> in stocks</div>
                            <!-- <p><?=$product['description']; ?></p> -->
                        </div>
                    </div>
                    <div class="right">
                        
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>    
    </div>
    <?php 
        include 'partials/bottom-nav.php';
        include 'partials/sidebar.php';
        include 'partials/scripts.php'; 
    ?>
    <script type="text/javascript">
        $(function() {
            $('a.product-category').on('click', function() {
                var category = $(this).data('category');

                if (category == 'all') {
                    $('a.product-item').show();
                } else {
                    $('a.product-item').hide();
                    $('a.product-item-'+category).show();
                }
                    
            });
        });
    </script>
</body>
</html>