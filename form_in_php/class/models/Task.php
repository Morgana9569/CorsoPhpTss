<?php

namespace models;

class Task
{

    public $name;
    public $due_date;
    public $done;
    public $id_user;
    public $task_id;

    //rappresenta nome e cognome dell'utente di seguito
    public function label()
    {
        return $this->name . " " . $this->name;
    }

    public static function arrayToUser($class_array):Task
    {
        $task = new Task;
        foreach ($class_array as $class_attribute => $value_of_class_attribute) {
            $task->$class_attribute = $value_of_class_attribute;
        }
        return $task;
    }
}