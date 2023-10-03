<div id="header">
    <div class="c-magic-area c-magic-area--menu" data-target-class=".c-main-menu__link" data-tween-back="true" aria-hidden="true"></div>
    <div class="c-magic-area c-magic-area--content" data-target-class=".c-article__link" data-tween-back="false" aria-hidden="true"></div>

    <main id="page" class="o-page">
    <header class="o-header">
        <h1 class="c-logo"><a class="c-logo__link" href="#" target="_blank">hello <?php echo $_SESSION['name'] ?></a></h1>
        <nav class="c-main-menu" aria-labelledby="mainmenulabel">
        <ul class="c-main-menu__list">
            <li><a aria-current="page" class="c-main-menu__link" href="index.php">Trang chủ</a></li>
            <li style="<?php if(!empty($_SESSION['name'])){ ?> display: none; <?php } ?>"><a class="c-main-menu__link" href="signin.php">Đăng nhập</a></li> 
            <li style="<?php if(!empty($_SESSION['name'])){ ?> display: none; <?php } ?>"><a class="c-main-menu__link" href="signup.php">Đăng ký</a></li>
            <li style="<?php if(empty($_SESSION['name'])){ ?> display: none; <?php } ?>"><a class="c-main-menu__link" href="signout.php">đăng xuất</a></li>
            <li style="<?php if(empty($_SESSION['name'])){ ?> display: none; <?php } ?>"><a class="c-main-menu__link" href="view_cart.php">xem giỏ hàng</a></li>
            <li style="<?php if(empty($_SESSION['name'])){ ?> display: none; <?php } ?>"><a class="c-main-menu__link" href="order_success.php?id=<?php echo $_SESSION['id'] ?>">đơn hàng của tôi</a></li>
        </ul>
        </nav>
    </header>
</div>