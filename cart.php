<?php 

include '../shared/configuration.php';

$token = $_GET['token'];
$currentPage = 'cart';





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
        <div class="section pb-1">
            <div class="transactions mt-2 cart-item-container"></div>
        </div>
        <!-- <div class="section mt-2 mb-2">
            <div class="card">
                <ul class="listview flush transparent simple-listview">
                    <li>Items <span class="text-muted cart-item-count">0</span></li>
                    <li>Total<span class="text-primary font-weight-bold">$ 62.80</span></li>
                </ul>
            </div>
        </div>
        <div class="section mb-2">
            <a href="#" class="btn btn-primary btn-block ">Order Now</a>
        </div> -->
    </div>

    <div class="modal fade dialogbox" id="edit-quantity-dialog" data-bs-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit quantity</h5>
                </div>
                <form>
                    <div class="modal-body text-start mb-2">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="quantity">Enter quantity</label>
                                <input type="number" class="form-control" name="quantity" id="quantity" value="" min="0" step="1">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <button type="button" class="btn btn-text-secondary"
                                data-bs-dismiss="modal">CANCEL</button>
                            <button type="button" class="btn btn-text-primary update-cart">UPDATE</button>
                        </div>
                    </div>
                </form>
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

            var cart_id, product_id, quantity;

            $('body').on('click','a.product-item', function() {

                var el = $(this);

                cart_id = el.data('cart'),
                quantity = el.data('quantity');

                $('input#quantity').val(quantity);
                $('div#edit-quantity-dialog').modal('show');

            });

            $('button.update-cart').on('click', function() {
                
                $.ajax({
                    url: "cart-ajax.php?token=<?=$token; ?>",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        action: "update-item",
                        cart: cart_id,
                        quantity: $('input#quantity').val(),
                    },
                    beforeSend: function(){},
                    complete: function(){},
                    success: function(response) {

                        $('div#edit-quantity-dialog').modal('hide');

                        if (response.status == 'error') {   
                            $('div#error-content').html(response.message);
                            $('div#dialog-error').modal('show');       
                        }

                        if (response.status == 'success') {
                            $('div#success-content').html(response.message);
                            $('div#dialog-success').modal('show');
                        }

                        getCartItems();
                    },
                    error: function(error) {
                        console.info(error.statusText);
                    }
                });
                    
            });

            getCartItems();
            function getCartItems() {

                var cart_items_container = $('div.cart-item-container');
                $.ajax({
                    url: "cart-ajax.php?token=<?=$token; ?>",
                    method: "GET",
                    dataType: 'json',
                    data: {},
                    beforeSend: function(){},
                    complete: function(){},
                    success: function(response) {

                        var data = response.data;
                        cart_items_container.empty();

                        if (data.length >= 1) {
                            $.each(data, function(index, row) {
                                cart_items_container.append(`<a href="javascript:void(0);" class="item product-item product-item-${row.product.id}" data-cart="${row.id}" data-product="${row.product.id}" data-quantity="${row.quantity}"><div class="detail"><img src="${row.product.image}" alt="img" class="image-block imaged w76"><div><strong>${row.product.name}</strong><div class="price text-dark">₱ ${row.product.price}</div><div class="text-muted">${row.product.stocks} in stocks</div></div></div><div class="right">x${row.quantity}</div></a>`);
                            })
                        }

                    },
                    error: function(error) {
                        console.info(error.statusText);
                    }
                });
            }

        });
    </script>
</body>
</html>