<?php 

include '../shared/configuration.php';

$token = $_GET['token'];
$currentPage = 'products';

$id = $_GET['id'];
$query = $conn->prepare("SELECT * FROM product_items WHERE id=?");
$query->execute([$id]);
$product = $query->fetch(PDO::FETCH_ASSOC);

$query = $conn->prepare("SELECT * FROM product_item_images WHERE product_item_id = ?");
$query->execute([$product['id']]);
$productItemImages = $query->fetchAll();

$imageDirectory = $app_url.'shared/uploads/';
$productItemImage = 'no-image-available.png';
if ($productItemImages) {
    $productItemImage = $productItemImages[0]['filename'];
}
$productItemImage = $imageDirectory.$productItemImage;
              
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

       <div class="section full">
           <img src="<?=$productItemImage; ?>" alt="image" class="imaged img-fluid square">
       </div>
       <div class="section full">
            <div class="wide-block pt-2 pb-2 product-detail-header">
                
                <h1 class="title"><?=$product['name']; ?></h1>
                <div class="text"><?=$product['current_stocks']; ?> in stocks</div>
                <div class="row mb-3">
                    <div class="col-8">
                        <div class="detail-footer">
                            <div class="price">
                                <div class="current-price text-primary">₱ <?=number_format($product['price'], 2); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group boxed">
                            <div class="input-wrapper not-empty">
                                <input type="number" class="form-control" name="quantity" id="quantity" value="1" min="1" step="1" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
                <button class="btn btn-primary btn-lg btn-block add-to-cart">
                    <ion-icon name="cart-outline" role="img" class="md hydrated" aria-label="cart outline"></ion-icon>
                    Add to Cart
                </button>
            </div>
        </div>
        <div class="section full mt-2">
            <div class="section-title">Product Details</div>
            <div class="wide-block pt-2 pb-2">
                <?=$product['description']; ?>
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
            $('button.add-to-cart').on('click', function() {
                
                $.ajax({
                    url: "cart-ajax.php?token=<?=$token; ?>",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        action: "add-to-cart",
                        product: "<?=$product['id']; ?>",
                        quantity: $('input#quantity').val(),
                    },
                    beforeSend: function(){},
                    complete: function(){},
                    success: function(response) {

                        if (response.status == 'error') {   
                            $('div#error-content').html(response.message);
                            $('div#dialog-error').modal('show');       
                        }

                        if (response.status == 'success') {
                            $('div#success-content').html(response.message);
                            $('div#dialog-success').modal('show');
                        }

                        $('input#quantity').val(1);
                    },
                    error: function(error) {
                        console.info(error.statusText);
                    }
                });
                    
            });
        });
    </script>
</body>
</html>