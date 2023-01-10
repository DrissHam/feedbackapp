<?php 

namespace App\Entities;

use CodeIgniter\Entity;

class Message extends Entity
{
    public $messages;

    public function __construct(array $data = null)
    {
       parent::__construct($data);
       $this->messages = []; 
    }
}





?>