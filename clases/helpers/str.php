<?php
namespace helpers;
class str{
    public static function limit($str){
        if(strlen($str)>20){
           $str= substr($str,0,150). ' ...';

        }
        return $str;
    }
}
?>