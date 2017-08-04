<?php include 'view/header.php'; ?>
<main>
    <h1>Todo List</h1>
    
    <!-- Form for adding a new Todo List -->
    <form action="index.php" method="post" id="list_item_form">
        <input type="hidden" name="action" value="add_todoList" />
        <input type="text" name="todoList_value">        
        <input type="submit" value="Add a List">
        <br>
    </form>
    
    <!-- Table that shows the list of Todo Lists -->
    <table>
        <?php foreach ($todoLists as $todoList) : ?>
        <tr>
            <td>
                <form action="." method="post" id="view_todoItem_form">
                    <input type="hidden" name="action" value="view_todoItem">
                    <input type="hidden" name="list_id" value="<?php echo $todoList->getListId(); ?>">
                    <button type="submit"><?php echo $todoList->getListItem();?></button>
                </form>
            </td>
            <td>
                <form action="." method="post" id="edit_todoList_form">
                    <input type="hidden" name="action" value="edit_todoList">
                    <input type="hidden" name="list_id" value="<?php echo $todoList->getListId(); ?>">
                    <input type="submit" value="Edit">
                </form>
            </td>
            <td>
                <form action="." method="post" id="delete_todoList_form">
                    <input type="hidden" name="action" value="delete_todoList">
                    <input type="hidden" name="list_id" value="<?php echo $todoList->getListId(); ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    
    <!-- Form for adding a new Todo Item -->
    <form action="index.php" method="post" id="list_item_form">
        <input type="hidden" name="action" value="add_todoItem" />
        <input type="submit" value="Add Todo Item">
        <br>
    </form>
    
</main>
<?php include 'view/footer.php'; ?>