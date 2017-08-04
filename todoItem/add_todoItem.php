<?php include 'view/header.php'; ?>
<main>
    <h1>Add Todo Item</h1>
    
    <!-- Form for capturing the Todo Item details --> 
    <form action="index.php" method="post" id="list_item_form">
        <input type="hidden" name="action" value="added_todoItem" />

        <label>List:</label>
        <select name="item_list">
        <?php foreach ($todoLists as $list) : ?>
            <option value="<?php echo $list->getListId(); ?>">
                <?php echo $list->getListItem(); ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Todo Item:</label>
        <input type="text" name="item">
        <br>

        <label>Completed ?</label>
        <select name="completedStatus">
            <option value="0">False</option>
            <option value="1">True</option>
        </select>
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Todo Item">
        <br>
    </form>
    
    <!-- Hyperlink to redirect back to the Todo List -->
    <p><a href="index.php?action=show_todoList">View Todo List</a></p>
</main>
<?php include 'view/footer.php'; ?>