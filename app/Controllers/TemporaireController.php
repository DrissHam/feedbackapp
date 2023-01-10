<?php

namespace App\Controllers;

use App\Models\MessageModel;
//use CodeIgniter\Entity\Cast\IntegerCast;


class Pro extends BaseController
{
    public function index()
    {
        return view('pro_index_page');
    }

    public function dashboard()
    {
        $messageModel = model(MessageModel::class);
        $compagnyModel = model(CompagnyModel::class);

        $idCompagny = 1;
        // Recuperer le nom de la compagnie 1:
        $nameCompagny = $compagnyModel->getCompagnyById($idCompagny)["compagny_name"];
        // recupere l'adresse de la compagny:
        $addressCompagny = $compagnyModel->getCompagnyById($idCompagny)["address"];




        $nbNewMessages = $messageModel->countMessageByStatusAndIdCompagny('new', $idCompagny);
        $nbToTreatMessages = $messageModel->countMessageByStatusAndIdCompagny('to-treat', $idCompagny);;
        $nbArchivedMessages = $messageModel->countMessageByStatusAndIdCompagny('archived', $idCompagny);
        $nbAllMessages = $messageModel->countMessagesByIdCompagny($idCompagny);
        $nbSatisfiedMessages = $messageModel->countMessageBySatisfactionAndIdCompagny(1, $idCompagny);
        $nbUnsatisfiedMessages = $messageModel->countMessageBySatisfactionAndIdCompagny(0, $idCompagny);



        $data['nbSatisfiedMessages'] = $nbSatisfiedMessages;
        $data['nbUnsatisfiedMessages'] = $nbUnsatisfiedMessages;
        $data['nbNewMessages'] = $nbNewMessages;
        $data['nbToTreatMessages'] = $nbToTreatMessages;
        $data['nbArchivedMessages'] = $nbArchivedMessages;
        $data['nbAllMessages'] = $nbAllMessages;
        $data['nameCompagny'] = $nameCompagny;

        return view('dashboard/dashboard_page', $data);
    }

    public function new_messages()
    {

        $messageModel = model(MessageModel::class);
        $compagnyModel = model(CompagnyModel::class);
        // Paramère filter dans l'url
        $filter = $this->request->getVar('filter');


        $idCompagny = 1;
        if ($filter == 'satisfied') {
            $messages = $messageModel->getMessageBySatisfactionAndStatusAndIdCompagny(1, 'new', $idCompagny);
        } elseif ($filter == 'unsatisfied') {
            $messages = $messageModel->getMessageBySatisfactionAndStatusAndIdCompagny(0, 'new', $idCompagny);
        } else {
            $messages = $messageModel->getMessageByStatusAndIdCompagny('new', $idCompagny);
        }

        for ($i = 0; $i < sizeof($messages); $i++) {
            $idCompagny = $messages[$i]["id_compagny"];
            $compagnys = $compagnyModel->getCompagnyById($idCompagny);
            $messages[$i]["compagny_name"] = $compagnys["compagny_name"];
        }
        $data['messages'] = $messages;


        $nameCompagny = $compagnyModel->getCompagnyById($idCompagny)["compagny_name"];

        $nbNewMessages = $messageModel->countMessageByStatusAndIdCompagny('new', $idCompagny);
        $nbToTreatMessages = $messageModel->countMessageByStatusAndIdCompagny('to-treat', $idCompagny);;
        $nbArchivedMessages = $messageModel->countMessageByStatusAndIdCompagny('archived', $idCompagny);
        $nbAllMessages = $messageModel->countMessagesByIdCompagny($idCompagny);
        $nbSatisfiedMessages = $messageModel->countMessageBySatisfactionAndIdCompagny(1, $idCompagny);
        $nbUnsatisfiedMessages = $messageModel->countMessageBySatisfactionAndIdCompagny(0, $idCompagny);


        $data['nbSatisfiedMessages'] = $nbSatisfiedMessages;
        $data['nbUnsatisfiedMessages'] = $nbUnsatisfiedMessages;
        $data['nbNewMessages'] = $nbNewMessages;
        $data['nbToTreatMessages'] = $nbToTreatMessages;
        $data['nbArchivedMessages'] = $nbArchivedMessages;
        $data['nbAllMessages'] = $nbAllMessages;
        $data['nameCompagny'] = $nameCompagny;






        return view('dashboard/dashboard_new_messages_page', $data);
    }


