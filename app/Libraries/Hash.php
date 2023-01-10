<?php 



namespace App\Libraries;

class hash {
    public static function make($password){
        return password_hash($password, PASSWORD_BCRYPT);
    }
}

?>