<div class="row bg-primary text-white">
  <div class="col  p-2">
    <h4>
      <?php echo LANG_APP_NAME; ?> - <?php session_start(); echo $_SESSION['username'];?>
    </h4>
  </div>
</div>

<form action="index.php" method="post">
  <input type="hidden" name="action" value="do_add" />
  <div class="row justify-content-between text-white p-2">

    <div class="form-group flex-fill mb-2">
      <input id="todo-input" name="title" type="text" class="form-control" value="">

      <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" />

    </div>
    <button type="submit" class="btn btn-primary mb-2 ml-2"
      onclick="location='index.php?action=do_add&user_id=<?php echo $_SESSION['user_id']; ?>'">
      <?php echo LANG_ADD_ITEM; ?>
    </button>

  </div>
</form>
<div class="row" id="todo-container">
  <?php
  for ($i = 0; $i < count($items); $i++) {
    ?>
    <?php $id = $_get['item_id']; ?>
    <div class="col col-12 p-2 todo-item" todo-id="<?php echo $items[$i]['item_id']; ?>">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <input type="checkbox">
          </div>
        </div>
        <input type="text" readonly class="form-control editable" aria-label="Text input with checkbox"
          value="<?php echo htmlspecialchars($items[$i]['title']); ?>">
        <div class="input-group-append">
          
          <button class="btn btn-outline-secondary bg-success text-white" type="button" id="button-addon2" onclick="location='index3.php?action=do_edit&item_id=<?php echo $items[$i]['item_id'];?>'">
            Edit  
          </button>
        
        
        
          <button class="btn btn-outline-secondary bg-danger text-white" type="button" id="button-addon2"
            onclick="location='index.php?action=delete&item_id=<?php echo $items[$i]['item_id']; ?>'">Remove</button>
        </div>
      </div>
    </div>
    <?php
  }
  ?>
    <button type="submit" class="btn btn-primary mb-2 ml-2" onclick="location='index.php?action=logout'">
      <?php echo LANG_LOG_OUT; ?>
    </button>

    <button type="submit" class="btn btn-primary mb-2 ml-2" onclick="location='index.php?action=signout'">
      <?php echo LANG_SIGN_OUT; ?>
    </button>

</div>