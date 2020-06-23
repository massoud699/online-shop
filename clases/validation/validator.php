<?php

namespace validation;

use helpers\image;

require_once 'email.php';
require_once 'max.php';
require_once 'numirec.php';
require_once 'required.php';
require_once 'str.php';
require_once 'validationinterface.php';
require_once 'requiredimg.php';
require_once 'imag.php';






class validator
{
    public $errors = [];

    public function makevalidation(validationinterface $v)
    {
        return $v->validate();
    }

    public function rules($name, $value, array $rules)
    {
        foreach ($rules as $rule) {
        
             if ($rule == 'email') {
                $eror = $this->makevalidation(new Email($name, $value));
            }
            else if($rule == 'required'){
                $eror=$this->makevalidation(new Required($name,$value));

            }
            else if ($rule == 'max') {
                $eror = $this->makevalidation(new Max($name, $value));
            } 
            else  if ($rule == 'numirec') {
                $eror =   $this->makevalidation(new Numirec($name, $value));
            }
            else if ($rule == 'str') {
                $eror =  $this->makevalidation(new str($name, $value));
            }
            else if ($rule == 'requiredimg') {
                $eror =  $this->makevalidation(new Requiredimage($name, $value));
            }
            else if ($rule == 'img') {
                $eror =  $this->makevalidation(new img($name, $value));
            }
            else{
                $eror="";
            }
            if(strlen($eror)>0)
            array_push($this->errors, $eror);
        }
       
    }
}
