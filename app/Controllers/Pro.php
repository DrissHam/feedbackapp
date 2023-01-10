<?php

namespace App\Controllers;

use App\Models\MessageModel;
use App\Models\CompagnyModel;
//use CodeIgniter\Entity\Cast\IntegerCast;


class Pro extends BaseController
{
    public function index()
    {
        return view('pro_index_page');
    }

    public function dashboard()
    {
        $session = session();
        $idCompagny = $session->get('userId');

        if (isset($idCompagny)) {
            $messageModel = model(MessageModel::class);
            $compagnyModel = model(CompagnyModel::class);


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
        } else {
            return redirect()->to('/pro')->with('errors2', 'Vous devez etre connecté pour acceder à cette page');
        }
    }

    public function afficherTouslesmessages()
    {
        echo "RUN" . "<br>";
        $messageModel = model(MessageModel::class);
        $compagnyModel = model(CompagnyModel::class);

        $messages = $messageModel->getAllMessages();
        $data['messages'] = $messages;

        var_dump($messages);
        return view('dashboard/touslesmessages_page', $data);
    }

    public function compterTouslesMessages()
    {
        $messageModel = model(MessageModel::class);
        $compagnyModel = model(CompagnyModel::class);
        $countMessages = $messageModel->countAllMessages();
        $data['countMessages'] = $countMessages;
        echo "ici";
        echo $countMessages;
        return view('dashboard/touslesmessages_page', $data);
    }
    public function afficherToutesLesCompagnys()
    {
        $compagnyModel = model(CompagnyModel::class);
        // echo "run";
        $compagnys = $compagnyModel->getAllCompagnys();
        //  var_dump($compagnys);
        //  echo $compagnys;
        $data['compagnys'] = $compagnys;
        return view('/dashboard/touteslescompagnys_page', $data);
    }

    public function new_messages()
    {
        $session = session();
        $idCompagny = $session->get('userId');

        if (isset($idCompagny)) {
            $messageModel = model(MessageModel::class);
            $compagnyModel = model(CompagnyModel::class);
            // Paramère filter dans l'url



            $filter = $this->request->getVar('filter');
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
        } else {
            return redirect()->to('/pro')->with('errors2', 'Vous devez etre connecté pour acceder à cette page');
        }
    }



    public function to_treat_messages()
    {

        $session = session();
        $idCompagny = $session->get('userId');

        if (isset($idCompagny)) {
            $messageModel = model(MessageModel::class);
            $compagnyModel = model(CompagnyModel::class);

            // Paramère filter dans l'url
            $filter = $this->request->getVar('filter');
            $messages = $messageModel->getMessageBySatisfaction($filter);

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
        } else {
            return redirect()->to('/pro')->with('errors2', 'Vous devez etre connecté pour acceder à cette page');
        }
    }


    public function archived_messages()
    {

        $session = session();
        $idCompagny = $session->get('userId');

        if (isset($idCompagny)) {
            $messageModel = model(MessageModel::class);
            $compagnyModel = model(CompagnyModel::class);


            $filter = $this->request->getVar('filter');
            $messages = $messageModel->getMessageBySatisfaction($filter);

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
        } else {
            return redirect()->to('/pro')->with('errors2', 'Vous devez etre connecté pour acceder à cette page');
        }
    }

    public function all_messages()
    {
        $session = session();
        $idCompagny = $session->get('userId');

        if (isset($idCompagny)) {
            $messageModel = model(MessageModel::class);
            $compagnyModel = model(CompagnyModel::class);
            // Paramère filter dans l'url

            $filter = $this->request->getVar('filter');
            $messages = $messageModel->getMessageBySatisfaction($filter);

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
        } else {
            return redirect()->to('/pro')->with('errors2', 'Vous devez etre connecté pour acceder à cette page');
        }
    }


    public function profile()
    {
        $session = session();
        $idCompagny = $session->get('userId');

        if (isset($idCompagny)) {
            $messageModel = model(MessageModel::class);
            $compagnyModel = model(CompagnyModel::class);


            // Recuperer le nom de la compagnie:
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
        } else {
            return redirect()->to('/pro')->with('errors2', 'Vous devez etre connecté pour acceder à cette page');
        }
    }


    public function updateProfileAvatar()
    {

        $session = session();
        $id = $session->get('userId');

        if (isset($id)) {
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
        } else {
            return redirect()->to('/pro')->with('errors2', 'Vous devez etre connecté pour acceder à cette page');
        }
    }



