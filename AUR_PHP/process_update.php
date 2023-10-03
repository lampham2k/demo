<?php

$ma = $_POST['ma'];
$title = $_POST['title'];
$content = $_POST['content'];
$linkphotos = $_POST['photos'];

include 'connect.php';

$query = "update tin_tuc
set
tieu_de = '$title',
noi_dung = '$content',
anh = '$linkphotos'
where
ma = '$ma'";

mysqli_query($connect,$query);
