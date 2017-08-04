<?php
/*
Class Name: TodoList
Members: $listId
         $listItem
The class definition is equivelent to the TodoList table in the Database
*/
class TodoList {
    private $listId, $listItem;

    // Constructor to initialize the members with default values
    public function __construct() {
        $this->listId = 0;
        $this->listItem = '';
    }

    // Getter and Setter methods
    public function getListId() {
        return $this->listId;
    }

    public function setListId($value) {
        $this->listId = $value;
    }

    public function getListItem() {
        return $this->listItem;
    }

    public function setListItem($value) {
        $this->listItem = $value;
    }
}
?>