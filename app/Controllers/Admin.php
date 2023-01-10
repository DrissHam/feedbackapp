<?php

namespace App\Controllers;

use App\Models\MessageModel;
use App\Models\CompagnyModel;
use CodeIgniter\Debug\Toolbar\Collectors\Views;

class Admin extends BaseController
{

    public function loginAdmin()
    {
       // echo "run" . "<br>";
        $model = model(AdminModel::class);
        if ($this->request->getMethod() === 'post' && $this->validate([

            'email ' => 'min_length[3]|max_length[50]|valid_email',
            'password' => 'required|min_length[2]',

        ])) {

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $admin = $model->getAdminByEmail($email);
           // echo $email . "<br>";
           // echo $password . "<br>";
//var_dump($admin);
//return null;
$session = session();
           if ($admin === null ){
echo "le mail n'est pas reconnu";
return redirect()->to('/pro')->with('errorMdpOrMail', 'Veuillez verifier votre mot de pass et/ou votre adresse mail');

            }
           if ($email != $admin['email'] || $password != $admin['password']){
             
               
            echo "le mot de passe saisi est incorrect ou l'adresse email n'est pas reconnu";
           } elseif  (isset($password) && $password === $admin['password']) {
            $session->set('adminId', $admin['id']);
        //    echo "success connexion";
           
             return redirect()->to('/admin/all_compagnys')->with('success', 'bienvenue administrateur');
       // echo "marche";
           }
        

          
       
           return redirect()->to('/pro')->with('errorMdpOrMail', 'Veuillez verifier votre mot de pass et/ou votre adresse mail');
        }
        return redirect()->to('/pro')->with('errorMdpOrMail', 'Veuillez verifier votre mot de pass et/ou votre adresse mail');

    }

    public function adminCompagnys()
    {
        $session = session();
        $idAdmin = $session->get('adminId');


        if (isset($idAdmin)) {
            $compagnyModel = model(CompagnyModel::class);
            $adminModel = model(AdminModel::class);
        //    echo "run";
           $compagnys = $compagnyModel->getAllCompagnys();
           //  var_dump($compagnys);
           //  echo $compagnys;
            $data['compagnys'] = $compagnys;
         //   return view('/admin/all_compagnys', $data);
            return view('/admin/all_compagnys3', $data);
       } else {
           return redirect()->to('/pro')->with('errors2', 'Vous devez etre connecté pour acceder à cette page');
       }
    }

    public function adminMessages($id_compagny)
    {
        $session = session();
        $idCompagny = $session->get('adminId');

        if (isset($idCompagny)) {
            $compagnyModel = model(CompagnyModel::class);
            $messageModel = model(MessageModel::class);
            $id = $id_compagny;
            $compagnys = $compagnyModel->getCompagnyById($id);
            $messages = $messageModel->getMessageByIdCompagny($id_compagny);

            $data['compagnys'] = $compagnys;
            $data['messages'] = $messages;
            return view('/admin/all_messages', $data);
        } else {
            return redirect()->to('/pro')->with('errors2', 'Vous devez etre connecté pour acceder à cette page');
        }
    }


    public function adminDeleteCompagny($id)
    {
        $compagnyModel = model(CompagnyModel::class);
        // echo "run";
        $compagnys = $compagnyModel->deleteCompagny($id);
        // var_dump($compagnys);
        //  echo $compagnys;
        $data['compagnys'] = $compagnys;
        return redirect()->back()->with('success', 'La compagnie a bien eta it supprimé ' . "<br>" . "Félicitation Bro!!! Un client en moins");
    }

    public function adminDashboard()
    {
        $compagnyModel = model(CompagnyModel::class);
        $messageModel = model(MessageModel::class);
        
        
        return view('/admin/dashboard_admin');
    }
}