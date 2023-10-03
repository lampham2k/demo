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
     require '../connect.php';
    ?>
    <figure class="highcharts-figure">
    <div id="container"></div>
    </figure>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $.ajax({
                url: '../../get_revenue.php',
                // type: 'GET',
                dataType: 'json',
                data: {days: 30},
            })
            .done(function(response){ // hàm chạy thành công thì in ra , response là tên hàm muốn đặt ntn cũng dc.
                const arrX = Object.keys(response);
                const arrY = Object.values(response);
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
                    categories:arrX //['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',                          // mảng thời gian
                        //'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],   
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
                        data: arrY // [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]               //mảng dữ liệu.
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
            });
        });

        // update chèn file highchart vào
    </script>
</body>
</html>