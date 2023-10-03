<?php
$title = $_POST['title'];
$content = $_POST['content'];
$linkphotos = $_POST['photos'];

include 'connect.php';

$sql = "insert into tin_tuc(tieu_de,noi_dung,anh)
values('$title','$content','$linkphotos')";

mysqli_query($connect , $sql);

$errors = mysqli_error($connect);

echo $errors;
