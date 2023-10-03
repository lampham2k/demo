<div id="tren">
            <ol>
                <li>
                    <a href="index.php">
                        home page
                    </a>
                </li>
                <?php if(empty($_SESSION['name'])){ ?>
                        <li>
                            <a href="login/index.php">
                                sign in
                            </a>
                        </li>
                        <li>
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal-sign-up">
                                sign up
                            </button>
                            <!-- <a href="sign_up.php">             update
                                sign up
                            </a> -->
                        </li>
                        <?php include 'sign_up.php'; ?> <!--chèn form sign-up vào -->
                <!-- update tính năng nếu tồn tại session name thì sẽ k hiển thị đăng nhập
                đăng ký , chỉ hiện thị đăng xuất  -->
                <?php } else{ ?>
                        <li>
                            <a href="view_cart_v1.php">
                                view cart
                            </a>
                        </li>
                        <li>
                            hello <?php echo $_SESSION['name'] ?>,
                            <a href="signout.php">
                                sign out
                            </a>
                        </li>
                <?php } ?>   
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