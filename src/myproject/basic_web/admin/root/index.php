<?php
require '../../check_admin_login.php';// kiểm tra nếu không có level thì sẽ điều hương về login
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        .highcharts-figure,
        .highcharts-data-table table {
        min-width: 360px;
        max-width: 800px;
        margin: 1em auto;
        }

        .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
        }

        .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
        }

        .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
        padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
        background: #f1f7ff;
        }
    </style>
</head>
<body>
    <h1>This is the admin interface</h1>
    <?php
     include '../menu.php'; 
     require '../connect.php';
     $max_date = 7;
     // DATE_FORMAT là setup ngày tháng theo ý mình mong muốn.(ở đây là ngày và tháng)
     // condition : 7 days ago
     $sql ="select DATE_FORMAT(created_at,'%e-%m') as 'day' , 
     sum(total_price) as 'revenue' 
     from orders 
     WHERE DATE(created_at) >= CURDATE() - INTERVAL $max_date DAY and  DATE(created_at) < CURDATE()
     group by DATE_FORMAT(created_at,'%e-%m')";
     $result = mysqli_query($connect,$sql);
        // đây là mảng 1 chiều.
        // $arrDay = [];
        // $arrRevenue = [];
    // foreach($result as $each){
        // đây là cách đổ dữ liệu vào mảng 1 chiều.
        // $arrDay[] = $each['day'];
        // $arrRevenue[] = $each['revenue'];
    // }

    // 19-6-2022
    $arr = [];
    $this_month = date('m');
    $today = date('day');
    if($today < $max_date){  
        $day_last_month = $max_date - $today;   // số ngày muốn lấy của tháng trước.
        $last_month = date("m",strtotime("-1 month"));  // hàm này lấy ra tháng trước của hiện tại.
        $last_day_of_previous_month = date('d', strtotime('last day of previous month'));   // hàm này là lấy ngày cuối cùng của tháng trước.
        $start_day_last_month = $last_day_of_previous_month - $day_last_month + 1 ;

        // mảng 2 chiều.
        // tạo 1 mảng và in bỏ vào tất cả key có giá trị là 0 , sau đó mới nhập values vào key nào có value.
        for($i = $start_day_last_month; $i <= $last_day_of_previous_month ; $i++){
            $key = $i . '-' . $last_month;
            $arr[$key] = 0;
        }
        $start_day_this_month = 1;
    } else {
        $start_day_this_month = $today - $max_date;
    }
    // $max_date = date("t");  // hàm này là lấy số ngày trong tháng.
    
    for($i = $start_day_this_month; $i <= $today ; $i++){
        $key = $i . '-' . $this_month;
        $arr[$key] = 0;
    }
    foreach($result as $each){
        // đổ dữ liệu vào mảng 2 chiều , key và value.
        // float để ép kiểu string thành số.
        $arr[$each['day']] = (float)$each['revenue']; // $each['day'] là key , còn $each['revenue'] là value.
     }
    // in ra mảng để ktra. 
    // echo json_encode($arr);
    // exit();
    $arrX = array_keys($arr);
    $arrY = array_values($arr);

    ?>
    <figure class="highcharts-figure">
    <div id="container"></div>

    <!-- update tại vì bên trên có title rồi nên ở dưới k cần explain nữa. -->

    <!-- <p class="highcharts-description">
        Chart showing data loaded dynamically. The individual data points can
        be clicked to display more information.
    </p> -->
</figure>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script type="text/javascript">

        // update chèn file highchart vào

        Highcharts.chart('container', {

        title: {
        text: 'revenue statistics for the last 7 days'
        },

        // subtitle: {
        // text: 'Source: thesolarfoundation.com'
        // },

        yAxis: {
        title: {
            text: 'revenue'
        }
        },

        xAxis: {
        // accessibility: {
        //     rangeDescription: 'Range: 01 to 30'
        // }
        categories: //['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',                          // mảng thời gian
            //'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            <?php echo json_encode($arrX); ?>
        },

        legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
        },

        plotOptions: {
        series: {
            label: {
            connectorAllowed: false
            },
            // pointStart: 01
        }
        },

        series: [{
        name: 'cash',
        data: // [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]               //mảng dữ liệu.
        <?php echo json_encode($arrY); ?>
        }], 

        responsive: {
        rules: [{
            condition: {
            maxWidth: 500
            },
            chartOptions: {
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            }
            }
        }]
        }
        });
    </script>
</body>
</html>