    public function updateProfile()
    {
        $session = session();
        $id = $session->get('userId');

        if (isset($id)) {
            $messageModel = model(MessageModel::class);
            $compagnyModel = model(CompagnyModel::class);
           
            $compagnys = $compagnyModel->updateCompagnyById();
        
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

            echo "votre profil a bien etait mis à jour";

            //return redirect()->back();
            //return redirect()->to(base_url(/pro/messages/new/update?status=to-treat));
            return redirect()->to('/pro/profile/' . $id)->with('success', 'votre profil a bien etait mis à jour');
        } else {
            return redirect()->to('/pro')->with('errors2', 'Vous devez etre connecté pour acceder à cette page');
        }
    }


    public function updatePassword()
    {

        $session = session();
        $id = $session->get('userId');

        if (isset($id)) {
            $compagnyModel = model(CompagnyModel::class);
            // Update status
            // $db = \Config\Database::connect();
            //  $query   = $db->query('SELECT id, compagny_name, address, city, postal_code, snapchat, instagram, facebook, twitter, web, email FROM compagnys');
            //  $results = $query->getResult();
            //  $builder = $db->table('compagnys');
            // $filter = $this->request->getVar('filter');

            // $model = model(CompagnyModel::class);


            //   $id = $this->request->getVar('id');





            if ($this->request->getMethod() === 'post' && $this->validate([
                'currentPassword' => 'required',
                'newPassword' => 'required',
                'newPasswordConfirm' => 'required|matches[newPassword]'


            ])) {
                $currentPassword = $this->request->getVar('currentPassword');
                $newPassword = $this->request->getVar('newPassword');
                $newPasswordConfirm = $this->request->getVar('newPasswordConfirm');
                //echo $currentPassword . "<br>";
                //echo $newPassword . "<br>";
                //echo $newPasswordConfirm;

                //1- vérifier qu'il a mise le bon mot de passe
                $compagny =  $compagnyModel->getCompagnyById($id);

                if (password_verify($currentPassword, $compagny['password'])) {
                    //2- Mettre à jour le mot depasse
                    $compagnyModel->updateCompagnyPasswordById($id, $newPassword);
                    return redirect()->to('/pro/profile/')->with('success', 'votre mot de passe a bien etait mis à jour');
                } else {
                    return redirect()->back()->with('passwordError', "Erreur: Vous n'avez pas tapé le bon mot de passe!");
                }
            } else {
                return redirect()->back()->with('passwordError', "Erreur lors de la mise à jour de votre mot passe" . "<br>" . "Vérifier si vous avez bien tapez les bon mots de passe");
            }
        } else {
            return redirect()->to('/pro')->with('errors2', 'Vous devez etre connecté pour acceder à cette page');
        }
    }


    // UPDATE messages SET  status = "archived"	 WHERE id = 2; Ici on modifie le status qui est initialement "new" par le status "archived" pour le mesage qui porte l'id 2.


    public function  update($id)
    {
        $session = session();
        $idCompagny = $session->get('userId');

        if (isset($idCompagny)) {
            $messageModel = model(MessageModel::class);
            $compagnyModel = model(CompagnyModel::class);

            $filter = $this->request->getVar('filter');


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
        } else {
            return redirect()->to('/pro')->with('errors2', 'Vous devez etre connecté pour acceder à cette page');
        }
    }


    public function loginAdmin()
    {
        $model = model(CompagnyModel::class);
        if ($this->request->getMethod() === 'post' && $this->validate([

            'email ' => 'min_length[3]|max_length[50]|valid_email',
            'password' => 'required|min_length[2]',

        ])) {

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $compagny = $model->getCompagnyByEmail($email);

            $session = session();
            if (password_verify($password, $compagny['password']) && $compagny['role'] == 1) {
                $session->set('userId', $compagny['id']);
                echo "success connexion";

                return redirect()->to('/admin/all_compagnys')->with('success', 'bienvenue administrateur');
            }
        }
    }






    public function loginCompagny()
    {

        //TODO mettre un formulaire
        $model = model(CompagnyModel::class);



        if ($this->request->getMethod() === 'post' && $this->validate([

            'email ' => 'min_length[3]|max_length[50]|valid_email',
            'password' => 'required|min_length[2]',

        ])) {

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $compagny = $model->getCompagnyByEmail($email);


            // $session = \Config\Services::session($config);
            $session = session();
            if (password_verify($password, $compagny['password']) && $compagny['role'] == 1) {
                $session->set('userId', $compagny['id']);
                echo "success connexion";

                return redirect()->to('/admin/all_compagnys')->with('admin', 'bienvenue administrateur');
            } elseif (password_verify($password, $compagny['password'])) {
                $session->set('userId', $compagny['id']);
                echo "success connexion";

                return redirect()->to('/pro/profile/' . $compagny['id'])->with('success2', 'bienvenue sur votre profile ' . $compagny['compagny_name']);
            } else {
                echo "probléme";
                return redirect()->to('/pro')->with('errors2', 'veuillez verifier votre mot de passe et/ou votre login');
                //return view('pro_index_page');
            }
            echo "ici2";
        }
        return redirect()->to('/pro')->with('errors2', 'veuillez verifier votre mot de passe et/ou votre login');
    }