    public function to_treat_messages()
    {
        $messageModel = model(MessageModel::class);
        $compagnyModel = model(CompagnyModel::class);

        // Paramère filter dans l'url
        $filter = $this->request->getVar('filter');
        $messages = $messageModel->getMessageBySatisfaction($filter);

        $idCompagny = 1;
        if ($filter == 'satisfied') {
            $messages = $messageModel->getMessageBySatisfactionAndStatusAndIdCompagny(1, 'to-treat', $idCompagny);
        } elseif ($filter == 'unsatisfied') {
            $messages = $messageModel->getMessageBySatisfactionAndStatusAndIdCompagny(0, 'to-treat', $idCompagny);
        } else {
            $messages = $messageModel->getMessageByStatusAndIdCompagny('to-treat', $idCompagny);
        }

        for ($i = 0; $i < sizeof($messages); $i++) {
            $idCompagny = $messages[$i]["id_compagny"];
            $compagnys = $compagnyModel->getCompagnyById($idCompagny);
            $messages[$i]["compagny_name"] = $compagnys["compagny_name"];
        }
        $data['messages'] = $messages;

        $nameCompagny = $compagnyModel->getCompagnyById($idCompagny)["compagny_name"];

        $nbNewMessages = $messageModel->countMessageByStatusAndIdCompagny('new', $idCompagny);
        $nbToTreatMessages = $messageModel->countMessageByStatusAndIdCompagny('to-treat', $idCompagny);;
        $nbArchivedMessages = $messageModel->countMessageByStatusAndIdCompagny('archived', $idCompagny);
        $nbAllMessages = $messageModel->countMessagesByIdCompagny($idCompagny);
        $nbSatisfiedMessages = $messageModel->countMessageBySatisfactionAndIdCompagny(1, $idCompagny);
        $nbUnsatisfiedMessages = $messageModel->countMessageBySatisfactionAndIdCompagny(0, $idCompagny);

        $data['nbSatisfiedMessages'] = $nbSatisfiedMessages;
        $data['nbUnsatisfiedMessages'] = $nbUnsatisfiedMessages;
        $data['nbNewMessages'] = $nbNewMessages;
        $data['nbToTreatMessages'] = $nbToTreatMessages;
        $data['nbArchivedMessages'] = $nbArchivedMessages;
        $data['nbAllMessages'] = $nbAllMessages;
        $data['nameCompagny'] = $nameCompagny;

        return view('dashboard/dashboard_to_treat_messages_page', $data);
    }


    public function archived_messages()
    {
        $messageModel = model(MessageModel::class);
        $compagnyModel = model(CompagnyModel::class);


        $filter = $this->request->getVar('filter');
        $messages = $messageModel->getMessageBySatisfaction($filter);



        $idCompagny = 1;
        if ($filter == 'satisfied') {
            $messages = $messageModel->getMessageBySatisfactionAndStatusAndIdCompagny(1, 'archived', $idCompagny);
        } elseif ($filter == 'unsatisfied') {
            $messages = $messageModel->getMessageBySatisfactionAndStatusAndIdCompagny(0, 'archived', $idCompagny);
        } else {
            $messages = $messageModel->getMessageByStatusAndIdCompagny('archived', $idCompagny);
        }
        for ($i = 0; $i < sizeof($messages); $i++) {
            $idCompagny = $messages[$i]["id_compagny"];
            $compagnys = $compagnyModel->getCompagnyById($idCompagny);
            $messages[$i]["compagny_name"] = $compagnys["compagny_name"];
        }
        $data['messages'] = $messages;

        $nameCompagny = $compagnyModel->getCompagnyById($idCompagny)["compagny_name"];
        $idCompagny = 1;
        $nbNewMessages = $messageModel->countMessageByStatusAndIdCompagny('new', $idCompagny);
        $nbToTreatMessages = $messageModel->countMessageByStatusAndIdCompagny('to-treat', $idCompagny);;
        $nbArchivedMessages = $messageModel->countMessageByStatusAndIdCompagny('archived', $idCompagny);
        $nbAllMessages = $messageModel->countMessagesByIdCompagny($idCompagny);
        $nbSatisfiedMessages = $messageModel->countMessageBySatisfactionAndIdCompagny(1, $idCompagny);
        $nbUnsatisfiedMessages = $messageModel->countMessageBySatisfactionAndIdCompagny(0, $idCompagny);

        $data['nbSatisfiedMessages'] = $nbSatisfiedMessages;
        $data['nbUnsatisfiedMessages'] = $nbUnsatisfiedMessages;
        $data['nbNewMessages'] = $nbNewMessages;
        $data['nbToTreatMessages'] = $nbToTreatMessages;
        $data['nbArchivedMessages'] = $nbArchivedMessages;
        $data['nbAllMessages'] = $nbAllMessages;
        $data['nameCompagny'] = $nameCompagny;


        return view('dashboard/dashboard_archived_messages_page', $data);
    }

