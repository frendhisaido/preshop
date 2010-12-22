<?php

class System_setting extends Model {

    function System_setting(){
        parent:: Model();
    }

    function hashing($message){
    $main_algo = "snefru";
    $salt_algo = "whirlpool";
    $wew = str_split($message);
    foreach ($wew as $hah){
       $salt = hash($salt_algo, $message);
       $part_message = hash($main_algo, $hah);
       $nguk = $salt . $part_message;
       $final = hash($main_algo, $nguk);
      }
      return $final;
    }
}