<?php

namespace App\Controllers;

var_dump($_POST);

use App\Models\MessageModel;

class Message extends BaseController
{
    // public function index()
    // {

    // }



    public function createMessage()
    {
        $data = [];
        helper(['form']);
        if ($this->request->getMethod() == 'post') {
            // Let's do the validation here
            $rules = [
                //'satisfaction' => 'required|min_length[3]|max_length[20]',
                'satisfaction' => 'min_length[3]|max_length[20]',
                'comeback' => 'min_length[3]|max_length[20]',
                'remark' => 'required|min_length[3]|max_length[255]',
                'name ' => 'min_length[3]|max_length[20]',
                'email ' => 'min_length[3]|max_length[50]|valid_email',
               // 'email ' => 'min_length[3]|max_length[50]|valid_email|is_unique[users.email]',
            ];


            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                // store the message in database
                $model = new MessageModel();

                $newMessage = [
                    'satisfaction' => $this->request->getVar('satisfaction'),
                    'comeback' => $this->request->getVar('comeback'),
                    'remark' => $this->request->getVar('remark'),
                    'name' => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),


                ];
                $model->save($newMessage);
                $session = session();
                $session->setFlashdata('success', 'Successful Registration Message');
                return redirect()->to('/');
                echo "save in database is OK";
            }
        }


        //echo view('client_index_page.php');
    }
}