    public function all_messages()
    {

        $messageModel = model(MessageModel::class);
        $compagnyModel = model(CompagnyModel::class);
        // Paramère filter dans l'url

        $filter = $this->request->getVar('filter');
        $messages = $messageModel->getMessageBySatisfaction($filter);

        $idCompagny = 1;
        if ($filter == 'satisfied') {
            $messages = $messageModel->getMessageBySatisfactionAndIdCompagny(1, $idCompagny);
        } elseif ($filter == 'unsatisfied') {
            $messages = $messageModel->getMessageBySatisfactionAndIdCompagny(0, $idCompagny);
        } else {
            $messages = $messageModel->getMessageByIdCompagny($idCompagny);
        }



        for ($i = 0; $i < sizeof($messages); $i++) {
            $idCompagny = $messages[$i]["id_compagny"];
            $compagnys = $compagnyModel->getCompagnyById($idCompagny);
            $messages[$i]["compagny_name"] = $compagnys["compagny_name"];
        }

        $data['messages'] = $messages;

        $nameCompagny = $compagnyModel->getCompagnyById($idCompagny)["compagny_name"];
        $nbNewMessages = $messageModel->countMessageByStatusAndIdCompagny('new', $idCompagny);
        $nbToTreatMessages = $messageModel->countMessageByStatusAndIdCompagny('to-treat', $idCompagny);;
        $nbArchivedMessages = $messageModel->countMessageByStatusAndIdCompagny('archived', $idCompagny);
        $nbAllMessages = $messageModel->countMessagesByIdCompagny($idCompagny);
        $nbSatisfiedMessages = $messageModel->countMessageBySatisfactionAndIdCompagny(1, $idCompagny);
        $nbUnsatisfiedMessages = $messageModel->countMessageBySatisfactionAndIdCompagny(0, $idCompagny);

        $data['nbSatisfiedMessages'] = $nbSatisfiedMessages;
        $data['nbUnsatisfiedMessages'] = $nbUnsatisfiedMessages;
        $data['nbNewMessages'] = $nbNewMessages;
        $data['nbToTreatMessages'] = $nbToTreatMessages;
        $data['nbArchivedMessages'] = $nbArchivedMessages;
        $data['nbAllMessages'] = $nbAllMessages;
        $data['nameCompagny'] = $nameCompagny;

        return view('dashboard/dashboard_all_messages_page', $data);
    }


    public function profile($idCompagny)
    {
        $messageModel = model(MessageModel::class);
        $compagnyModel = model(CompagnyModel::class);


        // Recuperer le nom de la compagnie 1:
        $nameCompagny = $compagnyModel->getCompagnyById($idCompagny)["compagny_name"];
        // recupere l'adresse de la compagny:
        $addressCompagny = $compagnyModel->getCompagnyById($idCompagny)["address"];
        $postalCodeCompagny = $compagnyModel->getCompagnyById($idCompagny)["postal_code"];
        $cityCompagny = $compagnyModel->getCompagnyById($idCompagny)["city"];
        $emailCompagny = $compagnyModel->getCompagnyById($idCompagny)["email"];
        $snapchatCompagny = $compagnyModel->getCompagnyById($idCompagny)["snapchat"];
        $instagramCompagny = $compagnyModel->getCompagnyById($idCompagny)["instagram"];
        $facebookCompagny = $compagnyModel->getCompagnyById($idCompagny)["facebook"];
        $twitterCompagny = $compagnyModel->getCompagnyById($idCompagny)["twitter"];
        $webSiteCompagny = $compagnyModel->getCompagnyById($idCompagny)["web"];
        $passwordCompagny = $compagnyModel->getCompagnyById($idCompagny)["password"];
        $avatarCompagny = $compagnyModel->getCompagnyById($idCompagny)["avatar"];
        $addressCompagny = $compagnyModel->getCompagnyById($idCompagny)["address"];
        $avatarCompagny = $compagnyModel->getCompagnyById($idCompagny)["avatar"];

        $this->validate([
            'avatar' => 'uploaded[avatar]|max_size[avatar,1024]',
        ]);

        $data['idCompagny'] = $idCompagny;

        $data['nameCompagny'] = $nameCompagny;
        $data['addressCompagny'] = $addressCompagny;
        $data['postalCodeCompagny'] = $postalCodeCompagny;
        $data['cityCompagny'] = $cityCompagny;
        $data['emailCompagny'] = $emailCompagny;
        $data['snapchatCompagny'] = $snapchatCompagny;
        $data['instagramCompagny'] = $instagramCompagny;
        $data['facebookCompagny'] = $facebookCompagny;
        $data['twitterCompagny'] = $twitterCompagny;
        $data['webSiteCompagny'] = $webSiteCompagny;
        $data['passwordCompagny'] = $passwordCompagny;
        $data['avatarCompagny'] = $avatarCompagny;







        return view('dashboard/dashboard_profile_page', $data);
    }




