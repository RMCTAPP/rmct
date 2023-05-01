<div class="appBottomMenu">
    <a href="main.php?token=<?=$token; ?>" class="item <?=$currentPage=='products'?'active':''; ?>">
        <div class="col">
            <ion-icon name="home-outline"></ion-icon>
            <strong>Home</strong>
        </div>
    </a>
    <a href="cart.php?token=<?=$token; ?>" class="item <?=$currentPage=='cart'?'active':''; ?>">
        <div class="col">
            <ion-icon name="cart-outline"></ion-icon>
            <strong>Cart</strong>
        </div>
    </a>
    <a href="purchases.php?token=<?=$token; ?>" class="item <?=$currentPage=='purchases'?'active':''; ?>">
        <div class="col">
            <ion-icon name="list-outline"></ion-icon>
            <strong>Purchases</strong>
        </div>
    </a>
    <a href="profile.php?token=<?=$token; ?>" class="item <?=$currentPage=='profile'?'active':''; ?>">
        <div class="col">
            <ion-icon name="person-circle-outline"></ion-icon>
            <strong>Profile</strong>
        </div>
    </a>
</div>


<div class="modal fade dialogbox" id="dialog-success" data-bs-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-icon text-success">
                <ion-icon name="checkmark-circle"></ion-icon>
            </div>
            <div class="modal-header">
                <h5 class="modal-title success-title">Success</h5>
            </div>
            <div class="modal-body" id="success-content"></div>
            <div class="modal-footer">
                <div class="btn-inline">
                    <a href="#" class="btn" data-bs-dismiss="modal">CLOSE</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade dialogbox" id="dialog-error" data-bs-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-icon text-danger">
                <ion-icon name="close-circle"></ion-icon>
            </div>
            <div class="modal-header">
                <h5 class="modal-title error-title">Error</h5>
            </div>
            <div class="modal-body" id="error-content"></div>
            <div class="modal-footer">
                <div class="btn-inline">
                    <a href="#" class="btn" data-bs-dismiss="modal">CLOSE</a>
                </div>
            </div>
        </div>
    </div>
</div>