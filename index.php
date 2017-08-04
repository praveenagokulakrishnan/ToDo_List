<?php
// Access the Database Objects
require('model/database.php');
require('model/todoList.php');
require('model/todoList_db.php');
require('model/todoItem.php');
require('model/todoItem_db.php');

// Create the Objects for Database Classes
$todoListDB = new TodoListDB();
$todoItemDB = new TodoItemDB();

$global_list_id = 1;
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_todoList';
    }
}

// Default action
if ($action == 'show_todoList') {
    $todoLists = $todoListDB->getTodoLists();        
    include('todoList/show_todoList.php');
}

/*
Action to fetch the list of Todo List from database.
To present the Todo lists in the UI
*/
else if ($action == 'add_todoList') {
    $list = filter_input(INPUT_POST, 'todoList_value');
    
    if ($list == NULL ) {
        $error = "Enter a valid Todo List";
        include('errors/error.php');
    } 
    else {
        $todoList = new TodoList();
        $todoList->setListItem($list);

        $todoListDB->addTodoList($todoList);
        header("Location: .");
    }
}

/*
Action that presents the screen to edit the Todo List
*/
else if ($action == 'edit_todoList') {
    $list_id = filter_input(INPUT_POST, 'list_id', FILTER_VALIDATE_INT);
    
    $todoList = $todoListDB->getTodoList($list_id);    
    include('todoList/edit_todoList.php');
}
/*
Action that updates the database with them modified Todo List
*/
else if ($action == 'update_todoList') {
    $updatedListId = filter_input(INPUT_POST, 'updatedListId');
    $updatedListItem = filter_input(INPUT_POST, 'updatedListItem');
    
    $todoListDB->updateTodoList($updatedListId, $updatedListItem);
    header("Location: .");
}
/*
Action that is responsible for deleting the Todo List
*/
else if ($action == 'delete_todoList') {
    $list_id = filter_input(INPUT_POST, 'list_id', FILTER_VALIDATE_INT);

    $todoListDB->deleteTodoList($list_id);
    header("Location: .");
}
/*
Action that opens up a screen to add the Todo List Items
*/
else if ($action == 'add_todoItem') {
    $list_id = filter_input(INPUT_POST, 'list_id', FILTER_VALIDATE_INT);
    
    $todoLists = $todoListDB->getTodoLists();
    //$todoList = $listItemsDB->getTodoList($list_id);    
    include('todoItem/add_todoItem.php');
}
/*
Action that is responsible for updating the database with the new Todo List Item
Once the new Todo List Item is added, the control is returned back to the Todo List Item View
*/
else if ($action == 'added_todoItem') {
    $item = filter_input(INPUT_POST, 'item');
    $list_id = filter_input(INPUT_POST, 'item_list', FILTER_VALIDATE_INT);
    $global_list_id = $list_id;
    //$GLOBALS['global_list_id'] = $list_id;
    
    $completedStatus = filter_input(INPUT_POST, 'completedStatus');
    $completedStatusBool = false;
    if ($completedStatus == "1")
        $completedStatusBool = true;    
    
    if ($item == NULL ) {
        $error = "Enter a valid Todo Item";
        include('errors/error.php');
    } 
    else {        
        $todoItemDB->addTodoItem($item, $list_id, $completedStatusBool);  
        header("Location: .?action=view_todoItem"); 
    }  
} 
/*
Action that presents the list of Todo List Items for a particular Todo List.
The status of the Todo List Item is displayed along with the Item name
*/
else if ($action == 'view_todoItem') {
    $list_id = filter_input(INPUT_POST, 'list_id', FILTER_VALIDATE_INT);
    
    if ($list_id == NULL || $list_id == FALSE) {
        $list_id = $global_list_id;
    }
    
    $todoList = $todoListDB->getTodoList($list_id);     
    $todoItems = $todoItemDB->getTodoCategoryItems($list_id);     
    include('todoItem/show_todoItem.php');
}

/*
To edit the Todo List Item
*/
else if ($action == 'edit_todoItem') {
    $item_id = filter_input(INPUT_POST, 'item_id', FILTER_VALIDATE_INT);
    
    $todoItem = $todoItemDB->getTodoItem($item_id);    
    include('todoItem/edit_todoItem.php');
}
/*
To update the Todo List Item
*/
else if ($action == 'update_todoItem') {
    $list_id = filter_input(INPUT_POST, 'list_id');
    $global_list_id = $list_id;
    //$GLOBALS['global_list_id'] = $list_id;
    
    $updatedItemId = filter_input(INPUT_POST, 'updatedItemId');
    $updatedItemValue = filter_input(INPUT_POST, 'updatedItemValue');
    $completedStatus = filter_input(INPUT_POST, 'completedStatus');
    $completedStatusBool = false;
    if ($completedStatus == "1")
        $completedStatusBool = true;
    
    $todoItemDB->updateTodoItem($updatedItemId, $updatedItemValue, $completedStatusBool);
    header("Location: .?action=view_todoItem");
}
/*
To delete the Todo List Item
*/
else if ($action == 'delete_todoItem') {
    $item_id = filter_input(INPUT_POST, 'item_id', FILTER_VALIDATE_INT);

    $todoItemDB->deleteTodoItem($item_id);
    header("Location: .?action=view_todoItem");
}
?>