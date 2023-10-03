<?php
// tại vì payload là q cho nên GET q.
$q = $_GET['q'];
require '../connect.php';
$sql ="select * from types where name like '%$q%' " ;
$result = mysqli_query($connect,$sql);

$arr = [];
foreach($result as $each){
    $arr[] = $each;
}

echo json_encode($arr);