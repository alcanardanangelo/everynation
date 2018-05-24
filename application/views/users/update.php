<div class="row">
  <div class="col-lg-12">
    <h3 class="page-header"><?php echo $title; ?></h3>
    <?php echo form_open('users/update/' . $result['user_id']); ?>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label for="username">Username</label>
          <p><?php echo $result['username']; ?></p>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password">
          <small class="help-block error-message"><?php echo form_error('password'); ?></small>
        </div>

        <div class="form-group">
          <label for="is_active">is active</label>
          <select class="form-control" name="is_active" id="is_active">
            <option value="">--</option>
            <option value="1" <?php if ($result['is_active'] == 1)
            echo 'selected'; ?>>Active
            </option>
            <option value="0" <?php if ($result['is_active'] == 0)
            echo 'selected'; ?>>Inactive</option>
          </select>
          <small class="help-block error-message"><?php echo form_error('prerequisite'); ?></small>
        </div>

        <input type="submit" value="Save" class="btn btn-primary">
      </div>
    </div>

    <?php echo form_close(); ?>
  </div>
</div>