<div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="profileBox pt-2 pb-2">
                    <div class="in">
                        <?=strtoupper($app_name); ?>
                    </div>
                    <a href="#" class="btn btn-link btn-icon sidebar-close" data-bs-dismiss="modal">
                        <ion-icon name="close-outline"></ion-icon>
                    </a>
                </div>

                <div class="sidebar-balance">
                    <div class="listview-title">Customer</div>
                    <div class="in">
                        <h4 class="amount"><?=$userSession['name']; ?></h4>
                    </div>
                </div>

                <ul class="listview flush transparent no-line image-listview mt-5">
                    <li>
                        <a href="index.php?uid=<?=$uid; ?>" class="item smenu-item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="home-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Home
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="bills.php?uid=<?=$uid; ?>" class="item smenu-item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="reader-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Bill History
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="payments.php?uid=<?=$uid; ?>" class="item smenu-item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="receipt-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Payment History
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="account.php?uid=<?=$uid; ?>" class="item smenu-item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="person-circle-outline"></ion-icon>
                            </div>
                            <div class="in">
                                My Account
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="customer-support.php?uid=<?=$uid; ?>" class="item smenu-item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="chatbubbles-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Customer Support
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="notifications.php?uid=<?=$uid; ?>" class="item smenu-item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="notifications-circle-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Notifications
                            </div>
                        </a>
                    </li>  
                </ul>

                <div class="sidebar-buttons">
                    <a href="account.php?uid=<?=$uid; ?>" class="button">
                        <ion-icon name="person-circle-outline"></ion-icon>
                    </a>
                    <a href="customer-support.php?uid=<?=$uid; ?>" class="button">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </a>
                    <a href="notifications.php?uid=<?=$uid; ?>" class="button">
                        <ion-icon name="notifications-circle-outline"></ion-icon>
                    </a>
                    <a href="javascript:void(0);" class="button" data-bs-toggle="modal" data-bs-target="#logout-modal">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade action-sheet" id="logout-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="action-sheet-content">
                    <div class="iconbox text-primary">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </div>
                    <div class="text-center p-2">
                        <h3 id="success-title"></h3>
                        <p id="success-message">Your account will be logged out. Are you sure you want to proceed?</p>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <a href="javascript:void(0);" class="btn btn-text-primary btn-lg shadowed btn-block" data-bs-dismiss="modal">Stay logged in</a>
                        </div>
                        <div class="col-5">
                             <a href="javascript:void(0);" class="btn btn-primary btn-lg btn-block logout" data-bs-dismiss="modal">Log out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade action-sheet" id="notif-success" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="action-sheet-content">
                    <div class="iconbox text-success">
                        <ion-icon name="checkmark-circle"></ion-icon>
                    </div>
                    <div class="text-center p-2">
                        <h3 id="success-title">Success</h3>
                        <p id="success-message"></p>
                    </div>
                    <a href="#" class="btn btn-primary btn-lg btn-block" data-bs-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade action-sheet" id="notif-error" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="action-sheet-content">
                    <div class="iconbox text-danger">
                        <ion-icon name="alert-circle"></ion-icon>
                    </div>
                    <div class="text-center p-2">
                        <h3 id="error-title">Error</h3>
                        <p id="error-message"></p>
                    </div>
                    <a href="#" class="btn btn-primary btn-lg btn-block" data-bs-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade dialogbox" id="verification-code-modal" data-bs-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="verification-code-form">
                <div class="modal-header">
                    <h5 class="modal-title">Verification code sent</h5>
                </div>
                <div class="modal-body">
                    Please enter the code below to verify your mobile number.
                    <div class="form-group basic mt-3">
                        <input type="text" class="form-control verification-input" name="verification_code" id="verification_code" placeholder="••••" maxlength="4" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-inline">
                        <a href="#" class="btn btn-text-secondary" data-bs-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-text-primary" id="verification-code-form-submit">Verify code</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="toast-alert" class="toast-box toast-bottom">
    <div class="in"><div id="toast-message" class="text"></div></div>
    <button type="button" class="btn btn-sm btn-text-light close-button">OK</button>
</div>