<div class="row bg-primary text-white">
      <div class="col  p-2">
            <h4>
                  <?php echo LANG_LOG_IN_BUTTON; ?>
            </h4>
      </div>
</div>
<form action="index2.php" method="post">
      <input type="hidden" name="action" value="login" />
      <div class="row justify-content-between p-2">

            <div class="form-group flex-fill mb-2">
                  <input id="todo-input" placeholder="Username" name="username" type="text" class="form-control"
                        value="" required>
                  <input type="password" name="password" placeholder="Password" class="form-control" value=""
                        id="myInput" required><br>
                  <!-- An element to toggle between password visibility -->
                  <input type="checkbox" onclick="myFunction()"> Show Password
            </div>
            <button type="submit" class="btn btn-primary mb-2 ml-2">
                  <?php echo LANG_LOG_IN_BUTTON; ?>
            </button>
      </div>
</form>
<button type="submit" class="btn btn-primary mb-2 ml-2" onclick="location='index.php?action=do_signup'">
      <?php echo LANG_SIGN_UP; ?>
</button>



</div>