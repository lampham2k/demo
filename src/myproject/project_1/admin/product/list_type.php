<?php
require 'check_admin.php'
$q = $_GET['q'];
require '../../connect.php';
$sql ="select * from types where name like '%$q%' " ;
$result = mysqli_query($connect,$sql);

$arr = [];
foreach($result as $each){
    $arr[] = $each;
}

echo json_encode($arr);