<?php

namespace App\Models;

use CodeIgniter\Model;


class AdminModel extends Model
{
    protected $table = 'administrator';
    protected $allowedFields = ['id', 'email', 'password'];
  

// SELECT * FROM administrator;
public function getAllAdmin(){
    return $this->findAll();
}

// SELECT * FROM administrator WHERE id = $id;
public function getAdminById($id = false ){
    if ($id === false) {
        return null;
    }
    return $this->where(['id' => $id])->first();
}

// SELECT * FROM administrator WHERE email = $email;

public function getAdminByEmail($email = false){
    if ($email === false) {
        return null;
    }
    return $this->where(['email' => $email])->first();
}





}