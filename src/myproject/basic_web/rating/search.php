<?php

$search = $_GET['term'];

require '../admin/connect.php';
$sql = "select * from products where name like '%$search%' ";
$result = mysqli_query($connect,$sql);


$arr = [];
foreach($result as $each){
    $arr[] = [
        'label' => $each['name'],   //label = tên sản phẩm
        'value' => $each['id'],     //value = id của sản phẩm
        'photo' => $each['photo'],     
    ];
}

echo json_encode($arr);




