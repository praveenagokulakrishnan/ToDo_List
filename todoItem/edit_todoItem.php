<?php 
include 'view/header.php'; 

// To set the default value in a drop down list
$selected = '';
if ($todoItem->getIsCompleted() == true)
    $selected = 'selected';

?>
<main>
    <h1>Edit Item</h1>
    
    <!-- Form for edit a Todo Item --> 
    <form action="." method="post" id="list_item_form">
        <input type="hidden" name="action" value="update_todoItem" />
        <label>Item:</label>
        <input type="text" name="updatedItemValue" value="<?php echo $todoItem->getItemValue(); ?>">
        <br>
        
        <label>Completed?</label>
        <select name="completedStatus">
            <option value="0">False</option>
            <option value="1" <?php echo $selected; ?>>True</option>
        </select>
        
        <input type="hidden" name="updatedItemId" value="<?php echo $todoItem->getItemId(); ?>">
        <input type="hidden" name="list_id" value="<?php echo $todoItem->getListId(); ?>">
        <br>
        <br>
        <input type="submit" value="Save">
        <br>
    </form> 
</main>
<?php include 'view/footer.php'; ?>