    public function updateProfileAvatar($id)
    {
        $messageModel = model(MessageModel::class);
        $compagnyModel = model(CompagnyModel::class);

        $compagnys = $compagnyModel->updateCompagnyById();
        echo "run";
        // if (empty($avatar)){
        //     echo "ok existe";
        //     return null;
        // }

        //$avatar = $compagnyModel->getCompagnyById($id)['avatar'];
        
        $avatar = $compagnyModel->getCompagnyById($id)['avatar'];

        //  $avatar = $compagnyModel->updateCompagnyByAvatar($id)['avatar'];
        // echo $avatar;
        //  return null;
        // $avatar = $this->request->getVar('avatar');
        if (!empty($avatar)) {
            //  $avatar = $compagnyModel->deleteAvatarCompagnyById($avatar);
            unlink("./pages/images/avatar_img" . $id);
            echo "ici1";
        }
        $compagnyModel->updateCompagnyByAvatar($id, null);
        $avatar = $compagnyModel->getCompagnyById($id)['avatar'];

        if ($this->request->getMethod() === 'post' && $this->validate([
            'avatar' => 'uploaded[avatar]|max_size[avatar,1024]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
        ])) {
            echo "ici4";

            $avatar = $this->request->getFile('avatar');
            $compagnys = $compagnyModel->updateCompagnyByAvatar($id, 'avatar_img' . $id);
            $avatar->move('./pages/images', 'avatar_img' . $id);

            // $avatar->move('./pages/images', 'avatar_img'.$id. '.'. $avatar->getExtension()); // pour afficher l'extension dans le fichier enregitré, voir pour l'afficher dans la vue.
            echo $avatar->getName();
            return redirect()->to('/pro/profile/' . $id)->with('success', 'votre photo de profil a bien etait mis à jour');
        }

        return redirect()->to('/pro/profile/' . $id)->with('errors2', 'veuillez telecharger un fichier au format image (jpeg/jpg/png/gif)');


        //print_r($this->request->getFiles());


        // if ($compagnyModel->validAvatar($avatar->getMimeType())){
        //   session()->setFlashdata("errors2", "veuillez telecharger un fichier au format image");
        // return redirect()->back()->withInput();

        //  $avatar->move('source/feedbackapp/pages/images/', $avatar->getCompagnyById);
        // $file = $avatar->move('source/feedbackapp/pages/images/', $avatar->getCompagnyById);
        // if($avatar->hasMoved()){
        //     $img=$avatar->getName();
        // }else{
        //     session()->setFlashdata("errors2", "echec lors du téléchargement de l'image");
        //     return redirect()->back()->withInput();
        // } 
        //  echo "votre photo de profil a bien etait mis à jour";



        //return redirect()->back();
        //return redirect()->to(base_url(/pro/messages/new/update?status=to-treat));
    }





    public function updateProfile($id)
    {
        $messageModel = model(MessageModel::class);
        $compagnyModel = model(CompagnyModel::class);
        // Update status
        // $db = \Config\Database::connect();
        //  $query   = $db->query('SELECT id, compagny_name, address, city, postal_code, snapchat, instagram, facebook, twitter, web, email FROM compagnys');
        //  $results = $query->getResult();
        //  $builder = $db->table('compagnys');
        // $filter = $this->request->getVar('filter');
        $compagnys = $compagnyModel->updateCompagnyById();
        // $model = model(CompagnyModel::class);


        //   $id = $this->request->getVar('id');
        $compagny_name = $this->request->getVar('compagny_name');
        $avatar = $this->request->getVar('avatar');
        $address = $this->request->getVar('address');
        $postal_code = $this->request->getVar('postal_code');
        $city = $this->request->getVar('city');
        $snapchat = $this->request->getVar('snapchat');
        $instagram = $this->request->getVar('instagram');
        $facebook = $this->request->getVar('facebook');
        $twitter = $this->request->getVar('twitter');
        $email = $this->request->getVar('email');
        $web = $this->request->getVar('web');





        if ($this->request->getMethod() === 'post' && $this->validate([

            //  'avatar' => 'uploaded[avatar]|max_size[avatar,1024]|',
            'compagny_name' => 'required',
            'address' => 'required|min_length[3]|max_length[150]',
            'postal_code' => 'required|min_length[3]|max_length[5]',
            'city' => 'required|min_length[3]|max_length[25]',
            'email ' => 'min_length[3]|max_length[50]|valid_email',
            'city' => 'min_length[3]|max_length[55]',

        ])) {
            $compagny_name = $this->request->getPost('compagny_name');
            $avatar = $this->request->getFile('avatar');
            $address = $this->request->getPost('address');
            $postal_code = $this->request->getPost('postal_code');
            $city = $this->request->getPost('city');
            $snapchat = $this->request->getPost('snapchat');
            $instagram = $this->request->getPost('instagram');
            $facebook = $this->request->getPost('facebook');
            $twitter = $this->request->getPost('twitter');
            $email = $this->request->getPost('email');
            $web = $this->request->getPost('web');

            $compagnys = $compagnyModel->updateCompagnyById(
                $id,
                $compagny_name,
                $avatar,
                $address,
                $postal_code,
                $city,
                $snapchat,
                $instagram,
                $facebook,
                $twitter,
                $email,
                $web
            );
        }

        // print_r($this->request->getPost());
        // print_r($this->request->getFiles());

        return null;
        echo "votre profil a bien etait mis à jour";



        //return redirect()->back();
        //return redirect()->to(base_url(/pro/messages/new/update?status=to-treat));
        return redirect()->to('/pro/profile/' . $id)->with('success', 'votre profil a bien etait mis à jour');
    }


