<?php 
session_start();


require_once '../clases/order.php';
require_once '../clases/Product.php';
require_once '../clases/order_details.php';
require_once '../clases/validation/validator.php';
use validation\validator;







if(isset($_POST['submit'])) {
    $name =$_POST['name'];
    $Email =$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address']; 


    //validation
    $v=new validator;
    $v->rules('name', $name,['required','string','max']);
    $v->rules('Email',$Email,['email']);
    $v->rules('phone',$phone,['required','numirec']);
    $v->rules('address',$address,['required','string']);

    $errors=$v->errors;




    //if data is valid
    if($errors==[]){
        $data =[
        'CUSTOMER_NAME' => $name,
        'CUSTOMER_Email' => $Email,
        'customer_phone' => $phone,
        'customer_adress' => $address
        
        ];

        
        $order=new order;
       $result1= $order->store($data);      

       foreach($_SESSION['cart'] as $cart){
           $prod=new Product;
           $product=$prod->getone($cart);


           $ord=new order;
           $orders=$ord->getone($Email);


           $order_id=$orders['order_id'];
           $product_id=$cart;
           $priceEach=$product['price'];

           $product_data =[
            'order_id' => $order_id,
            'product_id' => $product_id,
            'priceEach' => $priceEach
            
    
            ];
            
        $orderdetials=new order_detail;
        $result2= $orderdetials->store($product_data);
        

       }



      
     


       if($result1 == true && $result2 == true){
           session_destroy();
           header('location:../index.php');

       }

       else{
        $_SESSION['errors']=['error storing in database'];
        header('location:../alertbuy.php');

       }
    
    }

    else  {

        $_SESSION['errors']=$errors;
        header('location:../alertbuy.php');
    }
   





}
else{
    header('location:../buy.php');
}
?>