<?php
session_start();
$id = $_GET['id'];
unset($_SESSION['carts'][$id]);