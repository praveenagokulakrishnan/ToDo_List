<?php include 'view/header.php'; ?>
<main>
    <h1>Edit Todo List</h1>
    
    <!-- Form for editing the details of a Todo List -->
    <form action="index.php" method="post" id="update_todoList_form">
        <input type="hidden" name="action" value="update_todoList" />
        <label>List Item:</label>
        <input type="text" name="updatedListItem" value="<?php echo $todoList->getListItem(); ?>">
        <input type="hidden" name="updatedListId" value="<?php echo $todoList->getListId(); ?>">
        <input type="submit" value="Save">
        <br>
    </form> 
</main>
<?php include 'view/footer.php'; ?>