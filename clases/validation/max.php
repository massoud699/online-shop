<?php 
namespace validation;
require_once 'validationinterface.php';
class Max implements validationinterface {
private $name,$value;
public function __construct($name,$value)
{
    $this->name=$name;
    $this->value=$value;
    
}

public function validate()
{
    if(strlen($this->value)>100){
        return"$this->name must be less than 100 characters";

    }
    return "";
}




}



?>