<?php

namespace App\Validation;

use App\Models\MessageModel;

class MessageRules
{

    public function validateMessage(string $str, string $fields, array $data)
    {
        $model = new MessageModel();
        $message = $model->where('satisfaction', $data['satisfaction'], 'comeback', $data['comeback'], 'remark', $data['remark'], 'name', $data['name'], 'email', $data['email'])
            ->first();

            if(!$message){
                return false;
                
             
            }
    }
    public $validateMessage_errors = [
        'satisfaction' => [
            'required'    => 'Vous devez indiquer si vous êtes satisfait.',
        ],
        'comeback'    => [
            'valid_email' => 'Please check the Email field. It does not appear to be valid.',
        ],
        'remark'    => [
            'required' => 'Please check the Email field. It does not appear to be valid.',
        ],
        
    ];
}

