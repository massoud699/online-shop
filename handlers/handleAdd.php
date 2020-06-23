<?php 
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


use helpers\image;
use validation\validator;

if(isset($_POST['submit'])) {
    $name =$_POST['name'];
    $price =$_POST['price'];
    $desc=$_POST['desc'];
    $img=$_FILES['img']; 


    //validation
    $v=new validator;
    $v->rules('name', $name,['required','string','max']);
    $v->rules('price',$price,['required','numirec']);
    $v->rules('desc',$desc,['required','string']);
    $v->rules('img',$img,['requiredimg','img']);

    $errors=$v->errors;





    //if data is valid
    if($errors==[]){
        $image= new image($img);
        $data =[
        'name' => $name,
        'desc' => $desc,
        'price' => $price,
        'img' => $image->new_name
        

        ];

        $prod=new Product;
       $result= $prod->store($data);

       if($result==true){
           //upload image
           $image->upload();
           header('location:../index.php');
       }
       else {
        $_SESSION['errors']=['eroor storing in database'];
        header('location:../alert.php');
    }
    }

    else  {

        $_SESSION['errors']=$errors;
        header('location:../alert.php');
    }
   





}
else{
    header('location:../add.php');
}
?>