<?php

use crud\UserCRUD;
use models\User;

include "../../config.php";
include "../autoload.php";

// echo $_SERVER['REQUEST_METHOD'];

$crud = new UserCRUD;

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        
        $id_user = filter_input(INPUT_GET,'id_user');
        if(!is_null($id_user)){
            echo json_encode($crud->read($id_user));
        }else{
            $users = $crud->read();
            echo json_encode($users);
        }
    break;

    case 'DELETE':

        $id_user = filter_input(INPUT_GET,'id_user');
        if(!is_null($id_user)){
            $rows = $crud->delete($id_user);
            if($rows == 1){
                http_response_code(204);
            }

            if($rows == 0 ){
            
                http_response_code(404);

                $response = [
                    'errors' => [
                        [
                            'status' => 404,
                            'title' => "Utente non trovato",
                            'details' => $id_user
                         ]
                    ]    
                ];
            }

           
            
            echo json_encode($response);
        }
        break;
    
    case 'POST' :

        $input = file_get_contents('php://input');
        $request = json_decode($input,true); // ottengo iun array associativo
        
        $user = User::arrayToUser($request);
        $crud->create($user);

        break;
        default:
        # code...
        break;
}