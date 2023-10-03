<ul>
    <li>
        <a href="../nha_san_xuat/index.php">
            quản lý nhà sản xuất
        </a>
    </li>
    <li>
        <a href="../products/index.php">
            quản lý sản phẩm
        </a>
    </li>
    <li>
        <a href="../orders/index.php">
            quản lý đơn hàng
        </a>
    </li>
</ul>

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