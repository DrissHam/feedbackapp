<?php

namespace App\Models;

use CodeIgniter\Model;

class MessageModel extends Model
{

    protected $table = 'messages';
    protected $allowedFields = ['status', 'satisfaction', 'comeback', 'remark', 'name', 'email', 'created_at', 'id_compagny'];


    // SELECT * FROM messages WHERE remark = $remark;
    public function getMessageByRemark($remark = false)
    {
        if ($remark === false) {
            return null;
        }
        return $this->where(['remark' => $remark])->findAll();
    }



    // SELECT * FROM messages; pour recup tous les messages
    public function getAllMessages()
    {
        return $this->findAll();
    }



    // SELECT COUNT(*) FROM messages; pour recup le compte de tous les messages
    public function countAllMessages()
    {
        return $this->countAll();
    }



    // SELECT * FROM messages WHERE satisfaction = $satisfaction; pour recup les messages par satisfaction
    public function getMessageBySatisfaction($satisfaction = false)
    {
        if ($satisfaction === false) {
            return $this->getAllMessages();
        }
        return $this->where(['satisfaction' => $satisfaction])->findAll();
    }



    // SELECT * FROM messages WHERE status = $status; pour recup les messages par status (new, to-treat, archived)
    public function getMessageByStatus($status = false)
    {
        if ($status === false) {
            return $this->getAllMessages();
        }
        return $this->where(['status' => $status])->findAll();
    }



    // SELECT * FROM messages WHERE created_at 
    public function getMessageByCreated_at($created_at = false)
    {
        if ($created_at === false) {
            return $this->getAllMessages();
        }
        return $this->where(['created_at' => $created_at])->findAll();
    }



    // SELECT * FROM messages WHERE id_compagny = $id_compagny
    public function getMessageByIdCompagny($id_compagny = false)
    {
        if ($id_compagny === false) {
            return $this->getAllMessages();
        }
        return $this->where(['id_compagny' => $id_compagny])->findAll();
    }



    // SELECT * FROM messages WHERE satisfaction = $satisfaction AND status = $status
    public function getMessageBySatisfactionAndStatus($satisfaction = false, $status = false)
    {
        if ($satisfaction === false && $status === false) {
            return $this->getAllMessages();
            // return null;
        } elseif ($satisfaction === false && $status != false) {
            return $this->getMessageByStatus($status);
        } elseif ($satisfaction != false && $status === false) {
            return $this->getMessageBySatisfaction($satisfaction);
        }
        return $this->where(['satisfaction' => $satisfaction, 'status' => $status])->findAll();
    }



    //SELECT * FROM messages WHERE status = "new"/"to-treat"/"archived" AND id_compagny = $id_compagny; On recup les messages par status et par id compagny.
    public function getMessageByStatusAndIdCompagny($status = false, $id_compagny = false)
    {
        if ($status === false || $id_compagny === false) {
            //return $this->getAllMessages();
            return null;
        }
        return $this->where(['status' => $status, 'id_compagny' => $id_compagny])->findAll();
    }



    public function getMessageBySatisfactionAndIdCompagny($satisfaction = false, $id_compagny = false)
    {
        if ($satisfaction === false || $id_compagny === false) {
            return null;
        }
        return $this->where(['satisfaction' => $satisfaction, 'id_compagny' => $id_compagny])->findAll();
    }




    // SELECT * FROM messages WHERE satisfaction = $satisfaction AND status = $status AND id_compagny = $id_compagny
    public function getMessageBySatisfactionAndStatusAndIdCompagny($satisfaction = false, $status = false, $id_compagny = false)
    {
        if ($satisfaction === false || $status === false || $id_compagny === false) {
            // return $this->getAllMessages();
            return null;
        }
        return $this->where(['satisfaction' => $satisfaction, 'status' => $status, 'id_compagny' => $id_compagny])->findAll();
    }


