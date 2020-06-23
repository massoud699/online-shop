<?php 
session_start();
require_once '../clases/validation/validator.php';
require_once '../clases/admin.php';





use validation\validator;

if(isset($_POST['submit'])) {
    $email =$_POST['email'];
    $pass =$_POST['pass'];



    //validation
    $v=new validator;
    $v->rules('email', $email,['required','email','max']);
    $v->rules('pass',$pass,['required','string']);

    $errors=$v->errors;





    //if data is valid
    if($errors==[]){
        $admin= new admin;
      $result=  $admin->attempt($email,sha1($pass));
      

       if($result!==null){
      $_SESSION['id']=$result['id'];
      $_SESSION['namee']=$result['namee'];
            
      header('location:../home.php');

       }
       else {

        $_SESSION['errors']=['your credentials are not correct'];
        var_dump($result);
    

        header('location:../login.php');
     
            }

    }

    else  {
        $_SESSION['errors']=$errors;

        header('location:../login.php');

    }
   





}
else{
    header('location:../login.php');
}