    public function updatePassword($id)
    {

        $messageModel = model(MessageModel::class);
        $compagnyModel = model(CompagnyModel::class);
        // Update status
        // $db = \Config\Database::connect();
        //  $query   = $db->query('SELECT id, compagny_name, address, city, postal_code, snapchat, instagram, facebook, twitter, web, email FROM compagnys');
        //  $results = $query->getResult();
        //  $builder = $db->table('compagnys');
        // $filter = $this->request->getVar('filter');
        $compagnys = $compagnyModel->updateCompagnyById();
        // $model = model(CompagnyModel::class);


        //   $id = $this->request->getVar('id');
        $password = $this->request->getVar('password');
        $newPassword = $this->request->getVar('newPassword');
        $passwordConfirm = $this->request->getVar('passwordConfirm');




        if ($this->request->getMethod() === 'post' && $this->validate([
            'password' => 'required',
            'newPassword' => 'required',
            'passwordConfirm' => 'required|matches[newPassword]'


        ])) {
            $password = $this->request->getPost('password');
            $newPassword = $this->request->getPost('newPassword');
            $passwordConfirm = $this->request->getPost('passwordConfirm');


            $compagnys = $compagnyModel->updateCompagnyById(
                $id,

                $password

            );
        }
        // echo $password. "<br>";
        // echo $newPassword. "<br>";
        // echo $passwordConfirm;
        // return null;
        echo "votre mot de passe a bien etait mis à jour";



        //return redirect()->back();
        //return redirect()->to(base_url(/pro/messages/new/update?status=to-treat));
        return redirect()->to('/pro/profile/' . $id)->with('success', 'votre mot de passe a bien etait mis à jour');
    }


    // UPDATE messages SET  status = "archived"	 WHERE id = 2; Ici on modifie le status qui est initialement "new" par le status "archived" pour le mesage qui porte l'id 2.
    public function updateMessageStatus($status)
    {

        $messageModel = model(MessageModel::class);
        $compagnyModel = model(CompagnyModel::class);
        $db      = \Config\Database::connect();
        $builder = $db->table('messages');
        $data = [
            [
                'status' => 'new',
            ],
            [
                'status' => 'archived',
            ],
        ];

        $builder->updateBatch($data, 'status');


        $archivedMessages = $messageModel->updateMessageStatus('archived');
    }


    public function updateStatus($status)
    {
        $messageModel = model(MessageModel::class);
        $compagnyModel = model(CompagnyModel::class);
        $id = 3;

        $status->save([
            'status' => $this->request->getPost('status'),
        ]);

        $updateStatusArchived = $messageModel->updateStatusById('archived', $id);
        $updateStatusToTreat = $messageModel->updateStatusById('to-treat', $id);

        $data['updateStatusArchived;'] = $updateStatusArchived;
        $data['updateStatusToTreat;'] = $updateStatusToTreat;
        return ($data);
    }


    public function  update($id)
    {
        $messageModel = model(MessageModel::class);
        $compagnyModel = model(CompagnyModel::class);
        // Update status
        $db = \Config\Database::connect();
        $query   = $db->query('SELECT name, status FROM messages');
        $results = $query->getResult();
        $builder = $db->table('messages');
        $filter = $this->request->getVar('filter');


        //  $id = 3;


        $status = $this->request->getVar('status');
        $messages = $messageModel->updateStatusById($status);
        if ($status == 'archived') {
            $messages = $messageModel->updateStatusById('archived', $id);
        } elseif ($status == 'to-treat') {
            $messages = $messageModel->updateStatusById('to-treat', $id);
        } else {
            $messages = $messageModel->updateStatusById($id);
        }

        echo "votre message a bien etait deplacé";


        //return redirect()->back();
        //return redirect()->to(base_url(/pro/messages/new/update?status=to-treat));
        return redirect()->to('/pro/messages/new?filter=' . $filter);
        // return view('dashboard/dashboard_new_messages_page', $data); 
        // fonction pour rediriger vers une page avec l'url
    }

    public function loginCompagny()
    {
        $model = model(CompagnyModel::class);

        echo "ici";
        echo $this->request->getVar('compagny_name') . "<br>";
        echo $this->request->getVar('password');



        $result = $model->where('compagny_name', $this->request->getVar('compagny_name'))->where('password', $this->request->getVar('password'))->first();
        // $session = \Config\Services::session($config);
        $session = session();
        if ($result) {
            $session->set('compagny', $result['compagny_name']);
            echo "success connexion";

            return redirect()->to('/pro/profile/' . $result['id'])->with('success2', 'bienvenue sur votre profile ' . $result['compagny_name']);
        } else {
            echo "probléme";
            return redirect()->to('/pro')->with('errors2', 'veuillez verifier votre mot de passe et/ou votre login');
            //return view('pro_index_page');
        }
        echo "ici2";
    }

