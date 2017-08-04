<?php include 'view/header.php'; ?>
<main>
    <h1><?php echo $todoList->getListItem();?></h1>
    
    <!-- Table that shows the list of Todo Items of a particular Todo List --> 
    <table>
        <tr>
            <th>Item</th>
            <th>IsCompleted</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($todoItems as $todoItem) : ?>
        <tr>
            <td><?php echo $todoItem->getItemValue(); ?></td>
            <td><?php 
                if ($todoItem->getIsCompleted() == false)
                    echo 'False';
                else 
                    echo 'True';
                ?>
            </td>
            <td>
                <form action="." method="post" id="edit_todoItem_form">
                    <input type="hidden" name="action" value="edit_todoItem">
                    <input type="hidden" name="item_id" value="<?php echo $todoItem->getItemId(); ?>">
                    <input type="submit" value="Edit">
                </form>
            </td>
            <td>
                <form action="." method="post" id="delete_todoItem_form">
                    <input type="hidden" name="action" value="delete_todoItem">
                    <input type="hidden" name="item_id" value="<?php echo $todoItem->getItemId(); ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table> 
    
    <!-- Hyperlink to redirect back to the Todo List -->
    <p><a href="index.php?action=show_todoList">View Todo List</a></p>
</main>
<?php include 'view/footer.php'; ?>