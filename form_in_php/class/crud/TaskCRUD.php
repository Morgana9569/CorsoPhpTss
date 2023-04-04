<?php

namespace crud;

use Exception;
use models\Task;
use PDO;

class TaskCRUD
{

    public function create(Task $task)
    {
        $query = "INSERT INTO task ( name, due_date, done, id_user)
        -- //i parametri hanno sempre :davanti
                 VALUES (:name,:due_date,:done,:id_user)
                ";
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $stm = $conn->prepare($query);
        // ci aspettiamo una stringa quindi PARAM_STR o un intero PARAM_INT
        //bind = associa il valore al parametro
        $stm->bindValue(':name', $task->name, \PDO::PARAM_STR);
        $stm->bindValue(':due_date', $task->due_date, \PDO::PARAM_STR);
        $stm->bindValue(':done', $task->done, \PDO::PARAM_STR);
        $stm->bindValue(':id_user', $task->id_user, \PDO::PARAM_INT);
        // dopo aver associato i valori ai parametri possiamo eseguire la query
        $stm->execute();
        return $conn ->lastInsertId();
    }

    public function update($task)
    {
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $query = "UPDATE task SET name = :name, due_date = :due_date, 
        done = :done, id_user = :id_user WHERE task_id = :task_id;";

        $stm =  $conn->prepare($query);
        $stm->bindValue(':name', $task->name, \PDO::PARAM_STR);
        $stm->bindValue(':due_date', $task->due_date, \PDO::PARAM_STR);
        $stm->bindValue(':done', $task->done, \PDO::PARAM_STR);
        $stm->bindValue(':id_user', $task->id_user, \PDO::PARAM_INT);
        $stm->bindValue(':task_id', $task->task_id, \PDO::PARAM_INT);
        $stm->execute();

        return $stm->rowCount();
    }

    //leggo le informazioni su tutti gli utenti
    public function read(int $task_id = null): Task|array|bool
    {
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        if (!is_null($task_id)) {
            //variante del read passando user_id
            $query = "SELECT * FROM task WHERE task_id = :task_id;";
            $stm =  $conn->prepare($query);
            $stm->bindValue(':task_id', $task_id, PDO::PARAM_INT);
            //ATTENZIONE devo specificare fetch_class perchè altrimenti mi ripete
            //due volte le informazioni (di default è fetch both)
            //devo specificare il nome della classe: 'models\User'
            //oppure con User::class chiedo alla classe il nome per esteso 
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_CLASS, Task::class);

            if (count($result) == 1) {
                return $result[0];
            }
            if (count($result) > 1) {
                throw new \Exception("Chiave primaria duplicata", 1);
            }
            if (count($result) === 0) {
                return false;
            }
        } else {
            $query = "SELECT * FROM task;";
            $stm =  $conn->prepare($query);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_CLASS, Task::class);
            if (count($result) === 0) {
                return false;
            }
            return $result;
        }
        //return $result;
    }



    public function delete($task_id)
    {
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $query = "DELETE FROM task where task_id = :task_id";
        $stm =  $conn->prepare($query);
        $stm->bindValue(':task_id', $task_id, PDO::PARAM_INT);
        //non si fa fetchAll perchè non ho un risultato
        $stm->execute();
        //dato da restituire: mi dice cos'ho cancellato
        return $stm->rowCount();
    }
}