    public function createCompagny()
    {
        $model = model(CompagnyModel::class);
        // $compagnyModel = model(CompagnyModel::class);
        $result = $model->where('compagny_name', $this->request->getVar('compagny_name'))->where('password', $this->request->getVar('password'))->first();
        echo "ici1";

        echo $this->request->getPost('compagny_name') . "<br>";
        "<br>";
        echo $this->request->getPost('address') . "<br>";
        "<br>";
        echo  $this->request->getPost('postal_code') . "<br>";
        "<br>";
        echo  $this->request->getPost('city') . "<br>";
        "<br>";
        echo $this->request->getPost('email') . "<br>";
        "<br>";
        echo  $this->request->getPost('password') . "<br>";
        "<br>";
        echo  $this->request->getPost('passconf') . "<br>";
        echo $this->request->getPost('id');






        if ($this->request->getMethod() === 'post' && $this->validate([
            'compagny_name' => 'required',
            'address' => 'required|min_length[3]|max_length[150]',
            'postal_code' => 'required|min_length[3]|max_length[5]|regex_match[/\d{2}[ ]?\d{3}/]',
            'city' => 'required|min_length[3]|max_length[25]',
            'email ' => 'min_length[3]|max_length[50]|valid_email|is_unique[compagnys.email, email, $email]',
            'password' => 'required|min_length[2]',
            'passconf' => 'required|matches[password]',



        ])) {

            $model->save([

                'compagny_name' => $this->request->getPost('compagny_name'),
                'address' => $this->request->getPost('address'),
                'postal_code' => $this->request->getPost('postal_code'),
                'city' => $this->request->getPost('city'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),

            ]);
           // echo $result['id'];


            // var_dump($result);



            session()->setFlashdata('success', 'Votre compte a bien etait crée' . "<br>" . 'Bienvenue sur votre profile'); //fonction qui prends  une clé et une valeur
            // Il faudra gerer l'id lors de la connexion pour renvoyer sur le bon profil
            return redirect()->to('/pro/profile/' . $result['id']); //. $id

        } else {
          
            //  return redirect()->to('/search/' . $id);
            //  (session()->getFlashdata('errors', 'Veuillez verifier les inforamtions saisies'));
            //  echo "probléme";
            return redirect()->back()->with('errors', 'Probléme lors de la création de votre compte: merci de verifier votre nom et/ou le format de votre adresse mail' . "<br>" . "Le nom doit contenir au moins 2 caractéres, l'email doit être valide, le mot de passe doit être identique");
            //echo "Probléme sur votre message";
        }
    }




















