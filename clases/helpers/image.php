<?php

namespace helpers;




class image{
public $name,$tmp_name,$new_name;

public function __construct($img){
$this->name=$img['name'];
$this->tmp_name=$img['tmp_name'];
$ext=pathinfo($this->name)['extension'];
$this->new_name=uniqid().'.'.$ext;

}

public function upload(){
    move_uploaded_file($this->tmp_name,'../images/'.$this->new_name);
}




}
