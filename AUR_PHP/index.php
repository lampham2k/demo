<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> this is the home page </h1>
    <?php
        include 'connect.php';
        // require = include nhưng nếu file k tồn tại sẽ k chạy ở dưới luôn
        // require_once chỉ gọi 1 lần

        $page = 1;
        if(isset($_GET['page'])){
            // isset là nếu có 
            $page = $_GET['page'];
        }

        $search = '';
        if(isset($_GET['search'])){
            // isset là nếu có 
            $search = $_GET['search'];
        }

        $sql_news_count = "select count(*) from tin_tuc
        where tieu_de like '%$search%'";
        $array_news_count = mysqli_query($connect,$sql_news_count);
        $result_news_count = mysqli_fetch_array($array_news_count);
        $new_count = $result_news_count['count(*)'];

        $number_of_news_per_page = 2;
        $number_of_pages = ceil($new_count / $number_of_news_per_page);
        // ceil là hàm làm tròn lên

        // die($number_of_pages);
        // die là in ra kết quả và ngắt luôn những dòng lệnh sau

        $skip = $number_of_news_per_page * ($page - 1);

        $sql = "select * from tin_tuc
        where tieu_de like '%$search%' 
        limit $number_of_news_per_page offset $skip ";
        // %% nằm trong này có nghĩa là điều kiện theo kí tự ,
        //  offset là loai bỏ kết quả cần bỏ để lấy cái tiếp theo kế bên nó.

        $result = mysqli_query($connect , $sql);
        $errors = mysqli_error($connect);
        echo $errors;
    ?>
    <a href="form_insert.php">
        add article
    </a>

    <table border="1" width="100%">
        <caption> 
            <!-- thẻ caption sẽ ở đầu table và ở giữa -->
            <form action="">
                <input type="search" name="search" value="<?php echo $search ?>">
            <!-- input type là search thì k cần button -->
            </form>
        </caption>
        <tr>
            <th>code</th>
            <th>title</th>
            <th>photos</th>
            <th>updates</th>
            <th>remove</th>
        </tr>
        <?php foreach ($result as $each_article ){ ?>
            <!--foreach vòng lặp chuyên duyệt mảng -->
            <tr>
                <td><?php echo $each_article['ma'] ?></td>
                <td>
                    <a href="show.php?ma=<?php echo $each_article['ma'] ?>">
                        <?php echo $each_article['tieu_de'] ?>
                    </a>
                </td>
                <td>
                    <img src="<?php echo $each_article['anh'] ?>" height="100">
                </td>
                <td>
                    <a href="form_update.php?ma=<?php echo $each_article['ma'] ?>">
                        updates
                    </a>
                </td>
                <td>
                    <a href="delete.php?ma=<?php echo $each_article['ma'] ?>">
                        delete
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <?php for($i = 1; $i <= $number_of_pages; $i++ ){ ?>
        <a href="?page=<?php echo $i ?>&search=<?php echo $search ?>">
            <?php echo $i ?>
        </a>
    <?php } ?>
    
</body>
</html>