    public function test()
    {
        $messageModel = model(MessageModel::class);
        $compagnyModel = model(CompagnyModel::class);
        echo "page test";
        // On affiche tous les status de la table messages requete en version objet
        $db = \Config\Database::connect();
        $query   = $db->query('SELECT name, status FROM messages');
        $results = $query->getResult();
        $builder = $db->table('messages');

        $id = 3;
        $idCompagny = 1;
        $nameCompagny = $compagnyModel->getCompagnyById($idCompagny)["compagny_name"];
        $nbNewMessages = $messageModel->countMessageByStatusAndIdCompagny('new', $idCompagny);
        $nbToTreatMessages = $messageModel->countMessageByStatusAndIdCompagny('to-treat', $idCompagny);
        $nbArchivedMessages = $messageModel->countMessageByStatusAndIdCompagny('archived', $idCompagny);
        $nbAllMessages = $messageModel->countMessagesByIdCompagny($idCompagny);
        $nbSatisfiedMessages = $messageModel->countMessageBySatisfactionAndIdCompagny(1, $idCompagny);
        $nbUnsatisfiedMessages = $messageModel->countMessageBySatisfactionAndIdCompagny(0, $idCompagny);

        foreach ($results as $row) {
            echo $row->status . "<br>";
        }

        echo 'Total Results: ' . count($results) . "<br>";

        $filter2 = $this->request->getVar('filter2');
        $messages = $messageModel->updateStatusById($filter2);
        if ($filter2 == 'archived') {
            $messages = $messageModel->updateStatusById('archived', $id);
        } elseif ($filter2 == 'to-treat') {
            $messages = $messageModel->updateStatusById('to-treat', $id);
        } else {
            $messages = $messageModel->updateStatusById($id);
        }


        // Paramère filter dans l'url
        $filter = $this->request->getVar('filter');


        $idCompagny = 1;
        if ($filter == 'satisfied') {
            $messages = $messageModel->getMessageBySatisfactionAndStatusAndIdCompagny(1, 'new', $idCompagny);
        } elseif ($filter == 'unsatisfied') {
            $messages = $messageModel->getMessageBySatisfactionAndStatusAndIdCompagny(0, 'new', $idCompagny);
        } else {
            $messages = $messageModel->getMessageByStatusAndIdCompagny('new', $idCompagny);
        }

        for ($i = 0; $i < sizeof($messages); $i++) {
            $idCompagny = $messages[$i]["id_compagny"];
            $compagnys = $compagnyModel->getCompagnyById($idCompagny);
            $messages[$i]["compagny_name"] = $compagnys["compagny_name"];
        }
        $data['messages'] = $messages;



        $data['nbSatisfiedMessages'] = $nbSatisfiedMessages;
        $data['nbUnsatisfiedMessages'] = $nbUnsatisfiedMessages;
        $data['nbNewMessages'] = $nbNewMessages;
        $data['nbToTreatMessages'] = $nbToTreatMessages;
        $data['nbArchivedMessages'] = $nbArchivedMessages;
        $data['nbAllMessages'] = $nbAllMessages;
        $data['nameCompagny'] = $nameCompagny;

        // On affiche tous les compagny_name de la table compagny requete en version tableau

        // $query   = $db->query('SELECT compagny_name FROM compagny');
        // $results = $query->getResultArray();

        // foreach ($results as $row) {
        //     echo $row['compagny_name'] . "<br>";
        // }
        // on retourne la vue avec les resultats

        // On insert des nouvelles données 
        //   $data = [
        //     'id' => '',
        //     'status' => 'new',
        //     'satisfaction'  => '1',
        //     'comeback'  => '1',
        //     'remark'  => 'Trop bon la folie',
        //     'name'  => 'My Name',
        //     'email'  => 'azerty@gmail.com',
        //     'id_compagny'  => '1',


        // ];

        //  $builder->insert($data);


        // On remplace des données, les données non rensigné sont retourné NULL (si le status es inexistant alors il est retourné vide)
        // $data = [
        //     'id' => '36',
        //     'status' => 'archived',
        //     'satisfaction'  => '1',
        //     'comeback'  => '1',
        //     'remark'  => 'Trop bon la folie',
        //     'name'  => 'My Name',
        //     'email'  => 'azerty@gmail.com',
        //     'id_compagny'  => '1',
        // ];
        // $builder->replace($data);


        // On remplace l'ancien status par to-treat
        $data = [
            'status' => 'archived',

        ];

        $builder->where('id', 37);
        $builder->update($data);


        $data['messages'] = $messages;
        // class Myclass
        // {
        //     public $title   = 'My Title';
        //     public $content = 'My Content';
        //     public $date    = 'My Date';
        // }

        // $object = new Myclass;
        // $builder->where('id', $id);
        // $builder->update($object); 

        return view('test', $data); //$results, $data);




        $compagnys = $compagnyModel->updateCompagnyById([

            'avatar' => $this->request->getPost('avatar'),
            'compagny_name' => $this->request->getPost('compagny_name'),
            'address' => $this->request->getPost('address'),
            'postal_code' => $this->request->getPost('postal_code'),
            'city' => $this->request->getPost('city'),
            'email' => $this->request->getPost('email'),
            'snapchat' => $this->request->getPost('snapchat'),
            'instagram' => $this->request->getPost('instagram'),
            'facebook' => $this->request->getPost('facebook'),
            'twitter' => $this->request->getPost('twitter'),
            'web' => $this->request->getPost('web'),


        ]);
    }
}







//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< CONTROLEUR HOME





namespace App\Controllers;

use App\Models\MessageModel;
use CodeIgniter\Debug\Toolbar\Collectors\Views;

class Home extends BaseController
{
    public function index()
    {

        return view('client_index_page');
    }


    public function searchName()
    {
        $compagnyModel = model(CompagnyModel::class);


        $searchName = $this->request->getPost('searchName');
        $searchName2 = $this->request->getPost('searchName');
if ( $compagny = $compagnyModel->getCompagnyByName($searchName))
{
    return redirect()->to('/search/' . $compagny['id']);}
    elseif($compagny = $compagnyModel->getCompagnysByName($searchName) && $compagny = $compagnyModel->getCompagnysByName($searchName2))
    { return redirect()->to(base_url('search/list'));}    
return redirect()->to(base_url('/'))->with('errors', 'Verifier l\'aurtographe ou Le nom saisi ne correspond à aucune compagnie partenaire' . "<br>");}





public function searchNameOK() // modifier la fonction pour la prise en charge de plusieurs compagnys qui ont le même nom
{
    $compagnyModel = model(CompagnyModel::class);


    $searchName = $this->request->getPost('searchName');
    $searchName2 = $this->request->getPost('searchName');
if ($compagny = $compagnyModel->getCompagnysByName($searchName) &&  $searchName == $searchName2)

{echo $searchName;
    echo $searchName2;
    
   return null;
    return redirect()->to('/search/' . $compagny['id']);}
elseif ( $compagny = $compagnyModel->getCompagnyByName($searchName))
{ return redirect()->to(base_url('search/list'));}    


return redirect()->to(base_url('/'))->with('errors', 'Verifier l\'aurtographe ou Le nom saisi ne correspond à aucune compagnie partenaire' . "<br>");}










public function list()
{ echo "ici";
  
    $messageModel = model(MessageModel::class);
    $compagnyModel = model(CompagnyModel::class);
    $compagnys = $compagnyModel->getCompagnysByName('macdo');
   // $compagnys = $compagnyModel->getCompagnyById(4);

   var_dump($compagnys) . "<br>";
   
  // esc($compagnys['address']);
  // echo $compagnys['address'];
   


    $data["compagnys"] = $compagnys;

    return view('compagnys_list_page', $data);
}





