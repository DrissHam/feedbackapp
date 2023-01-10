<?php namespace App\Libraries;


use App\Models\MessageModel;


class MesMessages 
{

   

    public function getAllMessages ()
    {
        
        $messageModel = new MessageModel();

        $messages = $messageModel
        ->orderBy('id')
        ->findAll();

        foreach ($messages as &$message)
        {
            $message = $messageModel
            ->where(['id_message' => $message->id])
            ->orderBy('id')
            ->findAll();
        }
        unset($message);

        return $messages;

    }
}

?>