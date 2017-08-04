<?php
/*
Class Name: TodoListDB
The class is responsible for adding, fetching, updating, deleting the records from TodoList table
*/
class TodoListDB {
    
    // Method to fetch all the Todo Lists from the corresponding DB tables.
    public function getTodoLists() {
        $db = Database::getDB();
        
        $query = 'SELECT * FROM ToDoList';
        $result = $db->query($query);
        $todoLists = array();
        foreach ($result as $row) {
            $todoList = new TodoList();
            $todoList->setListId($row['Id']);
            $todoList->setListItem($row['ListItem']);
            $todoLists[] = $todoList;
        }        
        return $todoLists;
    }
    
    // Method to fetch a particular Todo List based on the list id
    public function getTodoList($list_id) {
        $db = Database::getDB();
        $query = "SELECT * FROM ToDoList WHERE Id = '$list_id'";
        $result = $db->query($query);
        $row = $result->fetch();

        $listItem = new TodoList();
        $listItem->setListId($row['Id']);
        $listItem->setListItem($row['ListItem']);
        return $listItem;
    }
    
    // Method to add a new Todo List to the corresponding DB table
    public function addTodoList($todoList) {
        $db = Database::getDB();
        $list = $todoList->getListItem();
        $query = "INSERT INTO ToDoList (ListItem) VALUES ('$list')";
        $row_count = $db->exec($query);
        return $row_count;
    }
    
    // Method to delete a Todo List based on the list id
    public function deleteTodoList($list_id) {
        $db = Database::getDB();
        $query = "DELETE FROM ToDoList WHERE Id = '$list_id'";
        $row_count = $db->exec($query);
        return $row_count;
    }
    
    // Method to update a Todo List based on the list id
    public function updateTodoList($updatedListId, $updatedListItem) {
        $db = Database::getDB();
        $query = "UPDATE ToDoList SET ListItem = '$updatedListItem' WHERE Id = '$updatedListId'";
        $row_count = $db->exec($query);
        return $row_count;
    }    
}
?>