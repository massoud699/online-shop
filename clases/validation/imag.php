<?php 
namespace validation;
require_once 'validationinterface.php';
class img implements validationinterface {
private $name,$value;
public function __construct($name,$value)
{
    $this->name=$name;
    $this->value=$value;
    
}

public function validate()
{
    $types=['image/jpg','image/png','image/jpeg','image/gif'];
    if( strlen($this->value['name'])>0 &&  !in_array($this->value['type'],$types)){
        return"$this->name must be an image";

    }
    return "";
}




}



?>