    public function logoutCompagny()
    {

        $session = session();
        $session->destroy();
        return redirect()->to('/pro');
    }
    public function createCompagny()
    {
        $model = model(CompagnyModel::class);
        // $result = $model->where('compagny_name', $this->request->getVar('compagny_name'))->where('password', $this->request->getVar('password'))->first();
        // echo "ici1";

        // echo $this->request->getPost('compagny_name') . "<br>";
        // "<br>";
        // echo $this->request->getPost('address') . "<br>";
        // "<br>";
        // echo  $this->request->getPost('postal_code') . "<br>";
        // "<br>";
        // echo  $this->request->getPost('city') . "<br>";
        // "<br>";
        // echo $this->request->getPost('email') . "<br>";
        // "<br>";
        // echo  $this->request->getPost('password') . "<br>";
        // "<br>";
        // echo  $this->request->getPost('passconf') . "<br>";
        // echo $this->request->getPost('id');

        if ($this->request->getMethod() === 'post' && $this->validate([
            'compagny_name' => 'required',
            'address' => 'required|min_length[3]|max_length[150]',
            'postal_code' => 'required|min_length[3]|max_length[5]|regex_match[/\d{2}[ ]?\d{3}/]',
            'city' => 'required|min_length[3]|max_length[25]',
            'email ' => 'min_length[3]|max_length[50]|valid_email|is_unique[compagnys.email, email, $email]',
            'password' => 'required|min_length[2]',
            'passconf' => 'required|matches[password]'
        ])) {

            $newCompanyid = $model->insert([
                'compagny_name' => $this->request->getPost('compagny_name'),
                'address' => $this->request->getPost('address'),
                'postal_code' => $this->request->getPost('postal_code'),
                'city' => $this->request->getPost('city'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
            ]);

            /*
                fonction qui prends  une clé et une valeur
                */
            session()->setFlashdata('success', 'Votre compte a bien etait crée'
                . "<br>"
                . 'Bienvenue sur votre profile');
            return redirect()->to('/pro/profile/' . $newCompanyid);
        } else {

            //  return redirect()->to('/search/' . $id);
            //  (session()->getFlashdata('errors', 'Veuillez verifier les inforamtions saisies'));
            //  echo "probléme";
            return redirect()->back()->with('errors', 'Probléme lors de la création de votre compte: merci de verifier votre nom et/ou le format de votre adresse mail' . "<br>" . "Le nom doit contenir au moins 2 caractéres, l'email doit être valide, le mot de passe doit être identique");
            //echo "Probléme sur votre message";
        }
    }


    // public function adminCompagnys()
    // {
    //     $session = session();
    //     $idCompagny = $session->get('userId');

    //     if (isset($idCompagny)) {
    //         $compagnyModel = model(CompagnyModel::class);
    //         // echo "run";
    //         $compagnys = $compagnyModel->getAllCompagnys();
    //         //  var_dump($compagnys);
    //         //  echo $compagnys;
    //         $data['compagnys'] = $compagnys;
    //         return view('/admin/all_compagnys', $data);
    //     } else {
    //         return redirect()->to('/pro')->with('errors2', 'Vous devez etre connecté pour acceder à cette page');
    //     }
    // }

    // public function adminMessages($id_compagny)
    // {
    //     $session = session();
    //     $idCompagny = $session->get('userId');

    //     if (isset($idCompagny)) {
    //         $compagnyModel = model(CompagnyModel::class);
    //         $messageModel = model(MessageModel::class);
    //         $id = $id_compagny;
    //         $compagnys = $compagnyModel->getCompagnyById($id);
    //         $messages = $messageModel->getMessageByIdCompagny($id_compagny);

    //         $data['compagnys'] = $compagnys;
    //         $data['messages'] = $messages;
    //         return view('/admin/all_messages', $data);
    //     } else {
    //         return redirect()->to('/pro')->with('errors2', 'Vous devez etre connecté pour acceder à cette page');
    //     }
    // }


    // public function adminDeleteCompagny($id)
    // {
    //     $compagnyModel = model(CompagnyModel::class);
    //     // echo "run";
    //     $compagnys = $compagnyModel->deleteCompagny($id);
    //     // var_dump($compagnys);
    //     //  echo $compagnys;
    //     $data['compagnys'] = $compagnys;
    //     return redirect()->back()->with('success', 'La compagnie a bien eta it supprimé ' . "<br>" . "Félicitation Bro!!! Un client en moins");
    // }















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
