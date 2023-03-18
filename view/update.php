<div class="row bg-primary text-white">
      <div class="col  p-2">
            <h4>
                  Update
            </h4>
      </div>
</div>
<form action="todolist.php" method="post">
      <input type="hidden" name="action" value="do_editing" />
      <input type="hidden" name="item_id" value="<?php echo $vars['item_id']; ?>" />
      <div class="row justify-content-between p-2">

            <div class="form-group flex-fill mb-2">
                  <input id="todo-input" placeholder="" name="title" type="text" class="form-control"
                        value="<?php echo htmlspecialchars($vars['title']); ?>" required>
                  <!-- An element to toggle between password visibility -->
            </div>
            <button type="submit" class="btn btn-primary mb-2 ml-2">
                  Edit
            </button>
      </div>
</form>




</div>