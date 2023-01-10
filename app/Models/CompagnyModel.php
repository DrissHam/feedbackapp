<?php

namespace App\Models;

use CodeIgniter\Model;


class CompagnyModel extends Model
{
    protected $table = 'compagnys';
    protected $allowedFields = ['id', 'compagny_name', 'address', 'postal_code', 'city', 'snapchat', 'instagram', 'facebook', 'twitter', 'email', 'password', 'created_at', 'update_at', 'status', 'token', 'web', 'avatar', 'role'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }


    protected function passwordHash(array $data)
    {
        if (isset($data['data']['password']))

            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        return $data;
    }
// SELECT * FROM compagnys;
public function getAllCompagnys(){
    return $this->findAll();
}

// DELETE * FROM compagnys WHERE id = $id;
public function deleteCompagny($id = false){
    if ($id === false){
        return null;
    }
    
    return $this->where(['id' => $id])->delete();
}


    // SELECT * FROM compagny WHERE id = $id 
    public function getCompagnyById($id = false)
    {
        if ($id === false) {
            return null;
        }
        return $this->where(['id' => $id])->first();
    }

    public function getCompagnyByEmail($email = false)
    {
        if ($email === false) {
            return null;
        }
        return $this->where(['email' => $email])->first();
    }

    public function getCompagnyByName($compagny_name = false)
    {
        if ($compagny_name === false) {
            return null;
        }
        return $this->where(['compagny_name' => $compagny_name])->first();
    }

    public function getCompagnysByName($compagny_name = false)
    {
        if ($compagny_name === false) {
            return null;
        }
        return $this->where(['compagny_name' => $compagny_name])->findAll();
    }

    public function getCompagnyByAddress($address = false)
    {
        if ($address === false) {
            return null;
        }
        return $this->where(['address' => $address])->first();
    }

    public function getCompagnyByPostalCode($postal_code = false)
    {
        if ($postal_code === false) {
            return null;
        }
        return $this->where(['postal_code' => $postal_code])->first();
    }

    public function getCompagnyByCity($city = false)
    {
        if ($city === false) {
            return null;
        }
        return $this->where(['city' => $city])->first();
    }


    public function getCompagnyByIdAndName($compagny_name = false, $id = false)
    {
        if ($compagny_name === false || $id === false) {
            return null;
        }
        return $this->where(['compagny_name' => $compagny_name, 'id' => $id])->findAll();
    }



    // SELECT * FROM compagny
    public function getCompagnyByNameAndAddressAndPostalCodeAndCity($compagny_name = false, $address = false, $postal_code = false, $city = false)
    {
        if ($compagny_name === false || $address === false || $postal_code === false || $city = false) {
            return null;
        }
        return $this->where(['compagny_name' => $compagny_name, 'address' => $address, 'postal_code' => $postal_code, 'city' => $city])->findAll();
    }

    public function updateCompagnyById($id = false, $compagny_name = false, $avatar = false, $address = false, $postal_code = false, $city = false, $snapchat = false, $instagram = false, $facebook = false, $twitter = false, $email = false, $web = false)
    {
        if ($id === false || $compagny_name === false || $avatar === false || $address === false || $postal_code === false || $city === false || $snapchat === false || $instagram === false || $facebook === false || $twitter === false || $email === false || $web === false) {
            return null;
        }
        $data = [


            'compagny_name' => $compagny_name,
            'avatar' => $avatar,
            'address' => $address,
            'postal_code' => $postal_code,
            'city' => $city,
            'snapchat' => $snapchat,
            'instagram' => $instagram,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'email' => $email,
            'web' => $web,

        ];

        return $this->update($id, $data);
    }

    public function updateCompagnyPasswordById($id = false, $password = false)
    {
        if ($id === false || $password === false) {
            return null;
        }
        $data = [
            'password' => $password,
        ];

        return $this->update($id, $data);
    }
    public function updateCompagnyByAvatar($id = false, $avatar = false)
    {
        if ($id === false || $avatar === false) {
            return null;
        }
        $data = [
            'avatar' => $avatar,
        ];
        return $this->update($id, $data);
    }

    public function deleteAvatarCompagnyById($id = false, $avatar = false)
    {
        if ($id === false || $avatar === false) {
            return null;
        }
        $data = [
            'avatar' => $avatar,
        ];
        return $this->delete($avatar, true);
    }



    public function renameAvatarFile($id = false, $avatar = false)
    {
        if ($id === false || $avatar === false) {
            return null;
        }
        $data = [
            'avatar' => $avatar,
            $avatar => 'avatar_img' . $id,

        ];
    }
    public function validAvatar($filetype)
    {
        $types = ['avatar/gif', 'avatar/png', 'avatar/jpg', 'avatar/jpeg'];
        return in_array($filetype, $types) ? true : false;
    }
}
