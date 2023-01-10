<?php

namespace App\Controllers;

use App\Models\MessageModel;
use CodeIgniter\Debug\Toolbar\Collectors\Views;

class Home extends BaseController
{


    
    public function index()
    {
        return view('client_index_page');
    }







public function search($id)
{
    $messageModel = model(MessageModel::class);
    $compagnyModel = model(CompagnyModel::class);
  
    $compagnys = $compagnyModel->getCompagnyById($id);
  
  
    $data["compagnys"] = $compagnys;
 
    return view('redaction_message_page', $data);
}


    public function searchName()
    {
        echo 'ICI ICI ICI';
        return null;
        $compagnyModel = model(CompagnyModel::class);
     //   $compagny = $compagnyModel->getCompagnysByName($searchName)
        $searchName = $this->request->getPost('searchName');
     //   $searchName2 = $this->request->getPost('searchName');

        $compagnys = $compagnyModel->getCompagnysByName($searchName);
        $data["compagnys"] = $compagnys;

// si resultat retourné superieur à 1 compagnie :
        if (count($compagnys)>1)
        {
          
            return view('compagnys_list_page2', $data);
        }  
        elseif (count($compagnys) == 1)
        {   
    
        return redirect()->to('/search/' . $compagnys[0]['id']);}

        return redirect()->to(base_url('/'))->with('errors', 'Verifier l\'aurtographe ou Le nom saisi ne correspond à aucune compagnie partenaire' . "<br>");
    }





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
{ 
   
  //  return redirect()->to(base_url('search/list'))->withInput('searchName');
}    


return redirect()->to(base_url('/'))->with('errors', 'Verifier l\'aurtographe ou Le nom saisi ne correspond à aucune compagnie partenaire' . "<br>");}





public function list()
{ echo "ici";
    $searchName = $this->request->getPost('searchName');

    $messageModel = model(MessageModel::class);
    $compagnyModel = model(CompagnyModel::class);
    $compagnys = $compagnyModel->getCompagnysByName($searchName);
   // $compagnys = $compagnyModel->getCompagnyById(4);

   var_dump($compagnys) . "<br>";
   
  // esc($compagnys['address']);
  // echo $compagnys['address'];
   


    $data["compagnys"] = $compagnys;

    return view('compagnys_list_page', $data);
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