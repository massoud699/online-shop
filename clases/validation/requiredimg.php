<?php 
namespace validation;
require_once 'validationinterface.php';
class Requiredimage implements validationinterface {
private $name,$value;
public function __construct($name,$value)
{
    $this->name=$name;
    $this->value=$value;
    
}

public function validate()
{
    if(strlen($this->value['name'])==0){
        return"$this->name is required";

    }
    return "";
}




}



?>