    public function search($id)
    {
        $messageModel = model(MessageModel::class);
        $compagnyModel = model(CompagnyModel::class);
      
        $compagnys = $compagnyModel->getCompagnyById($id);
      
      
        $data["compagnys"] = $compagnys;
     
        return view('redaction_message_page', $data);
    }

    // public function searchCompagnyById (){
    //     search($id['compagny_name']);
    // }

    public function createMessage($id)
    {
        $model = model(MessageModel::class);

        if ($this->request->getMethod() === 'post' && $this->validate([
            // 'satisfaction' => 'required',
            // 'comeback' => 'required',
            'remark' => 'required|min_length[3]|max_length[255]',
            'name ' => 'min_length[3]|max_length[20]',
            'email ' => 'min_length[3]|max_length[50]|valid_email',
        ])) {


            // echo $this->request->getPost('id_compagny') . "<br>";
            // "<br>";
            // echo $this->request->getPost('satisfaction') . "<br>";
            // "<br>";
            // echo  $this->request->getPost('comeback') . "<br>";
            // "<br>";
            // echo  $this->request->getPost('remark') . "<br>";
            // "<br>";
            // echo $this->request->getPost('name') . "<br>";
            // "<br>";
            // echo  $this->request->getPost('email') . "<br>";

            $model->save([
                'id_compagny' => $id,
                'satisfaction' => $this->request->getPost('satisfaction'),
                'comeback' => $this->request->getPost('comeback'),
                'remark' => $this->request->getPost('remark'),
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),

            ]);

            session()->setFlashdata('success', 'Votre message a bien etait envoyé'); //fonction qui prends  une clé et une valeur
            return redirect()->to('/search/' . $id);
        } else {
            //  Revoir pour la gestion des messages incorrects. Methode pas optimal
            //  return redirect()->to('/search/' . $id);
            return redirect()->back()->with('errors', 'Probléme sur votre message: merci de verifier votre nom et/ou le format de votre adresse mail' . "<br>" . "Le nom doit contenir au moins 3 caractéres et l'email doit être valide, une remarque est obligatoire");
           
        }
    }




    public function createeeeMessage()
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





//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< LES ROUTES 

$routes->get('test', 'Pro::test');
$routes->get('/', 'Home::index');
$routes->match(['get', 'post'], '/message/submit/(:num)', 'Home::createMessage/$1');
$routes->match(['get','post'], '/compagny/submit', 'Pro::createCompagny');
$routes->match(['get','post'], '/compagny/login', 'Pro::loginCompagny');

//$routes->match(['get', 'post'], '/formulaire_test', 'Home::create');

$routes->get('/search/(:num)', 'Home::search/$1');
$routes->post('/search', 'Home::searchName');
$routes->get('/search/list', 'Home::list');
//$routes->match(['get', 'post'],'/search/(:alphanum)' ,'Home::search/$1');

$routes->get('/pro', 'Pro::index');
$routes->get('/pro/dashboard', 'Pro::dashboard');
$routes->get('/pro/messages/new', 'Pro::new_messages');
$routes->get('/pro/messages/treat', 'Pro::to_treat_messages');
$routes->get('/pro/messages/archived', 'Pro::archived_messages');
$routes->get('/pro/messages/all', 'Pro::all_messages');
$routes->get('/pro/messages/new/update/(:alphanum)', 'Pro::update/$1');
$routes->get('/pro/messages/treat/update/(:alphanum)', 'Pro::update/$1');
$routes->get('/pro/messages/archived/update/(:alphanum)', 'Pro::update/$1');
$routes->get('/pro/messages/all/update/(:alphanum)', 'Pro::update/$1');


$routes->get('/pro/profile/(:num)', 'Pro::profile/$1');
$routes->post('/pro/profile/update/(:num)', 'Pro::updateProfile/$1');
$routes->post('/pro/profile/updateAvatar/(:num)', 'Pro::updateProfileAvatar/$1');

$routes->post('/pro/profile/updatePassword/(:num)', 'Pro::updatePassword/$1');