<?php

namespace crud;

use Exception;
use models\User;
use PDO;

class UserCRUD
{

    public function create(User $user)
    {
        $query = "INSERT INTO user ( first_name, last_name, birthday, birth_city, id_regione, id_provincia, gender, username, password)
        -- //i parametri hanno sempre :davanti
                 VALUES (:first_name,:last_name,:birthday,:birth_city,:id_regione,:id_provincia,:gender,:username,:password)
                ";
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $stm = $conn->prepare($query);
        // ci aspettiamo una stringa quindi PARAM_STR o un intero PARAM_INT
        //bind = associa il valore al parametro
        $stm->bindValue(':first_name', $user->first_name, \PDO::PARAM_STR);
        $stm->bindValue(':last_name', $user->last_name, \PDO::PARAM_STR);
        $stm->bindValue(':birthday', $user->birthday, \PDO::PARAM_STR);
        $stm->bindValue(':birth_city', $user->birth_city, \PDO::PARAM_STR);
        $stm->bindValue(':id_regione', $user->id_regione, \PDO::PARAM_INT);
        $stm->bindValue(':id_provincia', $user->id_provincia, \PDO::PARAM_INT);
        $stm->bindValue(':gender', $user->gender, \PDO::PARAM_STR);
        $stm->bindValue(':username', $user->username, \PDO::PARAM_STR);
        $stm->bindValue(':password', md5($user->password), \PDO::PARAM_STR);
        // dopo aver associato i valori ai parametri possiamo eseguire la query
        $stm->execute();
        return $conn ->lastInsertId();
    }

    public function update($user)
    {
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $query = "UPDATE user SET first_name = :first_name, last_name = :last_name, 
        birthday = :birthday, birth_city = :birth_city, id_regione = :id_regione, 
        id_provincia = :id_provincia, gender = :gender, username = :username, password = :password WHERE id_user = :id_user;";

        $stm =  $conn->prepare($query);
        $stm->bindValue(':first_name', $user->first_name, \PDO::PARAM_STR);
        $stm->bindValue(':last_name', $user->last_name, \PDO::PARAM_STR);
        $stm->bindValue(':birthday', $user->birthday, \PDO::PARAM_STR);
        $stm->bindValue(':birth_city', $user->birth_city, \PDO::PARAM_STR);
        $stm->bindValue(':id_regione', $user->id_regione, \PDO::PARAM_INT);
        $stm->bindValue(':id_provincia', $user->id_provincia, \PDO::PARAM_INT);
        $stm->bindValue(':gender', $user->gender, \PDO::PARAM_STR);
        $stm->bindValue(':username', $user->username, \PDO::PARAM_STR);
        $stm->bindValue(':password', md5($user->password), \PDO::PARAM_STR);
        $stm->bindValue(':id_user', $user->id_user, \PDO::PARAM_INT);
        $stm->execute();

        return $stm->rowCount();
    }

    //leggo le informazioni su tutti gli utenti
    public function read(int $id_user = null): User|array|bool
    {
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        if (!is_null($id_user)) {
            //variante del read passando user_id
            $query = "SELECT * FROM user WHERE id_user = :id_user;";
            $stm =  $conn->prepare($query);
            $stm->bindValue(':id_user', $id_user, PDO::PARAM_INT);
            //ATTENZIONE devo specificare fetch_class perchè altrimenti mi ripete
            //due volte le informazioni (di default è fetch both)
            //devo specificare il nome della classe: 'models\User'
            //oppure con User::class chiedo alla classe il nome per esteso 
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_CLASS, User::class);

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
            $query = "SELECT * FROM user;";
            $stm =  $conn->prepare($query);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_CLASS, User::class);
            if (count($result) === 0) {
                return false;
            }
            return $result;
        }
        //return $result;
    }



    public function delete($id_user)
    {
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $query = "DELETE FROM user where id_user = :id_user";
        $stm =  $conn->prepare($query);
        $stm->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        //non si fa fetchAll perchè non ho un risultato
        $stm->execute();
        //dato da restituire: mi dice cos'ho cancellato
        return $stm->rowCount();
    }
}
