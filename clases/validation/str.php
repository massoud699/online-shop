<?php 
namespace validation;
require_once 'validationinterface.php';
class Str implements validationinterface {
private $name,$value;
public function __construct($name,$value)
{
    $this->name=$name;
    $this->value=$value;
    
}

public function validate()
{
    if(!is_string($this->value)){
        return"$this->name must be string";

    }
    return "";
}




}



?>