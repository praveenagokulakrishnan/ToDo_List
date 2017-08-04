<?php
/*
Class Name: TodoItem
Members: $itemId
         $itemValue
         $listId
         $isCompleted
The class definition is equivelent to the TodoItem table in the Database
*/
class TodoItem {
    private $itemId, $itemValue, $listId, $isCompleted;

    // Constructor to initialize the members with default values
    public function __construct() {
        $this->itemId = 0;
        $this->itemValue = '';
        $this->listId = 0;
        $this->isCompleted = false;
    }

    // Getter and Setter methods
    public function getItemId() {
        return $this->itemId;
    }
    
    public function setItemId($value) {
        $this->itemId = $value;
    }

    public function getItemValue() {
        return $this->itemValue;
    }
    
    public function setItemValue($value) {
        $this->itemValue = $value;
    }

    public function getListId() {
        return $this->listId;
    }
    
    public function setListId($value) {
        $this->listId = $value;
    }

    public function getIsCompleted() {
        return $this->isCompleted;
    }
    
    public function setIsCompleted($value) {
        $this->isCompleted = $value;
    }
}
?>