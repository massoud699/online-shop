<?php

use validation\validator;

session_start();
if(!isset($_SESSION['id'])) {

    header('location:../login.php');
    die();
 }
require_once '../clases/Product.php';
require_once '../clases/helpers/image.php';
require_once '../clases/validation/validator.php';
require_once '../clases/validation/requiredimg.php';
require_once '../clases/validation/imag.php';
if(isset($_POST['submit'])) {
    $id=$_GET['id'];
    $name =$_POST['name'];
    $price =$_POST['price'];
    $desc=$_POST['desc'];
    //validation
    $v=new validator;
    $v->rules('name', $name,['required','string','max']);
    $v->rules('price',$price,['required','numirec']);
    $v->rules('desc',$desc,['required','string']);

    $errors=$v->errors;





    //if data is valid
    if($errors==[]){
        //update in db
        $data =[
        'name' => $name,
        'price' => $price,
        'desc' => $desc
        
        ];

        $prod=new Product;
       $result= $prod->edit($id,$data);

       if($result==true){
        
           header('location:../show.php?id='.$id);
       }
       else{
        $_SESSION['errors']=['eroor updating in database'];
        header('location:../alert.php');

       }
     
    
    }
    else {
        $_SESSION['errors']=$errors;
        header('location:../alert.php');
    }
}


?>