    // SELECT COUNT(*) FROM messages WHERE status = $status
    public function countMessageByStatus($status = false)
    {
        if ($status === false) {
            return $this->countAllMessages();
        }
        return $this->where(['status' => $status])->countAllResults();
    }



    // SELECT count(*) FROM messages WHERE satisfaction = $satisfaction (1 (satisfait) OR 0 (insatisfait)); On recup le compte des messages en fonction de l'etat de la satisfaction
    public function countMessageBySatisfaction($satisfaction = false)
    {
        if ($satisfaction === false) {
            return $this->countAllMessages();
        }
        return $this->where(['satisfaction' => $satisfaction])->countAllResults();
    }


    // SELECT COUNT(*) FROM messages WHERE id_compagny = $id_compagny
    public function countMessagesByIdCompagny($id_compagny = false)
    {
        if ($id_compagny === false) {
            return $this->countAllMessages();
        }

        return $this->where(['id_compagny' => $id_compagny])->countAllResults();
    }


    // SELECT COUNT(*) FROM messages WHERE status = $status AND id_compagny = $id_compagny
    public function countMessageByStatusAndIdCompagny($status = false, $id_compagny = false)
    {
        if ($status === false && $id_compagny === false) {
            return null;
        } elseif ($status === false && $id_compagny != false) {
            return $this->countMessagesByIdCompagny($id_compagny);
        } elseif ($status != false && $id_compagny === false) {
            return $this->countMessageByStatus($status);
        }
        return $this->where(['status' => $status, 'id_compagny' => $id_compagny])->countAllResults();
    }


    // SELECT COUNT(*) FROM messages WHERE satisfaction = $satisfaction AND id_compagny = $id_compagny
    public function countMessageBySatisfactionAndIdCompagny($satisfaction = false, $id_compagny = false)
    {
        if ($satisfaction === false && $id_compagny === false) {
            return null;
        } elseif ($satisfaction === false && $id_compagny != false) {
            return $this->countMessagesByIdCompagny($id_compagny);
        } elseif ($satisfaction != false && $id_compagny === false) {
            return $this->countMessageBySatisfaction($satisfaction);
        }
        return $this->where(['satisfaction' => $satisfaction, 'id_compagny' => $id_compagny])->countAllResults();
    }

    // UPDATE messages SET status = $status WHERE id = $id (passer les massages du status 'new' au status 'archived' ou 'to-treat')
    public function updateStatusById($status = false, $id = false)
    {
        if ($status === false || $id === false) {
            return null;
        }
        $data = [
            
            'status' => $status,
        ];
        
        return $this->update($id, $data);
    }

    // UPDATE messages SET  status = "archived"	 WHERE id = 2; Ici on modifie le status qui est initialement "new" par le status "archived" pour le mesage qui porte l'id 2.
    // public function updateMessageStatus($status)
    // {

    //     $messageModel = model(MessageModel::class);
    //     $compagnyModel = model(CompagnyModel::class);
    //     $db      = \Config\Database::connect();
    //     $builder = $db->table('messages');
    //     $data = [
    //         [
    //             'status' => 'new',
    //         ],
    //         [
    //             'status' => 'archived',
    //         ],
    //     ];

    //     $builder->updateBatch($data);
    // }
    // public function updateMessageStatusArchived($id)
    // {

    //     $messageModel = model(MessageModel::class);
    //     $compagnyModel = model(CompagnyModel::class);
    //     $db      = \Config\Database::connect();
    //     $builder = $db->table('messages');
    //     $data = [

    //         'status' => 'archived',
    //     ];
    //     $builder->where('id', $id);
    //     $builder->replace($data);
    // }




    // public function updateMessageStatus2($status = false)
    // {

    //     $model = model(MessageModel::class);

    //     if ($this->request->getMethod() === 'post' && $this->validate([])) {

    //         $model->save([
    //             'status' => $this->request->getPost('status'),


    //         ]);
    //         echo view('success');
    //     } else {
    //         echo view('/dashboard/dashboard_all_messages_page');
    //     }
    // }


}
