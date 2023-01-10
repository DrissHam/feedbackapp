$data = [
    'title' => $title,
    'name'  => $name,
    'date'  => $date
];

$db->table('mytable')->insert($data);
// Produces: INSERT INTO mytable (title, name, date) VALUES ('{$title}', '{$name}', '{$date}')

>>>>>>>>>>>>>>>>>>>




$data = [
    'status' => $status["archived"]  
];

$db->table('messages')->update($data);
// Produces: UPDATE INTO messages (status) VALUES ('{$status}')






$data = [
   [
      'title' => 'My title' ,
      'name'  => 'My Name 2' ,
      'date'  => 'My date 2',
   ],
   [
      'title' => 'Another title' ,
      'name'  => 'Another Name 2' ,
      'date'  => 'Another date 2',
   ],
];



$data = [
   [
      'status' => 'new' ,
     
   ],
   [
      'status' => 'archived' ,
     
   ],
];

$builder->updateBatch($data, 'status');




$builder->updateBatch($data, 'title');

<?php
    $archiver = $bdd->exec('UPDATE messages SET  status = "archived"	 WHERE id = "?"');
    echo $archiver . ' entrées ont été archivées !';
?>




// public function test()
    //{
        // On affiche tous les status de la table messages requete en version objet
        // $db = \Config\Database::connect();
        // $query   = $db->query('SELECT name, status FROM messages');
        // $results = $query->getResult();
        // $builder = $db->table('messages');

        // foreach ($results as $row) {
        //     echo $row->status . "<br>";
        // }

        // echo 'Total Results: ' . count($results) . "<br>";


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
        // $data = [
        //     'status' => 'archived',
           
        // ];
        
        // $builder->where('id', 37);
        // $builder->update($data);
        
        // class Myclass
        // {
        //     public $title   = 'My Title';
        //     public $content = 'My Content';
        //     public $date    = 'My Date';
        // }
        
        // $object = new Myclass;
        // $builder->where('id', $id);
        // $builder->update($object); 

//         return view('test', $results, $data);
//     }
// }








>>>>>>>>>>>>>>>>>>>>>> 2 possibilités pour update les données <<<<<<<<<<<<<<<<<<<<<<<<<<<<<

public function updateStatusById($status = false, $id = false)
    {
        if ($status === false || $id === false) {
            return null;
        }
        $data = [
            
            'status' => $status,
        ];
        echo $status, $id;
    
        return $this->update($id, $data);
    }

                        OU


public function updateStatusById($status = false, $id = false)
    {
        if ($status === false || $id === false) {
            return null;
        }
        $data = [
            'id' => $id,
            'status' => $status,
        ];
        echo $status, $id;
    
        return $this->save($data);
    }




Bouton archiver traiter code non fonctionnel pour le cas sans filtre (tous les messages).
    </div>
                                                    <a href="#" class="rate-review approve" onmouseover="javascript:visibilite('id_div_1'); return false;" onmouseout="javascript:visibilite('id_div_1'); return false;"><i class="sl sl-icon-check"></i>Prendre en compte</a>
                                                    <div id="id_div_1" style="display:none;">Mettre en place une action pour prendre en compte la remarque du client</div>
                                                    <a href="<?php echo base_url() . "/pro/messages/new/update?status=to-treat&filter=".isset($_GET["filter"])?$_GET["filter"]:"" ?>" class="rate-review reject"><i class="sl sl-icon-clock"></i> Traiter plus tard</a>
                                                    <a href="#small-dialog" class="rate-review popup-with-zoom-anim"><i class="sl sl-icon-envelope-open"></i>Envoyer un Message</a>
                                                    <a href="<?php echo base_url() . "/pro/messages/new/update?status=archived&filter=".isset($_GET["filter"])?$_GET["filter"]:""  ?>" class="rate-review approve" value="archived"><i class="fa fa-archive"></i> Archiver</a>
                                                    <!-- <button onclick="clickMe()" class="rate-review approve" value="" style="border-radius= 50px; font-size= 13px;"><i class="fa fa-archive"></i> Archiver </button> -->


                                                </div>


                                                <form action="<?php if($session = session()){ echo base_url() . "/compagny/login". $idCompagny 
                                        ;} else {echo base_url() . "/compagny/login";} ; ?>" method="post" class="login">




,

[   // Errors
 'address' => [
     'required' => 'All accounts must have usernames provided',
     'min_length[3]' => 'L\'adresse doit au contenir au moins 3 caractéres',
 ],
'postal_code' => [
    'regex_match[/\d{2}[ ]?\d{3}/]' => 'le format doit etre un code postal ex: 13001'
],
'email' => [
    'valid_email' => 'l\'email doit etre valid et au bon format ex: feedback@gmail.fr',
    'is_unique' => 'il s\'emblerait que cet email soit déja utilisé',
],

 'password' => [
     'min_length' => 'Le mot de passe saisi doit contenir au moins 2 caractéres',
 ],

 'passconf' => [
     'matches' => 'le mot de passe de confiramtion doit correspondre au mot de passe saisi',
 ]
 ]

