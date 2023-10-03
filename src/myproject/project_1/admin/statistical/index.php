<?php
require '../manufacture/check_super_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../../index.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
    <style type="text/css">
        #page{
            width: 100%;
            height:1200px;
        }
        #header{
            width: 100%;
            height:20%;
        }
        #content{
            background:#E3E3E3;
            width: 100%;
            height:80%;
        }
        #content-left{
            float:left;
            width: 15%;
            height:100%;
        }
        #content-right{
            float:left;
            width: 85%;
            height:100%;
        }
        .highcharts-figure,
        .highcharts-data-table table {
        min-width: 310px;
        max-width: 800px;
        margin: 1em auto;
        }

        #container {
        height: 400px;
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
    <div id ="page">
        <?php include '../header.php'; ?>
        <div id="content">
            <?php 
                include '../content.php';
                require '../../connect.php';        
            ?>
            <div id="content-right">
            Select the number of days you want to list
            <select id="day">
                <?php for($i = 7; $i <= 30 ; $i++){ ?>
                <option value="<?php echo $i ?>" >
                    <?php echo $i; ?>
                </option>
                <?php } ?>
            </select>
            <figure class="highcharts-figure">
            <div id="container"></div>
            </figure>  
            </div>
        </div>
    </div>
    <script src="https://unpkg.co/gsap@3/dist/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="../../index.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#day').change(function(){
                let days = $(this).val();
                $.ajax({
                    url: 'get_product.php',
                    dataType: 'json',
                    data: {days},
                })
                .done(function(response){ 
                const arr = Object.values(response[0]);
                const arrDetail = [];
                Object.values(response[1]).forEach((each) => {
                    each.data = Object.values(each.data);
                    arrDetail.push(each);
                })
                setTimeout(function() {getChart(days,arr,arrDetail)}, 1000);
                });
            });
        });
        function getChart(days,arr,arrDetail){
            Highcharts.chart('container', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            align: 'left',
                            text: 'tổng số sản phẩm bán được trong' + ' ' + days + ' ngày gần nhất'  
                        },
                        accessibility: {
                            announceNewData: {
                            enabled: true
                            }
                        },
                        xAxis: {
                            type: 'category'
                        },
                        yAxis: {
                            title: {
                            text: 'tổng số bán được'
                            }

                        },
                        legend: {
                            enabled: false
                        },
                        plotOptions: {
                                series: {
                                borderWidth: 0,
                                dataLabels: {
                                    enabled: true,
                                    format: '{point.y:f}'
                                }
                            }
                        },

                        tooltip: {
                            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:f}</b>total<br/>'
                        },

                        series: [
                            {
                                name: "sản phẩm",
                                colorByPoint: true,
                                data: arr
                            }
                        ],
                        drilldown: {
                            breadcrumbs: {
                            position: {
                                align: 'right'
                            }
                        },
                        series: arrDetail
                        } 
                    });
                    console.log(arrDetail);    
            }
    </script>
</body>
</html>