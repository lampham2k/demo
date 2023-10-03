<style type="text/css">
    .moi_san_pham{
        width: 33%;
        border: 1px solid black;
        height: 250px;
        float: left;
    }
</style>
<?php
    include 'admin/connect.php';
    $sql ="select * from products";
    $result = mysqli_query($connect,$sql);
?>
<div id="giua">
    <?php foreach($result as $each): ?>
        <div class="moi_san_pham">
            <h1>
                <?php echo $each['name']; ?>
            </h1>
            <img src="admin/products/photos/<?php echo $each['photo']; ?>" height='50'>
            <p><?php echo $each['price']; ?>$</p>
            <a href="product.php?id=<?php echo $each['id'];?>">view detail</a>
            <?php if(!empty($_SESSION['id'])){ ?>
                <br>
                <button data-id='<?php echo $each['id'];?>' class='btn-add-to-cart'>
                <!-- truyền class vào nút để có gì còn gọi -->
                <!-- trong js có kiểu truyền giá trị vào trong data là dữ liệu id là tên dữ liệu -->
                    add to cart
                </button>
                <!-- <a href="add_to_cart_v1.php?id=tạm thời bỏ trống">
                    add to cart
                </a> -->
            <?php } ?>
        </div>
    <?php endforeach ?>
</div>