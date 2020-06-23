<?php 

session_start();
if(!isset($_SESSION['id'])) {

    header('location:../login.php');
    die();
 }
require_once '../clases/Product.php';
$id=$_GET['id'];
$prod=new Product;
$product=$prod->getone($id);
$img=$product['img'];

unlink('../images/'.$img);

$result= $prod->delete($id);

header('location:../index.php');








?>