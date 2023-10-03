<div id="tren">
            <ol>
                <li>
                    <a href="index.php">
                        home page
                    </a>
                </li>
                        <li class="menu-guest" style="<?php if(!empty($_SESSION['name'])){ ?> display: none; <?php } ?>">
                            <a href="login/index.php">
                                sign in
                            </a>
                        </li>
                        <li class="menu-guest" style="<?php if(!empty($_SESSION['name'])){ ?> display: none; <?php } ?>">
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal-sign-up">
                                sign up
                            </button>
                            <!-- <a href="sign_up.php">             update
                                sign up
                            </a> -->
                        </li>
                <!-- update tính năng nếu tồn tại session name thì sẽ k hiển thị đăng nhập
                đăng ký , chỉ hiện thị đăng xuất  -->
                        <li class="menu-user" style="<?php if(empty($_SESSION['name'])){ ?> display: none; <?php } ?>">
                            <a href="view_cart_v1.php">
                                view cart
                            </a>
                        </li>
                        <li class="menu-user" style="<?php if(empty($_SESSION['name'])){ ?> display: none; <?php } ?>">
                            hello 
                            <span id="span-name">
                            <?php echo $_SESSION['name'] ?? '' ?>,
                            <!-- Check if there exists a name, otherwise print it blank -->
                            </span>
                            <a href="signout.php">
                                sign out
                            </a>
                        </li>
                <?php
                    if(isset($_GET['error'])){
                ?>
                <span style='color:purple'>
                    <?php echo $_GET['error'] ?>
                </span>
                <?php } ?>

                <?php
                    if(isset($_GET['success'])){
                ?>
                <span style='color:green'>
                    <?php echo $_GET['success'] ?>
                </span>
                <?php } ?>
            </ol>
</div>
<?php
if(empty($_SESSION['id'])){     // if not logged in, it will include these 2 files.
    include 'sign_up.php';
    // include 'login/index.php';
}
?> <!--chèn form sign-up vào -->