<?php
/*
Class Name: TodoItemDB
The class is responsible for adding, fetching, updating, deleting the records from TodoItem table
*/
class TodoItemDB {
    
    // Method to fetch all the Todo Items from the corresponding DB tables.
    public function getTodoItems() {
        $db = Database::getDB();
        
        $query = 'SELECT * FROM ToDoItem';
        $result = $db->query($query);
        $todoItems = array();
        foreach ($result as $row) {
            $todoItem = new TodoItem();
            $todoItem->setItemId($row['ItemId']);
            $todoItem->setItemValue($row['Item']);
            $todoItem->setListId($row['ListId']);
            $todoItem->setIsCompleted($row['IsCompleted']);
            $todoItems[] = $todoItem;
        }        
        return $todoItems;
    }
    
    // Method to fetch all the Todo Items for a particular Todo List
    public function getTodoCategoryItems($list_id) {
        $db = Database::getDB();
        
        $query = "SELECT * FROM ToDoItem WHERE ListId = '$list_id'";
        $result = $db->query($query);
        $todoItems = array();
        foreach ($result as $row) {
            $todoItem = new TodoItem();
            $todoItem->setItemId($row['ItemId']);
            $todoItem->setItemValue($row['Item']);
            $todoItem->setListId($row['ListId']);
            $todoItem->setIsCompleted($row['IsCompleted']);
            $todoItems[] = $todoItem;
        }        
        return $todoItems;
    }
    
    // Method to fetch a particular Todo List Item based on the item id
    public function getTodoItem($item_id) {
        $db = Database::getDB();
        
        $query = "SELECT * FROM ToDoItem WHERE ItemId = '$item_id'";
        $result = $db->query($query);
        $row = $result->fetch();
        
        $todoItem = new TodoItem();
        $todoItem->setItemId($row['ItemId']);
        $todoItem->setItemValue($row['Item']);
        $todoItem->setListId($row['ListId']); 
        $todoItem->setIsCompleted($row['IsCompleted']);    
        return $todoItem;
    }
    
    // Method to add a Todo List Item to the corresponding table
    public function addTodoItem($item, $list_id, $completedStatusBool) {
        $db = Database::getDB();
        $query = "INSERT INTO ToDoItem (Item, ListId, IsCompleted) VALUES ('$item', '$list_id', '$completedStatusBool')";
        $row_count = $db->exec($query);
        return $row_count;
    }
    
    // Method to delete a Todo List Item based on the item id
    public function deleteTodoItem($item_id) {
        $db = Database::getDB();
        $query = "DELETE FROM ToDoItem WHERE ItemId = '$item_id'";
        $row_count = $db->exec($query);
        return $row_count;
    }
    
    // Method to update a Todo List Item based on the item id
    public function updateTodoItem($updatedItemId, $updatedItemValue, $completedStatusBool) {
        $db = Database::getDB();
        $query = "UPDATE ToDoItem SET Item = '$updatedItemValue', IsCompleted = '$completedStatusBool' WHERE ItemId = '$updatedItemId'";
        $row_count = $db->exec($query);
        return $row_count;
    }
}
?>