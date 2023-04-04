<?php

use crud\TaskCRUD;
use models\Task;

include "../../config.php";
include "../autoload.php";

// echo $_SERVER['REQUEST_METHOD'];

$crud = new TaskCRUD;

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':

        $task_id = filter_input(INPUT_GET, 'task_id');
        if (!is_null($task_id)) {
            echo json_encode($crud->read($task_id));
        } else {
            $task = $crud->read();
            echo json_encode($task);
        }

        $id_user = filter_input(INPUT_GET, 'id_user');
        if (!is_null($task_id)) {
            echo json_encode($crud->read($task_id));
        }
        
        break;

    case 'DELETE':

        $task_id = filter_input(INPUT_GET, 'task_id');
        if (!is_null($task_id)) {
            $rows = $crud->delete($task_id);
            if ($rows == 1) {
                http_response_code(204);
            }

            if ($rows == 0) {

                http_response_code(404);

                $response = [
                    'errors' => [
                        [
                            'status' => 404,
                            'title' => "Task non trovato",
                            'details' => $task_id
                        ]
                    ]
                ];
            }
            echo json_encode($response);
        }
        break;

    case 'POST':

        $input = file_get_contents('php://input');
        $request = json_decode($input, true); // ottengo iun array associativo

        $task = Task::arrayToUser($request);
        $last_id = $crud->create($task);
        unset($task->task_id);
        $response = [
            "data" => $task,
            'status' => 202
        ];

        // $user = (array) $user;
        // unset ($user ['password']);

        // $user['id_user'] = $last_id;
        // $response = [
        //     "data" => $user,
        //     'status' => 202
        // ];

        echo json_encode($response);

        break;

    case 'PUT':
        $input = file_get_contents('php://input');
        $request = json_decode($input, true); // ottengo un array associativo
        $task = Task::arrayToUser($request);
        $task_id = filter_input(INPUT_GET, 'task_id');
        if (!is_null($task_id)) {

            $row = $crud->update($task);

            if ($row == 1 ) {

                http_response_code(202);

                $response = [
                    "data" => $task,
                    'status' => 202
                ];
                echo json_encode($response);
            } else if ($row == 0) {

                http_response_code(404);

                $response = [
                    'errors' => [
                        [
                            'status' => 404,
                            'title' => "Task non trovata o già presente",
                            'details' => $task_id
                        ]
                    ]
                ];

                echo json_encode($response);
            }
        }
        break;
}
